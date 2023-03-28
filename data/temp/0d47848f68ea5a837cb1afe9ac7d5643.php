<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"/www/wwwroot/web/application/user/view/manager/addadmin.html";i:1551953752;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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

<script type="text/javascript" src="__PUBLIC__/plugs/webuploader/webuploader.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugs/webuploader/webuploader.custom.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugs/webuploader/webuploader.css">

<style type="text/css">
.textwidth{
	width:250px;
}
.nav-tabs {
	background: #ffffff;
}
.nav-tabs {
	border-bottom: 1px solid #ddd;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
	color: #555;
	cursor: default;
	background-color: #fff;
	border: 1px solid #ddd;
	border-bottom-color: transparent;
}
.panel-default>.panel-heading {
	background-color: #FFFFFF;
	border-color: #FFFFFF;
	color: #FFFFFF;
	border-radius: 0;
	background-clip: padding-box;
}
.field-status{
    float: left;
}

</style>
     
<div class="row">
<div class="col-lg-12">
	
  
<div class="panel panel-default">
    <div class="panel-heading">
         <header class="main-box-header clearfix">
		   <div class="pull-left">
			  <h1><span>修改资料</h1>
		   </div>
		 </header>
         </div>
	  <div class="panel-body">
		 
			
			<!-- Tab panes -->
	<!--  <form id="form" method="post" onsubmit="return checkform();" class="form-horizontal"  action="" enctype="multipart/form-data" method="post">	
	    -->  
	  <form id="form" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
	      
	    <div class="tab-content">

		     <div class="main-box-body clearfix">
	
			    <div class="form-group" style="margin-top:10px;">
						<label class="col-lg-2 control-label">用户名：</label>
						<div class="col-lg-10 col-sm-10">
							
							 <?php switch($current): case "添加": ?>
				                 
							 		<input type="text" class="form-control textwidth" onkeyup="checkname(this);"  placeholder="请输入用户名" name="userName" id="userName" value="<?php echo (isset($list['username']) && ($list['username'] !== '')?$list['username']:''); ?>" />
						    
						       <?php break; default: ?>
							 		<input type="text" class="form-control textwidth" disabled="disabled" name="userName" id="userName" value="<?php echo (isset($list['username']) && ($list['username'] !== '')?$list['username']:''); ?>" />
						    <?php endswitch; ?>
			    
						</div>
			    </div>
					
					<div class="form-group">
					  <label class="col-lg-2 control-label">头像：</label>
						<div class="col-lg-10 col-sm-10">
							<?php echo widget('common/Form/show',array(array('type'=>'picture','name'=>'headpic'),$picdata)); ?>			
						</div>
					</div>
			    
			     <?php switch($current): case "添加": ?>
	                  <div class="form-group" style="margin-top:10px;">
	                    <label class="col-lg-2 control-label">登陆密码：</label>
						<div class="col-lg-10 col-sm-10">
						   <input type="password" class="form-control textwidth" placeholder="请输入密码...." name="password" id="password" value="<?php echo (isset($rolelist['name']) && ($rolelist['name'] !== '')?$rolelist['name']:''); ?>" />
						</div>
				     </div>         
			       <?php break; default: endswitch; ?>
			    
	
			    <div class="form-group" style="margin-top:10px;">
						<label class="col-lg-2 control-label">联系手机：</label>
						<div class="col-lg-10 col-sm-10">
							 <input type="text" class="form-control textwidth" placeholder="请输入联系手机...." name="mobile" id="mobile" value="<?php echo (isset($list['mobile']) && ($list['mobile'] !== '')?$list['mobile']:''); ?>" />
						</div>
			    </div>
			    
			    <div class="form-group" style="margin-top:10px;">
						<label class="col-lg-2 control-label">会员有效期：</label>
						<div class="col-lg-10 col-sm-10">
							
							<?php if($current == '编辑'): ?>
							   <span style="line-height: 35px;"><?php echo (isset($list['expirydate']) && ($list['expirydate'] !== '')?$list['expirydate']:''); ?></span>
							<?php else: ?>
							    <input type="text" class="form-control textwidth" id="expiry_date" name="expiry_date" value="<?php echo (isset($list['expirydate']) && ($list['expirydate'] !== '')?$list['expirydate']:''); ?>" readonly="">
									<script>
									$('#expiry_date').fdatepicker({
										format: 'yyyy-mm-dd',
										pickTime: true
									});
									</script>	
							<?php endif; ?>

							
						</div>
			    </div>
			    
			    <div class="form-group" style="margin-top:10px;">
						<label class="col-lg-2 control-label">联系邮箱：</label>
						<div class="col-lg-10 col-sm-10">
							 <input type="text" class="form-control textwidth" placeholder="请输入邮箱...." name="email" id="email" value="<?php echo (isset($list['email']) && ($list['email'] !== '')?$list['email']:''); ?>" />
						</div>
			    </div>
			  

			    <div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">	
								<input type="hidden" name="adminId" id="adminId" value="<?php echo (isset($list['id']) && ($list['id'] !== '')?$list['id']:''); ?>" />			  
							<span class="btn btn-success submit-btn" onclick="checkform();" type="submit">确 定</span>
							<button class="btn btn-danger btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
						</div>
				 </div>       
				   
			</div>
	
		</div>
		
		 </form>
		
		
	  </div>
</div>	
					




<script type="text/javascript">

//检查表单的必填项
function checkform(){

	  var userName = $("#userName").val();
	  if(!userName){
		  alert("管理员名称不能为空"); 
		  return false; 
	  }
	
	  <?php switch($current): case "添加": ?>
		      var password = $("#password").val();
			  if(!password){
				  alert("密码不能为空"); 
				  return false; 
			  }
			  
			  if(password.length<6|| password.length>12){
				  alert("密码必须大于6位小于12位。");
				  return false; 
			  }
		   
	      <?php break; default: endswitch; ?>
   
	  var mobile = $("#mobile").val();
	  if(!mobile){
		  alert("手机号码不能为空"); 
		  return false; 
	  }
	  
	  var mobileREa = /^1[3|4|5|7|8]\d{9}$/;
	  var matrix = mobileREa.test(mobile);
	  if(!matrix){
		    alert("手机号码不符合规则！");
			return false;
	  } 
	 
	   var expiry_date = $("#expiry_date").val();
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
	 
	
	  
		
		 var href = window.location.href;
		 
		 $.ajax({
		     type: "POST",
		     dataType:'json',
		     url: href,
		     cache: false,
		     data: $("#form").serialize(),
		     success: function(data) {
		    	if (data.code) {
		    		 alert(data.msg);
		    		 location.reload();
		    	}else{
		    		 alert(data.msg + ' 页面即将自动跳转~');
		    		 location.href = "<?php echo url('user/index/index'); ?>";
		    	}
			
		     },
		     error: function(data) {
		    	 alert("提交失败");
		     }
		 }) 

}

function checkname(obj){
	
	var name = $(obj).val();
	
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
