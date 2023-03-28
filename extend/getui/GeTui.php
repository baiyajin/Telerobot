<?php
namespace getui;
import('getui.IGt',EXTEND_PATH,'.Push.php');

//import('getui.igetui.IGt',EXTEND_PATH,'.AppMessage.php');
//import('getui.igetui.IGt',EXTEND_PATH,'.APNPayload.php');
//import('getui.igetui.template.IGt',EXTEND_PATH,'.BaseTemplate.php');
//import('getui.IGt',EXTEND_PATH,'.Batch.php');
//import('getui.igetui.utils.AppConditions');
class GeTui {
	private $appId;
	private $appKey;
	private $masterSecret;
	private $host = "http://sdk.open.api.igexin.com/apiex.htm";
	/*
	* userType  是司机端、货主端、小程序
	* messageType  消息模板类型
	* 1.TransmissionTemplate:透传功能模板
    * 2.LinkTemplate:通知打开链接功能模板
    * 3.NotificationTemplate：通知透传功能模板
    * 4.NotyPopLoadTemplate：通知弹框下载功能模板
	*
	*/
	public function pushMessageToApp($userType,$messageType = 1,$message= null,$clientId = null,$token = ""){
		
		if ($userType == 0){  //货主
			$this->appId = "4O9xOsJm766USC6vW00Kz7";
			$this->appKey = "1k2I3rKA8F6ynWNEzmWY31";
			$this->masterSecret= "XRxO6a5UaN9HvNnuZSV3p3";
		}
		else if($userType == 1){ //司机
			$this->appId = "cbmlI3ryTCAO4OxiFEIQP9";
			$this->appKey = "8QGk6WtHSa7nmYjBVC3RU3";
			$this->masterSecret= "UXtkxJpyrt9hgrJxqvPMG8";
		}
		
		$igt = new \IGeTui($this->host, $this->appKey, $this->masterSecret);
		
		//消息模版
		if ($messageType == 1){
			$template = $this->transmissionTemplate($message);
		}
		else if($messageType == 2){
			$template = $this->linkTemplate($message);
		}
		else if($messageType == 3){
			$template = $this->notificationTemplate($message);
		}
		else if($messageType == 4){
			$template = $this->notyPopLoadTemplate($message);
		}

		//定义"SingleMessage"
		$message = new \IGtSingleMessage();
		$message->set_isOffline(true);//是否离线
		$message->set_offlineExpireTime(3600*12*1000);//离线时间
		$message->set_data($template);//设置推送消息类型
		$message->set_PushNetWorkType(0);
		
		//接收方
		$target = new \IGtTarget();
		$target->set_appId($this->appId);
		$target->set_clientId($clientId);
		//$target->set_alias(Alias);
		
		try {
			if ($token){
				$rep = $igt->pushAPNMessageToSingle($this->appId,$token, $message);
				return $rep;
			}
			else{
				$rep = $igt->pushMessageToSingle($message, $target);
				return $rep;
			}
		}
		catch(RequestException $e){
			if ($token){
				
				
			}
			else{
				$requstId =e.getRequestId();
				//失败时重发
				$rep = $igt->pushMessageToSingle($message, $target,$requstId);
				return $rep;
			}
		}
	}
	
	//透传功能模板
	private function transmissionTemplate($message){
		$template =  new \IGtTransmissionTemplate();
		$template ->set_appId($this->appId);//应用appid
		$template ->set_appkey($this->appKey);//应用appkey

		$template->set_transmissionType(1);//透传消息类型
		$template->set_transmissionContent($message['payload']);//透传内容

		//APN高级推送
		$apn = new \IGtAPNPayload();
		$alertmsg=new \DictionaryAlertMsg();
		$alertmsg->body="body";
		$alertmsg->actionLocKey="ActionLockey";
		$alertmsg->locKey= $message["content"];
		$alertmsg->locArgs= json_decode($message['payload'],true);//array("locargs");
		$alertmsg->launchImage="launchimage";
		//        IOS8.2 支持
		$alertmsg->title=$message["content"];
		$alertmsg->titleLocKey=$message["title"];
		$alertmsg->titleLocArgs= array("TitleLocArg");

		$apn->alertMsg=$alertmsg;
		$apn->badge=1;
		$apn->sound="";
		$apn->add_customMsg("payload", $message['payload']);
		$apn->contentAvailable=1;
		$apn->category="ACTIONABLE";
		$template->set_apnInfo($apn);
		return $template;
	}
	
	//通知弹框下载功能模板
	private function notyPopLoadTemplate($message){
		$template =  new \IGtNotyPopLoadTemplate();

		$template ->set_appId($this->appId);//应用appid
		$template ->set_appkey($this->appKey);//应用appkey
		//通知栏
		$template ->set_notyTitle($message["title"]);//通知栏标题
		$template ->set_notyContent($message["content"]);//通知栏内容
		$template ->set_notyIcon("");//通知栏logo
		$template ->set_isBelled(true);//是否响铃
		$template ->set_isVibrationed(false);//是否震动
		$template ->set_isCleared(true);//通知栏是否可清除
		//弹框
		$template ->set_popTitle("更新");//弹框标题
		
		if (isset($message['update_content'])){
			$template ->set_loadTitle($message['update_content']);
		}
		else{
			$template ->set_popContent("APP优化");//弹框内容
		}
		
		
		$template ->set_popImage("");//弹框图片
		$template ->set_popButton1("下载");//左键
		//$template ->set_popButton2("取消");//右键
		//下载
		$template ->set_loadIcon("");//弹框图片
		
		if (isset($message['download_title'])){
			$template ->set_loadTitle($message['download_title']);
		}
		else{
			$template ->set_loadTitle("龙宇物流");
		}
		
		$template ->set_loadUrl($message['url']);
		$template ->set_isAutoInstall(false);
		$template ->set_isActived(true);
		//$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息

		return $template;
	}
	
	//通知打开链接功能模板
	private function linkTemplate($message){
		$template =  new \IGtLinkTemplate();
		$template ->set_appId($this->appId);//应用appid
		$template ->set_appkey($this->appKey);//应用appkey
		$template->set_title($message['title']);//通知栏标题
		$template->set_text($message['content']);//通知栏内容
		$template ->set_logo("");//通知栏logo
		$template ->set_isRing(true);//是否响铃
		$template ->set_isVibrate(false);//是否震动
		$template ->set_isClearable(true);//通知栏是否可清除
		
		if (isset($message['url'])){
			$template ->set_url($message['url']);//打开连接地址
		}
		//$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息
		return $template;
	}
	
	//通知透传功能模板
	private function notificationTemplate($message){
		$template =  new \IGtNotificationTemplate();
		$template ->set_appId($this->appId);//应用appid
		$template ->set_appkey($this->appKey);//应用appkey
		$template->set_transmissionType(1);//透传消息类型
		if (isset($message['payload'])){
			$template->set_transmissionContent($message['payload']);//透传内容
		}
		
		$template->set_title($message['title']);//通知栏标题
		$template->set_text($message['content']);//通知栏内容
		
		$template->set_logo("");//通知栏logo
		$template->set_isRing(true);//是否响铃
		$template->set_isVibrate(false);//是否震动
		$template->set_isClearable(true);//通知栏是否可清除
		//$template->set_duration(BEGINTIME,ENDTIME); //设置ANDROID客户端在此时间区间内展示消息
		return $template;
	}
	
}


