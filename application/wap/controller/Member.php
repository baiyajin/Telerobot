<?php
namespace app\wap\controller;
use think\Db;
use app\common\controller\Base;
use think\Session;

class Member extends Base{
	
	public function _initialize(){
		
		parent::_initialize();
		$request = request();
		$this->controller = $request->controller();
		$this->action = $request->action();
		$this->clientIp = $request->ip(0,true);
		$this->domain =  $request->domain();
		$this->accessUrl =  $request->url(true);
		
		$this->token =  input('token','','trim,strip_tags');
		$this->openId =  input('openId','','trim,strip_tags');
		
		$tmpScopeType =  input('scopeType','','trim,strip_tags');
		
	
	}
	
	//商业 企业
	public function callResult(){

			$uuid = input('id','','trim,strip_tags');
		
	
			$memberInfo = Db::name('tel_call_record')
						 ->field('mobile,status,level,duration,last_dial_time,record_path,call_times')
						 ->where('call_id',$uuid)
						 ->find();
			
			//var_dump($memberInfo);exit;
			$bills = Db::name('tel_bills')->where('call_id',$uuid)->order('id asc')->select();

			$num = Db::name('tel_bills')->where('status',1)->where('call_id',$uuid)->count(1);

			if($memberInfo){

				if (isset($memberInfo['sex'])){
					$memberInfo['sex'] = $memberInfo['sex']?'女':'男';
				}
				else{
					$memberInfo['sex'] = '未知';
				}
				$memberInfo['nickname'] = isset($memberInfo['nickname'])? $memberInfo['nickname']:'--';
				
				$memberInfo['last_dial_time'] = date('Y-m-d H:i:s', $memberInfo['last_dial_time']);
				$memberInfo['record_path'] = config('record_audio_url').$memberInfo['record_path'];
				$strstatus = "未拨打";

				switch ($memberInfo['status']) {
					case '2':
						$strstatus = "已接通";
						break;
					case '3':
						$strstatus = "无人接听";
						break;
					case '4':
						$strstatus = "停机";
						break;
					case '5':
						$strstatus = "空号";
						break;
					case '6':
						$strstatus = "正在通话中";
						break;
					case '7':
						$strstatus = "关机";
						break;
					case '8':
						$strstatus = "用户拒接";
						break;
					case '9':
						$strstatus = "网络忙";
						break;
					case '10':
						$strstatus = "来电提醒";
						break;
					case '11':
						$strstatus = "呼叫转移失败";
						break;
					default:
						$strstatus = "--";
				}
				$memberInfo['status'] = $strstatus;
				
				
			
				$data = array();
				$data['memberInfo'] = $memberInfo;
				$data['bills'] = $bills;
                $data['num'] = $num;

				$this->assign('list',$data);

				 // var_dump($data);
				// exit;

			}else{

			  $this->assign('list', array());

			}
			
			
	       return $this->fetch();

	}



}
	
?>
	   