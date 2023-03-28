<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"/www/wwwroot/web/application/user/view/device/lines.html";i:1551974538;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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

.table tbody>tr>td {
	padding: 4px 8px;
	vertical-align: middle;
}
.table-responsive {
	min-height: 550px;
	overflow-x: hidden;
}

li >a {
    color: #293038;
    cursor: pointer;
}
.tabsnav {
    overflow: hidden;
    position: relative;
    margin-top: 0px;
}
.tabsnav:after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #e4e7ed;
    z-index: 1;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #03a9f4;
    border: 0px solid #ddd;
    border-bottom: 2px solid #03a9f4;
}

.buttonText {
    color: #409eff;
    background: 0 0;
    padding-left: 0;
    padding-right: 0;
	font-size: 14px;
	cursor: pointer;
}

.nav-tabs {
    background: #ffffff;
    border-color: white;
    border-radius: 3px 3px 0 0;
    background-clip: padding-box;
}

.nav-tabs {
    border-bottom: 1px solid rgb(221, 221, 221);
}

.boxbg {
    background: #f2f2f2;
    width: 100%;
    border: 1px solid #fff;
}

.boxnavbar{
	min-height: 60px;
	background: #fff;
    margin: 8px;
    line-height: 55px;
  
}

.form-inline .form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
}
.marginLeft {
    margin-left: 20px;
    margin-bottom: 0px!important;
}

.left-robot-list {
    background-color: #ffffff;
    width: 15.5%;
    overflow-y: auto;
    height: calc(100vh - 94px);
    border: 1px solid #e9e9e9;
    display: inline-block;
    padding-top: 15px;
    flex: 1;
}

.right-robot-list {
    padding-right: 0px;
    background-color: #ffffff;
    width: 82.66666667%;
    float: right;
    border: 1px solid #e9e9e9;
    display: inline-block;
    margin-left: 15px;
}

.container-fluid {
	
	padding-right: 0px; 
	padding-left: 0px; 
	padding-top: 10px;

}

.main_left_content {
    width: 100%;
}
.leftContent>div {
    max-width: 158px;
    height: 40px;
    line-height: 40px;
    margin: 0 auto;
    background: #f7f7f7;
    margin-top: 11px;
    text-align: center;
    border-radius: 0px!important;
    border: 1px solid #fff;
    cursor: pointer;
    font-size: 12px!important;
}

.robot_del {
    position: absolute;
    top: 5px;
    right: 5px;
    border-radius: 3px;
    width: 24px!important;
    height: 24px!important;
    z-index: 100;
    border-radius: 0px!important;
}
.leftItem{
	position:relative;
	overflow: hidden;
}

.leftContent>.active {
    border: 1px solid #5ca7e3;
}
</style>


<div class="row">
<div class="col-lg-12">
	
	
	<div class="main-box clearfix">	
		
			<div class="main-box-body clearfix">
				
				<!-- Nav tabs -->
				<div class="tabsnav">
						
					<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 20px;">
						
						<li role="presentation" class="active">
							<a href="#configuration" aria-controls="configuration" role="tab" data-toggle="tab">线路配置</a>
						</li>
						<li role="presentation">
							<a href="#distribution" aria-controls="distribution" role="tab" data-toggle="tab">线路分配</a>
						</li>
					
					</ul>
					
				</div>
				
				<!-- Tab panes -->
				<div class="tab-content">
					
					<div role="tabpanel" class="tab-pane outbox active" id="configuration">
					
						<header class="main-box-header clearfix">
						  <div class="pull-left">
							  <!-- <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-xianlu"></i>线路管理</h1> -->
							  <?php if($super > 0): endif; ?>
							   
								<button class="btn btn-primary" onclick="showModal(0);">添加</button>
								
						  </div>
						</header>
						
						   
						<div class="main-box-body clearfix">
							
						    <section class="navbar navbar-default main-box-header clearfix">
					            <div class="pull-right">
									<form class="form-inline" method="get" role="form">
										 
										<div class="form-group">
											<label>线路商名称：</label>
		                       				<input type="text" placeholder="请输入线路商名称" class="form-control textwidth" name="lineOperator" id="lineOperator" />
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
											<th class="text-center">线路商名称</th>
											<th class="text-center">单价</th>
											<th class="text-center">主叫号码</th>
											<!-- <th class="text-center">外显号码</th> 
											<th class="text-center">呼叫前缀</th>
											<th class="text-center">对接IP</th>-->
											<!-- <th class="text-center">所属用户</th> -->
										
											<th class="text-center">呼叫次数</th>
											<th class="text-center">状态</th>
											<th class="text-center">备注</th>
											<?php if($super > 0): ?>
											  <th class="text-center">操作</th>  
											<?php endif; ?>
									    </tr>
								    </thead>
									<tbody>
										<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<tr>
											    <td class="text-center">
													<input type="checkbox" name="customerIds" class="customerIds" value="<?php echo $vo['id']; ?>"/>
												</td>										    					
												<td class="text-center"><?php echo $vo['name']; ?></td>
												<td class="text-center"><?php echo $vo['price']; ?></td>
												<td class="text-center"><?php echo $vo['phone']; ?></td>
											<!--
												<td class="text-center"><?php echo $vo['call_prefix']; ?></td>
												<td class="text-center"><?php echo $vo['inter_ip']; ?></td>
											-->	
												<td class="text-center">
													<?php echo $vo['call_num']; ?>
												</td>
												<td class="text-center">
												
													<?php switch($vo['status']): case "1": if($vo['pid'] == ''): ?>
																	<a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,0);">开启</a>
																<?php else: ?>
																	开启
																<?php endif; break; default: if($vo['pid'] == ''): ?>
																	<a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,1);">关闭</a>
																<?php else: ?>
																	关闭
																<?php endif; endswitch; ?>
												</td>
												<td class="text-center">
												 <?php echo $vo['remark']; ?>
												</td>
												
												<td class="text-center">
													<?php if($vo['pid'] == ''): ?>	
														<a href="javascript:void(0);" onclick="showModal(<?php echo $vo['id']; ?>);">编辑</a>
															 &nbsp;
														<a href="javascript:void(0);" onclick="delSim('<?php echo $vo['id']; ?>');">删除</a>
													<?php endif; ?>	
												</td>
												
											</tr>
										<?php endforeach; endif; else: echo "" ;endif; ?>
										
									</tbody>
								</table>
								
								<div class="row">
									<div class="col-sm-4 text-left">
										<?php if($super > 0): ?>	
											<div class="pull-left">
												<input class="check-all" onclick="allcheck();" type="checkbox"/>全选
												<button class="btn btn-primary" onclick="delSim(0);" target-form="ids">删 除</button>
											</div>	
										<?php endif; ?>			
									</div>
									<div class="col-sm-8 text-right"><?php echo $page; ?></div>
								</div>
								
							</div>
								     
						</div>
						
									
					</div>
					
					<div role="tabpanel" class="tab-pane outbox" id="distribution">
						
						<!--  上面的 账户名称：  -->
						<div class="boxbg">
							<section class="boxnavbar">
								<div class="form-inline pull-left">
									
									<div class="form-group marginLeft">
										<label class="control-label">账户类型：</label>
										<select class="form-control" name="userType" onchange="changeuser();" id="userType">
		                       				<option value="">显示全部</option>
											
										</select>
									</div>
									
									<div class="form-group marginLeft">
										<label class="control-label">账户名称：</label>
									
		                       			<input type="text" placeholder="请输入账户名称" class="form-control textwidth" name="accountname" id="accountname" />
										
									</div>
									<button class="btn btn-primary" onclick="changeuser();">搜索</button>
								</div>
						    </section>
						</div>
						
						<!-- 下面的内容    -->
						
						<div class="container-fluid">
							
							<div class="left-robot-list col-xs-3 col-md-2">
								
								<div class="list-title">
									<p>账户列表</p>
								</div>
								
								<div class="flowlist leftContent">
									
								
									
								</div>
							
							</div>
							
							<div class="right-robot-list col-xs-15 col-md-10">
							
								<div class="clearfix" style="margin-top: 10px;padding: 0 20px 20px 20px;">
									
								  <div class="pull-left">
								  	
									<h1 class="pull-left" id="comtitle" style="padding-left: 0px; margin-right: 10px;">
									 	
									</h1>
									
									<button class="btn btn-primary" id="allocationbtn" attr-name='' attr-id='0' onclick="allocation(this);">分配线路</button>
										
								  </div>
								  
								</div>
								
								<div class="content">
									
									   
									<div class="main-box-body clearfix">
									
										<div style="height:10px;line-height:30px;background-color:#FBFBFB;"></div>
										<div class="table-responsive">
										
											<table class="table table-striped table-hover">
												
												<tbody id="trlist">
																					
												</tbody>
												
											</table>
										
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
  
	//设置状态
	function setstatus(id,status){		
	
		var url = "<?php echo url('setLineStatus'); ?>";	
		$.ajax({
			url : url,
			dataType : "json", 
			type : "post",
			data : {'sId':id,'status':status},
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
	

	//删除
	function delSim(id){
	 
	 	 var r=confirm('确认删除?');
	     	if (!r) 
	           return; 
	
	     	 var ids=[];
	    	if(id){
	    		ids.push(id);
	    	}
	    	else{
	    		
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
	  		$.post("<?php echo url('delLine'); ?>",{'id':ids},function(data){
				if(data){
					alert(data);
				}else{
					window.location.href=window.location.href;
				}
			}); 
			
			
	 }
	

	// 选择获取企业
	function getscom(obj,username,type,id){
		
		$(obj).addClass("active");
		$(obj).siblings(".active").removeClass("active");
		
		//获取配置给用户的线路
		getdistribution(id);
		
		$("#comtitle").text(username+"("+type+")");
		$("#allocationbtn").attr("attr-id",id);
		$("#allocationbtn").attr("attr-name",username);
		
	} 

	//获取用户列表
	function changeuser(){
		
		var usertype = $("#userType").val();
		var account = $("#accountname").val();
		
		
		var url = "<?php echo url('user/Device/getUser'); ?>";	
		$.ajax({
			url : url,
			dataType : "json", 
			type : "post",
			data : {'usertype':usertype, "account":account},
			success: function(data){
				
				if(data.code==0){
					
					var list = data.data;
					var lon = list.length;
					
					if(lon){
						
						$(".flowlist").find(".leftItem").remove();
						for(var i=0;i<lon;i++){
							
							var active = '';
							if(i == 0){
								active = 'active';
								
								getdistribution(list[i]["id"]);
								
								$("#comtitle").text(list[i]["username"]+"("+list[i]["type"]+")");
								$("#allocationbtn").attr("attr-id",list[i]["id"]);
								$("#allocationbtn").attr("attr-name",list[i]["username"]);
								
								
							}
							
							var str='<div class="leftItem '+active+'" onclick="getscom(this,\''+list[i]["username"]+'\',\''+list[i]["type"]+'\','+list[i]["id"]+');" attr_id="">'
									+'<div class="username">'+list[i]["username"]+'</div>'
									+'</div>';
							
							$(".flowlist").append(str); 
							
						}
						
					}
					else{
						console.log('该类没有数据。');
					}
					
				}
				else{
					console.log(data.msg);
				}
					 
			},
			error : function() {
				alert('获取信息失败。');
			}
		});
		
		
	}
	
	
	//获取线路列表
	function getdistribution(Id){
			
		var url = "<?php echo url('user/Device/distribution'); ?>";	
		$.ajax({
			url : url,
			dataType : "json", 
			type : "post",
			data : {'Id':Id},
			success: function(data){
				
				if(data.code==0){
					
					var list = data.data;
					var lon = list.length;
					
					
					$("#trlist").find("tr").remove();
						
					if(lon){
						
						for(var i=0;i<lon;i++){
							var createTime = "";
							if(list[i]["create_time"]){
								 createTime = list[i]["create_time"];								
							}
						
							var str='<tr>'
										+'<td><b>名称：</b>'+list[i]["name"]+'</td>'	
										+'<td><b>成本价：</b>'+list[i]["costPrice"]+'元/次</td>'
										+'<td><b>销售价：</b>'+list[i]["price"]+'元/次</td>'
										+'<td><b>分配时间：</b>'+createTime+'</td>'
										+'<td class="remarktab"><b>备注：'+list[i]["remark"]+'</b></td>'
										+'<td style="text-align: center;">'																
											+'<span class="glyphicon glyphicon-remove-sign" onclick="delAsr('+list[i]["id"]+');" style="font-size: 20px;color: red" aria-hidden="true"></span>'
										+'</td>'
									+'</tr>';
							
							$("#trlist").append(str); 
							
						}
						
					}
					else{
						
							$("#trlist").find("tr").remove();
				
							var str='<tr>'
									+'<td style="text-align: center;">'+data.msg+'</td>'
									+'</tr>';
								
							$("#trlist").append(str); 
					}
					
				}
				else{
					
					$("#trlist").find("tr").remove();
				
					var str='<tr>'
							+'<td style="text-align: center;">'+data.msg+'</td>'
							+'</tr>';
						
					$("#trlist").append(str); 
					
				}
			 
			},
			error : function() {
			
				$("#trlist").find("tr").remove();
			
				var str='<tr>'
						+'<td style="text-align: center;">'+data.msg+'</td>'
						+'</tr>';
					
				$("#trlist").append(str); 
			}
		});
		
	}
	
	
	//删除
	function delAsr(ids){
	 
	 	 var r=confirm('确认删除?');
	     	if (!r) 
	           return; 
	
	    
	  		$.post("<?php echo url('delAsr'); ?>",{'id':ids},function(data){
				if(data){
					alert(data);
				}else{
					//获取配置给用户的线路
				var attrId = $("#allocationbtn").attr("attr-id");
				getdistribution(attrId);
					//window.location.href=window.location.href;
				}
			}); 
			
			
	 }
	
	
	$(function(){
		
		getUserType();
		
		changeuser();
		var lineOperator = "<?php echo (isset($_GET['lineOperator']) && ($_GET['lineOperator'] !== '')?$_GET['lineOperator']:''); ?>";
		$('#lineOperator').val(lineOperator);
		
	})

	//获取类型
	function getUserType(){
	
		var url = "<?php echo url('user/Device/dusertype'); ?>";
		
		$.ajax({
			url : url,
			dataType : "json", 
			type : "post",
			data : {},
			success: function(data){
				
				if(data.code==0){
					
					var list = data.data;
					var lon = list.length;
					
					if(lon){
						
						$("#userType").find("option").remove();
						var str='<option value="">显示全部</option>';
						
						for(var i=0;i<lon;i++){
							
							str += '<option value="'+list[i]["id"]+'">'+list[i]["name"]+'</option>';
				
						}
													
						$("#userType").append(str); 
												
					}
					else{
						alert('该类没有数据。');
					}
					
				}
				else{
					alert(data.msg);
				}
				 
			},
			error : function() {
				alert('获取信息失败。');
			}
		});
	
		
	}



 </script>
  
</div>



<!-- 添加与编辑 -->

<div class="modal fade" id="checkpage" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
		
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">编辑线路信息</h4>
        </div>
        <div class="modal-body pagelists">
				 
          	
	        <form id="form" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
	      
			    <div class="form-group">
					<label class="col-lg-4 control-label">线路商名称：</label>
					<div class="col-lg-8 col-sm-8">
						<input type="text" placeholder="请输入线路商名称" class="form-control textwidth" name="name" id="name" />
					</div>
			    </div>
					    
				<div class="form-group">
					<label class="col-lg-4 control-label">线路对接类型:</label>
					<div class="col-lg-8 col-sm-8">
					    <select class="form-control textwidth" id="type" name="type">
					    	<option value="">请选择线路对接类型</option>												
							<option value="0">IP对接</option>
							<option value="1">账号密码对接</option>											
						</select>
					</div>
			    </div>
				
				<div class="form-group">
					<label class="col-lg-4 control-label">主叫号码：</label>
					<div class="col-lg-8 col-sm-8">
						 <input type="text" placeholder="请输入主叫号码" class="form-control textwidth" name="phone" id="phone" />
					</div>
			    </div>
				
			    <div class="form-group">
					<label class="col-lg-4 control-label">呼叫前缀</label>
					<div class="col-lg-8 col-sm-8">
						<input type="text" placeholder="请输入呼叫前缀" class="form-control textwidth" name="call_prefix" id="call_prefix" />
					</div>
			    </div>
			    
				 <div class="form-group">
					<label class="col-lg-4 control-label">网关名称</label>
					<div class="col-lg-8 col-sm-8">
						<input type="text" placeholder="请输入网关名称" class="form-control textwidth" name="gateway" id="gateway" />
					</div>
			    </div>
			    
				<div class="form-group">
					<label class="col-lg-4 control-label">接口IP</label>
					<div class="col-lg-8 col-sm-8">
						 <input type="text" placeholder="请输入接口IP" class="form-control textwidth" name="inter_ip" id="inter_ip" />
					</div>
			    </div>
			   
			    <!-- <div class="form-group"> -->
					<!-- <label class="col-lg-4 control-label">主叫号码：</label> -->
					<!-- <div class="col-lg-8 col-sm-8"> -->
						 <!-- <input type="text" placeholder="请输入主叫号码" class="form-control textwidth" name="explicit_number" id="explicit_number" /> -->
					<!-- </div> -->
			    <!-- </div> -->
			   
				<div class="form-group">
					<label class="col-lg-4 control-label">单价：</label>
					<div class="col-lg-8 col-sm-8">
						 <input type="text" placeholder="请输入线路单价" class="form-control textwidth" name="price" id="price" value="0.00"/>
					</div>
			    </div>	
				<div class="form-group">
					<label class="col-lg-4 control-label">备注：</label>
					<div class="col-lg-8 col-sm-8">
						<textarea class="form-control textwidth" placeholder="请输入备注" id="remark" name="remark"></textarea>
					</div>
				</div>


			    <div class="form-group" style="text-align: center;">
				   	<input type="hidden" name="deviceId" id="deviceId" value="<?php echo (isset($thisId) && ($thisId !== '')?$thisId:''); ?>">
					<input type="hidden" name="simId" id="simId" value="">
					<button class="btn btn-success submit-btn" onclick="checkform();" type="button">确 定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			 	</div>

			
		     </form>
				 
					
       </div>
       <div style="clear:both"></div>
      
	 </div>
           
  </div>

<script type="text/javascript">
	
	
function showModal(id){

	 
	 if(id){
			var url = "<?php echo url('user/Device/getLineInfo'); ?>";	
			 $.ajax({
				url : url,
				dataType : "json", 
				type : "post",
				data : {'id':id},
				success: function(data){
					 $("#phone").val(data.phone);
					 $("#member_id").val(data.member_id);
					 $("#name").val(data.name);
					
					$("#call_prefix").val(data.call_prefix);
					$("#inter_ip").val(data.inter_ip);
					$("#gateway").val(data.gateway);
					$("#remark").val(data.remark);
					$("#simId").val(data.id);
					$("#type").val(data.type);
					//$("#explicit_number").val(data.explicit_number); 
					$("#price").val(data.price); 
					// $("#type").get(1).selectedIndex=1; 
					
					 $('#checkpage').modal('show')
				},
				error : function() {
					alert('获取信息失败。');
				}
			});
		
	 }
	 else{

		 $('#checkpage').modal('show');
			 
	 }
		

	}
 
	 
//检查表单的必填项
function checkform(){

	var phone = $("#phone").val();
	if(phone == ""){
	
		//return false; 
	} 

		
	var simId = $("#simId").val();
	
	var href = "<?php echo url('user/Device/addLine'); ?>";
	if(simId){
		href = "<?php echo url('user/Device/editLine'); ?>";
	}

			 
	$.ajax({
		type: "POST",
		dataType:'json',
		url: href,
		cache: false,
		data: $("#form").serialize(),
		success: function(data) {
			if (data.code == 0) {
				$('#checkpage').modal('hide');
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


<!-- 分配线路 -->

<div class="modal fade" id="allocatedCircuit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
		
    <div class="modal-content">
    	
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">线路分配</h4>
        </div>
        
        <div class="modal-body pagelists">
				 
          	
	        <form id="allocatedForm" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
	      
			    <div class="form-group">
					<label class="col-lg-4 control-label">用户名:</label>
					<div class="col-lg-8 col-sm-8">
						<span id="textname"></span>
						<input type="hidden" name="name" id="textnameuser" value="" />
					</div>
			    </div>
					    
				<div class="form-group">
					<label class="col-lg-4 control-label">选择线路:</label>
					<div class="col-lg-8 col-sm-8">
					    <select class="form-control textwidth" id="asr" name="asr_list">
					    	
					    	<option value="">请选择线路</option>												
																		
						</select>
					</div>
			    </div>
				
				<div class="form-group">
					<label class="col-lg-4 control-label">线路销售价:</label>
					<div class="col-lg-5 col-sm-5">
						<input type="text" placeholder="请输入线路销售价" class="form-control textwidth" name="saleprice" id="saleprice" />
					</div>
					<div class="col-lg-3 col-sm-3" style="line-height: 35px;padding-left: 15px;">
						元/次
					</div>
			    </div>
				
	
				<div class="form-group">
					<label class="col-lg-4 control-label">备注：</label>
					<div class="col-lg-8 col-sm-8">
						<textarea class="form-control textwidth" placeholder="请输入备注信息，限定30个字以内" id="unremark" name="remark"></textarea>
					</div>
				</div>


			    <div class="form-group" style="text-align: center;">
				   	<input type="hidden" name="nameuserId" id="nameuserId" value="">
					<button class="btn btn-success submit-btn" onclick="saveform();" type="button">确 定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			 	</div>

			
		    </form>
				 
					
       </div>
       <div style="clear:both"></div>
      
	 </div>
           
  </div>

<script type="text/javascript">
	
	
function allocation(obj){
	
	var aId = $("#allocationbtn").attr("attr-id");
	
	var username = $("#allocationbtn").attr("attr-name");
	$("#textname").text(username);
	
	$("#textnameuser").val(username);
	$("#nameuserId").val(aId);
	
	$("#saleprice").val("");
	$("#unremark").val("");

	var url = "<?php echo url('user/Device/getAsr'); ?>";
	
	$.ajax({
		url : url,
		dataType : "json", 
		type : "post",
		data : {},
		success: function(data){
			
			if(data.code==0){
				
				var list = data.data;
				var lon = list.length;
				
				if(lon){
					
					$("#asr").find("option").remove();
					var str='<option value="">请选择线路</option>';
					
					for(var i=0;i<lon;i++){
						
						str += '<option value="'+list[i]["id"]+'">'+list[i]["name"]+'</option>';
			
					}
												
					$("#asr").append(str); 
											
				}
				else{
					alert('该类没有数据。');
				}
				
			}
			else{
				alert(data.msg);
			}
			
			$('#allocatedCircuit').modal('show');
			 
		},
		error : function() {
			alert('获取信息失败。');
		}
	});

	// $('#allocatedCircuit').modal('show');

}
 
	 
//检查表单的必填项
function saveform(){

	var asr = $("#asr").val();
	if(asr == ""){
		alert("请选择ASR。");
		return false; 
	} 

	var href = "<?php echo url('user/Device/saveAsr'); ?>";

	var saleprice = $("#saleprice").val();
	var isnum = isNaN(saleprice);
	
	if(isnum){
		alert("ASR销售价必须得是数字。");
		return false;
	}
 
	$.ajax({
		type: "POST",
		dataType:'json',
		url: href,
		cache: false,
		data: $("#allocatedForm").serialize(),
		success: function(data) {
			
			if (data.code == 0) {
				
				$('#allocatedCircuit').modal('hide');
				//获取配置给用户的线路
				var nameuserId = $("#nameuserId").val();
				getdistribution(nameuserId);
				
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
