<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"/www/wwwroot/web/application/user/view/member/memberlist.html";i:1551953770;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;s:61:"/www/wwwroot/web/application/user/view/member/calldetail.html";i:1551953772;}*/ ?>
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
	
	.messageinfo{
	 text-align:right;
	 
	}
	.infotable tr td{
	 padding:5px;
	}
	.statusSelect {
	    line-height: 35px;
	    float: left;
	}
	.pull-left{
		float: left;
	}
	.textleft{
		text-align: left;
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
	
	.formgroup{
    float: left;
    margin-left:16px;
		margin-bottom: 5px;
  }
	.formgroup > .numwidth{
		width: 98px;
	}
	.textwidth{
		width:250px;
	}
	.formgroup > .textwidth{
		width:250px;
	}
	.checkbox-wrapper {
    margin-right: 20px;
	  margin-bottom: 0px;
	}	
	.word {
   /* line-height: 40px; */
    font-size: 14px;
	}
	.levelSelect {
			line-height:20px;
			float: left;
	}
	.bottomfour{
		    margin-bottom: 4px;
	}
	.formgroup > .checkbox-wrapper > .cqwidth{
		width:60px;
	}
	.formgroup > .checkbox-wrapper > .word{
		font-size:12px;
	}
	.cqlabel{
		  margin-right:5px;
	}
	.main-box .main-box-header {
    min-height: 50px;
    padding: 10px 10px;
	margin-bottom: 12px;
}
.input-group-addon {
    background-color: #ffffff;
       border: 1px solid #ccc;
}
</style>


<div class="row">
	
<div class="col-lg-12">

	       	<div class="main-box clearfix">
				<header class="main-box-header clearfix">
					<div class="pull-left">
						<h1 style="margin: 0;padding-left: 0px;">
							<i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-kehuguanli"></i>
						客户管理</h1>
					</div>
				</header>			
	      
							<div class="main-box-body clearfix">
							<div class="form-inline" style="padding-bottom:10px;">
										 <div class="input-group">
										 
										 <span class="input-group-addon" id="basic-addon1">联系电话</span>
										  <input type="text" class="form-control" name="contactNumber" id="contactNumber" placeholder="请输入联系电话" style="height:34px;">
										  <span class="input-group-btn">
											<button class="btn btn-primary" type="button" onclick="searchdata(1,1);">搜索</button>
										  </span>
										</div>
										<div class="form-inline pull-right">
												 
											 <a class="btn btn-primary" href="javascript:void(0);" onclick="addNew(0);">  
													<i class="fa fa-plus-circle fa-lg"></i> 新 增
											 </a> 
											 <button type="button" class="btn btn-primary" onclick="joinSelect('join');">
												 加入拨打任务
											 </button>
											<span class="btn btn-primary" onclick="loadexcel();">导入</span>
											<span class="btn btn-primary" onclick="outexcel();">导出</span>
											
										</div>	
									</div>
								<section class="navbar navbar-default main-box-header clearfix">
									
	
										<div class="pull-left">
												
											 <form method="get" role="form">
												 
												 <div class="form-inline bottomfour">
													  <div class="form-group">
													  		<label class="levelSelect">意向等级:</label>
													  		<div class="formgroup">
																	
													  			<label class="checkbox-wrapper">
													  					<input class="check-all-level levelcheck" onclick="alllevel();" type="checkbox" />
													  				  <span class="word">全选</span>
													  			</label>
													  			
																<label class="checkbox-wrapper">
																	 <input type="checkbox" name="levelcheck" class="levelcheck" value="6" />
																	 <span class="word">A级(有明确意向)</span>
																</label>
															
																<label class="checkbox-wrapper">
																	<input type="checkbox" name="levelcheck" class="levelcheck" value="5" />	
																	<span class="word">B级(可能有意向)</span>
																</label>
															
																<label class="checkbox-wrapper">
																	<input type="checkbox" name="levelcheck" class="levelcheck" value="4" />
																	<span class="word">C级(明确拒绝)</span>
																</label>
																
																<label class="checkbox-wrapper">
																	<input type="checkbox" name="levelcheck" class="levelcheck" value="3" />
																	<span class="word">D级(用户忙)</span>
																</label>
																
																<label class="checkbox-wrapper">
																	<input type="checkbox" name="levelcheck" class="levelcheck" value="2" />
																	<span class="word">E级(拨打失败)</span>
																</label>
																<label class="checkbox-wrapper">
																	<input type="checkbox" name="levelcheck" class="levelcheck" value="1" />
																	<span class="word">F级(无效客户)</span>
																</label>
																	
		
													  		</div>
													  </div>
											   </div>
			 
												 <div class="form-inline bottomfour">
														<div class="form-group">
																<label class="levelSelect">通话状态:</label>
																<div class="formgroup">
																	
																	<label class="checkbox-wrapper">
																			<input type="checkbox" class="check-all-status statuscheck" onclick="allstatus();" type="checkbox" />
																			<span class="word">全选</span>
																	</label>
																	
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="2" />
																		<span class="word">已接通</span>
																	</label>
																
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="3" />	
																		<span class="word">无人接听</span>
																	</label>
																
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="4" />
																		<span class="word">停机</span>
																	</label>
																	
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="5" />
																		<span class="word">空号</span>
																	</label>
																	
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="6" />
																		<span class="word">正在通话中</span>
																	</label>
																
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="7" />	
																		<span class="word">关机</span>
																	</label>
																
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="8" />
																		<span class="word">用户拒接</span>
																	</label>
																	
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="9" />
																		<span class="word">网络忙</span>
																	</label>
																	
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="10" />
																		<span class="word">来电提醒</span>
																	</label>
																	
																	<label class="checkbox-wrapper">
																		<input type="checkbox" name="statuscheck" class="statuscheck" value="11" />
																		<span class="word">呼叫转移失败</span>
																	</label>
																	
																	
																	
																
															
																	
																	
		 
																</div>
														</div>
												 </div>
												 
												 <div class="form-inline">
													 
													<div class="form-group" style="margin-right: 16px;">
															<label class="statusSelect">通话时长:</label>
															<div class="formgroup">
																	<input type="number" name="startNum" id="startNum" onchange="searchdata(1,1);" min="0" placeholder="通话时长" class="form-control numwidth" />
																<!-- 	<span class="suffix">秒</span> -->
															</div>
													</div>
														至
													<div class="form-group">
														<div class="formgroup">
																<input type="number" name="endNum" id="endNum" onchange="searchdata(1,1);" min="0" placeholder="通话时长" class="form-control numwidth" />
																<span class="suffix">秒</span>
														</div>
									
													</div>
							 
												 </div>

												<div class="form-inline bottomfour">
														<div class="form-group">
																<label class="statusSelect">呼叫任务:</label>
																<div class="formgroup">
																	<select name="calltask" id="calltask" onchange="searchdata(1,1);" class="form-control textwidth">
																		<option value="">请选择外呼任务</option>
																		<?php if(is_array($tasklist) || $tasklist instanceof \think\Collection || $tasklist instanceof \think\Paginator): $i = 0; $__LIST__ = $tasklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
																			<option value="<?php echo $item['task_id']; ?>">
																				<?php echo $item['task_name']; ?>
																			</option>
																		<?php endforeach; endif; else: echo "" ;endif; ?>
																	</select>
																</div>
														</div>
													
												</div>
												
												<div class="form-inline bottomfour">
													
													<div class="form-group">
															<label class="statusSelect">场景话术:</label>
															<div class="formgroup">
																<select name="scenarios" id="scenarios" onchange="getLable(1);" class="form-control textwidth">
																	<option value="">请选择场景话术</option>
																	<?php if(is_array($scenarioslist) || $scenarioslist instanceof \think\Collection || $scenarioslist instanceof \think\Paginator): $i = 0; $__LIST__ = $scenarioslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
																		<option value="<?php echo $item['id']; ?>">
																			<?php echo $item['name']; ?>
																		</option>
																	<?php endforeach; endif; else: echo "" ;endif; ?>
																</select>
															
															</div>
													</div>
													
												</div>	

												 <div class="form-inline">

														<div class="form-group">
																<label class="statusSelect">拨打时间:</label>
																<div class="formgroup">
																	
																		<input type="text" style="width:167px;" class="form-control" onchange="searchdata(1,1);" id="startDate" name="startDate" value="" readonly="" />
																		
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
															
																	<input type="text" class="form-control" onchange="searchdata(1,1);" id="endTime" name="endTime" value="" readonly="" />
															
																<script>
																	$('#endTime').fdatepicker({
																		format: 'yyyy-mm-dd',
																		pickTime: false
																	});
																</script>	
																				
														</div>
										
													  </div>
												 </div>
                    
												<div class="form-inline">
														<div class="form-group">
																<label class="statusSelect" style="line-height: 30px;">客户语气:</label>
																<div class="formgroup">
																	
																	<label class="checkbox-wrapper cqlabel">
																		 <span class="word">客户说话次数</span>
																		 <input type="number" min="0" id="call_times" class="form-control cqwidth" />
																	</label>
																	
																	<label class="checkbox-wrapper cqlabel">
																		<span class="word">肯定次数</span>
																		<input type="number" min="0" id="affirm_times" class="form-control cqwidth" />
																	</label>
																
																	<label class="checkbox-wrapper cqlabel">
																		<span class="word">否定次数</span>
																		<input type="number" min="0" id="negative_times" class="form-control cqwidth" />
																	</label>
																
																	<label class="checkbox-wrapper cqlabel">
																		<span class="word">中性次数</span>
																		<input type="number" min="0" id="neutral_times" class="form-control cqwidth" />
																	</label>
																	
																	<label class="checkbox-wrapper cqlabel">
																		<span class="word">有效对话次数</span>
																		<input type="number" min="0" id="effective_times" class="form-control cqwidth" />
																	</label>
																	
																	<label class="checkbox-wrapper cqlabel">
																		<span class="word">触发问题次数</span>
																		<input type="number" min="0" id="hit_times" class="form-control cqwidth" />
																	</label>
																	
		
																</div>
														</div>
												 </div>
													 
												<div class="form-inline bottomfour">
													<div class="form-group">
															<label class="levelSelect">语义标签:</label>
															<div class="formgroup">
																
															 <?php if(is_array($semanticLabels) || $semanticLabels instanceof \think\Collection || $semanticLabels instanceof \think\Paginator): $k = 0; $__LIST__ = $semanticLabels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>

																<label class="checkbox-wrapper">
																	<input type="checkbox" name="semantic-label" class="semantic-label" value="<?php echo $vo['label']; ?>" />
																	<span class="word"><?php echo $vo['label']; ?></span>
																</label>
														 	 <?php endforeach; endif; else: echo "" ;endif; ?>
															</div>
													</div>
												</div>
												
												<div class="form-inline bottomfour">
													<div class="form-group">
															<label class="levelSelect">流程标签:</label>
															<div style="display: block;margin-left: 68px;" id="flabellist">
															
															</div>
													</div>
												</div>
												<div class="form-inline bottomfour">
													<div class="form-group">
															<label class="levelSelect">问答标签:</label>
															<div style="display: block;margin-left: 68px;" id="knowledge_labes">
															
															</div>
													</div>
												</div>											 
												</form>
											 
													 
										</div>
										
									
								</section>
								
								<div style="height:10px;line-height:30px;background-color:#FBFBFB;"></div>
									 
								<div class="table-responsive">			  
										<table class="table table-bordered table-hover">
										 <thead>
												<tr>
														<th></th> 
							 
														<th class="text-center">姓名</th>
														<th class="text-center">手机号</th>
														<th class="text-center" style="width: 139px;">创建时间</th>
														<th class="text-center">通话时长</th>
														<th class="text-center">分组</th>
														
														<th class="text-center">呼叫任务</th>
														<th class="text-center">场景话术</th>
														<th class="text-center">拨打时间</th>
														
														<th class="text-center">意向等级</th>
														<th class="text-center">通话状态</th>
														<th class="text-center">语义标签</th>
														<th class="text-center">流程标签</th>
														<th class="text-center">操作</th> 
												</tr>
											</thead>
										 <tbody id="datalist">
												
											</tbody>
										</table> 
										
										<div class="row">
											<div class="col-sm-4 text-left">
													<div class="pull-left">
														<input class="check-all icheckbox_square-blue" onclick="allcheck();" type="checkbox"/>全选
														<button class="btn btn-primary" onclick="del(0);" target-form="ids">删 除</button>
															&nbsp;&nbsp;&nbsp;
														<button class="btn btn-primary" onclick="delall();" title="根据您的筛选条件，删除符合条件的全部记录">删除全部</button>
														
													</div>	
											</div>
												<div class="col-sm-8 text-right"></div>
										</div>
										<br/>
										<div id="modalpagybody"></div>
										 
									</div>
								
							</div>
						 
	        </div>
	

</div>

<script type="text/javascript">	

  //获取话术场景流程标签
	function getLable(type){
		
		var val = $("#scenarios").val();
		
		var url = "<?php echo url('getLable'); ?>";	
		$.ajax({
					url : url,
					dataType : "json", 
					type : "post",
					data : {'sceneId':val},
					success: function(data){
					
					 $("#flabellist").find("label").remove();
					 $("#knowledge_labes").find("label").remove();
 
					 var data = data.data;
					 var leng = data.length;
					 if(leng > 0){

						var flow_label_htmls = '<label class="checkbox-wrapper">'
											+'<input type="checkbox" class="check-all-flow-label" onclick="allFlowLabel();" type="checkbox" />'
											+'<span class="word">全选</span>'
									'</label>';
						var knowledge_labes_htmls = '<label class="checkbox-wrapper">'
											+'<input type="checkbox" class="check-all-knowledge-label" onclick="allKnowledgeLabel();" type="checkbox" />'
											+'<span class="word">全选</span>'
									'</label>';
									
						 for(var i=0;i<leng;i++){
							if (data[i].type == 1){
								 flow_label_htmls += '<label class="checkbox-wrapper" style="margin-right: 10px;">'
									+'<input type="checkbox" name="flow-label" onclick="checklabel(this);" class="flow-label" value="'+data[i].label+'" />'
									+'<span class="word">'+data[i].label+'</span>'
								 +'</label>';
							}
							 else{
								
								 knowledge_labes_htmls += '<label class="checkbox-wrapper" style="margin-right: 10px;">'
									+'<input type="checkbox" name="knowledge-label" onclick="checklabel(this);" class="knowledge-label" value="'+data[i].label+'" />'
									+'<span class="word">'+data[i].label+'</span>'
								 +'</label>';
							 }
						 }
						 
						 $("#flabellist").append(flow_label_htmls); 
						 $("#knowledge_labes").append(knowledge_labes_htmls); 

					 }else{
						// alert("暂时没有流程标签。");
					 }
						
					},
					error : function() {
						//alert('暂时没有流程标签');
					}
		});
		
		//获取列表
		searchdata(1,type);
	}

  //用户选择流程标签时触发
	function checklabel(obj){
		//if ($(obj).is(":checked")) {	
			searchdata(1,1);
		//}
	}
   
	window.onpageshow = function(event) {
		 var a=event||window.event;
	};
	
	var page = 1;
	
	$(function(){
		
		getLable(0);

		//searchdata(despage,0);
   
		$(".levelcheck").on("click",function(){
			searchdata(1,1);
		});
		$(".statuscheck").on("click",function(){
			searchdata(1,1);
		});
		
		$(".semantic-label").on("click",function(){
			searchdata(1,1);
		});
		
		$(".semantic-label").on("click",function(){
			searchdata(1,1);
		});

// 		$(".flow-label").on("click",function(){
// 		
// 		});
		
		$(".cqwidth").change(function(){
			searchdata(1,1);
		});
		
		 
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
					 if (responseText.code == '0') {
						 window.location.href=window.location.href;
					 }else{
						//alert(responseText.msg);
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
  
	
	  //导出记录
	function outexcel(){
		$.post("<?php echo url('exportmemberExcel'); ?>",
		{
			'mobile':mobile,
			'startNum':startNum,
			'endNum':endNum,
			'startDate':startDate,
			'endTime':endTime,
			'calltask':calltask,
			'levelids':levelids,
			'statusids':statusids
		},
		function(data){
			
			if(data.code == 0){
				
				if(data.data){
						window.location.href = data.data;
				}
				
			}
			
		});
	}
		
    
  //全选用户
   function allcheck(){			
   	if ($('.check-all').is(":checked")) {	
   		$('.usercheck').prop("checked","checked");
   	}else{
   		$('.usercheck').prop("checked",false);
   	}
   }
   
 //全选等级
   function alllevel(){			
   	if ($('.check-all-level').is(":checked")) {	
   		$('.levelcheck').prop("checked","checked");
   	}else{
   		$('.levelcheck').prop("checked",false);
   	}
   }
	 
	 //全选状态
	function allstatus(){			
	 	if ($('.check-all-status').is(":checked")) {	
	 		$('.statuscheck').prop("checked","checked");
	 	}else{
	 		$('.statuscheck').prop("checked",false);
	 	}
	 }
	
	function allFlowLabel(){			
	 	if ($('.check-all-flow-label').is(":checked")) {	
	 		$('.flow-label').prop("checked","checked");
	 	}else{
	 		$('.flow-label').prop("checked",false);
	 	}
		searchdata(1,1);
	 }
	 
	 
	function allKnowledgeLabel(){			
	 	if ($('.check-all-knowledge-label').is(":checked")) {	
	 		$('.knowledge-label').prop("checked","checked");
	 	}else{
	 		$('.knowledge-label').prop("checked",false);
	 	}
		searchdata(1,1);
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
    
  function getzf(num){
      if(parseInt(num) < 10){  
          num = '0'+num;  
      }  
      return num;  
  }
	
	function getMyDate(str){
	
	    var oDate = new Date(str),  
	    oYear = oDate.getFullYear(),  
	    oMonth = oDate.getMonth()+1,  
	    oDay = oDate.getDate(),  
	    oHour = oDate.getHours(),  
	    oMin = oDate.getMinutes(),  
	    oSen = oDate.getSeconds(),  
	    oTime = oYear +'-'+ getzf(oMonth) +'-'+ getzf(oDay) +' '+ getzf(oHour) +':'+ getzf(oMin) +':'+getzf(oSen);//最后拼接时间  
	            return oTime;  
	        }
	  
  	  
  //根据筛选条件，删除符合条件的全部记录
  
  function delall(){
  	
  		var url = "<?php echo url('delAll'); ?>";	
		 	$.ajax({
	 					url : url,
	 					dataType : "json", 
	 					type : "post",
	 					data : {
							
							'mobile':mobile,
							'startNum':startNum,
							'endNum':endNum,
							'startDate':startDate,
							'endTime':endTime,
							'calltask':calltask,
							'levelids':levelids,
							'statusids':statusids,
							'scenarios':scenarios,
							'call_times':call_times,
							'affirm_times':affirm_times,
							'negative_times':negative_times,
							'neutral_times':neutral_times,
							'effective_times':effective_times,
							'hit_times':hit_times,
							'semanticLabels':semanticLabels,
							'flowLabels':flowLabels,
							'knlgLabels':knlgLabels
						},
	 					success: function(data){
		 					if(data){
		  					alert(data);
		  				}else{
		  					window.location.href=window.location.href;
		  				}
	 					},
	 					error : function() {
	 						//alert('获取列表失败。');
	 					}
	 		});
		 	
  }
  
  
  
</script>

 
 <script type="text/javascript">
	

	var mobile,startNum,endNum,startDate,endTime,calltask,scenarios,call_times,affirm_times,negative_times,neutral_times,effective_times,hit_times;
	var levelids=[],statusids=[],semanticLabels=[],flowLabels=[],knlgLabels=[];
	
  function memberlist(page){
		
		 	var url = "<?php echo url('memberListAjax'); ?>";	
		 	$.ajax({
		 					url : url,
		 					dataType : "json", 
		 					type : "post",
		 					data : {
								'page':page,
								'mobile':mobile,
 								'startNum':startNum,
								'endNum':endNum,
								'startDate':startDate,
 								'endTime':endTime,
 								'calltask':calltask,
								'levelids':levelids,
								'statusids':statusids,
								'scenarios':scenarios,
								'call_times':call_times,
								'affirm_times':affirm_times,
								'negative_times':negative_times,
								'neutral_times':neutral_times,
								'effective_times':effective_times,
								'hit_times':hit_times,
								'semanticLabels':semanticLabels,
								'flowLabels':flowLabels,
								'knlgLabels':knlgLabels
							},
		 					success: function(data){
		 						var total = data.data.total;
		 						var Nowpage = data.data.Nowpage;
		 						var page = data.data.page;
		 						var Nowpage = parseInt(Nowpage);
		 						var data = data.data.list;
		 							if(data.length > 0){
		 									$("#datalist").find("tr").remove();
		 									for(var i=0;i<data.length;i++){
		 										var uid = data[i].uid;
		 										var nickname = data[i].nickname;
		 										var username = data[i].username;
		 										var mobile = data[i].mobile;
		 										var duration = data[i].duration;
		 										var groupname = data[i].name;
		 										var reg_time = data[i].reg_time;
		 										var status = data[i].status;
		 										var level = data[i].level;
		 										var task_name = data[i].task_name;
												var scenarios_name = data[i].scenarios_name;
												var last_dial_time = data[i].last_dial_time;
												
												var semantic_label = data[i].semantic_label;
												var flow_label = data[i].flow_label;
												
												var review = data[i].review;
												
		 										if(name == '' || name == null){
		 											groupname = "未分组";
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
				 
												var string = '<tr class="imgclass">'
												+'<td class="text-center">'
													+'<input type="checkbox" name="userids" class="usercheck" value="'+uid+'"/>'
												+'</td>'
												+'<td class="text-center">'+username+'</td>'
												+'<td class="text-center">'+mobile+'</td>'
												+'<td class="text-center">'+reg_time+'</td>'
												+'<td class="text-center">'+duration+'</td>'
												+'<td class="text-center">'+groupname+'</td>'
												
												+'<td class="text-center">'+task_name+'</td>'
												+'<td class="text-center">'+scenarios_name+'</td>'
												+'<td class="text-center">'+last_dial_time+'</td>'
												
												+'<td class="text-center">'+strlevel+'</td>'
												+'<td class="text-center">'+strstatus+'</td>'
												+'<td class="text-center">'+semantic_label+'</td>'
												+'<td class="text-center">'+flow_label+'</td>'
												+'<td class="text-center">'
												+'<a href="javascript:void(0);" onclick="addNew('+uid+');">编辑</a>'
												+'&nbsp;<a href="javascript:void(0);" onclick="del('+uid+');">删除</a>'
												if (review){
													string += '&nbsp;<a href="javascript:void(0);" onclick="gotoDetail('+uid+');">已看</a>';
												}
												else{
													string += '&nbsp;<a href="javascript:void(0);" style="color:red;" onclick="gotoDetail('+uid+');">未看</a>';
												}
												+'</td>'
												string += '</tr>';
												$("#datalist").append(string); 

											}
		 									
		 									var prepage = Nowpage-1;
		 									var nextpage = Nowpage+1;
		 									
		 									var str = '<div class="row">'
		 									+'<div class="col-sm-3 text-left">'
		 												
		 									+'<table class="table table-bordered table-hover" style="margin-bottom: 0px; ">'
		 									+'<tbody><tr>'
		 									+'<td class="text-center">总数：'
		 									+'</td>'
		 									+'<td class="text-center" id="total_num">'+total+'&nbsp;'
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
												$("#total_num").html(0);
												$("#datalist").find("tr").remove();
												$("#modalpagybody").find("div").remove();
										}
		 							
		 					},
		 					error : function() {
		 						//alert('获取列表失败。');
		 					}
		 		});
		 	
	
  }	 
  	 
 function searchdata(page,type){	

  		if(type == 1){
				
			mobile = $("#contactNumber").val();
			startNum = $("#startNum").val();
			endNum = $("#endNum").val();

  			startDate = $("#startDate").val();
  			endTime = $("#endTime").val();
  			calltask = $("#calltask").val();
  			scenarios = $("#scenarios").val();
			
			call_times = $("#call_times").val();
			affirm_times = $("#affirm_times").val();
  			negative_times = $("#negative_times").val();
  			neutral_times = $("#neutral_times").val();
  			effective_times = $("#effective_times").val();
			hit_times = $("#hit_times").val();
			
			levelids.splice(0,levelids.length);//清空数组 
			var levelcheckids = document.getElementsByName("levelcheck");
			for ( var j = 0; j < levelcheckids.length; j++) {
				if (levelcheckids.item(j).checked == true) {
					levelids.push(levelcheckids.item(j).value);
				}
			}
			
			statusids.splice(0,statusids.length);//清空数组 
			var statuscheckids = document.getElementsByName("statuscheck");
			for ( var j = 0; j < statuscheckids.length; j++) {
				if (statuscheckids.item(j).checked == true) {
					statusids.push(statuscheckids.item(j).value);
				}
			}
			
			semanticLabels.splice(0,semanticLabels.length);//清空数组 
			var semanticLabelObj = document.getElementsByName("semantic-label");
			for ( var j = 0; j < semanticLabelObj.length; j++) {
				if (semanticLabelObj.item(j).checked == true) {
					semanticLabels.push(semanticLabelObj.item(j).value);
				}
			}
			console.log(semanticLabels);
			
			flowLabels.splice(0,flowLabels.length);//清空数组 
			var flowLabelObj = document.getElementsByName("flow-label");
			for ( var j = 0; j < flowLabelObj.length; j++) {
				if (flowLabelObj.item(j).checked == true) {
					flowLabels.push(flowLabelObj.item(j).value);
				}
			}
			console.log(flowLabels);
			
			knlgLabels.splice(0,knlgLabels.length);//清空数组 
			var knlgLabelObj = document.getElementsByName("knowledge-label");
			for ( var j = 0; j < knlgLabelObj.length; j++) {
				if (knlgLabelObj.item(j).checked == true) {
					knlgLabels.push(knlgLabelObj.item(j).value);
				}
			}
			console.log(knlgLabels);
			
  		}
  
	    memberlist(page);
 }	
 
 </script>
 
 
</div>

<!-- 将选中号码加入拨打计划 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	
  <div class="modal-dialog" role="document"   style="width: 380px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">呼叫任务</h4>
      </div>
      <div class="modal-body">
		 <p> 您确定将搜索结果重新加入呼叫任务吗?</p>
      	  <div id="taskcontent">

							<div class="form-group">
								<label class="col-lg-3 control-label" style="text-align: left; margin-top: 8px;">选择任务:</label>
								<div class="col-lg-9 col-sm-10">
									
									<select name="myModaltask" id="myModaltask" class="form-control textwidth">
										<option value="">请选择任务</option>
										<?php if(is_array($tasklist) || $tasklist instanceof \think\Collection || $tasklist instanceof \think\Paginator): $i = 0; $__LIST__ = $tasklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo $item['task_id']; ?>">
												<?php echo $item['task_name']; ?>
											</option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
							
								</div>
							</div>
	
      	  </div>
      
      	  
      	  <div style="clear: both;"></div>
         
      </div>
      <div class="modal-footer">
      	
				<button type="button" class="btn btn-default" id="default-cancel" data-dismiss="modal">取消</button>
       
        <button type="button" class="btn btn-primary" onclick="ensure()">确认</button>
        
      </div>
    </div>
  </div>
	
	<script type="text/javascript">
	   var flag = "join";
	   
	   function joinSelect(cate){
	   
	   	   flag = cate;
	   	
	   	   
	   	   if(flag == "join"){
	   	   	
	   	   		var ids=[];
		        var roleids = document.getElementsByName("userids");
		    		 for ( var j = 0; j < roleids.length; j++) {
		    		    if (roleids.item(j).checked == true) {
		    		    	ids.push(roleids.item(j).value);
		    		    }
		    		 }
       

	   	   	 
	   	   }
	   	  
	   	   
	   	 
	   	   	
	     	$('#myModal').modal('show');
	   }	
	   
	   function ensure(){
	   	 
			var ids=[];
	   	   if(flag == "finish"){
	   	   		var roleids = document.getElementsByName("Alreadycheck");
	   	   }else{
	   	   	  var roleids = document.getElementsByName("userids");
	   	   }
      
	  		for (var j = 0; j < roleids.length; j++) {
	  		   if (roleids.item(j).checked == true) {
	  		    ids.push(roleids.item(j).value);
	  		   }
	  		} 
	  	   
	  	   var taskId = $("#myModaltask").val(); 
		   if (!taskId){
				alert("请选择任务");
				return false; 
		   }
	  	  
    		 $.post("<?php echo url('copyData'); ?>",{
					 
					 'id':ids,
					 'taskId':taskId,
					 "flag":flag,
					 
					 'mobile':mobile,
					 'startNum':startNum,
					 'endNum':endNum,
					 'startDate':startDate,
					 'endTime':endTime,
					 'calltask':calltask,
					 'levelids':levelids,
					 'statusids':statusids
					 
					 },function(data){
	  				if(data){
							
							// console.log(data);

	  					if(data.code == 0){
	  					
	  						window.location.href=window.location.href;
	  					}else{
	  							console.log(data);
	  					}

	  				}else{
	  					window.location.href=window.location.href;
	  				}
	  		 }); 

	   	   $('#myModal').modal('hide');
	   	  
	   }
	   
	</script>

</div>


<script type="text/javascript" src="__PUBLIC__/plugs/jquery/jquery.form.min.js"></script>


<!-- 导入用户Large modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog" style="width:380px;">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">选择excel文件</h4>
				 </div>
				 <div class="modal-body">
						 <form id="fileform" action="<?php echo url('user/Member/importExcel'); ?>" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
							 <input type="file" class="" id="excelId" name="excel" />
					 </form>
				 <br/>
				 <a href="__STATIC__/template.xlsx" >模板下载</a>
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer">
				
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" onclick="Savechange();" class="btn btn-primary">保存</button>
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
