<?php
	session_start();
?>

<!DOCTYPE html>
<!--[if IE 9]> <html class="ie-9"> <![endif]-->
<!--[if IE 8]> <html class="ie-8"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head lang="ru">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="css/vendor/src/reset.css">
	<link rel="stylesheet" href="css/local/src/style.css" >
	<link rel="stylesheet" href="css/local/src/sprite.css" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<!--[if lte IE 9]>
	      <script type="text/javascript" src="js/vendor/src/placeholders.min.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
	<![endif]-->
	<script type="text/javascript" src="js/vendor/src/picturefill.min.js"></script>
</head>
<body>
	<!-- begin page  -->
	<div class="page">
	<?php 
		if($page_item != "admin") {
	?>
	<!-- begin header -->
	<header class="header">
		<div class="header__in">
			<div class="logo">
				<a href="index.php" class="logo__a"><img src="images/design/logo.png" srcset="images/design/logo-2x.png 2x" width="245" height="57"></a>
			</div>
			<!-- begin menu__mobile -->
			<nav class="menu__mobile visible-tablet">
				<a href="#" class="menu__mobile-a">
					<div class="navicon">
						<ul class="navicon__ul">
							<li class="navicon__li"></li>
							<li class="navicon__li"></li>
							<li class="navicon__li"></li>
						</ul>
					</div>
				</a>
				<ul class="menu__ul <?php if($menu_item == "about") echo "is-first";?>">
					<li class="menu__li <?php if($menu_item == "about") echo "is-active";?>">
						<a href="index.php" class="menu__a"><span class="menu__span">Обо мне</span></a>
					</li>
					<li class="menu__li <?php if($menu_item == "work") echo "is-active";?>">
						<a href="work.php" class="menu__a"><span class="menu__span">Мои работы</span></a>
					</li>
					<li class="menu__li <?php if($menu_item == "feedback") echo "is-active";?>">
						<a href="feedback.php" class="menu__a"><span class="menu__span">Связаться со мной</span></a>
					</li> 
				</ul>
			</nav>
			<!-- end menu__mobile -->
			<div class="social">
				<ul class="social__ul">
					<li class="social__li">
						<a href="http://vk.com/id130461439" target="_blank" class="social__a social__a--vk">
							<div class="social__front"><span class="icon"></span></div>
							<div class="social__back"><span class="icon"></span></div>
						</a>
					</li>
					<li class="social__li">
						<a href="http://twitter.com/senja006" target="_blank" class="social__a social__a--tw">
							<div class="social__front"><span class="icon"></span></div>
							<div class="social__back"><span class="icon"></span></div>
						</a>
					</li>
					<li class="social__li">
						<a href="http://www.facebook.com/profile.php?id=100008555380366" target="_blank" class="social__a social__a--fb">
							<div class="social__front"><span class="icon"></span></div>
							<div class="social__back"><span class="icon"></span></div>
						</a>
					</li>
					<li class="social__li">
						<a href="https://github.com/senja006" target="_blank" class="social__a social__a--git">
							<div class="social__front"><span class="icon"></span></div>
							<div class="social__back"><span class="icon"></span></div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</header>
	<!-- end header -->
	<?php } ?>