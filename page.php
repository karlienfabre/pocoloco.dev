<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<!-- About Section -->
		<section class="section-content">
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

		<section id="" class="section-content timeline-content bgdark">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</section>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>