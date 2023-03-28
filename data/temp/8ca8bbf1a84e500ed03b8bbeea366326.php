<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"/www/wwwroot/web/application/user/view/label/index.html";i:1551953760;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title><?php echo (isset($allcinfig['websitename']) && ($allcinfig['websitename'] !== '')?$allcinfig['websitename']:''); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/libs/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/libs/nanoscroller.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/common.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugs/iconfonts/iconfont.css?v=90"/>
<link rel="stylesheet" type="text/css" href="__CSS__/style.css?v=1"/>
<script src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript">
	var BASE_URL = "<?php echo config('base_url'); ?>"; //根目录地址
</script>
<!--[if lt IE 9]>
<script src="__PUBLIC__/js/html5shiv.js"></script>
<script src="__PUBLIC__/js/respond.min.js"></script>
<![endif]-->


<style>
#sidebar-nav .nav>li>a>span {
    margin-left: 35px;
    font-size: 1.1em;
    font-weight: 400;
    color: #8393a8;
}
.imgstyle{
	
	border-radius: 50%;width: 100px;margin-top: 15px;height: 100px;
}
#sidebar-nav .nav>li>a>span {
    margin-left: 35px;
    font-size: 1.1em;
    font-weight: 400;
    color: #ffffff;
}
.message{
	background-color: red;
    width: 16px;
    height: auto;
    border-radius: 32px;
    font-size: 10px;
    color: white;
    position: absolute;
    text-align: center;
    line-height: 1.5;
    padding: 1px;
}

.tiphelp {
   
    font-size: 30px;
    color: #c7c7c7;
}

</style>
</head>
<body>
<div id="theme-wrapper">
	<header class="navbar" id="header-navbar">
		<div class="container">
			<div class="navbar-header" style="text-align:center;">
			
			
				<a href="javascript:void(0);" id="logo" class="navbar-brand">
					<?php if(empty($allcinfig['logo']) || (($allcinfig['logo'] instanceof \think\Collection || $allcinfig['logo'] instanceof \think\Paginator ) && $allcinfig['logo']->isEmpty())): ?>
					  
					  <?php echo (isset($allcinfig['name']) && ($allcinfig['name'] !== '')?$allcinfig['name']:'PSSDSS电话'); else: ?>
					  <img src="<?php echo (isset($allcinfig['logo']) && ($allcinfig['logo'] !== '')?$allcinfig['logo']:'__PUBLIC__/images/logo.png'); ?>" alt="" class="normal-logo logo-white" />
					<?php endif; ?>
				</a>
				<!--
				<a class="navbar-brand navbar-small-nav" id="make-small-nav"> 
					<i class="fa fa-bars"></i>
				</a>
			-->
		
			</div>

			<div class="collapse navbar-collapse" id="header-nav">
				
				<div class="pull-left" style="line-height: 60px;padding-left: 15px;">
					
					亲爱的【<?php echo (isset($allcinfig['userType']) && ($allcinfig['userType'] !== '')?$allcinfig['userType']:'用户'); ?>】<span class="hidden-xs"><?php echo session('user_auth.username'); ?></span>欢迎您！
				</div>
			
				<ul class="nav navbar-nav pull-right">
					
	
					<li class="notice-bar">
						<a href="<?php echo url('Message/my',array('status'=>0)); ?>" style="padding-right:8px;" class="notice-icon" data-toggle="tooltip" data-placement="bottom" title="" 
						data-original-title="消息中心">
						<?php if($msgNum > 0): ?>
							<span class="message"><?php echo $msgNum; ?></span>
						<?php endif; ?>
						</a>	
					</li>
					
					
				<li class="notice-bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						
					  <span class="glyphicon glyphicon-question-sign tiphelp" aria-hidden="true"></span>
					
					</a>
					
					<ul class="dropdown-menu dropdown-menu-right" >
					
						<li>
							<a href="<?php echo url('help/index'); ?>">
								<i class="fa fa-user"></i>
								用户手册
							</a>
						</li>
						
					</ul>
				
				</li>
					
					<li class="dropdown profile-dropdown hidden-sm hidden-xs">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php if(session('user_auth.logo') == ''): ?>
								__PUBLIC__/images/samples/default-img.png
							<?php else: ?>
								<?php echo session('user_auth.logo'); endif; ?>" alt=""/>
							<span class="hidden-xs"><?php echo session('user_auth.username'); ?></span>
							 <b class="caret"></b>
						</a>
						<ul class="dropdown-menu dropdown-menu-right" >
						
							<li>
								<a href="<?php echo url('Manager/editAdmin',array('id'=>session('user_auth.uid'))); ?>">
									<i class="fa fa-user"></i>
									修改资料
								</a>
							</li>
							<li>
								<a href="<?php echo url('Manager/editpwd'); ?>">
									<i class="fa fa-cog"></i>
									修改密码
								</a>
							</li>				
				
							<li>
								<a href="<?php echo url('index/logout'); ?>">
									<i class="fa fa-power-off"></i>
									退出
								</a>
							</li>
							
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
	</header>

	<div id="page-wrapper" class="container">
		<div class="row">
			<div id="nav-col">
				<section id="col-left" class="col-left-nano">
					<div id="col-left-inner" class="col-left-nano-content">
						<!-- 
						<div style="height: 180px;text-align: center;">
							<img class="imgstyle" src="
							<?php if(session('user_auth.logo') == ''): ?>
								__PUBLIC__/images/samples/default-img.png
							<?php else: ?>
								<?php echo session('user_auth.logo'); endif; ?>
						
							" />
							<p style="color: white;padding: 8px 5px;font-size: 16px;font-weight: 600;"><?php echo session('user_auth.username'); ?></p>
						</div>
						 -->
						<div id="sidebar-nav">
							<ul class="nav nav-pills nav-stacked" style="margin-bottom: 80px;">
							<li class="nav-header hidden-sm hidden-xs  open">
							  <a href="/user/index/index">
  											 <i class="icon iconfont icon-gongzuotai1"></i>
  												<span style="padding-left:10px;">控制台</span>
												
  											</a>
											</li>
							  <?php if(isset($extend_menu)): ?>
							  <li class="nav-header hidden-sm hidden-xs <?php if($extend_menu['expand'] == '1'): ?>open<?php endif; ?>">
									<a href="#" class="dropdown-toggle">
										<i class=""></i>
										<span><?php echo $extend_menu['title']; ?></span>
										<i class="fa <?php if($extend_menu['expand'] == 1): ?>fa-angle-down<?php else: ?>fa-angle-right<?php endif; ?> drop-icon"></i>
									</a>
									<?php if(isset($extend_menu['child'])): ?>
									<ul class="submenu" <?php if($extend_menu['expand'] == '1'): ?>style="display:block;"<?php endif; ?>>
									<?php if(is_array($extend_menu['child']) || $extend_menu['child'] instanceof \think\Collection || $extend_menu['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $extend_menu['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
									  
  										<li class="">
  											<a href="<?php echo url($item['url']); ?>">
  											 
  												<span style="padding-left:25px;<?php if($item['style'] == 'active'): ?>color:#fff;<?php endif; ?>"><?php echo $item['title']; ?></span>
  											</a>
  										</li>
										
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
									<?php endif; ?>
								</li>
							  <?php endif; if(is_array($__menu__) || $__menu__ instanceof \think\Collection || $__menu__ instanceof \think\Paginator): $i = 0; $__LIST__ = $__menu__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>					
								<li class="nav-header hidden-sm hidden-xs <?php if($menu['expand'] == '1'): ?>open<?php endif; ?>">
									<a href="#" class="dropdown-toggle">
										<i class="icon iconfont <?php echo $menu['icon']; ?>"></i>
										<span><?php echo $menu['title']; ?></span>
										<i class="fa <?php if($menu['expand'] == 1): ?>fa-angle-right add1<?php else: ?>fa-angle-right<?php endif; ?> drop-icon"></i>
									</a>
									<?php if(isset($menu['child'])): ?>
									<ul class="submenu" <?php if($menu['expand'] == '1'): ?>style="display:block;"<?php endif; ?>>
									<?php if(is_array($menu['child']) || $menu['child'] instanceof \think\Collection || $menu['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $menu['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
									  
  										<li class="">
  											<a href="<?php echo url($item['url']); ?>">
  											 
  												<span style="padding-left:25px;<?php if(isset($item['style'])): ?> color:#fff;<?php endif; ?>"><?php echo $item['title']; ?></span>
  											</a>
  										</li>
										
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
									<?php endif; ?>
								</li>
							
							
								<?php endforeach; endif; else: echo "" ;endif; ?>
								
							</ul>
						</div>
					</div>
				</section>
				<div id="nav-col-submenu"></div>
			</div>

			<div id="content-wrapper">
				<div class="row">
					<div class="col-lg-12">
						
						<div class="row">
							<div class="col-lg-12">
								

<style type="text/css">
	
.table tbody>tr>td {
	padding: 6px 8px;
}
.table-responsive {
	min-height: .01%;
	overflow-x: hidden;
}

.textwidth{
	width:250px;
}
	

.dropdown-menu>li>a {
    color: #0f0e0e;
    font-size: 1em;
    line-height: 1.7;
    padding-left: 35px;
    transition: border-color 0.1s ease-in-out 0s,background-color 0.1s ease-in-out 0s;
    padding-top: 5px;
}
</style>

<script type="text/javascript" src="__PUBLIC__/plugs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugs/bootstrap-select/dist/css/bootstrap-select.min.css" />


<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix">	
		
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			  <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-iconset0328"></i>标签管理</h1>
				<a class="btn btn-primary" href="javascript:void(0);" onclick="addNew(0);">添加标签</a>
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
		
	        <section class="navbar navbar-default main-box-header clearfix">
	         <div  class="pull-right">
				<form class="form-inline"  method="get" role="form">
					 
					<div class="form-group">
						<label>标签名：</label>
						<input type="text" class="form-control" id="keyword" name="keyword" placeholder="请输入标签名.....">
					</div>
					<button class="btn btn-primary" type="submit">搜索</button>
					<span class="btn btn-primary" onclick="loadexcel();">导入</span>
				</form>
				
			</div>
		   </section>

		     <div style="height:10px;line-height:30px;background-color:#FBFBFB;"></div>
		     
			  <div class="table-responsive">
			  
				 <table class="table table-bordered table-hover">
				   <thead>
					    <tr>
					        <th class="text-center"></th>
							<th class="text-center">所属人</th>
					        <th class="text-center">标签名称</th>
					        <th class="text-center">关键字</th>
					        <th class="text-center">操作</th> 
					    </tr>
				    </thead>
				   <tbody>
				      <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
  
								<tr>
								 <td class="text-center">
										<input type="checkbox" name="roleids" class="rolecheck" value="<?php echo $vo['id']; ?>"/>
								 </td>
									<td class="text-center"><?php echo $vo['username']; ?></td>
									<td class="text-center"><?php echo $vo['label']; ?></td>
									<td class="text-center"><?php echo $vo['keyword']; ?></td>
							
									<td class="text-center">
										<a href="javascript:void(0);" onclick="addNew(<?php echo $vo['id']; ?>);">编辑</a>
										<a href="javascript:void(0);" onclick="delRole(<?php echo $vo['id']; ?>);">删除</a>	
									</td>
								</tr>  
				       <?php endforeach; endif; else: echo "" ;endif; ?>
		          
				    </tbody>
				  </table>
				    <div class="row">
						<div class="col-sm-4 text-left"></div>
						<div class="col-sm-8 text-right"><?php echo $page; ?></div>
					</div>
			  </div>
		
				<footer class="main-box-footer clearfix">
					<div class="pull-left">
						<input class="check-all" onclick="allcheck();" type="checkbox"/>全选
						<button class="btn btn-primary" onclick="delRole(0);" target-form="ids">删 除</button>
					</div>
				</footer>
		</div>
					
	</div>					
    


</div>

<script type="text/javascript" src="__PUBLIC__/plugs/jquery/jquery.form.min.js"></script>


 <script type="text/javascript">
 
 $(function(){
 	
	var keyword = "<?php echo (isset($_GET['keyword']) && ($_GET['keyword'] !== '')?$_GET['keyword']:''); ?>";
	$('#keyword').val(keyword);
	
			 
     // 1.基本参数设置 
     var options = { 
         type: 'POST',     // 设置表单提交方式
         url: "<?php echo url('user/Label/importExcel'); ?>",    // 设置表单提交URL,默认为表单Form上action的路径
         dataType: 'json',    // 返回数据类型
         beforeSubmit: function(formData, jqForm, option){    // 表单提交之前的回调函数，一般用户表单验证
             // formData: 数组对象,提交表单时,Form插件会以Ajax方式自动提交这些数据,格式Json数组,形如[{name:userName, value:admin},{name:passWord, value:123}]
             // jqForm: jQuery对象,，封装了表单的元素   
             // options: options对象
          //   var str = $.param(formData);    // name=admin&passWord=123
           //  var dom = jqForm[0];    // 将jqForm转换为DOM对象
            // var name = dom.name.value;    // 访问jqForm的DOM元素
             /* 表单提交前的操作 */
             return true;  // 只要不返回false,表单都会提交  
         },
         success: function(responseText, statusText, xhr, $form){    // 成功后的回调函数(返回数据由responseText获得),
					 if (responseText.code == '0') {
						 window.location.href=window.location.href;
					 }else{
						alert(responseText.msg);
						//$('#exampleModal').modal('show');
					 }

         },  
         error: function(xhr, status, err) {            
             alert("操作失败!");    // 访问地址失败，或发生异常没有正常返回
         },
         clearForm: true,    // 成功提交后，清除表单填写内容
         resetForm: true    // 成功提交后，重置表单填写内容
     }; 
     
     // 2.绑定ajaxSubmit()
     $("#fileform").submit(function(){     // 提交表单的id
         $(this).ajaxSubmit(options); 
         return false;   //防止表单自动提交
     });
 
		
})
 

//删除角色
 function delRole(id){
    var r=confirm('确认删除?');
     	if (!r) 
           return; 
     	   var ids;
 	    	if(id){
 	    		var Ids=[];
 	    		Ids.push(id);
 	    		ids = Ids;
 	    	}else{
 	    		 var IdsVal = [];
 	        	 var roleids = document.getElementsByName("roleids");
 	    		 for ( var j = 0; j < roleids.length; j++) {
 	    		    if (roleids.item(j).checked == true) {
 	    		    	IdsVal.push(roleids.item(j).value);
 	    		    }
 	    		 }
 	    		 ids = IdsVal;
 	    	}
 		
 	    	if(!ids.length){
 	    		alert("至少选择一条。");
 	    		 return false; 
 	    	}
 	    	
     		 $.post("<?php echo url('delLabel'); ?>",{'label_id':ids},function(data){
     			if (data.code) {
		    		 alert(data.msg);
		    	}else{
		    		 location.reload();
		    	}
 				
 			}); 
     

 }
//全选
 function allcheck(){			
 	if ($('.check-all').is(":checked")) {	
 		$('.rolecheck').prop("checked","checked");
 	}else{
 		$('.rolecheck').prop("checked",false);
 	}

 }
  
 </script>
  
</div>



<!-- 导入标签  Large modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog" style="width:380px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">选择excel文件</h4>
			    </div>
				<div class="modal-body">
					
					<form id="fileform" action="<?php echo url('user/Label/importExcel'); ?>" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
						
						<div class="form-group">
							<label class="col-lg-3 control-label">导入给谁：</label>
							<div class="col-lg-8 col-sm-8">
								<select class="form-control selectpicker" multiple data-hide-disabled="true" id="targetObj"  title="请选择要导入给谁" name="targetObj[]">
								  
								    <?php if(is_array($adminlist) || $adminlist instanceof \think\Collection || $adminlist instanceof \think\Paginator): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?>
									   <option value="<?php echo $vos['id']; ?>"><?php echo $vos['username']; ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
									
									
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-lg-3 control-label"></label>
							<div class="col-lg-8 col-sm-8">
								<input type="file" class="" id="excelId" name="excel" />
							</div>
						</div>
						<br/>
				        <a href="__STATIC__/label.xlsx" >模板下载</a>
						
						
					</form>
				   
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" onclick="Savechange();" class="btn btn-primary">保存</button>
				</div>
			</div>
						 
			</div>
		 
    <script type="text/javascript">

	    //保存页面
		function loadexcel(){	
			$('#exampleModal').modal('show');
		}	

		//保存页面
		function Savechange(){	
			var excel = document.getElementById('excelId');
			if(excel.files[0] == undefined){
				alert('未上传文件！');
				return false;
			}
			var filevalue = excel.value;
			var index = filevalue.lastIndexOf('.');
			var ename = filevalue.substring(index);
			if(ename != ".xlsx"){
				if(ename != ".xls"){
					alert('文件格式错误。"xlsx"或者"xls"，请用下载的模板改。');
					return false;
				}
			}
			   
		
			$("#fileform").submit();
			$('#exampleModal').modal('hide');
		}	
  
    </script>
      
</div>



<!-- 新建标签 -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							 <span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel">新建(编辑)标签</h4>
				    </div>
				 <div class="modal-body">
				 	
					    <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">
					      
							<div class="form-group">
								<label class="col-lg-2 control-label">标签名：</label>
								<div class="col-lg-10 col-sm-10">
									 <input type="text" class="form-control textwidth" placeholder="请输入标签名" name="labelName" id="labelName" value="" />
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-lg-2 control-label">关键字：</label>
								<div class="col-lg-10 col-sm-10">
									 <textarea name="remark" class="form-control" id="remark" style="width: 70%;"></textarea>
									 <div class="help-block">关键字，多个之间用“,"分隔</div>

								</div>

							</div>
							
							<div class="form-group" id="geishui">
								<label class="col-lg-2 control-label">添加给谁：</label>
								<div class="col-lg-10 col-sm-10">
									<select class="form-control textwidth selectpicker" multiple data-hide-disabled="true" id="targetObj"  title="请选择要添加给谁" name="targetObj[]">
									  
									    <?php if(is_array($adminlist) || $adminlist instanceof \think\Collection || $adminlist instanceof \think\Paginator): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?>
										   <option value="<?php echo $vos['id']; ?>"><?php echo $vos['username']; ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
										
										
									</select>
								</div>
							</div>
						
							
		          			<input type="hidden" name="labelId" id="labelid" value="" />
 
						</form>
					
				  <br/>
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer">
				
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" onclick="uploadData();" class="btn btn-primary">保存</button>
				</div>
			</div>
						 
			</div>
		 
    <script type="text/javascript">

	     //保存页面
		 function addNew(uid){	
			 $("#labelid").val(uid);
			 
			 if(uid > 0){
			 	
			 	$("#geishui").css("display","none");

				 $.ajax({
				 				type: "POST",
				 				dataType:'json',
				 				url: "<?php echo url('User/Label/getLabel'); ?>",
				 				cache: false,
				 				data: {id:uid},
				 				success: function(data) {
								
				 					//location.href = "<?php echo url('User/member/whitelist'); ?>";
									if (data.code == 0) {
										
										  var data = data.data;
											$("#labelName").val(data.label);
											$("#remark").val(data.keyword);
                    
                      						$('#newModal').modal('show');

									}
									
 				 				},
				 				error: function(data) {
				 					alert("提交失败");
				 				}
				 		}) 
				 		
				 
			 }else{
				 	$("#geishui").css("display","block");
				 $("#labelName").val("");
				 $("#remark").val("");

				 $('#newModal').modal('show');

			 }
			
		 }	
		 
		 
		 function uploadData(){
		 	
		 		var labelName = $("#labelName").val();
		 		if(!labelName){
		 			alert("标签名称不能为空"); 
		 			return false; 
		 		}
		 	
		
				var remark = $("#remark").val();
				if(remark==''){
					alert("关键字不能为空"); 
					return false; 
				}
				
				
				var href = "<?php echo url('User/Label/addLabel'); ?>";
				
			 var labelid = $("#labelid").val();
			 if(labelid > 0){
				
				 href = "<?php echo url('User/Label/editLabel'); ?>";
				 
			 }
	
	
		 		 $.ajax({
		 		     type: "POST",
		 		     dataType:'json',
		 		     url: href,
		 		     cache: false,
		 		     data: $("#form").serialize(),
		 		     success: function(data) {
		 
		 		    	if (data.code == 0) {
		 		    	     alert(data.msg + ' 页面即将自动刷新~');
		 		    	 
		 		    	}else{
		 		    		 alert(data.msg);
		 		    		
		 		    	}
							
							location.reload();
							
		 		     },
		 		     error: function(data) {
		 		    	 alert("提交失败");
		 		     }
		 		 }) 
		 		 
		   $('#newModal').modal('hide');

		 }
		 

// 		 function checkname(obj){
// 		 	
// 		 	var name = $(obj).val();
// 		 	
// 		 	$.post("<?php echo url('chackname'); ?>",{'name':name},function(data){
// 		 		
// 		 		if(!data.code){
// 		 			alert(data.msg);
// 		 		}else{
// 		 			//window.location.href=window.location.href;
// 		 		}
// 		 		
// 		 	}); 
// 		 	
// 		 }
// 		 
    </script>
      
</div>



							</div>
						</div>
					</div>
				</div>
				
				<!-- <footer id="footer-bar" class="row"> -->
					<!-- <p id="footer-copyright" class="col-xs-12">Powered by  -->
						<!-- <a href="http://www.ruikesoft.cn" target="_blank">RuiKeSoft,Inc.</a></p> -->
				<!-- </footer> -->
			</div>
		</div>
	</div>
</div>
<script src="__PUBLIC__/js/bootstrap.js"></script>
<script src="__PUBLIC__/js/jquery.nanoscroller.min.js"></script>
<script src="__PUBLIC__/js/pace.min.js"></script>

<script src="__PUBLIC__/js/hopscotch.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/libs/hopscotch.css">

<script src="__PUBLIC__/js/messager.js"></script>
<script src="__JS__/app.js?<?php echo time(); ?>"></script>
<script type="text/javascript">
(function(){
	var RuiKeCMS = window.Sent = {
		"ROOT"   : "__ROOT__", //当前网站地址
		"APP"    : "__APP__", //当前项目地址
		"PUBLIC" : "__PUBLIC__", //项目公共目录地址
		"DEEP"   : "<?php echo config('URL_PATHINFO_DEPR'); ?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo config('URL_MODEL'); ?>", "<?php echo config('URL_CASE_INSENSITIVE'); ?>", "<?php echo config('URL_HTML_SUFFIX'); ?>"],
		"VAR"    : ["<?php echo config('VAR_MODULE'); ?>", "<?php echo config('VAR_CONTROLLER'); ?>", "<?php echo config('VAR_ACTION'); ?>"]
	}
})();
</script>
<script src="__PUBLIC__/js/core.js"></script>

</body>
</html>
