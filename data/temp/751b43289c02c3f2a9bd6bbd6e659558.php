<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"/www/wwwroot/web/application/user/view/message/index.html";i:1551953768;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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
</style>
<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix">	
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			  <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-liebiao"></i>消息列表</h1>
			  <a class="btn btn-primary" href="<?php echo url('addMsg',array('type'=>1)); ?>">发布消息</a>
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
             <section class="navbar navbar-default main-box-header clearfix">
		         <div class="pull-right">
				   <form class="form-inline" method="get" role="form">
					  <div class="form-group">
					    <label>关键字 ：</label>
					    <input type="text" class="form-control" style="width:200px;" id="keyword" name="keyword" placeholder="请输入关键字">
					  </div>&nbsp;&nbsp;&nbsp;
					
				    <button class="btn btn-primary" type="submit">搜索</button>
				  </form>
				 </div>
		    </section>
		     <div style="height:10px;line-height:30px;background-color:#FBFBFB;"></div>
		     
			  <div class="table-responsive">			  
				  <table class="table table-bordered table-hover">
				   <thead>
					    <tr>
					        <th></th>
					        <th class="text-center">ID</th>
					        <th class="text-center">标题</th>
					      
					        <th class="text-center">创建时间</th>
					        <th class="text-center">发送时间</th>
					        <th class="text-center">状态</th>
					        <th class="text-center">操作</th> 
					    </tr>
				    </thead>
				   <tbody>
				       <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					    <tr class="imgclass">
					      <td class="text-center">
					        <input type="checkbox" name="contentids" class="contentcheck" value="<?php echo $vo['id']; ?>"/>
					      </td>
						  <td class="text-center"><?php echo $vo['id']; ?></td>
						  <td><?php echo $vo['title']; ?></td>
						
						  <td class="text-center"><?php echo $vo['createTime']; ?></td>	
						  <td class="text-center"><?php echo $vo['updateTime']; ?></td>	
						  <td class="text-center">
						    <?php switch($vo['status']): case "1": ?>
                                   <span class="label label-primary">已发送</span>
							    <?php break; default: ?>
                                    <span class="label label-info">未发送</span>
							<?php endswitch; ?>
						  </td>
						 
						  <td class="text-center">
                            
                                <a href="<?php echo url('user/Message/editMsg',array('id'=>$vo['id'])); ?>" >编辑</a>
								<a href="javascript:void(0);" onclick="delcontent(<?php echo $vo['id']; ?>);">删除</a>
								
								<a href="javascript:void(0);" onclick="sendMsg(<?php echo $vo['id']; ?>);">发送</a>
								
							</td>
						</tr>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
				    </tbody>
				  </table> 
		           <div class="row">
                        <div class="col-sm-4 text-left"></div>
                        <div class="col-sm-8 text-right"><?php echo $page; ?></div>
                    </div>
			  </div>
	          <footer class="main-box-footer clearfix">
				<div class="pull-left">
			    	<input class="check-all" onclick="allcheck();" type="checkbox"/>全选
					<button class="btn btn-primary" onclick="delcontent(0);" target-form="ids">删 除</button>
				</div>
			</footer>
		</div>
					
	</div>					
    
</div>

 <script type="text/javascript" src="__PUBLIC__/plugs/zeroclipboard/ZeroClipboard.min.js"></script> 
 <script type="text/javascript">
 //复制链接
 var doms = $(".copy");
 var clip = new ZeroClipboard( doms );
 clip.on("aftercopy", function(e){
	   alert('复制成功！'); 
  });


$(function(){
  var keyword = "<?php echo (isset($_GET['keyword']) && ($_GET['keyword'] !== '')?$_GET['keyword']:''); ?>";
  $('#keyword').val(keyword);
  var category = "<?php echo (isset($_GET['category']) && ($_GET['category'] !== '')?$_GET['category']:''); ?>";
  $('#category').val(category);
}) 

//删除
 function delcontent(id){
    var r=confirm('确认删除?');
     	if (!r) 
           return; 

     	 var ids=[];
    	if(id){
    		ids.push(id);
    	}else{
    		
        	 var roleids = document.getElementsByName("contentids");
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
  		 $.post("<?php echo url('del'); ?>",{'id':ids},function(data){
				if(data){
					alert(data.msg);
				}else{
					window.location.href=window.location.href;
				}
			}); 
 }
//全选
 function allcheck(){			
 	if ($('.check-all').is(":checked")) {	
 		$('.contentcheck').prop("checked","checked");
 	}else{
 		$('.contentcheck').prop("checked",false);
 	}

 }
 //置顶
 function sendMsg(id){			
 	 var url = "<?php echo url('sendMsg'); ?>";	
 	 $.ajax({
 	        url : url,
 	        dataType : "json", 
 	        type : "post",
 	        data : {'id':id},
 	        success: function(msg){
 	        	if(msg.code == 0){
 		        	location.reload();
 	            }else{
					alert(msg.msg);
 	            	
 	            }  
 	        },
 	        error : function() {
 	        	alert('失败。');
 	        }
 	  });
 }
 
 //设置审核状态
   function setstatus(id,status){			
   	 var url = "<?php echo url('setstatus'); ?>";	
   	 $.ajax({
   	        url : url,
   	        dataType : "json", 
   	        type : "post",
   	        data : {'id':id,'status':status},
   	        success: function(msg){
   	        	if(msg.key > 0){
   		        	alert(msg.msg);
   	            }else{
   	            	location.reload();
   	            }  
   	        },
   	        error : function() {
   	        	alert('获取页面列表失败。');
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
