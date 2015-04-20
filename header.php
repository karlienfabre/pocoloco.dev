<!DOCTYPE html>
<html lang="en">

	<head>
		<?php if (is_front_page()): ?>
		<title><?php echo get_bloginfo('description'); ?> &raquo; <?php wp_title('&raquo;', true, 'right'); ?></title>
		<?php else: ?>
		<title><?php wp_title('&raquo;', true, 'right'); ?></title>
		<?php endif ?>
		<meta charset="UTF-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />

		<!-- Favicons -->
		<link rel="shortcut icon" href="<?php root() ?>img/ico-16.ico">
		<link rel="apple-touch-icon" href="<?php root() ?>img/ico-57.png" sizes="57x57">
		<link rel="apple-touch-icon" href="<?php root() ?>img/ico-72.png" sizes="72x72">
		<link rel="apple-touch-icon" href="<?php root() ?>img/ico-114.png" sizes="114x114">
		<link rel="apple-touch-icon" href="<?php root() ?>img/ico-144.png" sizes="144x144">

		<script src="<?php root() ?>js/css_browser_selector.js" type="text/javascript"></script>

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

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-58952118-2', 'auto');
		  ga('send', 'pageview');

		</script>

		<?php wp_head(); ?>
	</head>

	<body data-spy="scroll" data-target=".navbar" data-offset="75" <?php body_class(); ?>>

	<?php if (is_front_page()): ?>
		<!-- Home Section -->
		<section id="home">

			<div id="fullscreen-slider" class="mc-cycle">
				<!-- Slider item -->
				<div class="slider-item">
					<img id="bgimg" src="<?php root() ?>img/home/background_header_0.jpg" alt="">
					<div class="pattern">
						<div class="slide-content">

							<!-- Section title -->
							<div class="section-title text-center">
								<h1>Poco loco<i>adventures</i></h1>
								<div>
									<span class="line big"></span>
									<span class="big-text">Your adventure starts here</span>
									<span class="line big"></span>
								</div>
								<p class="lead">
									<!-- Bank Randy Colvin tailslide full pipe flypaper boardslide feeble -->
									<a href="#about" class="zoom">
										<img class="arrow" src="<?php root() ?>img/arrow_down_white.png"/>
									</a>
								</p>
							</div>
							<!-- Section title -->

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
					<a id="brand" class="navbar-brand" href="<?php echo home_url('/'); ?>"> 
						<img src="<?php root() ?>img/logo_nav.png" alt="logo poco loco adventures"> 
					</a>
				</div>
				<?php 
					$locations = get_nav_menu_locations();
					$items = wp_get_nav_menu_items( $locations['main'] );
				 ?>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">

						<?php foreach ($items as $item): 

							$active = false;

							global $post;

							if ($item->object_id == $post->ID) {
								$active = true;
							}
							elseif ($item->object_id == 137) {
								if ($post->post_type == 'reizen') {
									$active = true;
								}
							}
							elseif ($item->object_id == 72) {
								if ($post->post_type == 'forum' || $post->post_type == 'topic') {
									$active = true;
								}
							}
							elseif ($item->object_id == 40) {
								if ($post->post_type == 'post') {
									$active = true;
								}
							}

							if ($active): ?>
							<li class="active">
							<?php else: ?>
							<li>
							<?php endif ?>
								<a href="<?php echo $item->url; ?>" class="int-collapse-menu"><?php echo $item->title ?></a>
							</li>
						<?php endforeach ?>

					</ul>
				</div>
			</div>
		</div>
		<!-- Navbar -->