<?php
namespace app\user\controller;
use app\common\controller\User;
use think\Db;
use think\Session;

class Help extends User{
	
		
	public function _initialize() {
		parent::_initialize();
	
		$request = request();
		$action = $request->action();

	}
	
		//用户手册
 	public function index(){
 		
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

?>