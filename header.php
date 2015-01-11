<!DOCTYPE html>
<html lang="en">

	<head>
		<title>PocoLoco Adventures</title>
		<meta charset="UTF-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
		<meta name="description" content="Responsive One Page HTML5/CSS3 Parallax Site Template" />
		<meta name="author" content="Creative-Ispiration">

		<!-- Favicons -->
		<link rel="shortcut icon" href="<?php root() ?>img/ico-16.ico">
		<link rel="apple-touch-icon" href="<?php root() ?>img/ico-57.png" sizes="57x57">
		<link rel="apple-touch-icon" href="<?php root() ?>img/ico-72.png" sizes="72x72">
		<link rel="apple-touch-icon" href="<?php root() ?>img/ico-114.png" sizes="114x114">
		<link rel="apple-touch-icon" href="<?php root() ?>img/ico-144.png" sizes="144x144">

		<!-- Stylesheet -->
		<link href="<?php root() ?>css/normalize.css" rel="stylesheet" type="text/css" />
		<link href="<?php root() ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php root() ?>css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php root() ?>css/flexslider.css" rel="stylesheet">
		<link href="<?php root() ?>css/style.css" rel="stylesheet">
		<link href="<?php root() ?>css/style-responsive.css" rel="stylesheet">
		<link href="<?php root() ?>css/isotope.css" rel="stylesheet">
		<link href="<?php root() ?>css/slick.css" rel="stylesheet">

		<!-- Primary color theme -->
		<link id="primary_color_scheme" href="<?php root() ?>css/color/orange.css" rel="stylesheet">

		<!-- GoogleFontFamily -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<?php wp_head(); ?>
	</head>

	<body data-spy="scroll" data-target=".navbar" data-offset="75">

		<!-- Intro loader -->
		<div class="mask">
			<div id="intro-loader"></div>
		</div>
		<!-- Intro loader -->

	<?php if (is_front_page()): ?>
		<!-- Home Section -->
		<section id="home">

			<div id="fullscreen-slider" class="mc-cycle">
				<!-- Slider item -->
				<div class="slider-item">
					<img src="<?php root() ?>img/home/header.jpg" alt="">
					<div class="pattern">
						<div class="slide-content">

							<!-- Section title -->
							<div class="section-title">
								<div class="col-md-7 col-md-offset-5 no-padding">
									<div class="black">
										<p>Your adventures</br> starts here</p>
									</div>
									<div class="yellow text-center">
										<img class="logo" src="<?php root() ?>img/logo.png" alt="logo poco loco adventures"> 
									</div>
									<div class="black text-center">
										<a href="#about" class="zoom">
											<img class="arrow" src="<?php root() ?>img/arrow_down_white.png"/>
										</a>										
									</div>
								</div>

								<div class="col-md-2  black"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- Slider item -->

			</div>
		</section>
		<!-- Home Section -->
	<?php endif ?>

		<!-- Navbar -->
		<div id="navigation" class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navbar-inner">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-bars fa-2x"></i>
					</button>
					<a id="brand" class="navbar-brand" href="#home"> 
						<img src="<?php root() ?>img/logo.png" alt="logo poco loco adventures"> 
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="index.html" class="int-collapse-menu">Home</a>
						</li>

						<li>
							<a href="reisaanbod.html" class="int-collapse-menu">Reisaanbod</a>
						</li>
						<li>
							<a href="#blog" class="int-collapse-menu">Nieuws</a>
						</li>
						<li>
							<a href="carpool.html" class="int-collapse-menu">Carpool</a>
						</li>
						<li>
							<a href="#contact" class="int-collapse-menu">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Navbar -->