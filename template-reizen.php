<?php 
/*
Template Name: Reizen template
*/

 get_header(); ?>


		<!-- About Section -->
		<section id="reisaanbod" class="section-content page">
			<div class="container">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<!-- Section title -->
				<div class="section-title text-center">
					<h1 class="item_right"><?php the_title(); ?></h1>

					<p class="lead">
						<?php get_field('intro') ?>
					</p>
				</div>
				<!-- Section title -->

				<?php endwhile; ?>
			<?php endif; ?>

				<div class="row text-center search filters" id="filters">
					<div class="mybutton big choice">
						<button>
							<span data-filter=".groepsreizen" data-hover="Groepsreizen">Groepsreizen</span>
						</button>
					</div>
					<div class="mybutton big choice non-active">
						<button>
							<span data-filter=".individueel" data-hover="Individueel">Individueel</span>
						</button>
					</div>
					<div class="mybutton big choice non-active">
						<button>
							<span data-filter=".activiteiten" data-hover="Activiteiten">Activiteiten</span>
						</button>
					</div>
				</div>

				<div class="row text-center search filters">
					<div class="mybutton small label" id="alleReizen">
						<button>
							<span data-filter="*" data-hover="AlleReizen"><i class="fa fa-ban"></i>Alle reizen</span>
						</button>
					</div>
					<div class="mybutton small non-active label">
						<button>
							<span data-filter=".bergsport" data-hover="Bergsport"><i class="fa fa-check-circle-o"></i>Bergsport</span>
						</button>
					</div>
					<div class="mybutton small non-active label">
						<button>
							<span data-filter=".watersport" data-hover="Watersport"><i class="fa fa-check-circle-o"></i>Watersport</span>
						</button>
					</div>
					<div class="mybutton small non-active label">
						<button>
							<span data-filter=".luchtsport" data-hover="Luchtsporten"><i class="fa fa-check-circle-o"></i>Luchtsporten</span>
						</button>
					</div>
					<div class="mybutton small non-active label">
						<button >
							<span data-filter=".mountainbike" data-hover="Mountainbike"><i class="fa fa-check-circle-o"></i>Mountainbike</span>
						</button>
					</div>
					<div class="mybutton small non-active label">
						<button>
							<span data-filter=".multi" data-hover="Multi activiteiten"><i class="fa fa-check-circle-o"></i>Multi activiteiten</span>
						</button>
					</div>
				</div>

			<?php 
				$args = array(
					'post_type' => 'reizen',
					'order' => 'ASC',
					'orderby' => 'title',
					'nopaging' => true
				);

				$query = new WP_Query( $args );
			?>

			<?php if ( $query->have_posts() ) : ?>

				<!-- Parallax content -->
				<div class="parallax-content">
					<div class="row text-center">
						<div id="no-results">
							<h4>Momenteel zijn er geen reizen die aan jouw zoekopdracht voldoen. Wijzig je zoekopdracht of contacteer ons voor een aanbod op maat</h4>
						</div>

						<div id="travel-wrap">

						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						
							<!-- travel item -->
							<div class="travel-box individueel multi col-md-3 col-sm-3 col-xs-12">
								<div class="">
									<a href="<?php the_permalink(); ?>">

										<?php
											$thumb_id = get_post_thumbnail_id();
											$thumb_url = wp_get_attachment_image_src($thumb_id,'medium');
										?>
										<img src="<?php echo $thumb_url[0]; ?>" width="222" height="153" />

										<div class="price-overlay">
											<span class="price-from">vanaf</span></br>
											
											<?php 
												$minprice = 9999;
												$aantalData = 0;
												$reisdatas = get_field('reisdata');
												if (is_array($reisdatas)) {
													$aantalData = count($reisdatas);
													$minprice = get_minPrice($reisdatas);
												}
											 ?>

											<span class="muted">&euro;<?php echo $minprice; ?></span>
										</div>
										<h4><?php the_title(); ?></h4>
										<p>
											<?php echo get_field('intro'); ?>
										</p>
										<div class="travel-data">
											<i class="fa fa-calendar"></i>
											<span class="muted">
												<?php if ($aantalData == 1): ?>
													<?php echo substr($reisdatas[0]['vertrekdatum'], 6, 2) .'/'. substr($reisdatas[0]['vertrekdatum'], 4, 2); ?> - <?php echo substr($reisdatas[0]['einddatum'], 6, 2) .'/'. substr($reisdatas[0]['einddatum'], 4, 2) .'/'. substr($reisdatas[0]['einddatum'], 0, 4); ?>
												<?php else: ?>
													meerdere afreisdata
												<?php endif ?>
											</span></br>
										</div> 

										<div class="mybutton small">
											<button type="link" class="linkbutton" data-url="<?php the_permalink(); ?>">
												<span data-hover="Bekijken">Bekijken</span>
											</button>
										</div>
									</a>
								</div>
							</div>
							<!-- travel item -->

						<?php endwhile; ?>

						</div>						
					</div>
				</div>
				<!-- Parallax content -->

			<?php endif; ?>
			<?php wp_reset_query(); ?>

			</div>
		</section>
		<!-- About Section -->

		<!-- Parallax Container -->
		<div id="one-parallax" class="parallax" style="background-image: url('img/reisaanbod/background_1.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
			<div class="parallax-overlay parallax-background-color">
				<div class="section-content">
					<div class="container text-center" style="height:437px;">
					</div>
				</div>
			</div>
		</div>
		<!-- Parallax Container -->

<?php get_footer(); ?>