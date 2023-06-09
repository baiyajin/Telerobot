<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"/www/wwwroot/web/application/user/view/index/index.html";i:1551974590;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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
	canvas{
	       -moz-user-select: none;
	       -webkit-user-select: none;
	       -ms-user-select: none;
	}
	.panel-default>.panel-heading {
	    background-color: #e8e8e8;
	    border-color:#f5eaea;
	    color: #f5eaea;
	    border-radius: 0;
	    background-clip: padding-box;
	}
	.panel-title {
	    margin-top: 0;
	    margin-bottom: 0;
	    font-size: 16px;
	    color: #000000;
	}
	.panel-mini{
	float:left;
	width:8%;
	height:110px;
	margin-bottom: 0px;
	background-color:#337ab7;
	margin-right:1%;
	text-align:center;
	}
	.panel-mini>.mini-height{
	border-color: #90989c;
	text-align:center;
	}

	.panel-body .panel-step{
		float:left;
		width:25%;
		margin-bottom: 0px;
	}

	.panel-step>.mini-height{
	border-color: #90989c;
	text-align:center;
	}

	.up-num{
	color:#a99b9b;
	font-size:40px;
	}
	.date-left{

	    float: left;
	    width: 86%;
	    text-align: center;
	}
	.date-right{
	   float: left;
	    width: 100%;
	    text-align: center;
		    padding-top: 10px;
	}
	.up-num span{
	        border-radius: 30px;
	    padding: 14px;
	    border: 1px solid #ccc;
	    font-size: 30px;
	    font-weight: 600;
	    color: #337ab7;
	}
	.up-num i{
	    float: right;
	    line-height: 2;
	    font-size: 35px;
	    color: #ddd;
	}

	.call-number {
	    /* line-height: 1; */
	    font-size: 78px;
	    color: white;
	    font-weight: bold;
	}

    .imgbtn{
    	cursor: pointer;
    	border-bottom: 1px solid;
    	padding: 7px 17px;
    }
    
    .fr {
	    float: right;
	}
	.fl{
		 float: left;
	}
	.btn-default, .wizard-cancel, .wizard-back {
	    background-color: #90a4ae;
	    border-color: #607d8b;
	    color: #fff;
	}

    .home-call-l {
	    position: absolute;
	    display: inline-block;
	    top: 13.4rem;
	    left: 10px;
	    width: 9%;
	}

	.home-call-block {
	    position: relative;
	    margin-top: 1.5rem;
	    padding: .5rem 0;
	    width: 100%;
	    height: 5rem;
	    background: #f8f8f8;
	    border-radius: .25rem;
	}

	.home-call-block .left {
	    position: absolute;
	    display: -ms-flexbox;
	    display: flex;
	    display: -webkit-flex;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    -ms-flex-pack: center;
	    justify-content: center;
	    top: 0;
	    bottom: 0;
	    left: .5rem;
	    width: 1.5rem;
	    height: 100%;
	}

	
	.home-call-block .left>.circle {
	    display: inline-block;
	    width: 1.5rem;
	    height: 1.5rem;
	    border: .25rem solid #8995a0;
	    border-radius: 50%;
	    transform: rotate(45deg);
	}
	.home-call-block .left>.circle-purple {
	    border-color: #ef44ca;
	}
	.home-call-block .right {
	    float: right;
	    margin-right: 1.5rem;
	    color: #8995a0;
	}
	.home-call-block .right>.num {
	    font-size: 1.75rem;
	    line-height: 2rem;
	    color: #2c393f;
	    white-space: nowrap;
	}
	.home-call-block .right>p {
	    font-size: .6rem;
	    line-height: 1rem;
	    text-align: center;
	}
	.home-call-block .left>.circle-blue {
	    border-color: #02c1de;
	}
	.onetitle{
		font-size: 16px;
		margin-bottom: 5px;
		color: #5a5a5a;
	}
</style>

<script src="__PUBLIC__/plugs/echarts/echarts.min.js"></script>

<!-- <script src="__PUBLIC__/plugs/highcharts/js/highcharts.js"></script>
 -->
<script src="__PUBLIC__/plugs/highcharts/highcharts.js"></script>
<script src="__PUBLIC__/plugs/highcharts/modules/series-label.js"></script>
<script src="__PUBLIC__/plugs/highcharts/modules/exporting.js"></script>
<script src="__PUBLIC__/plugs/highcharts/modules/export-data.js"></script>

<div class="row">
	
<div class="col-lg-12">

	 
			<div class="panel panel-default">
				
			 
			  <div class="panel-body" style="padding:10px;">
					
						<div class="onetitle">
							<i style="font-size: 20px;" class="icon iconfont icon-tongji"></i>
							<span class="panel-title">拨打统计</span>
						</div>
						
				
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							<div class="panel panel-default panel-mini">
								<span class="call-number">0</span>
							</div>
							
					

			  </div>
			</div>
			
			<div class="panel panel-default" style="width: 48%;float: left;margin-right: 11px;">
				
					<div class="panel-body">
						
						<div class="onetitle">
							<i style="font-size: 20px;" class="icon iconfont icon-kuaijiebiaoqian"></i>
							<span class="panel-title">快捷操作</span>
						</div>
							
						<div class="panel panel-default panel-step " style="border:none;">
						
							<div class="panel-body" style="text-align:center;padding: 12px 0px;">
							 <div class="up-num">
							 <span class="icon iconfont icon-yewuchangjing"></span>
							 <i class="icon iconfont icon-jiantou1"></i>
							</div>
							
							 <div class="date-left">添加话术场景<br/><a href="<?php echo url('scenarios/scene'); ?>">去添加></a></div>
							</div>
						</div>
						
						<div class="panel panel-default panel-step" style="border:none;">
						
							<div class="panel-body" style="text-align:center;padding: 12px 0px;">
							 <div class="up-num">
							 <span class="icon iconfont icon-daoru"></span>
							 <i class="icon iconfont icon-jiantou1"></i>
							</div>
							
							 <div class="date-left">导入客户号码<br/><a href="<?php echo url('member/memberlist'); ?>">去导入></a></div>
							</div>
						</div>
						
						<div class="panel panel-default panel-step" style="border:none;">
						
							<div class="panel-body" style="text-align:center;padding: 12px 0px;">
							 <div class="up-num">
							 <span class="icon iconfont icon-fuwurenwuguanli"></span>
							 <i class="icon iconfont icon-jiantou1"></i>
							</div>
							
							 <div class="date-left">添加拨打任务<br/><a href="<?php echo url('plan/newindex'); ?>">去添加></a></div>
							</div>
						</div>
						
						<div class="panel panel-default panel-step" style="border:none;">
						
							<div class="panel-body" style="padding: 12px 26px;">
							 <div class="up-num">
							 <span class="icon iconfont icon-boda"></span>
							</div>
							<br/>
							
							 <div class="date-left" style="width: 65%;    padding-bottom: 11px;">自动拨打<br/></div>
							</div>
						</div>
						
					</div>
			  
			</div>			
			<div class="panel panel-default" style="width:51%;float: left;">
			
			  <div class="panel-body">
					<div class="onetitle">
						 <i style="font-size: 20px;" class="icon iconfont icon-shuju"></i>
						 <span class="panel-title">我的数据</span>
					  </div>
					<div class="panel panel-default panel-step " style="border:none;">
					
					  <div class="panel-body" style="text-align:center;padding: 12px 0px;">
						 <div class="up-num" id="mtotal">
						   0
					   </div>
						 <div class="date-right">待拨打数量<br/><a href="<?php echo url('plan/newindex'); ?>">查看></a></div>
					  </div>
					</div>
					
					<div class="panel panel-default panel-step" style="border:none;">
					
					  <div class="panel-body" style="text-align:center;padding: 12px 0px;">
						 <div class="up-num" id="simtotal">
						  0
						 </div>
						
						 <div class="date-right">机器座席<br/><a href="<?php echo url('device/robot'); ?>">查看></a></div>
					  </div>
					</div>
					
					<div class="panel panel-default panel-step" style="border:none;">
					
					  <div class="panel-body" style="text-align:center;padding: 12px 0px;">
						 <div class="up-num" id="tsrtotal">
					   	0
						</div>
						
						 <div class="date-right">人工座席<br/><a href="<?php echo url('tsr/index'); ?>">查看></a></div>
					  </div>
					</div>
					
					<div class="panel panel-default panel-step" style="border:none;">
					
					  <div class="panel-body" style="text-align:center;padding: 12px 0px;">
						 <div class="up-num" id="sales">
						  0
						 </div>
					
						
						 <div class="date-right" >销售人员<br/>
						 <a href="<?php echo url('manager/sales'); ?>">查看></a>
						 </div>
					  </div>
					</div>
					
			  </div>
			  
			</div>
		
	</div>
	
	<div class="col-lg-12">
		
		
		 <div class="panel panel-default" style="width: 48%;float:left;margin-right: 11px; height: 405px;">
			 
				<div class="panel-body">
				  <div style="padding-bottom:15px;">
						<i style="font-size: 20px;" class="icon iconfont icon-baobiao1"></i>
					<span class="panel-title">拨打结果</span>
				</div>

				   <span class="fl">
					    <span class="btn btn-primary btn-default imgbtn" id="sevenday" onclick="getreportdata(7);">七天</span>

						<span class="btn btn-primary imgbtn" id="thirtyday" onclick="getreportdata(30);">30天</span>

						<span class="btn btn-primary imgbtn" id="yearsday" onclick="getreportdata(365);">1年</span>
					</span>
                    
                    <span class="fr">
						<span class="btn btn-primary imgbtn btn-default" onclick="changetype(this,'line');">折线图</span>

						<span class="btn btn-primary imgbtn" onclick="changetype(this,'column');">柱状图</span>
                    </span>
				   
					
					<div class="home-call-l fl">

						  <div class="home-call-block">
							   <div class="left">
							     <span class="circle circle-purple"></span>
							   </div> 
							   <div class="right">
								   <p class="num"><?php echo (isset($ydata['Ytotal']) && ($ydata['Ytotal'] !== '')?$ydata['Ytotal']:'0'); ?></p>
								   <p>昨日呼叫总数</p>
							   </div>
						   </div> 

						   <div class="home-call-block">
							   <div class="left">
							      <span class="circle circle-blue"></span>
							   </div> 
							   <div class="right">
							      <p class="num"><?php echo (isset($tdata['Ttotal']) && ($tdata['Ttotal'] !== '')?$tdata['Ttotal']:'0'); ?></p> 
							      <p>今日呼叫总数</p>
							    </div>
						    </div>

					    </div>


					 <div style="width:85%;" class="fr">
				       <div id="container" style="min-width:400px;height:300px;"></div>
					 </div>
				</div>
			</div>
			
			
		 <div class="panel panel-default" style="width:51%;float: left;">
	 
				<div class="panel-body">
					
					<div style="padding-bottom:15px;">
						<i style="font-size: 20px;" class="icon iconfont icon-cansaitubiaozhuanqu-"></i>
						<span class="panel-title">客户意向等级占比 </span>
					</div>
					<span class="btn btn-primary imgbtn btn-default" id="sevendaypie" onclick="getleveldata(7);">七天</span>
					<span class="btn btn-primary imgbtn" id="thirtydaypie" onclick="getleveldata(30);">30天</span>
					<span class="btn btn-primary imgbtn" id="yearsdaypie" onclick="getleveldata(365);">1年</span>

					 <div style="width:85%;">
						  <div id="pieContainer" style="min-width:400px;height:300px;"></div>
					 </div>
					 
				</div>
				
		 </div>
 
 
</div>
	
<script type="text/javascript">	

//改变图形
function changetype(obj,type){

  $(obj).addClass("btn-default");
  $(obj).siblings().removeClass("btn-default");

   types = type; 
   getreportdata(7);

}

function GetDateStr(AddDayCount) { 
	var dd = new Date(); 
	dd.setDate(dd.getDate()+AddDayCount);//获取AddDayCount天后的日期 
	var y = dd.getFullYear(); 
	var m = dd.getMonth()+1;//获取当前月份的日期 
	var d = dd.getDate(); 
	return y+"-"+m+"-"+d; 
} 


var types = 'line';  //column
//获取status
function getreportdata(time){
   
   if(time == 7){

   	  $("#sevenday").addClass("btn-default");
      $("#sevenday").siblings().removeClass("btn-default");
   	
   }else if(time == 30){ 

      $("#thirtyday").addClass("btn-default");
      $("#thirtyday").siblings().removeClass("btn-default");
   	
   }else{
   	  $("#yearsday").addClass("btn-default");
      $("#yearsday").siblings().removeClass("btn-default");
   }

	
	$.ajax({
		type: "POST",
		dataType:'json',
		url: "<?php echo url('backData'); ?>",
		cache: false,
		data:{"time":time},
		success: function(res) {

			//var datalist = JSON.stringify(datalist);


			var step = 1;

			if(time == 30){
				step = 3;
			}


			Highcharts.chart('container', {
					credits: {
						enabled: false
					},
					chart: {
				        type: types
				    },
					title: {
							text: '呼叫折线图'
					},

					subtitle: {
							text: ''
					},

					xAxis:{
						categories: res.backtime,
						labels: {
							step: step
						},
					   title:{
					       text:'日期'
					   }
					},

					yAxis: {
							title: {
									text: '人数'
							}
					},
					legend: {
							layout: 'vertical',
							align: 'right',
							verticalAlign: 'middle'
					},

					plotOptions: {
							series: {
									label: {
											connectorAllowed: false
									},
									pointStart:0
							}
					},
                   
                   /**
                   {
							name: '未拨打',
							data: res.back.zero
					}, */
					series: [{
							name: '拨打排队中',
							data: res.back.one
					}, {
							name: '已接通',
							data: res.back.two
					}, {
							name: '未接听挂断/关机/欠费',
							data: res.back.three
					}, {
							name: '总数',
							data: res.back.total
					}],
					exporting: {
						enabled: false
					},

					responsive: {
							rules: [{
									condition: {
											maxWidth: 500
									},
									chartOptions: {
											legend: {
													layout: 'horizontal',
													align: 'center',
													verticalAlign: 'bottom'
											}
									}
							}]
					}

			});
   
		},
		error: function(data) {
		  alert("获取数据失败");
		}
	});
	
}

function getCallNumber(){
	
	$.ajax({
	   type: "POST",
	   dataType:'json',
	   url: "<?php echo url('getCallNumber'); ?>",
	   cache: false,
	   data:{},
	   success: function(res) {
			if (res.code == 0) {
				if (res.data >0){
					var str = String(res.data);
					var arr = str.split("")
					var callNumberEls =$(".call-number");
					var startIndex = callNumberEls.length - arr.length;
					console.log(callNumberEls.length);
					for(var i=0; i<arr.length; i++){
						$(callNumberEls[startIndex+i]).text(arr[i]);
						//console.log(arr[i]);
					}
					
				}
			} 
	   },
	   error: function(data) {
		// alert("保存数据失败");
	   }
	});
	
}

	
	$.ajax({
		type: "POST",
		dataType:'json',
		url: "<?php echo url('getIsShow'); ?>",
		cache: false,
		data:{},
		success: function(res) {
			
			if(res.code==0){
				 if(res.data == 0){
					 $('#myModal').modal('show');
				 }
				
			}
			console.log(res);

		},
		error: function(data) {
		  console("获取数据失败");
		}
	});


$(function(){
  
 getCallNumber();

 //获取status
 getreportdata(7);

 //获取level
 getleveldata(7);
 
 //获取我的数据(待拨打数量，机器座席，人工座席，销售人员)
 getMydata();
 

});

//获取我的数据
function getMydata(){
		$.ajax({
			type: "POST",
			dataType:'json',
			url: "<?php echo url('getMyData'); ?>",
			cache: false,
			data:{},
			success: function(res) {
				
				if(res.code==0){
					
					$("#mtotal").text(res.data.mtotal);
	        $("#simtotal").text(res.data.simtotal);
					$("#tsrtotal").text(res.data.tsrtotal);
					$("#sales").text(res.data.sales);

				}
				console.log(res);
	
			},
			error: function(data) {
			  console("获取数据失败");
			}
		});
}

window.setInterval("getCallNumber()",30000);

 </script>
 
 
<style type="text/css">
	
	#container {
		min-width: 310px;
		max-width: 800px;
		height: 400px;
		margin: 0 auto
	}
	
</style> 


<script type="text/javascript">
//获取level
function getleveldata(time){

   if(time == 7){

   	  $("#sevendaypie").addClass("btn-default");
      $("#sevendaypie").siblings().removeClass("btn-default");
   	
   }else if(time == 30){ 

      $("#thirtydaypie").addClass("btn-default");
      $("#thirtydaypie").siblings().removeClass("btn-default");
   	
   }else{
   	  $("#yearsdaypie").addClass("btn-default");
      $("#yearsdaypie").siblings().removeClass("btn-default");
   }

	
	$.ajax({
		type: "POST",
		dataType:'json',
		url: "<?php echo url('levelData'); ?>",
		cache: false,
		data:{"time":time},
		success: function(res) {

		 // var datalist = JSON.stringify(datalist);
            var chart = Highcharts.chart('pieContainer', {
            	credits: {
						enabled: false
				},
				chart: {
					spacing : [40, 0 , 40, 0],
					//marginTop: 100
					marginLeft: 150
				},
				title: {
					floating:true,
					text: '客户意向等级占比',
					x: 70
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
			    legend: {
					layout: 'vertical',
					backgroundColor: '#FFFFFF',
					align: 'left',
					verticalAlign: 'top',
					floating: true,
					x: 0,
					y: -20,
					labelFormat:'{name}: <b>{percentage:.1f}%</b>'
					// labelFormatter: function (obj) {
					// 	return this.name + ' {point.percentage:.1f} %';
					// }
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: false,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %',
							style: {
								color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
							}
						},
						point: {
							events: {
								mouseOver: function(e) {  // 鼠标滑过时动态更新标题
									// 标题更新函数，API 地址：https://api.hcharts.cn/highcharts#Chart.setTitle
									chart.setTitle({
										text: e.target.name+ '\t'+ e.target.y + ' %'
									});
								}
								//, 
								// click: function(e) { // 同样的可以在点击事件里处理
								//     chart.setTitle({
								//         text: e.point.name+ '\t'+ e.point.y + ' %'
								//     });
								// }
							}
						},
						showInLegend: true,

					}
				},
				series: [{
					type: 'pie',
					innerSize: '80%',
					name: '意向等级',
					data: [
						{name:'A类(较强)',   y: res.back.typeA},
						['B类 (一般)', res.back.typeB],
						{
							name: 'C类(很少)',
							y: res.back.typeC,
							sliced: true,
							selected: true
						},
						['D类(待观察)', res.back.typeD],
						['E类 (无意向)',  res.back.typeE],
						['F类 (无效客户)',  res.back.typeF],
					]
				}],
				exporting: {
					enabled: false
				}
			}, function(c) { // 图表初始化完毕后的会掉函数
				// 环形图圆心
				var centerY = c.series[0].center[1],
					titleHeight = parseInt(c.title.styles.fontSize);
				// 动态设置标题位置
				c.setTitle({
					y:centerY + titleHeight/2
				});
			});
						    
			   
		},
		error: function(data) {
		  alert("获取数据失败");
		}
	});
	
}
		
</script>
 
  
</div>
	
<!-- 用户协议提示 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">用户协议</h4>
				</div>
				<div class="modal-body">
					  <div>
							<p><b>用户业务承诺书</b></p> 
						
					  <p>
							为保证平台健康、稳定运行，所有平台使用方需知悉并确认，一旦平台发现使用方利用平台进行违法行为，平台有权立即停止服务，不退还所有已付款项，
并立即向有关机关报案。承诺内容包含但不限于如下：
						</p>
						<p>
							一、使用平台进行外呼业务，遵守国家有关法律、法规和各行政规章制度。不开展任何违法、违规业务。
							</p>
							<p>
							二、不利用平台开展各种形式违反社会公德和商业操守的外呼业务。
						</p>
						<p>
							三、不利用提供的平台资源从事危害国家安全、泄露国家机密等违法犯罪行为。
						</p>
						<p>
							四、不利用平台传播妨碍社会治安和宣传封建迷信、淫秽黄色等信息；窃取、泄露国家秘密、情报或者军事机密；煽动民族仇恨、民族歧视，破坏民族团结；组织邪教活动、联络邪教组织成员破坏国家法律、行政法规实施。
						</p>
						<p>
							五、不利用平台进行窃取、诈骗、敲诈勒索。
							</p>
							<p>
							六、用户明确表示拒绝后，不得继续向其发起呼叫。
						</p>
						<p>
							七、规范外呼时段、频率行为等，不得对用户正常生活造成影响。
						</p>
						
	        	</div>
				</div>
				<div class="modal-footer">
					
					<div class="checkbox" style="float:left;">
						<label>
							<input type="checkbox" value="1" name="isagreeshow" id="isagreeshow"> 不再显示
						</label>
					</div>
					
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					
				</div>
    </div>
  </div>
	
	<script type="text/javascript">
		
		$('#myModal').on('hidden.bs.modal', function (e) {
			
		  var isagreeshow =	$("#isagreeshow").prop('checked');
			
			if(isagreeshow){
				 	
				 	$.ajax({
				 		type: "POST",
				 		dataType:'json',
				 		url: "<?php echo url('changeShow'); ?>",
				 		cache: false,
				 		data:{},
				 		success: function(res) {

				 			console.log(res);
				 
				 		},
				 		error: function(data) {
				 		 // alert("获取数据失败");
				 		}
				 	});
			}
		
			
		})
			
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
