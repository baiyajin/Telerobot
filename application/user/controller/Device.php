<?php
namespace app\user\controller;
use app\common\controller\User;
use think\Db;
use think\Session;

class Device extends User{

	
	public function _initialize() {
		parent::_initialize();
	
		$request = request();
		$action = $request->action();

	}
	
	
	//设备主界面
	public function index()
	{

		return $this->fetch();
		
	}
	
	//设备主界面
	public function voip()
	{

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];

		$where = array();
		/*if(!$super){
			$where['owner'] = $uid;
		}*/
		
		$IdList = getSubordinateId(); //下级Id数组	
		
		$list = Db::name('tel_device')->where($where)->where('owner','in', $IdList)->order('id desc')
		->paginate(10, false, array('query'  =>  $this->param));

		$page = $list->render();
		$list = $list->toArray();

		$this->assign('list', $list['data']);
		$this->assign('page', $page);
		
		return $this->fetch();
		
	}
	
	public function lines(){
		 
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		//$IdList = getSubordinateId(); //下级Id数组	
		
		$where = array();
		//if(!$super){
			$where['member_id'] = $uid;//[['=',0],['in',$IdList],'OR'];
		//}
		
		$lineOperator = input('lineOperator','','trim,strip_tags');
		
		if($lineOperator != "") {
			$where['name']  = ['like',"%".$lineOperator."%"]; ;	
		}		
		
	  	
	  	
		$list = Db::name('tel_line')->where($where)->order('id desc')
		->paginate(10, false, array('query'  =>  $this->param));

		$page = $list->render();
		$list = $list->toArray();

		foreach ($list['data'] as $k=>$v){
			
			$admin = Db::name('admin')->field("username")->where('id',$v["member_id"])->find();
			$list['data'][$k]["username"] = $admin["username"];
			
		
			
			$memberInfo = Db::name('admin')->field("username")->where('id',$v["member_id"])->find();
			$list['data'][$k]["username"] = $memberInfo["username"];
		
		}
		
		
		$this->assign('list', $list['data']);
		$this->assign('page', $page);
	  					
		$this->assign('super', $super);
		$result = Db::name('admin')->where(array('status'=>1,'super'=>0))->select();
		$this->assign('memberList', $result);
	

		return $this->fetch();
		
	}
	
	//添加设备信息
	public function addLine(){

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		
		$data = array();
		$data['name'] = input('name','','trim,strip_tags');
		
		$data['member_id'] = $uid;
		
		$data['phone'] = input('phone','0','trim,strip_tags');
		$data['call_prefix'] = input('call_prefix','','trim,strip_tags');
		$data['inter_ip'] = input('inter_ip','','trim,strip_tags');
		
		
		$data['gateway'] = input('gateway','','trim,strip_tags');
		
		//$data['explicit_number'] = input('explicit_number','','trim,strip_tags');
		$data['price'] = input('price','','trim,strip_tags');
		
		//'sofia/gateway/mygateway/%s',
		//sofia/external/15%s@119.23.133.180:2080
		$type = input('type/d','','trim,strip_tags');
		$data['type'] = $type;
		if ($type == 0){
			$dial_format  = 'sofia/external/';
			if ($data['call_prefix']){
				$dial_format  .= $data['call_prefix'];
			}
			$dial_format  .= '%s@'.$data['inter_ip'];
		}
		else{
			$dial_format  = 'sofia/gateway/';
			if ($data['gateway']){
				$dial_format  .= $data['gateway'];
			}
			$dial_format  .= '/%s';			
		}
		
		
		$data['dial_format'] = $dial_format;	
		
		$data['remark'] = input('remark','','trim,strip_tags');
	    $data['status'] = 1;
		$result = Db::name('tel_line')->insertGetId($data);
	
		if ($result){
			
			 return returnAjax(0,'success!');		
		}
		else{
			 return returnAjax(1,'failure!');
		}
		
	}
	
	//编辑设备信息
	public function editLine(){

		$data = array();
		$data['name'] = input('name','','trim,strip_tags');
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		
		$data['member_id'] = $uid;
		$data['phone'] = input('phone','0','trim,strip_tags');
		
		$data['call_prefix'] = input('call_prefix','','trim,strip_tags');
		$data['inter_ip'] = input('inter_ip','','trim,strip_tags');
		
		$data['gateway'] = input('gateway','','trim,strip_tags');
		//$data['explicit_number'] = input('explicit_number','','trim,strip_tags');
		$data['price'] = input('price','','trim,strip_tags');
		//'sofia/gateway/mygateway/%s',
		//sofia/external/15%s@119.23.133.180:2080
		$type = input('type/d','','trim,strip_tags');
		$data['type'] = $type;
		if ($type == 0){
			$dial_format  = 'sofia/external/';
			if ($data['call_prefix']){
				$dial_format  .= $data['call_prefix'];
			}
			$dial_format  .= '%s@'.$data['inter_ip'];
		}
		else{
			$dial_format  = 'sofia/gateway/';
			if ($data['gateway']){
				$dial_format  .= $data['gateway'];
			}
			$dial_format  .= '/%s';			
		}
		
		$data['dial_format'] = $dial_format;				
		$data['remark'] = input('remark','','trim,strip_tags');
		$simId = input('simId','','trim,strip_tags');
	
		$result = Db::name('tel_line')->where('id', $simId)->update($data);
		
		if ($result){
		
			 return returnAjax(0,'success!');		
		}
		else{
			 return returnAjax(1,'failure!');
		}

	
		
	}

	//获取设备信息
	public function getLineInfo(){
		$id = input('id','','trim,strip_tags');
		$slist = Db::name('tel_line')->where('id', $id)->find();		
		echo json_encode($slist,true);
	}
	
	//删除设备
	public function delLine(){
		$ids= input('id/a','','trim,strip_tags');
		$list = Db::name('tel_line')->where('id','in', $ids)->delete();
	
		if(!$list){
			echo "删除失败。";
		}
	}
	public function setLineStatus(){

		$sId = input('sId','','trim,strip_tags');
		$status = input('status','','trim,strip_tags');
		
		$data=array();
		$data['status'] = $status;

		$list = Db::name('tel_line')->where('id',$sId)->update($data);

	   if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'error!',"失败");
		}
	}
	
	//添加设备信息
	public function addDevice(){

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		
		$data = array();
		$data['owner'] = $uid;
		$data['name'] = htmlspecialchars_decode(input('name','','trim,strip_tags'));
		$data['number'] = input('number','','trim,strip_tags');
		$data['dial_format'] = input('dial_format','','trim,strip_tags');
		$data['type'] = input('type','','trim,strip_tags');
		$data['desc'] = input('desc','','trim,strip_tags');
		
		$result = Db::name('tel_device')->insertGetId($data);
	
		if ($result){
			return returnAjax(0,'success!');		
		}
		else{
			return returnAjax(1,'failure!');
		}


		
	}
	
	//编辑设备信息
	public function editDevice(){

		$data = array();
		$data['name'] = htmlspecialchars_decode(input('name','','trim,strip_tags'));
		$data['dial_format'] = input('dial_format','','trim,strip_tags');
		$data['number'] = input('number','','trim,strip_tags');
		$data['type'] = input('type','','trim,strip_tags');
		$data['desc'] = input('desc','','trim,strip_tags');
		
		$deviceId = input('deviceId','','trim,strip_tags');
	
		$result = Db::name('tel_device')->where('id', $deviceId)->update($data);
		
		if ($result){
		
			 return returnAjax(0,'success!');		
		}
		else{
			 return returnAjax(1,'failure!');
		}

	
		
	}

	//获取设备信息
	public function getDeviceInfo(){
		$id = input('id','','trim,strip_tags');
		$slist = Db::name('tel_device')->where('id', $id)->find();		
		echo json_encode($slist,true);
	}
	
	
	//删除设备
   public function delDevice(){
		$ids= input('id/a','','trim,strip_tags');
		$list = Db::name('tel_device')->where('id','in', $ids)->delete();
	
		if(!$list){
			echo "删除失败。";
		}
	}
	 public function robot(){
	  		 
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		$IdList = getSubordinateId(); //下级Id数组	

		$where = array();

	
		$list = Db::name('tel_sim')->where($where)->where('member_id','in', $IdList)->order('id desc')
		->paginate(10, false, array('query'  =>  $this->param));

		$page = $list->render();
		$list = $list->toArray();


		$this->assign('list', $list['data']);
		$this->assign('page', $page);
	  					

		return $this->fetch();
		
  	}
  
  	public function simPage(){
	  		 
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		$where = array();
		if(!$super){
			$where['member_id'] = $uid;
		}
	  	$id = input('id','','trim,strip_tags');

		$where['device_id'] = $id;

		$list = Db::name('tel_sim')->where($where)->order('position asc')
		->paginate(10, false, array('query'  =>  $this->param));

		$page = $list->render();
		$list = $list->toArray();

		foreach ($list['data'] as $k=>$v){

			$device = Db::name('tel_device')->field("name")->where('id',$v["device_id"])->find();
			$list['data'][$k]["devicename"] = $device["name"];
			
			$memberInfo = Db::name('admin')->field("username")->where('id',$v["member_id"])->find();
			$list['data'][$k]["username"] = $memberInfo["username"];
		
		}
		
		
		$this->assign('thisId', $id);

		$this->assign('list', $list['data']);
		$this->assign('page', $page);
	  					
   
		if($super){
			
			$result = Db::name('admin')->where(array('status'=>1,'super'=>0))->select();

		}
		else{
			
			
			$IdList = getSubordinateId(); //下级Id数组	
			$result = Db::name('admin')->where(array('status'=>1,'super'=>0))->where('id','in', $IdList)->select();
			
				
		}
	
		$this->assign('memberList', $result);
	

		return $this->fetch();
  	}

	//添加设备信息
	public function addSim(){

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		
		$data = array();
		$data['member_id'] = input('member_id','','trim,strip_tags');
		$data['phone'] = htmlspecialchars_decode(input('phone','','trim,strip_tags'));
		$data['call_prefix'] = input('call_prefix','','trim,strip_tags');
		
		
		$sim = Db::name('tel_sim')->where('phone', $data['phone'])->find();		
		if ($sim){
			return returnAjax(1,'号码已存在!');	
		}		
		
		$data['device_id'] = input('deviceId','','trim,strip_tags');
		$data['position'] = input('position','0','trim,strip_tags');
		$data['remark'] = input('remark','','trim,strip_tags');
	    $data['status'] = 1;
		$result = Db::name('tel_sim')->insertGetId($data);
	
		if ($result){
			
			 return returnAjax(0,'success!');		
		}
		else{
			 return returnAjax(1,'failure!');
		}
		
	}
	
	//编辑设备信息
	public function editSim(){

		$data = array();
		$data['phone'] = htmlspecialchars_decode(input('phone','','trim,strip_tags'));
		$data['position'] = input('position','0','trim,strip_tags');
		$data['member_id'] = input('member_id','','trim,strip_tags');
		$data['call_prefix'] = input('call_prefix','','trim,strip_tags');
		$data['remark'] = input('remark','','trim,strip_tags');
		$simId = input('simId','','trim,strip_tags');
	
		$result = Db::name('tel_sim')->where('id', $simId)->update($data);
		
		if ($result){
		
			 return returnAjax(0,'success!');		
		}
		else{
			 return returnAjax(1,'failure!');
		}

	
		
	}

	//获取设备信息
	public function getSimInfo(){
		$id = input('id','','trim,strip_tags');
		$slist = Db::name('tel_sim')->where('id', $id)->find();		
		echo json_encode($slist,true);
	}
	
	//删除设备
	public function delSim(){
		$ids= input('id/a','','trim,strip_tags');
		$list = Db::name('tel_sim')->where('id','in', $ids)->delete();
	
		if(!$list){
			echo "删除失败。";
		}
	}
	
	// 修改状态
	public function setSimStatus(){

		$sId = input('sId','','trim,strip_tags');
		$status = input('status','','trim,strip_tags');
		
		$data=array();
		$data['status'] = $status;

		$list = Db::name('tel_sim')->where('id',$sId)->update($data);

	   if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'error!',"失败");
		}
	}
	
	
	// 获取用户列表
	public function getUser(){

		$usertype = input('usertype','','trim,strip_tags');
		$account = input('account','','trim,strip_tags');
		
		$where = array(); 
	
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		if(!$super){

			$where['pid'] = $uid;
			$list = Db::name('admin')->field("id,username,realname,user_type")->where($where)->select();
			
			$zero = array();
			$first = array();
			$second = array();
			$third = array();
			
			//第一轮循环
			foreach($list as $lkey => &$lval){
				
				if($usertype != "" && $usertype == $lval["user_type"]){
					
					array_push($zero,$lval);
								
				}else if($usertype == ""){
					
					array_push($zero,$lval);
				}
				
				
				if($lval['user_type'] > 1){
					
					$condition = array();					
					$condition['pid'] = $lval["id"];				
					$result = Db::name('admin')->field("id,username,realname,user_type")->where($condition)->select();
					
					if(count($result)){
					
						//第二轮循环	
											
						foreach($result as $rkey => &$rval){
							
							if($usertype != "" && $usertype == $rval["user_type"]){
								array_push($first,$rval);			
							}else if($usertype == ""){
								array_push($first,$rval);
							}
							
														
							if($rval['user_type'] > 1){
								
								$rtion = array();								
								$rtion['pid'] = $rval["id"];				
								$return = Db::name('admin')->field("id,username,realname,user_type")->where($rtion)->select();
								
								if(count($return)){
								
									//第三轮循环						
									foreach($return as $tkey => &$tval){
										
										if($usertype != "" && $usertype == $tval["user_type"]){
											array_push($second,$tval);			
										}else if($usertype == ""){
											array_push($second,$tval);
										}
										
										if($tval['user_type'] > 1){
											
											$ntion = array();											
											$ntion['pid'] = $tval["id"];				
											$res = Db::name('admin')->field("id,username,realname,user_type")->where($ntion)->select();
											
											if(count($res)){
												//$third = $res;
												foreach($res as $thkey => &$thval){										
													if($usertype != "" && $usertype == $thval["user_type"]){
														array_push($third,$thval);			
													}else if($usertype == ""){
														array_push($third,$thval);
													}
												}
																						
											}
											
										}
									}
									
									
								}
								
							}
							
							
						}
						
						
					}
					
				}
			}
			
			/*\think\Log::record('zero='.json_encode($zero));											
			\think\Log::record('first='.json_encode($first));
			\think\Log::record('second='.json_encode($second));
			\think\Log::record('third='.json_encode($third));
			\think\Log::record('list='.json_encode($list));*/
		
			$list = $zero;	
			if(count($first)){
				$list = array_merge($list, $first);
			}
			
			if(count($second)){
				$list = array_merge($list, $second);
			}
			
			if(count($third)){
				$list = array_merge($list, $third);
			}
				

			// \think\Log::record('list='.json_encode($list));
			 
		  /*  $myself = Db::name('admin')->field("id,username,realname,user_type")->where("id",$uid)->find();
			array_push($list,$myself);*/
			
		/*	$you = Db::name('admin')->field("id,username,realname,user_type")
			->where("username",$account)->where("user_type",$usertype)->find();
			array_push($list,$you);*/
		
		}
		else{
			
			if($usertype != ""){
				$where['user_type'] = $usertype;
			}
			else{
				$where['user_type'] = ['>', 1];	
			}
			
			if($account != ""){
				$where['username'] = $account;
			}

			
			$where['id'] = ['<>', $uid];	
			
		
		
			$list = Db::name('admin')->field("id,username,realname,user_type")->where($where)->select();
	
		}
		
	
		foreach($list as $keys => &$item){
			
			switch ($item['user_type']) {
				case 1:
					$list[$keys]['type'] = '销售';
					break;
		
				case 2:
					$list[$keys]['type'] = '商家';
					break;
		
				case 3:
					$list[$keys]['type'] = '代理商';
					break;
					
				case 4:
					$list[$keys]['type'] = '运营商';
					break;	
		
				default:
					$list[$keys]['type'] = '普通';
			}
			
				
			if($account != ""){
				
				if($item['username'] != $account){
					unset($list[$keys]);
				}
				
			}
		
			
			
		}
		
		sort($list);


	    if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'error!',"暂无数据");
		}
		
		
	}
	
	//保存数据
	public function saveAsr(){
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		
		$data = array();
		$data['name'] = input('name','','trim,strip_tags');
		$data['remark'] = htmlspecialchars_decode(input('remark','','trim,strip_tags'));
		$data['pid'] = input('asr_list','','trim,strip_tags');
		$data['member_id'] = input('nameuserId','','trim,strip_tags');

		$data['price'] = input('saleprice','0','trim,strip_tags');
	    $data['status'] = 1;
	    
	    $data['create_time'] = time();
	
	    $pline = Db::name('tel_line')->where("id",$data['pid'])->find();
	    $data['phone'] = $pline['phone'];
	    $data['inter_ip'] = $pline['inter_ip'];
	    $data['dial_format'] = $pline['dial_format'];
	    
	    $data['call_prefix'] = $pline['call_prefix'];
	    $data['gateway'] = $pline['gateway'];
	    $data['type'] = $pline['type'];
	    $data['name'] = $pline['name'];
	   
	    $data['phone'] = $pline['phone'];
	    $data['inter_ip'] = $pline['inter_ip'];
	    $data['dial_format'] = $pline['dial_format'];
	    $data['call_prefix'] = $pline['call_prefix'];
	    $data['gateway'] = $pline['gateway'];
    
	    	
		$result = Db::name('tel_line')->insertGetId($data);
	
		if($result){
			
			return returnAjax(0,'success!');		
		}
		else{
			return returnAjax(1,'failure!');
		}
		
		
	}
	
	
	//线路配置的，获取所有线路
	public function distribution(){
		
		
		$Id = input('Id','','trim,strip_tags');
		
		$where = array(); 
		$where['status'] = 1;
		
		if($Id != ""){
			$where['member_id'] = $Id;
		}
		
		$list = Db::name('tel_line')->field("id,name,pid,price,remark,create_time")->where($where)->select();
		
		foreach($list as $keys => &$item){
			
			if($item['create_time']){
				$list[$keys]['create_time'] = date("Y-m-d H:i:s",$item['create_time']);
			}
			
			if($item['pid']){
				$pline = Db::name('tel_line')->field("price")->where("id",$item['pid'])->find();
				if($pline['price']){
					$list[$keys]['costPrice'] = $pline['price'];
				}
				else{
					$list[$keys]['costPrice'] = 0;
				}
				
			}
			else{
					$list[$keys]['costPrice'] = 0;
			}
		
			
		}
	

	    if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'暂无数据!');
		}
		
		
	}
	
	//删除线路配置
	public function delAsr(){
		
		$ids= input('id','','trim,strip_tags');
		$list = Db::name('tel_line')->where('id', $ids)->delete();
	
		if(!$list){
			echo "删除失败。";
		}
		
	}

	//线路配置的，获取所有线路
	public function getAsr(){
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		
		$where = array(); 
		$where['status'] = 1;
		$where['member_id'] = $uid;
		
		$list = Db::name('tel_line')->field("id,name")->where($where)->order('id desc')->select();

	    if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'暂无数据!');
		}

	}
	
	
	//线路配置的，获取所有线路
	public function dusertype(){
		
		$admintype = admintype();
 		
 		return returnAjax(0,'成功',$admintype);
	}
	

	

}