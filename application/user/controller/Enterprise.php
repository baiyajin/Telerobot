<?php
namespace app\user\controller;
use app\common\controller\User;
use think\Db;
use think\Session;
use \think\Config;
use Qiniu\json_decode;

class Enterprise extends User{

	
public function _initialize()
{
	parent::_initialize();
	
}	

//企业账户
public function account()
{
	
	$user_auth = session('user_auth');
	$uid = $user_auth["uid"];
	$super = $user_auth["super"];
	
	$this->assign('super', $super);


	$list = Db::name('admin')->field('id,username')->select();
	$this->assign('list', $list);

	return  $this->fetch();
	
}


//返回子账户的首页信息
public function getInformation(){
	
	$user_auth = session('user_auth');
	$uid = $user_auth["uid"];
	$super = $user_auth["super"];
	
	$result = Db::name('admin')
			  ->field("username,realname,money,logo,expiry_date,create_time,robot_cnt")
			  ->where('id', $uid)->find();
	
	if($result['logo'] && is_numeric($result['logo'])){
		$result['headImg'] = get_image($result['logo']);
	}else{
		$result['headImg'] = $result['logo'];
	}
 
	$result['expiry_date'] = date('Y-m-d H:i:s', $result['expiry_date']);
	$result['create_time'] = date('Y-m-d H:i:s', $result['create_time']);
	
	$where = array();
	//$where['member_id'] = $uid;
	$where['bridge'] = array('EXP','IS NOT NULL');
	
	
	$IdList = getSubordinateId(); //下级Id数组
	
	$cflist = Db::name('tel_config')->where('member_id','in', $IdList)->where($where)->count(1);

	$sum = array();
	//$sum['member_id'] = $uid;
	$sum['status'] = ['>',0];
    $rnum = Db::name('tel_config')->where($sum)->where('member_id','in', $IdList)->sum('robot_cnt');
    $rnum = $result['robot_cnt'] - $rnum;
    if($rnum < 0){
		$rnum = 0;
    }
    $result['rnum'] = $rnum;
    
    
    $aiset = array();
    $aiset['pid'] = $uid;
    $aiset['open_tsr'] = 1;
    $aiset['user_type'] = 1; // user_type 1 是员工（销售）
    
	$ainum = Db::name('admin')->where($aiset)->count(1);

	$backdata = array();
	$backdata['mresult'] = $result;
	$backdata['count'] = $cflist;
	$backdata['ainum'] = $ainum;
	
	if($result){
		return returnAjax(0,"成功",$backdata);	
	}else{	
		return returnAjax(1,"失败");	
	}
	
}


//传入页码，返回订购充值的列表数据，分页的。
public function getorderRecharge(){
	
	$pageSize = 10;
	$page = input('page','1','trim,strip_tags');
	
	
	$startTime = input('startTime','','trim,strip_tags');
	$endDate = input('endDate','','trim,strip_tags');
	$ownerps = input('ownerps','','trim,strip_tags');
	
	$user_auth = session('user_auth');
	$uid = $user_auth["uid"];
	$super = $user_auth["super"];
	
	
	
	$userInfo = Db::name('admin')->field("user_type,super")->where('id', $uid)->find();
	switch($userInfo['user_type']){
		
		case 1:
		case 2:
			$moneyField = 'o.money';
			$priceField = 'o.time_price';
		break;
		case 3:
			$moneyField = 'o.agent_money';
			$priceField = 'o.agent_price';
		break;
		case 4:
			$moneyField = 'o.operator_money';
			$priceField = 'o.operator_price';
		break;
		default:
			if ($userInfo['super']){
				$moneyField = 'o.admin_money';
				$priceField = 'o.admin_price';
			}
			else{
				$moneyField = 'o.money';
				$priceField = 'o.time_price';
			}
	}
	
	
	$where = array();
	if($startTime && $endDate){
		$where["o.create_time"] = ["between time",[$startTime,$endDate]];
	}
	
	
	if($ownerps){
		
		$result = Db::name('admin')->field("id")->where('username', $ownerps)->find();
		$where["o.owner"] = $result['id'];

	}
	else{
		
		$IdList = getSubordinateId(); //下级Id数组	
		
		if(!$super){
			$where['o.owner'] = ['in',$IdList];
		}
	}
	
	
	$list = Db::name('tel_order')
				->alias('o')
				->field('o.id,o.owner,o.member_id,o.mobile,o.duration,o.create_time,
				o.asr_price,o.asr_cnt,
				a.username as ausername,'.$moneyField.' as money,'.$priceField.' as time_price')
				->join('admin a','o.owner = a.id')
				
				->where($where)
				->page($page,$pageSize)
				->order('o.create_time desc')
				->select();
					
		
	foreach ($list as $keys => &$item) {
	    if ($item['create_time'] > 0){
			$item['create_time'] = date('Y-m-d H:i:s', $item['create_time']);
		}
		else{
			$item['create_time'] = "";
		}
	}
	
	
	
	$count = Db::name('tel_order')->alias('o')->where($where)->sum($moneyField);
	

	$pagecount = Db::name('tel_order')
					->alias('o')
					->join('admin a','o.owner = a.id')
					->where($where)
					->count(1);
	

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


//传入页码，返回消耗流水的列表数据
public function getConsume(){

	$pageSize = 10;
	$page = input('page','1','trim,strip_tags');
	
	$endTime = input('endTime','','trim,strip_tags');
	$startDate = input('startDate','','trim,strip_tags');
	$personal = input('personal','','trim,strip_tags');
	$status = input('status','','trim,strip_tags');

	$user_auth = session('user_auth');
	$uid = $user_auth["uid"];
	$super = $user_auth["super"];

	$where = array();
	//$where["t.owner"] = $uid;
	
	if($startDate && $endTime){
		$where["t.create_time"] = ["between time",[$startDate,$endTime]];
	}
	
	if($status != ""){
		$where["t.status"] = $status;
	}
	
	if($personal){		
		$result = Db::name('admin')->field("id")->where('username', $personal)->find();				
		$where["t.owner"] = $result['id'];
	}
	else{		
		$IdList = getSubordinateId(); //下级Id数组		
		if(!$super){
			$where['t.owner'] = ['in',$IdList];
		}

	}
	


	$list = Db::name('tel_deposit')
				->alias('t')
				->field('t.id,t.owner,t.menoy,t.type,t.status,t.create_time,t.deposit_type,a.username,t.balance,t.oper')
				->join('admin a','t.owner = a.id','LEFT')
				->where($where)
				->page($page,$pageSize)
				->select();
	
	foreach($list as &$item){
		$oper = Db::name('admin')->field("username")->where('id', $item['oper'])->find();
		$item['operName'] = $oper['username'];
		if (!$item['balance']){
			$item['balance'] = 0.00;
		}
		if($item['create_time']){
			$item['create_time'] = date('Y-m-d H:i:s', $item['create_time']);
		}
		
	}

	
	$where = array();
	//$where["owner"] = $uid;
	if($personal){
		
		$result = Db::name('admin')->field("id")->where('username', $personal)->find();
				
		$where["owner"] = $result['id'];

	}else{
		
		if(!$super){
			$where['owner'] = ['in',$IdList];
		}

	}
	
	$count = Db::name('tel_deposit')->where($where)->sum('menoy');
	
	$pagecount = Db::name('tel_deposit')->where($where)->count(1);

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



//传入页码，返回订购充值的列表数据，分组、分页的。
public function getGrouping(){
	
	$pageSize = 10;
	$page = input('page','1','trim,strip_tags');
	
	
	$startTime = input('startTime','','trim,strip_tags');
	$endDate = input('endDate','','trim,strip_tags');
	$cpyName = input('cpyName','','trim,strip_tags');
	
	$user_auth = session('user_auth');
	$uid = $user_auth["uid"];
	$super = $user_auth["super"];
	
	$where = array();
	
	
	if($startTime && $endDate){
		
		$startTime = strtotime($startTime);
		$startTime = date('Y-m-d', $startTime);
		
		$endDate = strtotime($endDate);
		$endDate = date('Y-m-d', $endDate);
		
		$where["o.create_time"] = ["between time",[$startTime,$endDate]];
		
	}
	
	$userInfo = Db::name('admin')->field("user_type,super")->where('id', $uid)->find();
	switch($userInfo['user_type']){
		
		case 1:
		case 2:
			$moneyField = 'o.money';
			$priceField = 'o.time_price';
		break;
		case 3:
			$moneyField = 'o.agent_money';
			$priceField = 'o.agent_price';
		break;
		case 4:
			$moneyField = 'o.operator_money';
			$priceField = 'o.operator_price';
		break;
		default:
			if ($userInfo['super']){
				$moneyField = 'o.admin_money';
				$priceField = 'o.admin_price';
			}
			else{
				$moneyField = 'o.money';
				$priceField = 'o.time_price';
			}
	}
	
	if($cpyName){
		
		$where["o.owner"] = $cpyName;

	}else{
		
		$IdList = getSubordinateId(); //下级Id数组	
		
		if(!$super){
			$where['o.owner'] = ['in',$IdList];
		}

	}
	
		$list = Db::name('tel_order')
					->alias('o')
					->field('o.id,o.owner,o.member_id,o.mobile,sum('.$moneyField.') as money,sum(o.duration) as duration,o.create_time,
					FROM_UNIXTIME(o.create_time,"%Y-%m-%d") days,
					sum(o.asr_cnt) as asr_cnt')
					->join('admin a','o.owner = a.id','LEFT')
					
					->where($where)->group('days')->order('o.create_time desc')
					->page($page,$pageSize)
					->select();
					
		
	foreach ($list as $keys => &$item) {
	
	  if ($item['create_time'] > 0){
			$item['create_time'] = date('Y-m-d', $item['create_time']);
		}
		else{
			$item['create_time'] = "";
		}

	}
	

		$count = Db::name('tel_order')->alias('o')
				->join('admin a','o.owner = a.id','LEFT')
				
				->where($where)->sum($moneyField);
		
		$pagecount = Db::name('tel_order')->alias('o')
					->join('admin a','o.owner = a.id','LEFT')
					
					->where($where)->group('o.create_time')->count(1);
	
	
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













