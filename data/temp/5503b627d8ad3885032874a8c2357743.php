<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:56:"/www/wwwroot/web/application/index/view/index/index.html";i:1551953794;s:56:"/www/wwwroot/web/application/index/view/public/base.html";i:1551953796;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title; ?></title>

<!-- core CSS -->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="__CSS__/style.css"/>

<!--[if lt IE 9]>
<script src="__PUBLIC__/js/html5shiv.js"></script>
<script src="__PUBLIC__/js/respond.min.js"></script>
<![endif]-->

</head>
<!--/head-->
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a href="<?php echo url('index/index/index'); ?>" class="navbar-brand logo"><img src="__PUBLIC__/images/logo.png" alt="Sencms网站管理系统" class="img-responsive" style="max-height: 100%;"></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				{nav name="nav"}
					<li><a href="<?php echo get_nav_url($nav['url']); ?>"><span class="glyphicon glyphicon-home"></span> <?php echo $nav['title']; ?></a></li>
				{/nav}
			</ul>	
		</div>
	</div>
</nav>

	<!--/header-->

<div id="myCarousel" class="carousel slide">
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="item active" style="background:#223240">
			<img src="__IMG__/slide1.png" alt="第一张">
		</div>
		<div class="item" style="background:#F5E4DC;">
			<img src="__IMG__/slide2.png" alt="第二张">
		</div>
		<div class="item" style="background:#DE2A2D;">
			<img src="__IMG__/slide3.png" alt="第三张">
		</div>
	</div>
	<a href="#myCarousel" data-slide="prev" class="carousel-control left">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a href="#myCarousel" data-slide="next" class="carousel-control right">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>

<div class="tab1">
	<div class="container">
		<h2 class="tab-h2">「为什么选择RuiKeCMS内容管理系统」</h2>
		<p class="tab-p">简单强大的内容管理系统，让WEB开发更方便，更快捷</p>
		<div class="row">
			<div class="col-md-6 col">
				<div class="media">
					<div class="media-left">
						<img src="__IMG__/tab1-1.png" class="media-object" alt="">
					</div>
					<div class="media-body">
						<h4 class="media-heading">基于ThinkPHP3.2</h4>
						<p>依托新版ThinkPHP的功能优势和命名空间的特性。</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col">
				<div class="media">
					<div class="media-left">
						<img src="__IMG__/tab1-2.png" class="media-object" alt="">
					</div>
					<div class="media-body">
						<h4 class="media-heading">安全可靠</h4>
						<p>提供的稳健的安全策略，包括备份恢复，容错，防止恶意攻击登陆，网页防篡改等多项安全管理功能，保证系统安全，可靠，稳定的运行。</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col">
				<div class="media">
					<div class="media-left">
						<img src="__IMG__/tab1-3.png" class="media-object" alt="">
					</div>
					<div class="media-body">
						<h4 class="media-heading">开源免费</h4>
						<p>代码遵循Apache2开源协议，并且免费使用，对商业用户友好。</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col">
				<div class="media">
					<div class="media-left">
						<img src="__IMG__/tab1-4.png" class="media-object" alt="">
					</div>
					<div class="media-body">
						<h4 class="media-heading">模块化开发</h4>
						<p>全新的架构和模块化的开发机制，便于灵活扩展和二次开发。</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<footer id="footer">
	<div class="container">
		<p>企业培训 | 合作事宜 | 版权投诉</p>
		<p>赣ICP备13006622号. © 2008-2015 南昌腾速科技有限公司. TenSent, Inc.</p>
	</div>
</footer>

<!--/#footer-->

<script src="__PUBLIC__/js/jquery.js"></script>
<script src="__PUBLIC__/js/bootstrap.min.js"></script>

<script type="text/javascript">
	//轮播自动播放
	$('#myCarousel').carousel({
		//自动4秒播放
		interval : 3000,
	});

	//设置文字垂直居中，谷歌浏览器加载图片的顺序问题，导致高度无法获取
	$(window).load(function () {
		$('.text').eq(0).css('margin-top', ($('.auto').eq(0).height() - $('.text').eq(0).height()) / 2 + 'px');
	});
	

	$(window).resize(function () {
		$('.text').eq(0).css('margin-top', ($('.auto').eq(0).height() - $('.text').eq(0).height()) / 2 + 'px');
	});

	$(window).load(function () {
		$('.text').eq(1).css('margin-top', ($('.auto').eq(1).height() - $('.text').eq(1).height()) / 2 + 'px');
	});

	$(window).resize(function () {
		$('.text').eq(1).css('margin-top', ($('.auto').eq(1).height() - $('.text').eq(1).height()) / 2 + 'px');
	});
</script>

</body>
</html>