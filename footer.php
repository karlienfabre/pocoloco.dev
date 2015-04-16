		<?php if (!is_page_template('template-contact.php')): ?>
			<!-- Contact Section -->
			<section class="section-content no-padding">
				<div class="container">
					<div class="element-line">
						<p class="lead text-center">
							Heb je een vraag, wil je een reis op maat, of wat dan ook ... ? <br /><a href="/pocoloco/contact/">Contacteer ons hier</a>
						</p>
					</div>
				</div>
				<?php get_template_part('includes/social-links'); ?>
			</section>
			<!-- Contact Section -->
		<?php endif ?>

		<!-- Parallax Container -->
		<div id="five-parallax" class="parallax" style="background-image: url('<?php root() ?>img/home/background_5.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
			<div class="parallax-overlay parallax-background-color">
				<div class="section-content">
					<div class="container text-center">

						<!-- Parallax title -->
						<p class="lead white">
							Poco Loco Adventures is een product in samenwerking met: 
						</p>
						<!-- Parallax title -->

						<!-- Parallax content -->
						<div class="parallax-content co-operation">
							<p>
								Joker<br />
								Geerdegevaart 96-98<br />
								2800 Mechelen<br />
								<a href="http://www.joker.be" target="_blank">www.joker.be</a><br />
								<img src="<?php root() ?>img/home/logo_joker_reizen.png" alt=""/>
							</p>
<span>© Copyright 2007-<?php echo date('Y') ?> by Poco Loco Adventures - pocoloco@pocolocoadventures.be - +32(0)35016790 </span>
						</div>
						<!-- Parallax content -->

					</div>
				</div>
			</div>
		</div>
		<!-- Parallax Container -->

		<footer class="text-center">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-sm-offset-1  col-xs-6 col-md-offset-1">
					<a href="http://www.allianz-global-assistance.be/content/1/nl/">
						<img src="<?php root() ?>img/logo_aga.jpg" alt="" />
					</a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6">
					<a href="http://joker.be">
						<img src="<?php root() ?>img/logo_joker.jpg" alt="" />
					</a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6"><img src="<?php root() ?>img/logo.png" alt="" /></div>
				<div class="col-md-2 col-sm-2 col-xs-6">
					<a href="http://www.doktersvandewereld.be/biketour-2015-soigneur-zkt-coureur">
						<img src="<?php root() ?>img/logo_mdm.jpg" alt="" />
					</a>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6">
					<a href="http://www.vaude.com/en-BE/?shp=2">
						<img src="<?php root() ?>img/logo_vaude.jpg" alt="" />
					</a>
				</div>
			</div>
		</footer>



		<!-- Js Library -->
		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="<?php root() ?>js/modernizr.js" type="text/javascript"></script>
		<script src="<?php root() ?>js/jquery.sticky.js"></script>
		<script src="<?php root() ?>js/jquery.easing-1.3.pack.js"></script>
		<script src="<?php root() ?>js/bootstrap.min.js"></script>
		<script src="<?php root() ?>js/bootstrap-modal.js" type="text/javascript"></script>
		<script src="<?php root() ?>js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
		<script src="<?php root() ?>js/jquery-countTo.js" type="text/javascript"></script>
		<script src="<?php root() ?>js/jquery.appear.js" type="text/javascript"></script>
		<script src="<?php root() ?>js/jquery.easy-pie-chart.js"></script>
		<script src="<?php root() ?>js/jquery.cycle.all.js"></script>
		<script src="<?php root() ?>js/jquery.maximage.js"></script>
		<script src="<?php root() ?>js/jquery.isotope.min.js"></script>
		<script src="<?php root() ?>js/skrollr.js"></script>
		<script src="<?php root() ?>js/jquery.flexslider-min.js" type="text/javascript"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.3.15/slick.min.js"></script>
		<script src="<?php root() ?>js/jquery.hoverdir.js" type="text/javascript"></script>
		<script src="<?php root() ?>js/jquery.steps.js" type="text/javascript"></script>
		<script src="<?php root() ?>js/jquery.validate.min.js"></script>
		<script src="<?php root() ?>js/portfolio_custom.js" type="text/javascript"></script>
		<script src="<?php root() ?>js/script.js"></script>
		<script src="<?php root() ?>js/retina-1.1.0.min.js"></script>
		<!-- Js Library -->

		<?php wp_footer(); ?>

	</body>
</html>