<?php
// +----------------------------------------------------------------------
// | RuiKeCMS [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.ruikesoft.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Wayne <wayne@ruikesoft.com> <http://www.ruikesoft.com>
// +----------------------------------------------------------------------

/**
 * select返回的数组进行整数映射转换
 *
 * @param array $map  映射关系二维数组  array(
 *                                          '字段名1'=>array(映射关系数组),
 *                                          '字段名2'=>array(映射关系数组),
 *                                           ......
 *                                       )
 * @author 朱亚杰 <zhuyajie@topthink.net>
 * @return array
 *
 *  array(
 *      array('id'=>1,'title'=>'标题','status'=>'1','status_text'=>'正常')
 *      ....
 *  )
 *
 */
function int_to_string(&$data, $map = array('status' => array(1 => '正常', -1 => '删除', 0 => '禁用', 2 => '未审核', 3 => '草稿'))) {
	if ($data === false || $data === null) {
		return $data;
	}
	$data = (array) $data;
	foreach ($data as $key => $row) {
		foreach ($map as $col => $pair) {
			if (isset($row[$col]) && isset($pair[$row[$col]])) {
				$data[$key][$col . '_text'] = $pair[$row[$col]];
			}
		}
	}
	return $data;
}

/**
 * 获取对应状态的文字信息
 * @param int $status
 * @return string 状态文字 ，false 未获取到
 * @author huajie <banhuajie@163.com>
 */
function get_status_title($status = null) {
	if (!isset($status)) {
		return false;
	}
	switch ($status) {
	case -1:return '已删除';
		break;
	case 0:return '禁用';
		break;
	case 1:return '正常';
		break;
	case 2:return '待审核';
		break;
	default:return false;
		break;
	}
}

// 获取数据的状态操作
function show_status_op($status) {
	switch ($status) {
	case 0:return '启用';
		break;
	case 1:return '禁用';
		break;
	case 2:return '审核';
		break;
	default:return false;
		break;
	}
}

/**
 * 获取行为类型
 * @param intger $type 类型
 * @param bool $all 是否返回全部类型
 * @author huajie <banhuajie@163.com>
 */
function get_action_type($type, $all = false) {
	$list = array(
		1 => '系统',
		2 => '用户',
	);
	if ($all) {
		return $list;
	}
	return $list[$type];
}

/**
 * 获取行为数据
 * @param string $id 行为id
 * @param string $field 需要获取的字段
 * @author huajie <banhuajie@163.com>
 */
function get_action($id = null, $field = null) {
	if (empty($id) && !is_numeric($id)) {
		return false;
	}
	$list = cache('action_list');
	if (empty($list[$id])) {
		$map       = array('status' => array('gt', -1), 'id' => $id);
		$list[$id] = db('Action')->where($map)->field(true)->find();
	}
	return empty($field) ? $list[$id] : $list[$id][$field];
}

/**
 * 根据条件字段获取数据
 * @param mixed $value 条件，可用常量或者数组
 * @param string $condition 条件字段
 * @param string $field 需要返回的字段，不传则返回整个数据
 * @author huajie <banhuajie@163.com>
 */
function get_document_field($value = null, $condition = 'id', $field = null) {
	if (empty($value)) {
		return false;
	}

	//拼接参数
	$map[$condition] = $value;
	$info            = db('Model')->where($map);
	if (empty($field)) {
		$info = $info->field(true)->find();
	} else {
		$info = $info->value($field);
	}
	return $info;
}


//返回下级Id数组，如果是超级管理员，则返回全部admin的Id，否则，返回下级Id（包括自己的Id）
function getSubordinateId(){

	$user_auth = session('user_auth');
	$uid = $user_auth["uid"];
	$super = $user_auth["super"];  // 1是超级管理员，0不是
	
	$back = array();
	
    if($super){
    	
		$list = db('admin')->field('id')->select();	
		
		foreach($list as $key => &$val){
			array_push($back,$val["id"]);
		}
		
	}else{
		
	
		$where = array();			
		$where['pid'] = $uid;
		$list = db('admin')->field("id,user_type")->where($where)->select();
		
		$zero = array();
		$first = array();
		$second = array();
		$third = array();
		
		//第一轮循环
	
		foreach($list as $lkey => &$lval){
	
			array_push($zero,$lval["id"]);
		
			if($lval['user_type'] > 1){
				
				$condition = array();					
				$condition['pid'] = $lval["id"];				
				$result = db('admin')->field("id,user_type")->where($condition)->select();
				
				if(count($result)){
				
					//第二轮循环	
										
					foreach($result as $rkey => &$rval){
					
						array_push($first,$rval["id"]);
												
						if($rval['user_type'] > 1){
							
							$rtion = array();								
							$rtion['pid'] = $rval["id"];				
							$return = db('admin')->field("id,user_type")->where($rtion)->select();
							
							if(count($return)){
							
								//第三轮循环						
								foreach($return as $tkey => &$tval){
									
									array_push($second,$tval["id"]);
									
									
									if($tval['user_type'] > 1){
										
										$ntion = array();											
										$ntion['pid'] = $tval["id"];				
										$res = db('admin')->field("id,user_type")->where($ntion)->select();
										
										if(count($res)){
											
											foreach($res as $thkey => &$thval){										
												
												array_push($third,$thval["id"]);
												
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
		
	
		$back = $zero;	
		if(count($first)){
			$back = array_merge($back, $first);
		}
		
		if(count($second)){
			$back = array_merge($back, $second);
		}
		
		if(count($third)){
			$back = array_merge($back, $third);
		}
			
		// \think\Log::record('list='.json_encode($list));
		
		array_push($back,$uid);
	
		
	}
	
	
	return $back;
	
	// dump($back);exit;

	
}



//线路配置的，获取所有线路
function admintype(){
	
	$user_auth = session('user_auth');
	$uid = $user_auth["uid"];
	
	$where = array(); 
	$where['id'] = $uid;
	
	$list = db('admin')->field("super,user_type")->where($where)->find();
	
	$back = array(); 
	
	if($list['super']){
		$back[] = array("id"=>0,"name"=>"超级管理员");
		$back[] = array("id"=>4,"name"=>"运营商");
		$back[] = array("id"=>3,"name"=>"代理商"); 
		$back[] = array("id"=>2,"name"=>"商家");		
	}
	else{
			
		switch ($list['user_type']) {
			case 1:			  
				//$back[] = array();
				break;
	
			case 2:				
				$back[] = array("id"=>2,"name"=>"商家"); 
				break;
	
			case 3:	
				//$back[] = array("id"=>3,"name"=>"代理商");
				$back[] = array("id"=>2,"name"=>"商家"); 
				break;
				
			case 4:
				//$back[] = array("id"=>4,"name"=>"运营商");
				$back[] = array("id"=>3,"name"=>"代理商"); 
				$back[] = array("id"=>2,"name"=>"商家");				
				break;	
	
			default:
				//$back[0] = array();
		}

	}

    if($list){
		return $back;
	}else{
		return '暂无数据!';
	}

}


	
	