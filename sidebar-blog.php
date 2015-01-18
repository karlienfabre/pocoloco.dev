<div class="col-md-3 .col-md-push-9">
	<div class="element-line">
		<div id="sidebar">

			<?php 
				$args = array(
					'post_type' => 'post',
					'order' => 'DESC',
					'orderby' => 'date',
					'posts_per_page' => 5
				);
				$query = new WP_Query( $args );
			 ?>
			<?php if ( $query->have_posts() ) : ?>

			<!-- Recent Posts Widget -->
			<div class="widget">

				<div class="widget-title">
					<h4>Laatste nieuws</h4>
				</div>

				<?php $first = true; ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<div class="post-box <?php if($first) echo 'first'; $first = false; ?>">
					<?php if (has_post_thumbnail()):
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id);
					?>
						<a href="<?php the_permalink(); ?>"><img class="img-rounded" src="<?php echo $thumb_url[0]; ?>" width="50" height="50" alt=""></a>
					<?php endif ?>
					<div>
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<small><?php the_time('j F Y'); ?></small>
					</div>
				</div>

				<?php endwhile; ?>

			</div>
			<!--/Recent Posts Widget -->
			<?php endif; ?>
			<?php wp_reset_query(); ?>

		</div>
	</div>
</div>