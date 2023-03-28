<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:54:"/www/wwwroot/web/application/user/view/message/my.html";i:1551953768;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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

	.imgclass > td > p>img{
	  width:50px;
	}

	.statusSelect {
	    line-height: 30px;
	    float: left;
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

</style>
<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix">	
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			  <h1>我的消息</h1>
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
	        <section class="navbar navbar-default main-box-header clearfix">
						
              <input type="hidden" name="typelevel" id="typelevel" value="" />

					
						<div class="pull-right">
								 <form class="form-inline" method="get" role="form" action="<?php echo url('Message/my'); ?>">
										
											<div class="form-group"> 
													<label class="statusSelect">状态：</label>
													<select style="width:100px;" name="status" id="status" class="form-control">
														<option value="" selected="">全部</option>
														<option value="0">未读</option>
														<option value="1">已读</option>
													</select>
										 </div>&nbsp;
										 <button class="btn btn-primary" type="submit">搜索</button>
										

								</form>		
						</div>  
					</section>
							   
		    <table class="table table-bordered table-hover">
				<thead>
					<tr>
					<!-- 	<th></th>  -->
						<th class="text-center">标题</th>
						
					
					
						<th class="text-center">发布时间</th>
						<th class="text-center">状态</th>
					
						<th class="text-center">操作</th> 
					</tr>
				</thead>
                <tbody id="tablepagelist">
                    <?php if(is_array($message) || $message instanceof \think\Collection || $message instanceof \think\Paginator): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					  <tr class="active itemId14002" alt="14002">
					
						  <td class="text-center"><?php echo $vo['title']; ?></td>
						  <td class="text-center"><?php echo $vo['create_time']; ?></td>
						 
						  <td class="text-center">
						    <?php switch($vo['status']): case "0": ?>未读<?php break; case "1": ?>已读<?php break; default: endswitch; ?>
						  </td>
						
						  <td class="text-center">
							
							 
							 <a href="javascript:void(0);" onclick="gotoDetail(<?php echo $vo['id']; ?>);">查看详情</a>

						  </td>
					  </tr>
				    <?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
				
              
              	 <div class="row">
					
					 <div class="col-sm-8 text-right"><?php echo $page; ?></div>
				 </div>

  

		</div>
					
	</div>					
    
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

<div class="modal fade" id="my-message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">消息详情</h4>
				 </div>
				 <div class="modal-body">
							<form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">
						         
									<div class="form-group">
										<label class="col-lg-2 control-label">消息标题：</label>
										<div class="col-lg-10 col-sm-10">
												<span id="title"></span>
										</div>
									</div>
								 
									<div class="form-group">
										<label class="col-lg-2 control-label">消息内容：</label>
										<div class="col-lg-10 col-sm-10">
												<span id="content" style="word-wrap:break-word; word-break:break-all;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">发布时间：</label>
										<div class="col-lg-10 col-sm-10">
												<span id="time"></span>
										</div>
									</div>
									
							</form>
				  <br/>
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer">
				
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				
				</div>
			</div>
						 
			</div>


<script type="text/javascript">
  

	function gotoDetail(id){
	    $.post("<?php echo url('getMessageById'); ?>",{'id':id},function(res){
				if(res.code == 0){
					$('#title').text(res.data.title);
					$('#content').html(res.data.content);
					$('#time').text(res.data.create_time);
					$('#my-message').modal('show');
				}else{

					alert(res.msg);
				}
		 }); 
	}	

	
</script>

</div>


<script type="text/javascript">

	$(function(){

	/*  var mobile = "<?php echo (isset($_GET['keyword']) && ($_GET['keyword'] !== '')?$_GET['keyword']:''); ?>";
	  $('#keyword').val(mobile);
	  */
	  var status = "<?php echo (isset($_GET['status']) && ($_GET['status'] !== '')?$_GET['status']:''); ?>";
	  $('#status').val(status);
		
		var level = "<?php echo (isset($_GET['level']) && ($_GET['level'] !== '')?$_GET['level']:' '); ?>";
		
		$('#typelevel').val(level);

	}) 


	 function searchdata(page,type){
		 window.location.href = "<?php echo url('callrecord'); ?>/page/"+page+'?level='+type;  
	 }

		//已经拨打的全选
	function checkall(){			
	   	if ($('.check-all').is(":checked")) {	 
	   		$('.Alreadycheck').prop("checked","checked");
	   	}else{
	   		$('.Alreadycheck').prop("checked",false);
	   	}
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
