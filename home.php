<?php get_header(); ?>

<?php $page_for_posts_id = get_option('page_for_posts'); ?>

		<!-- About Section -->
		<section id="blog" class="section-content">
			<div class="container">

				<!-- Section title -->
				<div class="section-title text-center">
					<h1 class="item_right"><?php echo get_the_title($page_for_posts_id); ?></h1>

					<p class="lead">
						<?php echo get_post_field('post_content', $page_for_posts_id); ?>
					</p>
				</div>
				<!-- Section title -->
			</div>
		</section>
		<!-- About Section -->

		<!-- Blog Section -->
		<section id="" class="section-content timeline-content bgdark">
			<div class="container">

				<div class="element-line">
					<ol id="timeline">

					<?php $isLeft = true; ?>
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
					
						<?php 
							if ($isLeft) {
								$side = 'left';
							}
							else{
								$side = 'right';
							}

							$isLeft = !$isLeft;

						 ?>

						<!-- Timeline item -->
						<li class="timeline-item">
							<div class="item_<?php echo $side; ?>">
								<div class="well post">
									<div class="post-info bgdark text-center">
										<h5 class="info-date"><?php the_time('j F Y'); ?><small><?php the_time('H:i'); ?></small></h5>
									</div>
									<div class="post-body clearfix">
										<div class="blog-title">
											<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
										</div>
										<?php

											if ( has_post_thumbnail() ):

											$thumb_id = get_post_thumbnail_id();
											$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size');
										?>
											<a href="<?php the_permalink(); ?>" class="zoom"> <img src="<?php echo $thumb_url[0]; ?>" class="img-responsive" alt=""> </a>
										<?php endif; ?>
										<div class="post-text">
											<p class="lead">
												<?php echo get_field('korte_intro'); ?>
											</p>
											<?php if (!has_post_thumbnail()): ?>
												<p><?php the_excerpt(); ?></p>
											<?php endif ?>
										</div>
									</div>
									<div class="post-arrow"></div>
								</div>
							</div>
						</li>
						<!-- Timeline item -->

						<?php endwhile; ?>
					<?php endif; ?>

					</ol>
				</div>

			</div>
		</section>
		<!-- Blog Section -->

<?php get_footer(); ?>