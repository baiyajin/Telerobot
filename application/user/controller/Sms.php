<?php
namespace app\user\controller;
use app\common\controller\User;
// use app\common\model\Sms;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use think\Db;
use think\Session;

class Sms extends User{


	public function _initialize() {
		parent::_initialize();
	
		$request = request();
		$action = $request->action();
	
	}
	
	//短信通道
	public function channel()
	{

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
	
		if (IS_POST) {

			$data = array();
			if (!$super){
				$data['owner'] = $uid;
			}

			$data['name'] = input('celName','','trim,strip_tags');
			$data['url'] = input('iAddress','','trim,strip_tags');
			$data['user_id'] = input('account_id','','trim,strip_tags');
			$data['access_secret'] = input('account','','trim,strip_tags');

			$data['password'] = input('acpsw','','trim,strip_tags');
			$data['count'] = input('quantity','','trim,strip_tags');
			
			$codePrice = input('codePrice','','trim,strip_tags');
			$noticePrice = input('noticePrice','','trim,strip_tags');
			$marketingPrice = input('marketingPrice','','trim,strip_tags');
			$price = array();
			$price['codePrice'] = $codePrice;
			$price['noticePrice'] = $noticePrice;
			$price['marketingPrice'] = $marketingPrice;
			
			$data['price'] = serialize($price);
			
			$data['is_default'] = input('default','','trim,strip_tags');
			$data['status'] = 1;
			$data['remarks'] = input('remarks','','trim,strip_tags');
		

			$channelId = input('channelId','','trim,strip_tags');

		    if($channelId){
		    	$data['update_time'] = time();
				$result = Db::name('sms_channel')->where('id', $channelId)->update($data);
		    }else{
		    	$data['create_time'] = time();
				$result = Db::name('sms_channel')->insertGetId($data);
		    }
			


			if($result){
			  return returnAjax(0,'保存成功',$result);
			}else{
			  return returnAjax(1,'保存失败');
			}		



		}
		else{

			$where = array();
			$keyword = input('keyword','','trim,strip_tags');
			if($keyword){
			 $where['name'] = $keyword;
			}
			
			
			$IdList = getSubordinateId(); //下级Id数组	

			if(!$super){
				// $where['owner'] = $uid;
				$where['owner'] = [['=',0],['in',$IdList],'OR'];
			}

			$list = Db::name('sms_channel')->order('create_time desc')->where($where)
							->paginate(10, false, array('query'  =>  $this->param));
		
			$page = $list->render();
			$list = $list->toArray();
			
			foreach ($list['data'] as $k=>$v){
				
				if($v["price"]){
					
					$temp = unserialize($v["price"]);
				  
					$price = "";
					if(isset($temp["codePrice"]) && $temp["codePrice"] > 0){
						$price = $price."验证码类单价：".$temp["codePrice"]."元    ";
					}
					
					if(isset($temp["noticePrice"]) && $temp["noticePrice"] > 0){
						$price = $price."通知类类单价：".$temp["noticePrice"]."元    ";
					}
					
					if(isset($temp["marketingPrice"]) && $temp["marketingPrice"] > 0){
						$price = $price."营销类类单价：".$temp["marketingPrice"]."元";
					}
					
					$list['data'][$k]["price"] = $price;

					
				}
	
			}
			
	
			$this->assign('list', $list['data']);
			$this->assign('page', $page);

			return $this->fetch();

		}
	

	}
   
   //获取微信通道，用来编辑
	public function getChannel()
	{
		$id = input('id');
		$result =  Db::name('sms_channel')->where('id', $id)->find();
		
		$result["price"] = unserialize($result["price"]);


		if($result){
			return returnAjax(0,'有数据了',$result);
		}else{
			return returnAjax(1,'获取数据失败');
		}		
	}

 	// 删除通道
 	public function delChannel(){
		
			$ids = input('ids/a','','trim,strip_tags');//接收数组

			$list = Db::name('sms_channel')->where('id','in', $ids)->delete();

			if($list){
				return returnAjax(0,'成功',$list);
			}else{
				return returnAjax(1,'error!',"失败");
			}
			
	}

	// 短信签名
	public function signature(){

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];

				
		if (IS_POST) {

			$data = array();
			$data['owner'] = $uid;
			$data['name'] = input('autograph','','trim,strip_tags');
			$data['status'] = 0;


			$signid = input('signid','','trim,strip_tags');

		    if($signid){
		    	$data['update_time'] = time();
					$result = Db::name('sms_sign')->where('id', $signid)->update($data);
		    }else{
		    	$data['create_time'] = time();
					$result = Db::name('sms_sign')->insertGetId($data);
		    }
			


			if($result){
			  return returnAjax(0,'保存成功',$result);
			}else{
			  return returnAjax(1,'保存失败');
			}		



		}
		else{

			$where = array();
			$keyword = input('keyword','','trim,strip_tags');
			if($keyword){
			 $where['name'] = $keyword;
			}

			/*if(!$super){
				$where['owner'] = $uid;
			}*/
			$IdList = getSubordinateId(); //下级Id数组	

			$list = Db::name('sms_sign')->order('create_time desc')->where($where)->where('owner','in', $IdList)
							->paginate(10, false, array('query'  =>  $this->param));
		
			$page = $list->render();
			$list = $list->toArray();
			
			foreach ($list['data'] as $k=>$v){
					if($v["create_time"]){
						$list['data'][$k]["create_time"] = date("Y-m-d H:i:s",$v["create_time"]);
					}else{
						$list['data'][$k]["create_time"] = "--";
					}
			}
			
	
			$this->assign('isSuper', $super);
	
			$this->assign('list', $list['data']);
			$this->assign('page', $page);

			return $this->fetch();

		}
	

	}
	
	//获取签名，用来编辑
	public function getSign()
	{
		$id = input('id');
		$result =  Db::name('sms_sign')->where('id', $id)->find();
		
		if($result){
			return returnAjax(0,'有数据了',$result);
		}else{
			return returnAjax(1,'获取数据失败');
		}		
	}

  // 删除短信签名
  public function delSign(){
		
			$ids = input('ids/a','','trim,strip_tags');//接收数组

			$list = Db::name('sms_sign')->where('id','in', $ids)->delete();

			if($list){
				return returnAjax(0,'成功',$list);
			}else{
				return returnAjax(1,'error!',"失败");
			}
			
	}
	
	//修改签名状态
	public function setSignStatus(){

		$sId = input('sId','','trim,strip_tags');
		$status = input('status','','trim,strip_tags');
		
		$data=array();
		$data['status'] = $status;

		$list = Db::name('sms_sign')->where('id',$sId)->update($data);

		 if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'error!',"失败");
		}
	}

	
	// 短信模板
	public function template(){


		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];

				
		if (IS_POST) {

			$data = array();
			$data['owner'] = $uid;
			$data['channel_id'] = input('tplChannel','','trim,strip_tags');
			$data['sign_id'] = input('tplSign','','trim,strip_tags');
			$data['name'] = input('tplName','','trim,strip_tags');
			$data['type'] = input('tplType','','trim,strip_tags');
			$data['conent'] = input('templateInfo','','trim,strip_tags');
			$data['price'] = input('tplPrice','','trim,strip_tags');

			$data['status'] = 0;


			$tplId = input('tplId','','trim,strip_tags');

			if($tplId){
				$data['update_time'] = time();
			$result = Db::name('sms_template')->where('id', $tplId)->update($data);
			}else{
				$data['create_time'] = time();
			$result = Db::name('sms_template')->insertGetId($data);
			}
			
			if($result){
			  return returnAjax(0,'保存成功',$result);
			}else{
			  return returnAjax(1,'保存失败');
			}		

		}
		else{

			$where = array();
			$keyword = input('keyword','','trim,strip_tags');
			if($keyword){
			 $where['name'] = $keyword;
			}
			
			/*if(!$super){
				$where['owner'] = $uid;
			}*/
			
			$IdList = getSubordinateId(); //下级Id数组

			$list = Db::name('sms_template')->order('create_time desc')->where($where)->where('owner','in', $IdList)
							->paginate(10, false, array('query'  =>  $this->param));
		
			$page = $list->render();
			$list = $list->toArray();
			
			foreach ($list['data'] as $k=>$v){
				if($v["create_time"]){
					$list['data'][$k]["create_time"] = date("Y-m-d H:i:s",$v["create_time"]);
				}else{
					$list['data'][$k]["create_time"] = "--";
				}

				$sign = Db::name('sms_sign')->field('name')->where("id",$v["sign_id"])->find();
				if($sign){
					$list['data'][$k]["signName"] = $sign["name"];
				}
				
			}
			
	
			$this->assign('list', $list['data']);
			$this->assign('page', $page);

			$ch = array();
			
			$ch['owner'] = [['=',0],['=',$uid],'OR'];
			$ch['status'] = 1; 
			
			$this->assign('isSuper', $super);


			$channellist = Db::name('sms_channel')->field('id,name,price')->where($ch)->select();
			
			foreach ($channellist as $k=>$v){
					
					if($v["price"]){
						
						$temp = unserialize($v["price"]);

						$channellist[$k]["price"] = $temp;
	
						
					}
		
			}
				
			//var_dump($channellist);exit;
				
			$this->assign('channellist', $channellist);
		

			$signlist = Db::name('sms_sign')->field('id,name')->where($ch)->select();
			$this->assign('signlist', $signlist);

			return $this->fetch();

		}
	
	}

	//获取模板，用来编辑
	public function getTemplate() 
	{
		$id = input('id');
		$result =  Db::name('sms_template')->where('id', $id)->find();
		
		if($result){
			return returnAjax(0,'有数据了',$result);
		}else{
			return returnAjax(1,'获取数据失败');
		}		
	}

	//修改模板状态
	public function setTplStatus(){

		$sId = input('sId','','trim,strip_tags');
		$status = input('status','','trim,strip_tags');
		
		$data=array();
		$data['status'] = $status;

		$list = Db::name('sms_template')->where('id',$sId)->update($data);

		 if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'error!',"失败");
		}
	}

	// 删除短信签名
	public function delTpl(){

		$ids = input('ids/a','','trim,strip_tags');//接收数组

		$list = Db::name('sms_template')->where('id','in', $ids)->delete();

		if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'error!',"失败");
		}
			
	}

	// 发送短信
	public function sendSms(){
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];  

			
		if (IS_POST) {
			$owner = $uid;
			$mobile = input('mobile','','trim,strip_tags');
			$templateId = input('tpl','','trim,strip_tags');
			
			//发送短信
			$result = sendMsg($owner, $templateId, $mobile);
			if($result){
  				return returnAjax(0,'发送成功');
			}else{
				return returnAjax(1,'发送失败');
			}
		}
		else{

			$ch = array();
			/*if(!$super){
				$ch['owner'] = $uid;
			}*/
			$ch['status'] = 1; 
			
			$IdList = getSubordinateId(); //下级Id数组	

			$tpllist = Db::name('sms_template')->field('id,name,conent')->where('owner','in', $IdList)->where($ch)->select();
			$this->assign('tpllist', $tpllist);

			return $this->fetch();
		}
	}
	
	//发送短信
	public function sendMsg_old($tid,$mobile){
		
			
			$send = array();
			$send['number'] = '122333';
			$send['mobile'] = $mobile;
			
			$con = array();
			$con['number'] = $tpllist['name'];
			$con['mobile'] = $tpllist['conent'];

			$para = "{\"name\":\"郭涛\",\"number\":\"316\"}";
     
			$smsConfig = [
				'accessKeyId' => $chlist['user_id'],                 // your appid
				'accessKeySecret' => $chlist['access_secret'],         // your app_secret
				'signName'    => $signlist['name'],                    // your 签名
				'templateCode' => 'SMS_119910993',         // your 模板编号
			]; 
				
			$client  = new Client($smsConfig);
			$sendSms = new SendSms;
			$sendSms->setPhoneNumbers($send['mobile']);
			$sendSms->setSignName($smsConfig['signName']);
			$sendSms->setTemplateCode($smsConfig['templateCode']);
			
			if($tpllist['type'] == '0'){
				$sendSms->setTemplateParam(['code' => $send['number']]);
			}else if($tpllist['type'] == '1'){
				$sendSms->setTemplateParam(['product' => $tpllist['conent']]);
			}else{
				$sendSms->setTemplateParam(['product' => $tpllist['conent']]);
			}
			
			$sendSms->setOutId('demo');
			$resp = $client->execute($sendSms);
			$result = json_decode(json_encode($resp),true);

			if (isset($result['Code']) && $result['Code'] == 'OK'){
				return True;
			}else{
				
				return False;
	
			}
			\think\Log::record('sms inferface failure='.json_encode($result));

	}
	
	// 发送记录
	public function sendRecord(){


		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		$where = array();
		$mobile = input('mobile','','trim,strip_tags');
		if($mobile){
		 $where['mobile'] = $mobile;
		}
		$status = input('status','','trim,strip_tags');
		if($status != ""){
		 $where['status'] = $status;
		}
		$tpl = input('tpl','','trim,strip_tags');
		if($tpl){
		 $where['template_id'] = $tpl;
		}

		$sTime = input('sTime','','trim,strip_tags');
		$eTime = input('eTime','','trim,strip_tags');
		if($sTime && $eTime){
			$where["create_time"] = ["between time",[$sTime,$eTime]];
		}


		/*if(!$super){
		 $where['owner'] = $uid;
		}*/
		
		$IdList = getSubordinateId(); //下级Id数组	

		$list = Db::name('sms_record')->order('create_time desc')->where($where)->where('owner','in', $IdList)
						->paginate(10, false, array('query'  =>  $this->param));
	
		$page = $list->render();
		$list = $list->toArray();
		
		foreach ($list['data'] as $k=>$v){

			if($v["create_time"]){
				$list['data'][$k]["create_time"] = date("Y-m-d H:i:s",$v["create_time"]);
			}else{
				$list['data'][$k]["create_time"] = "--";
			}

			$tpl = Db::name('sms_template')->field('name')->where("id",$v["template_id"])->find();
			if($tpl){
				$list['data'][$k]["tplName"] = $tpl["name"];
			}
		}
		

		$this->assign('list', $list['data']);
		$this->assign('page', $page);


		$ch = array();
		if(!$super){
		 $ch['owner'] = $uid;
		}
		$ch['status'] = 1; 

		$tpllist = Db::name('sms_template')->field('id,name')->where($ch)->select();
		$this->assign('tpllist', $tpllist);

		return $this->fetch();
		
	}
	
	// 每日统计
	public function statistics(){

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];

		$this->assign('super', $super);

		$list = Db::name('admin')->field('id,username')->select();
		$this->assign('adlist', $list);
		
	  return $this->fetch();
		
	}

	
	//传入页码，返回每日统计的列表数据，分组、分页的。
	public function statisticsAjax(){
		
		$pageSize = 10;
		$page = input('page','1','trim,strip_tags');
		
		$where = array();
	
		$sTime = input('sTime','','trim,strip_tags');
		$eTime = input('eTime','','trim,strip_tags');
		if($sTime && $eTime){
			$where["create_time"] = ["between time",[$sTime,$eTime]];
		}

		$status = input('status','','trim,strip_tags');
		if($status != ""){
		 $where['status'] = $status;
		}
		
		$username = input('username','','trim,strip_tags');
		if($username){
			$where['owner'] = $username;
		}

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		if(!$super){
		 $where['owner'] = $uid;
		}
		
		$list = Db::name('sms_record')->field('sum(money) as money,count(1) as total,create_time,
					FROM_UNIXTIME(create_time,"%Y-%m-%d") days,owner')
					->where($where)->group('days')->order('days desc')
					->page($page,$pageSize)
					->select();
		

// 		foreach ($list as $keys => &$item) {
// 		
// 		  if ($item['create_time'] > 0){
// 				$item['create_time'] = date('Y-m-d', $item['create_time']);
// 			}
// 			else{
// 				$item['create_time'] = "--";
// 			}
// 	
// 		}
		
			$where = array();
			$where["owner"] = $uid;
	
	
			$count = Db::name('sms_record')
					->where($where)->sum('money');
			
			$pagecount = Db::name('sms_record')
						->where($where)->group('create_time')->count(1);
		
		
		//$count = Db::name('tel_order')->where($where)->count('id');
		$pageCount = ceil($pagecount/$pageSize);
		
		$back = array();
		$back['total'] = $count;
		$back['Nowpage'] = $page;
		$back['list'] = $list;
		$back['page'] = $pageCount;
		
		if($list){
			return returnAjax(0,"获取数据成功",$back);
		}else{
			return returnAjax(1,"失败");
		}
		
	
	}
	
	
	
}