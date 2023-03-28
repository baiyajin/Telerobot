<?php
namespace extend\PHPExcel;
namespace extend\PHPExcel\PHPExcel;
namespace app\user\controller;
use app\common\controller\User;
use think\Db;
use think\Session;
use \think\Config;
use Qiniu\json_decode;

class Label extends User{

	
public function _initialize()
{
	parent::_initialize();
	
}	

//标签列表
public function index()
{
	
		$keyword = input('keyword','','trim,strip_tags');
         
         $user_auth = session('user_auth');
		 $uid = $user_auth["uid"];
		 $super = $user_auth["super"];
		 $label = array();
         /*if(!$super){
			$label['t.member_id'] = $uid;
		 }	*/
		 $label['t.type'] = 0;	
		 if($keyword){
			$label['t.label'] = ["like",'%'.$keyword.'%'];
		 }		
		 
		 $IdList = getSubordinateId(); //下级Id数组	

		 $list = Db::name('tel_label')
			->alias('t')
			->field('t.id,t.member_id,t.label,t.keyword,m.username,m.realname')
			->join('admin m','t.member_id = m.id','LEFT')->where('t.member_id','in', $IdList)
			->where($label)->paginate(10, false, array('query'  =>  $this->param)); 

	
		$page = $list->render();
		$list = $list->toArray();
		
		
		$this->assign('list', $list['data']);
		$this->assign('page', $page);
		
		
		
		$IdList = getSubordinateId(); //下级Id数组
		
		$adminlist = Db::name('admin')->field("id,username,realname,user_type")->where('id','in', $IdList)->select();
		
		$this->assign('adminlist', $adminlist);
	

		
  	return $this->fetch();
}


public function getLabel(){
		
		$id = input('id','','trim,strip_tags');
		$mlist = Db::name('tel_label')->where('id', $id)->find();
		
		//$mlist['expiry_date'] = date("Y-m-d H:i:s",$mlist['expiry_date']);
		
		if($mlist){
			
			return returnAjax(0,'获取数据成功',$mlist);

		}else{
			return returnAjax(1,'获取数据失败');

		}
			
}


	public function addLabel(){
		
	 	$labelName = input('labelName','','trim,strip_tags');
    	$remark = input('remark','','trim,strip_tags');
    	
    	$targetObj = input('targetObj/a','','trim,strip_tags'); 
			
	 
		$user_auth = session('user_auth');
		$uid = $user_auth["uid"];
		$super = $user_auth["super"];
		
		$remark = str_replace("，",",",$remark);
		$remark = str_replace("（","(",$remark);
		$remark = str_replace("）",")",$remark);
		$remark = str_replace("【","[",$remark);
		$remark = str_replace("】","]",$remark);
		 
		$label = array();
					
		foreach($targetObj as $key => $val){
			
			$data = array();
			$data['member_id'] = $val;
		    $data['label'] = $labelName;
		    $data['keyword'] = $remark;
		    
		    array_push($label,$data);
		    
		}

		$result = Db::name('tel_label')->insertAll($label);
		 
	 	if($result >= 0){
	 						
			$backdata = array();
			return returnAjax(0,'添加成功',$backdata);

		}else{
			
			$backdata = array();
			return returnAjax(1,'添加失败',$backdata);
		
		}
		 
		
	}
	
	public function editLabel(){
		
		$labelName = input('labelName','','trim,strip_tags');
		$remark = input('remark','','trim,strip_tags');
		$labelId = input('labelId','','trim,strip_tags');
		
		$remark = str_replace("，",",",$remark);
		$remark = str_replace("（","(",$remark);
		$remark = str_replace("）",")",$remark);
		$remark = str_replace("【","[",$remark);
		$remark = str_replace("】","]",$remark);


		$data = array();
		
		$data['label'] = $labelName;
		$data['keyword'] = $remark;
		
		$result = Db::name('tel_label')->where('id', $labelId)->update($data);
		 
		if($result >= 0){
		 
			return returnAjax(0,'编辑成功');
		
		}else{
		
			return returnAjax(1,'编辑失败');
		
		}
					
					
	}

	/**
	 * 删除，批量删除，接收数组
	 */
	public function delLabel(){

		$roleId = input('label_id/a','','trim,strip_tags');//接收数组
  
		$list = Db::name('tel_label')->where('id','in', $roleId)->delete();
	
		if($list){
			return returnAjax(0,'成功',$list);
		}else{
			return returnAjax(1,'error!',"失败");
		}
	}
	
	
	
	 //导入文件
    public function importExcel(){

		  set_time_limit(60*60*16);
		  ini_set('memory_limit','256M');


			if(!empty($_FILES['excel']['tmp_name'])){

				$tmp_file = $_FILES ['excel'] ['tmp_name'];

			}else{
				  return returnAjax(1,'上传失败,请下载模板，填好再选择文件上传。');
			}

			$file_types = explode ( ".", $_FILES ['excel'] ['name'] );
			$file_type = $file_types [count ( $file_types ) - 1];
			
			$targetObj = input('targetObj/a','','trim,strip_tags'); 
			

			/*设置上传路径*/
			$savePath = './uploads/Excel/';
			// 如果不存在则创建文件夹
			if (!is_dir($savePath)){
				mkdir($savePath); 
			}  
			
			/*以时间来命名上传的文件*/
			$str = date ( 'Ymdhis' ); 
			$file_name = $str . "." . $file_type;

			/*是否上传成功*/
			if (! copy ( $tmp_file, $savePath . $file_name )) 
			{
				//$this->error ( '上传失败' );
				return returnAjax(1,'上传失败');
			}
			
			$foo = new \PHPExcel();
			$extension = strtolower( pathinfo($file_name, PATHINFO_EXTENSION) );

			//区分上传文件格式
			if($extension == 'xlsx') {
				$inputFileType = 'Excel2007';
				$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
			}
			else{
				$inputFileType = 'Excel5';
				$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
			}
			$objPHPExcel = $objReader->load($savePath.$file_name, $encode = 'utf-8');
			
			$excelArr = $objPHPExcel->getsheet(0)->toArray();
			
			
			if (count($excelArr) < 2){
				//$this->redirect(Url("User/Member/memberList"),'导入的文件没有数据!');
				return returnAjax(1,'导入的文件没有数据!');
				return;
			}
			
			$user_auth = session('user_auth');
			$uid = $user_auth["uid"];
			
			foreach($targetObj as $key => $val){
				
				$data = array();
				$successCnt = 0;
				$long = count($excelArr);
				$numlist = array();
				foreach ( $excelArr as $k => $v ){
						
					if ($k == 0){
						 continue;
					}
				
					$user['label'] = trim($v[0]);
					$user['type'] = 0;
					$user['keyword'] = trim($v[1]);
					$user['member_id'] = $val;
	
					$successCnt++;
					array_push($data,$user);
		
					if($successCnt == 10 || ($k+1) == $long){
	
						$result = Db::name('tel_label')->insertAll($data);
						// \think\Log::record('num='.count($data));
						array_splice($data, 0, count($data));
						$successCnt = 0;
	
					}
	
				}
				
			}
			
		


		   ini_set('memory_limit','-1');
		   return returnAjax(0,'导入成功');
    }

  
	

}













