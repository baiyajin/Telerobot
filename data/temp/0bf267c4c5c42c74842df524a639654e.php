<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"/www/wwwroot/web/application/user/view/sms/statistics.html";i:1551953756;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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
.table tbody>tr>td {
	padding: 6px 8px;
}
.table-responsive {
	min-height: .01%;
	overflow-x: hidden;
}
.statusSelect {
		line-height: 30px;
		float: left;
}
.textwidth{
	width:250px;
}
</style>
<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix">	
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			  <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-icon-p_mrpbaobiao"></i>发送统计</h1>
			<!-- 	<a class="btn btn-primary" href="javascript:void(0);" onclick="addNew(0);">添加模板</a> -->
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
		
	        <section class="navbar navbar-default main-box-header clearfix">
	         <div  class="pull-right">
						 <form class="form-inline"  method="get" role="form">
							 
							 <div class="form-group">
							 	<label class="statusSelect">发送时间:</label>
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
							 	
							 <div class="form-group"> 
							 		<label class="statusSelect">发送状态：</label>
							 		<select style="width:100px;" name="status" id="status" class="form-control">
							 			<option value="" selected="">全部</option>
							 			<option value="0">失败</option>
							 			<option value="1">成功</option>
							 		</select>
							 </div>
							 &nbsp;&nbsp;
							 
							 	<?php if($super == '1'): ?>
							 		<div class="form-group">
							 				<label>用户名称：</label>
							 				
							 				<select style="width:120px;" name="username" id="username" class="form-control">
							 					<option value=" " selected="">请选择用户</option>
							 					<?php if(is_array($adlist) || $adlist instanceof \think\Collection || $adlist instanceof \think\Paginator): $i = 0; $__LIST__ = $adlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
							 						<option value="<?php echo (isset($cvo['id']) && ($cvo['id'] !== '')?$cvo['id']:""); ?>"><?php echo (isset($cvo['username']) && ($cvo['username'] !== '')?$cvo['username']:""); ?></option>
							 					<?php endforeach; endif; else: echo "" ;endif; ?>
							 				</select>
							 
							 		</div>
							 	<?php endif; ?>	
													
					    	&nbsp;&nbsp;
							<span class="btn btn-primary" type="submit" onclick="orderGrouping(1,1);">搜索</span>
						</form>

						
			    </div>
		   </section>

		     <div style="height:10px;line-height:30px;background-color:#FBFBFB;"></div>
		     
			  <div class="table-responsive">
			  
				 <table class="table table-bordered table-hover">
				   <thead>
					    <tr>
									<th class="text-center">日期</th>	
									<th class="text-center">消费数量</th>	
									<th class="text-center">金额</th>	
								
					    </tr>
				    </thead>
				   <tbody id="statisticslist">
					 	 
						 
									
								
				    </tbody>
				  </table>
					
					<div class="row">
					
						<div class="col-sm-12" id="consumepage"></div>
					</div>
				   
			  </div>
				
				<div class="component-page-empty" id="consumeempty">
					<div class="empty-tip line">暂无数据</div>
				</div>

		</div>
					
	</div>					
    


</div>

 <script type="text/javascript">
 
 var cpage = 1;
 
 $(function(){
	
	orderGrouping(cpage,0);

})
 
 	  
 	//获取等待列表
 	var sTime,eTime,status,username;
 
 	function orderGrouping(page,type){	
 		
			if(type == 1){
				
				sTime = $("#sTime").val();
				eTime = $("#eTime").val();
				status = $('#status').val();
				username = $("#username").val();
			
			}
	 
			statistics(page);
 	}	
 
 	function statistics(page){
 		
 			var url = "<?php echo url('statisticsAjax'); ?>";	
 			$.ajax({
 							url : url,
 							dataType : "json", 
 							type : "post",
 							data : {
 								'page':page,
 								'sTime':sTime,
 								'eTime':eTime,
 								'username':username,
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
 												
 														$("#consumeempty").css("display","none");
 												
 														$("#statisticslist").find("tr").remove();
 														
 														for(var i=0;i<data.length;i++){
 															
 															var days = data[i].days;
 															var owner = data[i].owner;
 															var create_time = data[i].create_time;
 															var num = data[i].total;
 															var money = data[i].money;
 															if(money == "" || money == null){
 																money = 0;
 															}
 					 
 															var string = '<tr class="itemId'+owner+'" alt="'+owner+'">'
 														  	+'<td>'+days+'</td>'
																+'<td>'+num+'</td>'
 																+'<td>'+money+'（元）</td>'
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
