<?php
namespace app\user\controller;
use app\common\controller\User;
use think\Db;
use think\Session;

class Manager extends User{

	
	public function _initialize() {
		parent::_initialize();
	
		$request = request();
		$action = $request->action();

		if (config('db_config1')){
			$this->connect = Db::connect('db_config1');
		}
		else{
			$this->connect = Db::connect();
		}

	}
	
	private function getUserTypeName($userType){
		switch ($userType) {
			case 1:			  
				$name = "员工";
				break;	
			case 2:
				$name = "商家";
				break;	
			case 3:					
				$name = "代理商";
				break;				
			case 4:
				$name = "运营商";	
				break;	
	
			default:
				$name = "商家";;
		}
		return $name;
	}
	
	//任务管理主界面
	public function index()
	{ 
	
		$keyword = input('keyword','','trim,strip_tags');
		
		$userType = input('userType','','trim,strip_tags');
		$where = array();	
		if($userType != "") {
			$where['user_type'] = $userType;	
		}
		else{
			$where['user_type'] = ['>', 1];	
		}
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
	
		$IdList = getSubordinateId(); //下级Id数组
		
		if(!$super){
			
			$ka = array_search($uid,$IdList);
    		unset($IdList[$ka]);
	    	sort($IdList);
	    	
		}
	   
	 
		if ($keyword) {
			$list = Db::name('admin')->where('username like "%'.$keyword.'%"')->where($where)->where('id','in', $IdList)->paginate(10, false, array('query'  =>  $this->param));
		} else {
			if ($super){
				$list = Db::name('admin')->where('id','in', $IdList)->where($where)->whereor('super', $super)->paginate(10, false, array('query'  =>  $this->param));
			}
			else{
				$list = Db::name('admin')->where('id','in', $IdList)->where($where)->paginate(10, false, array('query'  =>  $this->param));
			}
		}
		
		$page = $list->render();
		$list = $list->toArray();
		
		foreach ($list['data'] as $k=>$v){
			$list['data'][$k]['create_time'] = date("Y-m-d H:i:s", $v['create_time']);
			$list['data'][$k]['expiry_date'] = date("Y-m-d", $v['expiry_date']);
			//$role = Db::name('admin_role')->field('name')->where('id', $v['role_id'])->find();
			if($v['robot_cnt'] < 0){
				$list['data'][$k]['robot_cnt'] = 0;
			}
			
			//$list['data'][$k]['user_type'] = $this->getUserTypeName($v['user_type']);
			$list['data'][$k]['isSuper'] = $v['super']?'是':'否';	

		}
		
		$this->assign('list', $list['data']);
		$this->assign('page', $page);
		
		$where = array();
		
		$mlist = Db::name('admin_role')->field('id,name')
				->where('status', 1)
				//->where('user_type', "in", $where)
				->order('id asc')
				->select();
		$roles = array();
		$userTypes = admintype();
		foreach($userTypes as $usertype){
			foreach($mlist as $role){
				if ($usertype['name'] == $role['name']){
					$roles[] = $role;
					
				}
			
			}
		}
					
		$this->assign('rolelist', $roles);

		return $this->fetch();
	}
	

	
	//任务管理主界面
	public function sales(){ 
	
		$keyword = input('keyword','','trim,strip_tags');
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		if ($keyword) {
			$list = Db::name('admin')->where('username like "%'.$keyword.'%"')->where(array('pid'=>$uid,'user_type'=>1))->paginate(10, false, array('query'  =>  $this->param));
		} else {
			$list = Db::name('admin')->where(array('pid'=>$uid,'user_type'=>1))->paginate(10, false, array('query'  =>  $this->param));
		}
		$page = $list->render();
		$list = $list->toArray();
		
		foreach ($list['data'] as $k=>$v){
			$list['data'][$k]['create_time'] = date("Y-m-d H:i:s", $v['create_time']);
			if ($v['last_login_time']){
				$list['data'][$k]['last_login_time'] = date("Y-m-d H:i:s", $v['last_login_time']);
			}
			else{
				$list['data'][$k]['last_login_time'] =  "";
			}
			
			$list['data'][$k]['num'] = Db::name('member')->where('salesman',$v['id'])->count("uid");
		}
		
		$this->assign('list', $list['data']);
		$this->assign('page', $page);
		
	
		return $this->fetch();
	}
	
	public function saveSale(){
		
		if(IS_POST){
			$id = input('id','','trim,strip_tags');	
			$mdata = array();
		
			$mdata['username'] = input('username','','trim,strip_tags');
			$mdata['realname'] = input('realname','','trim,strip_tags');
			$mdata['mobile'] = input('mobile','','trim,strip_tags');
			$mdata['sex'] = input('sex','','trim,strip_tags');
			$mdata['email'] = input('email','','trim,strip_tags');
			$mdata['open_tsr'] = input('open_tsr','','trim,strip_tags');
			$mdata['remark'] = input('remark','','trim,strip_tags');
			
			
			$uid = session('user_auth.uid');
			$res = Db::name('admin')->field('role_id,expiry_date,open_tsr')->where('id', $uid)->find();
			$mdata['expiry_date'] = $res['expiry_date'];
			//$mdata['open_tsr'] = $res['open_tsr'];
			$roleId = Db::name('admin_role')->field('id')->where('name', "员工")->find();
			$mdata['role_id'] = $roleId['id'];
			
			if($mdata['open_tsr']){
				
				$number = Db::name('tel_extension_number')
									->field('id,extension_number')
									->where('owner', 0)
									->where('status', 0)->find();
									
				if($number){
					$mdata['extension_number'] = $number['extension_number'];
					
					if ($id){
						
						$exres = Db::name('admin')->field('extension_number')->where('id', $id)->find();
						if(!$exres['extension_number']){
							$exdata['owner'] = $id;
							$exdata['status'] = 1;
							$return = Db::name('tel_extension_number')->where('id', $number["id"])->update($exdata);		
						}
						
					}
					
				}else{
					
					return returnAjax(1,'无法开通，人工坐席不足。可以选择不开通人工坐席。',"保存失败");

				}					
							
			}
			else{
				if ($id){
					
					$exres = Db::name('admin')->field('extension_number')->where('id', $id)->find();
					if($exres['extension_number']){
						$mdata['extension_number'] = null;
						
						$exdata['owner'] = 0;
						$exdata['status'] = 0;
						$return = Db::name('tel_extension_number')->where('extension_number', $exres['extension_number'])->update($exdata);
						
					}
					
				}else{
					$mdata['extension_number'] = 0;
				}
			}
			
			if ($id){
				$mdata['update_time'] = time();
				$result = Db::name('admin')->where('id', $id)->update($mdata);
			}
			else{
				$res = Db::name('admin')->field('id')->where('username', $mdata['username'])->find();
				
				if( $res['id']){
					return returnAjax(1,'该用户名已经存在。');
				}	
				$mdata['user_type'] = 1;
				$mdata['pid'] = $uid;
				$password = input('password','','trim,strip_tags');
				$salt = rand_string(6);
				$mdata['password'] = md5($password.$salt);
				$mdata['salt'] = $salt;
				$mdata['create_time'] = time();
				$result = Db::name('admin')->insertGetId($mdata);
				
				if($result){
					if($mdata['open_tsr']){
						if(isset($number) && $number["id"]){
							
							$exdata['owner'] = $result;
							$exdata['status'] = 1;
							$return = Db::name('tel_extension_number')->where('id', $number["id"])->update($exdata);
							
						}
					}
				}
			}
			
			if($result >= 0){
				return returnAjax(0,'保存成功',$result);
			}else{
				return returnAjax(1,'error!',"保存失败");
			}
				
		}
	}
	
	public function getSipLoginInfo(){
		$id = input('id','','trim,strip_tags');
		$result = Db::name('tel_extension_number')->field('extension_number')->where('owner', $id)->find();
		if ($result){
			$result['hostIp'] = config('sip_host_ip');
			$result['sipId'] = $result['extension_number'];
			$result['sipPwd'] = config('sip_pwd');
			return returnAjax(0,'sucess',$result);
		}
		else{
			
			return returnAjax(1,'暂无开通座席功能');
		}
		
	}
	
	public function getSale(){
		$id = input('id','','trim,strip_tags');
		
		$result = Db::name('admin')->field('username,realname,mobile,email,open_tsr,sex,remark')->where('id', $id)->find();
		
		return returnAjax(0,'sucess',$result);
	}
	
	public function resetPwd(){
		$id = input('id','','trim,strip_tags');
		
		$salt = rand_string(6);
		$password = '654321';
		$mdata['salt'] = $salt;
		$mdata['password'] = md5($password.$salt);
		$result = Db::name('admin')->where('id', $id)->update($mdata);
		if($result >= 0){
			return returnAjax(0,'初始密码是：'.$password, '');
		}else{
			return returnAjax(1,'重置密码失败!');
		}
		
	}
	
	public function myCustomer(){
		$id = input('id','','trim,strip_tags');
		
		
	    $where = array();
        $mobile = input('keyword','','trim,strip_tags');
        $status = input('status','','trim,strip_tags');
    	if($mobile){
    		$where["m.mobile"] = $mobile;
    	}
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];

		
		if ($id){
			$where["m.salesman"] = $id;
		}
		else{
			if(!$super){
				$where['m.salesman'] = $uid;
			}
		}
		

        $where["m.status"] = ['>',0];
    	if($status != ""){
    		 $where["m.status"] = $status;
    	}   
			
		
	

		$list = Db::name('member')
		->field('m.uid,m.username,m.real_name,m.mobile,m.last_dial_time,m.status,m.task,m.uid,m.level')
		->alias('m')
		
		->order('m.last_dial_time desc')
		->where($where)
		->paginate(10, false, array('query'  =>  $this->param));
		

	 	$page = $list->render();
	   	$list = $list->toArray();

		foreach($list['data'] as &$item){

			if ($item['last_dial_time'] > 0){
				$item['last_dial_time'] = date('Y-m-d H:i:s', $item['last_dial_time']);
			}
			else{
				$item['last_dial_time'] = "";
			}
			
			switch ($item['level']) {
	    		case 5:
	    			$item['level'] = 'A类';
	    			break;
	    		case 4:
	    			$item['level'] = 'B类';
	    			break;
	    
	    		case 3:
	    			$item['level'] = 'C类';
					break;
				case 2:
	    			$item['level'] = 'D类';
					
	    			break;
	    		default:
	    			$item['level'] = 'E类';
				
			}
				
		}
		
		$cwhere = array();
		if($mobile){
			$cwhere["mobile"] = $mobile;
		}

    	$cwhere["status"] = ['>',0];
    	if($status != ""){
    		 $cwhere["status"] = $status;
    	}    
			
	
		 
		$cwhere["salesman"] = $id;

		$count = Db::name('member')->where($cwhere)->count('uid');

	    $this->assign('list',$list['data']);
	  	$this->assign('page', $page);
	    $this->assign('total', $count);

	    	
	    return $this->fetch();
	}
	private function getWxUser($owner){
		if (!$owner){
			$wxInfo = Db::name('wx_user')->where(array('is_default'=>1,'status'=>1))->find();
			return $wxInfo;
		}
		
		$adminInfo = Db::name('admin')->field('user_type,pid')->where('id',$owner)->find();
		if (!$adminInfo){
			$wxInfo = Db::name('wx_user')->where(array('is_default'=>1,'status'=>1))->find();
			return $wxInfo;
		}
		
		if ($adminInfo['user_type'] == 4){
			$wxInfo = Db::name('wx_user')->where('uid', $owner)->find();
			if ($wxInfo){
				
				return $wxInfo;
			}
			else{
				$wxInfo = Db::name('wx_user')->where(array('is_default'=>1,'status'=>1))->find();
				return $wxInfo;
			}
		}
		else{
			return $this->getWxUser($adminInfo['pid']);
		}
	}
	public function getQRUrl(){
		$id = input('id/d','','trim,strip_tags');
		$qrImg = "";
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$wxInfo = $this->getWxUser($uid);
		$extends = & load_wechat('Extends', $wxInfo);
		
		$result = Db::name('admin')->field('ticket')->where('id',$id)->find();
		if (!$result['ticket']){
			$result = $extends->getQRCode($id, 2);
			
			if ($result['ticket']){
				
				$ret = Db::name('admin')->where('id',$id)->update(array('ticket'=>$result['ticket']));
			}
		}
		
		// $wxInfo = db('wx_user',[],false)->where(array('is_default'=>1,'status'=>1))->find();
		// $extends = & load_wechat('Extends', $wxInfo);
		$qrImg = $extends->getQRUrl($result['ticket']);
		

		
		return returnAjax(0,'success',$qrImg);
		
	}
	
	public function removeBinding(){
		$id = input('id','','trim,strip_tags');
		$res = Db::name('admin')->field('open_id')->where('id',$id)->find();
		if ($res['open_id']){
			
			$ret = Db::name('admin')->where('id',$id)->update(array('open_id'=>''));
			if ($ret >=0){
				return returnAjax(0,'解除绑定成功');
			}
		}
		
		
	
		return returnAjax(1,'绑定失败');
	}
	
	//添加
	public function addAdmin(){
		
		if(IS_POST){
	
		//	$auth = input('auth/a','','trim,strip_tags');//接收数组
				
			$password = input('password','','trim,strip_tags');
				
		    $salt = rand_string(6);
		
			$mdata = array();
			$mdata['role_id'] = input('roleId','','trim,strip_tags');
			$mdata['username'] = input('userName','','trim,strip_tags');
				
			$list = Db::name('admin')->field('id')->where('username', $mdata['username'])->find();
			
			if($list['id']){
				$this->error("该用户名已经存在。",Url("User/manager/addadmin"));
			}	
				
		
			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			
				
			$mdata['password'] = md5($password.$salt);
			
			$mdata['mobile'] = input('mobile','','trim,strip_tags');
			// $mdata['email'] = input('email','','trim,strip_tags');
			//$mdata['destination_extension'] = $destination_extension;
			$mdata['status'] = 1;
			$mdata['create_time'] = time();
			$mdata['salt'] = $salt;
			
			$expiry_date = strtotime(input('expiry_date',"",'trim,strip_tags'));
			if($expiry_date){
				$mdata['expiry_date'] = $expiry_date;
			}

			$mdata['open_tsr'] = input('open_tsr','','trim,strip_tags');
			$mdata['examine'] = input('examine','','trim,strip_tags');

			//$mdata['time_price'] = input('time_price','','trim,strip_tags');
			$mdata['month_price'] = input('month_price','','trim,strip_tags');
			$mdata['asr_price'] = input('asr_price','','trim,strip_tags');
			$mdata['credit_line'] = input('credit_line','','trim,strip_tags');
			$mdata['robot_cnt'] = input('robot_cnt','','trim,strip_tags');
			$loss_rate = input('loss_rate','0','trim,strip_tags');
			if($loss_rate == 0){
				$loss_rate = 0;
			}
			$mdata['loss_rate'] = $loss_rate;
			
			$mdata['asr_type'] = input('asr_type','0','trim,strip_tags');
			
			$mdata['user_type'] = input('user_type','0','trim,strip_tags');
			
			$mdata['pid'] = $uid;
			
		    $info = Db::name('admin')->field('robot_cnt')->where('id', $uid)->find();	
			$sum = Db::name('admin')->where('pid', $uid)->sum('robot_cnt');
		    $rest = $info['robot_cnt'] - $sum;
		    
		    if($rest < $mdata['robot_cnt']){
		    	return returnAjax(1,'剩余的机器人数量不够!',"新建失败");
		    }
		    

			$result = Db::name('admin')->insertGetId($mdata);
				
			if($result){
				return returnAjax(0,'新建成功',$result);
			}else{
				return returnAjax(1,'error!',"新建失败");
			}
				
				
		}else{
		
			$mlist = Db::name('admin_role')->field('id,name')->where('status', 1)->order('id asc')->select();

			$this->assign('rolelist', $mlist);
			$this->assign('current', '添加');
			return $this->fetch();
			
		}
		
		
	}
	
   //编辑管理员
	public function editAdmin(){

		if(IS_POST){
		
			//	$auth = input('auth/a','','trim,strip_tags');//接收数组

			$mdata = array();
			$roleId = input('roleId','','trim,strip_tags');
			if ($roleId){
				
				$mdata['role_id']  = $roleId;
				
			}
			$username = input('userName','','trim,strip_tags');
			if($username){
				$mdata['username'] = $username;
			}
		
			$adminId = input('adminId','','trim,strip_tags');
		
			$list = Db::name('admin')->field('id')->where('username', $username)->find();
			
			if($list['id'] != $adminId && isset($list['id'])){
					$this->error("该用户名已经存在。",Url("User/manager/addadmin"));
			}	
		
			$mdata['mobile'] = input('mobile','','trim,strip_tags');
			$email = input('email','','trim,strip_tags');
			if($email){
				$mdata['email'] = $email;
			}
			
			$mdata['logo'] = input('headpic','','trim,strip_tags');
			$mdata['status'] = input('status','1','trim,strip_tags');
			$mdata['update_time'] = time();
			//$mdata['expiry_date'] = strtotime(input('expiry_date','','trim,strip_tags'));
			$mdata['open_tsr'] = input('open_tsr','','trim,strip_tags');
			$mdata['examine'] = input('examine','','trim,strip_tags'); 
			
			//$mdata['time_price'] = input('time_price','','trim,strip_tags');
			$mdata['month_price'] = input('month_price','','trim,strip_tags');
			$mdata['asr_price'] = input('asr_price','','trim,strip_tags');
			$mdata['credit_line'] = input('credit_line','','trim,strip_tags');
			$mdata['robot_cnt'] = input('robot_cnt','','trim,strip_tags');
			$loss_rate = input('loss_rate','0','trim,strip_tags');
			if($loss_rate == 0){
				$loss_rate = 0;
			}
			$mdata['loss_rate'] = $loss_rate;
			$loss_rate = input('loss_rate','0','trim,strip_tags');
			if($loss_rate == 0){
				$loss_rate = 0;
			}
			$mdata['loss_rate'] = $loss_rate;
			$asrType = input('asr_type','','trim,strip_tags');
			if($asrType != ''){
				$mdata['asr_type'] = $asrType;
			}
			
			$userType = input('user_type','','trim,strip_tags');
			if($userType != ''){
				$mdata['user_type'] = $userType;
			}
			
			
			$info = Db::name('admin')->field('robot_cnt,pid')->where('id', $adminId)->find();  //我的信息
			
			if($info['robot_cnt'] < $mdata['robot_cnt']){
		    	$more = $mdata['robot_cnt'] - $info['robot_cnt'];		    
		    	if($info['pid']){
		    		//上级的信息	
		    		$adminuser = Db::name('admin')->field('robot_cnt,super')->where('id', $info['pid'])->find();
		    		
		    		if($adminuser['super']){
		    			return returnAjax(1,'剩余的机器人数量不够,请向超级管理员购买!',"编辑失败");
		    		}
		    		else{
		    			
		    			$sum = Db::name('admin')->where('pid', $info['pid'])->sum('robot_cnt');
		    			
		    			$rest = $adminuser['robot_cnt'] - $sum;
		    			
		    			if($rest < $more){
					    	return returnAjax(1,'剩余的机器人数量不够!',"编辑失败");
					    }
		    		}
		    	}
		    }
		    
			
			$result = Db::name('admin')->where('id', $adminId)->update($mdata);
		
			if($result){
				return returnAjax(0,'编辑成功',$result);
			}else{
				return returnAjax(1,'error!',"编辑失败");
			}
		
		
		}
		else{
		
			$Aid = input('id','','trim,strip_tags');


			$result = Db::name('admin')->where('id', $Aid)->find();
			
			if($result['expiry_date']){
				 $result['expirydate'] = date("Y-m-d H:i:s", $result['expiry_date']);	
			}

			$this->assign('list', $result);
			
			
			$picdata=array();
			if($result['logo']){
				
				if (is_numeric($result['logo'])) {
					$pic = Db::name('picture')->field('path')->where('id', $result['logo'])->find();
					if($pic['path']){
						$picdata['headpic'] = $result['logo'];
					}
				} 

			}
	
		
			$this->assign('picdata', $picdata);
			

			$this->assign('current', '编辑');
		
			return $this->fetch('addadmin');
		}
		
  }
	
	public function addMoney(){
		
		$Aid = input('thisAdmin','','trim,strip_tags');
		$money = input('moneyNum','','trim,strip_tags');
		
		$userInfo =  Db::name('admin')->field("money")->where('id', $Aid)->find();
		
		$result = Db::name('admin')->where('id', $Aid)->setInc('money',$money);
		if($result){
			
			$mdata = array();
			//获取用户的基本信息
			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			
			$mdata['owner'] = $Aid;
			$mdata['menoy'] = $money;
			$mdata['type'] = 1;
			$mdata['status'] = 1;
			$mdata['create_time'] = time();
			$mdata['balance'] = $money+$userInfo['money'];
			$mdata['oper'] = $uid;
			Db::name('tel_deposit')->insertGetId($mdata);
						
			$userInfo =  Db::name('admin')->field("money")->where('id', $Aid)->find();
			if ($userInfo['money'] > 0){
				$ret = Db::name('tel_config')->where(array('member_id'=>$Aid,'status'=>4))->update(array('status'=>1));

					$ret = $this->connect->table('autodialer_task')->where(array('member_id'=>$Aid,'start'=>4))->update(array('start'=>1));

			}
			
			return returnAjax(0,'充值成功',$result);
		}else{
			return returnAjax(1,'error!',"充值失败");
		}
		
		//Db::table('think_user')->where('id', 1)->setInc('score', 5);
		
	}
	
	
   /**
    * 修改状态
    */

	public function setstatus(){
	   
	   	$adminId = input('arrayIds/a','','trim,strip_tags');
	   	$status = input('status','','trim,strip_tags');
	   	 
	   	$data=array();
	   	$data['status'] = $status;
	   
	   	$list = Db::name('admin')->where('id','in', $adminId)->update($data);
	   
	   	if($list){
	   		return returnAjax(0,'成功',$list);
	   	}else{
	   		return returnAjax(1,'error!',"失败");
	   	}
	}
   
   
   /**
    * 修改人口座机状态
    */

	public function openAuditing(){
	   
	   	$adminId = input('arrayIds/a','','trim,strip_tags');
	   	$status = input('status','','trim,strip_tags');
	   	 
	   	$data=array();
	   	$data['examine'] = $status;
	   
	   	$list = Db::name('admin')->where('id','in', $adminId)->update($data);
	   
	   	if($list){
	   		return returnAjax(0,'成功',$list);
	   	}else{
	   		return returnAjax(1,'error!',"失败");
	   	}

	}
   
   
   /**
    * 删除，批量删除，接收数组
    */
   public function delAdmin(){
   
   		$adminId = input('admin_id/a','','trim,strip_tags');//接收数组
		
		$reslist = Db::name('admin')
					->field('id,open_tsr,user_type,extension_number')
					->where('id','in', $adminId)
					->select();

			
		$exdata['owner'] = 0;
		$exdata['status'] = 0;
		foreach ($reslist as $k=>$v){
				
			if($v["extension_number"]){
				
				 Db::name('tel_extension_number')->where('extension_number', $v['extension_number'])->update($exdata);
					
			}

		}

   
	   	$list = Db::name('admin')->where('id','in', $adminId)->delete();
	   
	   	if($list){
	   		return returnAjax(0,'成功',$list);
	   	}else{
	   		return returnAjax(1,'error!',"失败");
	   	}
   }
   
   
   	/**
	 * 修改密码初始化
	 * @author huajie <banhuajie@163.com>
	 */
	public function editpwd() {
		if (IS_POST) {
			
			//$user = model('User');
			$data = $this->request->post();
		
		     
			if ($data['password'] != $data['repassword']){
				return $this->error('两次输入新密码不一致!');
			}
			unset($data['repassword']);
				
			$uid = session('user_auth.uid');
			$password = $data['password'] ;
			
			$oldpassword = $data['oldpassword'] ;
			
		 	$userinfo =  Db::name('admin')->field("password,salt")->where('id', $uid)->find();
		 
	        $mpassword = md5($oldpassword);
	    
		    if($userinfo['salt']){
		    	
		         $mpassword = md5($oldpassword.$userinfo['salt']);
		    }


			if($mpassword === $userinfo['password']){
		    	
			    $salt = rand_string(6);
		
				$mdata = array();
				$mdata['password'] = md5($password.$salt);
				$mdata['salt'] = $salt;
		
		   		$result = Db::name('admin')->where('id', $uid)->update($mdata);
		   	
			}else{
				//$this->error = '原始密码错误！';
				\think\Log::record('uid='.$uid.'原始密码错误！');
				return returnAjax(0,"修改密码失败,原始密码错误！");
			}
		    
				
		//	$res = $user->editpw($data);
				
			if($result){
				
				return returnAjax(1,"修改密码成功！");
					
			}else{
				return returnAjax(0,"修改密码失败！");
			}
		}else{
			$this->setMeta('修改密码');
			return $this->fetch();
		}
	}

   //检查是否重名
	 public function chackname(){
		 
		 $name = input('name','','trim,strip_tags');
		 
		 $list = Db::name('admin')->field('id')->where('username', $name)->find();
		 
		 if($list['id']){
		 	return returnAjax(0,'该用户名已经存在',$list);
		 }else{
		 	return returnAjax(1,'ok!',"可以用");
		 }
	 }
   
 	//返回白名单编辑的信息
 	public function getadmin(){
 		
 		$id = input('id','','trim,strip_tags');
 		$mlist = Db::name('admin')->where('id', $id)->find();
 		
 		switch ($mlist['user_type']) {
			case 1:			  
				$mlist["utype"] = "销售人员"; 
				break;	
			case 2:				
				$mlist["utype"] = "商家"; 
				break;	
			case 3:				
				$mlist["utype"] = "代理商"; 
				break;				
			case 4:
				$mlist["utype"] = "运营商";				
				break;	
			default:
				if($mlist["super"]){
					$mlist["utype"] = "超级管理员";
				}else{
					$mlist["utype"] = "未知用户类型。";
				}
				
		}
		
		$mlist['expiry_date'] = date("Y-m-d H:i:s",$mlist['expiry_date']);
		
 		if($mlist){
			
			return returnAjax(0,'获取数据成功',$mlist);

		}else{
			return returnAjax(1,'获取数据失败');

		}
 
 	}
 	
 	//机器人管理
 	public function robot(){

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];

		$keyword = input('keyword','','trim,strip_tags');
		
		$userType = input('userType','','trim,strip_tags');
		$where = array();	
		if($userType != "") {
			$where['user_type'] = $userType;	
		}		
		else{
			$where['user_type'] = ['>', 1];	
		}
		
		$IdList = getSubordinateId(); //下级Id数组

		//不能看到自己
		$key = array_search($uid, $IdList);
		unset($IdList[$key]);
		$IdList = array_values($IdList);

		
		if ($keyword) {
			$list = Db::name('admin')->where('username like "%'.$keyword.'%"')->where($where)->where('id','in', $IdList)->paginate(10, false, array('query'  =>  $this->param));
		} else {
			$list = Db::name('admin')->where('id','in', $IdList)->where($where)->paginate(10, false, array('query'  =>  $this->param));
		}
		
		$page = $list->render();
		$list = $list->toArray();
		
		foreach ($list['data'] as $k=>$v){
			$list['data'][$k]['create_time'] = date("Y-m-d H:i:s", $v['create_time']);
			$list['data'][$k]['expiry_date'] = date("Y-m-d", $v['expiry_date']);
			$role = Db::name('admin_role')->field('name')->where('id', $v['role_id'])->find();
			
			if($v['robot_cnt'] < 0){
				$list['data'][$k]['robot_cnt'] = 0;
			}
			
			$list['data'][$k]['role_name'] = $role['name'];
			$list['data'][$k]['isSuper'] = $v['super']?'是':'否';	

		}
		
		$this->assign('list', $list['data']);
		$this->assign('page', $page);
		
		$where = array();
       
		
		if($super != 1){
			
			$usertype = Db::name('admin')->field('user_type')->where('id', $uid)->find();
			if($usertype['user_type'] == 4){
				$where = array("1","2","3");
			}
			else if($usertype['user_type'] == 3){
				$where = array("1","2");
			}
			else if ($usertype['user_type'] == 2){
				$where = array("1");
			}else{
				$where = array("1");
			}

		}
		else{
			$where = array("1","2","3","4");
		}
		
		
		$mlist = Db::name('admin_role')->field('id,name')
				->where('status', 1)
				//->where('user_type', "in", $where)
				->order('id asc')
				->select();	
					
		$this->assign('rolelist', $mlist);

 		return $this->fetch();
 		
 		
 	}
 	
 	
 	//编辑机器人
 	public function editRobot(){
 	
		$mdata = array();
		
		$adminId = input('adminId','','trim,strip_tags');
	
		$mdata['update_time'] = time();
		$mdata['expiry_date'] = strtotime(input('dueTime','','trim,strip_tags'));		
		$mdata['robot_cnt'] = input('allocate','','trim,strip_tags');
		
		if($mdata['robot_cnt'] < 0){
			return returnAjax(1,'编辑失败,分配的机器人数量必须大于0!',"编辑失败");
		}
		
		$mdata['remark'] = input('remark','','trim,strip_tags');
		
		$result = Db::name('admin')->where('id', $adminId)->update($mdata);
	
		if($result){
			return returnAjax(0,'编辑成功',$result);
		}else{
			return returnAjax(1,'error!',"编辑失败");
		}
	

 	}
 	
 	//强制回收机器人
 	public function recovery(){
 	
		$mdata = array();
		
		$adminId = input('adminId','','trim,strip_tags');
		
		$mdata['update_time'] = time();
		$mdata['robot_cnt'] = 0;
		
		$result = Db::name('admin')->where('id', $adminId)->update($mdata);
	
		if($result){
			return returnAjax(0,'回收成功',$result);
		}else{
			return returnAjax(1,'error!',"回收失败");
		}
	

 	}
 	
 	
 	//获取用户类型
 	public function backtype(){
 		
 		$admintype = admintype();
 		
 		return returnAjax(0,'成功',$admintype);
 		
 	}
 	
 	//用户手册
 	public function manual(){
 		
 		$data = array();
 		
 		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "beginners";
		$temp['text'] = "新手必读";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "what";
		$sontemp['stext'] = "什么是语音机器人？";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "why";
		$sontemp['stext'] = "为什么选择语音机器人？？";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "talking";
		$temp['text'] = "话术管理";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "talking";
		$sontemp['stext'] = "话术管理";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "label";
		$sontemp['stext'] = "标签管理";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "callCenter";
		$temp['text'] = "呼叫中心";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "external";
		$sontemp['stext'] = "外呼管理";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "incoming";
		$sontemp['stext'] = "呼入管理";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "callrecord";
		$sontemp['stext'] = "呼叫记录";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "representative";
		$sontemp['stext'] = "座席代表";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);
		
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "crm";
		$temp['text'] = "CRM";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "customer";
		$sontemp['stext'] = "客户管理";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "group";
		$sontemp['stext'] = "分组列表";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "white";
		$sontemp['stext'] = "白名单客户";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "communication";
		$temp['text'] = "通信管理";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "voip";
		$sontemp['stext'] = "语音网关";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "lineConfig";
		$sontemp['stext'] = "线路配置";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "SMS";
		$temp['text'] = "短信管理 ";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "channel";
		$sontemp['stext'] = "短信通道";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "SMSSignature";
		$sontemp['stext'] = "短信签名";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "SMSTemplate";
		$sontemp['stext'] = "短信模板";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "sendingSMS";
		$sontemp['stext'] = "发送短信";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "sendSecord";
		$sontemp['stext'] = "发送记录";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "dailyStatistics";
		$sontemp['stext'] = "每日统计";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "staff";
		$temp['text'] = "员工管理";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "employeelist";
		$sontemp['stext'] = "员工列表";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "myclient";
		$sontemp['stext'] = "我的客户";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "financial";
		$temp['text'] = "财务管理";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "account";
		$sontemp['stext'] = "企业账户";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "merchant";
		$temp['text'] = "商家管理";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "merchantlist";
		$sontemp['stext'] = "商家列表";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "robotmanage";
		$sontemp['stext'] = "机器人管理";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);	
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "privilege";
		$temp['text'] = "权限管理";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "role";
		$sontemp['stext'] = "角色管理";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "menu";
		$sontemp['stext'] = "菜单管理";
		array_push($son,$sontemp);
		
		$temp['son'] = $son;
		
		array_push($data,$temp);
		
		/////////////////////////////////////////////////////////////
		
		$temp = array();
		$temp['key'] = "system";
		$temp['text'] = "系统管理";
		
		$son = array();

		$sontemp = array();
		$sontemp['skey'] = "publicnumber";
		$sontemp['stext'] = "公众号配置";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "stationnews";
		$sontemp['stext'] = "站内消息";
		array_push($son,$sontemp);
		
	
        $sontemp = array();
		$sontemp['skey'] = "essential";
		$sontemp['stext'] = "基本信息";
		array_push($son,$sontemp);
		
		$sontemp = array();
		$sontemp['skey'] = "interface";
		$sontemp['stext'] = "接口配置";
		array_push($son,$sontemp);
		
		
		$temp['son'] = $son;
		
		array_push($data,$temp);		
		
		
		
		
		
		$this->assign('data', $data);
		
 		
 		return $this->fetch("help");
 		
 	}
 	
 	//消费记录
 	public function consumption(){
 		return $this->fetch();
 	}
	 
	 
	//获取数据
 	public function backHelp(){
 		
 		$val = input('val','','trim,strip_tags');
 		
 		return $this->fetch($val);
 		
 		/*if($val == 2){
 			return $this->fetch("index2");
 		}
 		else{
 			return $this->fetch("index3");
 		}*/
		
 	} 
	 
   
}