<?php
namespace app\api\controller;
use app\common\controller\Base;
use think\Db;

class Exhibition extends Base{	
    
  public function _initialize(){
		parent::_initialize();
		
		if (config('db_config1')){
			$this->connect = Db::connect('db_config1');
		}
		else{
			$this->connect = Db::connect();
		}
		
	}
   
  
	
 public function getRecord(){
	 
	 $result['code'] = 0;
	 $result['msg'] = "成功";
	 $result['data'] = array("a"=>1,"b"=>2);
	 
	 \think\Log::record('#data='.json_encode($result));
	  
	 return $result;	
	 
    //return returnAjax(0,"成功",$contentlist);
 }
 
 	
 	//返回提现记录
 	public function wxLogin(){
 		
 		$appid = 'wx0fa29400a56e5530'; //填写微信小程序appid  
    $secret = '52ebfa6949aa457955170a3a3986d680'; //填写微信小程序secret  
         
 		$loginCode = input('loginCode','','trim,strip_tags');
 		
 		 $params = [
 	        'appid' => $appid,
 	        'secret' => $secret,
 	        'js_code' => $loginCode,
 	        'grant_type' => "authorization_code"
 	    ];
 		
 		 $url = "https://api.weixin.qq.com/sns/jscode2session";
 		 $expire = 0; 
 		 $extend = array();
 		 $hostIp = '';
 		 
 	     $_curl = curl_init();
 	     $_header = array(
 	        'Accept-Language: zh-CN',
 	        'Connection: Keep-Alive',
 	        'Cache-Control: no-cache'
 	    );
 	    // 方便直接访问要设置host的地址
 	    if (!empty($hostIp)) {
 	        $urlInfo = parse_url($url);
 	        if (empty($urlInfo['host'])) {
 	            $urlInfo['host'] = substr(DOMAIN, 7, -1);
 	            $url = "http://{$hostIp}{$url}";
 	        } else {
 	            $url = str_replace($urlInfo['host'], $hostIp, $url);
 	        }
 	        $_header[] = "Host: {$urlInfo['host']}";
 	    }
 	
 	    // 只要第二个参数传了值之后，就是POST的
 	    if (!empty($params)) {
 	        curl_setopt($_curl, CURLOPT_POSTFIELDS, http_build_query($params));
 	        curl_setopt($_curl, CURLOPT_POST, true);
 	    }
 	
 	    if (substr($url, 0, 8) == 'https://') {
 	        curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, FALSE);
 	        curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, FALSE);
 	    }
 	    curl_setopt($_curl, CURLOPT_URL, $url);
 	    curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
 	    curl_setopt($_curl, CURLOPT_USERAGENT, 'API PHP CURL');
 	    curl_setopt($_curl, CURLOPT_HTTPHEADER, $_header);
 	
 	    if ($expire > 0) {
 	        curl_setopt($_curl, CURLOPT_TIMEOUT, $expire); // 处理超时时间
 	        curl_setopt($_curl, CURLOPT_CONNECTTIMEOUT, $expire); // 建立连接超时时间
 	    }
 	
 	    // 额外的配置
 	    if (!empty($extend)) {
 	        curl_setopt_array($_curl, $extend);
 	    }
 	
 	   $result = curl_exec($_curl);
 
 	   curl_close($_curl);
 	   $result = json_decode($result,true);
 	  
 	  if(isset($result["openid"])){
			
 	  	// \think\Log::record('result='.json_encode($result));
			 $return['code'] = 0;
			 $return['msg'] = "成功";
			 $return['data'] = $result;
			
 	     return $return;	
			 
 	  }else{
			
			$return['code'] = 1;
			$return['msg'] = "获取数据失败";
	
			return $return;	
 	  	
 	  }
 
 	}
 	
	//返回个人信息
	public function getPersonal(){  
		
		$openId = input('openId','','trim,strip_tags');
		$where['open_id'] = $openId;
		
		$list = Db::name('admin')
		        ->field('id,role_id,username,mobile,last_login_time')
					  ->where($where)
				  	->find();
						
		\think\Log::record('list='.json_encode($list));		
		//exit;
		
		if($list){
			
			$return['code'] = 0;
			$return['msg'] = "成功";
			$return['data'] = $list;
			
			return $return;	
			
		}else{
			
			$return['code'] = 1;
			$return['msg'] = "失败";
			return $return;	
			
		}
		
	}
 
  //检查个人信息
  public function checkPersonal(){
  	
		$mobile = input('mobile','','trim,strip_tags');
  	$openId = input('openid','','trim,strip_tags');
		
  	$where['mobile'] = $mobile;
  	
  	$list = Db::name('admin')->field('id')->where($where)->find();
  					
  	// \think\Log::record('list='.json_encode($list));		
  	
  	if($list){
			
			$update['open_id'] = $openId;
			$res = Db::name('admin')->where('id',$list["id"])->update($update);
			
			if ($res >= 0){
				$return['code'] = 0;
				$return['msg'] = "修改成功！";
				$return['data'] = $list;
				return $return;	
			}else{
				$return['code'] = 1;
				$return['msg'] = "没有该用户，请与客服联系。";
				return $return;
			}
		
  	
  		
  	}
		else{
  		
  		$return['code'] = 1;
  		$return['msg'] = "没有该用户，请与客服联系。";
  		return $return;	
  		
  	}
  	
		
  }
  
  
	//返回任务与计划列表
	public function getPlan(){
  	
		$id = input('id','','trim,strip_tags');
		$where['member_id'] = (int)$id;
		//获取任务
		$tlist = $this->connect->table('autodialer_task')->where($where)->order('uuid desc')->find();

  	//获取计划
  	$tglist = $this->connect->table('autodialer_timegroup')->where($where)->select();
		
	
  	// \think\Log::record('list='.json_encode($list));		
  	
		$res['tlist'] = $tlist;
		$res['tglist'] = $tglist;
		
  	if($tlist){
	    	return returnAjax(0,'获取数据成功！',$res);
  	}
		else{

			return returnAjax(1,"获取数据失败。");

  	}
  	
  }

	//返回话术列表
	public function getscenarios(){
	  	
		
	  	$openId = input('openid','','trim,strip_tags');
			
			$id = input('id','','trim,strip_tags');
	
	  	$where['member_id'] = $id;
	  	$where['is_tpl'] = 0;
			$list = Db::name('tel_scenarios')->where($where)->order('id desc')->select();
			
			//$group['group_uuid'] = $id;
	
		//	$grlist = Db::table('autodialer_timerange')->where($group)->select();
	  					
	  	// \think\Log::record('list='.json_encode($list));		
	  	
			//$res['list'] = $list;
			//$res['grlist'] = $grlist;
			
	  	if($list){
		    	return returnAjax(0,'获取数据成功！',$list);
	  	}
			else{
	
				return returnAjax(1,"获取数据失败。");
	
	  	}
	  	
	  } 
	
	 
	 //返回话术流程
	public function getflow(){
		
	
		//$openId = input('openid','','trim,strip_tags');
		
		$id = input('id','','trim,strip_tags');
		$type = input('type','0','trim,strip_tags');
		$where = array();
		$where['scenarios_id'] = $id;
		$where['type'] = $type;

		$list = Db::name('tel_flow')->where($where)->order('id asc')->select();
	
		foreach ($list as $k=>$v){
		
			$list[$k]["path"] = config('res_url').$v["path"];
		
		}
		
		$cwhere = array();
		$cwhere['scenarios_id'] = $id;
		$cwhere['type'] = ['>',0];;
		
		$cplist = Db::name('tel_flow')->where($cwhere)->order('id asc')->select();
		foreach ($cplist as $key=>$val){
		
			$cplist[$key]["path"] = config('res_url').$val["path"];
		
		}
		
		$result = Db::name('tel_keyword')->where('scenarios_id',$id)->order('id asc')->select();
	
		
		$res = array();
		$res['list'] = $list;
		$res['cplist'] = $cplist;
		$res['kwlist'] = $result;
	
		if($list){
				return returnAjax(0,'获取数据成功！',$res);
		}
		else{

			return returnAjax(1,"获取数据失败。");

		}
		
	} 
	
	//返回我的客户列表
	public function getcustomer(){
		

		$id = input('id','','trim,strip_tags');
		
		$status = input('status','','trim,strip_tags');
		$level = input('level','','trim,strip_tags');
		$keyword = input('keyword','','trim,strip_tags');
		$page = input('page','1','trim,strip_tags');

		$Page_size = 11;

		$where = array();
		$where["m.owner"] = $id;
		
		if($keyword != ''){
			$where["m.mobile"] = $keyword;
		}
		
		if($status != ''){
			$where["m.status"] = $status;
		}
		
		if($level != ''){
			$where["m.level"] = $level;
		}
		
		//$where["m.level"] = 0;

	//dump($where);exit;
   	$list = Db::name('member')
		->field('g.name,m.uid,m.username,m.nickname,m.mobile,m.reg_time,m.status,m.uid')
		->alias('m')
		->where($where)
		->join('member_group g','g.id = m.group_id','LEFT')
		->order('m.reg_time desc')
		->page($page,$Page_size)
		->select();
		
   	foreach ($list as $k=>$v){
			if($v["reg_time"]){
				$list[$k]["reg_time"] = date("Y-m-d H:i:s",$v["reg_time"]);
			}else{
				$list[$k]["reg_time"] = "";
			}
		}
		
	
		
		if($list){
				return returnAjax(0,'获取数据成功！',$list);
		}
		else{

			return returnAjax(1,"获取数据失败。");

		}
		
	} 
		
	//返回函数
	function returnAjax($code=0,$msg='success',$data=array()){
		$result['code'] = $code;
		$result['msg'] = $msg;
		$result['data'] = $data;
		
		\think\Log::record('code='.$code.'#msg='.$msg.'#data='.json_encode($data));
		return $result;	
	}
		
}

?>