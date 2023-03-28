<?php
namespace app\api\controller;
use app\common\controller\Base;
use think\Db;

class show extends Base{	
    
  public function _initialize(){
		parent::_initialize();
	}
   
  
	
 public function getRecord(){
	 
	 $result['code'] = $code;
	 $result['msg'] = $msg;
	 $result['data'] = $data;
	 $callerId = '1513503126861';
	 $call_preivx = '15';
	 echo count($call_preivx);
	 \think\Log::record('code='.$code.'#msg='.$msg.'#data='.json_encode($data));
	 return $result;	
	 
    //return returnAjax(0,"成功",$contentlist);
 }
		
}

?>