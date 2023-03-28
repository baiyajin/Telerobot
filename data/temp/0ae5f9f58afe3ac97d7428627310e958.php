<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:62:"/www/wwwroot/web/application/user/view/enterprise/account.html";i:1551974578;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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
.imgclass>td>p>img {
	width: 50px;
}

.table-responsive {
	min-height: .01%;
	overflow-x: hidden;
}

.wi80-BFB {
	width: 80%;
}

.viplist {
	border: 1px solid #999;
	height: 150px;
	overflow: auto;
}

.nav-tabs>li {
	margin-bottom: -3px;
}

.nav-tabs {
	background: #ffffff;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover
	{
	color: #03a9f4;
	background-color: #dfeaf9;
	border: 0px solid #ddd;
/* 	border-top: 0px solid #03a9f4; */
	border-bottom: 2px solid #03a9f4;
}

.con-padding {
		padding: 20px;
}
.outbox{
	overflow: hidden;
	background-color: #f3f3f3;
	display: block;
}

.my-header {
	  background-color: #fff;
    width: 40%;
    float: left;
		margin-bottom: 20px;
}

.my-title {
    font-size: 16px;
    color: #666666;
}

.ant-avatar {
	text-align: center;
	background: #ccc;
	color: #fff;
	white-space: nowrap;
	position: relative;
	overflow: hidden;
	width: 32px;
	height: 32px;
	border-radius: 16px;
	line-height: 32px;
	margin: 0 auto;
}

.my-header>.my-detail {
	display: -ms-flexbox;
	-ms-flex-align: center;
	align-items: center;
	padding: 20px 10px 0px 10px;
	margin-bottom: 20px;
}

.my-header>.my-detail>.ant-avatar {
	width: 110px;
	height: 110px;
	border-radius: 50%;
}

.my-header>.my-detail>.my-detail-info {
	margin: 35px auto 0px;
	text-align: center;
}

.label {
	line-height: 2;
	color: #000000;
}

.seat-wrap {
	background-color: #fff;
	/*  border-bottom: 1px solid #e0e0e0; */
	margin-bottom: 20px;
	float: right;
	width: 59%;
}

.sms-wrap {
	padding: 0 10px;
	color: #333;
	margin-bottom: 20px;
}

.btn-size-default {
	height: 28px;
	font-size: 14px;
	border-radius: 3px;
	font-weight: 300;
	/* border: 1px solid #1f8cec; */
	color: #000;
	background-color: #fff;
	text-align: center;
	white-space: nowrap;
  line-height: 47px;
	padding: 0 15px;
	height: 37px;
	cursor: pointer;
}

.seat-wrap .seat-num {
	  margin: 12px 0;
    width: 48%;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    display: inline-block;
}

.table .ant-table-thead>tr>th {
	font-size: 14px;
	font-weight: 400;
	background-color: rgba(223, 234, 249, .4);
}

.table .ant-table-row {
	border-bottom: 1px solid #e9e9e9;
} 

/* .table-responsive {
	margin-top: 20px;
} */

.main-context {
	height: calc(100vh - 45px);
	padding: 20px;
	overflow: auto;
	background-color: #ffffff;
}

.img-circle{
	width: 110px; 
	height: 110px;
}


.statusSelect {
		line-height: 30px;
		float: left;
}

.restable{
	background-color: #ffffff;
}
.my-detail-info-item{
    width: 49%;
}
.clssbtm {
    background-color: #f3f3f3;
    line-height: 30px;
    font-size: 14px;
}
.clssword {
    font-size: 18px;
    color: #000;
}
.bignum {
    border-bottom: 1px solid moccasin;
    text-align: center;
    padding: 15px 0px;
}
.wortlf{
	display: inline-block;
	width: 49%;
	vertical-align: middle;
	text-align: center;
}
.wortrg{
	display: inline-block;
	width: 49%;
	vertical-align: middle;
	text-align: center;
	font-size: 16px;
  color: #8d8a8a;
}
.wordfooter{
	  font-size: 18px;
    color: #666666;
}
.wdbig{
	  font-size: 57px;
    color: #03a9f4;
}
.glyphicon-menu-right{
	color: #03a9f4;
}
.table tbody>tr>td {
    padding: 8px 8px;
}
</style>

<script type="text/javascript" href="__PUBLIC__/plugs/bootstrap/popover.js"></script>

<link href="/public/plugs/datepicker/css/foundation-datepicker.min.css" rel="stylesheet" type="text/css">
<script src="/public/plugs/datepicker/js/foundation-datepicker.js"></script>
<script src="/public/plugs/datepicker/js/foundation-datepicker.zh-CN.js"></script>


<div class="row">
			<div class="col-lg-12">
						<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 20px;">
					<li role="presentation" class="active">
						 <a href="#home" aria-controls="home" role="tab" data-toggle="tab">企业账户</a>
					</li>
					<li role="presentation">
						<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">充值记录</a>
					</li>
					<li role="presentation">
						<a href="#Consumption" aria-controls="Consumption" role="tab" data-toggle="tab">消费明细</a>
					</li> 
					<li role="presentation">
						<a href="#Statistics" aria-controls="Statistics" role="tab" data-toggle="tab">消费统计</a>
					</li>
				</ul>


				<div class="main-box clearfix">	
				
				<!-- Tab panes -->
				<div class="tab-content">
					
					<div role="tabpanel" class="tab-pane outbox active" id="home">
						
							<div class="my-header con-padding">
							
								<div class="my-title">
									<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
									账户总览 
								</div>
								
								<div class="my-detail">			    
										<div class="ant-avatar">
											<img class="img-circle" id="headImg" src="" />
										</div>
										
										<div class="my-detail-info">
											
												<div class="my-detail-info-item pull-left">
													<p id="adminUser" class="clssword"></p>
													<p class="clssbtm">
														<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
														客户名称
													</p>
												 </div>
												
												 <div class="my-detail-info-item pull-right">
													 <p class="version clssword" id="adminmoney"></p>
													 <p class="clssbtm">
														 <span class="glyphicon glyphicon-yen" aria-hidden="true"></span>
														 余额
													</p>
												 </div>
												 
												<!-- <div style="clear: both;"></div> -->
										</div>
								</div>
								 
							</div>
							
							<div class="seat-wrap con-padding">
								<div class="my-title"> 
								  <i class="icon iconfont icon-zuoxi1"></i> 坐席
								</div>
								
								<div class="seat-num pull-left">
									
									<div class="bignum">
										<div class="wortlf">
											<p class="wdbig" id="aiset">0</p>
											<p class="wordfooter">AI坐席</p>
										</div>
										<!--<div class="wortrg">剩余可用：1个</div>-->
									</div>
									
									 <div class="btn-size-default">
										购买更多并发
										<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
									 </div>
								</div>
								<div class="seat-num pull-right">
									
									<div class="bignum">
										<div class="wortlf">
											<p class="wdbig" id="rengong">0</p> 
										  <p class="wordfooter">人工坐席</p> 
										</div>
										<!--<div class="wortrg">剩余可用：1个</div>-->
									</div>
									
									<div class="btn-size-default">
										购买更多并发
										<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
									</div>
									</div>
	
							</div>
							
							
							<div style="clear: both;"></div>
              
							<div class="restable con-padding">
								
								<div class="my-title">
									<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
									购买坐席记录
								</div>

								<div class="table-responsive">	
												 
									<table class="table table-hover"> 
										<thead class="ant-table-thead">
											<tr>
												<th><span>机器人数量</span></th>
												<th><span>机器人剩余数量</span></th>
												<th><span>服务周期</span></th>
												<th><span>操作</span></th>
											</tr>
										</thead>
											<tbody class="ant-table-tbody">
												<tr class="ant-table-row">
													<td><span id="robotNum"></span>个</td>
													<td id="surplus"></td>
												
													<td id="expirydate">
														
													</td>
													<td>
													<div style="max-width: 190px;">
															<button type="button" class="btn btn-size-default" title="温馨提示"
																			data-container="body" data-toggle="popover" data-placement="left"
																			data-content="如需购买或延期，请联系您的销售经理">
																	更多...
															</button>
													<!-- 	 <a href="#" data-toggle="popover" title="Example popover">延 期</a> -->
													</div>
													</td>
												</tr>
											</tbody>		
									</table>
								</div>
									
							</div>
				
							<!-- <div class="sms-wrap">
								 <div class="my-title">话费</div>
									<div class="table-responsive">					 
										 <table class="table table-hover"> 
											<thead class="ant-table-thead">
												<tr>
													<th><span>线路名</span></th>
													<th><span>线路别名</span></th>
													<th><span>费率类型</span></th>
													<th><span>计费周期</span></th>
													<th><span>价格</span></th>
													<th><span>余额</span></th>
													<th><span>操作</span></th>
												</tr>
											</thead>
												<tbody class="ant-table-tbody">
													<tr class="ant-table-row">
														<td>2个</td>
														<td>2018-08-31 19:12:57</td>
														<td>2018-08-29至2018-09-29</td>
														<td>2个</td>
														<td>2018-08-31 19:12:57</td>
														<td>2018-08-29至2018-09-29</td>
														<td style="max-width: 190px;">
																<button type="button" class="btn btn-size-default">通话详单</button>
																<button type="button" class="btn btn-size-default">余额转移</button>
														</td>
													</tr>
												</tbody>	
													
										 </table>
									</div>
							 </div> -->
							<!-- 	 
								 <div class="sms-wrap">
										<div class="my-title">短信</div>
										<div class="table-responsive">					 
											 <table class="table table-hover"> 
												<thead class="ant-table-thead">
													<tr>
														<th><span>余量</span></th>
														<th><span>操作</span></th>
													</tr>
												</thead>
													<tbody class="ant-table-tbody">
														<tr class="ant-table-row">
															<td style="width: 80%;">
																<div>0条</div>
															</td>
															<td>
															 <div style="max-width: 190px;">
																 <button type="button" class="btn btn-size-default"><span>消耗详单</span></button>
															 </div>
															</td>
														</tr>
													</tbody>		
											 </table>
										</div>
								 </div>
								 -->
					</div>
				
					
					<div role="tabpanel" class="tab-pane" id="profile">
						  		
						<div class="main-context"> 

								<div class="table-responsive">		
							
										<section class="navbar navbar-default main-box-header clearfix">
													
											<div class="pull-right">
							
												<div class="form-inline" method="get" role="form">
							
													<div class="form-group">
														<label class="statusSelect">时间范围:</label>
														<div class="col-lg-9 col-sm-9">
															<div class="col-lg-12 col-sm-12">
																<input type="text" style="width:167px;" placeholder="请选择开始时间" class="form-control" id="startDate" name="startDate" value="" readonly="" />
															</div>
															<script>
															$('#startDate').fdatepicker({
																format: 'yyyy-mm-dd',
																pickTime: false
															});
															</script>	
															
														</div>
													</div>
													至
													<div class="form-group">
							
														<div class="col-lg-9 col-sm-9">
															<div class="col-lg-12 col-sm-12">
																<input type="text" class="form-control" placeholder="请选择结束时间" id="endTime" name="endTime" value="" readonly="" />
															</div>
							
															<script>
																$('#endTime').fdatepicker({
																	format: 'yyyy-mm-dd',
																	pickTime: false
																});
															</script>	
															
														</div>
							
													</div>
							
													<div class="form-group">
															<label>所属账号：</label>
															<input type="text" class="form-control" style="width:120px;" id="Personal" name="Personal" placeholder="请输入所属账号">
													</div>&nbsp;&nbsp;
													<div class="form-group"> 
														<label class="statusSelect">状态：</label>
														<select style="width:100px;" name="status" id="status" class="form-control">
															<option value="" selected="">全部</option>
															<option value="0">未成功</option>
															<option value="1">已成功</option>
														</select>
												</div>
													<span class="btn btn-primary" type="button" onclick="searchdata(1,1);">搜索</span>
												
							
												</div>
																																	 
											</div>  
											
										</section>
																  		 
											 
									<table class="table table-bordered table-hover"> 
											<thead class="ant-table-thead">
												<tr>
													<th>所属账号</th>
													<th>充值金额</th>
													<th>当前余额</th>
													<th>充值类型</th>
													<th>状态</th>
												
													<th>充值时间</th>
													<th>操作人</th>
												</tr>
											</thead>
											
											<tbody class="ant-table-tbody" id="depositlist">
												
									
											</tbody>		
									</table>
									
									<div id="modalpagybody"></div>
									
								</div>
								<div class="component-page-empty" id="desempty">
									<div class="empty-tip line">暂无数据</div>
								</div>
			
						</div>
						  				
					</div>
					
					
					<div role="tabpanel" class="tab-pane" id="Consumption">
				
							<div class="main-context"> 
				
									<div class="table-responsive">			
											<section class="navbar navbar-default main-box-header clearfix">
														
												<div class="pull-right">
								 
													<div class="form-inline" method="get" role="form">
								 
														<div class="form-group">
															<label class="statusSelect">时间范围:</label>
															<div class="col-lg-9 col-sm-9">
																<div class="col-lg-12 col-sm-12">
																	<input type="text" style="width:167px;"  placeholder="请选择开始时间" class="form-control" id="startTime" name="startTime" value="" readonly="" />
																</div>
																<script>
																$('#startTime').fdatepicker({
																	format: 'yyyy-mm-dd',
																	pickTime: false
																});
																</script>	
																
															</div>
														</div>
														至
														<div class="form-group">
								 
															<div class="col-lg-9 col-sm-9">
																<div class="col-lg-12 col-sm-12">
																	<input type="text" class="form-control" placeholder="请选择结束时间" id="endDate" name="endDate" value="" readonly="" />
																</div>
								 
																<script>
																	$('#endDate').fdatepicker({
																		format: 'yyyy-mm-dd',
																		pickTime: false
																	});
																</script>	
																
															</div>
								 
														</div>
								 
														<div class="form-group">
																<label>商家：</label>
																<input type="text" class="form-control" style="width:120px;" id="ownerps" name="ownerps" placeholder="请输入商家">
														</div>&nbsp;&nbsp;
													
														<span class="btn btn-primary" type="button" onclick="orderRecharge(1,1);">搜索</span>
													
								 
													</div>
																																		
												</div>  
												
											</section>
											 												
										<table class="table table-bordered table-hover"> 
												<thead class="ant-table-thead">
													<tr>
														<th>商家</th>
														<th>客户名称</th>
														<th>被叫号码</th>
														<th>消费金额</th>
													
														<th>计费单价</th>
														<th>通话时长</th>
														<th>识别单价</th>
														<th>识别次数</th>
														

														<th>计费时间</th>
														
													</tr>
												</thead>
												
												<tbody class="ant-table-tbody" id="orderlist">
													
													
												</tbody>		
										</table>
										
										
										<div id="modalbody"></div>
										
									</div>
									
									<div class="component-page-empty" id="componentempty">
										<div class="empty-tip line">暂无数据</div>
									</div>
									
							</div>
		
					</div>
					
						
					<div role="tabpanel" class="tab-pane" id="Statistics">
				
							<div class="main-context"> 
				
									<div class="table-responsive">			
											<section class="navbar navbar-default main-box-header clearfix">
														
												<div class="pull-right">
								 
													<div class="form-inline" method="get" role="form">
								 
														<div class="form-group">
															<label class="statusSelect">日期范围:</label>
															<div class="col-lg-9 col-sm-9">
																<div class="col-lg-12 col-sm-12">
																	<input type="text" style="width:167px;" placeholder="请选择开始日期" class="form-control" id="sTime" name="sTime" value="" readonly="" />
																</div>
																<script>
																$('#sTime').fdatepicker({
																	format: 'yyyy-mm-dd',
																	pickTime: false
																});
																</script>	
																
															</div>
														</div>
														至
														<div class="form-group">
								 
															<div class="col-lg-9 col-sm-9">
																<div class="col-lg-12 col-sm-12">
																	<input type="text" class="form-control" placeholder="请选择结束日期" id="eTime" name="eTime" value="" readonly="" />
																</div>
								 
																<script>
																	$('#eTime').fdatepicker({
																		format: 'yyyy-mm-dd',
																		pickTime: false
																	});
																</script>	
																
															</div>
								 
														</div>
								          
													<?php if($super == '1'): ?>
														<div class="form-group">
																<label>用户名称：</label>
																
																<select style="width:120px;" name="companyName" id="companyName" class="form-control">
																	<option value=" " selected="">请选择用户</option>
																	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
																		<option value="<?php echo (isset($cvo['id']) && ($cvo['id'] !== '')?$cvo['id']:""); ?>"><?php echo (isset($cvo['username']) && ($cvo['username'] !== '')?$cvo['username']:""); ?></option>
																	<?php endforeach; endif; else: echo "" ;endif; ?>
																</select>
												
														</div>
												  <?php endif; ?>	
														
														&nbsp;&nbsp;
													
														<span class="btn btn-primary" type="button" onclick="orderGrouping(1,1);">搜索</span>
													
								 
													</div>
																																		
												</div>  
												
											</section>
																							
										<table class="table table-bordered table-hover"> 
												<thead class="ant-table-thead">
													<tr>
														<th>日期</th>
														<th>金额</th>
														<th>识别次数</th>
														<th>通话时间长</th>
													</tr>
												</thead>
												
												<tbody class="ant-table-tbody" id="statisticslist">
												
												</tbody>	
													
										</table>
										
										
										<div id="consumepage"></div>
										
									</div>
									
									<div class="component-page-empty" id="consumeempty">
										<div class="empty-tip line">暂无数据</div>
									</div>
									
							</div>
		
					</div>
									
				
	</div>

		</div>
	</div>				
</div>


 <script type="text/javascript">
	 
 var despage = 1;
 	var page = 1;
	var cpage = 1;

 $(function(){
	 
   userInfo();
	 
	 orderRecharge(page,0);
	 
	 searchdata(despage,0);
	 
	 orderGrouping(cpage,0);
	 
	 $("[data-toggle='popover']").popover();
   
 }) 

	function userInfo(){	
 
		var url = "<?php echo url('getInformation'); ?>";	
		$.ajax({
			url : url,
			dataType : "json", 
			type : "post",
			data : {},
			success: function(data){
				
				if(data.code=="0"){
					
					var mresult = data.data.mresult; 
					$("#adminUser").text(mresult.username);
					if(mresult.headImg){
						$("#headImg").attr("src",mresult.headImg);
					}
					else{
					$("#headImg").attr("src",'/uploads/picture/20180817/2b9ed9374d08157949a1feb6741208c3.jpg');
					
					}
					if(mresult.money){
				   	$("#adminmoney").text(mresult.money);
					}
					$("#aiset").text(mresult.robot_cnt);
					$("#rengong").text(data.data.ainum);
					$("#robotNum").text(mresult.robot_cnt);
					$("#surplus").text(mresult.rnum);
					$("#expirydate").text(mresult.create_time + " 至 " + mresult.expiry_date);

				}else{
					console.log(data.msg);
				}
   
         

			},
			error: function() {
				console.log('获取列表失败。');
			}
		});
	 
	}	

 </script>
 
 <script type="text/javascript">
	
  // 订购充值 的搜索	
	var startDate,endTime,personal,status;
  function recharge(page){
		
		 	var url = "<?php echo url('getConsume'); ?>";	
		 	$.ajax({
		 					url : url,
		 					dataType : "json", 
		 					type : "post",
		 					data : {
								'page':page,
								'startDate':startDate,
								'endTime':endTime,
								'personal':personal,
								'status':status
								},
		 				
		 					success: function(data){
								
		             if(data.code == 0){
									 
										var total = data.data.total;
										var Nowpage = data.data.Nowpage;
										var page = data.data.page;
										var Nowpage = parseInt(Nowpage);
										
										var data = data.data.list;
											if(data.length > 0){
												
													$("#desempty").css("display","none");
												
													$("#depositlist").find("tr").remove();
													
													for(var i=0;i<data.length;i++){
														
													
														var id = data[i].id;
														var username = data[i].username;
														var menoy = data[i].menoy;
														var type = data[i].type;
														var status = data[i].status;
														var create_time = data[i].create_time;
														var deposit_type = data[i].deposit_type;
														
														var typestr = "现金";
														if(type == '1'){
															var typestr = "语音充值";
														}
														var strstatus = "未成功";
														if(status == "1"){
																strstatus = "已成功";
														}
			 
														var string = '<tr class="itemId'+id+'" alt="'+id+'">'
														+'<td>'+username+'</td>'
														+'<td>'+menoy+'</td>'
														+'<td>'+data[i].balance+'</td>'
														+'<td>'+typestr+'</td>'
														+'<td>'+strstatus+'</td>'
														
														+'<td>'+create_time+'</td>'
														+'<td>'+data[i].operName+'</td>';
														string += '</tr>';
														$("#depositlist").append(string); 
				 
													}
													
													var prepage = Nowpage-1;
													var nextpage = Nowpage+1;
													
													var str = '<div class="row">'
													+'<div class="col-sm-3 text-left">'
																
													+'<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">'
													+'<tbody><tr>'
													+'<td class="text-center">总充值金额：'
													+'</td>'
													+'<td class="text-center">'+total+'&nbsp;元'
													+'</td>'
																				
													+'</tr> '
													+'</tbody></table>'                                     
						
													+'</div>'
													+'<div class="col-sm-9 text-right">'
													+'<ul class="pagination">';
													
													if(Nowpage == 1){
														str += '<li id="prevbtn" class="disabled"><span>«</span></li> ';
													}else{
														str += '<li><a href="javascript:void(0);" onclick="searchdata('+prepage+',0);"><span>«</span></a></li> ';
													}
													
													if(page > 10){
													
														if(Nowpage < 7){
															for(var i=0;i<page;i++){
																var nownum = i+1;
																if(nownum < 9){
																		if(nownum == Nowpage){
																			str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+' </a></li> ';  
																		}else{
																			str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+' </a></li> ';  
																		}
																}
																
																if(nownum == 9 && nownum != Nowpage){
																		str += '<li class="disabled"><span>...</span></li>';  
																}else if(nownum == 9){
																	str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+'</a></li> ';  
																}
															
																	if(nownum > (page-2)){
																			if(nownum == Nowpage){
																				str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+' </a></li> ';  
																			}else{
																				str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+' </a></li> ';  
																			}
																	}
				 
																}
														}else if(Nowpage > 6 && Nowpage < (page-6)){
															for(var i=0;i<page;i++){
																var nownum = i+1;
																var Nowpage = parseInt(Nowpage);
																if(nownum < 3){
																	str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+' </a></li> '; 
																}
																
																if((nownum > Nowpage-5) && (nownum < Nowpage+5)){
															
																					if(nownum == (Nowpage-4)){
																						str += '<li class="disabled"><span>...</span></li>';
																					}   
																				
																						if(nownum > (Nowpage-4) && nownum < Nowpage){
																							str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+'</a></li>'; 
																						}  
																					
																						if(nownum == Nowpage){
																						str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+'</a></li>';  
																						} 
																					
																						if(nownum < (Nowpage + 4) && nownum > Nowpage){
																						str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+'</a></li>'; 
																						}  
																			
																						if(nownum == (Nowpage + 4)){
																					
																						str += '<li class="disabled"><span>...</span></li>';
																						}   
																	}
																	
																if(nownum > (page-2)){
																	var Nowpage = parseInt(Nowpage);
																	if(nownum == Nowpage){
																				str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+'</a></li>';
																		}else{
																			str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+'</a></li> ';
																		}   
																
																	}     
				 
																}
														}else{
															
															for(var i=0;i<page;i++){
																var nownum = i+1;
																if(nownum<3){
																	str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+' </a></li>';  
																}
															
																if(nownum == (page-10) && nownum != Nowpage){
																	str += '<li class="disabled"><span>...</span></li>';   
																}else if(nownum == (page-10) && nownum == Nowpage){
																	str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+'</a></li>';   
																}
																
																if(nownum > (page-10)){
																	if(nownum == Nowpage){
																		str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+'</a></li> ';   
																	}else{
																		str += '<li ><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+'</a></li>';   
																	}
																}
																
																
															}
													
																
														}
													}else{
															for(var i=0;i<page;i++){
																var nownum = i+1;
																if(nownum == Nowpage){
																	str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+' </a></li> ';  
																}else{
																	str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+',0);">'+nownum+' </a></li> ';  
																}
															}
													}
													
								
												
													if(Nowpage == page){
														str += '<li id="prevbtn" class="disabled"><span>»</span></li> ';
													}else{
														str += '<li><a href="javascript:void(0);" onclick="searchdata('+nextpage+',0);"><span>»</span></a></li>';
													}
												
													str += '</ul>'
													+'</div>'
													+'</div>'
													
													$("#modalpagybody").find("div").remove();
													$("#modalpagybody").append(str); 
													
													}
											else{
												
													$("#desempty").css("display","block");
													$("#modalpagybody").find("div").remove();
													$("#depositlist").find("tr").remove();
										
											}
											
								 }else{
															$("#desempty").css("display","block");
															$("#desempty").css("text-align","center");
															$("#modalpagybody").find("div").remove();
															$("#depositlist").find("tr").remove();
								 }
		 					
		 					},
		 					error : function() {
		 						alert('获取列表失败。');
		 					}
		 		});
		 	
	
  }	 
  	 
 //获取订购充值列表
 function searchdata(page,type){	

  		if(type == 1){
  			startDate = $("#startDate").val();
  			endTime = $("#endTime").val();
  			personal = $("#Personal").val();
  			status = $("#status").val();
  		}
  
	    recharge(page);
 }	
 
 </script>
 
 
 <script type="text/javascript">
	 
	//获取等待列表
 	var startTime,endDate,ownerps;

	 	function orderRecharge(page,type){	
			
	     		if(type == 1){
	     			startTime = $("#startTime").val();
	     			endDate = $("#endDate").val();
	     			ownerps = $("#ownerps").val();
	     		}
	     
	     		consumption(page);
	  }	
	 
	 function consumption(page){
		 	
		 		var url = "<?php echo url('getorderRecharge'); ?>";	
		 		$.ajax({
		 						url : url,
		 						dataType : "json", 
		 						type : "post",
		 						data : {
									'page':page,
									'startTime':startTime,
									'endDate':endDate,
									'ownerps':ownerps,
									},
		 					
		 						success: function(data){
									 if(data.code == 0){
												var total = data.data.total;
												var Nowpage = data.data.Nowpage;
												var page = data.data.page;
												var Nowpage = parseInt(Nowpage);
												
												var data = data.data.list;
												if(data.length > 0){
													
															$("#componentempty").css("display","none");
													
															$("#orderlist").find("tr").remove();
															
															for(var i=0;i<data.length;i++){
																
																var id = data[i].id;
																var musername = data[i].musername;
																if (!musername){
																	musername = '--';
																}
																var ausername = data[i].ausername;
																var owner = data[i].owner;
																var member_id = data[i].member_id;
																var mobile = data[i].mobile;
																var duration = data[i].duration;
																var money = data[i].money;
																var time_price = data[i].time_price;
																var month_price = data[i].month_price;
																var asr_price = data[i].asr_price;
																var create_time = data[i].create_time;
																var end_time = data[i].end_time;
																var asr_cnt = data[i].asr_cnt;
						 
																var string = '<tr class="itemId'+id+'" alt="'+id+'">'
																	+'<td>'+ausername+'</td>'
																	+'<td>'+musername+'</td>'
																	+'<td>'+mobile+'</td>'
																	+'<td>'+money+'（元）</td>'
																	
																	+'<td>'+time_price+'</td>'
																	+'<td>'+duration+'</td>' 
																	+'<td>'+asr_price+'</td>'
																	+'<td>'+asr_cnt+'</td>'
																	  
																	+'<td>'+create_time+'</td>'
																	
																	string += '</tr>';
																	$("#orderlist").append(string); 
						 
															}
															
															var prepage = Nowpage-1;
															var nextpage = Nowpage+1;
														
															var str = '<div class="row">'
															+'<div class="col-sm-3 text-left">'
																		
															+'<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">'
															+'<tbody><tr>'
															+'<td class="text-center">总消费金额：'
															+'</td>'
															+'<td class="text-center">'+total+'&nbsp;元'
															+'</td>'
																					
															+'</tr> '
															+'</tbody></table>'                                     
								
															+'</div>'
															+'<div class="col-sm-9 text-right">'
															+'<ul class="pagination">';
														
															if(Nowpage == 1){
																str += '<li id="prevbtn" class="disabled"><span>«</span></li> ';
															}else{
																str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+prepage+',0);"><span>«</span></a></li> ';
															}
															
															if(page > 10){
															
																if(Nowpage < 7){
																	for(var i=0;i<page;i++){
																		var nownum = i+1;
																		if(nownum < 9){
																			if(nownum == Nowpage){
																				str += '<li class="active"><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+' </a></li> ';  
																			}else{
																				str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+' </a></li> ';  
																			}
																		}
																		
																		if(nownum == 9 && nownum != Nowpage){
																			str += '<li class="disabled"><span>...</span></li>';  
																		}else if(nownum == 9){
																			str += '<li class="active"><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+'</a></li> ';  
																		}
																	
																			if(nownum > (page-2)){
																				if(nownum == Nowpage){
																					str += '<li class="active"><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+' </a></li> ';  
																				}else{
																					str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+' </a></li> ';  
																				}
																			}
						 
																	}
																}else if(Nowpage > 6 && Nowpage < (page-6)){
																	for(var i=0;i<page;i++){
																		var nownum = i+1;
																		var Nowpage = parseInt(Nowpage);
																		if(nownum < 3){
																			str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+' </a></li> '; 
																		}
																		
																		if((nownum > Nowpage-5) && (nownum < Nowpage+5)){
																	
																						if(nownum == (Nowpage-4)){
																								str += '<li class="disabled"><span>...</span></li>';
																						}   
																						
																							if(nownum > (Nowpage-4) && nownum < Nowpage){
																								str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+'</a></li>'; 
																							}  
																						
																							if(nownum == Nowpage){
																							str += '<li class="active"><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+'</a></li>';  
																							} 
																						
																							if(nownum < (Nowpage + 4) && nownum > Nowpage){
																								str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+'</a></li>'; 
																							}  
																					
																							if(nownum == (Nowpage + 4)){
																							
																							str += '<li class="disabled"><span>...</span></li>';
																							}   
																		}
																		
																	if(nownum > (page-2)){
																		var Nowpage = parseInt(Nowpage);
																		if(nownum == Nowpage){
																					str += '<li class="active"><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+'</a></li>';
																			}else{
																					str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+'</a></li> ';
																			}   
																	
																		}     
						 
																	}
																}else{
																	
																	for(var i=0;i<page;i++){
																		var nownum = i+1;
																		if(nownum<3){
																			str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+' </a></li>';  
																		}
																	
																		if(nownum == (page-10) && nownum != Nowpage){
																			str += '<li class="disabled"><span>...</span></li>';   
																		}else if(nownum == (page-10) && nownum == Nowpage){
																			str += '<li class="active"><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+'</a></li>';   
																		}
																		
																		if(nownum > (page-10)){
																			if(nownum == Nowpage){
																				str += '<li class="active"><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+'</a></li> ';   
																			}else{
																				str += '<li ><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+'</a></li>';   
																			}
																		}
																		
																		
																	}
														
																		
																}
															}else{
																for(var i=0;i<page;i++){
																	var nownum = i+1;
																	if(nownum == Nowpage){
																		str += '<li class="active"><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+' </a></li> ';  
																	}else{
																		str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+nownum+',0);">'+nownum+' </a></li> ';  
																	}
																}
															}
															
										
													
															if(Nowpage == page){
																str += '<li id="prevbtn" class="disabled"><span>»</span></li> ';
															}else{
																str += '<li><a href="javascript:void(0);" onclick="orderRecharge('+nextpage+',0);"><span>»</span></a></li>';
															}
														
															str += '</ul>'
															+'</div>'
															+'</div>'
														
															$("#modalbody").find("div").remove();
															$("#modalbody").append(str); 
															
														}
												else{
													
															$("#componentempty").css("display","block");
															$("#modalbody").find("div").remove();

															$("#orderlist").find("tr").remove();
												
												}
												
									 }else{
													$("#componentempty").css("display","block");
													$("#modalbody").find("div").remove();

													$("#orderlist").find("tr").remove();
									 }
		 				
		 						},
		 						error : function() {
		 							alert('获取列表失败。');
		 						}
		 			});
		 		
	 }
	 
 </script>
 
 <script type="text/javascript">
	  
	//获取等待列表
	var sTime,eTime,cpyName;

	function orderGrouping(page,type){	
		
				if(type == 1){
					sTime = $("#sTime").val();
					eTime = $("#eTime").val();
					cpyName = $("#companyName").val();
				}
		 
				statistics(page);
	}	

	function statistics(page){
		
			var url = "<?php echo url('getGrouping'); ?>";	
			$.ajax({
							url : url,
							dataType : "json", 
							type : "post",
							data : {
								'page':page,
								'startTime':sTime,
								'endDate':eTime,
								'cpyName':cpyName,
								},
						
							success: function(data){
							
								
								 if(data.code == 0){
											var total = data.data.total;
											var Nowpage = data.data.Nowpage;
											var page = data.data.page;
											var Nowpage = parseInt(Nowpage);
											
											var data = data.data.list;
											if(data.length > 0){
												
														$("#consumeempty").css("display","none");
												
														$("#statisticslist").find("tr").remove();
														
														for(var i=0;i<data.length;i++){
															
															var id = data[i].id;
															
															var owner = data[i].owner;
											
													
															var duration = data[i].duration;
															var money = data[i].money;
												
														
															var create_time = data[i].create_time;
															
															var asr_cnt = data[i].asr_cnt;
															if(money == "" || money == null){
																money = 0;
															}
					 
															var string = '<tr class="itemId'+id+'" alt="'+id+'">'
														  	+'<td>'+create_time+'</td>'
																+'<td>'+money+'（元）</td>'
																+'<td>'+asr_cnt+'</td>'
																+'<td>'+duration+'</td>'
																string += '</tr>';
																$("#statisticslist").append(string); 
					 
														}
														
														var prepage = Nowpage-1;
														var nextpage = Nowpage+1;
													
														var str = '<div class="row">'
														+'<div class="col-sm-3 text-left">'
																	
														+'<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">'
														+'<tbody><tr>'
														+'<td class="text-center">总消费金额：'
														+'</td>'
														+'<td class="text-center">'+total+'&nbsp;元'
														+'</td>'
																				
														+'</tr> '
														+'</tbody></table>'                                     
							
														+'</div>'
														+'<div class="col-sm-9 text-right">'
														+'<ul class="pagination">';
													
														if(Nowpage == 1){
															str += '<li id="prevbtn" class="disabled"><span>«</span></li> ';
														}else{
															str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+prepage+',0);"><span>«</span></a></li> ';
														}
														
														if(page > 10){
														
															if(Nowpage < 7){
																for(var i=0;i<page;i++){
																	var nownum = i+1;
																	if(nownum < 9){
																		if(nownum == Nowpage){
																			str += '<li class="active"><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+' </a></li> ';  
																		}else{
																			str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+' </a></li> ';  
																		}
																	}
																	
																	if(nownum == 9 && nownum != Nowpage){
																		str += '<li class="disabled"><span>...</span></li>';  
																	}else if(nownum == 9){
																		str += '<li class="active"><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+'</a></li> ';  
																	}
																
																		if(nownum > (page-2)){
																			if(nownum == Nowpage){
																				str += '<li class="active"><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+' </a></li> ';  
																			}else{
																				str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+' </a></li> ';  
																			}
																		}
					 
																}
															}else if(Nowpage > 6 && Nowpage < (page-6)){
																for(var i=0;i<page;i++){
																	var nownum = i+1;
																	var Nowpage = parseInt(Nowpage);
																	if(nownum < 3){
																		str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+' </a></li> '; 
																	}
																	
																	if((nownum > Nowpage-5) && (nownum < Nowpage+5)){
																
																					if(nownum == (Nowpage-4)){
																							str += '<li class="disabled"><span>...</span></li>';
																					}   
																					
																						if(nownum > (Nowpage-4) && nownum < Nowpage){
																							str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+'</a></li>'; 
																						}  
																					
																						if(nownum == Nowpage){
																						str += '<li class="active"><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+'</a></li>';  
																						} 
																					
																						if(nownum < (Nowpage + 4) && nownum > Nowpage){
																							str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+'</a></li>'; 
																						}  
																				
																						if(nownum == (Nowpage + 4)){
																						
																						str += '<li class="disabled"><span>...</span></li>';
																						}   
																	}
																	
																if(nownum > (page-2)){
																	var Nowpage = parseInt(Nowpage);
																	if(nownum == Nowpage){
																				str += '<li class="active"><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+'</a></li>';
																		}else{
																				str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+'</a></li> ';
																		}   
																
																	}     
					 
																}
															}else{
																
																for(var i=0;i<page;i++){
																	var nownum = i+1;
																	if(nownum<3){
																		str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+' </a></li>';  
																	}
																
																	if(nownum == (page-10) && nownum != Nowpage){
																		str += '<li class="disabled"><span>...</span></li>';   
																	}else if(nownum == (page-10) && nownum == Nowpage){
																		str += '<li class="active"><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+'</a></li>';   
																	}
																	
																	if(nownum > (page-10)){
																		if(nownum == Nowpage){
																			str += '<li class="active"><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+'</a></li> ';   
																		}else{
																			str += '<li ><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+'</a></li>';   
																		}
																	}
																	
																	
																}
													
																	
															}
														}else{
															for(var i=0;i<page;i++){
																var nownum = i+1;
																if(nownum == Nowpage){
																	str += '<li class="active"><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+' </a></li> ';  
																}else{
																	str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+nownum+',0);">'+nownum+' </a></li> ';  
																}
															}
														}
														
									
												
														if(Nowpage == page){
															str += '<li id="prevbtn" class="disabled"><span>»</span></li> ';
														}else{
															str += '<li><a href="javascript:void(0);" onclick="orderGrouping('+nextpage+',0);"><span>»</span></a></li>';
														}
													
														str += '</ul>'
														+'</div>'
														+'</div>'
													
														$("#consumepage").find("div").remove();
														$("#consumepage").append(str); 
														
													}
											else{
												
														$("#consumeempty").css("display","block");
														$("#consumepage").find("div").remove();
														$("#statisticslist").find("tr").remove();
											
											}
											
								 }else{
												$("#consumeempty").css("display","block");
												$("#consumepage").find("div").remove();
												$("#statisticslist").find("tr").remove();
								 }
					
							},
							error : function() {
								alert('获取列表失败。');
							}
				});
			
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
