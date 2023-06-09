<?php
namespace extend\PHPExcel;
namespace extend\PHPExcel\PHPExcel;
namespace app\user\controller;
use app\common\controller\User;
use think\Db;
use think\Session;
use Qiniu\json_decode;

class Plan extends User{

	private $connect;
	
	
	public function _initialize() {
		parent::_initialize();
	
		$request = request();
		$action = $request->action();
		if (config('db_config1')){
			$this->connect = Db::connect('db_config1');
		}
		else{
			$this->connect = Db::connect();
		}
	}
	
	//话术场景主界面
	public function index()
	{
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		$where = array();
   		if(!$super){
   			$where['member_id'] = (int)$uid;
   		}
		
		$gatewayUser = config('notify_url');
		if ($gatewayUser){
			$where['call_notify_url'] = $gatewayUser;
		}
		
		if (config('db_config1')){
			$this->connect = Db::connect('db_config1');
		}
		else{
			$this->connect = Db::connect();
		}
		
		$list = $this->connect->table('autodialer_task')->where($where)->order('uuid desc')->paginate(10, false, array('query'  =>  $this->param));
		
		$page = $list->render();
		$list = $list->toArray();
			
		foreach ($list['data'] as $key => $value) {

				$config = Db::name('tel_config')->where("task_id",$value['uuid'])->find();
				$scenarios = Db::name('tel_scenarios')->field('name')->where("id",$config['scenarios_id'])->find();
				$list['data'][$key]['scenarios'] = $scenarios['name'];
				
				$list['data'][$key]['bridge'] = $config['bridge'];
				$where = array();
				$where['phone'] = $config['phone'];
				if ($config['call_type'] == 0){
					$sim = Db::name('tel_sim')->field('phone')->where($where)->find();
					$list['data'][$key]['phone'] = '网关'.$sim['phone'];
				}
				else{
					$sim = Db::name('tel_line')->field('phone')->where($where)->find();
					$list['data'][$key]['phone'] = '线路'.$sim['phone'];
				}
		}
		

		$this->assign('super', $super);
		$this->assign('list', $list['data']);
		$this->assign('page', $page);
		
		 return $this->fetch();
		
	
	}
	//话术场景主界面
	public function newindex()
	{
		
			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			$super = $user_auth["super"];
			
			$taskName = input('taskName','','trim,strip_tags');
        	$createTime = input('createTime','','trim,strip_tags');
			$status = input('status','','trim,strip_tags');
			
			$where = array();
		
			if(!$super){
				
				//$IdList = getSubordinateId(); //下级Id数组
				$where['member_id'] = $uid;
			}
			
			if($status){
				$where['status'] = $status;
			}
			else{
				$where['status'] = ['>',-1];	
			}
			
			if($taskName){
				$where['task_name'] = ['like',"%".$taskName."%"]; 
			}
			$where['type'] = 0;	
			
		    if($createTime){
			
				$list = Db::name('tel_config')->where($where)->whereTime('create_time', $createTime)->order('id desc')->select();
			
			}
			else{
				
				$list = Db::name('tel_config')->where($where)->order('id desc')->select();
			
			}
		
			foreach ($list as $key => $value) {
		
						//$config = Db::name('tel_config')->where("task_id",$value['uuid'])->find();
						$scenarios = Db::name('tel_scenarios')->field('name')->where("id",$value['scenarios_id'])->find();
						$list[$key]['scenarios'] = $scenarios['name'];
						
						//$list[$key]['bridge'] = $config['bridge'];
						$where = array();
						$where['phone'] = $value['phone'];
						if ($value['call_type'] == 0){
							$sim = Db::name('tel_sim')->field('phone')->where($where)->find();
							$list[$key]['phone'] = '网关'.$sim['phone'];
						}
						else{
							$sim = Db::name('tel_line')->field('phone')->where($where)->find();
							$list[$key]['phone'] = '线路'.$sim['phone'];
						}
						
						$member = Db::name('member')->field('real_name')->where("uid",$value['member_id'])->find();
						$list[$key]['member_user'] = $member['real_name'];
						
						
						$list[$key]['create_datetime']= date('Y-m-d H:i:s', $value['create_time']);
						
						//下面是计算完成度
						
						$cwhere = array();
						if($value['task_id']){
							$cwhere["task"] =$value['task_id'];
						}
						$cwhere["status"] = ['>',0];
						$count = Db::name('member')->where($cwhere)->count(1);
						
						$here = array();
						if($value['task_id']){
							$here["task"] =$value['task_id'];
						}
						$here["status"] = ['>',1];
						$Molecular  = Db::name('member')->where($here)->count(1);
						if($count > 0 && $Molecular > 0){
							$percent = round(($Molecular / $count) * 100,2);
						}else{
							$percent = 0;
						}
						
						$list[$key]['Molecular'] = $Molecular;
						$list[$key]['denominator'] = $count;
						$list[$key]['percent'] = $percent;
			}
				
			 
			$this->assign('super', $super);
			$this->assign('list', $list);			
			//	var_dump($list);exit;
			$groupList = array();
			$groupList = Db::name('member_group')->field('id,name')->where('status', 1)->order('id asc')->select();
			$this->assign('groupList',$groupList); 	
			
		
				$where = array();
				if(!$super){
					$where['member_id'] = $uid;
				}
				$where['status'] = 1;
				$where['auditing'] = 0;
				 $scenarioslist = Db::name('tel_scenarios')->where($where)->field('id,name')->order('id asc')->select();
				 $this->assign('scenarioslist', $scenarioslist);
				 
				 
				 
				 $where = array();
				 if(!$super){
				 $where['pid'] = $uid;
				 }
				 $where['status'] = 1;
				 $where['user_type'] = 1;
				
				$adminlist = Db::name('admin')						
							->field('id,username')
							->where($where)
							->order('id asc')
							->select();
											
				$this->assign('adminlist', $adminlist);
		
				
				$where = array();
				if(!$super){
				 $where['a.member_id'] = $uid;
				}
				$where['a.status'] = 1;
				$where['c.id'] = array('EXP','IS NULL');
	
				
				$adlist = Db::name('admin')->field("robot_cnt")->where('id', $uid)->find();
				$sum = array();
				$sum['member_id'] = $uid;
				$sum['status'] = ['=',1];
				$rnum = Db::name('tel_config')->where($sum)->sum('robot_cnt');
				$rnum = $adlist['robot_cnt'] - $rnum;
				if($rnum < 0){
				  $rnum = 0;
				}
				$this->assign('rnum', $rnum);
				

		    return $this->fetch("new_index");
	
	}
	
	//获取任务的 客户意向等级 数据详情 
	public function taskDetail(){
		
	  	$id = input('taskId','','trim,strip_tags');
	
		$cwhere = array();
		if($id){
			$cwhere["task"] = $id;
		}

		$cwhere["level"] = ['>',0];
		
		$memberList = Db::query("SELECT `level` , COUNT(uid) AS tp_count  FROM `rk_member` WHERE  `task` = ? AND level>? GROUP BY level",[$id,0]);
        $count = Db::name('member')->where($cwhere)->count(1);
		
 
		foreach ($memberList as $keys => $values) {
			$percent = round(($values['tp_count'] / $count) * 100,2);
			$memberList[$keys]['percent'] = $percent;

		}

       
        if($count){
			return returnAjax(0,'成功了',$memberList);
		}else{
			return returnAjax(1,'计算失败');
		}
   


	}
	
	//通话时长
	public function talkTime(){
			
		    $id = input('taskId','','trim,strip_tags');
	
			$cwhere = array();
			if($id){
				$cwhere["task"] = $id;
			}
		
		
		    $memberList = Db::query("select INTERVAL(duration,10,60,120) as timegroup,count(1) AS tkcount  from `rk_member` WHERE  `task` = ? group by timegroup",[$id]);
				
			$count = Db::name('member')->where($cwhere)->count(1);
				
		 
			foreach ($memberList as $keys => $values) {
				
					$percent = round(($values['tkcount'] / $count) * 100,2);
	            	$memberList[$keys]['percent'] = $percent;
	
			}
	
	       
	        if(count($memberList)){
				return returnAjax(0,'成功了',$memberList);
			}else{
				return returnAjax(1,'计算失败');
			}
				
	}
	
    //通话时长
	public function talkRotation(){
			
		    $id = input('taskId','','trim,strip_tags');
	
			$cwhere = array();
			if($id){
				$cwhere["task"] = $id;
			}
		
		
		    $memberList = Db::query("select INTERVAL(call_rotation,3,5,7,10) as rotationgroup,count(1) AS tkcount  from `rk_member` WHERE  `task` = ? group by rotationgroup",[$id]);
				
			$count = Db::name('member')->where($cwhere)->count(1);
				
		 
			foreach ($memberList as $keys => $values) {
				
					$percent = round(($values['tkcount'] / $count) * 100,2);
	            	$memberList[$keys]['percent'] = $percent;
	
			}
	
	       
	        if(count($memberList)){
				return returnAjax(0,'成功了',$memberList);
			}else{
				return returnAjax(1,'计算失败');
			}
				
	}

	//在任务队列中，进行中
	public function lineup(){
		
		 	$Page_size = 10;
			$page = input('page','1','trim,strip_tags');

			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			$super = $user_auth["super"];
			
			$where = array();
			$where["task"] = input('taskId','','trim,strip_tags');
      		$where["status"] = 1;
			
			$list = Db::name('member')
							->field('uid,mobile,username,status,duration,last_dial_time,originating_call')
							->where($where)
							->order('uid desc')
							->page($page,$Page_size)
							->select();

			$count =  Db::name('member')->where($where)->count(1);
			$page_count = ceil($count/$Page_size);
		
			$back = array();
			$back['total'] = $count;
			$back['Nowpage'] = $page;
			$back['list'] = $list;
			$back['page'] = $page_count;
		
			return returnAjax(0,'获取数据成功',$back);
				
	}
	
	//已经拨打的列表中
	public function alreadyDialed(){
		$Page_size = 10; 
		$page = input('page','1','trim,strip_tags');
		$taskId = input('taskId','','trim,strip_tags');
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		if (!$taskId){
			$back = array();
			$back['total'] = 0;
			$back['Nowpage'] = $page;
			$back['list'] = "";
			$back['page'] = 0;
		
			return returnAjax(0,'获取数据成功',$back);
		}
		
		
		$where = array();
		$where["task"] = $taskId;
		$where["status"] = ['>',1];
		
		$Lengthoftime = input('Lengthoftime','','trim,strip_tags');
		$rotation = input('rotation','','trim,strip_tags');
		$activeMode = input('activeMode','','trim,strip_tags');
		$Levelofintention = input('Levelofintention','','trim,strip_tags');
		
	
		if ($Lengthoftime){
			
			$Length = explode ( "-", $Lengthoftime);
			if(count ($Length) > 1){
				$where['duration'] = ["between",[$Length[0],$Length[1]]];
			}else{
				$where['duration'] = ['>',$Length[0]];
			}
		
		}
		
		if ($rotation){
			
			$callrotation = explode ( "-", $rotation);
			if(count ($callrotation) > 1){
				$where['call_rotation'] = ["between",[$callrotation[0],$callrotation[1]]];
			}else{
				$where['call_rotation'] = ['>',$callrotation[0]];
			}
			
		}
		if ($activeMode){
			$where['status'] = $activeMode; 
		}
		
		if($Levelofintention){
			$where['level'] = $Levelofintention;
		}
		
		//\think\Log::record('where='.json_encode($where));

		$list = Db::name('member')
						->field('uid,mobile,nickname,real_name,status,duration,last_dial_time,originating_call,level')
						->where($where)
						->order('uid desc')
						->page($page,$Page_size)
						->select();
						

		foreach($list as &$item){

			if ($item['last_dial_time'] > 0){
				$item['last_dial_time'] = date('Y-m-d H:i:s', $item['last_dial_time']);
			}
			else{
				$item['last_dial_time'] = "";
			}
				
		}				

		$count =  Db::name('member')->where($where)->count(1);
		$page_count = ceil($count/$Page_size);
	
		$back = array();
		$back['total'] = $count;
		$back['Nowpage'] = $page;
		$back['list'] = $list;
		$back['page'] = $page_count;
	
		return returnAjax(0,'获取数据成功',$back);
	}

	//添加任务计划
	public function addPlan(){

		if (IS_POST) {
			
				
				$user_auth = session('user_auth');
				$uid = $user_auth["uid"];
				$super = $user_auth["super"];

				$call_type = input('call_type','0','trim,strip_tags');
				$robot_cnt = input('robot_cnt/d','','trim,strip_tags'); //新建的机器人数量
				$phoneId = input('phone_id','','trim,strip_tags');
				
				//检查累计机器人数量
				
				//我的总共机器人数量
				$memberInfo = Db::name('admin')->field('robot_cnt,asr_type')->where("id",$uid)->find();
				
				//已经用了的				
				$totalRobotCnt = Db::name('tel_config')->where('member_id',$uid)->where('status','in', '0,1,2,4')->sum('robot_cnt');
				
				//已经分配出去了的。
				$sum = Db::name('admin')->where('pid', $uid)->sum('robot_cnt');
	    			
				$totalRobotCnt = $robot_cnt + (int)$totalRobotCnt + $sum;
				
				if ($totalRobotCnt > $memberInfo['robot_cnt']){
					return returnAjax(1,'超出购买机器人数量，请联系销售人员');
				}
				
				if ($memberInfo['asr_type'] > 0){
					
					$tilist = Db::name('tel_interface')->where('owner', $uid)->find();
					if(!$tilist){
						return returnAjax(1,'您没有接口，请到接口配置表里面添加数据。');
					}
						
				}
				
				if ($call_type){
					$sim = Db::name('tel_line')
								->field('id,call_prefix,originate_variables,member_id,phone,inter_ip,dial_format')
								->where("id",$phoneId)->find();
					if (!$sim){
						return returnAjax(1,'线路不存在！');
					}
				}
				else{
					$sim = Db::name('tel_sim')
								->field('id,call_prefix,member_id,phone,device_id')
								->where("id",$phoneId)->find();
					$gatewayInfo = Db::name('tel_device')->field('dial_format')->where('id',$sim['device_id'])->find();
					if ($gatewayInfo && $gatewayInfo['dial_format']){
						$sim['dial_format'] = $gatewayInfo['dial_format'];
					}
					else{
						return returnAjax(1,'网关账号不可为空');
					}
				}
				
			
					// 时间分组的
												
					$timegroup = array();
					$timegroup['name'] = uniqid();
					$timegroup['domain'] = uniqid();
					$timegroup['member_id'] = $uid;
					$tgresult = $this->connect->table('autodialer_timegroup')->insertGetId($timegroup);
					
					// 时间分组下面的时间明细
				 	 $TimeRange = array();
					 $TimeRange['onetime'] = input('onetime','','trim,strip_tags');
					 $TimeRange['twotime'] = input('twotime','','trim,strip_tags');
					 $TimeRange['threetime'] = input('threetime','','trim,strip_tags');
					 $TimeRange['fourtime'] = input('fourtime','','trim,strip_tags');
					 
					 $SaveRange = array();

					 foreach ($TimeRange as $tkey => $tvalue) {
						 
						 $temp = array();
						 
						 $temp['group_uuid'] = $tgresult;
						 $temp['member_id'] = $uid;
						 
						 if($tkey == 'onetime'){
							$temp['begin_datetime'] = "00:00:00";
							$temp['end_datetime'] = $tvalue;
							
							array_push($SaveRange,$temp);

						 }
						 
						 if($tkey == 'threetime'){
						   $temp['begin_datetime'] = $TimeRange['twotime'];
						   $temp['end_datetime'] = $tvalue;
							 array_push($SaveRange,$temp);
						 }
						 
					   if($tkey == 'fourtime'){
					   	$temp['begin_datetime'] = $tvalue;
					   	$temp['end_datetime'] = "23:59:59";
							array_push($SaveRange,$temp);
					   }
						 
					 }
					 
					 $TRresult = $this->connect->table('autodialer_timerange')->insertAll($SaveRange);	
						
				$task_name = input('name','','trim,strip_tags');
				// 任务表的 
				$task = array();
				$task['name'] =  $task_name ;
				$task['create_datetime'] = date("Y-m-d H:i:s",time());
				$task["alter_datetime"] = date("Y-m-d H:i:s",time());
					$task['disable_dial_timegroup'] = $tgresult;
				$task['member_id'] = $uid;
				$task['remark'] = input('remark','','trim,strip_tags');
				$task['call_pause_second'] = input('frequency','','trim,strip_tags');
				
				$task['call_notify_url'] = config('notify_url');		
				$task['start'] = input('startup','0','trim,strip_tags');
				$task['call_notify_type'] = 2;
				$task['cache_number_count'] = 0;
				
				$max_destination_extension = Db::name('tel_config')->field('destination_extension')->order('id desc')->find();	
				if ($max_destination_extension && $max_destination_extension['destination_extension'] > 0){
					$destination_extension = ((int)$max_destination_extension['destination_extension'])+1;
				}
				else{
					$destination_extension =  config('destination_extension');
				}
				$task['destination_extension'] = $destination_extension;
				
				if ($call_type){
					$task['dial_format'] = $sim['dial_format'];
					$task['_origination_caller_id_number'] = $sim['phone']?$sim['phone']:$uid;
					$task['originate_variables'] = $sim['originate_variables'];
				}
				else{
					$task['dial_format'] = $sim['dial_format'];
					$task['_origination_caller_id_number'] = $sim['call_prefix'];
				}
				
				if (config('start_da2')){
					if (isset($task['originate_variables']) && $task['originate_variables']){
						$task['originate_variables'] = $task['originate_variables'].','.config('start_da2');
					}
					else{
						$task['originate_variables']  = config('start_da2');
					}
				}
				
				$task['destination_dialplan'] = "XML";
				$task['destination_context'] = "default";
				$task['maximumcall'] = $robot_cnt;

				$taskresult = $this->connect->table('autodialer_task')->insertGetId($task);
				
				
					
					$week = array();
					$zhou = array();
					$week['Monday'] = input('Monday','','trim,strip_tags');
					$week['Tuesday'] = input('Tuesday','','trim,strip_tags');
					$week['Wednesday'] = input('Wednesday','','trim,strip_tags');
					$week['Thursday'] = input('Thursday','','trim,strip_tags');
					$week['Friday'] = input('Friday','','trim,strip_tags');
					$week['Saturday'] = input('Saturday','','trim,strip_tags');
					$week['Sunday'] = input('Sunday','','trim,strip_tags');
					
					foreach ($week as $key => $value) {
						if($value == 0){
							array_push($zhou, $key);
						}		
					}

					
					$weeklist = implode(",",$zhou);
					$timertask = array();

					$timertask['group_id'] = $tgresult;
					$timertask['date_list'] = input('daystartDate','','trim,strip_tags');
					$timertask['week_list'] = $weeklist;

					$timertask["task_id"] = $taskresult;
					$timerresult = $this->connect->table('autodialer_timer_task')->insertGetId($timertask);
					
				
				// 配置表的 场景
				$cdata = array();
				$cdata['member_id'] = $uid;
				
				$levelArr = input('level/a','','trim,strip_tags');
				if ($levelArr){
					$cdata['level'] =  implode(",",$levelArr);
				}
				
				$sale_ids_arr = input('sale_ids/a','','trim,strip_tags');
				if ($sale_ids_arr){
					$cdata['sale_ids'] =  implode(",",$sale_ids_arr);
				}
				
				$cdata["task_id"] = $taskresult;
				$cdata["task_name"] = $task_name;
				$cdata["scenarios_id"] = input('scenarios_id','','trim,strip_tags');
				
	
				
				$cdata["call_type"] = $call_type;
				$cdata["status"] = input('startup','0','trim,strip_tags');
				$cdata["destination_extension"] = $destination_extension;
				$cdata["phone"] = $sim['phone'];
				$cdata["line_id"] = $sim['id'];
				
				$cdata["call_prefix"] = $sim['call_prefix'];
				$cdata["push_type"] =  input('push_type','','trim,strip_tags');
				$cdata['robot_cnt'] = $robot_cnt;
				$cdata['create_time'] = time();
				$cfresult = Db::name('tel_config')->insertGetId($cdata);
									
		
				if ($taskresult){
					$this->connect->execute("CREATE TABLE `autodialer_number_".$taskresult."` (
									`id` int(11) NOT NULL AUTO_INCREMENT,
									`number` VARCHAR(20) NOT NULL,
									`state` INT(11) NULL DEFAULT NULL,
									`description` VARCHAR(255) NULL DEFAULT NULL,
									`recycle` INT(11) NULL DEFAULT NULL,
									`callid` VARCHAR(255) NULL DEFAULT NULL,
									`calldate` DATETIME NULL DEFAULT NULL,
									`calleridnumber` VARCHAR(50) NULL DEFAULT NULL,
									`answerdate` DATETIME NULL DEFAULT NULL,
									`hangupdate` DATETIME NULL DEFAULT NULL,
									`bill` INT(11) NULL DEFAULT NULL,
									`duration` INT(11) NULL DEFAULT NULL,
									`hangupcause` VARCHAR(255) NULL DEFAULT NULL,
									`bridge_callid` VARCHAR(255) NULL DEFAULT NULL,
									`bridge_number` VARCHAR(20) NULL DEFAULT NULL,
									`bridge_calldate` DATETIME NULL DEFAULT NULL,
									`bridge_answerdate` DATETIME NULL DEFAULT NULL,
									`recordfile` VARCHAR(255) NULL DEFAULT NULL,
									`status` VARCHAR(100) NULL DEFAULT NULL,
									 PRIMARY KEY (`id`)
								)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2000");
					
		
				
					$backdata = array();
					$backdata['url'] = Url("User/Plan/index");
					
					return returnAjax(0,'添加成功',$backdata);
					
				}
				else{
					$backdata = array();
					$backdata['url'] = Url("User/Plan/addPlan");
					
					return returnAjax(1,'添加任务失败',$backdata);
				}

		} 
		else {
					
			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			$super = $user_auth["super"];
			
		
			$where = array();
			if(!$super){
			  $where['member_id'] = $uid;
			}
			$where['status'] = 1;
		
			 $scenarioslist = Db::name('tel_scenarios')->where($where)->field('id,name')->order('id asc')->select();
			 $this->assign('scenarioslist', $scenarioslist);
			 
			 
			 
			 $where = array();
			 if(!$super){
			 $where['pid'] = $uid;
			 }
			 $where['status'] = 1;
			 $where['user_type'] = 1;
			
			$adminlist = Db::name('admin')						
						->field('id,username')
						->where($where)
						->order('id asc')
						->select();
										
			$this->assign('adminlist', $adminlist);
	
			
			$where = array();
			if(!$super){
			 $where['a.member_id'] = $uid;
			}
			$where['a.status'] = 1;
			$where['c.id'] = array('EXP','IS NULL');
			
			$tsrlist = Db::name('tel_tsr')
			->alias('a')
			->field('a.id,a.phone')
			->join('tel_config c','a.phone = c.phone','LEFT')
			->where($where)
			->select();
		
			$this->assign('tsrlist', $tsrlist);
			
			$this->assign("current",'新增');
			return $this->fetch("newadd");
		}
		
		
	}
	
	//编辑任务计划
	public function editPlan(){

			if (IS_POST) {

					$user_auth = session('user_auth');
					$uid = $user_auth["uid"];
					$super = $user_auth["super"];
					
					$callType = input('call_type','0','trim,strip_tags');
					$phoneId = input('phone_id','','trim,strip_tags');
					$task_name = input('name','','trim,strip_tags');
					$robot_cnt = input('robot_cnt','','trim,strip_tags');
					$configId = input('configId','','trim,strip_tags');
					
					//检查累计机器人数量
					$memberInfo = Db::name('admin')
									->field('robot_cnt,asr_type')
									->where("id",$uid)->find();
					$totalRobotCnt =  Db::name('tel_config')
									->where('member_id',$uid)
									->where('id','<>', $configId)
									->where('status','in', '0,1,2,4')->sum('robot_cnt');
									
					//已经分配出去了的。
					$sum = Db::name('admin')->where('pid', $uid)->sum('robot_cnt');
		    						
									
					$totalRobotCnt = $robot_cnt + (int)$totalRobotCnt + $sum;
					
					if ($totalRobotCnt > $memberInfo['robot_cnt']){
						return returnAjax(1,'超出购买机器人数量，请联系销售人员');
					}

					if ($memberInfo['asr_type'] > 0){
						
						$tilist = Db::name('tel_interface')->where('owner', $uid)->find();
						if(!$tilist){
							return returnAjax(1,'您没有接口，请到接口配置表里面添加数据。');
						}
							
					}
					
					if ($callType){  // 1 线路
						$sim = Db::name('tel_line')
									->field('call_prefix,originate_variables,member_id,phone,inter_ip,dial_format')
									->where("id",$phoneId)->find();
						if (!$sim){
							return returnAjax(1,'线路不存在！');
						}
					}
					else{  //网关
						$sim = Db::name('tel_sim')
									->field('call_prefix,member_id,phone,device_id')
									->where("id",$phoneId)->find();
						$gatewayInfo = Db::name('tel_device')->field('dial_format')->where('id',$sim['device_id'])->find();
						if ($gatewayInfo && $gatewayInfo['dial_format']){
							$sim['dial_format'] = $gatewayInfo['dial_format'];
						}
						else{
							return returnAjax(1,'网关账号不可为空');
						}
					}		
					
					$taskId = input('taskId','','trim,strip_tags');
										
					// 时间分组的id
					$groupId = input('groupId','','trim,strip_tags');
  			
					// 时间分组下面的时间明细
					$morning = input('morning','','trim,strip_tags');
					$afternoon = input('afternoon','','trim,strip_tags');
					$evening = input('evening','','trim,strip_tags');
					
					 $TimeRange = array();
					 $TimeRange['onetime'] = input('onetime','','trim,strip_tags');
					 $TimeRange['twotime'] = input('twotime','','trim,strip_tags');
					 $TimeRange['threetime'] = input('threetime','','trim,strip_tags');
					 $TimeRange['fourtime'] = input('fourtime','','trim,strip_tags');
					 
					 $one = array();
					 $one['begin_datetime'] = "00:00:00";
					 $one['end_datetime'] =$TimeRange['onetime'];
					 $TRresult = $this->connect->table('autodialer_timerange')->where('uuid', $morning)->update($one);
					
					 $two = array();
					 $two['begin_datetime'] = $TimeRange['twotime'];
				 	 $two['end_datetime'] = $TimeRange['threetime'];	
					 $TRresult = $this->connect->table('autodialer_timerange')->where('uuid', $afternoon)->update($two);
					 
					 $three = array();
					 $three['begin_datetime'] = $TimeRange['fourtime'];
					 $three['end_datetime'] = "23:59:59";
					 $TRresult = $this->connect->table('autodialer_timerange')->where('uuid', $evening)->update($three);
 
  					
					// 定时器的 autodialer_timer_task

					$week = array();
					$zhou = array();
					$week['Monday'] = input('Monday','','trim,strip_tags');
					$week['Tuesday'] = input('Tuesday','','trim,strip_tags');
					$week['Wednesday'] = input('Wednesday','','trim,strip_tags');
					$week['Thursday'] = input('Thursday','','trim,strip_tags');
					$week['Friday'] = input('Friday','','trim,strip_tags');
					$week['Saturday'] = input('Saturday','','trim,strip_tags');
					$week['Sunday'] = input('Sunday','','trim,strip_tags');

					foreach ($week as $key => $value) {
						if($value == 0){
							array_push($zhou, $key);
						}		
					}
					$weeklist = implode(",",$zhou);

					$timertask = array();
					$timertask['date_list'] = input('daystartDate','','trim,strip_tags');
					$timertask['week_list'] = $weeklist;
					
					$excludeId = input('exclude','','trim,strip_tags');
					$timerresult = $this->connect->table('autodialer_timer_task')->where('id', $excludeId)->update($timertask);
					
					
					// 任务表的 
					$task = array();
					$task['name'] = $task_name;
					$task['remark'] = input('remark','','trim,strip_tags');
					$task['call_pause_second'] = input('frequency','','trim,strip_tags');
					$task['start'] = input('startup','0','trim,strip_tags');
					$call_type = input('call_type','0','trim,strip_tags');
					if ($call_type){
						$task['dial_format'] = $sim['dial_format'];
						$task['_origination_caller_id_number'] = $sim['phone'];
						$task['originate_variables'] = $sim['originate_variables'];
						
					}
					else{
						$task['dial_format'] = $sim['dial_format'];
						$task['_origination_caller_id_number'] = $sim['call_prefix'];
					}
					
					if (config('start_da2')){
						if (isset($task['originate_variables']) && $task['originate_variables']){
							$task['originate_variables'] = $task['originate_variables'].','.config('start_da2');
						}
						else{
							$task['originate_variables']  = config('start_da2');
						}
					}
					
					$task["alter_datetime"] = date("Y-m-d H:i:s",time());
					$task['maximumcall'] = $robot_cnt;

					$taskresult = $this->connect->table('autodialer_task')->where('uuid', $taskId)->update($task);
					
					// 配置表的 场景
					$cdata = array();
					$cdata["task_name"] = $task_name;
					$levelArr = input('level/a','','trim,strip_tags');
					if ($levelArr){
						$cdata['level'] =  implode(",",$levelArr);
					}
					$sale_ids_arr = input('sale_ids/a','','trim,strip_tags');
					if ($sale_ids_arr){
						$cdata['sale_ids'] =  implode(",",$sale_ids_arr);
					}
					
					$cdata["scenarios_id"] = input('scenarios_id','','trim,strip_tags');
				
					//$cdata["bridge"] = $tsr['phone'];
					$cdata["call_type"] = $callType;
					$cdata["status"] = input('startup','0','trim,strip_tags');
					$cdata["phone"] = $sim['phone'];
					$cdata["call_prefix"] = $sim['call_prefix'];
					$cdata['robot_cnt'] = input('robot_cnt','','trim,strip_tags');
					$cdata['update_time'] = time();
					$cdata["push_type"] = input('push_type','','trim,strip_tags');
					$cdata["line_id"] = $phoneId;

					$cfresult = Db::name('tel_config')->where('id', $configId)->update($cdata);
										
						
					if($cfresult >= 0|| $timerresult >= 0 || $taskresult >= 0 || $TRresult >= 0){
						
						$backdata = array();
						$backdata['url'] = Url("User/Plan/index");
						return returnAjax(0,'编辑成功',$backdata);

					}else{
						
						$backdata = array();
						$backdata['url'] = Url("User/Plan/editPlan",['id'=>$taskId]);
						return returnAjax(1,'编辑失败',$backdata);
					
					}
								
							
			} 
			else {
					
				$id = input('id','','trim,strip_tags');
				//获取任务表的信息
				$slist = $this->connect->table('autodialer_task')
				         ->field('uuid,name,call_pause_second,disable_dial_timegroup,destination_extension,start,remark')
							   ->where('uuid', $id)->find();
			

			  //获取配置表的信息
				$cfresult = Db::name('tel_config')
				            ->field('id,level,sale_ids,scenarios_id,destination_extension,phone,call_type,bridge')
										->where('task_id', $id)->find();	
										
				$cfresult['sale_ids']= explode(",", $cfresult['sale_ids']);
				$cfresult['level']= explode(",", $cfresult['level']);
				$slist['config'] = $cfresult;
										
				//根据时间分组id获取时间范围				
				$TRresult = $this->connect->table('autodialer_timerange')
										->where('group_uuid', $slist['disable_dial_timegroup'])
										->order('uuid asc')
										->select();
										

				$onestart = strtotime($TRresult[0]["end_datetime"]);
				$onestart = date("H:i:s",($onestart+60));
			
				$oneend = strtotime($TRresult[1]["begin_datetime"]);
				$oneend = date("H:i:s",($oneend - 60));
			
   
				$towstart = strtotime($TRresult[1]["end_datetime"]);
				$twostarts = date("H:i:s",($towstart + 60));
									

				$towend = strtotime($TRresult[2]["begin_datetime"]);
				$twoend = date("H:i:s",($towend - 60));
				
	
				$TRresult[0]["begin_datetime"] = $onestart;
				$TRresult[0]["end_datetime"] = $oneend;
				$TRresult[1]["begin_datetime"] = $twostarts;
				$TRresult[1]["end_datetime"] = $twoend;	

				$slist['timerange'] = $TRresult;							
						
										
				//根据时间分组id 获取定时器
						
				$timerresult = $this->connect->table('autodialer_timer_task')
											 ->where('group_id', $slist['disable_dial_timegroup'])
											 ->where('task_id', $id)
											 ->find();
				
				
				
				$timerresult['week_list'] = explode(",",$timerresult['week_list']);
				 
				$slist['timer'] = $timerresult;
							 
							 
				$simwhere['phone'] = $cfresult['phone'];				
				$sim = Db::name('tel_sim')->field('id,phone')->where($simwhere)->find();
				$slist['phone'] = $sim['id'];
				$this->assign("list",$slist);
					 
					// ===========================================================================================
						
				$user_auth = session('user_auth');
				$uid = $user_auth["uid"];
				$super = $user_auth["super"];
				//echo $super;exit;
			
				$where = array();
				if(!$super){
				  $where['member_id'] = $uid;
				}
				$where['status'] = 1;
			
				 $scenarioslist = Db::name('tel_scenarios')->where($where)->field('id,name')->order('id asc')->select();
				 $this->assign('scenarioslist', $scenarioslist);
				 
				 $where = array();
				 if(!$super){
					$where['pid'] = $uid;
				 }
				 $where['status'] = 1;
				 $where['user_type'] = 1;
				
				$adminlist = Db::name('admin')						
								->field('id,username')
								->where($where)
								->order('id asc')
								->select();
											
				$this->assign('adminlist', $adminlist);
		


				$where = array();
				if(!$super){
				 $where['member_id'] = $uid;
				}
				$where['status'] = 1;
				
				$tsrlist = Db::name('tel_tsr')
				->field('id,phone')
				//->join('tel_config c','a.destination_extension = c.destination_extension','LEFT')
				->where($where)
				->select();
				
			
				$this->assign('tsrlist', $tsrlist);
				
				$this->assign("current",'编辑');
		
				return $this->fetch("newadd");

				
			}

	}
	
	public function bindCallNum(){
		$type = input('type','0','trim,strip_tags');
		$phone = input('phone','','trim,strip_tags');
		
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		if ($type == 0){
			$where = array();
			if(!$super){
				$where['member_id'] = $uid;
			}
			$where['status'] = 1;
			//$where['c.id'] = array('EXP','IS NULL');
			$simlist = Db::name('tel_sim')
					->where('id','NOT IN',function($query){
						$query->name('tel_config')
						->where('call_type', 0)
						->where('status', '>=', 0)
						->field('line_id');
					})
					->where($where)
					->select();
			if ($phone){
				
				$sim = Db::name('tel_sim')
				->field('id,phone')
				->where('id', $phone)
				->find();
				$simlist[] = $sim;
			}
			
		}
		else{
			$where = array();
			$where['status'] = 1;
			$where['member_id'] = [['=',0],['=',$uid],'OR'];
			
			$simlist = Db::name('tel_line')
				
				->field('id,name as phone')
			
				->where($where)
				->select();
			
		}
		return returnAjax(0,'',$simlist);
	}

  // 修改任务状态
	public function setstatus(){
		$sId = input('pId','','trim,strip_tags');
		$status = input('status','','trim,strip_tags');
		
		$taskInfo = Db::name('tel_config')->where('task_id',$sId)->find();
		if ($status == 1){
			if ($taskInfo['status'] == 0 || $taskInfo['status'] == 2){

				$user_auth = session('user_auth');
				$uid = $user_auth["uid"];
				$adlist = Db::name('admin')->field("robot_cnt")->where('id', $uid)->find();
				$sum = array();
				$sum['member_id'] = $uid;
				$sum['status'] = ['=',1];
				$rnum = Db::name('tel_config')->where($sum)->sum('robot_cnt');
				$rnum = $adlist['robot_cnt'] - $rnum;
				if($rnum <= 0){
					return returnAjax(1,'可用机器人不足');
				}

			}
			else{
				return returnAjax(1,'该任务不可开启请联系管理员');
			}
		}


		if ($status == -1){

			$this->connect->execute("drop table `autodialer_number_".$sId."`");

			$this->connect->table('autodialer_task')->where('uuid',$sId)->delete();

		}
		
		$data=array();
		$data['start'] = $status;
		$data["alter_datetime"] = date("Y-m-d H:i:s",time());
		$ret = $this->connect->table('autodialer_task')->where('uuid',$sId)->update($data);
		$res = true;
		if($taskInfo){
			$res = Db::name('tel_config')->where('task_id',$sId)->update(array('status'=>$status));	
		}
	
	
		if($ret !== false){
			return returnAjax(0,'成功');
		}else{
			if($res !== false){
				return returnAjax(0,'成功');
				
			}else{
				return returnAjax(1,'修改任务状态失败');
			}
			
		}
	}	



	public function stopAll(){

		$idArr = input('idList/a','','trim,strip_tags');
		$data=array();
		$data['start'] = 2;
		$data["alter_datetime"] = date("Y-m-d H:i:s",time());
		$ret = $this->connect->table('autodialer_task')->where('uuid','in',$idArr)
			->where('start', 1)->update($data);
	
		
		if($ret == 1 || $ret == 0){
			$ret = Db::name('tel_config')->where('task_id','in',$idArr)->where('status', 1)->update(array('status'=>2));
			return returnAjax(0,'成功',$ret);
		}else{
			return returnAjax(1,'error!',"失败");
		}
	}	

	
	//删除任务计划
	public function delPlan(){

		$ids= input('id/a','','trim,strip_tags');
		foreach ($ids as $k=>$v){
			$this->connect->execute("drop table `autodialer_number_".$v."`");
		
			 $task = $this->connect->table('autodialer_task')
			 ->field('disable_dial_timegroup')
			 ->where('uuid', $v)->find();
			 
			  Db::name('tel_config')->where('task_id', $v)->delete();
				
			 $where['task_id'] = $v;

			 if($task['disable_dial_timegroup']){
				  $this->connect->table('autodialer_timegroup')->where('uuid', $task['disable_dial_timegroup'])->delete();
					$this->connect->table('autodialer_timerange')->where('group_uuid', $task['disable_dial_timegroup'])->delete();
				
				$where['group_id'] = $task['disable_dial_timegroup'];

			 }
			 
			$this->connect->table('autodialer_timer_task')
										->where($where)
										->delete();
 
			 
		}
	
		$list = $this->connect->table('autodialer_task')->where('uuid','in', $ids)->delete();

		if(!$list){
			echo "删除失败。";
		}

	}
	
	
	//外呼列表
	public function callIn(){
	
			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			$super = $user_auth["super"];
			
		
			$where = array();
			$where['type'] = 1;
 	  		$list = Db::name('tel_config')->order('id desc')->where($where)->paginate(10, false, array('query'  =>  $this->param));
 	  		
 	  		$page = $list->render();
 	  		$list = $list->toArray();
	  		
	  		foreach ($list['data'] as $k=>$v){

	  			$scenarios = Db::name('tel_scenarios')->field('name')->where("id",$v['scenarios_id'])->find();
				$list['data'][$k]['scenarios'] = $scenarios['name'];
						
	  		 
				$list['data'][$k]["create_time"] = date('Y-m-d H:i:s', $v["create_time"]);	

	  		}
		
		
	        $this->assign('list', $list['data']);
	  		$this->assign('page', $page);


  			$scen = array();
			if(!$super){
				$scen['member_id'] = $uid;
			}
			$scen['status'] = 1;
			$scen['auditing'] = 0;
			$scenarioslist = Db::name('tel_scenarios')->where($scen)->field('id,name')->order('id asc')->select();
			$this->assign('scenarioslist', $scenarioslist);
			 
				 
	  		
	  		return $this->fetch();
		
	}
	
	//添加计划
	public function addCallIn(){


		// return returnAjax(1,'error!',$_POST);

		$callInId = input('callInId','','trim,strip_tags');

	    $data = array();

		$phoneId = input('phone_id','','trim,strip_tags');
	    $call_type = input('call_type','0','trim,strip_tags');

		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];


		if ($call_type){

			$sim = Db::name('tel_line')
					->field('id,call_prefix,originate_variables,member_id,phone,inter_ip,dial_format')
					->where("id",$phoneId)->find();
			if (!$sim){
				return returnAjax(1,'线路不存在！');
			}

		}
		else{
			$sim = Db::name('tel_sim')
						->field('id,call_prefix,member_id,phone,device_id')
						->where("id",$phoneId)->find();
			$gatewayInfo = Db::name('tel_device')->field('dial_format')->where('id',$sim['device_id'])->find();
			if ($gatewayInfo && $gatewayInfo['dial_format']){
				$sim['dial_format'] = $gatewayInfo['dial_format'];
			}
			else{
				return returnAjax(1,'网关账号不可为空');
			}
		}
				
	
		// 配置表的 场景
		$cdata = array();
		$cdata['member_id'] = $uid;
		
		$cdata["scenarios_id"] = input('scenarios_id','','trim,strip_tags');
	
		$cdata["task_name"] = input('name','','trim,strip_tags');
		$cdata["status"] = input('startup','0','trim,strip_tags');
		$cdata["remark"] = input('remark','0','trim,strip_tags');
		//$cdata["phone"] = $phoneId;
		$cdata["type"] = 1;

		$cdata["call_type"] = $call_type;
		$cdata["status"] = input('startup','0','trim,strip_tags');
		$cdata["phone"] = $sim['phone'];
		$cdata["line_id"] = $sim['id'];
		$cdata['task_id'] = $sim['call_prefix'];
		
		$cdata["call_prefix"] = $sim['call_prefix'];
		$cdata['create_time'] = time();


		if ($callInId){
			
			$cfresult = Db::name('tel_config')->where('id', $callInId)->update($cdata);

		}
		else{
			$max_destination_extension = Db::name('tel_config')->field('destination_extension')->order('id desc')->find();	
			if ($max_destination_extension && $max_destination_extension['destination_extension'] > 0){
				$destination_extension = ((int)$max_destination_extension['destination_extension'])+1;
			}
			else{
				$destination_extension =  config('destination_extension');
			}
			$cdata['destination_extension'] = $destination_extension;
			$cfresult = Db::name('tel_config')->insertGetId($cdata);
				
		}

	

		if($cfresult){
			return returnAjax(0,'成功',$cfresult);
		}else{
			return returnAjax(1,'error!',"失败");
		}

		
	}

	//获取呼入的信息
	public function getCallInInfo(){

		$id = input('id','','trim,strip_tags');
	
		$config = Db::name('tel_config')->where('id', $id)->find();
	
        return returnAjax(0,'成功',$config);
	
	}



	//删除呼入
	public function delCallIn(){

		$ids= input('id/a','','trim,strip_tags');
		$list = Db::name('tel_config')->where('id','in', $ids)->delete(); 
	
	
		if(!$list){
			echo "删除失败。";
		}

	}
	

		
	//获取计划信息
	public function getPlanInfo(){
		
		$id = input('id','','trim,strip_tags');
		$slist = $this->connect->table('autodialer_timegroup')->where('uuid', $id)->find();
		
		$taskname = $this->connect->table('autodialer_task')->field('uuid,name')->where('disable_dial_timegroup', $slist['uuid'])->find();
		$slist["taskId"] = $taskname["uuid"];	
		$slist["taskName"] = $taskname["name"];	
		

		echo json_encode($slist,true);
		
	}
	



	//时间计划明细明细
	public function callInDetail(){
		
		 	$id = input('id','','trim,strip_tags');
			$this->assign('groupId', $id);

			$where = array();
			$where['group_uuid'] = $id;
			
			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			$super = $user_auth["super"];

			if(!$super){
				$where['member_id'] = $uid;
			}

			if($super){
				$adminlist = Db::name('admin')->field('id,username')->order('id desc')->select();
				$this->assign('adminlist', $adminlist);
				$this->assign('isAdmin', 1);
			}	

 	  		$list = $this->connect->table('autodialer_timerange')->where($where)->order('uuid desc')->paginate(10, false, array('query'  =>  $this->param));
 	  		
 	  		$page = $list->render();
 	  		$list = $list->toArray();
	  		
	  		foreach ($list['data'] as $k=>$v){
					
				$groupname = $this->connect->table('autodialer_timegroup')->field('uuid,name')->where('uuid', $v['group_uuid'])->find();
				$list['data'][$k]["groupname"] = $groupname["name"];	
			
				
    		}
				
			$this->assign('list', $list['data']);
			$this->assign('page', $page);
				
			return $this->fetch();
			
			
	}

	//获取计划信息
	public function addCallInTime(){
		

					$data = array();
					$data['begin_datetime'] = input('startDate','','trim,strip_tags');
					$data['end_datetime'] = input('endTime','','trim,strip_tags');
					$data['group_uuid'] = input('groupId','','trim,strip_tags');

					$groupname = $this->connect->table('autodialer_timegroup')->field('member_id')->where('uuid', $data['group_uuid'])->find();
					$data['member_id'] = $groupname["member_id"];	
					
		
					$task["alter_datetime"] = date("Y-m-d H:i:s",time());
					$return = $this->connect->table('autodialer_task')->where('disable_dial_timegroup',$data['group_uuid'])->update($task);						
					
					
					$result = $this->connect->table('autodialer_timerange')->insertGetId($data);
					

					if($result){
						return returnAjax(0,'成功',$result);
					}else{
						return returnAjax(1,'error!',"失败");
					}
		
	}
	
	//获取时间item
	public function getTimeInfo(){
		
		 $id = input('id','','trim,strip_tags');
		 $slist = $this->connect->table('autodialer_timerange')->where('uuid', $id)->find();

		 echo json_encode($slist,true);
		 
	}
	
	//编辑计划
	public function editCallInTime(){
		
			$data = array();
			$data['begin_datetime'] = input('startDate','','trim,strip_tags');
			$data['end_datetime'] = input('endTime','','trim,strip_tags');
			$data['group_uuid'] = input('groupId','','trim,strip_tags');
			$groupname = $this->connect->table('autodialer_timegroup')->field('member_id')->where('uuid', $data['group_uuid'])->find();
			$data['member_id'] = $groupname["member_id"];	
			
			$task["alter_datetime"] = date("Y-m-d H:i:s",time());
			$return = $this->connect->table('autodialer_task')->where('disable_dial_timegroup',$data['group_uuid'])->update($task);						
			
			
			$planId = input('planId','','trim,strip_tags');
			$result = $this->connect->table('autodialer_timerange')->where('uuid', $planId)->update($data);

			if($result){
				return returnAjax(0,'成功',$result);
			}else{
				return returnAjax(1,'error!',"失败");
			}


	}
	
  	//删除时间
	public function delTime(){
		
		$ids= input('id/a','','trim,strip_tags');
			
		$list = $this->connect->table('autodialer_timerange')->where('uuid','in', $ids)->delete();

		if(!$list){
			echo "删除失败。";
		}
		
		 
	}
	

    
       //导出文件
     /**
		 * 导出excel表格
		 *
		 * @param   array    $columName    第一行的列名称
		 * @param   array    $list         二维数组
		 * @param   string   $setTitle    sheet名称
		 * @return  
		 * @author  Tggui <tggui@vip.qq.com>
		 */
    function exportExcel()
    {
    
    	$columName = ['主叫机号码','客户号码','客户姓名','呼叫结果','客户等级','通话时长','通话轮次','呼叫时间','分配状态','全程录音'];
    	
    	$user_auth = session('user_auth');
    	$uid = $user_auth["uid"];		 
    	$ctype['owner'] = $uid;
        $super = $user_auth["super"];
    
    	$cwhere = array();
    	$cwhere["status"] = ['>',0];
    	if (!$super){
    		$cwhere["owner"] = $uid;
    	}
    
     
          $taskId = input('taskId','','trim,strip_tags');
		if($taskId){
			$cwhere["task"] = $taskId;
		}
		
        $mList = Db::name('member')
    		    ->field('originating_call,mobile,nickname,status,level,duration,call_rotation,last_dial_time,salesman,record_path')
    		    ->where($cwhere)
    		    ->order('uid asc')
    		    ->select();
    
        foreach($mList as &$item){
    
    		if ($item['last_dial_time'] > 0){
    			$item['last_dial_time'] = date('Y-m-d H:i:s', $item['last_dial_time']);
    		}
    		else{
    			$item['last_dial_time'] = "";
    		}
    		
    		switch ($item['level']) {
        		case 5:
        			$item['level'] = 'A类';
        			break;
        		case 4:
        			$item['level'] = 'B类';
        			break;
        
        		case 3:
        			$item['level'] = 'C类';
    				break;
    			case 2:
        			$item['level'] = 'D类';
    				
        			break;
        		default:
        			$item['level'] = 'E类';
    			
    		}
    
    
    		switch ($item['status']) {
        		case 3:
        			$item['status'] = '未接听挂断/关机/欠费';
    				break;
    			case 2:
        			$item['status'] = '已接通';
        			break;
        		default:
        			$item['status'] = '拨打排队中';
    			
    		}
    
    		if($item['salesman'] > 0){
                $adminlist = Db::name('admin')->field('username,mobile')->where('id', $item['salesman'])->find();
                if($adminlist['username']){
                  $item['salesman'] = $adminlist['username'];
                }else{
                	 $item['salesman'] = $adminlist['mobile'];
                }
               
    		}else{
               $item['salesman'] = "未分配";
    		}
    
    		$item['record_path'] = config('res_url')."/".$item['record_path'];
    			
    	}
  
    	$list = $mList; //array($one,$two,$three);
    
    	$setTitle='Sheet1';
    	$fileName='文件名称';
    
        if ( empty($columName) || empty($list) ) {
           // return '列名或者内容不能为空';
             return returnAjax(1,'内容不能为空!',"失败");
        }
        
        if ( count($list[0]) != count($columName) ) {
           
            return returnAjax(1,'列名跟数据的列不一致!',"失败");
        }
        
        //实例化PHPExcel类
        $PHPExcel = new \PHPExcel();
        //获得当前sheet对象  
        $PHPSheet = $PHPExcel->getActiveSheet();
        //定义sheet名称
        $PHPSheet->setTitle($setTitle);
        
        //excel的列 这么多够用了吧？不够自个加 AA AB AC ……
        $letter = [
            'A','B','C','D','E','F','G','H','I','J','K','L','M',
            'N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
        ];
        //把列名写入第1行 A1 B1 C1 ...
        for ($i=0; $i < count($list[0]); $i++) {
            //$letter[$i]1 = A1 B1 C1  $letter[$i] = 列1 列2 列3
            $PHPSheet->setCellValue("$letter[$i]1","$columName[$i]");
        }
        //内容第2行开始
        foreach ($list as $key => $val) {
            //array_values 把一维数组的键转为0 1 2 3 ..
            foreach (array_values($val) as $key2 => $val2) {
                //$letter[$key2].($key+2) = A2 B2 C2 ……
                $PHPSheet->setCellValue($letter[$key2].($key+2),$val2);
            }
        }
    
        $execlpath = './uploads/exportExcel/';
        if (!file_exists($execlpath)){
    		mkdir($execlpath);
    	}
    	$execlpath .= rand_string(12,'',time()).'excel.xls';
    
        //生成2007版本的xlsx
        $PHPWriter = \PHPExcel_IOFactory::createWriter($PHPExcel,'Excel2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');
        $PHPWriter->save($execlpath);


         if($list){
		 	return returnAjax(0,'成功',config('res_url').ltrim($execlpath,"."));
		 }else{
		 	return returnAjax(1,'失败!',"失败");
		 }
    
       // echo ; 
    
    }
    
    //获取任务的配置信息
	function taskgetConfig(){

		$taskId = input('taskId','','trim,strip_tags');
		
		if (!$taskId){
			return returnAjax(0,'成功',array());
			
		}
		
		 $where = array();
		 $where["task_id"] = $taskId;
		// $where["status"] = 1;
		 
		 $list = Db::name('tel_config')->where($where)->find();
		 
		 $scenarioslist = Db::name('tel_scenarios')->field("name")->where('id',$list["scenarios_id"])->find();
		 $list["scenarios"] = $scenarioslist['name'];

		 
		// \think\Log::record('list='.json_encode($list));
		 
		 if (isset($list['level'])){
				$leveltemp = explode(",", $list['level']);
		 
				 foreach($leveltemp as &$item){		 		
						switch ($item) {
							case 6:
								$item = 'A类';
								break;
							case 5:
								$item = 'B类';
								break;
								 
							case 4:
								$item = 'C类';
								break;
							case 3:
								$item = 'D类';
								break;
							case 2:
								$item = 'E类';
								break;
							default:
								$item = 'F类';
					 
						}
				 
				 }
		 }
		 else{
		 	$leveltemp = array();
		 }
		 
		switch ($list['status']) {
			case 0:
				$list['statusstr'] = '暂停';
				break;
			case 1:
				$list['statusstr'] = '开启';
				break;
			case 2:
				$list['statusstr'] = '人工暂停';
				break;
			case 3:
				$list['statusstr'] = '停止';
				break;
			case 4:
				$list['statusstr'] = '线路欠费';
				break;	
			default:
				$list['statusstr'] = '软删除';
		} 
		 
		if($list['robot_cnt'] == 0){
			$list['robotCnt'] = '0';
		}else{
			$list['robotCnt'] = '1个';
		}

		 
		 //下面是计算完成度
					
		$cwhere = array();
		$cwhere["task"] = $taskId;
		$cwhere["status"] = ['>',0];
		$count = Db::name('member')->where($cwhere)->count(1);

		$here = array();
		$here["task"] =$taskId;
		$here["status"] = ['>',1];
		$Molecular = Db::name('member')->where($here)->count(1);

		if($count > 0 && $Molecular > 0){
			$percent = round(($Molecular / $count) * 100,2);
		}else{
			$percent = 0;
		}
			
		
		$where = array();
		$where["task"] =$taskId;
		$where["status"] = 2;
		$callSucc = Db::name('member')->where($where)->count(1);
		if($callSucc > 0 && $Molecular > 0){
			$call_rate = round(($callSucc / $Molecular) * 100,2);
		}else{
			$call_rate = 0;
		}
		
		
		$backdata = array();
		$backdata["list"] = $list;
		$backdata["result"] = $list["status"];
		$backdata["level"] = implode(",", $leveltemp);
		$backdata["Molecular"] = $Molecular;
		$backdata["count"] = $count;
		$backdata["percent"] = $percent;
		
		$backdata["call_rate"] = $call_rate;
		
		
		if($list){
			return returnAjax(0,'成功',$backdata);
		}else{
			return returnAjax(1,'error!',"失败");
		}
			 
	}
	
	
	//新的编辑计划,获取任务信息
	public function editplanInfo(){

		$id = input('id','','trim,strip_tags');
		//获取任务表的信息
		$slist = $this->connect->table('autodialer_task')
				 ->field('uuid,name,call_pause_second,disable_dial_timegroup,destination_extension,maximumcall,start,remark')
				 ->where('uuid', $id)->find();


		//获取配置表的信息
		$cfresult = Db::name('tel_config')
					->field('id,level,sale_ids,scenarios_id,destination_extension,phone,call_type,bridge,robot_cnt,push_type,line_id')
					->where('task_id', $id)->find();	
								
		$cfresult['sale_ids'] = explode(",", $cfresult['sale_ids']);
		$cfresult['level'] = explode(",", $cfresult['level']);
		
		$tsr = Db::name('tel_tsr')
						->field('id')
						->where("phone",$cfresult['bridge'])->find();
		//$cfresult['bridge'] = $tsr['id'];
		
		$slist['config'] = $cfresult;
										
				//根据时间分组id获取时间范围				
				$TRresult = $this->connect->table('autodialer_timerange')
							->where('group_uuid', $slist['disable_dial_timegroup'])
							->order('uuid asc')
							->select();
													
               
                if(count($TRresult)){

                	$onestart = strtotime($TRresult[0]["end_datetime"]);
					$onestart = date("H:i:s",($onestart+60));
				
					$oneend = strtotime($TRresult[1]["begin_datetime"]);
					$oneend = date("H:i:s",($oneend - 60));
				
		 
					$towstart = strtotime($TRresult[1]["end_datetime"]);
					$twostarts = date("H:i:s",($towstart + 60));
										

					$towend = strtotime($TRresult[2]["begin_datetime"]);
					$twoend = date("H:i:s",($towend - 60));
								
					
					$TRresult[0]["begin_datetime"] = $onestart;
					$TRresult[0]["end_datetime"] = $oneend;
					$TRresult[1]["begin_datetime"] = $twostarts;
					$TRresult[1]["end_datetime"] = $twoend;	

                }
                
                $slist['timerange'] = $TRresult;	
								
						
										
				//根据时间分组id 获取定时器
						
				$timerresult = $this->connect->table('autodialer_timer_task')
								 ->where('group_id', $slist['disable_dial_timegroup'])
								 ->where('task_id', $id)
								 ->find();
				
				
				
				$timerresult['week_list'] = explode(",",$timerresult['week_list']);
				 
				$slist['timer'] = $timerresult;
					 
					 
		$simwhere['phone'] = $cfresult['phone'];
	    if ($cfresult['call_type'] == 0){
			$sim = Db::name('tel_sim')->field('id,phone')->where($simwhere)->find();
		}
		else{
			$sim = Db::name('tel_line')->field('id,phone')->where($simwhere)->find();
		}
		$slist['phone'] = $sim['id'];

		//$this->assign("list",$slist);
			 
		// ===========================================================================================
				
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		//echo $super;exit;
	
		$where = array();
		if(!$super){
			$where['member_id'] = $uid;
		}
		$where['status'] = 1;
	
		$scenarioslist = Db::name('tel_scenarios')->where($where)->field('id,name')->order('id asc')->select();
		
		 $where = array();
		 if(!$super){
			$where['pid'] = $uid;
		 }
		 $where['status'] = 1;
		 $where['user_type'] = 1;
		
		$adminlist = Db::name('admin')->field('id,username')->where($where)
						->order('id asc')->select();
		

		$backdata = array();
		$backdata['list'] = $slist;
		// $backdata['scenarioslist'] = $scenarioslist;
		// $backdata['adminlist'] = $adminlist;
		//$backdata['tsrlist'] = $tsrlist;

        return returnAjax(0,'成功',$backdata);
					
					
	}
		
	
	//号码管理（删除选中号码，删除未呼叫号码，删除所有号码，导出条件号码（已呼出，未呼出））
	public function number(){
		
	
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		$IdList = getSubordinateId(); //下级Id数组	
		
		$where = array();
		if(!$super){
			$where['m.owner'] = ['in',$IdList];
		}

	  	
		$list = Db::name('member')
		->field('a.username as ownerName,m.uid,m.username,m.mobile,m.last_dial_time,m.status,m.scenarios_id')
		->alias('m')
		->where($where)
		->join('admin a','a.id = m.owner','LEFT')		
		->order('uid desc')
		->paginate(10, false, array('query'  =>  $this->param));

		$page = $list->render();
		$list = $list->toArray();

	
		$this->assign('list', $list['data']);
		$this->assign('page', $page);

		return $this->fetch();
		
		
	}	
	
	
	/**
    * 删除，批量删除，接收数组
    */
   public function delNum(){
	   
	   	$mId = input('id/a','','trim,strip_tags');//接收数组
			

	   	$list = Db::name('member')->where('uid','in', $mId)->delete();
	   
	   	if($list){
	   		return returnAjax(0,'成功',$list);
	   	}else{
	   		return returnAjax(1,'error!',"失败");
	   	}
	   	
   	
   }
   
   /**
    * 删除，批量删除，接收数组
    */
   public function delType(){
   
	$type = input('type','','trim,strip_tags');//接收数组

	$user_auth = session('user_auth');
	$uid = $user_auth["uid"];
	$super = $user_auth["super"];
	
	$where = array();
	
	$taskId = input('taskId','','trim,strip_tags');
	
	$where["task"] = $taskId;	
	
	if(!$super){	
		$IdList = getSubordinateId(); //下级Id数组	
		$where['owner'] = ['in',$IdList];
	}
	
	if($type == "no"){
		$where['status'] = ['<>',2];
	}
	
   	$list = Db::name('member')->where($where)->delete();
   
   	if($list){
   		return returnAjax(0,'成功',$list);
   	}else{
   		return returnAjax(1,'error!',"失败");
   	}
   	
   	
   }
   
   
 //导出客户列表
public function exportRecord()
{

    $url = "./application/user/static/template.xlsx";
	$foo = new \PHPExcel();
	$extension = strtolower( pathinfo($url, PATHINFO_EXTENSION) );
    
	//区分上传文件格式
	if($extension == 'xlsx') {
		$inputFileType = 'Excel2007';
		$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
	}
	else{
		$inputFileType = 'Excel5';
		$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
	}
	$objPHPExcel = $objReader->load($url, $encode = 'utf-8');
	
	$excelArr = $objPHPExcel->getsheet(0)->toArray();
	
	$item = array(); 
	$name = array();
	
	foreach ($excelArr[0] as $itemk => $itemv ){
		
		array_push($name,$itemv);
			            	
   		$result = array(); 
        preg_match_all("/(?:\[)(.*)(?:\])/i",$itemv, $result); 
		array_push($item,$result[1][0]);
		
    }
    
	$string = implode ( "," , $item );

	//$columName = ['客户姓名','客户号码'];
	$columName = $name;
	
	// $columName = ['客户姓名','客户号码'];
	
	$user_auth = session('user_auth');
	$uid = $user_auth["uid"];		 
	//$ctype['owner'] = $uid;
    $super = $user_auth["super"];

	$cwhere = array();


	$type = input('type','','trim,strip_tags');
	$taskId = input('taskId','','trim,strip_tags');
	
	$cwhere["task"] = $taskId;		

	$cwhere["user_type"] = 0;  //白名单   0是普通用户 1是白名单用户
		
    if (!$super){
		$cwhere["owner"] = $uid;
	}

	if($type == "already"){
		$cwhere["status"] = 2;
	}else if($type == "no"){
		$cwhere["status"] = ['<',2];
	}
    	
	

    $mList = Db::name('member')->field($string)->where($cwhere)->order('uid asc')->select();
    

	$list = $mList; //array($one,$two,$three);

	$setTitle='Sheet1';
	$fileName='文件名称';

    if ( empty($columName) || empty($list) ) {
        return returnAjax(1,'列名或者内容不能为空!',"失败");
    }
    
    if ( count($list[0]) != count($columName) ) {
        return returnAjax(1,'列名跟数据的列不一致!',"失败");
    }
    
    //实例化PHPExcel类
    $PHPExcel = new \PHPExcel();
    //获得当前sheet对象  
    $PHPSheet = $PHPExcel->getActiveSheet();
    //定义sheet名称
    $PHPSheet->setTitle($setTitle);
    
    //excel的列 这么多够用了吧？不够自个加 AA AB AC ……
    $letter = [
        'A','B','C','D','E','F','G','H','I','J','K','L','M',
        'N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
    ];
    //把列名写入第1行 A1 B1 C1 ...
    for ($i=0; $i < count($list[0]); $i++) {
        //$letter[$i]1 = A1 B1 C1  $letter[$i] = 列1 列2 列3
        $PHPSheet->setCellValue("$letter[$i]1","$columName[$i]");
    }
    //内容第2行开始
    foreach ($list as $key => $val) {
        //array_values 把一维数组的键转为0 1 2 3 ..
        foreach (array_values($val) as $key2 => $val2) {
            //$letter[$key2].($key+2) = A2 B2 C2 ……
            $PHPSheet->setCellValue($letter[$key2].($key+2),$val2);
        }
    }

    $execlpath = './uploads/exportExcel/';
    if (!file_exists($execlpath)){
			mkdir($execlpath);
	}
	  $execlpath .= rand_string(12,'',time()).'excel.xls';

    //生成2007版本的xlsx
    $PHPWriter = \PHPExcel_IOFactory::createWriter($PHPExcel,'Excel2007');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
    header('Cache-Control: max-age=0');
    $PHPWriter->save($execlpath);

   // echo config('res_url').ltrim($execlpath,"."); 
    
	if($list)
	{
		return returnAjax(0,'成功',config('res_url').ltrim($execlpath,"."));
	}
	else{
	 	return returnAjax(1,'失败!',"失败");
	}
    

}

   
   
   


}