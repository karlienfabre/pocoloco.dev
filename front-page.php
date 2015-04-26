<?php get_header(); ?>

		<!-- About Section -->
		<section id="about" class="section-content">
			<div class="container">

				<!-- Section title -->
				<div class="section-title text-center">
<!-- 					<div>
						<span class="line big"></span>
						<span>Wie zijn we</span>
						<span class="line big"></span>
					</div> -->
					<h1 class="item_right">Over ons</h1>
<!-- 					<div>
						<span class="line"></span>
						<span>We create adventures</span>
						<span class="line"></span>
					</div> -->
					<p class="lead">
						<?php echo get_field('over_ons_tekst'); ?>
					</p><br /><br />
					<div class="mybutton ultra">
						<a href="<?php echo home_url('/'); ?>reizen">
						<span>
							<button data-hover="Reizen bekijken">Reizen bekijken</button>
						</span>
						</a>
					</div>
				</div>
				<!-- Section title -->

				<div class="row text-center">
					<div class="col-md-12">
						<div class="element-line">
							
							<div class="flexslider">
								<ul class="slides">

								<?php
									$slides = get_field('slides');
									foreach($slides as $slide) :
								?>
									<!-- Item Slide -->
									<li>
										<div class="slide-item">
											<div class="row">
												<div class="col-md-12">
													<img src="<?php echo $slide['afbeelding']['sizes']['large'] ?>" class="img-responsive img-center" alt="">
												</div>
											</div>
										</div>
									</li>
									<!-- Item Slide -->
								<?php endforeach; ?>

								</ul>
							</div>
						</div>
					</div>

					<!-- item media -->
					<div class="col-md-12">
						<div class="element-line">
							<div class="item_left">
								<div class="media info-text">
									<div class="media-body">
										<h3 class="media-heading">Poco Loco Adventures en Joker Reizen</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- item media -->

					<!-- item media -->
					<div class="col-md-6">
						<div class="element-line">
							<div class="item_left">
								<div class="media info-text">
									<div class="media-body">
										<p>
											<?php echo get_field('joker_reizen_tekst'); ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- item media -->
					<!-- item media -->
					<div class="col-md-6">
						<div class="element-line">
							<div class="item_right">
								<div class="media info-text">
									<div class="media-body">
										<p>
											<?php echo get_field('pocoloco_adventures_tekst'); ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- item media -->
				</div>

				<div class="row text-center">
					<!-- Link item -->
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="element-line">
							<div class="item_top">
								<div class="hi-icon-effect-1">
									<a href="https://www.facebook.com/pocolocoadventures" class="" target="_blank"> <i class="hi-icon fa fa-facebook fa-4x"></i> </a>
								</div>
							</div>
						</div>
					</div>
					<!-- Link item -->

					<!-- Link item -->
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="element-line">
							<div class="item_bottom">
								<div class="hi-icon-effect-1">
									<a href="https://twitter.com/PocoLocoAdv" class="" target="_blank"> <i class="hi-icon fa fa-twitter fa-4x"></i> </a>
								</div>
							</div>
						</div>
					</div>
					<!-- Link item -->

					<!-- Link item -->
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="element-line">
							<div class="item_top">
								<div class="hi-icon-effect-1">
									<a href="https://plus.google.com/u/0/+PocolocoadventuresBeoutdoorTravel/posts" class="" target="_blank"> <i class="hi-icon fa fa-google-plus fa-4x"></i> </a>
								</div>
							</div>
						</div>
					</div>
					<!-- Link item -->

					<!-- Link item -->
					<div class="col-md-3 col-sm-3 col-xs-6">
						<div class="element-line">
							<div class="item_bottom">
								<div class="hi-icon-effect-1">
									<a href="https://www.youtube.com/channel/UCfDq31iyXK1Tl7vyPovIvfw" class="" target="_blank"> <i class="hi-icon fa fa-youtube fa-4x"></i> </a>
								</div>
							</div>
						</div>
					</div>
					<!-- Link item -->

				</div>




			</div>
		</section>
		<!-- About Section -->

		<!-- Parallax Container -->
		<div id="one-parallax" class="parallax" style="background-image: url('<?php root() ?>img/home/background_2.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
			<div class="parallax-overlay parallax-background-color">
				<div class="section-content">
					<div class="container text-center">

						<!-- Parallax title -->
						<h1><?php echo get_field('titel'); ?></h1>
<!-- 						<p class="lead">
							Our main Skills
						</p> -->
						<!-- Parallax title -->

						<!-- Parallax content -->
						<div class="parallax-content">
							<div class="cart">
								<div class="cart_container">
									<div class="row">
										<div class="col-md-4">
											<div class="element-line">
												<div class="circular-content">
													<div class="circular-item hidden">
														<div class="circ_counter_desc">
															<p class="lead">
																<?php echo get_field('subtitel_1'); ?>
															</p>
															<p>
																<?php echo get_field('tekst_1'); ?>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="element-line">
												<div class="circular-content">
													<div class="circular-item hidden">
														<div class="circ_counter_desc">
															<p class="lead">
																<?php echo get_field('subtitel_2'); ?>
															</p>
															<p>
																<?php echo get_field('tekst_2'); ?>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="element-line">
												<div class="circular-content">
													<div class="circular-item hidden">
														<div class="circ_counter_desc">
															<p class="lead">
																<?php echo get_field('subtitel_3'); ?>
															</p>
															<p>
																<?php echo get_field('tekst_3'); ?>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Parallax content -->

					</div>
				</div>
			</div>
		</div>
		<!-- Parallax Container -->

		<!-- Service Section -->
		<section id="kijkerreizen" class="section-content">
			<div class="container">

				<!-- Section title -->
				<div class="section-title text-center">
<!-- 					<div>
						<span class="line big"></span>
						<span>Avontuur</span>
						<span class="line big"></span>
					</div> -->
					<h1 class="item_left">Reizen in de kijker</h1>
<!-- 					<div>
						<span class="line"></span>
						<span>zit in elk van ons</span>
						<span class="line"></span>
					</div> -->
				</div>
				<!-- Section title -->


				<div class="row kijker_container">

					<?php
						$reizen = get_field('reizen_in_de_kijker');
						foreach($reizen as $post) : setup_postdata( $post );
					?>
					<!-- Blog item -->
					<div class="col-md-4 col-sm-4 col-md-4 col-xs-12">
						<div class="element-line">
							<div class="item_top">
								<div class="blog-element">
									<div class="blog-inner">
										<div class="blog-detail">
											<div class="blog-content">
												<h3>
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>
												<a href="<?php the_permalink(); ?>"> 
												<?php
												if (has_post_thumbnail()):
													$thumb_id = get_post_thumbnail_id();
													$thumb_url = wp_get_attachment_image_src($thumb_id,'homepage-thumb');
												?>
													<img src="<?php echo $thumb_url[0]; ?>" class="img-responsive" alt="">
												<?php endif; ?>
												</a>
												<p class="blog-intro short-text">
													<?php echo get_field('tekst_onder_subtitel'); ?>
												</p>
												<div class="pricebutton medium">
													<?php 
														$reisdata = get_field('reisdata');
														$reisdata_individueel = get_field('reisdata_individueel');
														$minprice = get_minPrice($reisdata, $reisdata_individueel);
													?>
													<a href="<?php the_permalink(); ?>"><span data-hover="Vanaf €<?php echo $minprice; ?> pp">Vanaf €<?php echo $minprice; ?> pp</span></a>
												</div><br>
												<div class="mybutton medium">
													<a href="<?php the_permalink(); ?>"> <button data-hover="Ontdek deze reis">Ontdek deze reis</button> </a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<!-- Blog item -->
				</div>
			</div>

				<div class="row text-center">
					<div class="col-md-10 col-md-offset-1">
						<div class="element-line">
							<div class="mybutton ultra">
								<a href="<?php echo home_url('/'); ?>reizen">
								<span>
									<button data-hover="Reizen bekijken">Alle reizen bekijken</button>
								</span>
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- Service Section -->


		<!-- Parallax Container -->
		<div id="nieuwsbrief" class="parallax" style="background-image: url('<?php root() ?>img/home/background_3.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
			<div class="parallax-overlay parallax-background-color">
				<div class="section-content">
					<div class="container text-center">
						<div class="item_right">

							<!-- Parallax title -->
							<h1>
								Schrijf je in op de nieuwsbrief
							</h1>
							<!-- form contact -->
							<form method="post" name="contactform" id="nieuwsbriefform" class="element-line validate" role="form">
								<div class="form-respond text-center"></div>
								<div class="row">
									<div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-6">
										<!-- Form group -->
										<div class="form-group">
											<input type="email" name="signup_name" id="signup_name" class="form-control input-lg required email" placeholder="Jouw email">
										</div>
										<!-- Form group -->
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 text-center">
										<div class="action form-button medium">

											<div class="mybutton medium">
												<span id="submit" type="submit">
													<button data-hover="Inschrijven">Inschrijven</button>
												</span>
											</div>

										</div>
									</div>
								</div>
							</form>
							<!-- form contact -->
							<!-- Parallax title -->

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Parallax Container -->

		<?php 
			$args = array(
				'post_type' => 'post',
				'order' => 'DESC',
				'orderby' => 'date',
				'posts_per_page' => 5,
				'category_name' => 'uitgelicht'
			);
			$query = new WP_Query( $args );
		 ?>
		<?php if ( $query->have_posts() ) : ?>

		<!-- Blog Section -->
		<section id="bloglatest" class="section-content">
			<div class="container">

				<!-- Section title -->
				<div class="section-title text-center">
<!-- 					<div>
						<span class="line big"></span>
						<span>Crooked grind Steve</span>
						<span class="line big"></span>
					</div> -->
					<h1 class="item_left">Laatste nieuws</h1>
<!-- 					<div>
						<span class="line"></span>
						<span>Wrap casper mongo</span>
						<span class="line"></span>
					</div> -->
				</div>
				<!-- Section title -->

				<div class="row blog_container">

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<!-- Blog item -->
					<div class="col-md-4 col-sm-4 col-md-4 col-xs-12">
						<div class="element-line">
							<div class="item_top">
								<div class="blog-element">
									<div class="blog-inner">
										<div class="blog-detail">
											<div class="blog-content">
												<h3>
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>
												<a href="<?php the_permalink(); ?>"> 
												<?php
												if (has_post_thumbnail()):
													$thumb_id = get_post_thumbnail_id();
													$thumb_url = wp_get_attachment_image_src($thumb_id,'homepage-thumb');
												?>
													<img src="<?php echo $thumb_url[0]; ?>" class="img-responsive" alt="">
												<?php endif; ?>
												</a>
												<p class="blog-date"><?php the_time('j F Y'); ?></p>
												<p class="blog-intro">
													<?php echo get_field('intro'); ?>
												</p>
												<div class="mybutton medium">
													<a href="<?php the_permalink(); ?>">
													<span>
														<button data-hover="Ontdekken">Lees meer</button>
													</span>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Blog item -->

				<?php endwhile; ?>

				</div>
			</div>
		</section>
		<!-- Team Section -->

		<?php endif; ?>
		<?php wp_reset_query(); ?>

		<!-- Parallax Container -->
		<div id="one-parallax" class="parallax" style="background-image: url('<?php root() ?>img/home/background_4.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
			<div class="parallax-overlay parallax-background-color">
				<div class="section-content">
					<div class="container text-center" style="height:437px;">
					</div>
				</div>
			</div>
		</div>
		<!-- Parallax Container -->

<?php get_footer(); ?>