<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"/www/wwwroot/web/application/user/view/sms/template.html";i:1551953756;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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
#newModal > .modal-dialog {
    width: 450px;
    margin: 30px auto;
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
			  <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-moban"></i>短信模板</h1>
				<a class="btn btn-primary" href="javascript:void(0);" onclick="addNew(0);">添加模板</a>
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
		
	      <section class="navbar navbar-default main-box-header clearfix">
						 <div  class="pull-right">
							 <form class="form-inline"  method="get" role="form">
								 
								<div class="form-group">
									<label>模板名：</label>
									<input type="text" class="form-control" id="keyword" name="keyword" placeholder="请输入模板名.....">
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
								<th class="text-center">模板ID</th>	
								<th class="text-center">模板名称	</th>
								<th class="text-center">模板内容</th>
								<th class="text-center">模板类型	</th>	
								<th class="text-center">关联签名</th>	
								<th class="text-center">创建时间	</th>
								<th class="text-center">审核状态	</th>	
								<th class="text-center">操作</th> 
					    </tr>
				    </thead>
				   <tbody>
				   
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							
								<tr>
								 <td class="text-center">
										<input type="checkbox" name="roleids" class="rolecheck" value="<?php echo (isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:""); ?>"/>
								 </td>
									<td class="text-center"><?php echo (isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:""); ?></td>
									<td class="text-center"><?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:""); ?></td>
									
									<td class="text-center"><?php echo (isset($vo['conent']) && ($vo['conent'] !== '')?$vo['conent']:""); ?></td>
									<td class="text-center">
										<?php switch($vo['type']): case "1": ?>通知<?php break; case "2": ?>推广<?php break; default: ?>验证码
										<?php endswitch; ?>
									</td>
									<td class="text-center"><?php echo (isset($vo['signName']) && ($vo['signName'] !== '')?$vo['signName']:""); ?></td>
									
									<td class="text-center"><?php echo (isset($vo['create_time']) && ($vo['create_time'] !== '')?$vo['create_time']:""); ?></td>
									<td class="text-center">
										<?php if($isSuper == '1'): switch($vo['status']): case "1": ?>
													<a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,0);">通过</a>
												<?php break; default: ?>
													<a href="javascript:void(0);" onclick="setstatus(<?php echo $vo['id']; ?>,1);">审核中</a>
											<?php endswitch; else: switch($vo['status']): case "1": ?>通过<?php break; default: ?>审核中
											<?php endswitch; endif; ?>
										
									</td>
							
									<td class="text-center">
										<?php switch($vo['status']): case "1": ?>编辑<?php break; default: ?>
											<a href="javascript:void(0);" onclick="addNew(<?php echo (isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:""); ?>);">编辑</a>
										<?php endswitch; ?>
										  
											<a href="javascript:void(0);" onclick="delRole(<?php echo (isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:""); ?>);">删除</a>	
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
						<button class="btn btn-primary" onclick="delRole(0);" target-form="ids">删 除</button>
					</div>
				</footer>
		</div>
					
	</div>					
    


</div>

 <script type="text/javascript">
 
 $(function(){
		var keyword = "<?php echo (isset($_GET['keyword']) && ($_GET['keyword'] !== '')?$_GET['keyword']:''); ?>";
		$('#keyword').val(keyword);
})
 
 //设置状态
 function setstatus(id,status){			
 		var url = "<?php echo url('setTplStatus'); ?>";	
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
 

//删除模板
 function delRole(id){
    var r=confirm('确认删除?');
     	if (!r) 
           return; 
     	   var ids;
 	    	if(id){
 	    		var Ids=[];
 	    		Ids.push(id);
 	    		ids = Ids;
 	    	}else{
 	    		 var IdsVal = [];
 	        	 var roleids = document.getElementsByName("roleids");
 	    		 for ( var j = 0; j < roleids.length; j++) {
 	    		    if (roleids.item(j).checked == true) {
 	    		    	IdsVal.push(roleids.item(j).value);
 	    		    }
 	    		 }
 	    		 ids = IdsVal;
 	    	}
 		
 	    	if(!ids.length){
 	    		alert("至少选择一条。");
 	    		 return false; 
 	    	}
 	    	
     		 $.post("<?php echo url('delTpl'); ?>",{'ids':ids},function(data){
     			if (data.code) {
		    		 alert(data.msg);
		    	}else{
		    		 location.reload();
		    	}
 				
 			}); 
     

 }
//全选
 function allcheck(){			
 	if ($('.check-all').is(":checked")) {	
 		$('.rolecheck').prop("checked","checked");
 	}else{
 		$('.rolecheck').prop("checked",false);
 	}

 }
  
 </script>
  
</div>


<!-- 新建(编辑)短信模板 -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">添加短信模板</h4>
				  </div>
				  <div class="modal-body">
						  <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">
								
								  <div class="form-group">
								  	<label class="col-lg-3 control-label">关联通道：</label>
								  	<div class="col-lg-9 col-sm-9">
								  		<select id="tplChannel" name="tplChannel" onchange="getprice(this,'c');" class="form-control textwidth">
								  			<option value=" ">请选择</option>
								  			<?php if(is_array($channellist) || $channellist instanceof \think\Collection || $channellist instanceof \think\Paginator): $i = 0; $__LIST__ = $channellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
								  				<option value="<?php echo (isset($cvo['id']) && ($cvo['id'] !== '')?$cvo['id']:""); ?>"><?php echo (isset($cvo['name']) && ($cvo['name'] !== '')?$cvo['name']:""); ?></option>
								  			<?php endforeach; endif; else: echo "" ;endif; ?>
								  		</select>
								  	</div>
								  </div>

									<div class="form-group">
										<label class="col-lg-3 control-label">关联签名：</label>
										<div class="col-lg-9 col-sm-9">
									     <select id="tplSign" name="tplSign" class="form-control textwidth">
                        <option value=" ">请选择</option>
												<?php if(is_array($signlist) || $signlist instanceof \think\Collection || $signlist instanceof \think\Paginator): $i = 0; $__LIST__ = $signlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                          <option value="<?php echo (isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:""); ?>"><?php echo (isset($vo['name']) && ($vo['name'] !== '')?$vo['name']:""); ?></option>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											 </select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">模板类型：</label>
										<div class="col-lg-9 col-sm-9">
											<select id="tplType" name="tplType" onchange="getprice(this,'t');" class="form-control textwidth">
                        <option value="">请选择</option>
                        <option value="0">验证码类</option>
                        <option value="1">通知类</option>
                        <option value="2">营销类</option>
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">模板名称：</label>
										<div class="col-lg-9 col-sm-9">
											<input type="text" class="form-control textwidth" placeholder="请输入模板名称" name="tplName" id="tplName" value="" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">模板价格：</label>
										<div class="col-lg-9 col-sm-9">
											<input type="number" min="0" style="width:235px;" readonly="readonly" class="form-control pull-left" placeholder="请输入模板价格" name="tplPrice" id="tplPrice" value="" />
											<span style="line-height: 40px;margin-left: 5px;">元</span>
										</div>
									</div>
										
									<div class="form-group">
										<label class="col-lg-3 control-label">模板内容：</label>
										<div class="col-lg-9 col-sm-9">
											 <textarea name="templateInfo" id="templateInfo" style="width: 90%;"></textarea>
											 <span style="line-height: 40px;margin-left: 5px;">验证码标签：[code]</span>
										</div>
		
									</div>
									
				          <input type="hidden" name="tplId" id="tplId" value="" />
 
							</form>
				  <br/>
				 </div>
				 <div style="clear:both;"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" onclick="uploadData();" class="btn btn-primary">保存</button>
				</div>
			</div>
						 
			</div>
		 
    <script type="text/javascript">
			

			var pc = 0,pt = null;
			
			function getprice(obj, type){
				
				if(type == "c"){
					 pc = $(obj).val();
				}
				else if(type == "t"){
				
					if($(obj).val() == ""){
						pt = null;
					}else{
						pt = $(obj).val();
					}
				}
				
			
						<?php if(is_array($channellist) || $channellist instanceof \think\Collection || $channellist instanceof \think\Paginator): $i = 0; $__LIST__ = $channellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				
							if(<?php echo $vo['id']; ?> == pc){
							
								if(pt==0){
									console.log("0");
									$("#tplPrice").val('<?php echo $vo['price']['codePrice']; ?>');
								}else if(pt==1){
									console.log("1");
									$("#tplPrice").val('<?php echo $vo['price']['noticePrice']; ?>');
								}else if(pt==2){
									console.log("2");
									$("#tplPrice").val('<?php echo $vo['price']['marketingPrice']; ?>');
								}else{
									console.log("null");
									$("#tplPrice").val("");
								}
								
							}
		
						<?php endforeach; endif; else: echo "" ;endif; ?>


			}

	   //保存页面
		 function addNew(uid){	
			 $("#tplId").val(uid);
			 
			 if(uid > 0){

				 		$.ajax({
				 				type: "POST",
				 				dataType:'json',
				 				url: "<?php echo url('User/Sms/getTemplate'); ?>",
				 				cache: false,
				 				data: {id:uid},
				 				success: function(data) {
									
									if (data.code == 0) {
										
										  var data = data.data;
											$("#tplChannel").val(data.channel_id);
											$("#tplSign").val(data.sign_id);
											$("#tplType").val(data.type);
											$("#tplName").val(data.name);
											$("#tplPrice").val(data.price);
											$("#templateInfo").val(data.conent);
                    
                      $('#newModal').modal('show');

									}
									
 				 				},
				 				error: function(data) {
				 					alert("获取数据失败");
				 				}
				 		}) 
				 		
				 
			 }
			 else{
				 
				 $("#tplChannel").val(" ");
				 $("#tplSign").val(" ");
				 $("#tplType").val("");
				 $("#tplName").val("");
				 $("#tplPrice").val("");
				 $("#templateInfo").val("");
				 $('#newModal').modal('show');

			 }
			
		 }	
		 
		 
		 function uploadData(){
		 	
		 		var tplChannel = $("#tplChannel").val();
		 		if(!tplChannel){
		 			alert("关联通道不能为空"); 
		 			return false; 
		 		}
		 	  
				var tplSign = $("#tplSign").val();
				if(!tplSign){
					alert("关联签名不能为空"); 
					return false; 
				}
		
				var tplType = $("#tplType").val();
				if(tplType==''){
					alert("模板类型不能为空"); 
					return false; 
				}
				
				var tplName = $("#tplName").val();
				if(tplName==''){
					alert("模板名称不能为空"); 
					return false; 
				}
				
				var tplPrice = $("#tplPrice").val();
				if(tplPrice==''){
					alert("模板价格不能为空"); 
					return false; 
				}
				
				var templateInfo = $("#templateInfo").val();
				if(templateInfo==''){
					alert("模板内容不能为空"); 
					return false; 
				}
				
				//return false; 

				var href = "<?php echo url('User/Sms/template'); ?>";
				
			 var tplId = $("#tplId").val();
// 			 if(tplId > 0){
// 				
// 				 href = "<?php echo url('User/Label/editLabel'); ?>";
// 				 
// 			 }
	
	
		 		 $.ajax({
		 		     type: "POST",
		 		     dataType:'json',
		 		     url: href,
		 		     cache: false,
		 		     data: $("#form").serialize(),
		 		     success: function(data) {
		          
		 		    	if (data.code == 0) {
								
		 		    	     alert(data.msg + ' 页面即将自动刷新~');
		 		   
		 		    	}else{
		 		    		 alert(data.msg);
		 		    		
		 		    	}
							
							location.reload();
							
		 		     },
		 		     error: function(data) {
		 		    	 alert("提交失败");
		 		     }
		 		 }) 
		 		 
		   $('#newModal').modal('hide');

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
