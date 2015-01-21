		<?php if (!is_page_template('template-contact.php')): ?>
			<!-- Contact Section -->
			<section id="" class="section-content no-padding">
				<div class="container">
					<div class="element-line">
						<p class="lead text-center">
							Heb je een vraag, wil je een reis op maat, of wat dan ook ... ? </br><a href="/pocoloco/contact/">Contacteer ons hier</a>
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
							Poco Loco Adventures Traveling is een product in samenwerking met: 
						</p>
						<!-- Parallax title -->

						<!-- Parallax content -->
						<div class="parallax-content co-operation">
							<p>
								Joker reizen NV (lic 1679)</br>
								Geerdegemvaart 96</br>
								2800 Mechelen</br>
								<a href="#">www.joker.be</a></br>
								<img src="<?php root() ?>img/home/logo_joker_reizen.png" alt=""/>
							</p>
<span>© Copyright 2013 by Poco Loco Adventures - pocoloco@pocolocoadventures.be - +32(0)35016790 </span>
						</div>
						<!-- Parallax content -->

					</div>
				</div>
			</div>
		</div>
		<!-- Parallax Container -->

		<footer class="text-center">
			<img src="<?php root() ?>img/logo.png"/>
		</footer>


		<!-- Js Library -->
		<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="<?php root() ?>js/modernizr.js" type="text/javascript"></script>
		<script src="<?php root() ?>js/jquery.sticky.js"></script>
		<script src="<?php root() ?>js/jquery.fitvids.js" type="text/javascript"></script>
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
		<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<script src="<?php root() ?>js/google-map.js"></script>
		<!-- Js Library -->

		<?php wp_footer(); ?>

	</body>
</html>