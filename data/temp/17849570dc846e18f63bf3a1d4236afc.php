<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"/www/wwwroot/web/application/user/view/system/interfacepage.html";i:1551974798;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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

</style>


<div class="row">
<div class="col-lg-12">
	
	<div class="main-box clearfix">	
		
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			  <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-msnui-configration"></i>接口配置</h1>
				<button class="btn btn-primary" onclick="showModal(0);">添加接口</button>
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
		
		
			<div style="height:10px;line-height:30px;background-color:#FBFBFB;"></div>
			<div class="table-responsive">
			
				<table class="table table-bordered table-hover">
				<thead>
						<tr>
							<th></th>
							<th>编号</th>
							<th>用户</th>
							<th>app_id</th>
							<th>app_key</th>
							<th>app_secret</th>
							<th>类型</th>
							<th>状态</th>
							<th class="text-center">操作</th> 
						</tr>
					</thead>
				<tbody>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<tr>
							    <td>
									<input type="checkbox" name="customerIds" class="customerIds" value="<?php echo $vo['id']; ?>"/>
								</td>
							
								<td><?php echo $vo['id']; ?></td>
								<td>
									<?php echo $vo['username']; ?>
								</td>
								<td>
									<?php echo $vo['app_id']; ?>
								</td>
								<td>
									<?php echo $vo['app_key']; ?>
								</td>
								<td><?php echo $vo['app_secret']; ?></td>
								<td>
									       
									<?php switch($vo['type']): case "baidu": ?>百度<?php break; case "xfyun": ?>科大讯飞<?php break; case "aliyun": ?>阿里云<?php break; case "xfyunSDK": ?>科大讯飞SDK<?php break; default: ?>其他
									<?php endswitch; ?>
									
								</td>
								<td >
								<!-- 	<a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,1);">启用</a>
									<a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,0);">禁用</a> -->
									<?php switch($vo['status']): case "0": ?>
											启用
										<?php break; default: ?>
											禁用
									<?php endswitch; ?>
										
								</td>
							
								<td class="text-center">
									<a href="javascript:void(0);" onclick="showModal(<?php echo $vo['id']; ?>);">编辑</a>
										 &nbsp;&nbsp;
									<a href="javascript:void(0);" onclick="delInterface('<?php echo $vo['id']; ?>');">删除</a>
								</td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
					<?php echo $page; ?>
			</div>
				     
		</div>
					
	</div>					
    

</div>

 <script type="text/javascript">
 //设置状态
  function setstatus(id,status){			
  	 var url = "<?php echo url('setInterfaceStatus'); ?>";	
  	 $.ajax({
  	        url : url,
  	        dataType : "json", 
  	        type : "post",
  	        data : {'ifId':id,'status':status},
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
  function delInterface(id){
  
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
   		 $.post("<?php echo url('delInterface'); ?>",{'id':ids},function(data){
 				if(data){ 
 					alert(data);
 				}else{
 					window.location.href=window.location.href;
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
            <h4 class="modal-title" id="myModalLabel">添加的信息</h4>
       </div>
       <div class="modal-body pagelists">
				 
          	
	        <form id="form" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
	            
	            <div class="form-group">
					<label class="col-lg-4 control-label">识别类型：</label>
					<div class="col-lg-8 col-sm-8">
						
						<select class="form-control textwidth" id="recognition" name="recognition">
							<option value="">请选择接口识别类型</option>
							<option value="0">asr（语音转文字）</option>
							<option value="1">tts（文字转语音）</option>
						</select>
					
					</div>
				</div>
	            
				<div class="form-group">
					<label class="col-lg-4 control-label">接口类型：</label>
					<div class="col-lg-8 col-sm-8">
						
						<select class="form-control textwidth" id="type" name="type" onchange="changetype(this);">
							<option value="">请选择接口类型</option>
							<option value="baidu">百度</option>
							<option value="xfyun">科大讯飞</option>
							<option value="aliyun">阿里云</option>
							<option value="xfyunSDK">科大讯飞SDK</option>
						</select>
					
					</div>
				</div>
				
			    <div class="form-group" id="secretkey" style="">
					<label class="col-lg-4 control-label">app_key：</label>
					<div class="col-lg-8 col-sm-8">
						 <input type="text" class="form-control textwidth" placeholder="请输入app_key" name="app_key" id="app_key" />
					</div>
			    </div>
			    
			    <div class="form-group" id="secretId" style="">
					<label class="col-lg-4 control-label">app_id：</label>
					<div class="col-lg-8 col-sm-8">
						 <input type="text" class="form-control textwidth" placeholder="请输入app_id" name="app_id" id="app_id" />
					</div>
			    </div>
			    
			    <div class="form-group" id="secretbox" style="">
					<label class="col-lg-4 control-label">app_secret：</label>
					<div class="col-lg-8 col-sm-8">
					   <input type="text" class="form-control textwidth" placeholder="请输入app_secret" name="app_secret" id="app_secret" />
					</div>
			    </div>

	
			    <div class="form-group" style="text-align: center;">
					<input type="hidden" name="interfaceId" id="interfaceId" value="">
					<button class="btn btn-success submit-btn" onclick="checkform();" type="button">确 定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			    </div>

			
		    </form>
				 
					
       </div>
       <div style="clear:both"></div>
      
			
	 
	 </div>
           
  </div>

	<script type="text/javascript">
		
		function changetype(obj){
			
			var type = $("#type").val();
			if(type == 'xfyunSDK'){
				$("#secretbox").css("display","none");
				$("#secretkey").css("display","none");
				$("#secretId").css("display","");
			}
			else if(type == 'aliyun'){
				
				$("#secretbox").css("display","");
				$("#secretkey").css("display","");
				$("#secretId").css("display","");
				
			}else{
				
				$("#secretbox").css("display","");
				$("#secretkey").css("display","none");
				$("#secretId").css("display","");
				
			}
			
		}
			
		function showModal(id){
		
			 
			 if(id){
					var url = "<?php echo url('user/System/getInterfaceInfo'); ?>";	
					$.ajax({
						url : url,
						dataType : "json", 
						type : "post",
						data : {'id':id},
						success: function(data){	
							
							$("#app_key").val(data.app_key);
							$("#app_id").val(data.app_id);
							$("#recognition").val(data.recognition_type);
							$("#type").val(data.type);
							$("#app_secret").val(data.app_secret);
							$("#interfaceId").val(data.id);
									 
							$('#checkpage').modal('show');
							
						},
						error : function() {
							alert('审核信息失败。');
						}
					});
				
			 }
			 else{
			 	
			 	$("#recognition").val("");
			 	$("#app_id").val("");
				$("#app_key").val("");
				$("#type").val("");
				$("#app_secret").val("");
				$("#interfaceId").val("");
				$('#checkpage').modal('show');
					 
			 }
			

		}
	 
	 
		//检查表单的必填项
		function checkform(){

			var recognition = $("#recognition").val();
			if(recognition == ""){
				alert("请选择识别类型"); 
				return false; 
			}
			
			var type = $("#type").val();
			if(type == ""){
				alert("请选择接口类型"); 
				return false; 
			}
			
			var app_id = $("#app_id").val();
			if(!app_id){
				alert("app_id不能为空"); 
				return false; 
			}
			
		
			if(type != 'xfyunSDK'){
				var app_secret = $("#app_secret").val();
				if(!app_secret){
					alert("app_secret不能为空"); 
					return false; 
				}
			}
			
			if(type == 'aliyun'){
				var app_key = $("#app_key").val();
				if(!app_key){
					alert("app_key不能为空"); 
					return false; 
				}
			}
			
			 
		
			 var interfaceId = $("#interfaceId").val();

			 var href = "<?php echo url('user/System/addInterface'); ?>";
			 if(interfaceId){
				href = "<?php echo url('user/System/editInterface'); ?>";
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




<!-- Json -->
<div class="modal fade" id="editJson" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
		
    <div class="modal-content">
    	
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">编辑接口信息</h4>
       </div>
       <div class="modal-body pagelists">
				 
          	
	        <form id="form" method="post" class="form-horizontal margintop" enctype="multipart/form-data" >	
					
							<div class="form-group" style="padding: 0 10px;">
							<!-- 	<label class="col-lg-2 control-label">内容：</label> -->
								<!-- <div class="col-lg-11 col-sm-11"> -->
									<textarea name="content" id="content" style="width: 100%;min-height:450px;resize: auto;"></textarea>
								<!-- </div> -->
							</div> 
							
					    <div class="form-group" style="text-align: center;">
								  <input type="hidden" name="interfaceId" id="interfaceId" value="">
									<button class="btn btn-success submit-btn" onclick="checkform();" type="button">确 定</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
						 </div>
		
			
		     </form>
				 
					
       </div>
       <div style="clear:both"></div>

	 </div>
           
  </div>

	<script type="text/javascript">
		
		$(function(){
			var content = <?php echo (isset($jsdata) && ($jsdata !== '')?$jsdata:""); ?>;
			$("#content").val(JSON.stringify(content, null, "\t"));
		}) 
			
		function showJson(id){
		
			 
	 
				$('#editJson').modal('show');
						
			

		}
	 
	 
	 //检查、表单
		function checkJson(){


			 
 
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
