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

				<div class="row text-center search filters" id="">
					<div class="mybutton small label col-xs-12" id="alleReizen">
						<span>
							<button data-filter="*" data-hover="AlleReizen"><i class="fa fa-ban"></i>Alle reizen</button>
						</span>
					</div>
					<div class="clearfix visible-xs button-seperator-xs"></div>
					<div class="mybutton small label non-active ">
						<span>
							<button data-filter=".groepsreizen" data-hover="Groepsreizen"><i class="fa fa-check-circle-o"></i>Groepsreizen</button>
						</span>
					</div>
					<div class="clearfix visible-xs button-seperator-xs"></div>
					<div class="mybutton small label non-active ">
						<span>
							<button data-filter=".individueel" data-hover="Individueel"><i class="fa fa-check-circle-o"></i>Individueel</button>
						</span>
					</div>
					<div class="clearfix visible-xs button-seperator-xs"></div>
					<div class="mybutton small label non-active">
						<span>
							<button data-filter=".activiteiten" data-hover="Activiteiten"><i class="fa fa-check-circle-o"></i>Activiteiten</span>
						</span>
					</div>
				</div>

				<div class="row text-center search filters">

					<?php $terms = get_terms('reiscategorie'); ?>
					<?php foreach ($terms as $term): ?>
						<div class="mybutton small non-active label">
							<span>
								<button data-filter=".<?php echo $term->slug ?>" data-hover="<?php echo $term->name ?>"><i class="fa fa-check-circle-o"></i><?php echo $term->name ?></button>
							</span>
						</div>
						<div class="clearfix visible-xs button-seperator-xs"></div>
					<?php endforeach ?>
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

							<?php 

								$reistype = get_the_terms(get_the_id(), 'reistype', '', ' ');
								$reiscategorie = get_the_terms(get_the_id(), 'reiscategorie', '', ' ');

								$terms = '';

								if($reistype){
									foreach ($reistype as $type) {
										$terms .= $type->slug . ' ';
									}
								}

								if($reiscategorie){
									foreach ($reiscategorie as $categorie) {
										$terms .= $categorie->slug . ' ';
									}
								}

							 ?>
						
							<div class="travel-box <?php echo $terms; ?>col-lg-3 col-md-4 col-sm-4 col-xs-12">
								<a href="<?php the_permalink(); ?>">

									<?php
										$thumb_id = get_post_thumbnail_id();
										$thumb_url = wp_get_attachment_image_src($thumb_id,'large');
									?>
									<img src="<?php echo $thumb_url[0]; ?>" alt="" />

									<div class="price-overlay">
										<span class="price-from">vanaf</span><br />
										
										<?php 
											$minprice = 9999;
											$aantalData = 0;
											$reisdatas = get_field('reisdata');
											$reisdatas_individueel = get_field('reisdata_individueel');
											if (is_array($reisdatas)) {
												$aantalData = count($reisdatas);
												$minprice = get_minPrice($reisdatas, $reisdatas_individueel);
											}
										 ?>

										<span class="muted">&euro;<?php echo $minprice; ?></span>
									</div>
									<h4><?php the_title(); ?></h4>
									<p class="short-text">
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
										</span><br />
									</div> 

									<div class="mybutton small">
										<span class="linkbutton" data-url="#">
											<button data-hover="Bekijken">Bekijken</button>
										</span>
									</div>
								</a>
							</div>

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