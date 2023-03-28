<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"/www/wwwroot/web/application/user/view/manager/index.html";i:1551974610;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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
								

<link href="__PUBLIC__/plugs/datepicker/css/foundation-datepicker.min.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/plugs/datepicker/js/foundation-datepicker.js"></script>
<script src="__PUBLIC__/plugs/datepicker/js/foundation-datepicker.zh-CN.js"></script>

<style type="text/css">
	.table tbody>tr>td {
	padding: 6px 8px;
	}
	.table-responsive {
	min-height: .01%;
	overflow-x: hidden;
	}

	.messageinfo{
	 text-align:right;
	 
	}
	.infotable tr td{
	 padding:5px;
	}

	.textwidth{
		width:250px;
	}
/* 	.form-group > label{
		min-width: 105px;
	} */
	.form-group > .col-lg-10 {
			width: 80.333333%;
	}
	.field-status{
			float: left;
	}

	.modal-footer {
			text-align: center;
	}
	.form-group {
			margin-bottom: 10px;
	}
	
	.help-block {
	   margin-top: 0px; 
	   margin-bottom: 0px;
	}

</style>
<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix">	
		
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			  <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-nav_promoter"></i>会员管理</h1>
				 <!-- href="<?php echo url('addAdmin'); ?>" -->
			  <a class="btn btn-primary" href="javascript:void(0);" onclick="addNew(0);">添加会员</a>
		  </div>
		</header>
 
		<div class="main-box-body clearfix">
		
	        <section class="navbar navbar-default main-box-header clearfix">
	         <div  class="pull-right">
			   <form class="form-inline"  method="get" role="form">
			   	
			   	  <div class="form-group">
				    <label>用户类型 ：</label>
				    <select class="form-control" name="userType" id="userType">
			            <option value="">显示全部</option>
			           <option value="4">运营商</option>
			           
			            <option value="3">代理商</option>
			            <option value="2">商家</option> 
				    </select>
				  </div>
			   	
			      &nbsp;&nbsp;&nbsp;
				  <div class="form-group">
				    <label>用户名 ：</label>
				    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="请输入用户名">
				  </div>
			    <button class="btn btn-primary" type="submit">搜索</button>
			  </form>
			 </div>
		   </section>

		    <div style="height:10px;line-height:30px;background-color:#FBFBFB;"></div>
		     
			<div class="table-responsive">
			  
				 <table class="table table-bordered table-hover">
				   <thead>
					    <tr>
							<th class="text-center"></th>
							<th class="text-center">名称</th>
							<th class="text-center">手机号码</th>
							<th class="text-center">用户类型</th>
							<th class="text-center">余额</th>
							<th class="text-center">机器人数</th>
							<th class="text-center">注册时间</th>
							<th class="text-center">到期时间</th>
							<th class="text-center">话术审核</th>
							<th class="text-center">状态</th>							
							<th class="text-center">操作</th> 
					    </tr>
				    </thead>
				   <tbody>
				      <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					    <tr>
					     <td class="text-center">
					        <input type="checkbox" name="adminids" class="admincheck" value="<?php echo $vo['id']; ?>"/>
					     </td>
						  <td class="text-center"><?php echo $vo['username']; ?></td>
						  
						  <td class="text-center"><?php echo $vo['mobile']; ?></td>
						  
						   <td class="text-center">
						   	
						   	<?php if($vo['super'] == 1): ?>
						    	超级管理员
							<?php else: switch($vo['user_type']): case "1": ?>员工<?php break; case "2": ?>商家<?php break; case "3": ?>代理商<?php break; case "4": ?>运营商<?php break; default: ?>商家
								<?php endswitch; endif; ?>
						   	
						   </td>
							 <td class="text-center"><?php echo $vo['money']; ?></td>
						   <td class="text-center"><?php echo $vo['robot_cnt']; ?></td>
						  <td class="text-center"><?php echo $vo['create_time']; ?></td>
						   <td class="text-center"><?php echo $vo['expiry_date']; ?></td>
						  
						  
						   <td class="text-center">
						    <?php switch($vo['examine']): case "1": ?>
								<a href="javascript:void(0);" onclick="openAuditing(<?php echo $vo['id']; ?>,0);">开启</a>
						      <?php break; default: ?>
								<a href="javascript:void(0);" onclick="openAuditing(<?php echo $vo['id']; ?>,1);">关闭</a>
						    <?php endswitch; ?>
						  
						  </td>
						 <td class="text-center">
						    <?php switch($vo['status']): case "1": ?>
                      				<a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,0);">开启</a>
						      <?php break; default: ?>
                      				<a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,1);">关闭</a>
						    <?php endswitch; ?>
						  
						  </td>
						  <td class="text-center">
						      <a href="javascript:void(0);" onclick="addNew(<?php echo $vo['id']; ?>);">编辑</a>
						       	<?php if($vo['super'] == 1): ?>
						    	 <span style="color:#ccc;">删除</span>
								<?php else: ?> 
									<a href="javascript:void(0);" onclick="delAdmin(<?php echo $vo['id']; ?>);">删除</a>	
								<?php endif; ?>
					        
							    <a href="javascript:void(0);" onclick="resetPwd(<?php echo $vo['id']; ?>);">重置密码</a>
									<a href="javascript:void(0);" onclick="addmoney(<?php echo $vo['id']; ?>);">充值</a>
					 	  </td>
						</tr>
				       <?php endforeach; endif; else: echo "" ;endif; ?>
				    </tbody>
				  </table>
				 <div class="row">
							<div class="col-sm-4 text-left">
								 <div class="pull-left"></div>	
							</div>
							<div class="col-sm-8 text-right"><?php echo $page; ?></div>
					</div>
			  </div>
			  
		
		<footer class="main-box-footer clearfix">
			<div class="pull-left">
		    <input class="check-all" onclick="allcheck();" type="checkbox"/>全选
				<button class="btn btn-primary" onclick="delAdmin(0);" target-form="ids">删 除</button>
				<button class="btn btn-primary" onclick="setstatus(0,1);" target-form="ids">开启</button>
		    <button class="btn btn-primary" onclick="setstatus(0,0);" target-form="ids">关闭</button>
			</div>
		</footer>
		</div>
					
	</div>					
    


</div>

 <script type="text/javascript">
 
 $(function(){
 	
	var keyword = "<?php echo (isset($_GET['keyword']) && ($_GET['keyword'] !== '')?$_GET['keyword']:''); ?>";
	$('#keyword').val(keyword);
	
	var userType = "<?php echo (isset($_GET['userType']) && ($_GET['userType'] !== '')?$_GET['userType']:''); ?>";
	$('#userType').val(userType);
	
		
	$.post("<?php echo url('backtype'); ?>",{},function(data){
		
		
		if(data.code==0){
						
			var list = data.data;
			var lon = list.length;
			if(lon){
				
				$("#userType").find("option").remove();
				var str = '<option value="">显示全部</option>';
				
				$("#addUserType").find("option").remove();
				var strings = '<option value="" attr-utype="">请选择用户类型</option>';
				
				for(var i=0;i<lon;i++){
					
					str += '<option value="'+list[i]["id"]+'">'+list[i]["name"]+'</option>';
					strings += '<option value="'+list[i]["id"]+'">'+list[i]["name"]+'</option>';
		
				}
				
				$("#userType").append(str); 
				
				$("#addUserType").append(strings); 
				
										
			}
			else{
				alert('该类没有数据。');
			}
			
		}
		else{
			alert(data.msg);
		}
		
		
	}); 
	
})

 
//设置状态
 function setstatus(id,status){			
	 
    var ids;
  	if(id){
  		var Ids=[];
  		Ids.push(id);
  		ids = Ids;
  	}else{
  		 var IdsVal = [];
      	 var roleids = document.getElementsByName("adminids");
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
	 
 	 var url = "<?php echo url('setstatus'); ?>";	
 	 $.ajax({
 	        url : url,
 	        dataType : "json", 
 	        type : "post",
 	        data : {'arrayIds':ids,'status':status},
 	        success: function(data){
 	        	if (data.code) {
		    		 alert(data.msg);
		    	}else{
		    		 location.reload();
		    	}
 	        },
 	        error : function() {
 	        	alert('获取页面列表失败。');
 	        }
 	  });
 }

 
//删除Items
 function delAdmin(id){
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
 	        	 var roleids = document.getElementsByName("adminids");
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
 	    	
     		 $.post("<?php echo url('delAdmin'); ?>",{'admin_id':ids},function(data){
     			if (data.code) {
		    		 alert(data.msg);
		    	}else{
		    		 location.reload();
		    	}
 				
 			}); 
     

 }
 
 //开通人口座机
 
  function openAuditing(id,status){			
	 
    var ids;
  	if(id){
  		var Ids=[];
  		Ids.push(id);
  		ids = Ids;
  	}
  	else{
  		 var IdsVal = [];
      	 var roleids = document.getElementsByName("adminids");
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
	 
 	 var url = "<?php echo url('openAuditing'); ?>";	
 	 $.ajax({
 	        url : url,
 	        dataType : "json", 
 	        type : "post",
 	        data : {'arrayIds':ids,'status':status},
 	        success: function(data){
 	        	if (data.code) {
		    		 alert(data.msg);
		    	}else{
		    		 location.reload();
		    	}
 	        },
 	        error : function() {
 	        	alert('获取页面列表失败。');
 	        }
 	  });
 }

 
//全选
 function allcheck(){		
	 
 	if ($('.check-all').is(":checked")) {	
 		$('.admincheck').prop("checked","checked");
 	}else{
 		$('.admincheck').prop("checked",false);
 	}

 }
 
 function resetPwd(id){
			$.ajax({
				 type: "POST",
				 dataType:'json',
				 url:  "<?php echo url('user/manager/resetPwd'); ?>",
				 cache: false,
				 data: {id:id},
				 success: function(res) {
					if (res.code == 0){
						alert(res.msg);
					}
					else{
						alert(res.msg);
					 }
				 },
				 error: function(data) {
					 alert("提交失败");
				 }
			 }) 
		
		} 
 </script>
  
</div>




<!-- 新建人员 -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">新建(编辑)会员</h4>
				 </div>
				 <div class="modal-body">
						  <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">
						      
				
									<div class="form-group">
								<label class="col-lg-3 control-label"><span style="color: red;">*</span>用户名：</label>
										<div class="col-lg-9 col-sm-9">
									 <input type="text" class="form-control textwidth" onkeyup="checkname(this);" autocomplete="off" placeholder="请输入用户名" name="userName" id="userName" value="" />
										</div>
									</div>
									
									 
									<div class="form-group" id="pwgroup">
										 <label class="col-lg-3 control-label">登陆密码：</label>
											<div class="col-lg-9 col-sm-9">
												 <input type="password" class="form-control textwidth" placeholder="请输入密码...." name="password" id="password" value="" />
											</div>
									</div>         
									 

									<div class="form-group">
								<label class="col-lg-3 control-label"><span style="color: red;" id="phonered">*</span>联系手机：</label>
										<div class="col-lg-9 col-sm-9">
											 <input type="text" class="form-control textwidth" placeholder="请输入联系手机...." name="mobile" id="mobile" value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">会员有效期：</label>
										<div class="col-lg-9 col-sm-9">
									<input type="text" class="form-control textwidth" placeholder="请选择会员有效期" id="expiry_date" name="expiry_date" value="" readonly="">
													<script>
													$('#expiry_date').fdatepicker({
														format: 'yyyy-mm-dd',
														pickTime: true
													});
													</script>	
										</div>
									</div>
									
									<!-- <div class="form-group"> -->
										<!-- <label class="col-lg-3 control-label">联系邮箱：</label> -->
										<!-- <div class="col-lg-9 col-sm-9"> -->
											 <!-- <input type="text" class="form-control textwidth" placeholder="请输入邮箱...." name="email" id="email" value="" /> -->
										<!-- </div> -->
									<!-- </div> -->
								
									<div class="form-group">
								<label class="col-lg-3 control-label"><span style="color: red;">*</span>角色类型：</label>
										<div class="col-lg-9 col-sm-9">
												<select id="roleId" name="roleId" class="form-control textwidth">
										<option value="" attr-utype="">请选择角色类型</option>
													 <?php if(is_array($rolelist) || $rolelist instanceof \think\Collection || $rolelist instanceof \think\Paginator): $i = 0; $__LIST__ = $rolelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
														 <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
													 <?php endforeach; endif; else: echo "" ;endif; ?>
												</select>
					
										</div>
									</div>
							<div class="form-group">
								<label class="col-lg-3 control-label"><span style="color: red;">*</span>用户类型：</label>
								<div class="col-lg-9 col-sm-9">
									
									<select id="addUserType" onchange="changerole();" name="user_type" class="form-control textwidth">
										<option value="" attr-utype="">请选择用户类型</option>
										
									</select>
			
								</div>
							</div>
									
				
									<!-- <div class="form-group"> -->
										<!-- <label class="col-lg-3 control-label">按时计费单价：</label> -->
										<!-- <div class="col-lg-9 col-sm-9"> -->
											<!-- <input type="text" class="form-control textwidth" placeholder="请输入按时计费单价" name="time_price" id="time_price" value="" /> -->
										<!-- </div> -->
									<!-- </div> -->
									<div class="form-group">
										<label class="col-lg-3 control-label">按月计费：</label>
										<div class="col-lg-9 col-sm-9">
											<input type="text" class="form-control textwidth" placeholder="请输入按月计费" name="month_price" id="month_price" value="" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">识别计费单价：</label>
										<div class="col-lg-9 col-sm-9">
											<input type="text" class="form-control textwidth" placeholder="识别计费单价" name="asr_price" id="asr_price" value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">可透支额度：</label>
										<div class="col-lg-9 col-sm-9">
											<input type="text" class="form-control textwidth" placeholder="请输入可透支额度" name="credit_line" id="credit_line" value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">购买机器数：</label>
										<div class="col-lg-9 col-sm-9">
											<input type="text" class="form-control textwidth" placeholder="请输入购买的机器数" name="robot_cnt" id="robot_cnt" value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">损耗率：</label>
										<div class="col-lg-9 col-sm-9">
									 <input type="number" min="0" class="form-control textwidth" style="float: left;" placeholder="请输入损耗率" name="loss_rate" id="loss_rate" value="" />
										   <span style="line-height: 40px;margin-left: 5px;">%</span>
											 <div class="help-block">单位是百分比，请输入小于100的整数</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">话术审核：</label>
										<div class="col-lg-9 col-sm-9" style="margin-top: 6px;">
									
											<div class="field-status">
													<input type="radio" class="radio-radioed" id="Isexamine" name="examine" checked value="1" title="是">
													<span>开启</span>
											</div>
											<div class="field-status" style="margin-left:20px;">
													<input type="radio" class="radio-radioed" id="Notexamine" name="examine" value="0" title="否">
													<span>关闭</span>
											</div>
									
										</div>
										<div style="clear:both;"></div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">识别接口类型：</label>
										<div class="col-lg-9 col-sm-9" style="margin-top: 6px;">
									
											<div class="field-status">
													<input type="radio" class="radio-radioed" id="asr_type1" name="asr_type" checked value="0" title="付费" />
													<span>付费</span>
											</div>
											<div class="field-status" style="margin-left:20px;">
													<input type="radio" class="radio-radioed" id="asr_type2" name="asr_type" value="1" title="免费" />
													<span>免费</span>
											</div>
									
										</div>
										<div style="clear:both;"></div>
									</div>
									
									
				          <input type="hidden" name="adminId" id="mumid" value="" />

								 
							</form>
				  <br/>
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer">				
					<button type="button" onclick="uploadData();" class="btn btn-primary">保存</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				</div>
			</div>
						 
			</div>
		 
    <script type="text/javascript">
    	
    	function changerole(){
    		
    		var utype = $("#addUserType option:selected").text();
    		if(utype == "商家"){
    			$("#phonered").css("display","none");
    		}else{
    			$("#phonered").css("display","");	
    		}
    		
    	}

	     //保存页面
		 function addNew(uid){	
			 $("#mumid").val(uid);
			 
			 if(uid > 0){
				 
				   $('#pwgroup').css('display','none');

				 		$.ajax({
				 				type: "POST",
				 				dataType:'json',
				 				url: "<?php echo url('User/Manager/getadmin'); ?>",
				 				cache: false,
				 				data: {id:uid},
				 				success: function(data) {
									
									if (data.code == 0) {
										
										  var data = data.data;
											$("#userName").val(data.username);
											$("#password").val(data.password);
                      $("#mobile").val(data.mobile);
											$("#expiry_date").val(data.expiry_date);
											$("#email").val(data.email);
											$("#roleId").val(data.role_id);
									$("#addUserType").val(data.user_type);

											if(data.status > 0){
												$("#statusEnable").prop("checked",true)
											}else{
												$("#statusDisable").prop("checked",true)
											}
											
											if(data.open_tsr > 0){
												$("#Openup").prop("checked",true)
											}else{
												$("#Notopen").prop("checked",true)
											}
											
											if(data.examine > 0){
												$("#Isexamine").prop("checked",true)
											}else{
												$("#Notexamine").prop("checked",true)
											}
											
											if(data.asr_type > 0){
												$("#asr_type2").prop("checked",true)
											}else{
												$("#asr_type1").prop("checked",true)
											}
											
											$("#time_price").val(data.time_price);
											$("#month_price").val(data.month_price);
											$("#asr_price").val(data.asr_price);
											$("#credit_line").val(data.credit_line);
	                    $("#robot_cnt").val(data.robot_cnt);
									   	$("#loss_rate").val(data.loss_rate);
                      $('#newModal').modal('show');

									}
									
 				 				},
				 				error: function(data) {
				 					alert("提交失败");
				 				}
				 		}) 
				 		
				 
			 }
			 else{
				 
				 $("#userName").val("");
				 $("#password").val("");
				 $("#mobile").val("");
				 $("#expiry_date").val("");
				 $("#email").val("");
				 $("#roleId").val("");
				 $("#addUserType").val("");

				 $("#statusEnable").prop("checked",true);
				 $("#Openup").prop("checked",true);
				 $("#Isexamine").prop("checked",true);
				 
				 $("#asr_type1").prop("checked",true);
				 
				 $("#time_price").val("");
				 $("#month_price").val("");
				 $("#asr_price").val("");
				 $("#credit_line").val("");
				 $("#robot_cnt").val("");
				 $("#loss_rate").val("0");
				 $('#pwgroup').css('display','block');

				 $('#newModal').modal('show');

			 }
			
		 }	
		 
		 //保存数据
		 function uploadData(){
		 	
		 		var userName = $("#userName").val();
		 		if(!userName){
		 			alert("管理员名称不能为空"); 
		 			return false; 
		 		}
		 	
	 		var utype = $("#addUserType option:selected").val();
	 	
		 	if(utype != 2){
		 	  var phonenumber = $("#mobile").val();
		 	  if(phonenumber==''){
		 		  alert("手机号码不能为空"); 
		 		  return false; 
		 	  }
				
			
		 	  var mobileREa = /^1[3|4|5|6|7|8]\d{9}$/;
		 	  // var matrix = mobileREa.test(mobile);
		 	  
		 	 // var reg = /^((\+?86)|(\(\+86\)))?\d{3,4}-\d{7,8}(-\d{3,4})?$|^((\+?86)|(\(\+86\)))?1\d{10}$/;
		 	  if (!mobileREa.test(phonenumber)) { 
		 	  	 alert("手机号码格式不正确"); 
		 	     return false; 
		 	  }  
				
		 	}
	 	
		
			var expiry_date = $("#expiry_date").val();
			if(!expiry_date){
	 			alert("会员有效期不能为空"); 
	 			return false; 
	 		}
			if(expiry_date){
					var myDate = new Date();
					var date = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate();
					// console.log(date , expiry_date);
					var nowtime = Date.parse(new Date(date));
					var sendtime = Date.parse(new Date(expiry_date));
					if (sendtime <= nowtime) {
						alert("会员有效期不能小于等于当前日期");
						return false;
					}
			}  
			
			var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; 
			var email = $("#email").val();
			if(email){
				if(!reg.test(email)){
						alert("邮箱不符合规则！");
					return false;
				}  
			}
			
			var roleId = $("#roleId").val();
			if(!roleId){
				alert("请选择角色"); 
				return false; 
			}  
			
			var robot_mum = $("#robot_mum").val();
			if(robot_mum==''){
				alert("购买机器数不能为空"); 
				return false; 
			}
			
			var lossRate = $("#loss_rate").val();
			if(lossRate){
				if(lossRate > 100){
					alert("损耗率是小于100的正整数。"); 
					return false; 
				}
			}
			
			
			var href = "<?php echo url('User/Manager/addAdmin'); ?>";
			
			 var mumid = $("#mumid").val();
			 if(mumid > 0){
				
				 href = "<?php echo url('User/Manager/editAdmin'); ?>";
				 
			 }
			 else{
				 
				 var password = $("#password").val();
				 if(!password){
				 alert("密码不能为空"); 
				 return false; 
				 }
				 
				 if(password.length<6|| password.length>12){
					 alert("密码必须大于6位小于12位。");
					 return false; 
				 }
	 
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
							  $('#newModal').modal('hide');
							 location.reload();
	 		    	     
	 		    	}else{
	 		    		alert(data.msg);	 
								
	 		    	}
	 		     },
	 		     error: function(data) {
	 		    	 alert("提交失败");
	 		     }
	 		 }) 
		 }
		 

		 function checkname(obj){
		 	
		 	var name = $(obj).val();
		 	
		    if(name == 'admin'){
		    	return false;
		    }
		 	$.post("<?php echo url('chackname'); ?>",{'name':name},function(data){
		 		
		 		if(!data.code){
		 			alert(data.msg);
		 		}else{
		 			//window.location.href=window.location.href;
		 		}
		 		
		 	}); 
		 	
		 }
		 
    </script>
      
</div>

 
<div class="modal fade" id="MoneyModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">充值</h4>
				  </div>
				 <div class="modal-body">
						  <form id="moneyForm" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">
						      
				
									<div class="form-group">
										<label class="col-lg-3 control-label">金额：</label>
										<div class="col-lg-9 col-sm-9">
											 <input type="text" class="form-control textwidth" placeholder="请输入金额" name="moneyNum" id="moneyNum" value="" />
										</div>
									</div>
									
									
				          <input type="hidden" name="thisAdmin" id="thisAdmin" value="" />

							</form>
				  <br/>
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" onclick="saveData();" class="btn btn-primary">保存</button>
				</div>
			</div>
						 
			</div>
		 
    <script type="text/javascript">

	     //加钱
		 function addmoney(uid){	
			 
			 $("#thisAdmin").val(uid);
			 $("#moneyNum").val("");
       $('#MoneyModal').modal('show');

		 }	
		 
		 
		 function saveData(){
		 	
		 		var moneyNum = $("#moneyNum").val();
		 		if(!moneyNum){
		 			alert("金额不能为空"); 
		 			return false; 
		 		}

				var href = "<?php echo url('User/Manager/addMoney'); ?>";
	
		 		 $.ajax({
		 		     type: "POST",
		 		     dataType:'json',
		 		     url: href,
		 		     cache: false,
		 		     data: $("#moneyForm").serialize(),
		 		     success: function(data) {
		 
		 		     	 //location.href = "<?php echo url('User/member/whitelist'); ?>";
		 		    	if (data.code == 0) {
		 		    	     alert(data.msg + ' 页面即将自动刷新~');
		 		    	 	// location.href = "<?php echo url('User/member/whitelist'); ?>";
		 		    	}else{
		 		    		 alert(data.msg);
		 		    		
		 		    	}
							
							location.reload();
							
		 		     },
		 		     error: function(data) {
		 		    	 alert("提交失败");
		 		     }
		 		 }) 
		 		 
		   $('#MoneyModal').modal('hide');

		 }
		 
		 
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
