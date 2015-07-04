<?php 
/*
Template Name: FAQ template
*/

 get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<!-- About Section -->
		<section id="faq" class="section-content">
			<div class="container">


				<!-- Section title -->
				<div class="section-title text-center">
					<h1 class="item_right"><?php the_title(); ?></h1>

					<p class="lead">
						<?php echo get_field('intro') ?>
					</p>
				</div>
				<!-- Section title -->

			</div>
		</section>
		<!-- About Section -->

		<section id="" class="section-content timeline-content bgdark">
			<div class="row">
				<div class="container">
					<div class="col-md-8 col-md-offset-2 faqpanel-group">
						<div class="panel-group" id="accordion">
							<?php
								$subjects = get_field('onderwerpen');
								foreach($subjects as $key=>$subject) :
							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFaq<?php echo $key; ?>"><?php echo $subject['onderwerp']; ?><i class="fa fa-plus pull-right"></i></a></h4>
								</div>
								<div id="collapseFaq<?php echo $key; ?>" class="panel-collapse collapse">
									<div class="panel-body">
									<!-- inner pannel -->
												<div class="panel-group" id="accordionInner<?php echo $key; ?>">
													
													<?php
														foreach($subject['vragen'] as $keyInner=>$vraag) :
													?>

													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title"><a data-toggle="collapse" class="collapsed" data-parent="#accordionInner<?php echo $key; ?>" href="#collapseFaq<?php echo $key; ?>Inner<?php echo $keyInner; ?>"><?php echo $vraag['vraag']; ?><i class="fa fa-plus pull-right"></i></a></h4>
														</div>
														<div id="collapseFaq<?php echo $key; ?>Inner<?php echo $keyInner; ?>" class="panel-collapse collapse">
															<div class="panel-body">
																<p>
																	<?php echo $vraag['antwoord']; ?>
																</p>
															</div>
														</div>
													</div>
													
													<?php endforeach; ?>
													
												</div>
										<!-- inner pannel -->
									</div>
								</div>
							</div>

							<?php endforeach; ?>

						</div>
					</div>
				</div>
			</div>
		</section>



		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>