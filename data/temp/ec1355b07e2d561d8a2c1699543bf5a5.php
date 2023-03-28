<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"/www/wwwroot/web/application/user/view/manager/sales.html";i:1551974630;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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
								
<link href="__PUBLIC__/plugs/icheck/skins/all.css" rel="stylesheet">
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
.form-group {
   margin-bottom: 5px;
}
</style>
<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix">	
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			  <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-ren"></i>员工管理</h1>
			  <a class="btn btn-primary" href="javascript:void(0);" onclick="addNew();">添加员工</a>
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
		
	        <section class="navbar navbar-default main-box-header clearfix">
	         <div  class="pull-right">
			   <form class="form-inline"  method="get" role="form">
			     
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
					        <th class="text-center">邮箱</th>
							<th class="text-center">是否绑定微信</th>
							<th class="text-center">分配人数</th>
							
					        <th class="text-center">注册时间</th>
							<th class="text-center">最后登录时间</th>
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
						   
						<td class="text-center"><?php echo $vo['email']; ?></td>
						<th class="text-center">
							<?php if($vo['wxname'] == ''): ?>
								否
							<?php else: ?>
								是
							<?php endif; ?>
						
						</th>
						<th class="text-center"><?php echo $vo['num']; ?></th>
						<td class="text-center"><?php echo $vo['create_time']; ?></td>
						<td class="text-center"><?php echo $vo['last_login_time']; ?></td>
						<td class="text-center">
							<?php switch($vo['status']): case "1": ?>
								 <a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,0);">开启</a>
							  <?php break; default: ?>
								  <a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,1);">关闭</a>
							<?php endswitch; ?>
						  
						  </td>
						  
						
						 
						  <td class="text-center">
						  <a href="javascript:void(0);" 
							<?php if($vo['open_id'] == ''): ?>
							 onclick="getQRUrl(<?php echo $vo['id']; ?>);">
								绑定微信
							<?php else: ?>
							 onclick="removeBinding(<?php echo $vo['id']; ?>);">
								解绑微信
							<?php endif; ?>
							</a>
							<a href="javascript:void(0);" onclick="resetPwd(<?php echo $vo['id']; ?>);">重置密码</a>
						    <a  href="javascript:void(0);" onclick="getSale(<?php echo $vo['id']; ?>);">编辑</a>
					        <a href="javascript:void(0);" onclick="delAdmin(<?php echo $vo['id']; ?>);">删除</a>	
							<a href="<?php echo url('myCustomer',array('id'=>$vo['id'])); ?>">我的客户</a>
							<?php if($vo['open_tsr']): ?>
								<a href="javascript:void(0);" onclick="getSipLoginInfo(<?php echo $vo['id']; ?>);">查看坐席账号</a>
							
							<?php endif; ?>
					 	  </td>
						</tr>
				       <?php endforeach; endif; else: echo "" ;endif; ?>
				    </tbody>
				  </table>
				 <div class="row">
                        <div class="col-sm-4 text-left">
                           <div class="pull-left">
						    
						   </div>	
                        	
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

<script src="__PUBLIC__/plugs/icheck/icheck.js"></script>
 <script type="text/javascript">


 $(function(){
		var keyword = "<?php echo (isset($_GET['keyword']) && ($_GET['keyword'] !== '')?$_GET['keyword']:''); ?>";
		$('#keyword').val(keyword);
		 
})

function getSipLoginInfo(id){
 
  var url = "<?php echo url('getSipLoginInfo'); ?>";	
 	 $.ajax({
 	        url : url,
 	        dataType : "json", 
 	        type : "post",
 	        data : {'id':id},
 	        success: function(data){
 	        	if (data.code == 0) {
					var sipInfo = data.data;
					
		    		$('#host_ip').text(sipInfo.hostIp);
					$('#sip_id').text(sipInfo.sipId);
					$('#sip_pwd').text(sipInfo.sipPwd);
					$('#get_sip_logininfo').modal('show');
		    	}
				else{
					alert(data.msg);
				}
 	        },
 	        error : function() {
 	        	alert('获取页面列表失败。');
 	        }
 	  });
}


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
 
  function setopenTsr(id,status){			
	 
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
	 
 	 var url = "<?php echo url('setopenTsr'); ?>";	
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
 
 function getQRUrl(id){
	$('#sale_id').val(id);
	$.ajax({
		 type: "POST",
		 dataType:'json',
		 url:  "<?php echo url('user/manager/getQRUrl'); ?>",
		 cache: false,
		 data: {id:id},
		 
		 success: function(res) {
			if (res.code == 0){
				$('#qr_img').attr('src', res.data);
				<!-- var html = ""; -->
				
				<!-- var elem = document.getElementById("fans-list"); -->
				<!-- elem.innerHTML = ""; -->
				
				<!-- for(var i=0; i<res.data.length;i++){ -->
					<!-- var fans = res.data[i]; -->
				
					<!-- var elDiv=document.createElement("div"); -->
					<!-- elDiv.className="row wx-record"; -->
					<!-- elDiv.innerHTML = '<img src="'+fans.head_pic+'" /> <span>'+fans.nickname+'</span>'; -->
					
					<!-- var elInput=document.createElement("input"); -->
					<!-- elInput.className="icheckbox_square-blue"; -->
					<!-- elInput.setAttribute('type','checkbox'); -->
					<!-- elInput.setAttribute('name','wx_nickname'); -->
					<!-- elInput.setAttribute('value',fans.id); -->
					
					<!-- elDiv.append(elInput); -->
					<!-- $('#fans-list').append(elDiv); -->
					<!-- if (open_id && open_id == fans.id){ -->
						<!-- $(elDiv).iCheck('check'); -->
					<!-- } -->
				<!-- } -->
				
			  <!-- $('#fans-list input').iCheck({ -->
				<!-- checkboxClass: 'icheckbox_square-blue', -->
				<!-- radioClass: 'iradio_square-green', -->
				<!-- increaseArea: '20%' -->
			  <!-- }); -->
			  
				<!-- $('#fans-list input').on('ifChecked', function(event){ -->
					<!-- var currId = $(this).val(); -->
					 <!-- $("#fans-list input").each(function(){ -->
						<!-- if (currId != $(this).val()){ -->
							<!-- $(this).iCheck('uncheck'); -->
						<!-- } -->
					  <!-- }); -->
			
				 <!-- }); -->
		
				
				$('#wx_binding').modal('show');
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
 
 function removeBinding(id){
	 $.ajax({
				 type: "POST",
				 dataType:'json',
				 url:  "<?php echo url('user/manager/removeBinding'); ?>",
				 cache: false,
				 data: {id:id},
				 success: function(res) {
					if (res.code == 0) {
						 location.href = "<?php echo url('User/manager/sales'); ?>";
					}else{
					 alert(res.msg);
						
					}
				 },
				 error: function(data) {
					 alert("提交失败");
				 }
			 }) 
 
 }
 
	
 </script>
 <style>
  .wx-record{
	 margin: 5px 20px;
  
  }
  .wx-record span{
	 padding-right:15px;
  
  }
  .wx-record img{
	width:20px;
  
  }
  </style>
 <div class="modal fade" id="wx_binding" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">绑定微信</h4>
				 </div>
				 <div class="modal-body">
							<form id="wx_binding_form" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">
						         
									<div class="form-group">
										<label class="col-lg control-label" style="padding-top: 0px;    padding-left: 10px;" >打开微信扫描下方二维码绑定微信，获取意向客户实时推送</label>
										
									</div>
									<div class="form-group">
										<div style="text-align:center;" >
											<img style="width:200px;" id="qr_img" src="" />
										</div>
										
									</div>
								 	<input type="hidden" name="sale_id" id="sale_id" value="" />
							</form>
				  <br/>
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer">
				
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		
				</div>
			</div>
						 
			</div>
	</div>
	
	<div class="modal fade" id="get_sip_logininfo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog" style="width:300px;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						 <span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">网络电话账号信息</h4>
				</div>
				 <div class="modal-body">
					<div class="form-group">
						<label class="col-lg-3 control-label">主机：</label>
						<div class="col-lg-9 col-sm-9">
								<label class="col-lg-3 control-label" id="host_ip"></label>
						</div>
					</div>
					<br/>
					<div class="form-group">
						<label class="col-lg-3 control-label">账号ID：</label>
						<div class="col-lg-9 col-sm-9">
								<label class="col-lg-3 control-label" id="sip_id"></label>
						</div>
					</div>
					<br/>
					<div class="form-group">
						<label class="col-lg-3 control-label">密码：</label>
						<div class="col-lg-9 col-sm-9">
								<label class="col-lg-3 control-label" id="sip_pwd"></label>
						</div>
					</div>
				
				 </div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
			
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	
				</div>
			</div>
						 
		</div>
	</div>
	
<div class="modal fade" id="add_sales" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">添加销售人员</h4>
				 </div>
				 <div class="modal-body">
							<form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">
						         
									<div class="form-group">
										<label class="col-lg-3 control-label">用户名：</label>
										<div class="col-lg-9 col-sm-9">
												 <input type="text" name="username" style="width:auto;" placeholder="请输入用户名" class="form-control" id="username" value="" />
										</div>
									</div>
								 
									<div class="form-group">
										<label class="col-lg-3 control-label">真实姓名：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="text" style="width: auto;" placeholder="请输入真实姓名" class="form-control" name="realname" id="realname" value="" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">邮箱：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="text" style="width: auto;" placeholder="请输入邮箱" class="form-control" name="email" id="email" value="" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-3 control-label">性别：</label>
										<div class="col-lg-9 col-sm-9">
												 &nbsp;<input type="radio" id="sexman" name="sex" value="0" checked /> 男
												&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="sexwoman" name="sex" value="1" /> 女
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">开通人工坐席：</label>
										<div class="col-lg-9 col-sm-9">
												&nbsp;<input type="radio" id="openone" name="open_tsr" value="0" checked /> 未开通
												&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="opentwo" name="open_tsr" value="1" /> 开通
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">手机号：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="text" style="width: auto;" class="form-control" placeholder="请输入手机号" name="mobile" id="mobile" value="" />
										</div>
									</div>
							
									<div class="form-group" id="password_group">
										<label class="col-lg-3 control-label">密码：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="password"  style="width: auto;" placeholder="请输入密码" class="form-control" name="password" id="password" value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">备注：</label>
										<div class="col-lg-9 col-sm-9">
												<textarea class="form-control" placeholder="请输入备注" id="remark" name="remark"></textarea>
										</div>
									</div>
								 	<input type="hidden" name="id" id="id" value="" />
							</form>
				  <br/>
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer">
				
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" onclick="save();" class="btn btn-primary">保存</button>
				</div>
			</div>
						 
			</div>
		 
    <script type="text/javascript">
		
	     //保存页面
		 function addNew(uid){	
			 $('#password_group').show();
			$('#username').val("");
			$('#realname').val("");
			$('#email').val("");
			$('#mobile').val("");
			$('#password').val("");
			$('#remark').val("");
			$('#sexman').prop("checked",true)
			$('#openone').prop("checked",true)
							
			 $('#add_sales').modal('show');
		 }	
		 
		 
		 function save(){
		 	
		 	  var username = $("#username").val();
		 	  var realname = $("#realname").val();
		 	  var mobile = $("#mobile").val();
		 	  var password = $("#password").val();
			 

		 	  var mobileREa = /^1[3|4|5|6|7|8]\d{9}$/;
		 	  // var matrix = mobileREa.test(mobile);
		 	  
		 	 // var reg = /^((\+?86)|(\(\+86\)))?\d{3,4}-\d{7,8}(-\d{3,4})?$|^((\+?86)|(\(\+86\)))?1\d{10}$/;
		 	  if (!mobileREa.test(mobile)) { 
		 	  	 alert("手机号码格式不正确"); 
		 	     return false; 
		 	  } 

			if(username==''){
		 		  alert("用户名不能为空"); 
		 		  return false; 
		 	  }
			  
			 if(password==''){
		 		  alert("密码不能为空"); 
		 		  return false; 
		 	  }
			  
		 	  if(mobile==''){
		 		  alert("手机号码不能为空"); 
		 		  return false; 
		 	  }
		
			 $.ajax({
				 type: "POST",
				 dataType:'json',
				 url:  "<?php echo url('user/manager/saveSale'); ?>",
				 cache: false,
				 data: $("#form").serialize(),
				 success: function(res) {
					if (res.code == 0) {
						 location.href = "<?php echo url('User/manager/sales'); ?>";
					}else{
					 alert(res.msg);
						
					}
				 },
				 error: function(data) {
					 alert("提交失败");
				 }
			 }) 
		 		 
		   $('#add_sales').modal('hide');

		 }
		 

		function getSale(id){
			$.ajax({
				 type: "POST",
				 dataType:'json',
				 url:  "<?php echo url('user/manager/getSale'); ?>",
				 cache: false,
				 data: {id:id},
				 success: function(res) {
					if (res.code == 0){
						$('#password_group').hide();
						$('#username').val(res.data.username);
						$('#realname').val(res.data.realname);
						$('#email').val(res.data.email);
						$('#mobile').val(res.data.mobile);
						$('#password').val('nothink');
						$('#remark').val(res.data.remark);
						$('#id').val(id);
						if(res.data.sex == 0){
							$('#sexman').prop("checked",true)
						}else{
							$('#sexwoman').prop("checked",true)
						}
						
						if(res.data.open_tsr == 0){
							$('#openone').prop("checked",true)
						}else{
							$('#opentwo').prop("checked",true)
						}
						$('#add_sales').modal('show');
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
