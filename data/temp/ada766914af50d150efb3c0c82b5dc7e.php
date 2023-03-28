<?php if (!defined('THINK_PATH')) exit(); /*a:11:{s:59:"/www/wwwroot/web/application/user/view/scenarios/scene.html";i:1551974752;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;s:68:"/www/wwwroot/web/application/user/view/scenarios/ThinkTankSound.html";i:1551953760;s:63:"/www/wwwroot/web/application/user/view/scenarios/ThinkTank.html";i:1551953760;s:65:"/www/wwwroot/web/application/user/view/scenarios/speechcraft.html";i:1551953762;s:65:"/www/wwwroot/web/application/user/view/scenarios/myLargepage.html";i:1551953760;s:61:"/www/wwwroot/web/application/user/view/member/calldetail.html";i:1551953772;s:61:"/www/wwwroot/web/application/user/view/scenarios/newRule.html";i:1551953760;s:60:"/www/wwwroot/web/application/user/view/scenarios/dfleve.html";i:1551953762;s:62:"/www/wwwroot/web/application/user/view/scenarios/flownode.html";i:1551953762;s:62:"/www/wwwroot/web/application/user/view/scenarios/Replicas.html";i:1551953760;}*/ ?>
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
.main-box .main-box-body {
    padding: 0 20px 0px 0px;
}
.robot-limit {
    text-align: left;
    font-size: 12px;
    color: #999;
    margin-top: 10px;
}
.robot-item.active {
    background-color: #fff;
    border-color: #1f8cec;
}
.robot-item .control-icon {
    position: absolute;
    display: none;
    top: 5px;
    right: 5px;
    border-radius: 3px;
    width: auto;
    z-index: 100;
    background-color: #dfeaf9;
}
.robot-item .control-icon .anticon:hover {
    color: #1f8cec;
}
.robot-item .control-icon .anticon {
    cursor: pointer;
    margin: 5px;
    font-size: 14px;
	color:#c1c1c1;
}
.robot-item>.item-name {
    font-size: 14px;
    display: inline-block;
    margin-bottom: 10px;
    word-break: break-all;
    color: rgba(0,0,0,.75);
    word-wrap: break-word;
    font-weight: 500;
}
<!-- .btn-default, .wizard-cancel, .wizard-back { -->
    <!-- background-color: #ffffff; -->
    <!-- border-color: #03a9f4; -->
    <!-- color: #03a9f4; -->
    <!-- border-bottom: 0px solid; -->
    <!-- border: 1px solid; -->
<!-- } -->
.robot-item .word {
    font-size: 12px;
}
 .robot-item:hover .control-icon {
    display: inline-block;
}
 .robot-item {
    cursor: pointer;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    position: relative;
    padding: 10px;
    border-radius: 3px;
    background: #f8f9fb;
    border: 1px solid #f8f9fb;
    text-align: left;
	  margin-bottom: 8px;
}

.robot-list{
 	margin-top: 10px;
 	overflow-y: auto;
	/* min-height: 918px; */
	height: calc(100vh - 170px);
}
.spin-container {
    position: relative;
    height: 100%;
		margin-top: 5px;
		margin-bottom: 1px;
}
.main-box{
	   background: #e7ebee;
		 margin-bottom: 0px;
}
.main-box-header{
	background-color: #ffffff;
}
.main-box-body{
	  background-color: #ffffff;
   
}
.container-fluid{
	padding-left: 0px;
	padding-right: 0px;
	background-color: #f3f3f3;
}
.right-robot-list{
	    padding-right: 0px;
			background-color: #ffffff;
			width: 82.66666667%;
      float: right;
}
.nav-tabs {
    border-bottom: 1px solid #ddd;
	  background: #ffffff;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #03a9f4;
    cursor: default;
    background-color: #fff;
    border-bottom: 2px solid #03a9f4;
    border-bottom-color: #03a9f4;
		border-top: 0px solid #03a9f4;
}
.left-robot-list {
    background-color: #ffffff;
	width: 16.666667%;
	
}
.btntop{
	    margin-top: 5px;
}
.ltbtn{
    margin-right: 5px;
    width: 45%;
    text-align: center;
    padding: 6px 6px;
}
.intnet-tag-tips {
    margin-bottom: 10px;
}
.user-level {
    font-size: 14px;
    margin-top: 20px;
    color: rgba(0,0,1,.75);
    margin-bottom: 10px;
}
.user-level .user-level-eidt {
    color: #108ee9;
    margin-left: 20px;
    cursor: pointer;
}
.text-left{
	  line-height: 34px;
}
.table > thead>tr>th {
    font-size: 14px;
    font-weight: 400;
    background-color: rgba(223,234,249,.4);
}

.btn-primary.focus, .btn-primary:focus {
    color: #fff;
    background-color: #03a9f4;
     border-color: #03a9f4;
}

.btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open>.dropdown-toggle.btn-default.focus, .open>.dropdown-toggle.btn-default:focus, .open>.dropdown-toggle.btn-default:hover {
    color: #03a9f4;
    background-color: initial;
    border-color: #03a9f4;
}
.btn-default.focus, .btn-default:focus {
    color: #03a9f4;
   background-color: initial;
    border-color: #03a9f4;
}
.btn-default:hover {
    color: #03a9f4;
    background-color: initial;
    border-color: #03a9f4;
}

.btn-primary.active, .btn-primary:active, .open>.dropdown-toggle.btn-primary {
    color: #fff;
    background-color: #03a9f4;
    border-color: #03a9f4;
}
.btn-primary:hover {
    color: #fff;
    background-color: #03a9f4;
    border-color: #03a9f4;
}
.form-group {
	margin-bottom: 6px;
}

._jsPlumb_endpoint{


}
</style>

<style type="text/css">
	
.create-modal-body {
    overflow-y: auto;
    padding: 15px 30px;
}	

.add-modal-wrap {
    padding: 0 14px;
}
.add-modal-tips {
    display: -ms-flexbox;
    display: flex;
    font-size: 14px;
    -ms-flex-pack: justify;
    justify-content: space-between;
    margin-bottom: 6px;
    -ms-flex-align: center;
    align-items: center;
}
.modal-rules-wrap {
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(0,0,0,.09);
}
.modal-result {
    font-size: 14px;
    margin-top: 17px;
}
.modal-result p {
    color: rgba(0,0,1,.75);
}
.rule-item{
	margin-top: 5px;
}

.rule-item .rule-item-delete {
    color: #1f8cec;
    vertical-align: middle;
    cursor: pointer;
}
.rule-item .itmr{
	margin-right: 7px;
} 
#conditionlist > .rule-item > .mainwidth{
	min-width:150px;
}
#conditionlist > .rule-item > .secwidth{
	width:80px;
}
#conditionlist > .rule-item > .itnuwidth{
	width:68px;
}
#newRule > .modal-dialog{
    max-height: calc(100% - 100px);
}
.dropup > .btn-default:hover, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
    background-color: #fff;
    border: 1px solid #ccc;
}
.dropdown-menu>li>a {
    color: #191717;
    font-size: 1em;
    line-height: 1.7;
    padding-left: 35px;
    transition: border-color 0.1s ease-in-out 0s,background-color 0.1s ease-in-out 0s;
    padding-top: 5px;
}
#conditionlist > .rule-item > #disabled2select >  .itnuwidth{
	width:173px;
}
.left-process-list {
    background-color: #ffffff;
   
    overflow-y: auto;
	float: left;
	padding-left: 5px;
	/* 	height: calc(100vh); */
    height: calc(100vh - 195px);
    border-right: 1px solid #ccc;
    width:100%;
}
.right-process-list {
    padding-right: 0px;
    background-color: #ffffff;
    float: right;
    width:100%;
    position: relative;
    overflow: scroll;
    height: calc(100vh - 199px);
}
.talk-list-item {
    margin: 10px 10px 10px 0;
    cursor: pointer;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    position: relative;
    padding: 30px 10px;
    border-radius: 3px;
    background: #f8f9fb;
    border: 1px solid #f8f9fb;
}
.talk-list-item .control-icon {
    position: absolute;
    display: none;
    top: 5px;
    right: 5px;
    border-radius: 3px;
    width: auto;
    z-index: 100;
    background-color: #dfeaf9;
}
.talk-list-item:hover .control-icon {
    display: inline-block;
}
.talk-list-item.active {
    background-color: #fff;
    border-color: #1f8cec;
}
.talk-list-item .control-icon .anticon {
    cursor: pointer;
    margin: 5px;
    font-size: 14px;
    color: #c1c1c1;
}

.ttfw{
	width: 250px;
}
.answer-input-item{
	margin-top: 10px;
}
.ktextarea{
	  width: 245px;
    float: left;
    margin-right: 5px;
		resize: vertical;
}
.icon-plus .icon-delete{
    cursor: pointer;
		color: rgba(0,0,0,.65);
}
.icon-plus .icon-delete:hover {
    color: #f04134;
}
#contentlist{
	  overflow-y: auto;
    max-height: 222px;
}
#content-wrapper {
    padding: 15px 15px 19px 15px;
		min-height: 100px;
}
</style>

 
 <link href="__PUBLIC__/plugs/graph/font-awesome.min.css" rel="stylesheet">
 <link href="__PUBLIC__/plugs/graph/jquery-ui.min.css" rel="stylesheet">
 
 <script src="__PUBLIC__/plugs/graph/uuid.min.js"></script>
 <script src="__PUBLIC__/plugs/graph/mustache.min.js"></script>
 <script src="__PUBLIC__/plugs/graph/jquery.min.js"></script>
 <script src="__PUBLIC__/plugs/graph/jquery-ui.min.js"></script>
 <script src="__PUBLIC__/plugs/graph/jquery.jsPlumb.min.js"></script> 
 <script src="__PUBLIC__/plugs/graph/graphlib.min.js"></script>
  
 <script src="__PUBLIC__/plugs/graph/data.js?v=2006"></script>

 <script src="__PUBLIC__/plugs/graph/config.js"></script>

 <script src="__PUBLIC__/plugs/graph/index.js?v=11"></script> 
 <link href="__PUBLIC__/plugs/bootstrap-switch/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
<script src="__PUBLIC__/plugs/bootstrap-switch/js/bootstrap-switch.min.js"></script>
 
 
<div class="row">
<div class="col-lg-12">
	
	<div class="main-box clearfix">	
	
		<div class="main-box-body clearfix">
			<div class="container-fluid">
					
				<div class="left-robot-list col-xs-3 col-md-2">
					<div class="btntop">
						<button type="button" onclick="newScenariosModal(0);" class="btn btn-primary ltbtn">新建话术</button>
						<button type="button" class="btn btn-default ltbtn" onclick="copyshow();" style="margin-right: 0px;">复制话术</button>
					</div>
					<div class="robot-limit">
						 <span><?php echo (isset($num) && ($num !== '')?$num:"0"); ?>/100</span> 
						 <span class="glyphicon glyphicon-question-sign" aria-hidden="true" 
						 data-toggle="tooltip" data-placement="top" title="数值为‘已有话术/可添加话术总数’，若需扩容，请联系你的服务商。"></span>
					</div>
					
						<div class="robot-list">
						
						<?php if(is_array($scenarioslist) || $scenarioslist instanceof \think\Collection || $scenarioslist instanceof \think\Paginator): $k = 0; $__LIST__ = $scenarioslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
	
							<div class="robot-item" id="taskItem<?php echo $vo['id']; ?>" title="<?php echo $vo['name']; ?>" onclick="getscenarios(this,<?php echo $vo['id']; ?>);">
								<input id="list<?php echo $k; ?>" type="hidden" class="Idlist" value="<?php echo $vo['id']; ?>" />
								<div class="control-icon">
									<span class="anticon glyphicon glyphicon-edit" onclick="newScenariosModal(<?php echo $vo['id']; ?>);" aria-hidden="true"></span>
									<span class="anticon glyphicon glyphicon-trash" onclick="delScenarios('<?php echo $vo['id']; ?>');" aria-hidden="true"></span>
								</div>
								<span class="item-name">
									<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
									<?php echo $vo['name']; ?>
								</span>
								<div class="word">
									<p>行业：<?php switch($vo['type']): case "0": ?>请选择行业<?php break; case "1": ?>金融<?php break; case "2": ?>贷款<?php break; case "3": ?>房产<?php break; case "4": ?>装修<?php break; case "5": ?>汽车<?php break; case "6": ?>教育<?php break; default: ?>其他
											<?php endswitch; ?></p>
								
								  <div>自动打断：
										<?php switch($vo['break']): case "1": ?>否<?php break; default: ?>是
										<?php endswitch; ?>
								  </div> 
									
									<?php if($examine == '1'): ?>
								 	<div>审核结果：	
										<?php if($super == 1): switch($vo['auditing']): case "2": ?>
												 <a href="javascript:void(0);" onclick="showExamine(<?php echo $vo['id']; ?>);">审核</a>
												<?php break; default: ?>
												 无
											<?php endswitch; else: switch($vo['auditing']): case "1": ?>
													<a href="javascript:void(0);"  onclick="submitAuditing(<?php echo $vo['id']; ?>);">提交审核</a>
												<?php break; case "2": if($userType == 4): ?> 
														<a href="javascript:void(0);" onclick="showExamine(<?php echo $vo['id']; ?>);">审核</a>
													<?php else: ?>
														审核中
													<?php endif; break; case "3": ?>
													不通过
												<?php break; default: ?>
												审核通过
											<?php endswitch; endif; ?>
									</div>
									<?php endif; ?>
									
									<div>更新时间：<?php echo $vo['update_time']; ?></div> 
								</div>
							</div>
							
						<?php endforeach; endif; else: echo "" ;endif; ?>

					</div>
					
				</div>
				
				<div class="right-robot-list col-xs-15 col-md-10" id="fullScreen">
					
					<!-- 当前话术的ID -->
					<input type="hidden" name="nowsceneID" id="nowsceneID" value="" />
					
					<!-- 当前流程的ID -->
					<input type="hidden" name="nowProcessId" id="nowProcessId" value="" />
					
					<!-- 当前流程的ID -->
					<input type="hidden" name="isHaveChange" id="isHaveChange" value="0" />
					
					<!-- style="overflow-x: scroll;" -->

					<div class="spin-container" id="spinContainer">
						
						 <!-- Nav tabs-->
						 <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-bottom: 10px;">
							 
						 	<li role="presentation" class="active">
								<a href="#process" aria-controls="process" role="tab" data-toggle="tab">流程</a>
							</li>
						 	<li role="presentation">
								<a href="#knowledgeBase" aria-controls="knowledgeBase" role="tab" data-toggle="tab">知识库</a>
							</li>
							
							<li role="presentation">
								<a href="#intentionLabel" aria-controls="intentionLabel" role="tab" data-toggle="tab">意向标签</a>
							</li>
							<li role="presentation">
								<a href="#problemLearning" aria-controls="problemLearning" role="tab" data-toggle="tab">问题学习</a>
							</li>
							
						
						
						    <button class="btn btn-primary pull-right rightipex" type="button" onclick="outexcel();">
									<span>备 份</span>
								</button>
								
						    <button class="btn btn-primary pull-right rightipex" type="button" onclick="loadexcel();">导 入</button>
							
						      
						 </ul>
						 
						 
						 <style type="text/css">
							.rightipex{
									margin-right:50px;
								margin-top: 5px;
							} 
							 
							 .min-height{
							  /* 	min-height: 800px; */
							 	height: calc(100vh - 216px); 
							 }
							 .btn{
							 	z-index: 2;
							 }
							 .pa{
							 	position: absolute;
							 }
							 .fixed-node{
							 	position: absolute;
							 	top: 80px;
							 	left: 150px;
							 }
							 
							 #end-node{
							 	left: 150px;
							 	top: 700px;
							 }
							 .panel-node{
							 	width: 236px;
							 	/*width: auto;*/
							 	display: inline-block;
							 	margin: auto 25px;
							 }
							 .panel-node-list{
							 	padding: 10px 10px;
							 }
							 .delete-node{
							 	cursor: pointer;
							 	width: 20px;
							 	display: inline-block;
							 	text-align: center;
							 }
							 .delete-node:hover{
							 	color: red
							 }
							 
							 .row > ._jsPlumb_connector {
									overflow: hidden;
									width:auto!important
							 }
							 
							 .bg-info {
							 		background-color: #ffffff;
							 		padding-left: 10px;
							 	}
							 .btn-controler{
							 	margin-top: 5px;
							 }
				
							 .actionli {
							 		float: left;
							 		margin-right: 4px;
							 		padding: 5px;
							 		background-color: #bce8f1;
							 		margin-bottom: 5px;
							 }
			
							 #rowcontent::-webkit-scrollbar {
										display: none;
							 } 

						 </style>
						 
						 
						 <!-- Tab panes -->
						 <div class="tab-content">
							 
						 	<div role="tabpanel" class="tab-pane active" id="process">
						 		
		                         <!-- style="padding-left: 8px;width:100%;overflow:  scroll;" -->

								 <div class="row" style="position: relative;">
									  
									    <div style="width: 15.666667%; float: left;">
									    	
											<div class="btntop">
												<button type="button" class="btn btn-primary" style="width: 94%;margin: 0 auto;" onclick="newflowModal(0);">
													<i class="fa fa-plus-circle fa-lg" style="margin-right: 10px;"></i>添加
												</button>
											</div> 
											
											<div class="left-process-list" style="">
										 
												<div class="flowlist">
												
												</div>
												<div style="text-align: center;background-color: #03a9f4;color: white;padding: 10px 0px;">公共节点</div>
									     		<div class="onelist" style="height:44%;">
												 
												</div> 
													
											</div>
												
									    	
									    </div>
								 
									    
										<!-- 右边的图 btn btn-primary -->
										
										<div style=" width: 83.66666667%; float: left;">
											
											<!-- overflow: scroll; min-height: 500px;  -->
											<div id="side-buttons" class="bg-info" style="min-height: 45px;">
												<div>
													<a class="btn btn-primary btn-controler" href="#" data-template="tpl-Menu" role="button">
															<i class="fa fa-list-alt" aria-hidden="true"></i>
														流程节点</a>
													<a class="btn btn-primary btn-controler" href="#" data-template="tpl-WorkTime" role="button">
															<i class="fa fa-share" aria-hidden="true"></i>
														跳转节点</a>
											
													<a class="btn btn-primary btn-controler" onclick="saveAllData();" href="#" style="margin-right: 40px;">
															<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
														保存</a>
			
												
															<a class="btn btn-primary" href="#" onclick="fullScreen(this);" style="margin-top: 5px;margin-right: 30px;">	
															<span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span>
															<span>全屏</span></a>
													
													
											
										
												</div>
											</div>
										
											<div class="right-process-list" id="rowcontent" style="">
												
									
												<div id="app">
													
													<div class="container-fluid row" style="position: relative;">
														
													
															<div class="bg-success min-height" id="drop-bg" style="width:auto;height:700px;">
										
															</div>
														
														
														
													</div>
													
												</div>
											 
												
											</div>

											
										</div>
										
										<div style="clear: both;"></div>
									
									
								 </div>
							
							</div>
							
							<div role="tabpanel" class="tab-pane" id="knowledgeBase">
								  	
							  	<section class="navbar navbar-default main-box-header clearfix">
									
									<div class="row">
										
										   <!--<div class="col-sm-1"></div>
													
											<div class="col-sm-8"></div>
														
											<div class="col-sm-6"></div>
											
												
											<div class="col-sm-2"></div>
											<div class="col-sm-4"></div>-->
											
											<div  class="switch pull-right" data-on="success" data-off="info">
												<label for="name" class="formItemLabel">未录音</label>
												<input type="checkbox" id='notRecorded' name="notRecorded" data-on-text="开启" data-on-color="success" data-off-text="关闭" />
											</div>	
											
											
											<button type="button" style="margin-right: 13px;" onclick="showThink(0);" class="btn btn-primary pull-right">添 加</button>
									
										
											
											<div class="input-group pull-right" style="width: 300px; margin-right: 13px;">
												
										      <div class="input-group-btn">
										        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										        	<span id="checklis">关键字</span> 
										            <span class="caret"></span>
										        </button>
										        <ul class="dropdown-menu">
										          <li><a href="#" onclick="getkword(this);">关键字</a></li>
										          <li><a href="#" onclick="getkword(this);">文字话术</a></li>													          
										        </ul>
										      </div>
										      
										      <input type="text" class="form-control" id="chelword" placeholder="请输入关键字" aria-label="..." />
										      
										      <span class="input-group-btn">
												<button class="btn btn-primary" type="button" onclick="getkeyword();">
													<span class="glyphicon glyphicon-search" aria-hidden="true"></span>搜索
												</button>
											  </span>
											  
										    </div>
										   
										   
										   
									</div>
									 
							  	</section>
							  	
							  	<table class="table table-bordered table-hover">
						  			<thead>
					  					<tr>
					  						<th class="text-center" style="width: 80px;">标题</th>
					  						<th class="text-center" style="width: 45px;">排序</th>
											<th class="text-center">话术</th>							  						
					  						<th class="text-center" style="width: 60px;">话术数</th>
					  						<th class="text-center">关键词</th>							  						
					  						<th class="text-center" style="width: 73px;">关键词数</th>
					  						
					  						<th class="text-center" style="width: 139px;">更新时间</th>
					  						<th class="text-center" style="width: 105px;">操作</th> 
					  					</tr>
						  			</thead>
						  			<tbody id="knowledgelist">
						  			
						  			</tbody>
							  	</table>
							  		
							  	<div id="knowledgepage"></div>
							  	
							</div>	
							
						
							<div role="tabpanel" class="tab-pane" id="intentionLabel">
								
								<div class="row intnet-tag-tips">
									<div class="col-sm-5 text-left">
										<!-- <span>可拖动调整判断顺序</span> -->
									</div>
									<div class="col-sm-7">
									   <div style="float:right">
												<button type="button" onclick="recovery();" class="btn btn-primary">
													恢复默认配置
												</button>
												<button type="button" onclick="createNew();" class="btn btn-primary" style="margin-left: 10px;">
													添加规则
												</button>
									   </div>
									</div>
								</div>
		
									
								<table class="table table-bordered table-hover">
										<thead>
												<tr>
													<th class="text-center">判断顺序</th>
													<th class="text-center">规则名称</th>
												
													<th class="text-center">客户意向标签</th>
													
													<th class="text-center">操作</th> 
												</tr>
										</thead>
										<tbody id="intentionlist">
										
										</tbody>
								</table>
						
								<div id="intentionpage"></div>
									<div class="user-level">
										<p>
											<span>以上规则均不满足时，将客户意向标签设置为<span id="defaultlevel">C级(明确拒绝)</span></span>
											<input type="hidden" id="dflevelNum" value="" />
											<span class="user-level-eidt" id="defaulttype" onclick="showdefault(this);">编辑</span>
										</p>
									</div>
									
									
							</div>	
									
							<div role="tabpanel" class="tab-pane" id="problemLearning">
								
								<section class="navbar navbar-default main-box-header clearfix">
									<div class="pull-left">
									
										<div class="btn-group" role="group" aria-label="...">
											<button type="button" data-type=""  id="learnType" onclick="getLearning('');" class="btn btn-default">全部</button>
											<button type="button" data-type="0" id='learnType0' onclick="getLearning(0);" class="btn btn-default">待学习</button>
											<button type="button" data-type="1" id='learnType1' onclick="getLearning(1);" class="btn btn-default">已学习</button>
											<button type="button" data-type="2" id='learnType2' onclick="getLearning(2);" class="btn btn-default">忽略</button>
										</div>
										
									</div>  
									
									<div  class="switch pull-right" data-on="success" data-off="info">
											<label for="name" class="formItemLabel">按出现次数排序</label>
											<input type="checkbox" id='times-sort-switch' name="times_sort" data-on-text="开启" data-on-color="success" data-off-text="关闭" />
									</div>
								</section>
								
								<table class="table table-bordered table-hover">
										<thead>
												<tr>
													<th class="text-center">待学习的内容</th>
													<th class="text-center">出现次数</th>
													<th class="text-center">来源</th>
													<th class="text-center">学习状态</th>
													<th class="text-center" style="width: 139px;">记录时间</th>
													<th class="text-center">操作</th> 
												</tr>
										</thead>
										<tbody id="tablelearninglist">
										
										</tbody>
								</table>
							
								<div class="row">
									<div class="col-sm-4"></div>
									<div class="col-sm-8"></div>
								</div>
										
								<div id="modalbody"></div>
								
									
								</div>
								
								
							</div>
									
							 
						</div>
						
						
					</div>
					
				</div>
		</div>
					
	</div>					
    
</div>


	
 <script type="text/javascript">
 	
 		 //知识库的搜索
	function getkword(obj){
		 
		var textkw = $(obj).text();
		$("#checklis").text(textkw);
		
		if(textkw == '关键字'){
			$("#chelword").attr("placeholder","请输入关键字");
		}else{
			$("#chelword").attr("placeholder","请输入文字话术");
		}
    
	}
 	

	//导出记录
	function outexcel(){
	
		var nowsceneID = $("#nowsceneID").val();	
        window.location.href = "<?php echo url('exportexcel'); ?>/sceneId/"+nowsceneID;
	
	}
	 
		//地图拖动
		var dragpic=-1;
		var dragpicy=-1;
		$("#drop-bg").bind({
				mouseout:function(e){
					  e.preventDefault();

						dragpic=-1;
				},
				mousemove:function(e){
					e.preventDefault();

						if(dragpic>=0){
								//e=event?event:window.event;  var wrapdiv = document.getElementById("rowcontent");
								dqsb = e.pageX || (e.clientX );
								dqsby = e.pageY || (e.clientY );
								$("#rowcontent").scrollLeft($("#rowcontent").scrollLeft()+(dragpic-dqsb));
								$("#rowcontent").scrollTop($("#rowcontent").scrollTop()+(dragpicy-dqsby));
								dragpic = dqsb;
								dragpicy = dqsby;
						}
				},
				mousedown:function(e){
				  // console.log(e);
          // console.log(e.target.id);
					 var targetId = e.target.id;
					  if(targetId != "drop-bg"){
							return false;
						}

						dragpic = e.pageX || (e.clientX);
						dragpicy = e.pageY || (e.clientY);
						if (e.stopPropagation){ 
								// this code is for Mozilla and Opera 
								e.stopPropagation(); 
								e.preventDefault();
						}
				},
				mouseup:function(){
						dragpic=-1;
				}
		});
 
	 function fullScreen(obj){
		 
		 var pst = $("#fullScreen").css("position");
		
		 if(pst == "relative"){
			 
			 $("#fullScreen").css({
				 width: "100%",
				 height: "100%",
				 position: "fixed",
				 top: "0", 
				 right: "0",
				 bottom: "0",
				 left:"0",
				 'z-index':"999",
				 });
				 
        $("#rowcontent").css({position: 'relative',overflow: 'scroll',height:' calc(100vh - 75px)'});
				$(".left-process-list").css({'border-right':' 1px solid #ccc',height:' calc(100vh - 80px)'});

        $(obj).find("span").remove();
			  $(obj).append('<span class="glyphicon glyphicon-resize-small" aria-hidden="true"></span><span>退出全屏</span>');
 
		 }else{
			  $("#fullScreen").attr("style",'position: "relative"');
				$("#myTab").attr("style",'margin-bottom: "10px";width:"auto",margin-left: "0px;"');
				$(obj).find("span").remove();
				$(obj).append('<span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span><span>全屏</span>');
				
				$("#rowcontent").css({position: 'relative',overflow: 'scroll',height:' calc(100vh - 154px)'});
				$(".left-process-list").css({'border-right':' 1px solid #ccc',height:' calc(100vh - 172px)'});
				
				var wrapdiv = document.getElementById("spinContainer");
				wrapdiv.scrollLeft = 0;
			
		 }
		
	 }
	 
	 var NodeList = []; //当前展示的列表

	 function dataStructure(data){
		 var leng = data.length;
		 if(leng){

			 for (var i=0;i<leng;i++) {
			 	 var temp = {};
				 temp.key = "node-"+data[i]["id"]; 
			 	 temp.id = data[i]["id"]; 
			 	 temp.type = data[i]["type"]; 
			 	 temp.name = data[i]["name"]; 
			 	 temp.content = data[i]["content"]; 
				 temp.isDelete = 0; 
				 temp.pid = data[i]["pid"]; 
				 if(data[i]["pid"] > 0){
					 temp.pNode = "node-"+data[i]["pid"]; 
				 }else{
					 temp.pNode = null; 
				 }
			 	
				 if(data[i]["top"]){
					temp.top = data[i]["top"];
				 }else{
					 temp.top = 0;
				 }
				 if(data[i]["left"]){
				 temp.left = data[i]["left"];
				 }else{
				 	temp.left = 0;
				 }
				 
				 
				 if(data[i]["type"] == "Menu"){
					 
					 var sondata = data[i]["data"].choices;
					 var long = sondata.length;
					 var thumb = [];
					 for (var j=0;j<long;j++) {
							var son = {};
							son.key = "key-"+ data[i]["id"] + "-" +sondata[j]["id"]; 
							son.id = sondata[j]["id"]; 
							son.name = sondata[j]["name"]; 
							son.Node = "node-"+data[i]["id"];
							son.NodeId = data[i]["id"];
							son.nextNode = sondata[j]["nextNode"]; 
							son.nextNodeId = sondata[j]["next_flow_id"]; 
							son.type = sondata[j]["type"];
							
							thumb.push(son);

						//	thumb["key-"+ data[i]["id"] + "-" +sondata[j]["id"]] = son;
					 }
					 
					 temp.thumb = thumb; 

					 //NodeList["node"+data[i]["id"]] = temp;

				 }
				 
				// NodeList["node"+data[i]["id"]] = temp;
				 
          NodeList.push(temp);
			 }
			
			// console.log(NodeList);

		 }else{
			 console.log("没有数据");
		 }
		
	 }
 
   //保存全部数据
	 function saveAllData(){
		 
		var sceneId = $("#nowsceneID").val();
		var nowProcessId = $("#nowProcessId").val();
		
		var flag = 0;//检测有几个根节点.

		var lasting = NodeList.length;
		
		if(lasting > 1){
			
			for (var i=0;i<lasting;i++) {
				
				//判断，跳转节点必须有父节点
				if(NodeList[i].type == 'WorkTime' && NodeList[i].pNode == null && NodeList[i].id > 0 && NodeList[i].isDelete == 0){
					alert("跳转节点没有连接。");
					return false;
				}
				
				if((NodeList[i].type == 'Menu') && NodeList[i].thumb.length == 0 && NodeList[i].id > 0 && NodeList[i].isDelete == 0){
					alert("流程节点必须有子节点。");
					return false;
				}
				
				if((NodeList[i].type == 'Menu') && NodeList[i].pid == 0  && NodeList[i].id > 0 && NodeList[i].isDelete == 0){
					
					flag = flag + 1;
					
				}
				
				var tail = false;//检测是否是以跳转节点结尾.
				if(NodeList[i].type == 'Menu' && NodeList[i].isDelete == 0){
					var thumb = NodeList[i].thumb;
					var long = thumb.length;
					
					for(var j = 0; j < long; j++){
					
						if(thumb[j].nextNodeId == null || thumb[j].nextNodeId == ''){
							
							tail = true;
						}
					}
							
					if(tail){
						alert("流程节点必须有子节点。且以跳转节点结尾。");
						return false;
					}
					
					
					var elong = NodeList.length;
					var secondflag = 0; //找父节点
					if(NodeList[i].pid >0){
						for (var e=0;e<elong;e++) {
							
							if(NodeList[i].pid == NodeList[e].id && (NodeList[e].isDelete == 0)){
								var ethumb = NodeList[e].thumb;
								var ethlong = ethumb.length;
								
								for(var f = 0; f < ethlong; f++){
 									if(ethumb[f].nextNodeId == NodeList[i].id){
										secondflag = 1;
 									}
								}
								
							}
							
						}
						
					}
				  if(secondflag == 0 && NodeList[i].pid >0){
					
						flag = flag + 1;
					
					}
					

				}
				
			}
		
			var divnum = $("#drop-bg").find("div");
			var divnum = divnum.length;
			
			if((flag > 1 || flag==0) && divnum > 0){
				alert("要以“流程节点”做为根节点开始，且每个场景节点只能有一个根节点。");
				return false;
			}
		
		}
		else{
		
				
			if(lasting == 1 && NodeList[0].type == 'Menu'){
				alert("必须是跳转节点。");
				return false;
			}
				
		
		}
		
	
    
			var url = "<?php echo url('user/Scenarios/saveAllNode'); ?>";	

			$.ajax({
				url : url,
				type : "post",
				data : {
					'sceneId':sceneId,
					'nowProcessId':nowProcessId,
					'NodeList':NodeList,
				},
				success: function(data){	
					  
					var scen_node_id = $("#nowProcessId").val();
					
					var url = "<?php echo url('notelist'); ?>";
					
					if(scen_node_id){
						jsPlumb.ready(function(){
						  flowFun.main(url,scen_node_id)
						});
					}else{
						
						flowFun.emptyCanvas();
						
					}	
					  
					if(data.code==0){
						alert("保存成功。");
					}else{
						alert("保存失败。");
					}  
					//  location.reload();

				},
				error : function() {
					alert(data.msg);
				}
			});
		    $("#isHaveChange").val(0);
 		

	 }
 /*
 //改变了数据，跳转时做判断用，提示是否保存
window.onbeforeunload = function b(){


  setTimeout(function(){
		setTimeout(beforeloadResult, 50)}
		, 50);
		
	var isHaveChange = $("#isHaveChange").val();
	
	if(isHaveChange > 0){
		return isHaveChange;
	}
	
};*/
 
	 //获取流程场景
	 function getflow(obj){
	 	
 		var isHaveChange = $("#isHaveChange").val();
 		
		if(isHaveChange > 0){
				 
		  	var r=confirm('是否保存所做的更改?');
					if (r) 
					    saveAllData();
		}
		
		$("#isHaveChange").val(0);
 	
		var val = $(obj).attr("dataId");

		$("#nowProcessId").val(val);

	 	
	 	$(obj).siblings(".active").removeClass("active");
		$(".talk-list-item").removeClass("active");
		$(obj).addClass("active");
	//	var nowProcessId = $("#nowProcessId").val();
		
		flowFun.emptyCanvas();
		var url = "<?php echo url('notelist'); ?>";
		var scen_node_id = val;
		//jsPlumb.ready(function(){
		flowFun.main(url,scen_node_id)
		//});
	 	
	 } 
	 
	 
	 //知识库的搜索
	 function getkeyword(){
		 
		var val = $("#chelword").val();
        var textkw = $("#checklis").text();

		knowledgekw = val;
		kntypeword = textkw;
		getKnowledgeList(1);

	 }
	 
	 //删除意向标签
	 function delKnowledge(id){
		 
  	var r=confirm('确认删除?');
			if (!r) 
				
				return; 
	
		$.post("<?php echo url('delKnowledge'); ?>",{'id':id},function(data){
				if(data){
					alert(data);
				}else{
					getKnowledgeList(1);
				}
		}); 
		
				
	 }
	 
	 //刷新单个节点
	 function getsingle(nowEditId,nodeId){
		 
		 var sceneId = $("#nowsceneID").val();
		 var nowProcessId = $("#nowProcessId").val();
		 

		var url = "<?php echo url('user/Scenarios/backSingle'); ?>";	

		 $.ajax({
					url : url,
					type : "post",
					data : {
						'sceneId':sceneId,
						'nowProcessId':nowProcessId,
						'nodeId':nodeId,
					},
					success: function(data){	

						//console.log(data);
	
							if(data.code == 1){
								 alert(data.msg);
							}else{
								
								if(isNaN(nowEditId)){
									//flowFun.emptyNode(nowEditId);
									var node = nowEditId;
							   	//var node = nowEditId + '-heading';
								}else{
									var node = "node-"+nowEditId;
								}
								
								flowFun.emptyNode(node);
								//jsPlumb.empty(node);
								
								var item = data.data;
								var data = {
									id: "node-"+item.id,
									name: item.name,
									content: item.content,
									top: item.top,
									left: item.left,
									type: "old",
									key: item.id,
									nextName:item.next_name,
									choices: item.data.choices || []
								}
				
								var template = DataDraw.getTemplate(item)
				
								$('#drop-bg').append(Mustache.render(template, data));
								
								 DataDraw['addEndpointOf' + item.type](item);
								 DataDraw['connectEndpointOf' + item.type](item);
								 
								
								 var lasting = NodeList.length;
								 for (var i=0;i<lasting;i++) {
									 
										var flag = nowEditId;

										if(NodeList[i].id){
                        flag = "node-"+nowEditId;
										}
																		
										if(NodeList[i].key == flag){
												
												NodeList[i].key = "node-"+item.id;
												NodeList[i].id = item.id;
												NodeList[i].type = item.type;
												NodeList[i].name = item.name;
												NodeList[i].content = item.content;
												NodeList[i].isDelete = 0;
												NodeList[i].pid = item.pid;
												if(item.pid > 0){
													NodeList[i].pNode = "node-"+item.pid; 
												}else{
													NodeList[i].pNode = null; 
												}
												if(item.top){
												NodeList[i].top = item.top;
												}else{
												NodeList[i].top = 0;
												}
												if(item.left){
													NodeList[i].left = item.left;
												}else{
													NodeList[i].left = 0;
												}
									
												

												if(item.type == "Menu"){
													
													var sondata = item.data.choices;
													var long = sondata.length;
													
														NodeList[i].thumb.splice(0,NodeList[i].thumb);
														var thumb = [];
														for (var j=0;j<long;j++) {
															var son = {};
															son.key = "key-"+ item.id + "-" +sondata[j]["id"]; 
															son.id = sondata[j]["id"]; 
															son.name = sondata[j]["name"]; 
															son.Node = "node-"+item.id;
															son.NodeId = item.id;
															
															// var exist = 1; //判断子节点是否存在 , 假设存在
															var elong = NodeList.length;
															for (var e=0;e<elong;e++) {
																if(sondata[j]["next_flow_id"] == NodeList[e].id && (NodeList[e].isDelete == 0)){
																	son.nextNode = sondata[j]["nextNode"]; 
																	son.nextNodeId = sondata[j]["next_flow_id"]; 
																}
																
																/*else{
																	son.nextNode = null;
																	son.nextNodeId = null;
																}*/
															}
															
												
															son.type = sondata[j]["type"];
															// console.log(son); 
															thumb.push(son);
									
														}
														//console.log(thumb);
														NodeList[i].thumb = thumb; 											 
											//console.log(NodeList[i].thumb);
																					
												}
									
										}
								

								 }

                 //如果有父节点,重新连接父节点
                 if(item.pid > 0){
                 	cont(item.pid,nodeId);
                 }
                 
							}
					
					},
					error : function() {
							alert(data.msg);
					}
			});

	 };
	 
	 //如果编辑的元素有父节点,重新连接上
	 function cont(pre,child){

		  var lasting = NodeList.length;
		 for (var i=0;i<lasting;i++) {
	
												
				if(NodeList[i].id == pre){
						

						if(NodeList[i].type == "Menu"){
							
							 var thumb = NodeList[i].thumb;
							 var thumblong = thumb.length;
							 for (var j=0;j<thumblong;j++) {
							 	if(thumb[j].nextNodeId == child){
							
							 		DataDraw.connectEndpoint(thumb[j].key + '-out', "node-"+child+"-in")
								

							 	}
							 }
				      								
						}
			
				}
		

		 }


	 }
	 
 </script>
 
 <script type="text/javascript">
 	
 	$("#notRecorded").on('switchChange.bootstrapSwitch', function (event, state) {
 		
 		
 		if(state){
 			recorded = 1;
 		}
 		else{
 			recorded = 0;
 		}
 		
 		//console.log();
 		getKnowledgeList(1);
		
	});
 
	$(function () {
		
		$("[name='notRecorded']").bootstrapSwitch();
		$("[name='notRecorded']").bootstrapSwitch('state', false, false);
	
		$('#myTab a').click(function (e) {
			e.preventDefault();
			var type = $(this).attr('aria-controls');
		//	console.log(type);
			
			if (type == 'intentionLabel'){
				getLabelList(1);
			}
			else if(type == "knowledgeBase"){
				
				getKnowledgeList(1); 

					}
					else if(type == "process"){
						
						getLearning(""); //获取学习的数据
						
						//获取流程节点列表
						getNoteList();

					}
			
				});
				
					var numArr = new Array();
					$('.Idlist').each(function(){
							numArr.push($(this).val());//添加至数组
					});
				 
				 if(numArr.length > 0){
						 
							$("#taskItem"+numArr[0]).addClass("active");
							$("#taskItem"+numArr[0]).siblings(".active").removeClass("active");
							
							$("#nowsceneID").val(numArr[0]);
							
							getLearning("");
							
							
							//获取流程节点列表
							getNoteList();
							
										
						  gettype8();
							 
							var nowProcessId = $("#nowProcessId").val();
							if(nowProcessId){
								var url = "<?php echo url('notelist'); ?>";
								var scen_node_id = nowProcessId;
								jsPlumb.ready(function(){
									flowFun.main(url,scen_node_id)
								});
							}
						
					
					 }
				
         jsPlumb.setContainer('diagramContainer');

				 flowFun.getReady();
				 
				  // 1.基本参数设置 
		     var options = { 
		         type: 'POST',     // 设置表单提交方式
		         url: "<?php echo url('user/Scenarios/leadingZip'); ?>",    // 设置表单提交URL,默认为表单Form上action的路径
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
						  //	console.log(responseText);
							 if (responseText.code == '0') {
							
								  $('#exampleModal').modal('hide');
							  //	window.reload();
									location.reload();

							 }else{
							
								$('#exampleModal').modal('show');
							 }
	 
		         },  
		         error: function(xhr, status, err) {            
		             alert("操作失败!");    // 访问地址失败，或发生异常没有正常返回
		         },
		         clearForm: true,    // 成功提交后，清除表单填写内容
		         resetForm: true    // 成功提交后，重置表单填写内容
		     }; 
		     
		     // 2.绑定ajaxSubmit()
		     $("#leadingfileform").submit(function(){     // 提交表单的id
		         $(this).ajaxSubmit(options); 
		         return false;   //防止表单自动提交
		     });
				
		});
		
	$("#times-sort-switch").on('switchChange.bootstrapSwitch', function (event, state) {
		getLearning(g_learn_type);
	});
	function downs(obj){
		
		var id = $(obj).attr('dataid');
		
		var ondblclick = $(obj).attr('ondblclick');
//     if(ondblclick == "gotojumpNote(this);"){
// 			return false;
// 		}
		

		$(obj).bind("contextmenu",function(e){
		
			if(e.button===2){
				e.preventDefault();
			
				 if(id>0){
					 showflowSound(id);  //顯示流程語音界面
				 }
			 }
			 
		});
		
	
	}
		

		//获取 意向标签 intentionLabel列表
		function getLabelList(page){	
			
			var sceneId = $("#nowsceneID").val();
			//取默认等级
			backdefault(sceneId);
			 
			var url = "<?php echo url('getLabelList'); ?>";	
			$.ajax({
							url : url,
							dataType : "json", 
							type : "post",
							data : {'page':page,'sceneId':sceneId},
							success: function(data){
								var total = data.data.total;
								var Nowpage = data.data.Nowpage;
								var page = data.data.page;
								var Nowpage = parseInt(Nowpage);
								
								var data = data.data.list;
								 if(data.length > 0){
 
											$("#intentionlist").find("tr").remove();
											
											for(var i=0;i<data.length;i++){
												
											
												var id = data[i].id;
												var name = data[i].name;
												var level = data[i].level;
												var type = data[i].type;
												var rule = data[i].rule;
												var sort = data[i].sort;

												var status = data[i].status;
												var create_time = data[i].create_time;
												var update_time = data[i].update_time;
 
												var string = '<tr class="itemId'+id+'" alt="'+id+'">'
													+'<td class="text-center">'+(i+1)+'</td>' 
													+'<td class="text-center">'+name+'</td>'
													+'<td class="text-center">'+level+'</td>'
													+'<td class="text-center">';

													string += '<a href="javascript:void(0);" onclick="editLabel('+id+');">编辑</a>&nbsp;&nbsp;'
													+'<a href="javascript:void(0);" onclick="delLabel('+id+');">删除</a>'
 
													+'</td>';

											 string += '</tr>';
											 
												$("#intentionlist").append(string); 
	
											}
											
											var prepage = Nowpage-1;
											var nextpage = Nowpage+1;
										 
											var str = '<div class="row">'
											+'<div class="col-sm-3 text-left">'
														
											+'<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">'
											+'<tbody><tr>'
											+'<td class="text-center">总数：'
											+'</td>'
											+'<td class="text-center">'+total+'&nbsp;'
											+'</td>'
																	 
											+'</tr> '
											+'</tbody></table>'                                     
				
											+'</div>'
											+'<div class="col-sm-9 text-right">'
											+'<ul class="pagination">';
										 
											if(Nowpage == 1){
												str += '<li id="prevbtn" class="disabled"><span>«</span></li> ';
											}else{
												str += '<li><a href="javascript:void(0);" onclick="getLabelList('+prepage+');"><span>«</span></a></li> ';
											}
											
											if(page > 10){
											
												if(Nowpage < 7){
													for(var i=0;i<page;i++){
														var nownum = i+1;
														if(nownum < 9){
															 if(nownum == Nowpage){
																 str += '<li class="active"><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+' </a></li> ';  
															 }else{
																 str += '<li><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+' </a></li> ';  
															 }
														}
														
														if(nownum == 9 && nownum != Nowpage){
															 str += '<li class="disabled"><span>...</span></li>';  
														}else if(nownum == 9){
															str += '<li class="active"><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+'</a></li> ';  
														}
													
															if(nownum > (page-2)){
																if(nownum == Nowpage){
																	 str += '<li class="active"><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+' </a></li> ';  
																 }else{
																	 str += '<li><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+' </a></li> ';  
																 }
															}
	
													 }
												}else if(Nowpage > 6 && Nowpage < (page-6)){
													for(var i=0;i<page;i++){
														var nownum = i+1;
														var Nowpage = parseInt(Nowpage);
														if(nownum < 3){
															str += '<li><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+' </a></li> '; 
														}
														
														if((nownum > Nowpage-5) && (nownum < Nowpage+5)){
													
																		 if(nownum == (Nowpage-4)){
																				str += '<li class="disabled"><span>...</span></li>';
																		 }   
																		
																			 if(nownum > (Nowpage-4) && nownum < Nowpage){
																				 str += '<li><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+'</a></li>'; 
																			 }  
																		 
																			 if(nownum == Nowpage){
																			 str += '<li class="active"><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+'</a></li>';  
																			 } 
																		 
																			 if(nownum < (Nowpage + 4) && nownum > Nowpage){
																				str += '<li><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+'</a></li>'; 
																			 }  
																	
																			 if(nownum == (Nowpage + 4)){
																			
																			 str += '<li class="disabled"><span>...</span></li>';
																			 }   
														 }
														 
													 if(nownum > (page-2)){
														 var Nowpage = parseInt(Nowpage);
														 if(nownum == Nowpage){
																	 str += '<li class="active"><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+'</a></li>';
															 }else{
																	str += '<li><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+'</a></li> ';
															 }   
													 
															}     
	
													 }
												}else{
													
													for(var i=0;i<page;i++){
														var nownum = i+1;
														if(nownum<3){
															str += '<li><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+' </a></li>';  
														}
													
														if(nownum == (page-10) && nownum != Nowpage){
															str += '<li class="disabled"><span>...</span></li>';   
														}else if(nownum == (page-10) && nownum == Nowpage){
															str += '<li class="active"><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+'</a></li>';   
														}
														
														if(nownum > (page-10)){
															if(nownum == Nowpage){
																str += '<li class="active"><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+'</a></li> ';   
															}else{
																str += '<li ><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+'</a></li>';   
															}
														}
														
														
													}
										 
														
												}
											}else{
												 for(var i=0;i<page;i++){
													 var nownum = i+1;
													 if(nownum == Nowpage){
														 str += '<li class="active"><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+' </a></li> ';  
													 }else{
														 str += '<li><a href="javascript:void(0);" onclick="getLabelList('+nownum+');">'+nownum+' </a></li> ';  
													 }
												 }
											}
											
						
									 
											if(Nowpage == page){
												str += '<li id="prevbtn" class="disabled"><span>»</span></li> ';
											}else{
												str += '<li><a href="javascript:void(0);" onclick="getLabelList('+nextpage+');"><span>»</span></a></li>';
											}
										
											str += '</ul>'
											+'</div>'
											+'</div>'
										 
											$("#intentionpage").find("div").remove();
											$("#intentionpage").append(str); 
											
										 } else{
											 
												$("#intentionpage").find("div").remove();
 
												$("#intentionlist").find("tr").remove();
											// 	alert('没有数据。');
										 }
							},
							error : function() {
								//alert('获取页面列表失败。');
							}
				});
			
			
			 
	 }
	   
		 //获取知识库列表
	 var knowledgekw = "",kntypeword = "",recorded = 0;
		 function getKnowledgeList(page){
			 
				var sceneId = $("#nowsceneID").val();
				var nowProcessId = $("#nowProcessId").val();
			
				var url = "<?php echo url('getKnowledgeList'); ?>";	
				$.ajax({
								url : url,
								dataType : "json", 
								type : "post",
					data : {
						'page':page,
						'sceneId':sceneId,
						"processId":nowProcessId,
						"keyword":knowledgekw,
					"kntypeword":kntypeword,
					"recorded":recorded
					},
								success: function(data){
									
									var total = data.data.total;
									var Nowpage = data.data.Nowpage;
									var page = data.data.page;
									var Nowpage = parseInt(Nowpage);
									
									var data = data.data.list;

									
									 if(data.length > 0){
		
												$("#knowledgelist").find("tr").remove();
												
												for(var i=0;i<data.length;i++){
													
												
													var id = data[i].id;
													var name = data[i].name;
													var keyword = data[i].keyword;
													var breaks = data[i].break;
													var type = data[i].type;
													var action = data[i].action;
	 
													var action_id = data[i].action_id;
													var intention = data[i].intention;
													var update_time = data[i].update_time;
													var knum = data[i].knum;
													var content = data[i].content;
								var sort = data[i].sort;
													var is_default = data[i].is_default;
								var speechcraft = data[i].speechcraft;
								var snum = data[i].snum;
													
													var string = '<tr class="itemId'+id+'" alt="'+id+'">'
														+'<td class="text-center">'+name+'</td>' 
														+'<td class="text-center"><a href="javascript:void(0);" onclick="showSort(this,'+id+');" '
														+'>'+sort+'</a></td>'   //
														+'<td style="text-align:left;">'+speechcraft+'</td>'									
														+'<td class="text-center">'+snum+'</td>'
														+'<td style="text-align:left;">'+keyword+'</td>'									
														+'<td class="text-center">'+knum+'</td>'
														
														+'<td class="text-center">'+update_time+'</td>'
														+'<td class="text-center">';
	 
														string += '<a href="javascript:void(0);" onclick="showThink('+id+');">编辑</a>&nbsp;&nbsp;';
														if (is_default == 0){
															string += '<a href="javascript:void(0);" style="color:gray;">删除</a>&nbsp;&nbsp;';
															if (type <8){
																string += '<a href="javascript:void(0);"  style="color:gray;">录音</a>';
															}
															else{
																string += '<a href="javascript:void(0);" onclick="showSound('+id+');">录音</a>';
															}
														}
														else{
															string += '<a href="javascript:void(0);" onclick="delKnowledge('+id+');">删除</a>&nbsp;&nbsp;';
															string += '<a href="javascript:void(0);" onclick="showSound('+id+');">录音</a>';
														}
														
														string += '</td>';
	 
														string += '</tr>';
												 
													$("#knowledgelist").append(string); 
		
												}
												
												var prepage = Nowpage-1;
												var nextpage = Nowpage+1;
											 
												var str = '<div class="row">'
												+'<div class="col-sm-3 text-left">'
															
												+'<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">'
												+'<tbody><tr>'
												+'<td class="text-center">总数：'
												+'</td>'
												+'<td class="text-center">'+total+'&nbsp;'
												+'</td>'
																		 
												+'</tr> '
												+'</tbody></table>'                                     
					
												+'</div>'
												+'<div class="col-sm-9 text-right">'
												+'<ul class="pagination">';
											 
												if(Nowpage == 1){
													str += '<li id="prevbtn" class="disabled"><span>«</span></li> ';
												}else{
													str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+prepage+');"><span>«</span></a></li> ';
												}
												
												if(page > 10){
												
													if(Nowpage < 7){
														for(var i=0;i<page;i++){
															var nownum = i+1;
															if(nownum < 9){
																 if(nownum == Nowpage){
																	 str += '<li class="active"><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+' </a></li> ';  
																 }else{
																	 str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+' </a></li> ';  
																 }
															}
															
															if(nownum == 9 && nownum != Nowpage){
																 str += '<li class="disabled"><span>...</span></li>';  
															}else if(nownum == 9){
																str += '<li class="active"><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+'</a></li> ';  
															}
														
																if(nownum > (page-2)){
																	if(nownum == Nowpage){
																		 str += '<li class="active"><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+' </a></li> ';  
																	 }else{
																		 str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+' </a></li> ';  
																	 }
																}
		
														 }
													}else if(Nowpage > 6 && Nowpage < (page-6)){
														for(var i=0;i<page;i++){
															var nownum = i+1;
															var Nowpage = parseInt(Nowpage);
															if(nownum < 3){
																str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+' </a></li> '; 
															}
															
															if((nownum > Nowpage-5) && (nownum < Nowpage+5)){
														
																			 if(nownum == (Nowpage-4)){
																					str += '<li class="disabled"><span>...</span></li>';
																			 }   
																			
																				 if(nownum > (Nowpage-4) && nownum < Nowpage){
																					 str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+'</a></li>'; 
																				 }  
																			 
																				 if(nownum == Nowpage){
																				 str += '<li class="active"><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+'</a></li>';  
																				 } 
																			 
																				 if(nownum < (Nowpage + 4) && nownum > Nowpage){
																					str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+'</a></li>'; 
																				 }  
																		
																				 if(nownum == (Nowpage + 4)){
																				
																				 str += '<li class="disabled"><span>...</span></li>';
																				 }   
															 }
															 
														 if(nownum > (page-2)){
															 var Nowpage = parseInt(Nowpage);
															 if(nownum == Nowpage){
																		 str += '<li class="active"><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+'</a></li>';
																 }else{
																		str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+'</a></li> ';
																 }   
														 
																}     
		
														 }
													}else{
														
														for(var i=0;i<page;i++){
															var nownum = i+1;
															if(nownum<3){
																str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+' </a></li>';  
															}
														
															if(nownum == (page-10) && nownum != Nowpage){
																str += '<li class="disabled"><span>...</span></li>';   
															}else if(nownum == (page-10) && nownum == Nowpage){
																str += '<li class="active"><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+'</a></li>';   
															}
															
															if(nownum > (page-10)){
																if(nownum == Nowpage){
																	str += '<li class="active"><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+'</a></li> ';   
																}else{
																	str += '<li ><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+'</a></li>';   
																}
															}
															
															
														}
											 
															
													}
												}else{
													 for(var i=0;i<page;i++){
														 var nownum = i+1;
														 if(nownum == Nowpage){
															 str += '<li class="active"><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+' </a></li> ';  
														 }else{
															 str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+nownum+');">'+nownum+' </a></li> ';  
														 }
													 }
												}
												
							
										 
												if(Nowpage == page){
													str += '<li id="prevbtn" class="disabled"><span>»</span></li> ';
												}else{
													str += '<li><a href="javascript:void(0);" onclick="getKnowledgeList('+nextpage+');"><span>»</span></a></li>';
												}
											
												str += '</ul>'
												+'</div>'
												+'</div>'
											 
												$("#knowledgepage").find("div").remove();
												$("#knowledgepage").append(str); 
												
											 } 
											 else{
												 
													$("#knowledgepage").find("div").remove();
		
													$("#knowledgelist").find("tr").remove();
												// 	alert('没有数据。');
											 }
											 
								},
								error : function() {
									//alert('获取页面列表失败。');
								}
					});
				
			 			
			 
		 }
		 
		 
	  //去取回默认等级	 
	 function backdefault(sceneId){
		 
		 var url = "<?php echo url('backdefault'); ?>";	
		 $.ajax({
		 				url : url,
		 				dataType : "json", 
		 				type : "post",
		 				data : {'sceneId':sceneId},
		 				success: function(data){
							  //console.log(data);
							
								if (data.code == 0) {
									 // alert(data.msg);
										$('#defaultlevel').text(data.data.level);
										$('#dflevelNum').val(data.data.levelNum);

					
								}else{
									 console.log(data.msg);
	
								}
						},
						error : function() {
							//alert('获取页面列表失败。');
						}
			});
	 }		

	 //删除意向标签
	 
	 function delLabel(id){
		 

		 	var r=confirm('确认删除?');
     	if (!r) 
          return; 
  
		  		var ids = [];
		  		ids.push(id);
		  	//	console.log(id);

		    //	console.log(typeof ids);

		  		if(!ids.length){
		  			alert("至少选择一条。");
		  			return false; 
		  		}
					
				//	console.log(ids);
				//	return false; 
					
		  	$.post("<?php echo url('delLabel'); ?>",{'id':ids},function(data){
		  			if(data){
		  				alert(data);
		  			}else{
		  				getLabelList(1);
		  			}
		  	}); 
	 }
	 

	 function submitAuditing(id){
		 var url = "<?php echo url('setAuditing'); ?>";	
			 $.ajax({
							url : url,
							dataType : "json", 
							type : "post",
							data : {'id':id},
							success: function(data){
								if (data.code) {
							 alert(data.msg);
						}else{
							 location.reload();
						}
							},
							error : function() {
								alert('失败。');
							}
				});
	 
	 }
	 
		//获取话术场景
		function getscenarios(obj,id){
		
			var isHaveChange = $("#isHaveChange").val();
 		
			if(isHaveChange > 0){
					 
			  	var r=confirm('是否保存所做的更改?');
					if (r)
						saveAllData();
							
			}
			
			$("#isHaveChange").val(0);
			
			$(obj).addClass("active");
	    $(obj).siblings(".active").removeClass("active");
			
			$("#nowsceneID").val(id);
      
			// $("#dflearn").css({ 'color': "#fffff", 'background-color': "#03a9f4" });	 
			$("#dflearn").removeClass("btn-default");	 
			$("#dflearn").addClass("btn-primary");	 
			$("#dflearn").siblings(".btn").addClass("btn-default");
			getLearning("");
			getLabelList(1); //获取意向标签	 
			getNoteList();//获取话术节点
		
			getKnowledgeList(1); //获取知识列表
	     
			//获取知识库类型为8的记录
			gettype8();
			$("[name='times_sort']").bootstrapSwitch('state', false, false);

		} 
		
		var g_learn_type = "";
		//获取学习列表
		function getLearning(index){
			var obj = $('#learnType'+index);
			var val = $(obj).attr("data-type");
			g_learn_type = index;
			$(obj).removeClass("btn-default");	
			$(obj).addClass("btn-primary");
			
			$(obj).siblings(".btn").removeClass("btn-primary");	 
			$(obj).siblings(".btn").addClass("btn-default");
			
			page = 1;
			searchdata(page,val);
		
			
		}	
		
		//获取学习列表
		var page = 1;
		function searchdata(page,type){	
	 
			var sceneId = $("#nowsceneID").val();
			var times_sort_flag =	$("[name='times_sort']").bootstrapSwitch('state');
			var url = "<?php echo url('learning'); ?>";	
			$.ajax({
							url : url,
							dataType : "json", 
							type : "post",
							data : {'page':page,'sceneId':sceneId,'type':type,'times_sort_flag':times_sort_flag},
						
							success: function(data){
						
								var total = data.data.total;
								var Nowpage = data.data.Nowpage;
								var page = data.data.page;
								var Nowpage = parseInt(Nowpage);
								
								var data = data.data.list;
								 if(data.length > 0){

											$("#tablelearninglist").find("tr").remove();
											
											for(var i=0;i<data.length;i++){
												
											
												var id = data[i].id;
												var uid = data[i].member_id;
												var phone = data[i].phone;
												var call_id = data[i].call_id;
												var content = data[i].content;
												var create_time = data[i].create_time;
												var status = data[i].status;
												var times = 1;
												if (data[i].times){
													times = data[i].times;
												}
												
												var strstatus = "待学习";
												if(status == "1"){
														strstatus = "已学习";
												}else if(status == "2"){
														strstatus = "忽略";
												}
	

												var string = '<tr class="itemId'+id+'" alt="'+id+'">'
												  +'<td class="text-center">'+content+'</td>'   
												  +'<td class="text-center">'+times+'</td>'
													+'<td class="text-center">'+phone+'</td>'
												
													+'<td class="text-center">'+strstatus+'</td>'
													+'<td class="text-center">'+create_time+'</td>'
													+'<td class="text-center">';
													string += '<a href="javascript:void(0);" onclick="gotoDetail('+uid+');">通话记录</a>&nbsp;&nbsp;'
	
													string += '<a href="javascript:void(0);" onclick="changeStatus('+id+',1);">学习</a>&nbsp;&nbsp;'
													+'<a href="javascript:void(0);" onclick="changeStatus('+id+',2);">忽略</a>&nbsp;&nbsp;'
													+'<a href="javascript:void(0);" onclick="del('+id+');">删除</a>'

													+'</td>';
												 
											
											 string += '</tr>';
											 
												$("#tablelearninglist").append(string); 
	
											}
											
											var prepage = Nowpage-1;
											var nextpage = Nowpage+1;
										 
											var str = '<div class="row">'
											+'<div class="col-sm-3 text-left">'
														
											+'<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">'
											+'<tbody><tr>'
											+'<td class="text-center">总数：'
											+'</td>'
											+'<td class="text-center">'+total+'&nbsp;'
											+'</td>'
																	 
											+'</tr> '
											+'</tbody></table>'                                     
				
											+'</div>'
											+'<div class="col-sm-9 text-right">'
											+'<ul class="pagination">';
										 
											if(Nowpage == 1){
												str += '<li id="prevbtn" class="disabled"><span>«</span></li> ';
											}else{
												str += '<li><a href="javascript:void(0);" onclick="searchdata('+prepage+','+type+');"><span>«</span></a></li> ';
											}
											
											if(page > 10){
											
												if(Nowpage < 7){
													for(var i=0;i<page;i++){
														var nownum = i+1;
														if(nownum < 9){
															 if(nownum == Nowpage){
																 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+' </a></li> ';  
															 }else{
																 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+' </a></li> ';  
															 }
														}
														
														if(nownum == 9 && nownum != Nowpage){
															 str += '<li class="disabled"><span>...</span></li>';  
														}else if(nownum == 9){
															str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+'</a></li> ';  
														}
													
																	if(nownum > (page-2)){
																		if(nownum == Nowpage){
																 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+' </a></li> ';  
															 }else{
																 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+' </a></li> ';  
															 }
																	}
	
													 }
												}else if(Nowpage > 6 && Nowpage < (page-6)){
													for(var i=0;i<page;i++){
														var nownum = i+1;
														var Nowpage = parseInt(Nowpage);
														if(nownum < 3){
															str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+' </a></li> '; 
														}
														
														if((nownum > Nowpage-5) && (nownum < Nowpage+5)){
													
																		 if(nownum == (Nowpage-4)){
																				str += '<li class="disabled"><span>...</span></li>';
																		 }   
																		
																			 if(nownum > (Nowpage-4) && nownum < Nowpage){
																				 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+'</a></li>'; 
																			 }  
																		 
																			 if(nownum == Nowpage){
																			 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+'</a></li>';  
																			 } 
																		 
																			 if(nownum < (Nowpage + 4) && nownum > Nowpage){
																				str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+'</a></li>'; 
																			 }  
																	
																			 if(nownum == (Nowpage + 4)){
																			
																			 str += '<li class="disabled"><span>...</span></li>';
																			 }   
														 }
														 
													 if(nownum > (page-2)){
														 var Nowpage = parseInt(Nowpage);
														 if(nownum == Nowpage){
																	 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+'</a></li>';
															 }else{
																	str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+'</a></li> ';
															 }   
													 
															}     
	
													 }
												}else{
													
													for(var i=0;i<page;i++){
														var nownum = i+1;
														if(nownum<3){
															str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+' </a></li>';  
														}
													
														if(nownum == (page-10) && nownum != Nowpage){
															str += '<li class="disabled"><span>...</span></li>';   
														}else if(nownum == (page-10) && nownum == Nowpage){
															str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+'</a></li>';   
														}
														
														if(nownum > (page-10)){
															if(nownum == Nowpage){
																str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+'</a></li> ';   
															}else{
																str += '<li ><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+'</a></li>';   
															}
														}
														
														
													}
										 
														
												}
											}else{
												 for(var i=0;i<page;i++){
													 var nownum = i+1;
													 if(nownum == Nowpage){
														 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+' </a></li> ';  
													 }else{
														 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+type+');">'+nownum+' </a></li> ';  
													 }
												 }
											}
											
						
									 
											if(Nowpage == page){
												str += '<li id="prevbtn" class="disabled"><span>»</span></li> ';
											}else{
												str += '<li><a href="javascript:void(0);" onclick="searchdata('+nextpage+','+type+');"><span>»</span></a></li>';
											}
										
											str += '</ul>'
											+'</div>'
											+'</div>'
										 
											$("#modalbody").find("div").remove();
											$("#modalbody").append(str); 
											
										 } else{
											 
												$("#modalbody").find("div").remove();

												$("#tablelearninglist").find("tr").remove();
											// 	alert('没有数据。');
										 }
							},
							error : function() {
								//alert('获取页面列表失败。');
							}
				});
			 
	 }
   
	 //改变学习状态
	 function changeStatus(id,status){
	 	
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
	 		
	 		var url = "<?php echo url('changeStatus'); ?>";	
	 		$.ajax({
	 					url : url,
	 					dataType : "json", 
	 					type : "post",
	 					data : {'Ids':ids,'status':status},
	 					success: function(data){
	 						if (data.code) {
	 								alert(data.msg);
	 						}else{
	 							searchdata(page,0);
	 						}
	 					},
	 					error : function() {
	 						alert('修改失败。');
	 					}
	 		});
	 	
	 	
	 }	
	 	
	 //删除学习
	 function del(id){
	 
	 	var r=confirm('确认删除?');
	 			if (!r) 
	 					return; 
	 
	 			var ids=[];
	 			if(id){
	 				ids.push(id);
	 			}else{
	 				
	 				var roleids = document.getElementsByName("customerIds");
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
	 		$.post("<?php echo url('delLearning'); ?>",{'id':ids},function(data){
	 				if(data){
	 					alert(data);
	 				}else{
	 					searchdata(page,0);
	 				}
	 		}); 
	 }
	 	
    //删除
    function delScenarios(id){
    
    	 var r=confirm('确定删除该话术场景?');
        	if (!r) 
              return; 
   
        
     		 $.post("<?php echo url('delScenarios'); ?>",{'id':id},function(data){
						if(data){
							alert(data);
						}else{
							window.location.href=window.location.href;
						}
   	     }); 
    }
   
	  // 恢复默认配置
	  function recovery(){
			
			var r=confirm('是否确定恢复默认配置?');
				if (!r) 
						return; 
						
		   var sceneId = $("#nowsceneID").val();
		 
			 $.post("<?php echo url('recovery'); ?>",{'sceneId':sceneId},function(data){
				if(data){
					if (data.code) {
							alert(data.msg);
					}else{
						getLabelList(0);
					}
				}else{
					window.location.href=window.location.href;
				}
			 }); 
	
	  }
	  

  /////////////////////////////////
	//note列表
	
	function getNoteList(){
		
		 var sceneId = $("#nowsceneID").val();
		 var href = "<?php echo url('user/Scenarios/getNoteList'); ?>";
		 				
		 				 
		 $.ajax({
				 type: "POST",
				 dataType:'json',
				 url: href,
				 cache: false,
				 data: {"sceneId":sceneId},
				 success: function(data) {
					 
					 // console.log(data);
						$(".flowlist").find("div").remove();
						 $(".onelist").find("div").remove();

						$("#nowProcessId").val("");
									
						if (data.code == 0) {
							
								var data = data.data;
								if(data.length > 0){
                     
										for(var i=0;i<data.length;i++){
											
											   if(i==0){
													 
													 $("#nowProcessId").val(data[i].id);
													 
													 var url = "<?php echo url('notelist'); ?>";
													 var scen_node_id = data[i].id;
													 //console.log(scen_node_id);
													 if(scen_node_id){
														 
														    flowFun.main(url,scen_node_id)
														
													 }else{
														 
													    flowFun.emptyCanvas();
														 
													 }
													
													 var string = '<div class="talk-list-item active" dataId="'+data[i].id+'" onclick="getflow(this);">';
												 }else{
													 var string = '<div class="talk-list-item" dataId="'+data[i].id+'" onclick="getflow(this);">';
												 }
												
																string += '<div class="control-icon">'
																+'<span class="anticon glyphicon glyphicon-edit" onclick="newflowModal('+data[i].id+');" aria-hidden="true"></span>'
																+'<span class="anticon glyphicon glyphicon-trash" onclick="delflowNote('+data[i].id+');" aria-hidden="true"></span>'
																+'</div>'
																+'<div class="talklist-item-content"><div>'+data[i].name+'</div></div>'
															+'</div>';
												
											 if(data[i].type > 0){ 
												 
												 $(".onelist").append(string); 

											 }else{
												 $(".flowlist").append(string); 

											 }
												
												 
											
										}
								}		
								
						
						}else{
							
							// console.log(data.msg);
							 //alert(data.msg);
							 flowFun.emptyCanvas();

						}
				
				 },
				 error: function(data) {
					 alert("提交失败");
				 }
		 }) 
							
							
		
	}
	
	//删除学习
	function delflowNote(id){
	
	var r=confirm('确认删除?');
			if (!r) 
					return; 
	
		$.post("<?php echo url('delflowNote'); ?>",{'id':id},function(data){
				if(data){
					alert(data);
				}else{
					getNoteList();
				}
		}); 
	}
	
	

 </script>
  
</div>


<!-- 排序  -->
<div class="modal fade" id="showModal" tabindex="1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
	  
	<div class="modal-dialog modal-sm">
		
		<div class="modal-content">
		
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">排序</h4>
			</div>
			
			<div class="modal-body">
				<div class="editable-input" style="position: relative;">
					<input type="text" id="nowsort" class="form-control input-sm" style="padding-right: 24px;" />
				</div>
			</div>
			<div style="clear:both"></div>
			<div class="modal-footer">
				<input type="hidden" name="showId" id="showId" value="" />
				<button class="btn btn-primary submit-btn" onclick="saveshowsubmit();" type="button">确 定</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			</div>

	 </div>
					 
	</div>
 

	<script type="text/javascript">
		
	
		
		function showSort(obj,id){
			
			var sort = $(obj).text(); 
			$("#nowsort").val(sort);
			
			$("#showId").val(id); 
			$('#showModal').modal('show');
		}
		
		
		function saveshowsubmit(){
			
			var nowsort = $("#nowsort").val();
			
			var showId = $("#showId").val(); 
			
		
			var href = "<?php echo url('user/Scenarios/changeSort'); ?>";

			$.ajax({
				url : href,
				dataType : "json", 
				type : "post",
				data : {'nowsort':nowsort,'showId':showId},
				success: function(data){
					
					if(data.code == 1){
						 alert(data.msg);
					}else{
						
						getKnowledgeList(1); 
					
					}
	
					$('#showModal').modal('hide');

				},
				error : function() {
					alert('获取信息失败。');
				}
			});

	
				
			
		} 
		

	</script>
	
 
</div>


<!-- 导入 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog" style="width:360px;">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">选择导入的zip文件</h4>
				 </div>
				 <div class="modal-body">
						 <form id="leadingfileform" action="<?php echo url('user/Scenarios/leadingZip'); ?>" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
							 <input type="file" class="" id="excelImportId" accept="*.zip" name="excel" />
							 <!--  accept="*.xls" -->
						   <!-- 当前任务的ID -->
							<!-- <input type="hidden" name="taskID" id="taskexampletaskID" value="" /> -->
							 
					 </form>
				 <br/>
		
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer" style="text-align: center;">
					
				 	<button class="btn btn-primary" onclick="Savechange();" type="button">保 存</button>

					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			
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
			
			var excel = document.getElementById('excelImportId');
			if(excel.files[0] == undefined){
				alert('未上传文件！');
				return false;
			}
			var filevalue = excel.value;
			var index = filevalue.lastIndexOf('.');
			var ename = filevalue.substring(index);
			if(ename != ".zip"){
       
			  	alert('文件格式错误。"*.zip"，请用下载的模板改。');
				  return false;
			
			}
			
			$("#leadingfileform").submit();
			$('#exampleModal').modal('hide');
		}
  
    </script>
      
</div>



<!-- 流程录音 -->
<div class="modal right fade" id="FlowSound" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  
	<div class="modal-dialog">
		
		<div class="modal-content">
		
			 <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						 <span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title">话术流程语音</h4>
			 </div>
			
			 <div class="modal-body">

					<div class="form-group mgb10">
						<label style="line-height: 3;" class="col-lg-3 text-right">节点名称：</label>
							<div class="col-lg-9 col-sm-9">
							<input id="flowSoundname" readonly="readonly" class="form-control ttfw" placeholder="" type="text" />
							</div>
						</div>
			
					<div id="flowsoundlist">
					
					</div>
			
					
			 </div>
			 <div style="clear:both"></div>
			 <input type="hidden" name="flowNodeSoundId" id="flowNodeSoundId" value="" />

	 	</div>
					 
	</div>
 

	<script type="text/javascript">

		function formNodeSound(obj){
		 
			var audioFile = $(obj).val(); 
			if(!audioFile){
				alert("话术语音不可为空！");
				return ;
			}
			
		    // 2.绑定ajaxSubmit()
		    var sform = $(obj).parents(".sform").attr("dta");
		  
			// 1.基本参数设置 
		    var options = { 
		         type: 'POST',     // 设置表单提交方式
		         url: "<?php echo url('user/Scenarios/addNodeSound'); ?>",    // 设置表单提交URL,默认为表单Form上action的路径
		         dataType: 'json',    // 返回数据类型
		         beforeSubmit: function(formData, jqForm, option){    // 表单提交之前的回调函数，一般用户表单验证
		             return true;  
		         },
		         success: function(responseText, statusText, xhr, $form){    // 成功后的回调函数(返回数据由responseText获得),,
		             console.log(responseText);
		             if (responseText.code == '0') {
		 						
									$(obj).parent().prev().find("audio").attr("src",responseText.data);
		             } else {
		 							console.log(responseText);
		                // alert("操作失败!" + responseText.msg);    // 成功访问地址，并成功返回数据，由于不符合业务逻辑的失败
		             }
		         },  
		         error: function(xhr, status, err) {            
		             alert("操作失败!");    // 访问地址失败，或发生异常没有正常返回
		         },
		         clearForm: true,    // 成功提交后，清除表单填写内容
		         resetForm: true    // 成功提交后，重置表单填写内容
		     }; 
		     
		    $(obj).parents(".sform").submit(function(){     // 提交表单的id
		         $(this).ajaxSubmit(options); 
		         return false;   //防止表单自动提交
			});
			 
			$(obj).parents(".sform").submit();
			 
		}
		
		
				
		function showflowSound(id){
		
			$("#flowNodeSoundId").val(id);

			var url = "<?php echo url('user/Scenarios/getsflowInfo'); ?>";	
			$.ajax({
				url : url,
				dataType : "json", 
				type : "post",
				data : {'id':id},
				success: function(data){	

					var data = data.data;
			
					$("#flowSoundname").val(data.name);

					$('#flowsoundlist').find("form").remove();
					var str = '<form method="post" class="form-horizontal margintop sform" enctype="multipart/form-data">';
						str +='<div class="form-group mgb10">'
						+'<label class="col-lg-3 text-right">话术：</label>'
						+'<div class="col-lg-9 col-sm-9">'
						+'<div class="word">'+data["content"]+'</div>'
						+'<div>'
						+'</div>'
						+'</div>'
						+'</div>';
					var isVar = data.isVar;
					if (isVar){
				
						var i = 0
						for(var j=0;j<data.audio.length;j++){
							var audiourl = "";
							if(data.audio[j].audio){
								audiourl = data.audio[j].audio;
							}
					
							if(data.audio[j].type < 1){
								i += 1;
								str +='<div class="form-group mgb10">'
									+'<label class="col-lg-3 text-right">'+i+'.话术片断：</label>'
									+'<div class="col-lg-9 col-sm-9">'
									+'<div class="word">'+data.audio[j].txt+'</div>';
								str +='<div><audio src="'+audiourl+'" preload="preload" controls="controls"></audio></div>'
									+'<div>'
									+'<input type="hidden" name="sid[]" value="'+data.id+'" />'
									+'<input type="hidden" name="text[]" value="'+data.audio[j].txt+'" />'
									+'<input type="file" class="form-control" onchange="formNodeSound(this);" accept="audio/*" name="update-audio-file-'+i+'" />'
									+'</div>';
								
								
							}
							else{
								str +='<div class="form-group mgb10">'
									+'<label class="col-lg-3 text-right">变量：</label>'
									+'<div class="col-lg-9 col-sm-9">'
												+'<input type="hidden" name="var[]" value="'+data.audio[j].txt+'" />'
									+'<div class="word">'+data.audio[j].txt+'</div>';
							}
							
							str +='</div>'
							+'</div>';
						}
			
					}
					else{
						//if (data["content"]){
							/*str +='<div class="form-group mgb10">'
								+'<label class="col-lg-3 text-right">话术：</label>'
								+'<div class="col-lg-9 col-sm-9">'
								+'<div class="word">'+data["content"]+'</div>'
								+'<div>'
								+'</div>'
								+'</div>'
								+'</div>';
							*/
							var audiourl = "";
								if(data.audio){
									audiourl = data.audio;
								}
							str +='<div class="form-group mgb10">'
								+'<label class="col-lg-3 text-right"></label>'
								+'<div class="col-lg-9 col-sm-9">'
								+'<div><audio src="'+audiourl+'" preload="preload" controls="controls"></audio></div>'
								+'<div>'
								+'<input type="hidden" name="sid[]" value="'+data.id+'" />'
								+'<input type="hidden" name="text[]" value="'+data["content"]+'" />'
								+'<input type="file" class="form-control" onchange="formNodeSound(this);" accept="audio/*" name="update-audio-file-0" />'
								+'</div>'
								+'</div>'
								+'</div>';
						
						//}
					}
					str += '</form>';
					$('#flowsoundlist').append(str);
					
				   
					
					$('#FlowSound').modal('show');


				},
				error : function() {
					alert('获取信息失败。');
				}
			});

		}
					 
	
	</script>
	
 
</div>


<!-- 跳转节点 -->
<div class="modal fade" id="jumpNote" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

	<div class="modal-dialog"  style="width:450px;">
		
		<div class="modal-content">
		
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">跳转节点</h4>
			</div>
			
			 <div class="modal-body pagelists">
				 
						
					<form id="flowjumpform" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
					
						<div class="form-group">
							<label class="col-lg-3 control-label">节点名称：</label>
							<div class="col-lg-9 col-sm-9">
								<input class="form-control" id="flowNoteName" name="flowNoteName" style="width: 250px;" placeholder="节点名称" />
							</div>
						</div>
						

						 <div class="form-group">
							<label class="col-lg-3 control-label">跳转前话术：</label>
							<div class="col-lg-9 col-sm-9">
								<input type="hidden" name="fjtc_id" id="fjtc_id" value="" />
								<textarea id="jfkeyword" class="form-control" placeholder="进入该节点后播放的话术（可以为空）" style="width: 250px; height: 80px; resize: vertical; margin-top: 0px; margin-bottom: 0px;"></textarea>
								<div class="help-block"></div>
							</div>
						</div> 
				
						<div class="form-group">
							<label class="col-lg-3 control-label">下一步：</label>
							<div class="col-lg-9 col-sm-9">
								<select class="form-control" id="nextflow" name="nextflow" onchange="changeflow(this);" style="width: 250px;">
									<option value=" ">选择跳转到哪一步</option>
									<option value="4">挂机</option> 
									<option value="1">下一主动流程</option>
									<option value="2">指定主动流程</option>
								
								</select>
							</div>
					    </div>
						
						
						<div class="form-group" id="mainflowdiv" style="display: none;">
							<label class="col-lg-3 control-label">指定的流程节点：</label>
							<div class="col-lg-9 col-sm-9">
								<select class="form-control" id="mainflow" name="mainflow" style="width: 250px;">
									<option value=" ">选择要跳转到的流程节点</option>
					
								</select>
							</div>
						</div>
					
				        <div class="form-group">
				         	<label class="col-lg-3 control-label">暂停时间：</label>
				         	<div class="col-lg-9 col-sm-9">
				         		<input class="form-control" type="number" id="jpauseTime" name="jpauseTime" style="width: 250px;" placeholder="暂停时间" />
										<div class="help-block">暂停时间，默认5000毫秒</div>
				         	</div>
				        </div>
								 
				 </form>
				 
					
			 </div>
			 <div style="clear:both"></div>
			 
			 <div class="modal-footer" style="text-align: center;">
				<input type="hidden" name="fNodeType" id="fNodeType" value="" />
				<input type="hidden" name="nowEditId" id="nowEditId" value="" />
				<button class="btn btn-primary submit-btn" onclick="flowSubmit();" type="button">确 定</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			 </div>
			
	 </div>
					 
	</div>

	<script type="text/javascript">
		
		function gotojumpNote(obj){
	
			$("#flowNoteName").val("");
			$("#jfkeyword").val("");
			$("#nextflow").val(" ");
			$("#mainflow").val(" ");
			$("#fjtc_id").val(" ");
			$("#jpauseTime").val("5000");
			
			var type = $(obj).attr("datatype");
			$("#fNodeType").val(type);
			
		
			if(type == "new"){
				
				var pid = $(obj).parent().attr("id");
				$("#nowEditId").val(pid);
				
				$('#jumpNote').modal('show');

			}
			else{
				
								 
					var dataid = $(obj).attr("dataid");
					$("#nowEditId").val(dataid);

					var href = "<?php echo url('user/Scenarios/getFnodeInfo'); ?>";

					$.ajax({
						url : href,
						dataType : "json", 
						type : "post",
						data : {'fId':dataid},
						success: function(data){	
	
							var back = data.data;
							$("#flowNoteName").val(back.name);
							$("#fjtc_id").val(back.tc_id);
							 $("#jfkeyword").val(back.content);
							$("#nextflow").val(back.action);
							$("#jpauseTime").val(back.pause_time);
							if(back.action == "2"){
								    $("#mainflowdiv").css("display","block");
								
										var sceneId = $("#nowsceneID").val();
										var href = "<?php echo url('user/Scenarios/getNoteList'); ?>";
									
										$.ajax({
												type: "POST",
												dataType:'json',
												url: href,
												cache: false,
												data: {"sceneId":sceneId},
												success: function(data) {
													
														$("#mainflow").find("option").remove();
													
														if (data.code == 0) {
															
																var data = data.data;
																if(data.length > 0){
																		var string = '<option value=" ">选择要跳转到的流程节点</option>';
																		for(var i=0;i<data.length;i++){
																			if(data[i].id == back.action_id){
																				string += '<option selected value="'+data[i].id+'">'+data[i].name+'</option>';
																			}else{
																				string += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
																			}
																		}
																		$("#mainflow").append(string); 
																}		
																
														
														}else{
															
															console.log(data.msg);
															//alert(data.msg);
								
														}
												
												},
												error: function(data) {
													alert("提交失败");
												}
										}) 
															
							}
							else{
								$("#mainflowdiv").css("display","none");

							}
				
							$('#jumpNote').modal('show');


						},
						error : function() {
							alert('获取信息失败。');
						}
					});

				
			}


		} 

		function changeflow(obj){

	  	var val = $(obj).val();

			if(val == "2"){
				$("#mainflowdiv").css("display","block");
				
						var sceneId = $("#nowsceneID").val();
						var href = "<?php echo url('user/Scenarios/getNoteList'); ?>";
					
						$.ajax({
								type: "POST",
								dataType:'json',
								url: href,
								cache: false,
								data: {"sceneId":sceneId},
								success: function(data) {
									
									// console.log(data);
										$("#mainflow").find("option").remove();
									
										if (data.code == 0) {
											
												var data = data.data;
												if(data.length > 0){
														var string = '<option value=" ">选择要跳转到的流程节点</option>';
														for(var i=0;i<data.length;i++){
																string += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
														}
														$("#mainflow").append(string); 
												}		
												
										
										}else{
											
											console.log(data.msg);
											//alert(data.msg);
				
										}
								
								},
								error: function(data) {
									alert("提交失败");
								}
						}) 
											

			}else{
				 $("#mainflowdiv").css("display","none");
			}
			

		}
	 
	    //检查表单的必填项,提交数据
		function flowSubmit(){
			
			var fnName = $("#flowNoteName").val();
			var jfkeyword = $("#jfkeyword").val();
   	    	var nextflow = $("#nextflow").val();
			var mainflow = $("#mainflow").val();
			
	        if(!fnName){
				 fnName = "跳转节点";
			}
			if(nextflow <= 0){
				alert("下一步必须选择。"); 
				return false; 
			}
			
			var sty = $("#nowEditId").val();
			var fNodeType = $("#fNodeType").val(); //判断是新建还是编辑的
			if(fNodeType == "old"){
				sty = "node-"+sty;
			}
					
	
			var topLeft = $("#"+sty).attr("style");
			
			var strs= new Array(); //定义一数组 
			strs = topLeft.split(";"); //字符分割 
			var top = "",left = "";
			for (i=0;i< strs.length;i++ ) 
			{ 
				if(strs[i]){
						var temp= new Array(); //定义一数组 
						temp = strs[i].split(":"); //字符分割 
	
						if(temp[1] && i==0){
							top = temp[1];
						}else{
							left = temp[1];
						}
				}
				
			} 
			if(top){
				var toparr = top.split("px");
				top = toparr[0];
			}
			
			if(left){
				var leftarr = left.split("px");
				left = leftarr[0];
			}

		  	var sceneId = $("#nowsceneID").val(); 
			var nowProcessId = $("#nowProcessId").val(); 
			
			if(!nowProcessId){
				$('#jumpNote').modal('hide');
				alert("没有场景节点，请先场景节点。"); 
				return false; 
			}
					 
			
			var tcId = $("#fjtc_id").val();
			var pauseTime = $("#jpauseTime").val();

			 
			var nowEditId = $("#nowEditId").val();
			
			var url = "<?php echo url('user/Scenarios/telflowNode'); ?>";	
			if(fNodeType == "old"){
				url = "<?php echo url('user/Scenarios/editJNode'); ?>";	
			}
			
			
			if(nextflow == 2){
				if(mainflow == " "){
					alert("指定的流程节点必须选择。"); 
				    return false; 
				}
			}

			$.ajax({
				url : url,
				type : "post",
				data : {
					'top':top, 
					'left':left,
					'AIStechnique':jfkeyword,
					'cNodeName':fnName,
					'sceneId':sceneId,
					'nowProcessId':nowProcessId,
					'action':nextflow,
					'actionId':mainflow,
					'type':1,
					'tc_id':tcId,
					"pauseTime":pauseTime,
					'nodeId':nowEditId,
				},
				success: function(data){	
					
					if(data.code == 1){
						alert(data);
					}else{
					  $('#jumpNote').modal('hide');
						
						var fnode = data.data.fnode;
						//刷新单个节点
						getsingle(nowEditId,fnode);
						
					}
				
				},
				error : function() {
						alert(data);
					}
			});


			 
		}

	</script>
	
</div>



<!-- 普通节点 -->
<div class="modal fade" id="commonNode" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

	<div class="modal-dialog" style="width: 445px;">
		
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">流程节点</h4>
			</div>
				
			 <div class="modal-body pagelists">
				 
					
				<form id="commonNodeform" method="post" class="form-horizontal margintop" enctype="multipart/form-data">	
				
					<div class="form-group" id="breakContent" style="display: block;">
						<label class="col-lg-3 control-label">节点名称：</label>
						<div class="col-lg-9 col-sm-9">
							<input class="form-control" id="cNodeName" name="cNodeName" style="width: 250px;" placeholder="节点名称" />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label">流程标签：</label>
						<div class="col-lg-9 col-sm-9">
							<input id="nodeLabel" class="form-control ttfw" placeholder="请输入流程标签名称" type="text" />
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="col-lg-3 control-label">AI话术：</label>
						<div class="col-lg-9 col-sm-9">
							<input type="hidden" name="tc_id" id="tc_id" value="">
							<textarea id="AIStechnique" class="form-control" placeholder="进入该节点后播放的话术" style="width: 250px; height: 80px; resize: vertical; margin-top: 0px; margin-bottom: 0px;"></textarea>
							<div class="help-block"></div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label">用户回答：</label>
						<div class="col-lg-9 col-sm-9">
								
							<div class="row" id="fixedList">

							</div>
							<br/>
							
							<div class="row">
								<p>自定义回答分支</p>
								<div id="CustomList">

								<!-- 
										<div class="leftfl">
											<input id="Sanswer" name="answer" value="肯定" alt="sure" type="checkbox" />								
											<span>肯定</span>
											<span class="glyphicon glyphicon-pencil showpen" onclick="gotoeditorial('sure');" aria-hidden="true"></span>
										</div>
										 -->
									
								</div>
								<div style="clear: both;margin-bottom: 5px;"></div>
								<button type="button" class="btn btn-primary" onclick="gotoeditorial('custom',0);">
									<i class="fa fa-plus-circle fa-lg" style="margin-right: 10px;"></i>增加分支
							  </button>
							</div>
							
						</div>
					</div>
						
				
					
					<div class="form-group">
						<label class="col-lg-3 control-label">暂停时间：</label>
						<div class="col-lg-9 col-sm-9">
							<input class="form-control pull-left" type="number" id="cpauseTime" name="cpauseTime" style="width: 180px;" placeholder="暂停时间" />
							<span style="line-height: 40px;margin-left: 5px;">毫秒</span>
						<!-- 	<div class="help-block">暂停时间，默认3000毫秒</div> -->
							
						</div>
					</div>
      
				  <div class="form-group">
				  	<label class="col-lg-3 control-label">其他设置：</label>
				  	<div class="col-lg-9 col-sm-9 margt">
				  		<input id="Othersettings" placeholder="请输入流程标签名称" value="1" type="checkbox" />								
				  		<span>不允许用户打断</span>
							<br/>
							<input id="unanswered" onclick="checkanswere(this);" value="1" type="checkbox" />								
							<span>指定未回复</span>
							<br/>
							<input id="smsInfo" onclick="checksms(this);" value="1" type="checkbox" />								
							<span>短信通知</span>
							<br/>
							<input id="agent" onclick="getagent(this);" value="1" type="checkbox" />								
							<span>人工坐席</span>
							
				  	</div>
				  </div>
					
					<div class="form-group" id="answeredlist" style="display: none;">
						<label class="col-lg-3 control-label"></label>
						<div class="col-lg-8 col-sm-8" id="">
						 	<select class="form-control" id="eightList" name="eightList">
						 		
						 
						 	</select>
						</div>
					</div>
					
					<div class="form-group" id="smstpl" style="display: none;">
							<label class="col-lg-3 control-label"></label>
							<div class="col-lg-8 col-sm-8">
								<select class="form-control" id="smsList" name="smsList">
									
							
								</select>
							</div>
					</div>
		      
								
					<div class="form-group" id="agentbox" style="display: none;">
						<label class="col-lg-3 control-label"></label>
						<div class="col-lg-8 col-sm-8">
							<select class="form-control" id="agentList" name="agentList">
								<option value="" selected=""> 选择坐席 </option>
								<?php if(is_array($grouplist) || $grouplist instanceof \think\Collection || $grouplist instanceof \think\Paginator): $gk = 0; $__LIST__ = $grouplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gvo): $mod = ($gk % 2 );++$gk;?>
									<option value="<?php echo $gvo['id']; ?>"><?php echo $gvo['name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					
					
			 </form>
			 
				
			 </div>
			 <div style="clear:both"></div>
			 
			 <div class="modal-footer" style="text-align: center;">
				<input type="hidden" name="commonNodeId" id="commonNodeId" value="">
				<input type="hidden" name="commonNodeType" id="commonNodeType" value="">
				<button class="btn btn-primary submit-btn" onclick="commonNodeSubmit();" type="button">确 定</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			 </div>
			
	 </div>
					 
	</div>

	<script type="text/javascript">
		
		//选择坐席
		function getagent(obj){			
			
			if ($(obj).is(":checked")) {	
				$('#agentbox').css("display","block");
			}else{
				$('#agentbox').css("display","none");
			}
			
		}
		
		//选择指定未回复
		function checkanswere(obj){			
			
			if ($(obj).is(":checked")) {	
				$('#answeredlist').css("display","block");
			}else{
				$('#answeredlist').css("display","none");
			}
			// 调用gettype8()获取数据绑定
		}
     
		//选择指定未回复
		function checksms(obj){			
			
			if ($(obj).is(":checked")) {	
				$('#smstpl').css("display","block");
			}else{
				$('#smstpl').css("display","none");
			}
			
		}
		 

		function gotocommonNode(obj){
			
			var type = $(obj).attr("datatype");
			$("#commonNodeType").val(type);

			$('#CustomList').find("div").remove();
			$("#Othersettings").prop("checked",true);
			
			$("#nodeLabel").val("");
			$("#cpauseTime").val("5000");
			 
			$('#fixedList').find("div").remove();

			$("#smsInfo").prop("checked",false);
			$('#smstpl').css("display","none");
			$("#smsList").val("");
			getsmsTpl('smsList');  //获取短信模板
			if(type == "new"){
			
				getdefaultMt("new");  //获取默认答法的

				$("#cNodeName").val("");
				$("#AIStechnique").val("");
				$("#tc_id").val("");
				
				var pid = $(obj).parent().attr("id");
				$("#commonNodeId").val(pid);
				$('#commonNode').modal('show');
				
				$('#answeredlist').css("display","none");
				$("#eightList").val("");
				$("#unanswered").prop("checked",false);
				
				$('#agentbox').css("display","none");
				$("#agentList").val("");
				$("#agent").prop("checked",false);

			}
			else{
				
					var dataid = $(obj).attr("dataid");
					$("#commonNodeId").val(dataid);

					var href = "<?php echo url('user/Scenarios/getFnodeInfo'); ?>";

					$.ajax({
						url : href,
						dataType : "json", 
						type : "post",
						data : {'fId':dataid},
						success: function(data){	
							getdefaultMt("edit");  //获取默认答法的
						//	console.log(data);
							var back = data.data;
							$("#cNodeName").val(back.name);
							$("#AIStechnique").val(back.content);
							$("#tc_id").val(back.tc_id);
							if(back.break == "1"){
								$("#Othersettings").prop("checked",true);
							}else{
								$("#Othersettings").prop("checked",false);
							}
							
							if(back.no_speak_knowledge_id > 0){
								$("#unanswered").prop("checked",true);
								$('#answeredlist').css("display","block");
								$("#eightList").val(back.no_speak_knowledge_id);
							}
							
							if(back.sms_template_id > 0){
								$("#smsInfo").prop("checked",true);
								$('#smstpl').css("display","block");
								$("#smsList").val(back.sms_template_id);
							}
							
							if(back.bridge > 0){
								$("#agent").prop("checked",true);
								$('#agentbox').css("display","block");
								$("#agentList").val(back.bridge);
							}
							
							$("#nodeLabel").val(back.flow_label);
							$("#cpauseTime").val(back.pause_time);


							var returns = back.returns;
							//console.log(typeof returns);
							var leng = returns.length;
							
							for(var i=0;i<leng;i++){
								
								if(returns[i]["type"] == 0){
									
										var name = returns[i]["name"];
										var keyword =	returns[i]["keyword"];
										var Method = returns[i]["keyword"];
										var utId = returns[i]["id"];
										
										var is_select = returns[i]["is_select"];
										var select = "";
										if(is_select == 1){
											select = "checked";
										}
										
										var string = '<div class="leftfl">'
											+'<input class="customAnswer" id="'+utId+'" '+select+' name="customAnswer" value="'+name+'" alt="'+name+'" type="checkbox" />	'							
											+'<span id="'+utId+'text">'+name+'</span>'
											+'<span class="glyphicon glyphicon-pencil showpen" onclick="gotoeditorial(\'customclass\',\''+utId+'\');" aria-hidden="true"></span>'
											+'<span class="glyphicon glyphicon-trash showpen" delId="'+utId+'" aria-hidden="true" onclick="delbranch(this);"></span>'
											+'<input id="'+utId+'Id" class="branchId" type="hidden" value="'+utId+'" \/>'
											+'<input id="'+utId+'Name" class="customName" type="hidden" value="'+name+'" \/>'
											+'<input id="'+utId+'KW" class="customKW" type="hidden" value="'+keyword+'" \/>'
											+'<input id="'+utId+'Method" class="customMethod" type="hidden" value="'+Method+'" \/>'
											+'</div>';
					
									$('#CustomList').append(string);
									
								}
								else{
									
									// 0 普通 1业务问题 2肯定3 否定 4拒绝 5中性  6 未识别 7重复 8用户未说话 9无法回答 10 无法回答次数 
									
									var name = returns[i]["name"];
									var keyword =	returns[i]["keyword"];
									var Method = returns[i]["keyword"];
									var utId = returns[i]["id"];
									var sort = returns[i]["type"];
									var is_select = returns[i]["is_select"];
									var select = "";
									if(is_select == 1){
										select = "checked";
									}

										
									var string = '<div class="leftfl">'
										+'<input class="fixedAnswer" oid="'+utId+'" '+select+' id="'+utId+'" name="fixedAnswer" value="'+name+'" alt="'+name+'" type="checkbox" />	'							
										+'<span id="'+utId+'text">'+name+'</span>'
										+'<span class="glyphicon glyphicon-pencil showpen" onclick="gotoeditorial(\'fixedclass\',\''+utId+'\');" aria-hidden="true"></span>'
										+'<input id="'+utId+'Id" class="branchId" type="hidden" value="'+utId+'" \/>'
										+'<input id="'+utId+'Name" class="fixedName" type="hidden" value="'+name+'" \/>'
										+'<input id="'+utId+'KW" class="fixedKW" type="hidden" value="'+keyword+'" \/>'
										+'<input id="'+utId+'Method" class="fixedMethod sort'+sort+'" type="hidden" value="'+Method+'" \/>'
										+'<input id="'+utId+'sort" class="fixedsort" type="hidden" value="'+sort+'" \/>'
										+'</div>';
					
									$('#fixedList').append(string);
										

								}
								
							}

	
							$('#commonNode').modal('show');

						},
						error : function() {
							alert('获取信息失败。');
						}
					});

			}
				
			
		} 

		//获取默认答法的
		function getdefaultMt(cate){
			
			$('#fixedList').find("div").remove();
			
			var sceneId = $("#nowsceneID").val();
			var nowProcessId = $("#nowProcessId").val();
		
			var href = "<?php echo url('user/Scenarios/defaultMt'); ?>";

			$.ajax({
				url : href,
				dataType : "json", 
				type : "post",
				data : {
					'sceneId':sceneId,
					'processId':nowProcessId,
				},
				success: function(data){	
					
					if(data.code == 0){
						
						var item = data.data;
						var leng = item.length;
						for(var i=0;i<leng;i++){
								 // 0 普通 1业务问题 2肯定3 否定 4拒绝 5中性  6 未识别 7重复 8用户未说话 9无法回答 10 无法回答次数 
							var name = item[i]["name"];
							var keyword =	item[i]["keyword"];
							var Method = item[i]["keyword"];
							var utId = item[i]["id"];
							var sort = item[i]["type"];
							if(cate == 'new'){
								var string = '<div class="leftfl">'
										+'<input class="fixedAnswer" id="" oid="'+utId+'" name="fixedAnswer" value="'+name+'" alt="'+name+'" type="checkbox" />	'							
										+'<span id="'+utId+'text">'+name+'</span>'
										+'<span class="glyphicon glyphicon-pencil showpen" onclick="gotoeditorial(\'fixedclass\',\''+utId+'\');" aria-hidden="true"></span>'
										+'<input id="'+utId+'Id" class="branchId" type="hidden" value="'+utId+'" \/>'
										+'<input id="'+utId+'Name" class="fixedName" type="hidden" value="'+name+'" \/>'
										+'<input id="'+utId+'KW" class="fixedKW" type="hidden" value="" \/>'
										+'<input id="'+utId+'Method" class="fixedMethod" type="hidden" value="'+Method+'" \/>'
										+'<input id="'+utId+'sort" class="fixedsort" type="hidden" value="'+sort+'" \/>'
										+'</div>';
		
								$('#fixedList').append(string);
							}else{
								
								$(".leftfl").find(".sort"+sort).val(Method);
								
							}
							

						}
						
					}else{
						console.log(data);
					}
					var item = data.data;
					
				},
				error : function() {
					alert('获取信息失败。');
				}
			});

			
		}
	 
	 //提交表单
		function commonNodeSubmit(){
			
			var cNodeName = $("#cNodeName").val();
			var AIStechnique = $("#AIStechnique").val();
			var nodeLabel = $("#nodeLabel").val();
			
			if(!cNodeName){
				cNodeName = "流程节点";
			}
			if(!AIStechnique){
				 alert("AI话术不能为空"); 
					return false; 
			}
		
			var commonNodeType = $("#commonNodeType").val(); //判断是新建还是编辑的

			var fixedList = $("#fixedList").find(".leftfl");
			var fixed = [];
			
			var fixedlength = 0;
			
			$.each(fixedList , function(i, n){
				
				var fixedid = $(n).find('.fixedAnswer').attr("oid");
				var fixedId = $(n).find("#"+fixedid+"Id").val();
				var fixedName = $(n).find("#"+fixedid+"Name").val();
				var fixedKW = $(n).find("#"+fixedid+"KW").val();
				var fixedMethod = $(n).find("#"+fixedid+"Method").val();
				var sort = $(n).find("#"+fixedid+"sort").val();
				
				var res = {}; 
				res.name = fixedName; 
				res.keyword = fixedKW; 
				res.method = fixedMethod; 
				res.id = fixedid; 
			
				
				res.sort = sort; 
				
				//编辑的时候,要删除一些选项时,加判断
				
				var fixedAnswer = $(n).find('.fixedAnswer:checked').val();
				
				if(fixedAnswer)
				{
					res.is_select = 1; 
					fixedlength = fixedlength + 1;
				}
				else{
					res.is_select = 0;
				}
									
				fixed.push(res);
				

			});
			 
			if(fixedlength == 0){
					alert("用户回答至少要选择一个"); 
					return false; 
			}

			var itemList = $("#CustomList").find(".leftfl");
			var custnode = [];
		
			$.each(itemList , function(i, n){
				
					var tempid = $(n).find('.customAnswer').attr("id");
					
					var branchId = $(n).find("#"+tempid+"Id").val();
					var tempName = $(n).find("#"+tempid+"Name").val();
					var tempKW = $(n).find("#"+tempid+"KW").val();
					var tempMethod = $(n).find("#"+tempid+"Method").val();
				
					var temp = {};
					temp.branchId = branchId; 
					temp.tempName = tempName; 
					temp.tempKW = tempKW; 
					temp.tempMethod = tempMethod; 
					
					var customAnswer = $(n).find('.customAnswer:checked').val();
					 
					if(customAnswer)
					{
						temp.is_select = 1; 
					}
					else{
						temp.is_select = 0;
					}
					 
					custnode.push(temp);

				 
			});
			
		//	console.log(custnode);
		//	return false;
				
			var Othersettings = $("#Othersettings:checked").val();		
			var sceneId = $("#nowsceneID").val(); 
			var nowProcessId = $("#nowProcessId").val(); 
			
			if(!nowProcessId){
				$('#commonNode').modal('hide');
				alert("没有场景节点，请先场景节点。"); 
				return false; 
			}
					 
			var sty = $("#commonNodeId").val();			 
		 //判断是新建还是编辑,老的要加node-
			if(commonNodeType == "old"){
				sty = "node-"+sty;
			}
					 
			var topLeft = $("#"+sty).attr("style");
			
			var strs= new Array(); //定义一数组 
			strs = topLeft.split(";"); //字符分割 
			var top = "",left = "";
			for (i=0;i< strs.length;i++ ) 
			{ 
				if(strs[i]){
						var temp= new Array(); //定义一数组 
						temp = strs[i].split(":"); //字符分割 
	
						if(temp[1] && i==0){
							top = temp[1];
						}else{
							left = temp[1];
						}
				}
				
			} 
			if(top){
				var toparr = top.split("px");
				top = toparr[0];
			}
			
			if(left){
				var leftarr = left.split("px");
				left = leftarr[0];
			}

			  var eightval = $("#eightList").val();
			  if ($("#unanswered").is(":checked")) {

				if(!eightval || eightval ==" "){
					alert("请选择用户未说话的话术");
					return false; 
				}	
			}
			else{
				eightval = 0;
			}
			
			var tplId = $("#smsList option:selected").val();
			if ($("#smsInfo").is(":checked")) {

				if(!tplId || tplId ==" "){
					alert("请选择短信模板");
					return false; 
				}
				
			}
			else{
				tplId = 0;
			}
					
			var groupId = $("#agentList option:selected").val();
			if ($("#agent").is(":checked")) {

				if(!groupId || groupId ==" "){
					alert("请选择坐席分组");
					return false; 
				}
			}
			else{
				groupId = 0;
			}
						 	
						
			var tc_id = $("#tc_id").val(); 
			
			var pauseTime = $("#cpauseTime").val();
			
			var commonNodeId = $("#commonNodeId").val(); 
			
			var url = "<?php echo url('user/Scenarios/editflowNode'); ?>";	

			if(commonNodeType == "new"){
			 url = "<?php echo url('user/Scenarios/telflowNode'); ?>";	
			}
	

			$.ajax({
							url : url,
							type : "post",
							data : {
								'top':top,
								'left':left,
								'otherset':Othersettings,
								'custnode':custnode,
								'fixed':fixed,
								'AIStechnique':AIStechnique,
								'cNodeName':cNodeName,
								'sceneId':sceneId,
								'nowProcessId':nowProcessId,
								'type':0,
								'delNode':delNode,
								'tc_id':tc_id,
								'nodeLabel':nodeLabel,
								'pauseTime':pauseTime,
								'nodeId':commonNodeId,
								"eightval":eightval,
								"tplId":tplId,
								"groupId":groupId
							},
							success: function(data){	

								//console.log(data);
								
								if(data.code == 1){
									 alert(data.msg);
								}else{
									
									var fnode = data.data.fnode;
									//刷新单个节点
									getsingle(commonNodeId,fnode);
									
									delNode.splice(0,delNode.length); //清空删除列表
									
									$('#commonNode').modal('hide');
								

								}
							
							},
							error : function() {
								alert(data.msg);
							}
				});
		
 
		}
		
		//获取类型为8的记录,绑到“指定未回复"
		function gettype8(){
			
			var sceneId = $("#nowsceneID").val();
	
			var href = "<?php echo url('user/Scenarios/getKnlgEight'); ?>";

			$.ajax({
				url : href,
				dataType : "json", 
				type : "post",
				data : {
					'sceneId':sceneId,
				},
				success: function(data){	
					$("#eightList").empty();	
					var string = '';
					$("#eightList").append("<option value=''>请选择用户未说话的话术</option> ");
					if(data.code == 0){
						var item = data.data;
						var leng = item.length;
						
						for(var i=0;i<leng;i++){
							// 0 普通 1业务问题 2肯定3 否定 4拒绝 5中性  6 未识别 7重复 8用户未说话 9无法回答 10 无法回答次数 
							var name = item[i]["name"];
							var kid = item[i]["id"];
							string += '<option value="'+kid+'">'+name+'</option>';
						}
					}
					if (string){
						$('#eightList').append(string);
					}
						
						
				},
				error : function() {
					alert('获取信息失败。');
				}
			});
						
						
		}
	   
		//获取短信模板"
		function getsmsTpl(bindObj){
			
			var sceneId = $("#nowsceneID").val();
	
			var href = "<?php echo url('user/Scenarios/getSmsTpl'); ?>";

			$.ajax({
				url : href,
				dataType : "json", 
				type : "post",
				data : {
					'sceneId':sceneId,
				},
				success: function(data){
					$("#"+bindObj).empty();	
					var string = '';
					$("#"+bindObj).append("<option value=''>请选择短信模板</option> ");
					if(data.code == 0){
						var item = data.data;
						var leng = item.length;
						
						
						for(var i=0;i<leng;i++){
								
							var name = item[i]["name"];
							var kid = item[i]["id"];
							
							string += '<option value="'+kid+'">'+name+'</option>';
						}
					}
					if (string){
						$("#"+bindObj).append(string);
					}
				},
				error : function() {
					alert('获取信息失败。');
				}
			});
						
						
		}
	 
	</script>
	
</div>


<!-- 编辑分支 -->
<div class="modal fade" id="editorial" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

	<div class="modal-dialog" style="width:450px;">
		
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">编辑分支</h4>
			</div>
				
			 <div class="modal-body pagelists">
				 
						
					<form id="branchform" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
					
							<div class="form-group">
								<label class="col-lg-4 control-label">分支名称：</label>
								<div class="col-lg-8 col-sm-8">
									<input class="form-control" id="branchName" name="branchName" style="width: 250px;;" placeholder="分支名称" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-4 control-label">关键词：</label>
								<div class="col-lg-8 col-sm-8">
									<textarea id="branchkeyword" class="form-control" placeholder="多个关键字之间用英文逗号“,”分隔" style="width: 250px; height: 80px; resize: vertical; margin-top: 0px; margin-bottom: 0px;"></textarea>
									<div class="help-block">多个关键字之间用英文逗号“,”分隔</div>
								</div>
							</div>
							
							<div class="form-group" id="globalId">
								<label class="col-lg-4 control-label">全局关键字：</label>
								<div class="col-lg-8 col-sm-8">
									<textarea id="answerMethod" class="form-control" placeholder="多个全局关键字之间用英文逗号“,”分隔" style="width: 250px; height: 80px; resize: vertical; margin-top: 0px; margin-bottom: 0px;"></textarea>
									<div class="help-block">多个全局关键字之间用英文逗号“,”分隔</div>
								</div>
							</div>
					
				 </form>
				 
					
			 </div>
			 <div style="clear:both"></div>
			 
			 <div class="modal-footer" style="text-align: center;">
				 <input id="nowEditBranch" value="" type="hidden" />	
				 <input id="cstEditBranch" value="" type="hidden" />		

				 <button class="btn btn-primary submit-btn" onclick="branchSubmit();" type="button">确 定</button>
			 	 <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			 </div>
			
	 </div>
					 
	</div>

	<script type="text/javascript">
		
		function gotoeditorial(type,obj){
			
     $("#cstEditBranch").val(""); 
			 
			if(type == "custom"){
				
				$("#branchName").val("");
				$("#branchkeyword").val("");
				$("#answerMethod").val("");
				
				$("#branchName").removeAttr("readonly");
				$("#answerMethod").removeAttr("readonly");
				
				$("#globalId").css("display","none");
			} 
			else if(type == "customclass"){
				
				var name = $("#" + obj + "Name").val();
				var keyword = $("#" + obj + "KW").val();
				var Method = $("#" + obj + "Method").val();
				$("#branchName").val(name);
				$("#branchkeyword").val(keyword);
				$("#answerMethod").val(Method);
				$("#branchName").removeAttr("readonly");
				$("#answerMethod").removeAttr("readonly");
				
				$("#cstEditBranch").val(obj); 
				
				$("#globalId").css("display","none");
			}
			else{
				var name = $("#" + obj + "Name").val();
				var keyword = $("#" + obj + "KW").val();
				var Method = $("#" + obj + "Method").val();
				$("#branchName").val(name);
				$("#branchkeyword").val(keyword);
				$("#answerMethod").val(Method);
				
				$("#branchName").attr("readonly","readonly");
				$("#answerMethod").attr("readonly","readonly");
        $("#cstEditBranch").val(obj);
				 $("#globalId").css("display","block");

			}
			
			$("#nowEditBranch").val(type);
			$('#editorial').modal('show');

		} 

	 //检查表单的必填项,保存
		function branchSubmit(){
			
      var type = $("#nowEditBranch").val();
			
			if(type == "custom"){
				
					var name = $("#branchName").val();
					var keyword =	$("#branchkeyword").val();
					var Method =	$("#answerMethod").val();
					var utId = uuid.v1();
					
					if(!name){
						alert("名称不能为空");
						return false;
					}
					if(!keyword){
						alert("关键词不能为空");
						return false;
					}
					
				
					
					var string = '<div class="leftfl">'
												+'<input class="customAnswer" id="'+utId+'" name="customAnswer" value="'+name+'" alt="'+name+'" type="checkbox" />	'							
												+'<span id="'+utId+'text">'+name+'</span>'
												+'<span class="glyphicon glyphicon-pencil showpen" onclick="gotoeditorial(\'customclass\',\''+utId+'\');" aria-hidden="true"></span>'
												+'<span class="glyphicon glyphicon-trash showpen" aria-hidden="true" delId="" onclick="delbranch(this);"></span>'
												+'<input id="'+utId+'Id" class="branchId" type="hidden" value="" \/>'
											  +'<input id="'+utId+'Name" class="customName" type="hidden" value="'+name+'" \/>'
												+'<input id="'+utId+'KW" class="customKW" type="hidden" value="'+keyword+'" \/>'
												+'<input id="'+utId+'Method" class="customMethod" type="hidden" value="'+Method+'" \/>'
												+'</div>';

				$('#CustomList').append(string);

			}
			else if(type == "customclass"){
				
				var name = $("#branchName").val();
				var keyword = $("#branchkeyword").val();
        var Method = $("#answerMethod").val();
				var cid = $("#cstEditBranch").val(); 
				
				if(!name){
					alert("名称不能为空");
					return false;
				}
				if(!keyword){
					alert("关键词不能为空");
					return false;
				}
			
				
				$("#" + cid + "Name").val(name);
				$("#" + cid + "KW").val(keyword);
				$("#" + cid + "Method").val(Method);
				$("#" + cid + "text").text(name);
				$("#" + cid + "").val(name);
				$("#" + cid + "").attr("alt",name);

				$("#branchName").removeAttr("readonly");
				$("#answerMethod").removeAttr("readonly");
				
				
			}
			else{
				
				var fid = $("#cstEditBranch").val(); 

				var keyword = $("#branchkeyword").val();
		   	$("#" + fid + "KW").val(keyword);

			}
						
			$('#editorial').modal('hide');	
			 
		}
    
		var delNode = [];
		//删除节点
		function delbranch(obj){
			
			 $(obj).parent().remove();
			  var dataid =  $(obj).attr("delId");
				 if(dataid > 0){
					 delNode.push(dataid);
				 }

		}

	
	</script>
	
</div>


<style type="text/css">

.leftfl{
	float: left;
	width:50%;
}	

/* .leftfr{
	float: right;
	width:50%;
}	 */

.margt{
	margin-top: 7px;
}	

.showpen{
	font-size: 12px;
	display: none;
	margin-left: 5px;
}

.leftfl:hover > .showpen{
	font-size: 12px;
	cursor: pointer;
	display: inline-block;
}	

/* .leftfr:hover > .showpen{
	font-size: 12px;
	cursor: pointer;
	display: inline-block;
} */

</style>
<!-- 知识库 添加录音的 -->
<script type="text/javascript" src="__PUBLIC__/plugs/jquery/jquery.form.min.js"></script>
	 
	<style type="text/css">
		.mybtn{
			position:fixed; 
			right:10px; 
			bottom:20px; 
			display:block; 
			width:50px; 
			height:50px;
			border-radius:50px; 
			padding:0px; 
			text-align:center; 
			line-height:50px;
		}
		
		.modal.left .modal-dialog,
		.modal.right .modal-dialog {
			position: fixed;
			margin: auto;
			/* width: 320px; */
			height: 100%;
			-webkit-transform: translate3d(0%, 0, 0);
				-ms-transform: translate3d(0%, 0, 0);
				 -o-transform: translate3d(0%, 0, 0);
					transform: translate3d(0%, 0, 0);
		}
	
		.modal.left .modal-content,
		.modal.right .modal-content {
			height: 100%;
			overflow-y: auto;
		}
		
		.modal.left .modal-body,
		.modal.right .modal-body {
			padding: 15px 15px 80px;
		}
	
		/*Left*/
		.modal.left.fade .modal-dialog{
			left: -320px;
			-webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
				 -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
				 -o-transition: opacity 0.3s linear, left 0.3s ease-out;
					transition: opacity 0.3s linear, left 0.3s ease-out;
		}
		
		.modal.left.fade.in .modal-dialog{
			left: 0;
		}
			
		/*Right*/
		.modal.right.fade .modal-dialog {
			right: -320px;
			-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
				 -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
				 -o-transition: opacity 0.3s linear, right 0.3s ease-out;
					transition: opacity 0.3s linear, right 0.3s ease-out;
		}
		
		.modal.right.fade.in .modal-dialog {
			right: 0;
		}
	
		/* ----- MODAL STYLE ----- 
		.modal-content {
			border-radius: 0;
			border: none;
		}
	
		.modal-header {
			border-bottom-color: #EEEEEE;
			background-color: #FAFAFA;
		}*/
		.text-right{
					text-align: right;
		}
		.mgb10{
			margin-bottom: 10px;
			overflow: hidden;
		}
	</style>
	

	<div class="modal right fade" id="ThinkTankSound" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	  
		<div class="modal-dialog">
			
			<div class="modal-content">
			
				 <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							 <span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title">编辑语音</h4> 
				 </div>
				
				 <div class="modal-body">

						  <div class="form-group mgb10">
								<label class="col-lg-3 text-right">标题：</label>
								<div class="col-lg-9 col-sm-9">
									<input id="Soundname" readonly="readonly" class="form-control ttfw" placeholder="请输入节点名称" type="text" />
								</div>
							</div>
							
							<div class="form-group mgb10">
								<label class="col-lg-3 text-right">关键字：</label>
								<div class="col-lg-9 col-sm-9">
									<textarea id="Soundkeyword" readonly="readonly" class="form-control" style="width: 250px;height:auto;resize: vertical;"></textarea>
								</div>
							</div>
							
							<div id="soundlist">
									
								<form method="post" class="form-horizontal margintop sform" enctype="multipart/form-data">	
								  <div class="form-group mgb10">
								  	<label class="col-lg-3 text-right">问题回复：</label>
								  	<div class="col-lg-9 col-sm-9">
								  	  <div class="word">好的，那我稍后让我们资深客户经理联系您，我这边就先不打扰您了，祝您生活愉快，再见！</div>
											
													<div>
														<audio src="" preload="preload" controls="controls"></audio>
													</div>
													
													<div>
														<input type="hidden" name="sid" value="1" />
														<input type="file" class="form-control" onchange="formSound(this);" accept="audio/*" name="update-audio-file" />
													</div>
										
								  	</div>
								  </div>
								
								</form>
								
								<form method="post" dta="2" action="" class="form-horizontal margintop sform" enctype="multipart/form-data">	
									<div class="form-group mgb10">
										<label class="col-lg-3 text-right">问题回复：</label>
										<div class="col-lg-9 col-sm-9">
											<div class="word">好的，那我稍后让我们资深客户经理联系您，我这边就先不打扰您了，祝您生活愉快，再见！</div>
											
												  <div>
												  	<audio src="" preload="preload" controls="controls"></audio>
												  </div>
													
													<div>
														<input type="hidden" name="sid" value="2" />
														<input type="file" class="form-control" onchange="formSound(this);" accept="audio/*" name="update-audio-file" />
													<!-- 	<button class="btn btn-success submit-btn" onclick="" type="button">确 定</button> -->
													</div>
										
										</div>
									</div>
								
								</form>
								
							</div>
				
						
				 </div>
				 <div style="clear:both"></div>
				 <input type="hidden" name="flowSoundId" id="flowSoundId" value="" />

		 </div>
						 
		</div>
	 

			<script type="text/javascript">
				
			
				
				function formSound(obj){
				 
					var audioFile = $(obj).val(); 
					if(!audioFile){
						alert("话术语音不可为空！");
						return ;
					}
				    // 2.绑定ajaxSubmit()
				   var sform = $(obj).parents(".sform").attr("dta");
				   //console.log(sform);
					 
					  // 1.基本参数设置 
					     var options = { 
					         type: 'POST',     // 设置表单提交方式
					         url: "<?php echo url('user/Scenarios/addSound'); ?>",    // 设置表单提交URL,默认为表单Form上action的路径
					         dataType: 'json',    // 返回数据类型
					         beforeSubmit: function(formData, jqForm, option){    // 表单提交之前的回调函数，一般用户表单验证
					             return true;  
					         },
					         success: function(responseText, statusText, xhr, $form){    // 成功后的回调函数(返回数据由responseText获得),,
					             console.log(responseText);
					             if (responseText.code == '0') {
					 						
												$(obj).parent().prev().find("audio").attr("src",responseText.data);
					             } else {
					 							console.log(responseText);
					                // alert("操作失败!" + responseText.msg);    // 成功访问地址，并成功返回数据，由于不符合业务逻辑的失败
					             }
					         },  
					         error: function(xhr, status, err) {            
					             alert("操作失败!");    // 访问地址失败，或发生异常没有正常返回
					         },
					         clearForm: true,    // 成功提交后，清除表单填写内容
					         resetForm: true    // 成功提交后，重置表单填写内容
					     }; 
					     

				   $(obj).parents(".sform").submit(function(){     // 提交表单的id
					         $(this).ajaxSubmit(options); 
					         return false;   //防止表单自动提交
					  });
					 
					 $(obj).parents(".sform").submit();
					 
				}
				
				
						
				function showSound(id){
					
						  $("#flowSoundId").val(id);

							var url = "<?php echo url('user/Scenarios/getKnowledgeInfo'); ?>";	
							$.ajax({
								url : url,
								dataType : "json", 
								type : "post",
								data : {'id':id},
								success: function(data){	
									
									var data = data.data;
									$("#Soundname").val(data.name);
									$("#Soundkeyword").val(data.keyword);
								
									$('#soundlist').find("form").remove();
									
									var content = data.content;
									var leng = content.length;
									for(var i=0;i<leng;i++){
											var str = '<form method="post" class="form-horizontal margintop sform" enctype="multipart/form-data">'	
															  +'<div class="form-group mgb10">'
																+'<label class="col-lg-3 text-right">问题回复：</label>'
																+'<div class="col-lg-9 col-sm-9">'
																+'<div class="word">'+content[i]["content"]+'</div>'
																+'<div><audio src="'+content[i]["audio"]+'" preload="preload" controls="controls"></audio></div>'
																+'<div>'
																+'<input type="hidden" name="sid" value="'+content[i]["id"]+'" />'
																+'<input type="file" class="form-control" onchange="formSound(this);" accept="audio/*" name="update-audio-file" />'
																+'</div>'
																+'</div>'
																+'</div>'
																+'</form>';
																
										 $('#soundlist').append(str);
									}

								
									
									$('#ThinkTankSound').modal('show');


								},
								error : function() {
									alert('获取信息失败。');
								}
							});

					//$('#ThinkTankSound').modal('show');

				}
							 
			
			</script>
			
	 
	</div>

 

 <!-- 添加或者编辑知识库 -->
	 
	<div class="modal fade" id="ThinkTank" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
	  
		<div class="modal-dialog" style="width:450px;">
			
			<div class="modal-content">
				
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title">添加知识库</h4>
					</div>
					
				 <div class="modal-body">
					 
							
						<form id="ThinkTankForm" method="post" class="form-horizontal margintop" enctype="multipart/form-data">	
						
							<div class="form-group">
								<label class="col-lg-3 control-label">节点名称：</label>
								<div class="col-lg-8 col-sm-8">
									<input id="ttfname" class="form-control" placeholder="请输入节点名称" type="text" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">问答标签：</label>
								<div class="col-lg-8 col-sm-8">
									<input id="label" class="form-control" placeholder="请输入问答标签" type="text" />
								</div>
							</div>
							
							<div class="form-group" id="kongknlg">
								<label class="col-lg-3 control-label">问答类型：</label>
								<div class="col-lg-8 col-sm-8">
									<select class="form-control" id="knlgType" name="knlgType">
										<option value="0">普通</option>
										<option value="8">用户未说话</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-3 control-label">关键字：</label>
								<div class="col-lg-8 col-sm-8">
									<textarea id="keyword" class="form-control" placeholder="多个关键字之间用英文逗号“,”分隔" style="height:auto;resize: vertical;"></textarea>
									<div class="help-block">多个关键字之间用英文逗号“,”分隔</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-lg-3 control-label">机器人文字：</label>
								<div class="col-lg-8 col-sm-8">
									
										<div style="margin-top: 10px;">
											 <button type="button" class="btn btn-primary" id="addcondion" onclick="addcontent();" style="font-size: 14px;">
												 <i class="fa fa-plus-circle fa-lg"></i>
												 <span>添加条件</span>
											 </button>
										</div>
										
										<div id="contentlist">
											
										
									  </div>
									
								</div>
							</div>
					
							<div class="form-group">
								<label class="col-lg-3 control-label">动作：</label>
								<div class="col-lg-8 col-sm-8">
									<select class="form-control" id="action"  onchange="changeaction(this);"  name="action">
										<option value="4">挂机</option>
										<option value="1">下一场景节点</option>
										<option value="2">指定场景节点</option>
										<option value="3">返回当前场景节点中的流程</option>
										<option value="0">等待用户响应</option>
									</select>
								</div>
							</div>
							
							<div class="form-group" id="mainScenesl" style="display: none;">
									<label class="col-lg-3 control-label">指定流程节点：</label>
									<div class="col-lg-8 col-sm-8">
										<select class="form-control" id="mainSceneFlow" name="mainflow">
											<option value=" ">选择要跳转到的流程节点</option>
									
										</select>
									</div>
							</div>
										
							<div class="form-group">
								<label class="col-lg-3 control-label">意向等级：</label>
								<div class="col-lg-8 col-sm-8">
									<select class="form-control" id="flowNodeLevel" name="flowNodeLevel">
										<option value="" selected="">选择意向等级 </option>
										<option value="6">A级(有明确意向)</option>
										<option value="5">B级(可能有意向)</option>
										<option value="4">C级(明确拒绝)</option>
										<option value="3">D级(用户忙)</option>
										<option value="2">E级(拨打失败)</option>
										<option value="1">F级(无效客户)</option>
									</select>
								</div>
							</div>
							

							<div class="form-group">
								<label class="col-lg-3 control-label">暂停时间：</label>
								<div class="col-lg-8 col-sm-8">
									<input class="form-control pull-left" type="number" id="ttpauseTime" style="width: 180px;" name="ttpauseTime" placeholder="暂停时间" />
									<span style="line-height: 40px;margin-left: 5px;">毫秒</span>
									<!-- <div class="help-block">暂停时间，默认3000毫秒</div> -->
								</div>
							</div>
			
			
					
						<div class="form-group">
							<label class="col-lg-3 control-label">其他设置：</label>
							<div class="col-lg-9 col-sm-9 margt">
								
								<input id="knbreak" placeholder="请输入流程标签名称" value="1" type="checkbox" />
								<span>不允许用户打断 </span>
								<br/>
								
								<input id="msgInfo" onclick="checkmsg(this);" value="1" type="checkbox" />								
								<span>短信通知</span>
								<br/>
								<input id="kagent" onclick="kgetagent(this);" value="1" type="checkbox" />								
								<span>人工坐席</span>
								
							</div>
						</div>
						
						
						<div class="form-group" id="msgtpl" style="display: none;">
							<label class="col-lg-3 control-label"></label>
							<div class="col-lg-8 col-sm-8" id="">
								<select class="form-control" id="msgList" name="msgList">
								</select>
							</div>
						</div>
			        
						<div class="form-group" id="kagentbox" style="display: none;">
							<label class="col-lg-3 control-label"></label>
							<div class="col-lg-8 col-sm-8">
								<select class="form-control" id="kagentList" name="kagentList">
									<option value="" selected=""> 选择坐席 </option>
									<?php if(is_array($grouplist) || $grouplist instanceof \think\Collection || $grouplist instanceof \think\Paginator): $gk = 0; $__LIST__ = $grouplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gvo): $mod = ($gk % 2 );++$gk;?>
										<option value="<?php echo $gvo['id']; ?>"><?php echo $gvo['name']; ?></option>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</div>
						</div>
							
	
					 </form>
						
				 </div>
				 <div style="clear:both"></div>
				 
				 <div class="modal-footer">
					<input type="hidden" name="ThinkTankId" id="ThinkTankId" value="">
					<button class="btn btn-primary submit-btn" onclick="cfThinkTank();" type="button">确 定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				 </div>
				
		 </div>
						 
		</div>
	 
			<script type="text/javascript">
				
				//选择坐席
				function kgetagent(obj){			
					
					if ($(obj).is(":checked")) {	
						$('#kagentbox').css("display","block");
					}else{
						$('#kagentbox').css("display","none");
					}
					
				}
				
 
				//选择指定未回复
				function checkmsg(obj){			
					
					if ($(obj).is(":checked")) {	
						$('#msgtpl').css("display","block");
					}else{
						$('#msgtpl').css("display","none");
					}
					
				}
				 

				function showThink(id){
					
					$("#msgInfo").prop("checked",false);
					$('#msgtpl').css("display","none");
					$("#msgList").val("");
					
					$('#mainScenesl').css("display","none");
					$("#mainSceneFlow").val("");
					
					$('#kagentbox').css("display","none");
					$("#kagentList").val("");
					$("#kagent").prop("checked",false);
					getsmsTpl('msgList');  //获取短信模板
					 if(id){
						 
						  $("#ThinkTankId").val(id);

							var url = "<?php echo url('user/Scenarios/getKnowledgeInfo'); ?>";	
							$.ajax({
								url : url,
								dataType : "json", 
								type : "post",
								data : {'id':id},
								success: function(data){	
									
									var data = data.data;

									$("#ttfname").val(data.name);
										if (data.is_default == "0" && data.type < 7){
										
										
										$('#ttfname').attr("readonly","readonly");
										$('#ttpauseTime').attr("readonly","readonly");
											
											$('#addcondion').attr("disabled","disabled");
											
										$('#label').attr("disabled","disabled");
										$('#action').attr("disabled","disabled");
										$('#mainSceneFlow').attr("disabled","disabled");
										$('#flowNodeLevel').attr("disabled","disabled");
										$('#msgInfo').attr("disabled","disabled");
										$('#kagent').attr("disabled","disabled");
										
										$('#kongknlg').css("display","none");
									
									}
									else{
										
										$('#ttfname').removeAttr("readonly");
										$('#ttpauseTime').removeAttr("readonly");
										
										$('#addcondion').removeAttr("disabled");
										$('#label').removeAttr("disabled");
										$('#action').removeAttr("disabled");
										$('#mainSceneFlow').removeAttr("disabled");
										$('#flowNodeLevel').removeAttr("disabled");
										$('#msgInfo').removeAttr("disabled");
										$('#kagent').removeAttr("disabled");
										
										$('#kongknlg').css("display","block");
										
									}
									
									if(data.break == "1"){
										$("#knbreak").prop("checked",true);
									}
									else{
										$("#knbreak").prop("checked",false);
									}

									$("#label").val(data.label);

									$("#keyword").val(data.keyword);
									$("#ttpauseTime").val(data.pause_time); 

									$('#contentlist').find("div").remove();
									
									var content = data.content;
									var leng = content.length;
									for(var i=0;i<leng;i++){
									 	var str = '<div class="answer-input-item">'
					 						+'<textarea rows="4" dataId="'+content[i]["id"]+'" placeholder="输入该问题的标准答案" maxlength="500" class="form-control ktextarea" >'+content[i]["content"]+'</textarea>'
					 						+'<span class="icon-plus" onclick="delContent(this);">'
					 						+'<span class="anticon glyphicon glyphicon-trash icon-delete" aria-hidden="true"></span>'
					 						+'</span>'
					 						+'</div><div style="clear:both;"></div>';
									 						
										 $('#contentlist').append(str);
									}

									
									$("#action").val(data.action);
									var actionId = data.action_id;
									$("#flowNodeLevel").val(data.intention);
									$("#knlgType").val(data.type);

									
									if(data.action == '2'){
										$("#mainScenesl").css("display","block");
										
											var sceneId = $("#nowsceneID").val();
											var href = "<?php echo url('user/Scenarios/getNoteList'); ?>";
										
											$.ajax({
												type: "POST",
												dataType:'json',
												url: href,
												cache: false,
												data: {"sceneId":sceneId},
												success: function(data) {
													
													// console.log(data);
													$("#mainSceneFlow").find("option").remove();
												
													if (data.code == 0) {
													
														var data = data.data;
														if(data.length > 0){
																var string = '<option value=" ">选择要跳转到的流程节点</option>';
																for(var i=0;i<data.length;i++){
																	if(data[i].id == actionId){
																		
																		string += '<option selected value="'+data[i].id+'">'+data[i].name+'</option>';

																	}else{
																		string += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
																	}
																	
																}
																$("#mainSceneFlow").append(string); 
														}		
														
													
													}else{
														
														console.log(data.msg);
														//alert(data.msg);
													}
												
												},
												error: function(data) {
													alert("提交失败");
												}
											}) 
																
										
									}
									
									if(data.sms_template_id > 0){
										$("#msgInfo").prop("checked",true);
										$('#msgtpl').css("display","block");
										$("#msgList").val(data.sms_template_id);
									}
									
									if(data.bridge > 0){

										$('#kagentbox').css("display","block");
										$("#kagentList").val(data.bridge);
										$("#kagent").prop("checked",true);

									}
									
									$('#ThinkTank').modal('show');


								},
								error : function() {
									alert('获取信息失败。');
								}
							});
						
					 }
					 else{
						 
						$("#ttfname").val("");
						// $("#fnbreak").prop("checked",false);
						$("#action").val("0");
						$("#keyword").val("");
						$("#label").val("");	
						$("#flowNodeLevel").val("");
						$("#ThinkTankId").val(""); 
						$('#contentlist').find("div").remove();
						$("#ttpauseTime").val("5000"); 
						$("#knbreak").prop("checked",true);			
						$('#ThinkTank').modal('show');
						$("#knlgType").val(0);
						
						
						$('#ttfname').removeAttr("readonly");
						$('#ttpauseTime').removeAttr("readonly");
						
						$('#addcondion').removeAttr("disabled");
						$('#label').removeAttr("disabled");
						$('#action').removeAttr("disabled");
						$('#mainSceneFlow').removeAttr("disabled");
						$('#flowNodeLevel').removeAttr("disabled");
						$('#msgInfo').removeAttr("disabled");
						$('#kagent').removeAttr("disabled");
						
						$('#kongknlg').css("display","block");
					 }
					 

				}
			 
			 //检查表单的必填项 提交表单
				function cfThinkTank(){
							 
					var sceneId = $("#nowsceneID").val();
					var processId = $("#nowProcessId").val();

					var name = $("#ttfname").val();
					var label = $("#label").val();
					var action = $("#action").val();
					var keyword = $("#keyword").val();
				
					var flowNodeLevel = $("#flowNodeLevel").val();
					var ThinkTankId = $("#ThinkTankId").val();
					
					var itemList = $("#contentlist").find(".ktextarea");
					 
					var content = [];
					$.each(itemList , function(i, n){
						 var temp = $(n).val();
						 
						 var item = {};
						 item.id = $(n).attr("dataId");
						 item.con = temp;
						 
						 content.push(item);
					});

					var actionId = $("#mainSceneFlow").val();
					var ttpauseTime = $("#ttpauseTime").val(); 
					var knlgType = $("#knlgType").val();
					
					var tplId = $("#msgList option:selected").val();
					if ($("#msgInfo").is(":checked")) {
		
						if(!tplId || tplId ==" "){
							alert("请选择短信模板");
							return false; 
						}
					}
					else{
						tplId = 0;
					}
								  
					var groupId = $("#kagentList option:selected").val();
					if ($("#kagent").is(":checked")) {
						if(!groupId || groupId ==" "){
							alert("请选择坐席分组");
							return false; 
						}
					}
					else{
						groupId = 0;
					}
						
				var knbreak = $("#knbreak:checked").val();		
				
				var url = "<?php echo url('user/Scenarios/addThinkTank'); ?>";	
				$.ajax({
						url : url,
						type : "post",
						data : {
							'sceneId':sceneId,
							'processId':processId,
							'name':name,
							'label':label,
							'action':action,
							'actionId':actionId,
							'keyword':keyword,
							'flowNodeLevel':flowNodeLevel,
							'ThinkTankId':ThinkTankId,
							'content':content,
							"delArr":delArr,
							"pausetime":ttpauseTime,
							"knlgType":knlgType,
							"tplId":tplId,
							"groupId":groupId,
							'knbreak':knbreak,
						},
						success: function(data){	
							
							content.splice(0,content.length);
							delArr.splice(0,delArr.length);
								
							if (data.code == 0) {
								
								$('#ThinkTank').modal('hide');
								getKnowledgeList(1);
								
								if(data.data != ""){
									alert(data.data);
								}
								
							}
							else{
								console.log(data.msg);
							}
						},
						error : function() {
							alert(data);
						}
					});
				}

				//绑定指定场景节点
				function changeaction(obj){

					var val = $(obj).val();

					if(val == "2"){
						$("#mainScenesl").css("display","block");
						
							var sceneId = $("#nowsceneID").val();
							var href = "<?php echo url('user/Scenarios/getNoteList'); ?>";
						
							$.ajax({
								type: "POST",
								dataType:'json',
								url: href,
								cache: false,
								data: {"sceneId":sceneId},
								success: function(data) {
									
									// console.log(data);
									$("#mainSceneFlow").find("option").remove();
								
									if (data.code == 0) {
										
										var data = data.data;
										if(data.length > 0){
											var string = '<option value=" ">选择要跳转到的流程节点</option>';
											for(var i=0;i<data.length;i++){
													string += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
											}
											$("#mainSceneFlow").append(string); 
										}		
											
									
									}else{
										
										console.log(data.msg);
										//alert(data.msg);
									}
								
								},
								error: function(data) {
									alert("提交失败");
								}
							}) 
													

					}else{
						 $("#mainScenesl").css("display","none");
					}
					

				}
			 
				 
				// 添加元素
				function addcontent(){
					 
					var str = '<div class="answer-input-item">'
						+'<textarea rows="4" dataId="" placeholder="输入该问题的标准答案" maxlength="500" class="form-control ktextarea" ></textarea>'
						+'<span class="icon-plus" onclick="delContent(this);">'
						+'<span class="anticon glyphicon glyphicon-trash icon-delete" aria-hidden="true"></span>'
						+'</span>'
						+'</div><div style="clear:both;"></div>';
												
						$('#contentlist').append(str);
	
										
				}
				 
			 //删除元素
			 var delArr = [];
			 function delContent(obj){
				 
				 $(obj).parent().remove();
				 
				 var dataid =  $(obj).siblings(".ktextarea").attr("dataid");
				 if(dataid > 0){
					 
					 delArr.push(dataid);

				 }
			 }
				
	</script>
			
	 
	</div>
 


 <!--  新增话术  -->
<div class="modal fade" id="speechcraft" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  
	  <div class="modal-dialog modal-sm" style="width: 360px;">
			
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">添加话术场景</h4>
				 </div>
				 <div class="modal-body pagelists">
					 
							
						<form id="formScenariosform" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
					
								 <div class="form-group">
									<label class="col-lg-3 control-label">场景名称：</label>
									<div class="col-lg-9 col-sm-9">
										 <input type="text" class="form-control" placeholder="请输入场景名称" name="name" id="name" />
									</div>
								</div>
							
								<div class="form-group">
									<label class="col-lg-3 control-label">行业类型：</label>
									<div class="col-lg-9 col-sm-9">
										
										<select class="form-control" id="tradeType" name="tradeType">
											 <option value="0">请选择行业</option>
											 <option value="1">金融</option>
											 <option value="2">贷款</option>
											 <option value="3">房产</option>
											 <option value="4">装修</option>
											 <option value="5">汽车</option>
											 <option value="6">教育</option>
											<option value="7">其他</option>
										</select>
									
									</div>
								</div>
								

								<div class="form-group" id="breakContent">
									<label class="col-lg-3 control-label">自动打断：</label>
									<div class="col-lg-9 col-sm-9">
										<select class="form-control" id="break" name="break">
											<option value="0">是</option>
											<option value="1">否</option>
										</select>
									</div>
								</div>
								
								<div class="modal-footer" style="text-align: center;">
										<input type="hidden" name="scenariosId" id="scenariosId" value="">
										<button class="btn btn-primary submit-btn" onclick="formScenarios();" type="button">确 定</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
							 </div>
			
				
					 </form>
					 
						
				 </div>
				 <div style="clear:both"></div>
				
		 </div>
						 
    </div>
 
		<script type="text/javascript">
				
			function newScenariosModal(id){
				 
				 if(id){
							var url = "<?php echo url('user/Scenarios/getmessage'); ?>";	
						 $.ajax({
								url : url,
								dataType : "json", 
								type : "post",
								data : {'id':id},
								success: function(data){	
									
										 $("#name").val(data.name);
										 $("#scenariosId").val(data.id);
											 document.getElementById('tradeType').value = data.type;
										 //$("#is_tpl option[value="+data.type+"]").;
										 $("#tplContent").css("display","none");
										 $("#breakContent").css("display","none");
											$("#break").val(data.break);		 
										 $('#speechcraft').modal('show')
								},
								error : function() {
									alert('审核信息失败。');
								}
							});
					
				 }
				 else{
					 
					    $("#name").val("");

						  $("#scenariosId").val("");
							document.getElementById('tradeType').value = "0";
							//$("#is_tpl").val("0");
						 //$("#break").val("1");
						 $("#tplContent").css("display","block");
						 $("#breakContent").css("display","block");
						 $('#speechcraft').modal('show');
						 
				 }
				
		 
			}
		 
		 
		 //检查表单的必填项
			function formScenarios(){

					var name = $("#name").val();
					if(!name){
						alert("场景名不能为空"); 
						return false; 
					}
					
				 var scenariosId = $("#scenariosId").val();

				 var href = "<?php echo url('user/Scenarios/addScenarios'); ?>";
				 if(scenariosId){
						 href = "<?php echo url('user/Scenarios/editscenarios'); ?>";
				 }

				 
				 $.ajax({
						 type: "POST",
						 dataType:'json',
						 url: href,
						 cache: false,
						 data: $("#formScenariosform").serialize(),
						 success: function(data) {
							if (data.code == 0) {
								  
									$('#speechcraft').modal('hide');
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


		
		</script>
		
   
</div> 


<!-- 审核 -->
 
<div class="modal fade" id="myLargepage" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  
	  <div class="modal-dialog">
			
			<div class="modal-content">
				
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title">话术审核</h4>
				  </div>
					
				 <div class="modal-body pagelists">
					 
							
						<form id="form" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
					
					  <div class="form-group" id="breakContent" style="display: block;">
								<label class="col-lg-4 control-label">备注：</label>
								<div class="col-lg-8 col-sm-8">
								<textarea id="remarks" style="width: 250px;height:auto">null</textarea>

								</div>
							</div>
					 
							
								<div class="form-group" style="text-align: center;">
										<input type="hidden" name="scenariosId" id="scenariosId" value="">
										<button class="btn btn-primary submit-btn" onclick="auditing(0);" type="button">通 过</button>
										<button class="btn btn-primary submit-btn" onclick="auditing(3);" type="button">不通过</button>

										<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
							 </div>
			
				
					 </form>
					 
						
				 </div>
				 <div style="clear:both"></div>
				
		 </div>
						 
	</div>
 
		<script type="text/javascript">
				
			function showExamine(id){

				
					$("#scenariosId").val(id);
				

					var url = "<?php echo url('user/Scenarios/getmessage'); ?>";	
					$.ajax({
							url : url,
							dataType : "json", 
							type : "post",
							data : {'id':id},
							success: function(data){	
								
									$("#remarks").val(data.remark);
								
									$('#myLargepage').modal('show');

							},
							error : function() {
								alert('审核信息失败。');
							}
						});
				

 
			}
		 
		 
		 //检查表单的必填项
			function auditing(status){
				
	
				var scenariosId = $("#scenariosId").val();
				var remarks = $("#remarks").val();


				var url = "<?php echo url('user/Scenarios/auditing'); ?>";	
					 $.ajax({
									url : url,
									type : "post",
									data : {'scenariosId':scenariosId,'remarks':remarks,'status':status},
									success: function(data){	
										
										$('#myLargepage').modal('hide');

										if(data){
											alert(data);
										}else{
											location.reload();
										}
									
									},
									error : function() {
										alert(data);
									}
						});
				

				 
			}


		
		</script>
		
   
  </div>
 


<!--  通话详情  -->

 <style type="text/css">
	.textwidth{
		  width:250px;
	}
	.add_yuyin{height:.85rem;border-top:1px solid #e5e5e5;margin-left:.28rem;line-height: .85rem;width:100%;;float:left;}
	.luzhiyy{position:relative;font-size:.3rem;color:#666}
	.luzhiyy::after{position:absolute;right:.25rem;top:.28rem;width:.3rem;height:.3rem;content:"";background:url("../images/icon.png") no-repeat -5.78rem -3.59rem;background-size:14.57rem 4.86rem;}
	.luzhiyy s{display: inline-block;width:.48rem;height:.48rem;background:url("../images/icon.png") no-repeat -5.59rem -2.86rem;background-size:14.57rem 4.86rem;vertical-align: middle;margin-right:.24rem;}
	.tijaobtn{width:90%;height:.8rem;background-color:#f16461;text-align: center;line-height: .8rem;color:#fff;margin:0rem auto;display: block;border-radius: 6px;font-size:.3rem;}
	.tijaobtn[disabled]{background-color:#f4cac9;}
	.r_yuyin{color:#999999;height:.4rem;line-height:.4rem;padding:0 .1rem;    background-color: #95ce73;
	    border: 1px solid #368e42;border-radius: 6px;max-width: 75%;min-width: 18%;position: relative;float:right;}
	.r_yuyin s{width:.4rem;height:.4rem;position:absolute;right:.2rem;top:.09rem;background:url("../images/icon.png") no-repeat -7.11rem -3.62rem;background-size:14.57rem 4.86rem;}
	 .deleteicon{width:.55rem;height:.5rem;background:url("../images/icon.png") no-repeat -6.17rem -3.41rem;background-size:14.57rem 4.86rem;margin-top:.12rem;margin-left:.1rem;float:left;}

	.luyin_dialog{position: absolute;z-index: 500;top:0;left:0;bottom:0;right:0;background: url("../images/luyinbg.jpg") no-repeat center center;background-size: cover;display: none;}
	.r_yuyin i{    float: right;
	    color: #ffffff;
	    font-size: 21px;
	    font-weight: 600;
		}
	.header_img {
	   font-size:30px;
	}
	.audio-c{
	 width: 100%;
	    background-color: #6b9cb6;
	    text-align: center;
		padding-top: 5px;

	}
	.info{
		display:block;
		float:left;
		width:27%;
		background-color:#fff;
		margin-right:7px;

	}
	.info h4{
	    font-weight: bold;
	    background-color: #6b9cb6;
	    color: #fff;
	    padding: 5px;
	    margin-top: 0px;
		width:100%

	}
	.item{
		border-bottom:2px solid #ccc;
		
		padding:5px;

	}

	.greenactive{

	    background-color: green;
		color:white;
	}

	.tip{
		font-size:12px;
	}
	.popover-content{
		color:#008cee; 
		text-align: right;
		margin-right: 50px;
}
</style>


<link href="__STATIC__/css/chat.css" rel="stylesheet" type="text/css">
<script src="__STATIC__/js/audio.js"></script>


<!--  通话详情  -->

<div class="modal fade bs-example-modal-lg" id="call-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	
	<div class="modal-dialog modal-lg" role="document">

		<div class="modal-content">

		  <div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    <h4 class="modal-title"><strong>通话详情</strong></h4>
		  </div>

		  <div class="modal-body">

                <div class="row">
					<div class="containerss">

						<div class="info" >

							<div style="margin-top: 10px;font-size: 13px;">
							姓名：<span class="record" style="font-size: 13px;" id="nickname"></span>
							</div>

							<div style="margin-top: 10px;font-size: 13px;">
							性别：<span class="iparea" style="font-size: 13px;" id="sex"></span>
							</div>

							<div style="margin-top: 10px;font-size: 13px;">
							号码：<span style="font-size: 10px;" id="mobile"></span>
							</div>

							<h4>通话结果</h4>
							<div style="margin-top: 10px;font-size: 13px;">
							拨打时间：<span class="record" style="font-size: 13px;" id="last_dial_time"></span>
							</div>

							<div style="margin-top: 10px;font-size: 13px;">
							通话时长：<span class="iparea" style="font-size: 13px;" id="duration"></span>
							</div>
							
							<div style="margin-top: 10px;font-size: 13px;">
							通话轮次：<span class="iparea" style="font-size: 13px;" id="call_time"></span>
							</div>
							<div style="margin-top: 10px;font-size: 13px;">
							主叫号码：<span class="iparea" style="font-size: 13px;" id="originatingCall"></span>
							</div>
							<div style="margin-top: 10px;font-size: 13px;">
							命中关键词：<span class="iparea" style="font-size: 13px;" id="keyNum"></span>
							</div>
							
							

							<div style="margin-top: 10px;font-size: 13px;">
							拨打状态:<span style="font-size: 10px;" id="statusinfo"></span>
							</div>
							
							<h4 >客户意向评估等级</h4>

							<div class="item" data-v="6" id="level6">
							A类<span class="tip" >(有明确意向)</span>
							</div>

							<div class="item" data-v="5" id="level5">
							B类<span class="tip">(可能有意向)</span>
							</div>

							<div class="item" data-v="4" id="level4">
							C类<span class="tip">(明确拒绝)</span>
							</div>

							<div class="item" data-v="3" id="level3">
							D类<span class="tip">(用户忙)</span>
							</div>

							<div class="item" data-v="2" id="level2">
							E类<span class="tip">(拨打失败)</span>
							</div>
						<div class="item" data-v="1" id="level1">
							F类<span class="tip">(无效客户)</span>
							</div>
							<h5 style="text-align:left;background-color:#ccc;padding-left: 27px;">*点击上面等级可以修改</h5>

						</div>

						<div id="chatcontent" class="content chat-block" tabindex="0">

							<div class="audio-c">
							    <audio src="" id="record_path" controls="controls"></audio>
							</div>

							<div id="msglist">

			


              </div>
					
						</div>

                    <!--  -->
					</div>
			    </div>		       
		  	
		  </div>

		</div>

	</div>


<script type="text/javascript">
  

	function gotoDetail(uid){

		// window.location.href = "<?php echo url('detail'); ?>/id/"+uid;  

          
	    $.post("<?php echo url('user/member/backdetail'); ?>",{'id':uid},function(data){
				if(data){

					if(data.code == 0){
						
						  var memberInfo = data.data.memberInfo;
							var bills = data.data.bills;

							$("#nickname").text(memberInfo.nickname);
							$("#sex").text(memberInfo.sex);
							$("#mobile").text(memberInfo.mobile);
							$("#last_dial_time").text(memberInfo.last_dial_time);

							$("#duration").text(memberInfo.duration+'秒');
							$("#call_time").text(memberInfo.call_times+'轮');  
							$("#originatingCall").text(memberInfo.originating_call);
							$("#keyNum").text(data.data.num);
							var strstatus = "未拨打";

							switch (memberInfo.status) {
								case '2':
									strstatus = "已接通";
									break;
								case '3':
									strstatus = "无人接听";
									break;
								case '4':
									strstatus = "停机";
									break;
								case '5':
									strstatus = "空号";
									break;
								case '6':
									strstatus = "正在通话中";
									break;
								case '7':
									strstatus = "关机";
									break;
								case '8':
									strstatus = "用户拒接";
									break;
								case '9':
									strstatus = "网络忙";
									break;
								case '10':
									strstatus = "来电提醒";
									break;
								case '11':
									strstatus = "呼叫转移失败";
									break;
								default:
									strstatus = "--";
									}	
							$("#statusinfo").text(strstatus);
							$(".greenactive").removeClass("greenactive");
	
							if(memberInfo.level == 1){
								 $("#level1").addClass("greenactive");
							}else if(memberInfo.level == 2){
								 $("#level2").addClass("greenactive");
							}else if(memberInfo.level == 3){
								 $("#level3").addClass("greenactive");
							}else if(memberInfo.level == 4){
								 $("#level4").addClass("greenactive");
							}else if(memberInfo.level == 5){
								 $("#level5").addClass("greenactive");
							}

							$("#record_path").attr('src',memberInfo.record_path);

							 $("#msglist").empty();

						for(var i=0;i<bills.length;i++){

							var tempbills = bills[i];

							//var tempstr = "";

							if(tempbills.role == 0){
								var tempstr = '<div class="jimi_lists clearfix">'
										+ '<div class="header_img  icon iconfont icon-zuoxi1"></div>' 
										+ '<table class="msg" cellspacing="0" cellpadding="0">'
										+ '<tbody>'
										+ '<tr>'
										+ '<td></td>'
										+ '<td></td>'
										+ '</tr>'
										+ '<tr>'
										+ '<td class="lt"></td>'
										+ '<td class="tt"></td>'
										+ '<td class="rt"></td>'
										+ '</tr>'
										+ '<tr>'
										+ '<td class="lm"><span></span></td>'
										+ '<td class="mm">'
										+ '<span class="wel"><span class="visitor"><p>'
										+ ''+tempbills.message+'</p></span></span>'
										+ '</td>'
										+ '<td class="rm">'	
										+ '</td>'
										+ '</tr>'
										+ '<tr>'
										+ '<td class="lb"></td>'
										+ '<td class="bm"></td>'
										+ '<td class="rb"></td>'
										+ '</tr>'
										+ '<tr><td></td></tr>'
										+ '</tbody>'
										+ '</table>'
										+ '</div>'; 

							}else{
                                    var tempstr = '<div class="customer_lists clearfix">'
										+ '<div class="header_img jimi3 icon iconfont icon-gerenkehuguanli">'
										+ '</div>'
										+ '<table class="msg" cellspacing="0" cellpadding="0">'
										+ '<tbody>'
										+ '<tr>'
										+ '<td></td>'
										+ '<td></td>'
										+ '</tr>'
										+ '<tr>'
										+ '<td class="lt"></td>'
										+ '<td class="tt"></td>'
										+ '<td class="rt"></td>'
										+ '</tr>'

										+ '<tr>'
										+ '<td class="lm"></td>'
										+ '<td class="mm">'+tempbills.message+'</td>'									
										+ '<td class="rm"><span></span></td>'
										+ '</tr>'
										+ '<tr>'
										+ '<td class="lb"></td>'
										+ '<td class="bm"></td>'
										+ '<td class="rb"></td>'
										+ '</tr>'

										+ '</tbody>'
										+ '</table>'
										+ '</div>';

										if((tempbills.status == 1) && tempbills.hit_keyword){
                                          tempstr += '<div class="customer_lists clearfix">'
											  + '<div class="session-item-left">'
													 + '<div class="ant-popover-placement ant-popover-placement-left">'
															 + '<div class="popover-content">【'+tempbills.hit_keyword+'】<br></div>'
													 + '</div>'
											  + '</div>'
										     + '</div>';
										}

							}

                          $("#msglist").append(tempstr);
							

						}

            $('#call-detail').modal('show');

					}else{
							console.log(data);
							alert(data.msg);
					}

				}else{

					console.log(data);
				  //	window.location.href=window.location.href;
				}
		 }); 	

	  $("#thisId").val(uid);  

	

	}	

	<!-- function ensure(){ -->

	  <!-- $('#call-detail').modal('hide'); -->

	<!-- } -->

	$('.item').click(function(){	

		var level = $(this).attr('data-v');
		var uid = $("#thisId").val();  

		$.post("<?php echo url('changeLevel'); ?>/id/"+uid,{'level':level},function(res){
			if (res.code == 0){	

			}
			alert(res.msg);
		});
		$(".greenactive").removeClass("greenactive");
		$(this).addClass("greenactive");
	});

</script>

</div> 

 <!--  新建规则  -->
 

<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugs/bootstrap-select/dist/css/bootstrap-select.min.css" />

<script type="text/javascript" src="__PUBLIC__/plugs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

 
<div class="modal fade" id="newRule" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  
	  <div class="modal-dialog">
			
			<div class="modal-content">
				
				  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							 <span aria-hidden="true">×</span>
						</button>
						<h4 class="modal-title"> 编辑默认规则</h4>
					</div>
				
				 <div class="modal-body">
					 <div class="create-modal-body">
						 <div class="add-modal-wrap">
							 
							 <div class="add-modal-tips"><span>同时满足下列条件</span></div>
							 <div class="modal-rules-wrap" style="max-height: 400px;overflow-y: auto;">
									<div id="conditionlist">
										
									</div>
									<div style="margin-top: 10px;">
									 <button type="button" class="btn btn-primary" onclick="addcondition();" style="font-size: 14px;">
										 <i class="fa fa-plus-circle fa-lg"></i>
										 <span>添加条件</span>
									 </button>
									</div>
							
							 </div>
							 
							 <div class="modal-result">
								 <p>将意向等级标签设置为</p>
								 <div class="" style="width: 200px; margin-top: 15px;">
									   <select class="form-control" id="classify" name="classify">
									   		<option value=" "> 选择意向等级 </option>
												<option value="6">A级(有明确意向)</option>
												<option value="5">B级(可能有意向)</option>
												<option value="4">C级(明确拒绝)</option>
												<option value="3">D级(用户忙)</option>
												<option value="2">E级(拨打失败)</option>
												<option value="1">F级(无效客户)</option>
									   </select>
								 </div>
							 </div>

               <div style="clear:both;"></div>
							 
						 </div>

					 </div>
			
				 </div>
				 
				 <div style="clear:both"></div>
				 
				 <div class="modal-footer">
					 <input type="hidden" name="editsSceneId" id="editsSceneId" value="">
					<button class="btn btn-primary submit-btn" onclick="creatNewRule();" type="button">确 定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				 </div>
				 
		  </div>
						 
    </div>
 
		<script type="text/javascript">
			
			
			// 编辑意向标签列表
			function editLabel(id){
					
					var scenariosId = $("#nowsceneID").val();
			
					var url = "<?php echo url('user/Scenarios/getscene'); ?>";	
					$.ajax({
						url : url,
						dataType : "json", 
						type : "post",
						data : {'id':id,"sceneId":scenariosId},
						success: function(data){	
							
								var rule = data.data.rule;
								
								$("#editsSceneId").val(data.data.id);

								
								already.splice(0,already.length);
	
								var leng = rule.length;
								
								var label = data.data.label;
								var labelleng = label.length;
								
								var one = ['invite_succ','final_refusal'];
								var two = ['hit_problem_times','affirm_times','reject_times','speak_count','call_duration'];
								
								
	            				$('#conditionlist').find("div").remove();
	
								for(var i=0;i<leng;i++){
				
	
									already.push(rule[i].key);								
											
									var str = '<div class="form-inline rule-item">'
												+'<select class="form-control itmr mainwidth oneselect" onchange="checkedval(this);">';
												str += '<option value=" ">选择条件</option>';
												<?php if(is_array($intention) || $intention instanceof \think\Collection || $intention instanceof \think\Paginator): $i = 0; $__LIST__ = $intention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
													if('<?php echo $vo['key']; ?>' == rule[i].key){
														str += '<option value="<?php echo $vo['key']; ?>" selected><?php echo $vo['name']; ?></option>';
													}else{
														
														if(already.indexOf('<?php echo $vo['key']; ?>') == "-1"){
															str += '<option value="<?php echo $vo['key']; ?>"><?php echo $vo['name']; ?></option>';
														}
														
													}
												<?php endforeach; endif; else: echo "" ;endif; ?>
												str += '</select>';
												
											
															
													<?php if(is_array($intention) || $intention instanceof \think\Collection || $intention instanceof \think\Paginator): $i = 0; $__LIST__ = $intention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
													
													if('<?php echo $vo['key']; ?>' == rule[i].key){
														
	                           								if(one.indexOf(rule[i].key) != "-1"){
																str += '<input type="text" class="form-control itmr secwidth twoval" value="=" readonly="readonly" />';
																str += '<input type="hidden" class="form-control itmr secwidth fourval" value="<?php echo $vo['type']; ?>" />';
																str += '<select class="form-control itnuwidth itmr threeval">';
																<?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?>
																  if('<?php echo $lvo['value']; ?>' == rule[i].value){
																  	str += '<option value="<?php echo $lvo['value']; ?>" selected><?php echo $lvo['name']; ?></option>';
																  }else{
																      str += '<option value="<?php echo $lvo['value']; ?>"><?php echo $lvo['name']; ?></option>';
																  }					
																<?php endforeach; endif; else: echo "" ;endif; ?>
																str += '</select>';
															}
															else if(two.indexOf(rule[i].key) != "-1"){
																							
																	str += '<input type="hidden" class="form-control itmr secwidth fourval" value="<?php echo $vo['type']; ?>" />';
																	str += '<select class="form-control itmr secwidth twoval">';
																	<?php if(is_array($vo['ops']) || $vo['ops'] instanceof \think\Collection || $vo['ops'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['ops'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?>
																	   if('<?php echo $lvo['value']; ?>' == rule[i].op){
																			 str += '<option value="<?php echo $lvo['value']; ?>" selected><?php echo $lvo['name']; ?></option>';
																		 }else{
																			 str += '<option value="<?php echo $lvo['value']; ?>"><?php echo $lvo['name']; ?></option>';
																		 }
																	<?php endforeach; endif; else: echo "" ;endif; ?>
																	str += '</select>';
																	
																	str += '<input type="number" min="0" value="'+rule[i].value+'" class="form-control itnuwidth itmr threeval">';
																	str += '<span class="itmr inferior">次</span>';
																
															} 
															else if(rule[i].key == "say_keyword"){
																
																	str += '<input type="hidden" class="form-control itmr secwidth fourval" value="<?php echo $vo['type']; ?>" />';
																	str += '<select class="form-control itmr secwidth twoval"  style="width:100px;" >';
																	<?php if(is_array($vo['ops']) || $vo['ops'] instanceof \think\Collection || $vo['ops'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['ops'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?>
																		if('<?php echo $lvo['value']; ?>' == rule[i].op){
																			str += '<option value="<?php echo $lvo['value']; ?>" selected><?php echo $lvo['name']; ?></option>';
																		}else{
																			str += '<option value="<?php echo $lvo['value']; ?>"><?php echo $lvo['name']; ?></option>';
																		}
																	<?php endforeach; endif; else: echo "" ;endif; ?>
																	str += '</select>';
																	
																		
																	str += '<select class="form-control itnuwidth itmr threeval"  style="width:170px;" >';
																	
																	
																	for(var j=0;j<labelleng;j++){
																		if(label[j].id == rule[i].value){
																				str += '<option value="'+label[j].id+'" selected>'+label[j].label+'</option>';
																		}
																		else{
																			str += '<option value="'+label[j].id+'">'+label[j].label+'</option>';																	
																		}
																	
																	}
																	
																	str += '</select>';
										
																
															}
															else if(rule[i].key == "call_status"){
																
																		str += '<input type="hidden" class="form-control itmr secwidth fourval" value="<?php echo $vo['type']; ?>" />';
																		str += '<input type="text" class="form-control itmr secwidth twoval" value="=" readonly="readonly" />';

																		str += '<span id="disabled2select" class="itmr"></span>';
													
																							
															}
															
								
														}
														
													<?php endforeach; endif; else: echo "" ;endif; ?>
													
								
												
												
												str +='<span class="glyphicon glyphicon-trash rule-item-delete" onclick="delItem(this);" aria-hidden="true"></span>'
												+'</div>';

									$('#conditionlist').append(str);
									
									
								}

								$('#newRule').modal('show');
								
								$("#classify").val(data.data.level);	
								
								for(var i=0;i<leng;i++){

									<?php if(is_array($intention) || $intention instanceof \think\Collection || $intention instanceof \think\Paginator): $i = 0; $__LIST__ = $intention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
																					
									if('<?php echo $vo['key']; ?>' == rule[i].key){
										
										if(rule[i].key == "call_status"){
												
												  var oldnumber = new Array();
													var vl = rule[i].value;
													$.each(vl, function (i) {
																	oldnumber.push(vl[i]);
													});
														createEl();
														
														console.log(oldnumber);			

														$("#first-disabled2").selectpicker('val', oldnumber);//默认选中

															console.log(rule[i].value);				
											}
											
				
										}
										
									<?php endforeach; endif; else: echo "" ;endif; ?>
									
								}

								
						},
						error : function() {
						  //alert('审核信息失败。');
					  }
					});
				
			}

				
			//打开弹窗	
			function createNew(){
				
				 already.splice(0,already.length);

				 $("#editsSceneId").val("");
					
				 $("#classify").val(" ");	
				 $('#conditionlist').find("div").remove();
				 $('#newRule').modal('show');

			}
			
			var already = [];
		 
		  // 添加元素
		  function addcondition(){
			
			 var flag = false;
				var str = '<div class="form-inline rule-item">'
									+'<select class="form-control itmr mainwidth oneselect" onchange="checkedval(this);">';
									str += '<option value=" ">选择条件</option>';
									<?php if(is_array($intention) || $intention instanceof \think\Collection || $intention instanceof \think\Paginator): $i = 0; $__LIST__ = $intention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
										if(already.indexOf('<?php echo $vo['key']; ?>') == "-1"){
											str += '<option value="<?php echo $vo['key']; ?>"><?php echo $vo['name']; ?></option>';
											flag = true;
										}
									<?php endforeach; endif; else: echo "" ;endif; ?>
									
								//	str += '<option value="5">A类</option>';
									
									str += '</select>'
// 									+'<select class="form-control itmr secwidth">'
// 									+'<option value="5">A类</option>'
// 									+'<option value="5">A类</option>'
// 									+'</select>'
// 									+'<input type="number" class="form-control itnuwidth itmr">'
// 									+'<span class="itmr inferior">次</span>'
									str +='<span class="glyphicon glyphicon-trash rule-item-delete" onclick="delItem(this);" aria-hidden="true"></span>'
									+'</div>';
				
				if(!flag){
					alert("没有可以添加的数据。");
					return false;
				}
				
				$('#conditionlist').append(str);
				
			}
			
			//删除
			function delItem(obj){
				
			 var val =	$(obj).attr('alt');
			 
				$(obj).parent().remove();
		
				already = $.grep(already, function(value) {
				 return value != val;
				});
				
				
			}
			
			function createEl(){
				
					var newMask = document.createElement('select');
					newMask.id ="first-disabled2";
					newMask.name ="sale_ids[]";
					newMask.style.width = 'width:180px;';

					newMask.className ="selectpicker form-control itnuwidth itmr threeval";
					newMask.dataHideDisabled ="true";
					newMask.multiple ="multiple";
					newMask.title ="请选择状态";
					
					
					$('#disabled2select').append(newMask);
					
					<?php if(is_array($intention) || $intention instanceof \think\Collection || $intention instanceof \think\Paginator): $i = 0; $__LIST__ = $intention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
								
						if('<?php echo $vo['key']; ?>' == "call_status"){
							  <?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?>
					      	$('#first-disabled2.selectpicker').append("<option value=\"<?php echo $lvo['value']; ?>\"><?php echo $lvo['name']; ?></option>");
								<?php endforeach; endif; else: echo "" ;endif; ?>
						}
						
					<?php endforeach; endif; else: echo "" ;endif; ?>
					
				
					//$('#first-disabled2.selectpicker').append("<option value=\"2\">a2</option>");
					
					$('#first-disabled2').selectpicker('refresh');
					
				
					
			}
			
			//选择主要条件
			function checkedval(obj){
				
				var val = $(obj).val();
				if(val == " "){
					return false;
				}
				already.push(val);
				
				var one = ['invite_succ','final_refusal'];
				var two = ['hit_problem_times','affirm_times','reject_times','speak_count','call_duration'];
				
				
				var string = "";
				
				if(one.indexOf(val) != "-1"){
          			
					<?php if(is_array($intention) || $intention instanceof \think\Collection || $intention instanceof \think\Paginator): $i = 0; $__LIST__ = $intention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					
						if('<?php echo $vo['key']; ?>' == val){
							
							string += '<input type="text" class="form-control itmr secwidth twoval" value="=" readonly="readonly" />';
							string += '<input type="hidden" class="form-control itmr secwidth fourval" value="<?php echo $vo['type']; ?>" />';

							string += '<select class="form-control itnuwidth itmr threeval">';
							<?php if(is_array($vo['list']) || $vo['list'] instanceof \think\Collection || $vo['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?>
							  string += '<option value="<?php echo $lvo['value']; ?>"><?php echo $lvo['name']; ?></option>';
							<?php endforeach; endif; else: echo "" ;endif; ?>
							string += '</select>';

						}
						
					<?php endforeach; endif; else: echo "" ;endif; ?>
					
				}
				else if(two.indexOf(val) != "-1"){
						<?php if(is_array($intention) || $intention instanceof \think\Collection || $intention instanceof \think\Paginator): $i = 0; $__LIST__ = $intention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						
							if('<?php echo $vo['key']; ?>' == val){
								
				            	string += '<input type="hidden" class="form-control itmr secwidth fourval" value="<?php echo $vo['type']; ?>" />';
								string += '<select class="form-control itmr secwidth twoval">';
								<?php if(is_array($vo['ops']) || $vo['ops'] instanceof \think\Collection || $vo['ops'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['ops'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?>
									string += '<option value="<?php echo $lvo['value']; ?>"><?php echo $lvo['name']; ?></option>';
								<?php endforeach; endif; else: echo "" ;endif; ?>
								string += '</select>';
								
								string += '<input type="number" min="0" class="form-control itnuwidth itmr threeval">';
								string += '<span class="itmr inferior">次</span>';
	
							}
							
						<?php endforeach; endif; else: echo "" ;endif; ?>
				}
				else if(val == "say_keyword"){
					
					var scenariosId = $("#nowsceneID").val();
			
					var href = "<?php echo url('user/Scenarios/getLabel'); ?>";
	
					$.ajax({
						type: "POST",
						dataType:'json',
						url: href,
						cache: false,
						async:false,
						data: {
							"sceneId":scenariosId,
						},
						success: function(data) {
							
							if (data.code == 0) {
								
								var label = data.data;
								var leng = label.length;
								
								
								<?php if(is_array($intention) || $intention instanceof \think\Collection || $intention instanceof \think\Paginator): $i = 0; $__LIST__ = $intention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							
									if('<?php echo $vo['key']; ?>' == val){
										string += '<input type="hidden" class="form-control itmr secwidth fourval" value="<?php echo $vo['type']; ?>" />';
										string += '<select class="form-control itmr secwidth twoval"  style="width:100px;" >';
										<?php if(is_array($vo['ops']) || $vo['ops'] instanceof \think\Collection || $vo['ops'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['ops'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?>
											string += '<option value="<?php echo $lvo['value']; ?>"><?php echo $lvo['name']; ?></option>';
										<?php endforeach; endif; else: echo "" ;endif; ?>
										string += '</select>';
										
										string += '<select class="form-control itnuwidth itmr threeval"  style="width:170px;" >';
										
										
										for(var i=0;i<leng;i++){
											
											string += '<option value="'+label[i].id+'">'+label[i].label+'</option>';
										}
										
										string += '</select>';
										
										
									}
									
								<?php endforeach; endif; else: echo "" ;endif; ?>
								
							
								
							}else{
								console.log(data.msg);

							}
					
						},
						error: function(data) {
							 //alert("提交失败");
						}
			 		})  
					
							
							/*
								if('<?php echo $vo['key']; ?>' == val){
									string += '<input type="hidden" class="form-control itmr secwidth fourval" value="<?php echo $vo['type']; ?>" />';
									string += '<select class="form-control itmr secwidth twoval"  style="width:100px;" >';
									<?php if(is_array($vo['ops']) || $vo['ops'] instanceof \think\Collection || $vo['ops'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['ops'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?>
										string += '<option value="<?php echo $lvo['value']; ?>"><?php echo $lvo['name']; ?></option>';
									<?php endforeach; endif; else: echo "" ;endif; ?>
									string += '</select>';
									
									string += '<select class="form-control itmr secwidth twoval"  style="width:100px;" >';
									<?php if(is_array($vo['ops']) || $vo['ops'] instanceof \think\Collection || $vo['ops'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['ops'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lvo): $mod = ($i % 2 );++$i;?>
										string += '<option value="<?php echo $lvo['value']; ?>"><?php echo $lvo['name']; ?></option>';
									<?php endforeach; endif; else: echo "" ;endif; ?>
									string += '</select>';
									
									string += '<input type="text" class="form-control itnuwidth itmr threeval" placeholder="请填写关键词,关键词之间用中文逗号隔开" aria-hidden="true"' 
									+'data-toggle="tooltip" data-placement="top" title="关键词之间用中文逗号隔开。" style="width:170px;" />';
						
								}
								*/
							
				}
				else if(val == "call_status"){
						<?php if(is_array($intention) || $intention instanceof \think\Collection || $intention instanceof \think\Paginator): $i = 0; $__LIST__ = $intention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						
							if('<?php echo $vo['key']; ?>' == val){
								string += '<input type="hidden" class="form-control itmr secwidth fourval" value="<?php echo $vo['type']; ?>" />';
								string += '<input type="text" class="form-control itmr secwidth twoval" value="=" readonly="readonly" />';

                                string += '<span id="disabled2select" class="itmr"></span>';
					
							}
							
						<?php endforeach; endif; else: echo "" ;endif; ?>
				}


				$(obj).parent().find(".secwidth").remove();
				$(obj).parent().find(".itnuwidth").remove();
				$(obj).parent().find(".inferior").remove();
				
				$(obj).parent().find(".glyphicon").attr('alt',val);

	
				$(obj).after(string);
				
				if(val == "call_status"){
				
				   	 createEl();
				

				}
				
				// console.log(val);
				// console.log(already);
			}
		 
			//检查表单的必填项
			function creatNewRule(){
				
				 $('#newRule').modal('hide');

					var itemList = $("#conditionlist").find(".rule-item");
					
					var ruler = [];
					var name = [];
					$.each(itemList , function(i, n){
						 
						 var one = $(n).find('.oneselect').val();
						 var two = $(n).find('.twoval').val();
						 var three = $(n).find('.threeval').val();
						 var four = $(n).find('.fourval').val();

						 if(one == 'call_status'){
							 
							 three = $("#first-disabled2").selectpicker('val');

						 }
						 var temp = {};
						 temp.one = one; 
						 temp.two = two; 
						 temp.three = three; 
						 temp.four = four; 
						 ruler.push(temp);
						 
						 var onetxt = $(n).find('.oneselect').find("option:selected").text();
						 var twotxt = two;
						 var threetxt = three;
						 
						if(one == 'say_keyword'){
							 
							 twotxt = $(n).find('.twoval').find("option:selected").text();

						 }
						 
						 if(one == 'invite_succ' || one == 'final_refusal' || one == 'call_status' || one == 'say_keyword'){
							 
							 threetxt = $(n).find('.threeval').find("option:selected").text();
 
						 }
						
						 var tname = {};
						 tname.onetxt = onetxt; 
						 tname.twotxt = twotxt; 
						 tname.threetxt = threetxt; 
						 name.push(tname);
						 
						//console.log(onetxt);
	
				   	//	alert( "Name: " + i + ", Value: " + n );
					});
					
					var classify = $("#classify").val();
					if(!classify){
						alert("意向等级标签不能为空"); 
						return false; 
					}
					

					var sceneId = $("#editsSceneId").val();
				 
					var scenariosId = $("#nowsceneID").val();
			
					var href = "<?php echo url('user/Scenarios/addIntention'); ?>";
	
					$.ajax({
						 type: "POST",
						 dataType:'json',
						 url: href,
						 cache: false,
						 data: {
							 "ruler":ruler,
							 "classify":classify,
							 "scenarios_id":scenariosId,
							 "sceneId":sceneId,
							 "name":name
							 },
						 success: function(data) {
							if (data.code == 0) {
								console.log(data);

								 // alert(data.msg);
							   $('#newRule').modal('hide');
								 //location.reload();
								 getLabelList(0);
								
							}else{
								console.log(data.msg);

								// alert(data.msg);

							}
					
						 },
						 error: function(data) {
							 //alert("提交失败");
						 }
			 		})  
			}


		
		</script>
		
   
</div>
	 

 <!--  编辑默认等级  -->
 
  
<div class="modal fade" id="checkpage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  
	  <div class="modal-dialog">
			
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title"> 编辑默认规则</h4>
				 </div>
				 <div class="modal-body">
					 
						<div class="create-modal-body">
							<div class="add-modal-wrap">
								
								<div class="form-group">
									以上规则均不满足时，将客户意向标签设置为
								</div>
							
								<div class="form-group">
									
										<select class="form-control textwidth" id="dftradeType" name="dftradeType">
											<option value=" "> 选择意向等级 </option>
											<option value="6">A级(有明确意向)</option>
											<option value="5">B级(可能有意向)</option>
											<option value="4">C级(明确拒绝)</option>
											<option value="3">D级(用户忙)</option>
											<option value="2">E级(拨打失败)</option>
											<option value="1">F级(无效客户)</option>
										</select>
									
								
								</div>
             </div>
	         </div>
				

				 </div>
				 <div style="clear:both"></div>
				 <div class="modal-footer">
             <div class="form-group" style="text-align: center;">
             		<input type="hidden" name="scenariosId" id="scenariosId" value="">
             		<button class="btn btn-primary submit-btn" onclick="confirmSure();" type="button">确 定</button>
             		<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
             </div>
				 </div>

		  </div>
						 
    </div>
 
		<script type="text/javascript">
				
			function showdefault(){
        
        $('#dftradeType').val($('#dflevelNum').val());
				$('#checkpage').modal('show');

			}
		 
		 
		 //检查表单的必填项
			function confirmSure(){
				//	$('#checkpage').modal('hide');
				//	return false; 
			
				 var dftradeType = $('#dftradeType').val();
				 var nowsceneID = $("#nowsceneID").val();
				 
				 var href = "<?php echo url('user/Scenarios/updateDftype'); ?>";

				 $.ajax({
						 type: "POST",
						 dataType:'json',
						 url: href,
						 cache: false,
						 data: {"sceneId":nowsceneID,"level":dftradeType},
						 success: function(data) {
							if (data.code == 0) {
							
									$('#checkpage').modal('hide');
									 getLabelList(0);
								
							}else{
								 alert(data.msg);

							}
					
						 },
						 error: function(data) {
							 alert("提交失败");
						 }
				 })  
			}


		
		</script>
		
   
</div>
	 
 
 
 <!-- 新建节点 -->
  
 <div class="modal fade" id="flownode" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
   
 	  <div class="modal-dialog modal-sm" style="width: 360px;">
 			
 			<div class="modal-content">
 					<div class="modal-header">
 							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 								 <span aria-hidden="true">×</span>
 							</button>
 							<h4 class="modal-title">添加场景节点</h4>
 				 </div>
 				 <div class="modal-body pagelists">
 					 
 							
 						<form id="flownoteform" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
 					
 								<div class="form-group">
 									<label class="col-lg-4 control-label">场景节点名称：</label>
 									<div class="col-lg-8 col-sm-8">
 										 <input type="text" class="form-control" placeholder="请输入场景节点名称" name="flowname" id="flowname" />
 									</div>
 								</div>
								
								<div class="form-group" id="sctype" style="display: none;">
									<label class="col-lg-4 control-label">场景节点类型：</label>
									<div class="col-lg-8 col-sm-8">
										<select class="form-control" id="scenetype" name="scenetype">
											<option value="0">普通场景节点</option>
											<option value="1">公共场景节点</option>
										</select>
									</div>
								</div>
								
 					
 								 <div class="modal-footer" style="text-align: center;">
 										<input type="hidden" name="flowId" id="flowId" value="">
 										<button class="btn btn-primary submit-btn" onclick="formFlow();" type="button">确 定</button>
 										<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
								</div>
 			
 				
 					 </form>
 					 
 						
 				 </div>
 				 <div style="clear:both"></div>
 				
 		 </div>
 						 
     </div>
  
 		<script type="text/javascript">
 				
 			function newflowModal(id){
 				 
 				 if(id){
					 $('#sctype').css("display","none"); 
 							var url = "<?php echo url('user/Scenarios/getFlowInfo'); ?>";	
 						 $.ajax({
 								url : url,
 								dataType : "json", 
 								type : "post",
 								data : {'id':id},
 								success: function(data){	
											if (data.code == 0) {
												
												$("#flowname").val(data.data.name);
												$("#scenetype").val(data.data.type);
												$("#flowId").val(data.data.id);
												
											}else{
													alert(data.msg);
					
											}
 									
 										
 										 $('#flownode').modal('show');
 								},
 								error : function() {
 									alert('获取信息失败。');
 								}
 							});
 					
 				 }
 				 else{

						$("#flowname").val("");
						$("#scenetype").val(0);
						$("#flowId").val("");
						$('#sctype').css("display","block"); 
						$('#flownode').modal('show');
 						 
 				 }
 				
 		 
 			}
 		 
 		 
 		 //检查表单的必填项,提交流程表单
 			function formFlow(){
 
 					var name = $("#flowname").val();
 					if(!name){
 						alert("流程名不能为空"); 
 						return false; 
 					}
 					var scenetype = $("#scenetype").val();

 				 var flowId = $("#flowId").val();
				 var sceneId = $("#nowsceneID").val();

 
 				 var href = "<?php echo url('user/Scenarios/addflowNote'); ?>";
 				
 				 
 				 $.ajax({
 						 type: "POST",
 						 dataType:'json',
 						 url: href,
 						 cache: false,
 						 data: {"name":name,"flowId":flowId,"sceneId":sceneId,"type":scenetype},
 						 success: function(data) {
 							if (data.code == 0) {
 								  
 									$('#flownode').modal('hide');
 							  	getNoteList();
 							}else{
 								 alert(data.msg);
 
 							}
 					
 						 },
 						 error: function(data) {
 							 alert("提交失败");
 						 }
 				 }) 
					
					
					
 			}
 
 
 		
 		</script>
 		
    
 </div> 

 
 	 <!-- 复制话术 -->
	 
 	<div class="modal fade" id="Replicas" tabindex="1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
 	  
 		  <div class="modal-dialog" style="width:360px;">
 				
 				<div class="modal-content">
 					
 						<div class="modal-header">
 								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 									 <span aria-hidden="true">×</span>
 								</button>
 								<h4 class="modal-title">复制话术</h4>
 					  </div>
 						
 					 <div class="modal-body pagelists">
 						 
 								
 							<form id="copyScene" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
							
									<div class="form-group" id="breakContent" style="display: block;">
										<label class="col-lg-3 control-label">新话术名称：</label>
										<div class="col-lg-6 col-sm-8">
											<input class="form-control" id="newSName" name="newSName" style="width: 250px;;" placeholder="新话术名称" />
										</div>
									</div>
							
 									<div class="form-group">
										<label class="col-lg-3 control-label">复制到：</label>
 											<div class="col-lg-4 col-sm-8">
 												<select class="form-control" id="targetObj" name="targetObj" style="width: 250px;;">
												<option value=" ">复制到</option>
										         <?php if(is_array($subordinate) || $subordinate instanceof \think\Collection || $subordinate instanceof \think\Paginator): $sk = 0; $__LIST__ = $subordinate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$svo): $mod = ($sk % 2 );++$sk;?>
												   <option value="<?php echo $svo['id']; ?>"><?php echo $svo['username']; ?></option>
 											     <?php endforeach; endif; else: echo "" ;endif; ?>
 												</select>
 											</div>
 								 </div>
 				
 					
 						 </form>
 						 
 							
 					 </div>
 					 <div style="clear:both"></div>
					 
					 <div class="modal-footer">
					 	<input type="hidden" name="ThinkTankId" id="ThinkTankId" value="">
					 	<button class="btn btn-primary submit-btn" onclick="copySubmit();" type="button">确 定</button>
					 	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					 </div>
 					
 			 </div>
 							 
 	    </div>
 	 
 			<script type="text/javascript">
 					
 				function copyshow(){

 						$("#newSName").val("");
 					
						$("#targetObj").val(" ");
					
						$('#Replicas').modal('show');
 	 
 				}
 			 
 			 
 			 //检查表单的必填项
 				function copySubmit(){
 					
 		
 					var targetObj = $("#targetObj").val();
 					var newSName = $("#newSName").val();
     				var sceneId = $("#nowsceneID").val(); 
					if(!newSName || newSName == ""){
						alert("话术名称不能为空。");
						return false;
					}
					
					if(!targetObj || targetObj == " "){
						alert("请选择要复制的话术。");
						return false;
					}

 
 					var url = "<?php echo url('user/Scenarios/copyScene'); ?>";	
 						 $.ajax({
 										url : url,
						type : "post",
						data : {
							'memberId':targetObj,
							'newSName':newSName,
							'sceneId':sceneId
						},
 										success: function(data){	
 											
 											$('#Replicas').modal('hide');
 
 											if(data.code == 1){
 												alert(data.msg);
 											}else{
 												location.reload();
 											}
 										
 										},
 										error : function() {
 											alert(data.msg);
 										}
 							});
 					
 
 					 
 				}
 
 
 			
 			</script>
 			
 	   
 	  </div>
 	 

 
 
   <script id="tpl-WorkTime" type="text/html">
     <div class="pa" id='{{id}}' style='top:{{top}}px;left:{{left}}px'>
       <div ondblclick="gotojumpNote(this);" onmousedown="downs(this);" dataType="{{type}}" dataid="{{key}}" class="panel panel-default panel-node panel-info">
         <div id='{{id}}-heading' data-id="{{id}}" class="panel-heading">
 		        <i class="fa fa-share" aria-hidden="true"></i>
						<span class='nodeName'>{{name}}</span>
           <span class="delete-node pull-right" data-type="deleteNode" data-id="{{id}}">X</span>
         </div>
         <ul class="list-group">
           <li id="{{id}}-onWorkTime" data-pid="{{id}}" class="list-group-item panel-node-list nodeContent">{{content}}
           </li>
           <li id="{{id}}-offWorkTime" data-pid="{{id}}" class="list-group-item panel-node-list">下一步：{{nextName}}
           </li>
         </ul>
       </div>
     </div>
   </script>
 
   <script id="tpl-Menu" type="text/html">
     <div class="pa" id='{{id}}' style='top:{{top}}px;left:{{left}}px'>
       <div ondblclick="gotocommonNode(this);" onmousedown="downs(this);" dataType="{{type}}" dataid="{{key}}" class="panel panel-default panel-node panel-info">
         <div id='{{id}}-heading' data-id="{{id}}" class="panel-heading"><i class="fa fa-navicon" aria-hidden="true"></i>
				   <span class='nodeName'>{{name}}</span>
           <span class="delete-node pull-right" data-type="deleteNode" data-id="{{id}}">X</span>
         </div>
         <ul class="list-group">
           <li id="{{id}}-noinput" data-pid="{{id}}" class="list-group-item panel-node-list nodeContent">{{content}}
           </li>
           <li id="{{id}}-nomatch" data-pid="{{id}}" class="list-group-item panel-node-list choicesList" style="padding-left: 5px;padding-right: 5px;">
 		        {{#choices}}
 
 				  <div id="key-{{flow_id}}-{{id}}" data-pid="{{id}}" class="actionli">{{name}}</div>  
 				{{/choices}}

 
           </li>
          
           
         </ul>
       </div>
     </div>
   </script>
 
 


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
