<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"/www/wwwroot/web/application/user/view/plan/new_index.html";i:1551974690;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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

.messageinfo{
 text-align:right;
}
.infotable tr td{
 padding:5px;
}
.textwidth{
	width:250px;
}
.fl {
    float: left;
}
.fr {
    float: right;
}
.ant-btn{
    border-color: #1f8cec;
    color: #1f8cec;
}



.btn-default .caret {
    border-top-color: #1f8cec;
}

.content {
    display: -ms-flexbox;
    display: flex;
  /*  height: 100%; 
   	height: calc(100vh - 285px);*/
   	 /* 	height: calc(100vh - 152px); */
    -ms-flex: 1 1;
    flex: 1 1;
		margin-top: 10px;
    margin-left: -23px;
    margin-right: -14px;
}
#content-wrapper {
    padding: 15px 15px 14px 15px;
}

.ant-spin-container {
    position: relative;
		height: 100%;
}

.dm-task-list {
   /* width: 240px; */
    background: #fff;
    padding: 10px;
    border-radius: 3px;
    overflow-y: auto;
   /* height: 100%; */
		height: calc(100vh - 152px);
}

.dm-task-list .task-item, .dm-task-list .task-item-active {
    cursor: pointer;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    position: relative;
    padding-left: 10px;
    border-radius: 3px;
		margin-bottom: 10px;
}

.dm-task-list .task-item-active {
    background: #fff;
    border: 1px solid #108ee9;
}
.dm-task-list .task-item-active .header, .dm-task-list .task-item .header {
    -ms-flex-pack: justify;
    justify-content: space-between;
    word-break: break-all;
}
.dm-task-list .task-item-active .header h4, .dm-task-list .task-item .header h4 {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding-right: 5px;
    font-size: 14px;
    color: rgba(0,0,0,.75);
}
.dm-task-list .task-item-active .header .component-base-tag, .dm-task-list .task-item .header .component-base-tag {
    -ms-flex: 0 0 60px;
    flex: 0 0 60px;
}
.component-base-tag {
	margin-top: 4px;
  display: inline-block;
}


.component-base-tag .tag-type-danger.tag-ghost {
    color: #f04134;
}
.component-base-tag .tag.tag-ghost {
    background-color: transparent;
}
.component-base-tag .tag-size-default {
    height: 22px;
    line-height: 20px;
    font-size: 14px;
    padding: 0 8px;
}
.component-base-tag .tag-type-danger {
    background-color: #f04134;
    border-color: #f04134;
}
.component-base-tag .tag {
    color: #fff;
    display: inline-block;
    border-radius: 3px;
    border-width: 1px;
    border-style: solid;
}
.ant-tag, .ant-tag a, .ant-tag a:hover {
    color: rgba(0,0,0,.65);
}
.ant-tag {
    display: inline-block;
    line-height: 20px;
    height: 22px;
    padding: 0 8px;
    border-radius: 4px;
    border: 1px solid #e9e9e9;
    background: #f3f3f3;
    font-size: 12px;
    -webkit-transition: all .3s cubic-bezier(.215,.61,.355,1);
    -o-transition: all .3s cubic-bezier(.215,.61,.355,1);
    transition: all .3s cubic-bezier(.215,.61,.355,1);
    opacity: 1;
    margin-right: 8px;
    cursor: pointer;
    white-space: nowrap;
}

.ant-tag-text {
    font-weight: 300;
}

.component-base-tag .tag-type-danger.tag-ghost {
    color: #f04134;
}
.dm-task-list p {
    margin-left: 0px;
    font-size: 12px;
    color: rgba(0,0,0,.43);
}
.progress{
	width:50%;
}
.prg{
	margin-left: 0px;
	/* margin-right: 8px; */
  margin-top: 5px;
}
.dm-task-list .tipgr{
	margin-left: 6px;
	line-height: 7px;
}

/* 下面是右边的 */
.dm-task-detail {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex: 1 1;
    flex: 1 1;
    margin-left: 2;
    position: relative;
    height: 100%;
    overflow: auto;
    background-color: #fff;
}
.ant-spin-nested-loading {
    position: relative;
}
.dm-task-detail .header {
    padding: 12px;
    background-color: #fff;
    padding-bottom: 15px;
    border-bottom: 1px solid #e0e0e0;
}
.container-fluid{
    background-color: #f3f3f3;
}
.headcontent {
    background-color: #fff;
    margin-left: -15px;
    margin-right: -15px;
    margin-bottom: 12px;
  
    padding: 10px;
}
.htitle{
	flex: 1 1 auto;
	padding-right: 5px;
	font-size: 18px;
	color: rgba(0,0,0,.75);
}
.header-info > .component-base-tag{
	margin-top: 0px;
}
.header .header-top>.header-info p {
    font-size: 12px;
    color: rgba(0,0,0,.55);
}
.button-list{
	text-align: right;
}
.marginr10{
	 margin-right: 10px;
}
.dm-task-detail .header .body-tips {
    font-size: 12px;
    color: #f04134;
}
.detail-info {
    margin-top: 20px;
}
.detail-info .section {
    font-size: 14px;
    color: rgba(0,0,0,.65);
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.detail-info .section .section-item {
    height: 20px;
    margin-right: 9px;
    margin-bottom: 10px;
    padding: 0 8px;
    background: #f5f5f5;
    border-radius: 2px;
}
.dm-task-detail .body {
    background-color: #fff;
    padding: 20px;
}
.dm-task-detail > .body > .status {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding-bottom: 10px;
    border-bottom: 1px solid #e0e0e0;
}
.status .task-status {
    width: 50%;
    max-width: 400px;
}
.status .answer-status {
    width: 50%;
}
.dm-task-detail .body h5 {
    font-size: 14px;
    color: rgba(0,0,0,.85);
    margin-bottom: 15px;
}
.status .task-status .status-items {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: distribute;
    justify-content: space-around;
    padding-right: 20px;
}
.status .task-status .status-items li {
    text-align: center;
    padding-top: 15px;
}
.status .answer-status .answer-state {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
}
.status .answer-status .answer-state>.row {
    display: -ms-flexbox;
    display: flex;
    padding: 15px 0;
    border-bottom: 1px solid #e0e0e0;
}
.status .answer-status .answer-state>.row:last-child {
    border-bottom: none;
}
.status .answer-status .answer-state>.row>.row-item {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex: 1 1;
    flex: 1 1;
    border-right: 1px solid #e0e0e0;
}
.status .answer-status .answer-state>.row:first-child>.row-item:first-child>b {
    color: #1f8cec;
}
.status .answer-status .answer-state>.row>.row-item>b {
    font-weight: 500;
    font-size: 12px!important;
    color: rgba(0,0,0,.75);
}
.status .answer-status .answer-state>.row>.row-item>span {
    margin-top: 5px;
    font-size: 12px;
    color: rgba(0,0,0,.65);
}
.status h5 span {
    margin-left: 18px;
    font-size: 12px;
    color: rgba(0,0,0,.65);
    vertical-align: -2px;
}

.dm-task-detail .body .detail-statics .vertical-line {
    -ms-flex-item-align: center;
    align-self: center;
    max-width: 1px;
    min-width: 1px;
    height: 121px;
    margin: 0 30px;
    background: rgba(0,0,0,.09);
}
.status {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding-bottom: 10px;
    border-bottom: 1px solid #e0e0e0;
}
.dm-task-detail .body .detail-statics {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
/*    margin: 20px 0; */
    padding-right: 15px;
}
.itempgl{
	float:left;
	width:32%;
}
 .progress-label {
    min-width: 110px;
		font-size: 12px;
    color: rgba(0,0,0,.75);
    -ms-flex: 0 0 70px;
    flex: 0 0 70px;
}
.ant-progress-text {
    width: 2em;
    text-align: left;
    font-size: 0.5em;
    margin-left: .75em;
    vertical-align: middle;
    display: inline-block;
		color: rgba(0,0,0,.45);
}
.margintop6{
	margin-top: 6px;
	width: 75%;
}
.wth7{
	width: 70%;
}
.customer-focus {
    border-top: 1px solid #e0e0e0;
    border-bottom: 1px solid #e0e0e0;
    padding-top: 15px;
    padding-bottom: 20px;
}
.customer-focus div {
    max-height: 54px;
    overflow-y: hidden;
}
.customer-focus p {
   font-size: 14px;
}
.dm-task-detail .records .component-base-button {
    position: absolute;
    top: 2px;
    right: 20px;
}

.dm-task-detail .records {
    margin-top: 10px;
    padding: 0 20px;
    position: relative;
}
.component-base-button {
    display: inline-block;
}
.nav-tabs {
    background: #ffffff;
    border-bottom: 1px solid #c1c1c1;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    border: 0px solid #ddd; 
		color: #1f8cec;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
    border-bottom: 1px solid #03a9f4;
}
.table-responsive .ant-table-thead>tr>th {
    font-size: 14px;
    font-weight: 400;
    background-color: rgba(223,234,249,.4);
}
.component-page-empty > .empty-tip.line {
      text-align: center;
}
.component-page-empty .empty-tip.line .pic {
    width: 130px;
    height: 130px;
    margin-right: 10px;
}
.dropdown-menu>li>a {
    color: #000;
}

</style>


<link href="__PUBLIC__/plugs/bsdatepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/plugs/bsdatepicker/js/bootstrap-datepicker.js"></script>

<link href="__PUBLIC__/plugs/timepicker/bootstrap-timepicker.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/plugs/timepicker/bootstrap-timepicker.js"></script>
<!-- <script src="__PUBLIC__/plugs/datepicker/js/foundation-datepicker.zh-CN.js"></script> -->

<link href="__PUBLIC__/plugs/datepicker/css/foundation-datepicker.min.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/plugs/datepicker/js/foundation-datepicker.js"></script>
<script src="__PUBLIC__/plugs/datepicker/js/foundation-datepicker.zh-CN.js"></script>


<script type="text/javascript" src="__PUBLIC__/plugs/webuploader/webuploader.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/plugs/webuploader/webuploader.custom.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugs/webuploader/webuploader.css">

<script type="text/javascript" src="__PUBLIC__/plugs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/plugs/bootstrap-select/dist/css/bootstrap-select.min.css" />


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
.statusSelect {
		line-height: 30px;
		float: left;
}
.ivu-form-item-content {
    position: relative;
    line-height: 32px;
    font-size: 12px;
}
.mr15 {
    margin-right: 15px;
}
.itemtime {
    position: relative;
    line-height: 32px;
    font-size: 12px;
}
.ivu-tag-checked {
    background: #f1f1f1;
}
.mt15 {
    margin-top: 15px;
}
.mb15 {
    margin-bottom: 15px;
}
.ivu-tag {
    display: inline-block;
    height: 22px;
    line-height: 22px;
    margin: 2px 4px 2px 0;
    padding: 0 8px;
    border: 1px solid #e9eaec;
    border-radius: 3px;
    background: #f7f7f7;
    font-size: 12px;
    vertical-align: middle;
    opacity: 1;
    overflow: hidden;
    cursor: pointer;
}
:root .ivu-tag .ivu-icon-ios-close-empty {
    font-size: 14px;
}
.ivu-tag .ivu-icon-ios-close-empty {
    display: inline-block;
    font-size: 14px;
    font-size: 20px\9;
    transform: scale(1.42857143) rotate(0deg);
    cursor: pointer;
    margin-left: 8px;
    color: #666;
    opacity: .66;
    position: relative;
    top: -1px;
		width: 7px;
    height: 14px;
}

.ivu-icon {
    display: inline-block;
    font-family: Ionicons;
    speak: none;
    font-style: normal;
    font-weight: 400;
    font-variant: normal;
    text-transform: none;
    text-rendering: auto;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.ivu-tag-text {
    color: #495060;
}

.dropdown-menu>li>a>span{
    color: #000;
}

.btn-group > .btn-default{
    background-color: #fff;
    border: 1px solid #ccc;
    color: #555;
}


 .dropup > .btn-default{
   background-color: #fff;
   border: 1px solid #ccc;
   color: #555;
}

.dropup > .btn-default:hover, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
 background-color: #fff;
 border: 1px solid #ccc;
}
.bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active, .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
    color: #555;
}
.dropup > .btn-default.active.focus, .btn-default.active:focus, .btn-default.active:hover, .btn-default:active.focus, .btn-default:active:focus, .btn-default:active:hover, .open>.dropdown-toggle.btn-default.focus, .open>.dropdown-toggle.btn-default:focus, .open>.dropdown-toggle.btn-default:hover {
    color: #555;
    background-color: #fff;
    border: 1px solid #ccc;
}
.bootstrap-select.btn-group .dropdown-toggle .filter-option {
  color: #555;
}
 
.checkbox-wrapper{
	 margin-right: 20px;
}
.word{
	  line-height: 40px;
    font-size: 14px;
}
.bootstrap-select.form-control:not([class*=col-]) {
     width: 250px;
}

.dropdown-menu{
	min-width:0;
}

</style>
  
 
<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix">	

		 
		<div class="container-fluid">
		
		
			<div class="row headcontent">
			
				<div class="col-md-12 form-inline">
						
					<div class="pull-left">
						<!--<h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-icon"></i>我的任务</h1>-->
						<div class="pull-right">

							<form class="form-inline" method="get" role="form">
								
								<div class="form-group">
									<input type="text" class="form-control" style="min-width:120px;" id="taskName" name="taskName" placeholder="请输入任务名称" />
								</div>&nbsp;&nbsp;
		
								<div class="form-group">
									<div class="col-lg-12 col-sm-12">
										<input type="text" style="width:167px;" placeholder="任务创建时间" class="form-control" id="createTime" name="createTime" value="" readonly="" />
									</div>
									<script>
										$('#createTime').fdatepicker({
											format: 'yyyy-mm-dd',
										});
									</script>
								</div>&nbsp;&nbsp;
								
								<div class="form-group">
								    
								    <div class="col-lg-9 col-sm-9">
								    	
								    	<select name="status" id="status" class="form-control">
											<option value="" selected="">选择任务状态</option>
											<option value="0">暂停</option>
											<option value="1">开启</option>
											<option value="2">人工暂停</option>	
											<option value="3">停止</option>
											<option value="4">欠费</option>
										</select>
										
								    </div>
								</div>&nbsp;&nbsp;
							
								<button class="btn btn-primary" type="submit">搜索</button>
							
		
							</form>
				       				   
				           	 
						</div>  
						
				    </div>
	
					<div class="pull-right">
						
						<button type="button" class="btn btn-primary" onclick="refurbish();" style="margin-right: 10px;">
							<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span><span>刷新</span>
						</button>
	
						<button type="button" class="btn btn-primary" onclick="addNewPlan();" style="margin-right: 10px;">
							<i class="fa fa-plus-circle fa-lg"></i><span>新建任务</span>
						</button>

						<button type="button" class="btn btn-default ant-btn" onclick="stopAll();" >
							<span>暂停所有任务</span>
						</button>
						
					</div>
					
				</div>
								
			</div>
			
			<div class="row content">
				
				<div class="col-xs-3 col-md-2">
					
					<div class="ant-spin-container">
						
						<div class="dm-task-list">
								 
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>

								<div class="task-item" id="taskItem<?php echo $vo['task_id']; ?>" title="<?php echo $vo['task_name']; ?>" onclick="gettask(this,<?php echo $vo['task_id']; ?>,'<?php echo $vo['task_name']; ?>');">
									
									<div> 
									   <input id="list<?php echo $k; ?>" type="hidden" class="Idlist" value="<?php echo $vo['task_id']; ?>" />
										<div class="header">
											
											<h4 class="fl taskName"><?php echo $vo['task_id']; ?> &nbsp;<?php echo $vo['task_name']; ?></h4>
											<div class="component-base-tag fr">
												
												<?php switch($vo['status']): case "0": ?>
														<div data-show="true" class="ant-tag tag tag-type-danger tag-size-default tag-ghost">
															<span class="ant-tag-text">暂停</span>
														</div>
													<?php break; case "1": ?>
													
														<div data-show="true" class="ant-tag tag tag-type-danger tag-size-default tag-ghost">
															<span class="ant-tag-text">启用</span>
														</div>
													<?php break; case "2": ?>
														<div data-show="true" class="ant-tag tag tag-type-danger tag-size-default tag-ghost">
															<span class="ant-tag-text">人工暂停</span>
														</div>
													<?php break; case "4": ?>
													
														<div data-show="true" class="ant-tag tag tag-type-danger tag-size-default tag-ghost">
															<span class="ant-tag-text">线路欠费</span>
														</div>
													<?php break; default: ?>
														<div data-show="true" class="ant-tag tag tag-type-danger tag-size-default tag-ghost">
															<span class="ant-tag-text">终止</span>
														</div>
													
												<?php endswitch; ?>
												
												
											</div>

										</div>
										
										<div style="clear: both;"></div>

										<div class="row prg">
												<div class="progress fl proleft">
													<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $vo['percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $vo['percent']; ?>%">
														<span class="sr-only"><?php echo $vo['percent']; ?>% Complete (danger)</span>
													</div>
												</div>
												<p class="fl tipgr">进度<?php echo $vo['Molecular']; ?>/<?php echo $vo['denominator']; ?></p>
										</div>
										
										<div class="info">
											<p>任务类型：智能外呼</p>
											<p><?php echo $vo['member_user']; ?>创建于<?php echo $vo['create_datetime']; ?></p>
										</div>
									
									</div>
									
								</div>
				
							<?php endforeach; endif; else: echo "" ;endif; ?>

					
						</div>
					
					</div>
					
        		</div>
        		
        	
				<div class="col-xs-15 col-md-10 dm-task-detail">
					
					<!-- 当前任务的ID -->
					<input type="hidden" name="nowTaskID" id="nowTaskID" value="" />
					
					<div class="ant-spin-nested-loading" id="nestedloading">
						<div class="ant-spin-container" id="spinContainer">
							
							<div class="header">
								
								<div class="header-top">
										
										<div class="header-info pull-left">
											<span class="fl htitle" id="righttitle"></span>
										</div>
										
										<div class="button-list pull-right">
											<div class="btn-group" role="group" aria-label="...">
												
												<button type="button" class="btn btn-primary marginr10" id="aidieru" onclick="startTask(1);"><span>开始任务</span></button>
												
												<button type="button" id="edit-opt" class="btn btn-primary marginr10" onclick="editNewPlan();">
													<span>编辑任务</span>
												</button>
												
												
												
												<div class="dropdown marginr10 fl">
													<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
													导入
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
														<li><a href="javascript:void(0);" onclick="addNew(0);">单个导入</a></li>
														<li><a href="javascript:void(0);" onclick="loadexcel();">批量导入</a></li>
													</ul>
												</div>
												
												<div class="dropdown marginr10 fl">
													<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
													导 出
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
														<li><a href="javascript:void(0);" onclick="outexcel();">导出全部号码</a></li>
														<li><a href="javascript:void(0);" onclick="outRecord('already');">导出已呼号码</a></li>
														<li><a href="javascript:void(0);" onclick="outRecord('no');">导出未呼号码</a></li>
													</ul>
												</div>
												
											<!-- <div class="form-group">
												  	 <button class="btn btn-primary" type="button" onclick="delfun('all');">删除所有号码</button>
												  </div>&nbsp;&nbsp;
												  
												 <div class="form-group"> 
											      	<button class="btn btn-primary" type="button" ></button>   
										         </div>&nbsp;&nbsp;
										         
										         <div class="form-group"> 
											        <button class="btn btn-primary" type="button" onclick="outRecord('no');"></button>
										         </div>&nbsp;&nbsp;
												
												-->
						
												
												<!--
												<button type="button" class="btn btn-primary marginr10" onclick="outexcel();"><span>导 出</span></button>
												-->
												
												<div class="dropdown fr">
													<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
													更多操作
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">														
														<li><a href="javascript:void(0);" id="end-opt"  style="padding-left: 10px;" onclick="startTask(3);">终止任务</a></li>
														<li><a href="javascript:void(0);" id="del-opt"  style="padding-left: 10px;" onclick="startTask(-1);">删除任务</a></li>
														<li><a href="javascript:void(0);" style="padding-left: 10px;" onclick="delfun('no');">删除未呼号码</a></li>
													</ul>
												</div>
												
		
											</div>
	
										</div>
										
										<div style="clear: both;"></div>

									</div>
									<p><span class="body-tips" id="bodytips"></span></p>
									<div class="detail-info">
									   <div class="section">
											 <div class="section-item" id="scenariostext">话术：</div>
											 <div class="section-item">启动方式：<span id="statusstr"></span></div>
											 <div class="section-item">微信推送类型：<span id="levelstr"></span></div>
											 <div class="section-item">机器人数量：<span id="robot">0个</span></div>
											 <div class="section-item">主叫号码：<span id="numbertext"></span></div>
									   </div>
									</div>
									
							</div>
							
							<div class="body" id="spinContainerbody">
							 
								<div style="clear: both;"></div>
								<div class="detail-statics">
									
									<div class="itempgl">
										<h5>客户意向等级<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></h5>
										<div class="progress-box intention-box">
											
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">A级(有明确意向)</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="typeA" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="typeApc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">B级(可能有意向)</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="typeB" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="typeBpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">C级(明确拒绝)</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="typeC" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="typeCpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">D级(用户忙)</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="typeD" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="typeDpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">E级(拨打失败)</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="typeE" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="typeEpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">F级(无效客户)</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="typeF" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="typeFpc">0%</span>
												</div>
											</div>
											
										</div>
									</div>
									
									<div class="vertical-line"></div>
									<div class="itempgl">
										<h5>通话时长</h5>
										<div class="progress-box intention-box">
											
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;"> &lt;10s </span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="longA" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="longApc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">10s-1min</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="longB" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="longBpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">1min-2min</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="longC" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="longCpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">>2min</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" role="progressbar" id="longD" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">0% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="longDpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
										
											
										</div>
									</div>
									
									<div class="vertical-line"></div>
									<div class="itempgl">
										<h5>对话轮次</h5>
										
										<div class="progress-box intention-box">
											
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">0-3次</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" id="rotationA" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">40% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="rotationApc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">3-5次</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" id="rotationB" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">40% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="rotationBpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">5-7次</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" id="rotationC" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">40% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="rotationCpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">7-10次</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" id="rotationD" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">40% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="rotationDpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
											<div class="gbibitem">
												<span class="progress-label" style="width:30%;">10次以上</span>
												<div class="fr wth7">
													<div class="progress margintop6 fl">
														<div class="progress-bar progress-bar-success" id="rotationE" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
															<span class="sr-only">40% Complete (success)</span>
														</div>
													</div>
													<span class="ant-progress-text fr" id="rotationEpc">0%</span>
												</div>
											</div>
											<div style="clear: both;"></div>
										
										</div>
										
										
									</div>
									
								</div>
								<div class="component-base-button">
									
									<button type="button" class="btn btn-default ant-btn marginr10">电话接通率(<span id="call_rate">0</span>%)</button>

								</div>		
							</div>
							
							<div class="records" id="spinContainerrecords">
								
								<div class="component-base-button">
									
									<!-- <button type="button" class="btn btn-default ant-btn marginr10"><span>添加到新任务拨打(0)</span></button> -->

								</div>
								
								<div class="ant-tabs ant-tabs-top ant-tabs-line">
									 
										<!-- Nav tabs -->
										<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 20px;">
											<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">进行中</a></li>
											<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">已完成</a></li>
										</ul>

										<!-- Tab panes -->
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="home">
												<div class="table-responsive">
									
														<table class="table table-bordered table-hover">
														
															<thead class="ant-table-thead">
																<tr>
																	<th class="text-center"><span>客户</span></th>
																	<th class="text-center"><span>号码</span></th>
																	<th class="text-center"><span>通话状态</span></th>
																	<th class="text-center"><span>通话时间</span></th>
																	<th class="text-center"><span>主叫号码</span></th>
																</tr>
															</thead>
															
															<tbody class="ant-table-tbody" id="tablelearninglist">
																
																
															</tbody>
														</table>
														
														<div class="row">
																<div class="col-sm-4 text-left">
																</div>
																<div class="col-sm-8 text-right"></div>
														</div>
														
														<div id="modalbody"></div>
														
									
														<div id="componentempty" class="component-page-empty">
															<div class="empty-tip line">
																暂无数据
															</div>
														</div>
														
													
												</div>
												
											</div>
											<div role="tabpanel" class="tab-pane" id="profile">
											
													<section class="navbar navbar-default main-box-header clearfix">
																	
															<div class="pull-right">
																	
																<form class="form-inline" method="get" role="form">
																	
																	<div class="form-group"> 
																			<select onchange="getsearch();" name="Lengthoftime" id="Lengthoftime" class="form-control">
																				<option value=" " selected="">选择通话时长</option>
																				<option value="0-10">&lt;10s</option>
																				<option value="10-30">10s-30s</option>
																				<option value="30-60">30s-1min</option>
																				<option value="60-120">1min-2min</option>	
																				<option value="120">>2min</option>	
																			</select>
																	</div>&nbsp;
																	
																	 <div class="form-group"> 
																				<select onchange="getsearch();" name="rotation" id="rotation" class="form-control">
																					<option value=" " selected="">选择通话轮次</option>
																					<option value="0-3">0-3次</option>
																					<option value="3-5">3-5次</option>
																					<option value="5-7">5-7次</option>
																					<option value="7-10">7-10次</option>	
																					<option value="10">10次以上</option>	
																				</select>
																		</div>&nbsp;
																		
																		<div class="form-group"> 
																				<select onchange="getsearch();" name="activeMode" id="activeMode" class="form-control">
																					<option value=" " selected="">选择通话状态</option>
																					<option value="2">已接听</option>
																					<option value="3">无人接听</option>
																					<option value="4">停机</option>
																					<option value="5">空号</option>
																					<option value="6">正在通话中</option>
																					<option value="7">关机</option>
																					<option value="8">用户拒接</option>
																					<option value="9">网络忙</option>
																					<option value="10">来电提醒</option>
																					<option value="11">呼叫转移失败</option>
																				</select>
																		</div>&nbsp;
																		
																		<div class="form-group"> 
																				<select onchange="getsearch();" name="Levelofintention" id="Levelofintention" class="form-control">
																					<option value=" "> 选择意向等级 </option>
																					<option value="6">A级(有明确意向)</option>
																					<option value="5">B级(可能有意向)</option>
																					<option value="4">C级(明确拒绝)</option>
																					<option value="3">D级(用户忙)</option>
																					<option value="2">E级(拨打失败)</option>
																					<option value="1">F级(无效客户)</option>
	
																				</select>
																		</div>&nbsp;
										
																	</form>
																			
															</div>
															
													</section>

													<div class="table-responsive">
														 
														 <table class="table table-bordered table-hover"> 

																<thead class="ant-table-thead">
																	<tr>
																		<th class="text-center"><span>客户名称</span></th>
																		<th class="text-center"><span>联系方式</span></th>
																		<th class="text-center"><span>通话状态</span></th>
																		<th class="text-center"><span>通话时间</span></th>
																		<th class="text-center"><span>通话时长</span></th>
																		<th class="text-center"><span>主叫号码</span></th>
																		<th class="text-center"><span>客户意向等级</span></th>
																		<th class="text-center"><span></span></th>
																	</tr>
																	</thead>
																<tbody class="ant-table-tbody" id="tablealreadylist"></tbody>		
														 </table>
														 
														 <div class="row">
														 		<div class="col-sm-4 text-left">
														 		</div>
														 		<div class="col-sm-8 text-right"></div>
														 </div>
														 
														 <div id="modalpagebody"></div>
														 
														
													 </div>

													<div class="component-page-empty" id="pegeempty">
														<div class="empty-tip line">暂无数据</div>
													</div>
												
						
											</div>
									
										</div>

									
								</div>
								
							</div>

						</div>
						
					</div>
					
				</div>

			</div>
				     
		</div>
		
				
	</div>					
    
</div>

 <script type="text/javascript">

  //全选
  function allcheck(){			
  	if ($('.check-all').is(":checked")) {	
  		$('.customerIds').prop("checked","checked");
  	}else{
  		$('.customerIds').prop("checked",false);
  	}
  }
  
 //删除
 function delNum(id){
 
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
  		 $.post("<?php echo url('delNum'); ?>",{'id':ids},function(data){
				if(data.code){
					alert(data.msg);
				}else{
					var taskID = $("#nowTaskID").val();	
					searchdata(1,taskID);
					// window.location.href=window.location.href;
				}
		},'JSON'); 
 }


  //全选
  function checkall(){			
  	if ($('.already-all').is(":checked")) {	
  		$('.alreadyIds').prop("checked","checked");
  	}else{
  		$('.alreadyIds').prop("checked",false);
  	}
  }
  
 //删除
 function delall(id){
 
 	 var r=confirm('确认删除?');
     	if (!r) 
           return; 

     	 var ids=[];
    	if(id){
    		ids.push(id);
    	}else{
    		
        	 var roleids = document.getElementsByName("alreadyIds");
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
  		 $.post("<?php echo url('delNum'); ?>",{'id':ids},function(data){
				if(data.code){
					alert(data.msg);
				}else{
					var taskID = $("#nowTaskID").val();	
					getsearch(1,taskID);
					// window.location.href=window.location.href;
				}
		},'JSON'); 
 }


 //删除
 function delfun(type){
 	
 	var taskID = $("#nowTaskID").val();	
 		
 	var r=confirm('确认删除?');
     	if (!r) 
           return; 

	$.post("<?php echo url('delType'); ?>",{'type':type,'taskId':taskID},function(data){
		if(data.code){
			alert(data.msg);
		}else{
			window.location.href=window.location.href;
		}
	},'JSON'); 
	
 }


//导出记录
function outRecord(type){
	
 	var taskID = $("#nowTaskID").val();	
 	
	$.post("<?php echo url('exportRecord'); ?>",{'type':type,'taskId':taskID},function(data){
		//console.log(data);
		if(data.code == 0){
			window.location.href = data.data;
		}else{
			alert(data.msg)
		}
		

	}); 
	
} 

 
 </script>
  

 <script type="text/javascript">
	 
	 $(function(){
	 	
		var taskName = "<?php echo (isset($_GET['taskName']) && ($_GET['taskName'] !== '')?$_GET['taskName']:''); ?>";
		$('#taskName').val(taskName);
		var createTime = "<?php echo (isset($_GET['createTime']) && ($_GET['createTime'] !== '')?$_GET['createTime']:''); ?>";
		$('#createTime').val(createTime);
		var status = "<?php echo (isset($_GET['status']) && ($_GET['status'] !== '')?$_GET['status']:''); ?>";
		$('#status').val(status);
		 
		    var numArr = new Array();
			$('.Idlist').each(function(){
					numArr.push($(this).val());//添加至数组
			});
		 
		// <!-- if(numArr.length > 0){ -->
			 
			 $("#taskItem"+numArr[0]).addClass("task-item-active");
			 $("#taskItem"+numArr[0]).siblings(".task-item-active").removeClass("task-item-active");
			 
			 if(numArr[0] > 0){
			 	$("#righttitle").text(numArr[0] +" "+$("#taskItem"+numArr[0]).attr("title"));
			 }
			 
			 /////////////////////////////
			 // 绑定当前任务的ID  
			 $("#taskID").val(numArr[0]);
			 $("#taskexampletaskID").val(numArr[0]);
			 $("#nowTaskID").val(numArr[0]);
			 
			 taskId = numArr[0];
			 //获取等待列表
			 searchdata(1,numArr[0]);
			 
			 //获取已经拨打列表
			 getsearch(1,numArr[0]);
			 
			 //获取当前计划的配置
			 getConfig(numArr[0]);
			 
			 // 执行任务  获取任务的 客户意向等级 数据详情 
			 implement(numArr[0]);
			 
			 //通话时长
			 getTalktime(numArr[0]);
			 
			 //通话轮次
			 getTalkRotation(numArr[0]);
			 
	     // 1.基本参数设置 
	     var options = { 
	         type: 'POST',     // 设置表单提交方式
	         url: "<?php echo url('user/member/importExcel'); ?>",    // 设置表单提交URL,默认为表单Form上action的路径
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
						//alert(responseText.msg);
						if (responseText.code == '0') {
							 refurbish();
						 }else{
							
							//$('#exampleModal').modal('show');
						 }

	         },  
	         error: function(xhr, status, err) {            
	            // alert("操作失败!");    // 访问地址失败，或发生异常没有正常返回
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
	 
  function refurbish(){
		var taskID = $("#nowTaskID").val();	
		//获取等待列表
		searchdata(1,taskID);
		
		//获取已经拨打列表
		getsearch(1,taskID);
		
		//获取当前计划的配置
		getConfig(taskID);
		
		// 执行任务  获取任务的 客户意向等级 数据详情 
		implement(taskID);

	}
 
	//获取任务的 客户意向等级 数据详情 
	function gettask(obj,id,name){
		
		$(obj).addClass("task-item-active");
    	$(obj).siblings(".task-item-active").removeClass("task-item-active");

		$("#righttitle").text(name);
		/////////////////////////////
		// 绑定当前任务的ID  
		$("#taskID").val(id);  //单个新建的
		$("#taskexampletaskID").val(id);  //导入用到的
		$("#nowTaskID").val(id);
		
	    ////////////////////////////////////
		
  		searchdata(page,id);
		
		//获取已经拨打列表
		taskId = id;
		getsearch(callpage,taskId);	
		
		//获取当前计划的配置
		getConfig(id);
		
		// 执行任务  获取任务的 客户意向等级 数据详情 
		implement(id);
		
		//通话时长
		getTalktime(id);
		
		//通话轮次
		getTalkRotation(id)

	} 
	

	//开始任务
	function startTask(status){
		
		 var taskID = $("#nowTaskID").val();	
  	 var url = "<?php echo url('setstatus'); ?>";	
		 
  	 $.ajax({
  	        url : url,
  	        dataType : "json", 
  	        type : "post",
  	        data : {'pId':taskID,'status':status},
  	        success: function(data){
  	        	if (data.code) {
								 alert(data.msg);
							}else{
								
							
								if(taskID <= 0 || status == -1){
									location.reload();
								}else{
									refurbish();
									
								}
								
								
							}
  	        },
  	        error : function() {
  	        	console.log('失败。');
  	        }
  	  });
			
  }
	
	//获取当前计划的配置
	function getConfig(id){
		
		var taskID = $("#nowTaskID").val();	
		
		var url = "<?php echo url('taskgetConfig'); ?>";	
		$.ajax({
					url : url,
					dataType : "json", 
					type : "post",
					data : {'taskId':id},
					success: function(data){
					  // console.log(data);
						if (data.code) {
						 	console.log(data.msg);
						}else{
							
								var backdata = data.data.list;
								$("#scenariostext").text("话术："+backdata.scenarios);	
								$("#numbertext").text(backdata.phone);	
								$("#statusstr").text(backdata.statusstr);	
								$("#levelstr").text(data.data.level);
								$("#robot").text(backdata.robot_cnt+'个');	
								$("#taskItem"+id).find(".ant-tag-text").text(backdata.statusstr);	
								$("#taskItem"+id).find(".taskName").text(id + " " + backdata.task_name);	
								$("#taskItem"+id).find(".tipgr").text("进度"+ data.data.Molecular + "/" + data.data.count);	

								$("#taskItem"+id).find(".progress-bar-danger").attr("style",'width: '+data.data.percent+'%');	
								$("#taskItem"+id).find(".progress-bar-danger").attr("aria-valuenow",data.data.percent);	
								$("#call_rate").text( data.data.call_rate);	
								if(backdata.status == "1"){
									
									$("#aidieru").attr("onclick","startTask(2);");	
									$("#aidieru").find("span").text("暂停任务");	
									$("#aidieru").show();
									
									$("#edit-opt").show();
									$("#end-opt").show();

								}
								else if(backdata.status == "3"){
									$("#aidieru").hide();
									$("#edit-opt").hide();
									$("#end-opt").hide();
								}
								else{
									$("#aidieru").attr("onclick","startTask(1);");	
									$("#aidieru").find("span").text("开始任务");
									$("#aidieru").show();

									$("#edit-opt").show();
									$("#end-opt").show();
															
								}
								$("#nestedloading").css("height","auto");	
								
								$("#spinContainerbody").css("display","block");	
								$("#spinContainerrecords").css("display","block");	
								//}
								//console.log(data.data.result);
						}
						
					},
					error : function() {
						//alert('获取配置失败。');
					}
		});
		
	}
	
	//执行任务获取任务的 客户意向等级 数据详情 
	function implement(id){
		
		var url = "<?php echo url('taskDetail'); ?>";	
		$.ajax({
					url : url,
					dataType : "json", 
					type : "post",
					data : {'taskId':id},
					success: function(data){

							$("#typeA").css('width','0%');
							$("#typeApc").text('0%');
							$("#typeB").css('width','0%');
							$("#typeBpc").text('0%');
							$("#typeC").css('width','0%');
							$("#typeCpc").text('0%');
							$("#typeD").css('width','0%');
							$("#typeDpc").text('0%');
							$("#typeE").css('width','0%');
							$("#typeEpc").text('0%');
							$("#typeF").css('width','0%');
							$("#typeFpc").text('0%');
					
						if (data.code == "1") {
							console.log('获取客户意向等级数据失败。');
						}else{
								var backdata = data.data;
								//backdata.length
								for(var i=0; i<backdata.length; i++){
								
										switch (backdata[i].level) {
											case 6:
												$("#typeA").css('width',backdata[i].percent+'%');
												$("#typeApc").text(backdata[i].percent+'%');
												break;
											case 5:
												$("#typeB").css('width',backdata[i].percent+'%');
												$("#typeBpc").text(backdata[i].percent+'%');
												break;
											case 4:
												$("#typeC").css('width',backdata[i].percent+'%');
												$("#typeCpc").text(backdata[i].percent+'%');
												break;
											case 3:
												$("#typeD").css('width',backdata[i].percent+'%');
												$("#typeDpc").text(backdata[i].percent+'%');
												break;
											case 2:
												$("#typeE").css('width',backdata[i].percent+'%');
												$("#typeEpc").text(backdata[i].percent+'%');
												break;
											default:
												$("#typeF").css('width',backdata[i].percent+'%');
												$("#typeFpc").text(backdata[i].percent+'%');
										}
							
				
								}
								
						}
						
					},
					error : function() {
						//alert('获取客户意向等级失败。');
					}
		});
		
	}
	
	//通话时长
	function getTalktime(id){
			
			var url = "<?php echo url('talkTime'); ?>";	
			$.ajax({
						url : url,
						dataType : "json", 
						type : "post",
						data : {'taskId':id},
						success: function(data){

								$("#longA").css('width','0%');
								$("#longApc").text('0%');
								$("#longB").css('width','0%');
								$("#longBpc").text('0%');
								$("#longC").css('width','0%');
								$("#longCpc").text('0%');
								$("#longD").css('width','0%');
								$("#longDpc").text('0%');
					
							
							if(data.code == '0'){
								
								var backdata = data.data;
								for(var i=0; i<backdata.length; i++){
									switch (backdata[i].timegroup) {
										case 0:
											$("#longA").css('width',backdata[i].percent+'%');
											$("#longApc").text(backdata[i].percent+'%');
											break;
										case 1:
											$("#longB").css('width',backdata[i].percent+'%');
											$("#longBpc").text(backdata[i].percent+'%');
											break;
										case 2:
											$("#longC").css('width',backdata[i].percent+'%');
											$("#longCpc").text(backdata[i].percent+'%');
											break;
										default:
											$("#longD").css('width',backdata[i].percent+'%');
											$("#longDpc").text(backdata[i].percent+'%');
									}
								}
								
							}else{
								
								console.log('获取通话时长数据失败。');

							}
							

						},
						error : function() {
						//	alert('获取数据失败。');
						}
			});	
	}
	
	//通话轮次
	function getTalkRotation(id){
			
			var url = "<?php echo url('talkRotation'); ?>";	
			$.ajax({
						url : url,
						dataType : "json", 
						type : "post",
						data : {'taskId':id},
						success: function(data){
							
								$("#rotationA").css('width','0%');
								$("#rotationApc").text('0%');
								$("#rotationB").css('width','0%');
								$("#rotationBpc").text('0%');
								$("#rotationC").css('width','0%');
								$("#rotationCpc").text('0%');
								$("#rotationD").css('width','0%');
								$("#rotationDpc").text('0%');
								$("#rotationE").css('width','0%');
								$("#rotationEpc").text('0%');
							
							if(data.code == '0'){
						
								var backdata = data.data;
								for(var i=0; i < backdata.length; i++){
									switch (backdata[i].rotationgroup) {
										case 0:
											$("#rotationA").css('width',backdata[i].percent+'%');
											$("#rotationApc").text(backdata[i].percent+'%');
											break;
										case 1:
											$("#rotationB").css('width',backdata[i].percent+'%');
											$("#rotationBpc").text(backdata[i].percent+'%');
											break;
										case 2:
											$("#rotationC").css('width',backdata[i].percent+'%');
											$("#rotationCpc").text(backdata[i].percent+'%');
											break;
										case 3:
											$("#rotationD").css('width',backdata[i].percent+'%');
											$("#rotationDpc").text(backdata[i].percent+'%');
											break;	
										default:
											$("#rotationE").css('width',backdata[i].percent+'%');
											$("#rotationEpc").text(backdata[i].percent+'%');
									}
								
								}
								
							}else{
								
								console.log(data.msg);
								
							}
							

						},
						error : function() {
						//	alert('获取数据失败。');
						}
			});	
	}
	
	
	//导出记录
	function outexcel(){
	
		var taskID = $("#nowTaskID").val();	
		
		$.post("<?php echo url('exportExcel'); ?>",{'taskId':taskID},function(data){
			if(data.code == '1'){
				 alert(data.msg);
			 }else{
					 window.location.href = data.data;
			 }
		}); 
		
	} 

	//获取等待列表
	var page = 1;
	function searchdata(page,taskId){	
 
		var url = "<?php echo url('lineup'); ?>";	
		$.ajax({
						url : url,
						dataType : "json", 
						type : "post",
						data : {'page':page,'taskId':taskId},
					
						success: function(data){

							var total = data.data.total;
							var Nowpage = data.data.Nowpage;
							var page = data.data.page;
							var Nowpage = parseInt(Nowpage);
							
							var data = data.data.list;
							 if(data.length > 0){
								 
								    $("#componentempty").css("display","none");
								 
										$("#tablelearninglist").find("tr").remove();
										
										for(var i=0;i<data.length;i++){
											
										
											var uid = data[i].uid;
											var mobile = data[i].mobile;
								var username = data[i].username;
											var status = data[i].status;
											var duration = data[i].duration;
											var last_dial_time = data[i].last_dial_time;
											var originating_call = data[i].originating_call;
											if(originating_call == null){
												 originating_call = "";
											}

									
											var strstatus = "排队中";
										  	var string = '<tr class="itemId'+uid+'" alt="'+uid+'">'
									+'<td class="text-center">'+username+'</td>'
												+'<td class="text-center">'+mobile+'</td>'
												// +'<td class="text-center">'+content+'</td>'   
												+'<td class="text-center">'+strstatus+'</td>'
												+'<td class="text-center">'+duration+'</td>'
												+'<td class="text-center">'+originating_call+'</td>';
										    string += '</tr>';
										  	$("#tablelearninglist").append(string); 

										}
										
										var prepage = Nowpage-1;
										var nextpage = Nowpage+1;
									 
										var str = '<div class="row">'
										+'<div class="col-sm-3 text-left">'
													
										+'<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">'
										+'<tbody><tr>'
										+'<td class="text-center">总人数：'
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
											str += '<li><a href="javascript:void(0);" onclick="searchdata('+prepage+','+taskId+');"><span>«</span></a></li> ';
										}
										
										if(page > 10){
										
											if(Nowpage < 7){
												for(var i=0;i<page;i++){
													var nownum = i+1;
													if(nownum < 9){
														 if(nownum == Nowpage){
															 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
														 }else{
															 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
														 }
													}
													
													if(nownum == 9 && nownum != Nowpage){
														 str += '<li class="disabled"><span>...</span></li>';  
													}else if(nownum == 9){
														str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+'</a></li> ';  
													}
												
														if(nownum > (page-2)){
															 if(nownum == Nowpage){
																 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
															 }else{
																 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
															 }
														}

												 }
											}else if(Nowpage > 6 && Nowpage < (page-6)){
												for(var i=0;i<page;i++){
													var nownum = i+1;
													var Nowpage = parseInt(Nowpage);
													if(nownum < 3){
														str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+' </a></li> '; 
													}
													
													if((nownum > Nowpage-5) && (nownum < Nowpage+5)){
												
																	 if(nownum == (Nowpage-4)){
																			str += '<li class="disabled"><span>...</span></li>';
																	 }   
																	
																		 if(nownum > (Nowpage-4) && nownum < Nowpage){
																			 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+'</a></li>'; 
																		 }  
																	 
																		 if(nownum == Nowpage){
																		 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+'</a></li>';  
																		 } 
																	 
																		 if(nownum < (Nowpage + 4) && nownum > Nowpage){
																			str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+'</a></li>'; 
																		 }  
																
																		 if(nownum == (Nowpage + 4)){
																		
																		 str += '<li class="disabled"><span>...</span></li>';
																		 }   
													 }
													 
												 if(nownum > (page-2)){
													 var Nowpage = parseInt(Nowpage);
													 if(nownum == Nowpage){
																 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+'</a></li>';
														 }else{
																str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+'</a></li> ';
														 }   
												 
													 }     

												 }
											}else{
												
												for(var i=0;i<page;i++){
													var nownum = i+1;
													if(nownum<3){
														str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+' </a></li>';  
													}
												
													if(nownum == (page-10) && nownum != Nowpage){
														str += '<li class="disabled"><span>...</span></li>';   
													}else if(nownum == (page-10) && nownum == Nowpage){
														str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+'</a></li>';   
													}
													
													if(nownum > (page-10)){
														if(nownum == Nowpage){
															str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+'</a></li> ';   
														}else{
															str += '<li ><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+'</a></li>';   
														}
													}
													
													
												}
									 
													
											}
										}else{
											 for(var i=0;i<page;i++){
												 var nownum = i+1;
												 if(nownum == Nowpage){
													 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
												 }else{
													 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
												 }
											 }
										}
										
					
								 
										if(Nowpage == page){
											str += '<li id="prevbtn" class="disabled"><span>»</span></li> ';
										}else{
											str += '<li><a href="javascript:void(0);" onclick="searchdata('+nextpage+','+taskId+');"><span>»</span></a></li>';
										}
									
										str += '</ul>'
										+'</div>'
										+'</div>'
									 
										$("#modalbody").find("div").remove();
										$("#modalbody").append(str); 
										
									 }
							 else{
								 
										$("#componentempty").css("display","block");

										$("#tablelearninglist").find("tr").remove();
										$("#modalbody").find("div").remove();
							
							 }
							 
						},
						error : function() {
							//alert('获取列表失败。');
						}
			});
		 
 }	

	//获取已经拨打列表
	var callpage = 1;
	var taskId = 1;
	function getsearch(callpage,taskId){
		
			if(!taskId){
			var taskId = $("#nowTaskID").val();	
			}
			if(!callpage){
				var callpage = 1;	
			}
			var Lengthoftime = $("#Lengthoftime").val();
			var rotation = $("#rotation").val();
			var activeMode = $("#activeMode").val();
			var Levelofintention = $("#Levelofintention").val();
			var url = "<?php echo url('alreadyDialed'); ?>";	
			
			$.ajax({
					url : url,
					dataType : "json", 
					type : "post",
					data : {
						'page':callpage,
						'taskId':taskId,
						'Lengthoftime':Lengthoftime,
						'rotation':rotation,
						'activeMode':activeMode,
						'Levelofintention':Levelofintention,
					},
				
					success: function(data){
							var total = data.data.total;
							var Nowpage = data.data.Nowpage;
							var page = data.data.page;
							var Nowpage = parseInt(Nowpage);
							
							var data = data.data.list;
							 if(data.length > 0){
								 
										$("#pegeempty").css("display","none");
								 
										$("#tablealreadylist").find("tr").remove();
										
										for(var i=0;i<data.length;i++){
											
										
											var uid = data[i].uid;
											var mobile = data[i].mobile;
											var nickname = data[i].nickname;
											var status = data[i].status;
											var duration = data[i].duration;
											var last_dial_time = data[i].last_dial_time;
											var level = data[i].level;

											var originating_call = data[i].originating_call;
											if(originating_call == null){
												 originating_call = "";
											}

											var strstatus = "未拨打";

											switch (status) {
												case 2:
													strstatus = "已接通";
													break;
												case 3:
													strstatus = "无人接听";
													break;
												case 4:
													strstatus = "停机";
													break;
												case 5:
													strstatus = "空号";
													break;
												case 6:
													strstatus = "正在通话中";
													break;
												case 7:
													strstatus = "关机";
													break;
												case 8:
													strstatus = "用户拒接";
													break;
												case 9:
													strstatus = "网络忙";
													break;
												case 10:
													strstatus = "来电提醒";
													break;
												case 11:
													strstatus = "呼叫转移失败";
													break;
												default:
													strstatus = "--";
											}
											
											var strlevel = "";
											switch (level) {
												case 6:
													strlevel = "A级(有明确意向)";
													break;
												case 5:
													strlevel = "B级(可能有意向)";
													break;
												case 4:
													strlevel = "C级(明确拒绝)";
													break;
												case 3:
													strlevel = "D级(用户忙)";
													break;
												case 2:
													strlevel = "E级(拨打失败)";
													break;
												case 1:
													strlevel = "F级(无效客户)";
													break;
												default:
													strlevel = "--";
											}
										
											var string = '<tr class="itemId'+uid+'" alt="'+uid+'">'
										
											+'<td class="text-center">'+nickname+'</td>'
											+'<td class="text-center">'+mobile+'</td>'
											+'<td class="text-center">'+strstatus+'</td>'
											+'<td class="text-center">'+last_dial_time+'</td>'  
											+'<td class="text-center">'+duration+'</td>'
											+'<td class="text-center">'+originating_call+'</td>'
											+'<td class="text-center">'+strlevel+'</td>'
											+'<td class="text-center"><a href="javascript:void(0);" onclick="redial('+mobile+');";>重拨</a></td>';
											string += '</tr>';
											$("#tablealreadylist").append(string); 

										}
										
										var prepage = Nowpage-1;
										var nextpage = Nowpage+1;
									 
										var str = '<div class="row">'
										+'<div class="col-sm-3 text-left">'
													
										+'<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">'
										+'<tbody><tr>'
										+'<td class="text-center">总人数：'
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
											str += '<li><a href="javascript:void(0);" onclick="getsearch('+prepage+','+taskId+');"><span>«</span></a></li> ';
										}
										
										if(page > 10){
										
											if(Nowpage < 7){
												for(var i=0;i<page;i++){
													var nownum = i+1;
													if(nownum < 9){
														 if(nownum == Nowpage){
															 str += '<li class="active"><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
														 }else{
															 str += '<li><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
														 }
													}
													
													if(nownum == 9 && nownum != Nowpage){
														 str += '<li class="disabled"><span>...</span></li>';  
													}else if(nownum == 9){
														str += '<li class="active"><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+'</a></li> ';  
													}
												
														if(nownum > (page-2)){
															 if(nownum == Nowpage){
																 str += '<li class="active"><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
															 }else{
																 str += '<li><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
															 }
														}

												 }
											}else if(Nowpage > 6 && Nowpage < (page-6)){
												for(var i=0;i<page;i++){
													var nownum = i+1;
													var Nowpage = parseInt(Nowpage);
													if(nownum < 3){
														str += '<li><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+' </a></li> '; 
													}
													
													if((nownum > Nowpage-5) && (nownum < Nowpage+5)){
												
																	 if(nownum == (Nowpage-4)){
																			str += '<li class="disabled"><span>...</span></li>';
																	 }   
																	
																		 if(nownum > (Nowpage-4) && nownum < Nowpage){
																			 str += '<li><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+'</a></li>'; 
																		 }  
																	 
																		 if(nownum == Nowpage){
																		 str += '<li class="active"><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+'</a></li>';  
																		 } 
																	 
																		 if(nownum < (Nowpage + 4) && nownum > Nowpage){
																			str += '<li><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+'</a></li>'; 
																		 }  
																
																		 if(nownum == (Nowpage + 4)){
																		
																		 str += '<li class="disabled"><span>...</span></li>';
																		 }   
													 }
													 
												 if(nownum > (page-2)){
													 var Nowpage = parseInt(Nowpage);
													 if(nownum == Nowpage){
																 str += '<li class="active"><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+'</a></li>';
														 }else{
																str += '<li><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+'</a></li> ';
														 }   
												 
													 }     

												 }
											}else{
												
												for(var i=0;i<page;i++){
													var nownum = i+1;
													if(nownum<3){
														str += '<li><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+' </a></li>';  
													}
												
													if(nownum == (page-10) && nownum != Nowpage){
														str += '<li class="disabled"><span>...</span></li>';   
													}else if(nownum == (page-10) && nownum == Nowpage){
														str += '<li class="active"><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+'</a></li>';   
													}
													
													if(nownum > (page-10)){
														if(nownum == Nowpage){
															str += '<li class="active"><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+'</a></li> ';   
														}else{
															str += '<li ><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+'</a></li>';   
														}
													}
													
													
												}
									 
													
											}
										}else{
											 for(var i=0;i<page;i++){
												 var nownum = i+1;
												 if(nownum == Nowpage){
													 str += '<li class="active"><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
												 }else{
													 str += '<li><a href="javascript:void(0);" onclick="getsearch('+nownum+','+taskId+');">'+nownum+' </a></li> ';  
												 }
											 }
										}
										
					
								 
										if(Nowpage == page){
											str += '<li id="prevbtn" class="disabled"><span>»</span></li> ';
										}else{
											str += '<li><a href="javascript:void(0);" onclick="getsearch('+nextpage+','+taskId+');"><span>»</span></a></li>';
										}
									
										str += '</ul>'
										+'</div>'
										+'</div>'
									 
										$("#modalpagebody").find("div").remove();
										$("#modalpagebody").append(str); 
										
									 }
							 else{
								 
										$("#pegeempty").css("display","block");

										$("#tablealreadylist").find("tr").remove();
										$("#modalpagebody").find("div").remove();
							
							 }
							 
							
							
						},
						error : function() {
							//alert('获取列表失败。');
						}
			});
			
  }	

	//重拨	
   function redial(phone){
		
 		var nowTaskID = $("#nowTaskID").val();
	
		var url = "<?php echo url('user/Member/redial'); ?>";	

		$.ajax({
			url : url,
			type : "post",
			data : {
				'task':nowTaskID,
				'mobile':phone
			},
			success: function(data){
				
				if (data.code == 0) {
 					alert(data.msg);
				}
				else{
				 	alert(data.msg);
				}
		

			},
			error : function() {
			
			}
		});
		
   }
	
		
  //暂停所有任务
	function stopAll(){
		
		var numArr = new Array();
		$('.Idlist').each(function(){
				numArr.push($(this).val());//添加至数组
		});
		
		var url = "<?php echo url('stopAll'); ?>";	
		$.ajax({
					url : url,
					dataType : "json", 
					type : "post",
					data : {'idList':numArr},
					success: function(data){
						console.log(data);
						if (data.code) {
								alert(data.msg);
						}else{
							var taskID = $("#nowTaskID").val();	
							if(taskID > 0){
								refurbish();
							}else{
								location.reload();
							}
							
						}
					},
					error : function() {
						//alert('暂停所有任务失败。');
					}
		});
		
	}		
		
  //设置状态
  function setstatus(id,status){			
  	 var url = "<?php echo url('setstatus'); ?>";	
  	 $.ajax({
  	        url : url,
  	        dataType : "json", 
  	        type : "post",
  	        data : {'pId':id,'status':status},
  	        success: function(data){
  	        	if (data.code) {
								 alert(data.msg);
							}else{
								var taskID = $("#nowTaskID").val();	
								if(taskID > 0){
									refurbish();
								}else{
									location.reload();
								}
								 //location.reload();
							}
  	        },
  	        error : function() {
  	        	alert('设置状态');
  	        }
  	  });
  }
 
  //删除
  function delPlan(id){
  
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
   		 $.post("<?php echo url('delPlan'); ?>",{'id':ids},function(data){
 				if(data){ 
 					alert(data);
 				}else{
 					window.location.href=window.location.href;
 				}
 		}); 
  }
 
 </script>
  
</div>

<!-- 新建计划 -->
<div class="modal fade" id="NewPlan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
			
       <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">添加拨打计划</h4>
				</div>
				
       <div class="modal-body pagelists">
							
						 <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">	
								
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="home">
							
											<div class="main-box-body clearfix">
											
												<div class="form-group" style="margin-top:20px;">
													<label class="col-lg-2 control-label">任务名称:</label>
													<div class="col-lg-10 col-sm-10">
														 <input type="text" class="form-control textwidth" placeholder="任务名称" name="name" id="newplanName" value="" />
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-lg-2 control-label">场景话术:</label>
													<div class="col-lg-10 col-sm-10">
														
														<select name="scenarios_id" id="scenarios_id" class="form-control textwidth">
															<option value="">请选择话术</option>
															<?php if(is_array($scenarioslist) || $scenarioslist instanceof \think\Collection || $scenarioslist instanceof \think\Paginator): $i = 0; $__LIST__ = $scenarioslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
																<option value="<?php echo $item['id']; ?>">
																	<?php echo $item['name']; ?>
																</option>
															<?php endforeach; endif; else: echo "" ;endif; ?>
														</select>
														<!--
															<input type="text" class="form-control textwidth" name="destination_extension" id="destination_extension" autocomplete="false" value="<?php echo (isset($list['destination_extension']) && ($list['destination_extension'] !== '')?$list['destination_extension']:''); ?>">
															<div class="help-block">越高排序越靠前</div>-->
													</div>
												</div>
												
								
												<div class="form-group">
														<label class="col-lg-2 control-label"><!-- 拨打计划： --></label>
														<div class="col-lg-10 col-sm-10">
															
																<div class="form-group" style="margin-left:10px;" >
																	<label class="statusSelect">上午:</label>
																	<div class="col-lg-9 col-sm-9">
																			 <input type="hidden" name="morning" id="morning" value="" />	
																				<div class="col-lg-4 col-sm-4">
																					<input type="text" class="form-control" id="startDate" name="startDate" value="" readonly="" />
																				</div>
																				<script>
																						$('#startDate').timepicker({  //fdatepicker
																							format: 'hh:ii:ss',
																							//pickTime: true,
																							defaultTime:'8:00',
																							showMeridian:false,
																						});
																				</script>	
																			
																				<div style="text-align:center; line-height: 30px;" class="col-lg-1 col-sm-1"> 至 </div>
																			
																				<div class="col-lg-4 col-sm-4">
																					<input type="text" class="form-control" id="endTime" name="endTime" value="" readonly="" />
																				</div>
																			
																				<script>
																					$('#endTime').timepicker({
																						format: 'hh:ii:ss',
																						//pickTime: true,
																						defaultTime:'12:00',
																						showMeridian:false,
																					});
																				</script>	
																																		
																	</div>
																</div>
																
															
																<div class="form-group" style="margin-left:10px;" >
																	<label class="statusSelect">下午:</label>
																	<div class="col-lg-9 col-sm-9">
																			<input type="hidden" name="afternoon" id="afternoon" value="" />	
																			<input type="hidden" name="evening" id="evening" value="" />	
																		
																				<div class="col-lg-4 col-sm-4">
																					<input type="text" class="form-control" id="pmstartDate" name="pmstartDate" value="" readonly="" />
																				</div>
																				<script>
																					$('#pmstartDate').timepicker({
																						format: 'hh:ii:ss',
																						//pickTime: true
																						defaultTime:'14:00',
																						showMeridian:false,
																					});
																			</script>	
																			
																				<div style="text-align:center; line-height: 30px;" class="col-lg-1 col-sm-1"> 至 </div>
																			
																				<div class="col-lg-4 col-sm-4">
																					<input type="text" class="form-control" id="pmendTime" name="pmendTime" value="" readonly="" />
																				</div>
																			
																				<script>
																					$('#pmendTime').timepicker({
																						format: 'hh:ii',
																						//pickTime: true
																						defaultTime:'20:00',
																						showMeridian:false,
																						// maxHours: 21,
																					});
																				</script>	
																																		
																	</div>
																</div>
																
															
															<div>推荐：为建立健康、友好的营销呼叫平台，建议呼叫时间段为 08:00 - 12:00 和 14:00 - 20:00 ！</div>
														</div>
												</div>
												
												
												<div class="form-group">
													<label class="col-lg-2 control-label">排除时间：</label>
													<div class="col-lg-10 col-sm-10">
														
														 <input type="hidden" name="exclude" id="exclude" value="" />	
						
															<div class="form-group" style="margin-left:10px;">
																<label class="statusSelect">按周：</label>
																<div class="col-lg-10 col-sm-10">
																	 <div class="ivu-form-item-content">
																		 <button type="button" class="mr15 btn btn-primary" onclick="changes(this)">
																			 <input type="hidden" name="Monday" id="Monday" value="1" />
																			 <span>周一</span>
																		 </button>
																		 <button type="button" class="mr15 btn btn-primary" onclick="changes(this)">
																			 <input type="hidden" name="Tuesday" id="Tuesday" value="1" />
																			 <span>周二</span>
																		 </button>
																		 
																		 <button type="button" class="mr15 btn btn-primary" onclick="changes(this)">
																			 <input type="hidden" name="Wednesday" id="Wednesday" value="1" />
																			 <span>周三</span>
																		 </button>
																		 
																		 <button type="button" class="mr15 btn btn-primary" onclick="changes(this)">
																			 <input type="hidden" name="Thursday" id="Thursday" value="1" />
																			 <span>周四</span>
																		 </button>
																		 
																		 <button type="button" class="mr15 btn btn-primary" onclick="changes(this)">
																			 <input type="hidden" name="Friday" id="Friday" value="1" />
																			 <span>周五</span>
																		 </button>
																		 
																		 <button type="button" class="mr15 btn btn-primary" onclick="changes(this)">
																			 <input type="hidden" name="Saturday" id="Saturday" value="1" />
																			 <span>周六</span>
																		 </button>
																		 <button type="button" class="mr15 btn btn-primary" onclick="changes(this)">
																			 <input type="hidden" name="Sunday" id="Sunday" value="1" />
																			 <span>周日</span>
																		</button> 
																	</div>
																</div>
															</div>
						
															
															<div class="form-group" style="margin-left:10px;">
																<label class="statusSelect">按天：</label>
																<div class="col-lg-10 col-sm-10">
																	 <!-- class="col-lg-4 col-sm-4" -->
																		<div>
																			<input type="text" class="form-control" id="daystartDate" name="daystartDate" value="<?php echo (isset($list['timer']['date_list']) && ($list['timer']['date_list'] !== '')?$list['timer']['date_list']:''); ?>" readonly="" />
																		</div>
																		<script>
																			$('#daystartDate').datepicker({
																				language: 'zh-CN',
																				format: 'yyyy-mm-dd',
																				multidate:true,
																				multidateSeparator:",",
																				// pickTime: true
																			});
																	</script>	
																	
																</div>
															</div>
															
															
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-lg-2 control-label">呼叫方式：</label>
													<div class="col-lg-10 col-sm-10">
															<div class="btn-group">
																<button type="button" id="callTypezero" class="btn btn-primary call-type" data-v="0" >网关</button>
																
																<button type="button" id="callTypeOne" class="btn btn-default call-type" data-v="1" >线路</button>
															</div>
															 <input type="hidden" name="call_type" id="call_type" value=0 />
															 
															<select id="phone_id" class="form-control textwidth" name="phone_id">
															
															</select>
														
													</div>
												</div>
												
												<script>
												//var call_type = <?php echo (isset($list['config']['call_type']) && ($list['config']['call_type'] !== '')?$list['config']['call_type']:0); ?>;
												 var phone = "";
													$(function(){ 
														$(".call-type").click(function(){
															$(".call-type").attr('class', 'btn btn-default call-type');
															$(this).attr('class', 'btn btn-primary call-type');
															$('#call_type').val($(this).attr('data-v'));
															bindCallNums($(this).attr('data-v'), phone);
														});
														
													}); 
												</script>
												
												
												
												<div class="form-group">
													<label class="col-lg-2 control-label">微信推送规则：</label>
													<div class="col-lg-10 col-sm-10">
														
															<input type="hidden" name="configId" id="configId" value="" />	
						
															<div class="ivu-checkbox-group">
																	
																<label class="checkbox-wrapper">
																		<input type="checkbox" name="level[]" id="level5" value="6">
																		<span class="word">A</span>
																</label>
																
																<label class="checkbox-wrapper">
																		<input type="checkbox" name="level[]" id="level4" value="5">
																		<span class="word">B</span>
																</label>
																
																<label class="checkbox-wrapper">
																		<input type="checkbox" name="level[]" id="level3" value="4">
																		<span class="word">C</span>
																</label>
																
																<label class="checkbox-wrapper">
																		<input type="checkbox" name="level[]" id="level2" value="3">
																		<span class="word">D</span>
																</label>
																
																<label class="checkbox-wrapper">
																		<input type="checkbox" name="level[]" id="level1" value="2">
																		<span class="word">E</span>
																</label>
																<label class="checkbox-wrapper">
																		<input type="checkbox" name="level[]" id="level1" value="1">
																		<span class="word">F</span>
																</label>
						
															</div>
															<input type="radio" id="push_type_rand" name="push_type" value="0" checked> 随机			
															<input type="radio" id="push_type_fixed" name="push_type" value="1" > 固定
															<input type="radio" id="push_type_seq" name="push_type" value="2"> 顺序
															<br/>
															<select id="first-disabled2" name="sale_ids[]" class="selectpicker form-control textwidth" multiple data-hide-disabled="true" title="请选择推送销售人员">
																<?php if(is_array($adminlist) || $adminlist instanceof \think\Collection || $adminlist instanceof \think\Paginator): $i = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
																<option 
																
																		<?php if(isset($list['config']['sale_ids']) && in_array($vo['id'], $list['config']['sale_ids'])): ?>
																			selected 
																		<?php endif; ?>
						
																	 value="<?php echo $vo['id']; ?>"><?php echo $vo['username']; ?></option>
																<?php endforeach; endif; else: echo "" ;endif; ?>
														
															</select>
												
													</div>
												</div>
												
											<div class="form-group">
													<label class="col-lg-2 control-label">机器人数量：</label>
													<div class="col-lg-10 col-sm-10">
														<input type="number" class="form-control textwidth" style="float:left;" placeholder="请输入机器人数量" min="1" name="robot_cnt" id="robot_cnt" value="" />
														<span style="line-height: 40px;margin-left: 5px;"></span>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-lg-2 control-label">呼叫频率：</label>
													<div class="col-lg-10 col-sm-10">
														<input type="text" class="form-control textwidth" style="float:left;" placeholder="呼叫频率" name="frequency" id="frequency" value="20" />
														<span style="line-height: 40px;margin-left: 5px;">秒 间隔越短拨打频率越高，机器人大于1时呼叫频率设置为0</span>
													</div>
												</div>
												

												<div class="form-group">
													<label class="col-lg-2 control-label">是否立即启动：</label>
													<div class="col-lg-10 col-sm-10">
														<input type="checkbox" style="float: left;margin-top: 10px;" name="startup" id="startup" value="1" />
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-lg-2 control-label">备注：</label>
													<div class="col-lg-10 col-sm-10">
														<textarea name="remark" id="remark" rows="2" style="width: 70%;resize: auto;min-height: inherit;"><?php echo (isset($list['remark']) && ($list['remark'] !== '')?$list['remark']:''); ?></textarea>
													</div>
												</div>
										
											 
												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-10">	<!--   target-form="form-horizontal" -->	
														<input type="hidden" name="taskId" id="taskId" value="<?php echo (isset($list['uuid']) && ($list['uuid'] !== '')?$list['uuid']:''); ?>" />	
														<input type="hidden" name="groupId" id="groupId" value="<?php echo (isset($list['disable_dial_timegroup']) && ($list['disable_dial_timegroup'] !== '')?$list['disable_dial_timegroup']:''); ?>" />	
														
														<input type="hidden" name="onetime" id="onetime" value="<?php echo (isset($list['timerange']['0']['begin_datetime']) && ($list['timerange']['0']['begin_datetime'] !== '')?$list['timerange']['0']['begin_datetime']:'08:00'); ?>" />	
														<input type="hidden" name="twotime" id="twotime" value="<?php echo (isset($list['timerange']['0']['end_datetime']) && ($list['timerange']['0']['end_datetime'] !== '')?$list['timerange']['0']['end_datetime']:'12:00'); ?>" />	
														<input type="hidden" name="threetime" id="threetime" value="<?php echo (isset($list['timerange']['1']['begin_datetime']) && ($list['timerange']['1']['begin_datetime'] !== '')?$list['timerange']['1']['begin_datetime']:'14:00'); ?>" />	
														<input type="hidden" name="fourtime" id="fourtime" value="<?php echo (isset($list['timerange']['1']['end_datetime']) && ($list['timerange']['1']['end_datetime'] !== '')?$list['timerange']['1']['end_datetime']:'20:00'); ?>" />	
														
														<span class="btn btn-primary submit-btn" onclick="checkform();">确 定</span>
														<button class="btn btn-default" data-dismiss="modal">关 闭</button>
													</div>
												</div>
										
											</div>
											
									</div>
						
								</div>
							
							</form>
					
       </div>
       <div style="clear:both"></div>

	  </div>
           
  </div>
   
      <script type="text/javascript">
				
					//新建计划
				function addNewPlan(){	
					
						$("#newplanName").val("");	
						$("#scenarios_id").val("");	
					
						$("#morning").val("");	
						$("#startDate").timepicker("setTime", "08:00");
						$("#endTime").timepicker("setTime", "12:00");	

						$("#afternoon").val("");	
						$("#evening").val("");	
						$('#push_type_rand').prop("checked",true);	
						$("#pmstartDate").timepicker("setTime", "14:00");	
						$("#pmendTime").timepicker("setTime", "20:00");	

						$("#exclude").val("");	

	          $(".mr15").attr("class","mr15 btn btn-primary");	
						$(".mr15").find("input").val(1);
						$("#daystartDate").datepicker("setDate", "");
	
	          $("#call_type").val("0");	
						
            $("#callTypezero").attr("class","btn btn-primary call-type");
						//$("#phone_id").val("0");	
						$("#startup").prop("checked",false);
	

						$("#first-disabled2").selectpicker('val', "");//默认选中


						for(var i=0; i<5; i++){

						  $("#level"+(i+1)).prop("checked",false);

						};


						bindCallNums(0,0);


						$("#configId").val("");	 
					

						$("#frequency").val("20");	 

						$("#remark").val("");	 

						$("#taskId").val("");	 
						$("#groupId").val("");	 

						$("#onetime").val("");	 
						$("#twotime").val("");	 
						$("#threetime").val("");	 
						$("#fourtime").val("");	
						$("#robot_cnt").val("");	

					  $('#NewPlan').modal('show');
					
				}	
		    
				
				//编辑计划
				function editNewPlan(){	
					
					$("#daystartDate").datepicker("setDate", "");

					var taskID = $("#nowTaskID").val();	
					var url = "<?php echo url('editplanInfo'); ?>";	
					
					$.ajax({
									url : url,
									dataType : "json", 
									type : "post",
									data : {'id':taskID},
									success: function(data){
										console.log(data);
										if (data.code) {
											alert(data.msg);
										}else{
											
											$('#NewPlan').modal('show');

											var backdata = data.data;
											var list = backdata.list;
											console.log(list);
											$("#taskId").val(list.uuid);	 
											
											$("#newplanName").val(list.name);	
											$("#scenarios_id").val(list.config.scenarios_id);	
											
											if(list.timerange.length > 0){
														$("#morning").val(list.timerange[0].uuid);	
														$("#startDate").timepicker("setTime", list.timerange[0].begin_datetime);
														$("#endTime").timepicker("setTime", list.timerange[0].end_datetime);	
			
														$("#afternoon").val(list.timerange[1].uuid);	
														$("#evening").val(list.timerange[2].uuid);	
														
														$("#pmstartDate").timepicker("setTime", list.timerange[1].begin_datetime);	
														$("#pmendTime").timepicker("setTime", list.timerange[1].end_datetime);										
											}
											
											$("input[name='push_type'][value="+list.config.push_type+"]").attr("checked",true); 
											
											
											$("#exclude").val(list.timer.id);	


											var wlist = list.timer.week_list;
											for(var i=0; i<wlist.length; i++){
												
												$("#"+wlist[i]).val(0);	
												$("#"+wlist[i]).parent("button").attr("class","mr15 btn btn-default");	
						
											};
											if(list.timer.date_list){
												
												var date_list = list.timer.date_list.split(",");
												$("#daystartDate").datepicker("setDate", date_list);
																																		
											}
							
											if(list.config.call_type == '1'){
												
												$("#callTypezero").attr("class","btn btn-default call-type");
												$("#callTypeOne").attr("class","btn btn-primary call-type");	
												
											}
											
											if(list.start == '1'){
												$("#startup").prop("checked",true);
											}
											
						
											
											$("#first-disabled2").selectpicker('val', list.config.sale_ids);//默认选中

											
											var level = list.config.level;
											for(var i=0; i<level.length; i++){
												
												$("#level"+level[i]).prop("checked",true);
						
											};
											
											
											call_type = list.config.call_type;
											
											bindCallNums(call_type,list.phone);
											
											$("#call_type").val(call_type);	 
											$("#configId").val(list.config.id);	 
											$("#frequency").val(list.call_pause_second);	 

											$("#remark").val(list.remark);	 
											
											
											$("#groupId").val(list.disable_dial_timegroup);	 
											
											if(list.timerange.length > 0){
												$("#onetime").val(list.timerange[0].begin_datetime);	 
												$("#twotime").val(list.timerange[0].end_datetime);	 
												$("#threetime").val(list.timerange[1].begin_datetime);	 
												$("#fourtime").val(list.timerange[1].end_datetime);	
											}
	
                      $("#robot_cnt").val(list.maximumcall);	
											 
											//location.reload();
										}
									},
									error : function() {
										$('#NewPlan').modal('hide');
										//alert('失败。');
									}
						});
						

				
					
				}	
				
				
				function bindCallNums(type,phone_id){
					$.ajax({
							type: "POST",
							dataType:'json',
							url: "<?php echo url('User/Plan/bindCallNum'); ?>",
							cache: false,
							data: {"type":type,'phone':phone_id},
							success: function(res) {
								if (res.code == 0) {
										var optionstring = "";
										var jsonObj = res.data;
										var is_select = "";
										$("#phone_id").empty();
										//return;
										for (var j = 0; j < jsonObj.length; j++) {
											
											is_select = "";
											if (jsonObj[j].id == phone_id){
												console.log(phone_id);
												is_select =  'selected';
												
											}
											optionstring += '<option value="' + jsonObj[j].id + '"' + is_select +' >'+ jsonObj[j].phone + '</option>';
										}
										
										if (type == '1'){
											console.log(optionstring);
											$("#phone_id").append("<option value=''>请选择中继线路</option> ");
										}
										else{
											$("#phone_id").append("<option value=''>请选择机器座席</option> ");
											if (phone_id){
												phone = phone_id;
											}
										}
										$("#phone_id").append(optionstring);
										
										//phone = "";
								}else{
									//alert(data.msg);
								}
							},
							error: function(data) {
								// alert("提交失败");
							}
					});
				
				}
				
				function changes(obj){
					
					var val = $(obj).find('input[type="hidden"]').val();
				
					if(val == 1){
						
						$(obj).find('input[type="hidden"]').val('0');
						$(obj).removeClass("btn-primary");
						$(obj).addClass("btn-default");
				
					}else{
						$(obj).find('input[type="hidden"]').val('1');
						$(obj).removeClass("btn-default");
						$(obj).addClass("btn-primary");
					}
					
				}	
				
				//检查表单的必填项
				function checkform(){
				 	
						var name = $("#newplanName").val();
						var taskId = $("#taskId").val();
				
						if(!name){
							alert("任务名称不能为空"); 
							return false; 
						}
						
						var scenarios_id = $("#scenarios_id").val();
						if(!scenarios_id){
							alert("话术不能为空"); 
							return false; 
						}
				
						var startDate = $("#startDate").val();
						var endTime = $("#endTime").val();
						
						var pmstartDate = $("#pmstartDate").val();
						var pmendTime = $("#pmendTime").val();
						
						var start = startDate.split(":");
						if(start[0] < 8){
							alert("上午的开始时间不能小于8点。");
							return false;
						}
				
						
				    //时间的判断
					  var oneStatus = judge(startDate,endTime);
						if(!oneStatus){
							alert("上午的开始时间不能大于结束时间");
							return false;
						}
						
						var twoStatus = judge(endTime,pmstartDate);
						if(!twoStatus){
							alert("上午的结束时间不能大于下午的开始时间");
							return false;
						}
						
						var threeStatus = judge(pmstartDate,pmendTime);
						if(!threeStatus){
							alert("下午的开始时间不能大于下午的结束时间");
							return false;
						}
				
						var startDatestr = backDate(startDate,0);
						var endTimestr = backDate(endTime,1);
						var pmstartDate = backDate(pmstartDate,0);
						var pmendTime = backDate(pmendTime,1);
				
						$("#onetime").val(startDatestr);
				    $("#twotime").val(endTimestr);
				
						$("#threetime").val(pmstartDate);
						$("#fourtime").val(pmendTime);
						
				
						var phone_id = $("#phone_id").val();
						if(!phone_id){
							alert("呼叫方式不能为空。"); 
							return false; 
						}
					
						
						var frequency = $("#frequency").val();
						if(!frequency){
							alert("呼叫频率不能为空"); 
							return false; 
						}
						var robot_cnt = $("#robot_cnt").val();
						if(robot_cnt==''){
							alert("机器人数量不可为空"); 
							return false; 
						}
						
						/*
						var rnum = <?php echo (isset($rnum) && ($rnum !== '')?$rnum:'0'); ?>;
						if(robot_cnt > rnum){
							alert("您可用的机器人数量不足。"); 
							return false; 
						}
						*/
						var href = "<?php echo url('User/Plan/addplan'); ?>";
						
						
						if(taskId > 0){
							 href = "<?php echo url('User/Plan/editPlan'); ?>";
						 }
				
				
						$.ajax({
								 type: "POST",
								 dataType:'json',
								 url: href,
								 cache: false,
								 data: $("#form").serialize(),
								 success: function(data) {
									if (data.code == 0) {
												if(Number(taskId) > 0){
													refurbish();
													$('#NewPlan').modal('hide');
												}else{
													location.reload();
												}
									}else{
										  alert(data.msg);
										  return false;
									}						
									
								 },
								 error: function(data) {
									// alert("提交失败");
								 }
						 }) 
						 
      
				}
				
				  //时间的判断
				 
				  function judge(start,end){
						
						var date = new Date();
						
						var Y = date.getFullYear() + '-';
						var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-';
						var D = date.getDate() + ' ';
						var h = date.getHours() + ':';
						var m = date.getMinutes() + ':';
						var s = date.getSeconds();
					
						var startstr = Y + M + D + start;
						var starttime = Date.parse(new Date(startstr));
						
						var endstr = Y + M + D + end;
						var endtime = Date.parse(new Date(endstr));
						
				// 		console.log(starttime);
				// 		console.log(endtime);
						
						if(starttime < endtime){
							return true;
						}else{
							return false;
						}
					
						
					}
				 
				  //格式化日期
				  function backDate(time,cate){
				     
				    var date = new Date();
				
				    var Y = date.getFullYear() + '-';
				    var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-';
				    var D = date.getDate() + ' ';
				    var h = date.getHours() + ':';
				    var m = date.getMinutes() + ':';
				    var s = date.getSeconds();
				  
				    var datastr = Y + M + D + time;
				    //没有时间的签到时间
						if(cate > 0){
							var preSign = Date.parse(new Date(datastr)) + 60000;
						}else{
							var preSign = Date.parse(new Date(datastr)) - 60000;
						}
				
				
					  var date = new Date(parseInt(preSign));
						var Y = date.getFullYear() + '-';
						var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-';
						var D = date.getDate() + ' ';
						//var h = date.getHours() + ':';
						var h = (date.getHours() < 10 ? '0' + date.getHours() : date.getHours()) + ':';
						//var m = date.getMinutes() + ':';
						
						var m = (date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes()) + ':';
				
						var s = date.getSeconds();
					
						var datastr = Y + M + D + h + m + "00";
						var preSign = Date.parse(new Date(datastr))
						
				    var backdata = datastr.split(" ");
						
				    return backdata[1];
				
				  }
				

				  document.addEventListener('DOMContentLoaded', function () {
				    var mySelect = $('#first-disabled2');
				
				    $('#special').on('click', function () {
				      mySelect.find('option:selected').prop('disabled', true);
				      mySelect.selectpicker('refresh');
				    });
				
				    $('#special2').on('click', function () {
				      mySelect.find('option:disabled').prop('disabled', false);
				      mySelect.selectpicker('refresh');
				    });
				
				    
				  });
	    
      </script>
      
</div>


<script type="text/javascript" src="__PUBLIC__/plugs/jquery/jquery.form.min.js"></script>


<!-- 导入用户Large modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog" style="width:360px;">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">选择excel文件</h4>
				 </div>
				 <div class="modal-body">
						 <form id="fileform" action="<?php echo url('user/member/importExcel'); ?>" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
							 <input type="file" class="" id="excelId" accept="*.xls"  name="excel" />
							 
						   <!-- 当前任务的ID -->
							 <input type="hidden" name="taskID" id="taskexampletaskID" value="" />
							 
					 </form>
				 <br/>
				 <a href="__STATIC__/template.xlsx" >模板下载</a>
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer" style="text-align: center;">
				 
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				<!-- 	<button type="button" onclick="Savechange();" class="btn btn-primary"></button> -->
					<button class="btn btn-primary" onclick="Savechange();" type="button">保 存</button>

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


<!-- 新建人员 -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog"  style="width: 300px;">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">新建用户</h4>
				 </div>
				 <div class="modal-body">
						  <form id="addNewform" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">
						         
									<div class="form-group">
										<label class="col-lg-4 control-label">姓名：</label>
										<div class="col-lg-7 col-sm-10">
												 <input type="text" name="nickname" class="form-control" id="nickname" value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-4 control-label">性别：</label>
										<div class="col-lg-7 col-sm-6">
												 &nbsp;<input type="radio" name="sex" value="0" id="sexman" checked /> 男
											   &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="sexwoman" name="sex" value="1" /> 女
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-4 control-label">手机号：</label>
										<div class="col-lg-7 col-sm-10">
												<input type="text" class="form-control" placeholder="请输入手机号" name="phonenumber" id="phonenumber" value="" />
										</div>
									</div>
									
								<div class="form-group" style="margin-top:10px;">
									<label class="col-lg-4 control-label">客户分组：</label>
									<div class="col-lg-7 col-sm-10">
												 <select id="groupId" name="groupId" class="form-control" >
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
									<!-- 当前任务的ID -->
									<input type="hidden" name="taskID" id="taskID" value="" />
							</form>
				 
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" onclick="saveMember();" class="btn btn-primary">保存</button>
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
								
								$('#newModal').modal('show');

						}
					},
					error: function(data) {
						//alert("提交失败");
					}
				}) 
			 }
			 else{
				 
				 $("#nickname").val("");
				 $("#realname").val("");
				 $("#phonenumber").val("");
				 $("#groupId").val("");
				 $("#sexman").prop("checked",true);
				 
				 $('#newModal').modal('show');
			 }
		 }	
		 
		 
		function saveMember(){
		 	
			var nickname = $("#nickname").val();
			var realname = $("#realname").val();
			var phonenumber = $("#phonenumber").val();
			var taskId = $("#taskID").val();
			 
			if(phonenumber==''){
				alert("号码不可为空"); 
				return false; 
			}
		 	  
			var mobileREa = /^1[3|4|5|6|7|8|9]\d{9}$/;
			var phoneruler = /^0\d{2,3}-?\d{7,8}$/;
		
			if (!mobileREa.test(phonenumber)) { 
				if (!phoneruler.test(phonenumber)) { 
			  
					alert("号码格式不正确"); 
					return false; 
				}
			} 
			
			var href = "<?php echo url('User/member/addMember'); ?>";
			var mumid = $("#mumid").val();
			if(mumid > 0){
				 href = "<?php echo url('User/member/editMember'); ?>";
			}
			
			$.ajax({
				 type: "POST",
				 dataType:'json',
				 url: href,
				 cache: false,
				 data: $("#addNewform").serialize(),
				 success: function(data) {
					if (data.code == 0) {
						searchdata(1,taskId);
						$('#newModal').modal('hide');
					}
					else{
						 alert(data.msg);
					}
				 },
				 error: function(data) {
					// alert("提交失败");
				 }
			})
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
