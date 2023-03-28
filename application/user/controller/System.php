<?php
namespace app\user\controller;
use app\common\controller\User;
use think\Db;
use think\Session;
use \think\Config;
use Qiniu\json_decode;

class System extends User{

	public function _initialize()
	{
		parent::_initialize();
	}

	//快递设置（接口设置）
	public function pay()
	{
		if(IS_POST){

			$udata = array();
			$udata['mch_id'] = input('mchId','','trim,strip_tags');
			$udata['appid'] = input('appId','','trim,strip_tags');
			$udata['partnerkey'] = input('partnerkey','','trim,strip_tags');
			
			$udata['ssl_cer'] = input('sslcer','','trim,strip_tags');
			$udata['ssl_key'] = input('sslkey','','trim,strip_tags');
			$udata['wx_pay'] = input('wxpay','','trim,strip_tags');
			$udata['balance_pay'] = input('balancepay','','trim,strip_tags');
			$udata['cash_pay'] = input('cashpay','','trim,strip_tags');
			
			$wxUId = input('wxUId','','trim,strip_tags');
			
			$result = Db::name('wx_user')->where('id',$wxUId)->update($udata);
		
			if($result){
				  return returnAjax(1,'设置成功',$result);
			}else{
			      return returnAjax(0,'设置失败',0);
			} 
		
		}else{
			
			$list = Db::name('wx_user')->field('id,wxname,mch_id,appid,partnerkey,ssl_cer,ssl_key,wx_pay,balance_pay,cash_pay')
			->where('is_default', 1)->find();
			
			if(!$list){
				return  "<div>请先设置好默认微信公众号</div>";
			}
			
			$this->assign('list', $list);
			
			$sslcer = array();
			$sslcer['sslcer'] = $list['ssl_cer'];
			$this->assign('sslcer',$sslcer);
			
			$sslkey = array();
			$sslkey['sslkey'] = $list['ssl_key'];
			$this->assign('sslkey',$sslkey);
			
			return  $this->fetch();
			
			
		}

	}

	

	//系统设置
	public function setting()
	{
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
			
	
		if(IS_POST){
	
			$data = array();
	
			$data['name'] = input('websitename','','trim,strip_tags');
			$domain = input('websiteURL','','trim,strip_tags');
			if (stripos($domain, 'http://') === false){
				$domain = 'http://'.$domain;
			}
			
			$res = Db::name('admin')->field("super")->where('id', $uid)->find();
			if($res["super"] < 1){
				$return = $this->CheckUrl($domain);
				if(!$return){
					return returnAjax(1,"非管理员'官方网址'不可以填写ip地址，只能是域名",$return);
				}
				
			}
			
			

			$data['domain'] = $domain ;
			$data['address'] = input('Contactaddress','','trim,strip_tags');
			$data['desc'] = input('desc','','trim,strip_tags');
			$data['logo'] = input('cover','','trim,strip_tags');
			$data['icp'] = input('Websiterecordnumber','','trim,strip_tags');
			$data['contact'] = input('contactmode','','trim,strip_tags');
			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			$data['owner'] = $uid;
			
			$configId = input('configId','','trim,strip_tags');
	
	
			if($configId){
	
				$result = Db::name('site')->where('domain', $configId)->update($data);
	
			}else{
	
				$result = Db::name('site')->insertGetId($data);
			}
				
			$url = 	$data['domain'];
			if($result !== false){
				return returnAjax(0,"配置成功", $url);
			}
			else{
				return returnAjax(1,"配置失败");
			}
	
				
		}else{
	
			
			
			$domainurl = $_SERVER['HTTP_HOST']; 
	    
		    if (stripos($domainurl, 'http://') === false){
				$domainurl = 'http://'.$domainurl;
			}
				
			
			$res = Db::name('site')->where('domain', $domainurl)->find();
			
		 
			
			$this->assign('res', $res);
			
			$cover = array();
			if(isset($res["logo"]) && $res["logo"] > 0){

				$list = Db::name('picture')->field('path')->where('id', $res["logo"])->find();
				if($list['path']){
				   $cover['cover'] = $list["path"];
				}

			}
           
         	
			$this->assign('cover', $cover);
				
			return $this->fetch();
				
		}
	
	}

	
	
	//检测域名格式

	function CheckUrl($C_url){
	   
	
		 $str="/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/";
		   
		
		 if (!preg_match($str,$C_url)){
		 
		
			return false;
		  
			
		 }else{
		
		
		  	return true;
		  
		 
		 }
	
	
	}


	public function notification(){
	
	
		$res = Db::name('config')->where('group', 37)->find();
		$this->assign('res', $res);
			
		return  $this->fetch();
	
	}
	
	public function smsConfigure(){
	
		if(IS_POST){
	
			$data = array();
				
			$data['status'] = input('status','','trim,strip_tags');
			$data['accessKeyId'] = input('accessKeyId','','trim,strip_tags');
			$data['accessKeySecret'] = input('accessKeySecret','','trim,strip_tags');
			$data['signName'] = input('signName','','trim,strip_tags');
			$data['templateCode'] = input('templateCode','','trim,strip_tags');
	
			$configId = input('configId','','trim,strip_tags');
				
				
			$insertdata = array();
			$insertdata['name'] = 'ALIYUN_SMS';	
			$insertdata['value'] = serialize($data);
			
			if($configId){
					
				$result = Db::name('config')->where('group', 37)->update($insertdata);
					
			}
			else{
					
				$insertdata['group'] = 37;
				$result = Db::name('config')->insertGetId($insertdata);
			}
	
	
			if($result){
					
				return returnAjax(0,"成功");
					
			}else{
					
				return returnAjax(1,"失败");
					
			}
	
	
		}else{
	
			$res = Db::name('config')->where('group', 37)->find();
				
			$extra = unserialize($res['value']);
				
			$this->assign('extra', $extra);
	
			$this->assign('res', $res);
	
				
			return  $this->fetch();
	
		}
	
	
	}
	
	public function businessNotice(){
	
	
		if(IS_POST){
				
			$data = array();
				
			$data['sign'] = input('sign','','trim,strip_tags');
			$data['phoneNumber'] = input('phoneNumber','','trim,strip_tags');
			$data['content'] = input('content','','trim,strip_tags');
				
			$configId = input('configId','','trim,strip_tags');
				
				
			$insertdata = array();
			//$insertdata['title'] = '基础设置';
			$insertdata['value'] = serialize($data);
				
			//var_dump($configId, $insertdata);exit;
				
			if($configId){
	
				$result = Db::name('config')->where('group', 37)->update($insertdata);
	
			}else{
	
				$insertdata['group'] = 37;
				$result = Db::name('config')->insertGetId($insertdata);
			}
				
				
			if($result){
	
				return returnAjax(0,"成功");
	
			}else{
	
				return returnAjax(1,"失败");
	
			}
				
				
		}else{
				
			$res = Db::name('config')->where('group', 37)->find();
				
			$value = unserialize($res['value']);
				
			$this->assign('value', $value);
				
			$this->assign('res', $res);
				
				
			return  $this->fetch();
				
		}
	
	
	
	}
	
	public function setstatus(){
	
	
		$arrayIds = input('arrayIds/a','','trim,strip_tags');
	
		$status = input('status','','trim,strip_tags');
	
		//	var_dump($arrayIds,$status);exit;
	
		$data=array();
		$data['status'] = $status;
		$list =Db::name('config')->where('group','in',$arrayIds)->update($data);
	
		if($list){
			return returnAjax(0,'修改成功',$list);
		}else{
			return returnAjax(1,'error!',"修改失败");
		}
	
		//	var_dump($_POST);exit;
	
	}
	
	
	//话术场景主界面
	public function interfacePage(){

			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			$super = $user_auth["super"];
			
			$IdList = getSubordinateId(); //下级Id数组	
			
			$where = array();
			if(!$super){
				$where['owner'] = ['in',$IdList];
			}
			
			$list = Db::name('tel_interface')->where($where)->order('id desc')
			->paginate(10, false, array('query'  =>  $this->param));
	
			$page = $list->render();
			$list = $list->toArray();
			
			foreach ($list['data'] as $k=>$v){
				
				$admin = Db::name('admin')->field("username")->where('id',$v["owner"])->find();
				
				$list['data'][$k]["username"] = $admin["username"];
		
			
			}
			
			$this->assign('list', $list['data']);
			$this->assign('page', $page);

			$vrs = config('view_replace_str');
			
			$path = ".".$vrs["__STATIC__"]. '/smartivr.json';


			$json_string = file_get_contents($path);
			$data = json_decode($json_string, true);
			
			$this->assign('jsdata',$json_string);

			
			return $this->fetch();
			
	}
		
	//添加计划 
	public function addInterface(){

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		
		$data = array();
		$data['owner'] = $uid;
		$data['recognition_type'] = input('recognition','','trim,strip_tags');
		$data['app_key'] = htmlspecialchars_decode(input('app_key','','trim,strip_tags'));
		$data['app_id'] = htmlspecialchars_decode(input('app_id','','trim,strip_tags'));
		$data['app_secret'] = htmlspecialchars_decode(input('app_secret','','trim,strip_tags'));
		$data['type'] = input('type','','trim,strip_tags');
		$data['status'] = 0;
		
		if($data['type'] == 'aliyun'){
			
			$where = array();
			$where['type'] = 'aliyun';
			$where['owner'] = $uid;
			$where['recognition_type'] = $data['recognition_type'];
			
			$slist = Db::name('tel_interface')->where($where)->find();
			if (is_array($slist) && count($slist)){
				return returnAjax(1,'阿里云的只能有一个');
			}
			
		}
		
		$result = Db::name('tel_interface')->insertGetId($data);
	
		if ($result){
      
			$this->savejson();	
				
			$back = array();
			return returnAjax(0,'success!',$back);		
			
		}
		else{
			 return returnAjax(1,'failure!');
		}
		
	}
	
	public function savejson(){
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		
		$where = array();
		$where['owner'] = $uid;
		$list = Db::name('tel_interface')->where($where)->order('id desc')->select();
		
		$aiuiv2 = array();
		$aliyun = array();
		$baidu = array();
		$iflytek = array();
		$enable = array();
		$alyunAppkey = "";
		
		$ttsAiuiv2 = array();
		$ttsAliyun = array();
		$ttsBaidu = array();
		$ttsIflytek = array();
		$ttsEnable = array();
		$ttsAlyunAppkey = "";

		foreach ($list as $key=>$val){
			  
			$temp = array();
			$temp['id'] = $val['app_id'];
			$temp['secret'] = $val['app_secret'];
				
			//	recognition_type 1是tts 0是ssr
			if($val['recognition_type']){
				switch ($val['type'])
				{
					case 'baidu':	
						array_push($ttsBaidu,$temp);
						break;
					case 'aliyun':
						$ttsAlyunAppkey = $val['app_key'];
						array_push($ttsAliyun,$temp);
						break;
					case 'xfyun':
						array_push($ttsAiuiv2,$temp);
						break;
					case 'xfyunSDK':
						$temp = array();
						$temp['id'] = $val['app_key'];
						array_push($ttsIflytek,$temp);
						break;
							
					default:
						//echo "No number between 1 and 3";
				}
			}
			else{
				
				switch ($val['type'])
				{
					case 'baidu':	
						array_push($baidu,$temp);
						break;
					case 'aliyun':
						$alyunAppkey = $val['app_key'];
						array_push($aliyun,$temp);
						break;
					case 'xfyun':
						array_push($aiuiv2,$temp);
						break;
					case 'xfyunSDK':
						$temp = array();
						$temp['id'] = $val['app_key'];
						array_push($iflytek,$temp);
						break;
							
					default:
						//echo "No number between 1 and 3";
				}
	
			}
		}
		
		//ssr的
		if(count($aiuiv2) > 0){
			array_push($enable,"aiuiv2");
		}
		if(count($aliyun) > 0){
			array_push($enable,"aliyunv2");
		}
		if(count($baidu) > 0){
			array_push($enable,"baidu");
		}
		if(count($iflytek) > 0){
			array_push($enable,"iflytek");
		}
	


		//tts 的
		if(count($ttsAiuiv2) > 0){
			array_push($ttsEnable,"xfyun"); 
		}
		if(count($ttsAliyun) > 0){
			array_push($ttsEnable,"aliyunv2");
		}
		if(count($ttsBaidu) > 0){
			array_push($ttsEnable,"baidu");
		}
		if(count($ttsIflytek) > 0){
			array_push($ttsEnable,"iflytek");
		}
		
		
		$vrs = config('view_replace_str');
					
		$path = ".".$vrs["__STATIC__"]. '/smartivr.json';


		$json_string = file_get_contents($path);
		$savedata = json_decode($json_string, true);
		
		//asr 的数据			
		$savedata['asr']['aiuiv2']['keylist'] = $aiuiv2;
		$savedata['asr']['aliyunv2']['appkey'] = $alyunAppkey;
		$savedata['asr']['aliyunv2']['keylist'] = $aliyun;
		$savedata['asr']['baidu']['keylist'] = $baidu;
		$savedata['asr']['iflytek']['keylist'] = $iflytek;
		$savedata['asr']['enable'] = $enable;
		
		//TTS接口 的数据	
		$savedata['tts']['aiuiv2']['xfyun'] = $ttsAiuiv2;
		$savedata['tts']['aliyunv2']['keylist'] = $ttsAliyun;
		$savedata['tts']['aliyunv2']['appkey'] = $ttsAlyunAppkey;
		$savedata['tts']['baidu']['keylist'] = $ttsBaidu;
		$savedata['tts']['iflytek']['keylist'] = $ttsIflytek;
		$savedata['tts']['enable'] = $ttsEnable;
		
		//system
		$record = array();
		$record['path'] = '/var/smartivr/uploads/asrdir';
		$record['folderformat'] = "%Y%m%d";
		
		$tts = array();
		$tts['path'] = "/var/smartivr/ttsdir";
		
		$gender = array();
		$gender['host'] = "/tmp/dd_cgi";
		$gender['times'] = 0;
		$gender['path'] = "/var/smartivr/bin/gender";
		
		$system = array();
		$system['record'] = $record;
		$system['tts'] = $tts;
		$system['gender'] = $gender;
		
		//da
		$connect = array();
		$connect['addr'] = "127.0.0.1";
		$connect['port'] = 9977;
		$connect['reConnectInterval'] = 15000;
		$connect['timer'] = 5000;
	
		$da = array();
		$da['connect'] = $connect;
		$da['key'] = "";
		
		//加到$savedata 中
		$savedata['system'] = $system;
		$savedata['da'] = $da;
		
		
		
		/*设置保存路径*/
		$savePath = './uploads/asrapi/';
		// 如果不存在则创建文件夹
		if (!is_dir($savePath)){
				mkdir($savePath); 
		}  
		$savename = $uid.'_smartivr_'.time().'.json'; 
		$itempath = $savePath.$savename;
		
		$savejson = json_encode($savedata, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
		file_put_contents($itempath,$savejson);
		
		$userInfo = Db::name('admin')->field('asr_api_name')->where('id', $uid)->find();
		if ($userInfo && $userInfo['asr_api_name']){			
			if (file_exists($savePath.$userInfo['asr_api_name'])){
				unlink($savePath.$userInfo['asr_api_name']);
			}
		}
		
		$ret = Db::name('admin')->where('id', $uid)->update(array('asr_api_name'=>$savename));
		if ($ret === false){
			\think\Log::record('savejson->update admin failure');
		}
		
	}
	
	//编辑计划
	public function editInterface(){

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		
		$data = array();
		$data['recognition_type'] = input('recognition','','trim,strip_tags');
		$data['app_id'] = htmlspecialchars_decode(input('app_id','','trim,strip_tags'));
		$data['app_key'] = htmlspecialchars_decode(input('app_key','','trim,strip_tags'));
		$data['app_secret'] = htmlspecialchars_decode(input('app_secret','','trim,strip_tags'));
		$data['type'] = input('type','','trim,strip_tags');
		
		$interfaceId = input('interfaceId','','trim,strip_tags');
		
		if($data['type'] == 'aliyun'){
			
			$where = array();
			$where['type'] = 'aliyun';
			$where['owner'] = $uid;
			$where['id'] = ['<>',$interfaceId];
			$where['recognition_type'] = $data['recognition_type'];
			
			$slist = Db::name('tel_interface')->where($where)->find();
			if (is_array($slist) && count($slist)){
				return returnAjax(1,'阿里云的只能有一个');
			}
			
		}
	
		$result = Db::name('tel_interface')->where('id', $interfaceId)->update($data);
		
		if ($result !== false){
		   $this->savejson();	
			 return returnAjax(0,'success!');		
		}
		else{
			 return returnAjax(1,'failure!');
		}
		
	}

	//获取计划信息
	public function getInterfaceInfo(){
		$id = input('id','','trim,strip_tags');
		$slist = Db::name('tel_interface')->where('id', $id)->find();
		
		echo json_encode($slist,true);
	}

		// 修改状态
	public function setInterfaceStatus(){

		$sId = input('ifId','','trim,strip_tags');
		$status = input('status','','trim,strip_tags');
		
		$data=array();
		$data['status'] = $status;
	
		$list = Db::name('tel_interface')->where('id',$sId)->update($data);
	
		 if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'error!',"失败");
		}
	}	
	
	//删除计划
	public function delInterface(){
		
		$ids= input('id/a','','trim,strip_tags');
		$list = Db::name('tel_interface')->where('id','in', $ids)->delete();
		
	  $this->savejson();	
		
		if(!$list){
			echo "删除失败。";
		}
	}
	


	
}













