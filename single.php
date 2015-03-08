<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<!-- Blog Section -->
		<section class="section-content blog-content">
			<div class="container">

				<!-- Section title -->
				<div class="section-title text-center">
					<div>
						<span class="line big"></span>
						<!-- <span class="line big"></span> -->
					</div>
					<h1><?php the_title(); ?></h1>
					<div>
						<span class="line"></span>
						<span><i class="fa fa-calendar"></i><?php the_time('j F Y'); ?></span>
						<span class="line"></span>
					</div>
					<p class="lead">
						<?php echo get_field('intro') ?>
					</p>
				</div>
				<!-- Section title -->

				<div class="row">
					<div class="col-md-9">
						<div class="element-line">
							<?php if (has_post_thumbnail()):
							$thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_image_src($thumb_id,'large');
							?>
							<div class="flexslider">
								<ul class="slides">
									<li>
										<img class="img-responsive img-center img-rounded" src="<?php echo $thumb_url[0]; ?>" alt="" />
									</li>
									<!-- <li>
										<img class="img-responsive img-center img-rounded" src="<?php root() ?>img/blog/1_2.jpg" alt="" />
									</li>
									<li>
										<img class="img-responsive img-center img-rounded" src="<?php root() ?>img/blog/1_3.jpg" alt="" />
									</li> -->
								</ul>
							</div>
							<?php endif ?>
							<div class="blog-text">
								<?php the_content(); ?>
							</div>
						</div>
					</div>

					<?php get_sidebar('blog'); ?>

				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="element-line">
							<div class="pager">
								<div class="puls previous">
									<?php previous_post_link( '%link', '&larr; Ouder' ); ?>
								</div>

								<!-- <ul class="pagination">
								
									<li class="active">
										<a href="#">1</a>
									</li>
									<li>
										<a href="#">2</a>
									</li>
									<li>
										<a href="#">3</a>
									</li>
								</ul> -->

								<div class="puls next">
									<?php next_post_link( '%link', 'Nieuwer &rarr;' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- Blog Section -->
		<div class="row text-center">
			<div class="mybutton big">
				<span type="link" class="linkbutton" data-url="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>">
					<button data-hover="Overzicht">Terug naar het</button>
				</span>
			</div>
		</div>

		<!-- Back to top -->
		<a href="#" id="back-top"><i class="fa fa-angle-up fa-2x"></i></a>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>