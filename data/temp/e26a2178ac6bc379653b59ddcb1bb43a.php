<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"/www/wwwroot/web/application/user/view/member/whitelist.html";i:1551974666;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1564129740;}*/ ?>
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
					  
					  <?php echo (isset($allcinfig['name']) && ($allcinfig['name'] !== '')?$allcinfig['name']:'众维语音机器人'); else: ?>
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
								

<link href="/public/plugs/datepicker/css/foundation-datepicker.min.css" rel="stylesheet" type="text/css">
<script src="/public/plugs/datepicker/js/foundation-datepicker.js"></script>
<script src="/public/plugs/datepicker/js/foundation-datepicker.zh-CN.js"></script>


<style type="text/css">

	.imgclass > td > p>img{
	  width:50px;
	}

	.statusSelect {
	    line-height: 30px;
	    float: left;
	}

	.classifyBox>span {
	    display: inline-block;
	    padding: 6px 12px;
	    border-radius: 4px;
	    background: #fff;
	    font-size: 14px;
	    margin-right: 10px;
	    border: 1px solid rgb(0, 166, 90);
	    color: rgb(0, 166, 90);
	    margin-bottom: 10px;
	    cursor: pointer;
	    transition: all 1s cubic-bezier(.215,.61,.355,1);
	}
	.modal-footer {
			text-align: center;
	}
</style>
<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix">
		
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			   <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-baimingdancelveweihu"></i>黑名单客户</h1>
				 <a class="btn btn-primary" href="javascript:void(0)" onclick="addNew(0);">
					<i class="fa fa-plus-circle fa-lg"></i> 新 增
				 </a> 
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
	        <section class="navbar navbar-default main-box-header clearfix">
	          
				<div class="pull-right">

					<form class="form-inline" method="get" role="form">

						<div class="form-group">
							<label class="statusSelect">时间范围:</label>
							<div class="col-lg-9 col-sm-9">
								<div class="col-lg-12 col-sm-12">
									<input type="text" style="width:167px;" class="form-control" id="startDate" name="startDate" value="" readonly="" />
								</div>
								<script>
								$('#startDate').fdatepicker({
									format: 'yyyy-mm-dd  hh:ii:ss',
									pickTime: true
								});
								</script>	
								
							</div>
						</div>
					至
						<div class="form-group">

							<div class="col-lg-9 col-sm-9">
								<div class="col-lg-12 col-sm-12">
									<input type="text" class="form-control" id="endTime" name="endTime" value="" readonly="" />
								</div>

								<script>
									$('#endTime').fdatepicker({
										format: 'yyyy-mm-dd hh:ii:ss',
										pickTime: true
									});
								</script>	
								
							</div>

						</div>

						<div class="form-group">
						    <label>手机号码：</label>
							<input type="text" class="form-control" style="width:120px;" id="mobile" name="mobile" placeholder="请输入手机号码">
						</div>&nbsp;&nbsp;

						<button class="btn btn-primary" type="submit">搜索</button>
					

					</form>
		       				   
		           	 
				</div>  
			</section>
							   
		  <table class="table table-bordered table-hover">
				   <thead>
						<tr>
								<th></th> 
								<th class="text-center">姓名</th>
								<th class="text-center">手机号</th>
								<th class="text-center">分组</th>
								<th class="text-center" style="width: 139px;">上传时间</th>
		
								<th class="text-center">状态</th>
						
								<th class="text-center">操作</th> 
						</tr>
				 	 </thead>
   			  <tbody>
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<tr class="imgclass">
										<td class="text-center">
											<input type="checkbox" name="userids" class="usercheck" value="<?php echo $vo['uid']; ?>"/>
										</td>
		 
									<td class="text-center"><?php echo $vo['nickname']; ?></td>
									<td class="text-center"><?php echo $vo['mobile']; ?></td>
									 <td class="text-center">
										 <?php if($vo['name'] == ''): ?>未分组
											<?php else: ?> <?php echo $vo['name']; endif; ?>
									 </td>	
									<td class="text-center" style="width: 139px;"><?php echo $vo['reg_time']; ?></td>
		 
									<td class="text-center">

										<?php switch($vo['status']): case "5": ?>意向<?php break; case "4": ?>拒绝<?php break; case "3": ?>无人接听<?php break; case "2": ?>接通后挂断<?php break; case "1": ?>未接听/挂断/关机/欠费<?php break; default: ?>
												未拨打
										<?php endswitch; ?>
										 </td>		
										
									 <td class="text-center">
											<a href="javascript:void(0);" onclick="addNew(<?php echo $vo['uid']; ?>);">编辑</a>
											<a href="javascript:void(0);" onclick="del(<?php echo $vo['uid']; ?>);">删除</a>
										 
									 </td>
								</tr>
										<?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
				
			</table>
				
			<div class="row">
				<div class="col-sm-4 text-left">
					<div class="pull-left">
						<input class="check-all" onclick="allcheck();" type="checkbox"/>全选
						<button class="btn btn-primary" onclick="del(0);" target-form="ids">删 除</button>
					</div>	
				</div>
				<div class="col-sm-8 text-right"><?php echo $page; ?></div>
			</div>


			<div class="row">

				<div class="col-sm-4 text-left">

					<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">
						 <tr>
							 <td class="text-center">会员总数：
							 </td>
							 <td class="text-center"><?php echo $total; ?>
							 </td>
						 </tr> 
					</table>  
							 
				</div> 
						 
				<div class="col-sm-8 text-left"></div>

			</div>
			              

		</div>
					
	</div>					
    
</div>



<!-- 导入用户Large modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">新建黑名单用户</h4>
				 </div>
				 <div class="modal-body">
						  <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">
						         
									<div class="form-group">
										<label class="col-lg-2 control-label">姓名：</label>
										<div class="col-lg-10 col-sm-10">
												 <input type="text" name="nickname" style="width:auto;" class="form-control" id="nickname" value="" />
										</div>
									</div>
								 
									<div class="form-group">
										<label class="col-lg-2 control-label">真实姓名：</label>
										<div class="col-lg-10 col-sm-10">
												<input type="text"  style="width: auto;" class="form-control" name="realname" id="realname" value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-2 control-label">性别：</label>
										<div class="col-lg-10 col-sm-10">
												 &nbsp;<input type="radio" name="sex" value="0" id="sexman" checked /> 男
											   &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="sexwoman" name="sex" value="1" /> 女
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-2 control-label">手机号：</label>
										<div class="col-lg-10 col-sm-10">
												<input type="text" style="width: 250px;" class="form-control" placeholder="请输入手机号" name="phonenumber" id="phonenumber" value="" />
										</div>
									</div>
									
								<div class="form-group" style="margin-top:10px;">
									<label class="col-lg-2 control-label">客户分组：</label>
									<div class="col-lg-10 col-sm-10">
												 <select id="groupId" name="groupId" class="form-control" style="width: 250px;">
																<option value="">请选择角色</option>
												 <?php if(!(empty($groupList) || (($groupList instanceof \think\Collection || $groupList instanceof \think\Paginator ) && $groupList->isEmpty()))): if(is_array($groupList) || $groupList instanceof \think\Collection || $groupList instanceof \think\Paginator): $i = 0; $__LIST__ = $groupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
														 <option 
															 <?php if((isset($dvlist['group_id']) && ($dvlist['group_id'] !== '')?$dvlist['group_id']:'0') == $vo['id']): ?>
																			selected 
																	 <?php endif; ?>
															value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
													 <?php endforeach; endif; else: echo "" ;endif; endif; ?>
										</select>
				
									</div>
									</div>
									
									
				          <input type="hidden" name="mumid" id="mumid" value="" />

								 
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
			 $("#mumid").val(uid);
			 
			 if(uid > 0){
				 
				 		$.ajax({
				 				type: "POST",
				 				dataType:'json',
				 				url: "<?php echo url('User/member/getwhite'); ?>",
				 				cache: false,
				 				data: {id:uid},
				 				success: function(data) {
									
				             console.log(data);
				 					//location.href = "<?php echo url('User/member/whitelist'); ?>";
									if (data.code == 0) {
										
										  var data = data.data;
											$("#nickname").val(data.nickname);
											$("#realname").val(data.real_name);
											
                      $("#phonenumber").val(data.mobile);
											
											if(data.sex > 0){
												$("#sexwoman").prop("checked",true)
											}else{
												$("#sexman").prop("checked",true)
											}
											
	                    $("#groupId").val(data.group_id);
											
                      $('#exampleModal').modal('show');

									}
									
 				 				},
				 				error: function(data) {
				 					alert("提交失败");
				 				}
				 		}) 
				 		
				 
			 }else{
				 
				 $("#nickname").val("");
				 $("#realname").val("");
				 $("#phonenumber").val("");
				 $("#groupId").val("");
				 $("#sexman").prop("checked",true);
				 
				 $('#exampleModal').modal('show');

			 }
			
		 }	
		 
		 
		 function uploadData(){
		 	
		 	  var nickname = $("#nickname").val();
		 	  var realname = $("#realname").val();
		 	  var phonenumber = $("#phonenumber").val();
		 	 
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
				var href = "<?php echo url('User/member/addwhite'); ?>";

			 var mumid = $("#mumid").val();
			 if(mumid > 0){
				 href = "<?php echo url('User/member/editwhite'); ?>";
			 }
	
	
		 		 $.ajax({
		 		     type: "POST",
		 		     dataType:'json',
		 		     url: href,
		 		     cache: false,
		 		     data: $("#form").serialize(),
		 		     success: function(data) {
		 
		 		     	 //location.href = "<?php echo url('User/member/whitelist'); ?>";
		 		    	if (data.code == 1) {
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
		 		 
		   $('#exampleModal').modal('hide');

		 }
		 

	 
  
    </script>
      
</div>

 

<script type="text/javascript">

	$(function(){

	  var mobile = "<?php echo (isset($_GET['keyword']) && ($_GET['keyword'] !== '')?$_GET['keyword']:''); ?>";
	  $('#keyword').val(mobile);
	  
	  var status = "<?php echo (isset($_GET['status']) && ($_GET['status'] !== '')?$_GET['status']:' '); ?>";
	  $('#status').val(status);

	}) 


	 function searchdata(page,type){
		 window.location.href = "<?php echo url('callrecord'); ?>/page/"+page+'/level/'+type;  
	 }
	 
	 //删除
	 function del(id){
	 
	 	var r=confirm('确认删除?');
	 			if (!r) 
	 					return; 
	 
	 			var ids=[];
	 			if(id){
	 				ids.push(id);
	 			}
	 			else{
	 				
	 					var roleids = document.getElementsByName("userids");
	 				for ( var j = 0; j < roleids.length; j++) {
	 						if (roleids.item(j).checked == true) {
	 							ids.push(roleids.item(j).value);
	 						}
	 				}
	 			}
	 		
	 			if(!ids.length){
	 				alert("至少选择一条。");
	 				return false; 
	 			}
	 			$.post("<?php echo url('delMember'); ?>",{'id':ids},function(data){
	 					if(data){
	 						alert(data);
	 					}else{
	 						window.location.href=window.location.href;
	 					}
	 			}); 
	 }
	 	

   //全选
   function allcheck(){			
   	if ($('.check-all').is(":checked")) {	
   		$('.usercheck').prop("checked","checked");
   	}else{
   		$('.usercheck').prop("checked",false);
   	}
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
