<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"/www/wwwroot/web/application/user/view/sms/channel.html";i:1551953756;s:55:"/www/wwwroot/web/application/user/view/public/base.html";i:1569485441;}*/ ?>
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

#form .margintip10 {
    margin-top: 10px;
}
</style>
<div class="row">
<div class="col-lg-12">
	<div class="main-box clearfix">	
		<header class="main-box-header clearfix">
		  <div class="pull-left">
			  <h1><i style="font-size: 30px;margin-right: 10px;" class="icon iconfont icon-navicon-dxtdwh"></i>短信通道</h1>
				<a class="btn btn-primary" href="javascript:void(0);" onclick="addNew(0);">添加通道</a>
		  </div>
		</header>
		
		 
		<div class="main-box-body clearfix">
		
	      <section class="navbar navbar-default main-box-header clearfix">
	         <div  class="pull-right">
						 <form class="form-inline"  method="get" role="form">
							 
							<div class="form-group">
								<label>通道名：</label>
								<input type="text" class="form-control" id="keyword" name="keyword" placeholder="请输入通道名.....">
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
									<th class="text-center">通道名称	</th>
					        <th class="text-center">接口地址</th>
					        <th class="text-center">短信帐号	</th>
									<th class="text-center">状态</th>	
									<th class="text-center">默认</th>	
									<th class="text-center">价格</th>	
									<th class="text-center">剩余数量</th>	
									<th class="text-center">备注</th>	
					        <th class="text-center" style="width: 70px;">操作</th> 
					    </tr>
				    </thead>
				   <tbody>
				   
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
								<tr>
								 <td class="text-center">
										<input type="checkbox" name="channelids" class="channelids" value="<?php echo (isset($list['id']) && ($list['id'] !== '')?$list['id']:""); ?>"/>
								 </td>
									<td class="text-center"><?php echo (isset($list['name']) && ($list['name'] !== '')?$list['name']:""); ?></td>
									<td class="text-center"><?php echo (isset($list['url']) && ($list['url'] !== '')?$list['url']:""); ?></td>
									<td class="text-center"><?php echo (isset($list['user_id']) && ($list['user_id'] !== '')?$list['user_id']:""); ?></td>
									<td class="text-center">
										<!-- <a href="javascript:void(0);" onclick="showExamine(212);"></a> -->
										 <?php switch($list['status']): case "1": ?>通过<?php break; default: ?>审核中
										 <?php endswitch; ?>
									</td>
									<td class="text-center">
										<?php switch($list['is_default']): case "1": ?>是<?php break; default: ?>否
										<?php endswitch; ?>
									</td>
									<td class="text-center"><?php echo (isset($list['price']) && ($list['price'] !== '')?$list['price']:""); ?></td>
									
									<td class="text-center"><?php echo (isset($list['count']) && ($list['count'] !== '')?$list['count']:""); ?></td>
									<td class="text-center"><?php echo (isset($list['remarks']) && ($list['remarks'] !== '')?$list['remarks']:""); ?></td>
							
									<td class="text-center">
										  <a href="javascript:void(0);" onclick="addNew(<?php echo (isset($list['id']) && ($list['id'] !== '')?$list['id']:'0'); ?>);">编辑</a>
											<a href="javascript:void(0);" onclick="delRole(<?php echo (isset($list['id']) && ($list['id'] !== '')?$list['id']:'0'); ?>);">删除</a>	
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
 

//删除角色
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
 	        	 var roleids = document.getElementsByName("channelids");
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
 	    	
     		$.post("<?php echo url('delChannel'); ?>",{'ids':ids},function(data){
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
 		$('.channelids').prop("checked","checked");
 	}else{
 		$('.channelids').prop("checked",false);
 	}

 }
  
 </script>
  
</div>


<!-- 新建通道 -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	
		<div class="modal-dialog">
			
			<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								 <span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">短信通道</h4>
				  </div>
				 <div class="modal-body">
						  <form id="form" method="post" class="form-horizontal" enctype="multipart/form-data" method="post">

									<div class="form-group">
										<label class="col-lg-3 control-label">通道名称：</label>
										<div class="col-lg-9 col-sm-9">
											 <input type="text" class="form-control textwidth" placeholder="请输入通道名称" name="celName" id="celName" value="" />
										</div>
									</div>
										
									<div class="form-group">
										<label class="col-lg-3 control-label">接口地址：</label>
										<div class="col-lg-9 col-sm-9">
											 	<input type="text" class="form-control textwidth" placeholder="请输入接口地址" name="iAddress" id="iAddress" value="" />					 
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">短信ID：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="text" class="form-control textwidth" placeholder="请输入短信ID" name="account_id" id="account_id" value="" />					 
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">短信账号：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="text" class="form-control textwidth" placeholder="请输入短信账号" name="account" id="account" value="" />					 
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">短信密码：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="text" class="form-control textwidth" placeholder="请输入短信密码" name="acpsw" id="acpsw" value="" />					 
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">单价：</label>
										<div class="col-lg-9 col-sm-9">
											<div class="form-group">
												<label class="col-lg-3 control-label">验证码类：</label>
												<div class="col-lg-8 col-sm-8">
														<input type="number" min="1" class="form-control pull-left" style="width: 80%;" placeholder="请输入验证码类单价" name="codePrice" id="codePrice" value="" />					 
														<span style="line-height: 40px;margin-left: 5px;">元</span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-3 control-label">通知类：</label>
												<div class="col-lg-8 col-sm-8">
														<input type="number" min="1" class="form-control pull-left" style="width: 80%;" placeholder="请输入通知类单价" name="noticePrice" id="noticePrice" value="" />					 
														<span style="line-height: 40px;margin-left: 5px;">元</span>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-3 control-label">营销类：</label>
												<div class="col-lg-8 col-sm-8">
														<input type="number" min="1" class="form-control pull-left" style="width: 80%;" placeholder="请输入营销类单价" name="marketingPrice" id="marketingPrice" value="" />					 
												    <span style="line-height: 40px;margin-left: 5px;">元</span>
												</div>
											</div>
											
										
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">数量：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="text" class="form-control textwidth" placeholder="请输入数量" name="quantity" id="quantity" value="" />					 
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">备注：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="text" class="form-control textwidth" placeholder="请输入备注" name="remarks" id="remarks" value="" />					 
										</div>
									</div>
									
								<!-- 	<div class="form-group">
										<label class="col-lg-3 control-label">签名在前：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="checkbox" class="margintip10" name="autograph" id="autograph" value="1" title="是" />					 
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-3 control-label">是否有效：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="checkbox" class="margintip10" name="effective" id="effective" value="1" title="是" />					 
										</div>
									</div> -->
									
									<div class="form-group">
										<label class="col-lg-3 control-label">默认：</label>
										<div class="col-lg-9 col-sm-9">
												<input type="checkbox" class="margintip10" name="default" id="default" value="1" title="是" />					 
										</div>
									</div>
									
									
				          <input type="hidden" name="channelId" id="channelId" value="" />
 
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

	     //保存页面
		 function addNew(uid){	
			 $("#channelId").val(uid);
			 
			 if(uid > 0){

				 		$.ajax({
				 				type: "POST",
				 				dataType:'json',
				 				url: "<?php echo url('User/Sms/getChannel'); ?>",
				 				cache: false,
				 				data: {id:uid},
				 				success: function(data) {
	
									if (data.code == 0) {
										
										  var data = data.data;
										$("#celName").val(data.name);
										$("#iAddress").val(data.url);
										$("#account_id").val(data.user_id);
										$("#account").val(data.access_secret);
										
										$("#acpsw").val(data.password);

										var price = data.price;
										$("#codePrice").val(price.codePrice);
										$("#noticePrice").val(price.noticePrice);
										$("#marketingPrice").val(price.marketingPrice);

										$("#quantity").val(data.count);
										$("#remarks").val(data.remarks);
										if(data.is_default){
											$("#default").prop("checked",true);
										}else{
											$("#default").prop("checked",false);
										}
										
                    
                      $('#newModal').modal('show');

									}
									
 				 				},
				 				error: function(data) {
				 					alert("提交失败");
				 				}
				 		}) 
				 		
				 
			 }
			 else{
				 
					$("#celName").val("");
					$("#iAddress").val("");
					$("#account_id").val("");
					$("#account").val("");
					$("#acpsw").val("");

					$("#codePrice").val("");
					$("#noticePrice").val("");
					$("#marketingPrice").val("");
					$("#quantity").val("");
					$("#remarks").val("");
					
					$("#default").prop("checked",false);

					$('#newModal').modal('show');

			 }
			
		 }	
		 
		 
		 function uploadData(){

		 		var celName = $("#celName").val();
		 		if(!celName){
		 			alert("通道名称不能为空"); 
		 			return false; 
		 		}
		 	  var iAddress = $("#iAddress").val();
		 	  if(iAddress==''){
		 		  alert("接口地址不能为空"); 
		 		  return false; 
		 	  }
				var account_id = $("#account_id").val();
		 	  if(account_id==''){
		 		  alert("短信ID不能为空"); 
		 		  return false; 
		 	  }
				var account = $("#account").val();
		 	  if(account==''){
		 		  alert("短信账号不能为空"); 
		 		  return false; 
		 	  }
				

		 	  var codePrice = $("#codePrice").val();
		 	  if(codePrice==''){
		 		  alert("验证码类单价不能为空"); 
		 		  return false; 
		 	  }
				
				var noticePrice = $("#noticePrice").val();
				if(noticePrice==''){
					alert("通知类单价不能为空"); 
					return false; 
				}
				
				var marketingPrice = $("#marketingPrice").val();
				if(marketingPrice==''){
					alert("营销类单价不能为空"); 
					return false; 
				}
				
				
				var quantity = $("#quantity").val();
				if(quantity==''){
					alert("数量不能为空"); 
					return false; 
				}
	
	
	
				var href = "<?php echo url('User/Sms/channel'); ?>";
				

		 		 $.ajax({
		 		     type: "POST",
		 		     dataType:'json',
		 		     url: href,
		 		     cache: false,
		 		     data: $("#form").serialize(),
		 		     success: function(data) {
		           // console.log(data);
		 		     	 //location.href = "<?php echo url('User/member/whitelist'); ?>";
		 		    	if (data.code == 0) {
		 		    	     alert(data.msg + ' 页面即将自动刷新~');
		 		    	 	// location.href = "<?php echo url('User/member/whitelist'); ?>";
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
