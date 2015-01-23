<?php 
/*
Template Name: Contact template
*/

 get_header(); ?>

 <?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<!-- About Section -->
		<section id="contact" class="section-content">
			<div class="container">

				<!-- Section title -->
				<div class="section-title text-center">
					<h1 class="item_right"><?php the_title(); ?></h1>

					<p class="lead">
						<?php echo get_field('intro'); ?>
					</p>
				</div>
				<!-- Section title -->
			</div>
		</section>
		<!-- About Section -->

		<section>
			<div class="container">
				<div class="row text-center">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="item_left" style="opacity: 1; left: 0px;">
							<div class="contact-box">
								<i class="fa fa-keyboard-o fa-4x"></i> <h4><?php echo get_field('subtitel_1'); ?></h4>
								<p>
									<?php echo get_field('tekst_1'); ?>
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="item_left" style="opacity: 1; left: 0px;">
							<div class="contact-box">
								<i class="fa fa-envelope-o fa-4x"></i> <h4><?php echo get_field('subtitel_2'); ?></h4>
								<p>
									<?php echo get_field('tekst_2'); ?>
								</p>
								<p class="center">
									<?php echo get_field('contact_informatie'); ?>
								</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="item_left" style="opacity: 1; left: 0px;">
							<div class="contact-box">
								<i class="fa fa-map-marker fa-4x"></i> <h4><?php echo get_field('subtitel_3'); ?></h4>
								<p>
									<?php echo get_field('tekst_3'); ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endwhile; ?>
<?php endif; ?>
		<!-- Contact Section -->
		<section id="contactform" class="section-content no-padding">

			<?php get_template_part('includes/contact-form'); ?>

			<?php get_template_part('includes/social-links'); ?>
			
		</section>
		<!-- Contact Section -->
<?php 
	$args = array(
		'post_type' => 'kantoren',
		'order' => 'ASC',
		'orderby' => 'title',
		'nopaging' => true
	);

	$query = new WP_Query( $args );
?>

<?php if ( $query->have_posts() ) : ?>

		<section class="bgdark">
			<div class="container">
				<div class="row">

				<?php 
					$count = 0;
					while ( $query->have_posts() ) : $query->the_post();
				?>

						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="item_left" style="opacity: 1; left: 0px;">
								<div class="contact-box office">
									<h4><?php the_title(); ?></h4>
									<p>
										<?php echo get_field('adresregel_1') ?><br />
										<?php echo get_field('adresregel_2') ?><br /><br />
										<i class="fa fa-phone fa-4x"></i><?php echo get_field('telefoonnummer') ?><br />
										<i class="fa fa-print fa-4x"></i><?php echo get_field('fax') ?><br />
										<i class="fa fa-envelope fa-4x"></i><a href="mailto:<?php echo get_field('emailadres') ?>"><?php echo get_field('emailadres') ?></a><br />
										<?php
											$openingsuren = get_field('openingsuren');
											foreach($openingsuren as $openingsuur) :
										?>
											<i class="fa fa-calendar fa-4x"></i><?php echo $openingsuur['item']; ?><br />
										<?php endforeach ?>
									</p>
								</div>
							</div>
						</div>
						
						<?php 
							$count++;
							if ($count % 4 == 0):
						?>
							</div>
							<div class="row">
						<?php endif ?>

				<?php endwhile; ?>

				</div>
			</div>
		</section>

		<?php endif; ?>
		<?php wp_reset_query(); ?>


<?php get_footer(); ?>