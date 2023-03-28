<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"/www/wwwroot/web/application/user/view/member/callrecord.html";i:1551974648;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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
								


<link href="/public/plugs/datepicker/css/foundation-datepicker.min.css" rel="stylesheet" type="text/css">
<script src="/public/plugs/datepicker/js/foundation-datepicker.js"></script>
<script src="/public/plugs/datepicker/js/foundation-datepicker.zh-CN.js"></script>

<style type="text/css">
.input-group-addon {
    background-color: #ffffff;
    border: 1px solid #ccc;
}

.statusSelect {
	line-height: 30px;
	float: left;
}
.component-page-empty > .empty-tip.line {
    text-align: center;
}
.formgroup{
    float: left;
    margin-left:16px;
	margin-bottom: -1px;
 }
</style>
<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix" style="">	
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			  <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-boda"></i>呼叫记录</h1>
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
			
			<div class="form-inline" style="padding-bottom:10px;">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">联系电话</span>
						<input type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="请输入联系电话" style="height:34px;">
						<span class="input-group-btn">
						   <button class="btn btn-primary" type="button" onclick="searchdata(1);">搜索</button>
						</span>
					</div>
					
					<!-- <div class="form-inline pull-right">
						<span class="btn btn-primary" onclick="outexcel();">导出记录</span>
					</div>	 -->
					
				</div>
			
	        <section class="navbar navbar-default main-box-header clearfix">
						
				<div class="pull-right">
					<form class="form-inline" method="get" role="form">
							
						<div class="form-group"> 
					
							<select name="scenarios" onchange="searchdata();" id="scenarios" class="form-control">
								<option value=" " selected="">选择话术</option>
								<?php if(is_array($scenarioslist) || $scenarioslist instanceof \think\Collection || $scenarioslist instanceof \think\Paginator): $i = 0; $__LIST__ = $scenarioslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo $item['id']; ?>">
										<?php echo $item['name']; ?>
									</option>
								<?php endforeach; endif; else: echo "" ;endif; ?>	
							</select>
						</div>&nbsp;	
							
						<div class="form-group"> 
						
							 <select name="task" onchange="searchdata();" id="task" class="form-control">
								<option value=" " selected="">选择外呼任务</option>
								<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo $item['task_id']; ?>">
										<?php echo $item['task_name']; ?>
									</option>
								<?php endforeach; endif; else: echo "" ;endif; ?>	
							 </select>
						</div>&nbsp;
						
		
						<div class="form-group">
								<!-- <label class="statusSelect">拨打时间:</label> -->
								<div class="formgroup">
									
									<input type="text" style="width:110px;" placeholder="选择拨打日期" class="form-control" onchange="searchdata(1);" id="startDate" name="startDate" value="" readonly="" />
										
									<script>
											$('#startDate').fdatepicker({
												format: 'yyyy-mm-dd',
												pickTime: false
											});
									</script>	
												
								</div>
						</div>
						<span style="margin-left: 16px;">至</span>
						<div class="form-group">
									
							<div class="formgroup">
								
									<input type="text" style="width:110px;" class="form-control" onchange="searchdata(1);" placeholder="选择拨打日期" id="endTime" name="endTime" value="" readonly="" />
								
									<script>
										$('#endTime').fdatepicker({
											format: 'yyyy-mm-dd',
											pickTime: false
										});
									</script>	
													
							</div>
						
						</div>
						<!-- <div class="form-group">
						
							<input type="text" style="width:110px;" class="form-control" onchange="searchdata();" placeholder="选择拨打日期" id="startDate" name="startDate" value="" readonly="" />
						
							<script>
								$('#startDate').fdatepicker({
									format: 'yyyy-mm-dd',
									pickTime: false
								});
							</script>				
							
						</div> -->
						
						
						<div class="form-group"> 
							<select name="status" onchange="searchdata();" id="status" class="form-control">
								<option value=" " selected="">选择通话状态</option>
								<option value="2">已接通</option>
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
							<select name="timelong" onchange="searchdata();" id="timelong" class="form-control">
								<option value=" " selected="">选择时长</option>
								<option value="10">小于10秒</option>
								<option value="10-30">9秒-30秒</option>
								<option value="30-60">30秒-1分钟</option>	
								<option value="60-119">1分钟-1分59秒</option>
								<option value="120">大于等于2分钟</option>
							</select>
						</div>&nbsp;		
							
						<div class="form-group"> 
							<select name="level" onchange="searchdata();" id="level" class="form-control">
								<option value=" " selected="">选择意向等级</option>
								<option value="6">A级(有明确意向)</option>
								<option value="5">B级(可能有意向)</option>
								<option value="4">C级(明确拒绝)</option>	
								<option value="3">D级(用户忙)</option>
								<option value="2">E级(拨打失败)</option>
								<option value="1">F级(无效客户)</option>	
							</select>
						</div>&nbsp;		

						<div class="form-group"> 
							<!-- <label class="statusSelect">状态：</label> -->
							<select name="ready" onchange="searchdata();" id="ready" class="form-control">
								<option value=" " selected="">选择是否已查看</option>
								<option value="1">已查看</option>
								<option value="0">未查看</option>
							</select>
						</div>&nbsp;
						
						<!-- 
						<button class="btn btn-primary" type="submit">搜索</button>
						 -->
				
					</form>		
				</div>  
				
			</section>
							   
		    <table class="table table-bordered table-hover">
					<thead>
						<tr>
						  <th class="text-center">任务名称</th>
						  <th class="text-center">话术名称</th>
							<th class="text-center">姓名</th>
							<th class="text-center">手机号</th>
							<th class="text-center">状态</th>
							<th class="text-center">拨打时间</th>
							<th class="text-center" style="width: 139px;">通话时长</th>
							<th class="text-center">意向等级</th>
							<th class="text-center">呼叫类型</th>
							<th class="text-center">操作</th> 
						</tr>
					</thead>
					<tbody id="tablepagelist">
						
					</tbody>
				</table>
				
			  <div id="modalpagebody"></div>

		
             <div class="component-page-empty" id="pegeempty">
             	<div class="empty-tip line">暂无数据</div>
             </div>

		</div>
					
	</div>					
    
</div>


<script type="text/javascript">

	$(function(){
		
        searchdata(1);

	}) 

	var callpage = 1;
	var taskId = 1;
	
	function searchdata(callpage){
		
		if(!callpage){
			var callpage = 1;	
		}
		
        var contactNumber = $("#contactNumber").val();
		var scenarios = $("#scenarios").val();
		var task = $("#task").val();
		var startDate = $("#startDate").val();
		var endTime = $("#endTime").val();
		
		var status = $("#status").val();
		
		var timelong = $("#timelong").val();
		var level = $("#level").val();
		var ready = $("#ready").val();
		
		var customer = $("#customer").val();
		
		var url = "<?php echo url('callLog'); ?>";	
		
		
		$.ajax({
				url : url,
				dataType : "json", 
				type : "post",
				data : {
					'page':callpage,
					'mobile':contactNumber,
					'scenarios':scenarios,
					'task':task,
					'startDate':startDate,
					'endTime':endTime,
					'status':status,
					'timelong':timelong,
					'level':level,
					'ready':ready,
					"customer":customer
				},
			
				success: function(data){
					var total = data.data.total;
					var Nowpage = data.data.Nowpage;
					var page = data.data.page;
					var Nowpage = parseInt(Nowpage);
					
					var data = data.data.list;
					 if(data.length > 0){
					 
							$("#pegeempty").css("display","none");
					 
							$("#tablepagelist").find("tr").remove();
							
							for(var i=0;i<data.length;i++){
				
								var id = data[i].id;
								var mobile = data[i].mobile;
								var username = data[i].username;
								var status = data[i].status;
								var duration = data[i].duration;
								var last_dial_time = data[i].last_dial_time;
								var level = data[i].level;
								var review = data[i].review;
								var task_id = data[i].task_id;
								var scenename = data[i].scenename;
								var task_name = data[i].task_name;
								var call_type = data[i].call_type;
								var reviewstr = '<a href="javascript:void(0);" onclick="gotoDetail('+mobile+','+task_id+','+id+');">未查看</a>';
								if(review == 1){
									reviewstr = '<a href="javascript:void(0);" style="color: #5b5d5f;" onclick="gotoDetail('+mobile+','+task_id+','+id+');">已查看</a>';
								}

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
							
								var string = '<tr class="itemId'+id+'" alt="'+id+'">'
								+'<td class="text-center">'+task_name+'</td>'
								+'<td class="text-center">'+scenename+'</td>'
								+'<td class="text-center">'+username+'</td>'
								+'<td class="text-center">'+mobile+'</td>'
								+'<td class="text-center">'+strstatus+'</td>'
								+'<td class="text-center">'+last_dial_time+'</td>'  
								+'<td class="text-center">'+duration+'</td>'
								+'<td class="text-center">'+strlevel+'</td>'
								+'<td class="text-center">'+call_type+'</td>'
								+'<td class="text-center">'+reviewstr+'</td>';
								string += '</tr>';
								$("#tablepagelist").append(string); 

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
								str += '<li><a href="javascript:void(0);" onclick="searchdata('+prepage+');"><span>«</span></a></li> ';
							}
							
							if(page > 10){
							
								if(Nowpage < 7){
									for(var i=0;i<page;i++){
										var nownum = i+1;
										if(nownum < 9){
											 if(nownum == Nowpage){
												 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+' </a></li> ';  
											 }else{
												 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+' </a></li> ';  
											 }
										}
										
										if(nownum == 9 && nownum != Nowpage){
											 str += '<li class="disabled"><span>...</span></li>';  
										}else if(nownum == 9){
											str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+'</a></li> ';  
										}
									
											if(nownum > (page-2)){
												 if(nownum == Nowpage){
													 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+' </a></li> ';  
												 }else{
													 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+' </a></li> ';  
												 }
											}

									 }
								}else if(Nowpage > 6 && Nowpage < (page-6)){
									for(var i=0;i<page;i++){
										var nownum = i+1;
										var Nowpage = parseInt(Nowpage);
										if(nownum < 3){
											str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+' </a></li> '; 
										}
										
										if((nownum > Nowpage-5) && (nownum < Nowpage+5)){
									
														 if(nownum == (Nowpage-4)){
																str += '<li class="disabled"><span>...</span></li>';
														 }   
														
															 if(nownum > (Nowpage-4) && nownum < Nowpage){
																 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+'</a></li>'; 
															 }  
														 
															 if(nownum == Nowpage){
															 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+'</a></li>';  
															 } 
														 
															 if(nownum < (Nowpage + 4) && nownum > Nowpage){
																str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+'</a></li>'; 
															 }  
													
															 if(nownum == (Nowpage + 4)){
															
															 str += '<li class="disabled"><span>...</span></li>';
															 }   
										 }
										 
									 if(nownum > (page-2)){
										 var Nowpage = parseInt(Nowpage);
										 if(nownum == Nowpage){
													 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+'</a></li>';
											 }else{
													str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+'</a></li> ';
											 }   
									 
										 }     

									 }
								}else{
									
									for(var i=0;i<page;i++){
										var nownum = i+1;
										if(nownum<3){
											str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+' </a></li>';  
										}
									
										if(nownum == (page-10) && nownum != Nowpage){
											str += '<li class="disabled"><span>...</span></li>';   
										}else if(nownum == (page-10) && nownum == Nowpage){
											str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+'</a></li>';   
										}
										
										if(nownum > (page-10)){
											if(nownum == Nowpage){
												str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+'</a></li> ';   
											}else{
												str += '<li ><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+'</a></li>';   
											}
										}
										
										
									}
						 
										
								}
							}else{
								 for(var i=0;i<page;i++){
									 var nownum = i+1;
									 if(nownum == Nowpage){
										 str += '<li class="active"><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+' </a></li> ';  
									 }else{
										 str += '<li><a href="javascript:void(0);" onclick="searchdata('+nownum+');">'+nownum+' </a></li> ';  
									 }
								 }
							}
							
		
					 
							if(Nowpage == page){
								str += '<li id="prevbtn" class="disabled"><span>»</span></li> ';
							}else{
								str += '<li><a href="javascript:void(0);" onclick="searchdata('+nextpage+');"><span>»</span></a></li>';
							}
						
							str += '</ul>'
							+'</div>'
							+'</div>'
						 
							$("#modalpagebody").find("div").remove();
							$("#modalpagebody").append(str); 
							
					 }
					 else{
						 
						$("#pegeempty").css("display","block");

						$("#tablepagelist").find("tr").remove();
						$("#modalpagebody").find("div").remove();
					
					 }
					 

				},
				error : function() {
					alert('获取列表失败。');
				}
		});
		
  }	

		//已经拨打的全选
	function checkall(){			
	   	if ($('.check-all').is(":checked")) {	 
	   		$('.Alreadycheck').prop("checked","checked");
	   	}else{
	   		$('.Alreadycheck').prop("checked",false);
	   	}
	}

  //到出记录
	function outexcel(){
		
		var typestr = $('#typelevel').val();
		var mobile = $('#keyword').val();
		var status = $('#status').val();

		$.post("<?php echo url('exportExcel'); ?>",{'type':typestr,'mobile':mobile,'status':status},function(data){
				 // if(data){
				// console.log(data);
       // }else{
 					window.location.href = data;
      // }
		}); 
		
	}

	 //重拨
	 function redial(task,mobile){
		
		 $.post("<?php echo url('redial'); ?>",{'task':task,'mobile':mobile},function(res){
					if(res.code == 0){
						alert(res.msg);
					}else{
						alert(res.msg);
					}
	   }); 
			
	 }

 </script>
 


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

<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	
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
							通话轮次：<span class="iparea" style="font-size: 13px;" id="callRotation"></span>
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
							A类<span class="tip" >(较强)</span>
							</div>

							<div class="item" data-v="5" id="level5">
							B类<span class="tip">(一般)</span>
							</div>

							<div class="item" data-v="4" id="level4">
							C类<span class="tip">(很少)</span>
							</div>

							<div class="item" data-v="3" id="level3">
							D类<span class="tip">(待观察)</span>
							</div>

							<div class="item" data-v="2" id="level2">
							E类<span class="tip">(无意向)</span>
							</div>
							<div class="item" data-v="1" id="level1">
							F类<span class="tip">(无效客户)</span>
							</div>

							<h5 style="text-align:left;background-color:#ccc;padding-left: 27px;">*点击上面等级可以修改</h5>

						</div>
						
						
						<div class="audio-c" style="position: relative;overflow-y: auto;width: 65%;">
						    <audio src="" id="record_path" controls="controls"></audio>
						</div>


						<div id="chatcontent" class="content chat-block" tabindex="0">

							<div id="msglist">


              				</div>
					
						</div>

                    <!--  -->
					</div>
			    </div>		       
		  	
		  </div>

		  <div class="modal-footer">
		    <input id="thisId" type="hidden" value="" />
		  	
			<button type="button" class="btn btn-default pull-left" id="default-cancel" data-dismiss="modal">取消</button>
		   
		    <button type="button" class="btn btn-primary" onclick="ensure()">确认</button>
		    
		  </div>

		</div>

	</div>


<script type="text/javascript">
  

	function gotoDetail(mobile,taskId,recordId){

		// window.location.href = "<?php echo url('detail'); ?>/id/"+uid;  

          $("#thisId").val(recordId);  

	    $.post("<?php echo url('backdetail'); ?>",{'mobile':mobile,'taskId':taskId,'recordId':recordId,'froms':"record"},function(data){
				if(data){

					if(data.code == 0){
						
						  var memberInfo = data.data.memberInfo;
							var bills = data.data.bills;
                           

							$("#nickname").text(memberInfo.nickname);
							$("#sex").text(memberInfo.sex);
							$("#mobile").text(memberInfo.mobile);
							$("#last_dial_time").text(memberInfo.last_dial_time);

							$("#duration").text(memberInfo.duration+'秒');
							$("#callRotation").text(memberInfo.call_times+'轮');  
							$("#originatingCall").text(memberInfo.originating_call);
							$("#keyNum").text(data.data.num);
						 
							$("#statusinfo").text(memberInfo.status);
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
							}else if(memberInfo.level == 6){
								 $("#level6").addClass("greenactive");
							}

							$("#record_path").attr('src', memberInfo.record_path);

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



					}else{
							console.log(data);
					}

				}else{

					console.log(data);
				  //	window.location.href=window.location.href;
				}
		 }); 	

	

	  $('#myModal').modal('show');

	}	

	function ensure(){

	  $('#myModal').modal('hide');

	}

	$('.item').click(function(){	

		var level = $(this).attr('data-v');
		var uid = $("#thisId").val();  

		$.post("<?php echo url('changeLevel'); ?>/id/"+uid+"/froms/record",{'level':level},function(res){
			if (res.code == 0){	

			}
			alert(res.msg);
		});
		$(".greenactive").removeClass("greenactive");
		$(this).addClass("greenactive");
	});

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
