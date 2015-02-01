<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<!-- About Section -->
		<section class="section-content">
			<div class="container">

				<!-- Section title -->
				<div class="section-title text-center">
					<h2 class="item_right"><?php the_title(); ?></h2>
					<p class="lead">
						<?php echo get_field('intro_tekst'); ?>
					</p>
				</div>
				<!-- Section title -->
				
				<?php $youtube_url = get_field('youtube_url'); ?>
				<?php if ( !empty($youtube_url) ): ?>
				<div class="row text-center search">
					<div class="mybutton small choice foto">
						<button id="submit" type="submit">
							<span data-hover="Foto">Foto</span>
						</button>
					</div>
					<div class="mybutton small choice video non-active">
						<button id="submit" type="submit">
							<span data-hover="Film">Film</span>
						</button>
					</div>
				</div>
				<?php endif ?>

				<div class="row text-center">
					<div class="col-md-12">
						<div class="element-line">
							
							<div id="topslider" class="flexslider">
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

							<?php if (!empty($youtube_url)): ?>
								<?php 
								preg_match("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",get_field('youtube_url'), $matches);
								 ?>
							<div id="topvideo" class="element-line">
								<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>
								<div class='embed-container'>
									<iframe src="http://www.youtube.com/embed/<?php echo $matches[1]; ?>?rel=0&amp;showinfo=0" frameborder='0' allowfullscreen></iframe>
								</div>
							</div>
						</div>
							<?php endif ?>
						</div>
					</div>

				</div>


			</div>
		</section>
		<!-- About Section -->

		<section class="row yellow">
			<div class="border-top">
				<div class="container">
					<img src="<?php root() ?>img/border_top.png"/>
				</div>
			</div>
			<div class="container yellow-content">
				<div class="row center-vertical">
					<div class="col-md-8 vertical-center-element vertical-centered-text">
						<h2><?php echo get_field('subtitel'); ?></h2>
						<p>
							<?php echo get_field('tekst_onder_subtitel'); ?>
						</p>
					</div>
<!--
							<div class="testimonial_wrapper">
							<div>
								<div class="row">
									<div class="container">
										<div class="col-md-4 vertical-center-element">
											<div class="testimonail_container">
												<div class="row">
													<div class="col-md-12  bgwhite">
														<div class="row text-center">
															<div class="col-md-6 col-md-offset-3">
																<div class="text-center testimonial">
																	<img class="img-circle img-responsive" src="../img/reisaanbod/testimonials/testi_canyoning.jpg" alt="">
																</div>
															</div>
														</div>
														<div class="row text-center">
															<div class="row-md-9">
																	<p>Tic-tac nollie bearings Ron Allen disaster. Downhill blunt no comply Kevin Jarvis slob air. Deck Brooklyn Banks indy grab slap maxwell pop shove-it.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div>
								<div class="row">
									<div class="container">
										<div class=" col-md-4 vertical-center-element">
											<div class="testimonail_container">
												<div class="row">
													<div class="col-md-12  bgwhite">
														<div class="row text-center">
															<div class="col-md-6 col-md-offset-3">
																<div class="text-center testimonial">
																	<img class="img-circle img-responsive" src="../img/reisaanbod/testimonials/testi_canyoning.jpg" alt="">
																</div>
															</div>
														</div>
														<div class="row text-center">
															<div class="row-md-9">
																	<p>Tic-tac nollie bearings Ron Allen disaster. Downhill blunt no comply Kevin Jarvis slob air. Deck Brooklyn Banks indy grab slap maxwell pop shove-it.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
-->
					<?php if (get_field('quote_tekst') && get_field('quote_afbeelding')): ?>
					<div class="col-md-4  vertical-center-element">
						<div class="testimonail_container">
							<div class="row">
								<div class="col-md-12  bgwhite">
									<div class="row text-center">
										<div class="col-md-6 col-md-offset-3">
											<div class="text-center testimonial">
												<a href=""> <img class="img-circle img-responsive" src="<?php $afb = get_field('quote_afbeelding'); echo $afb['sizes']['thumbnail']; ?>" alt=""> </a>
											</div>
										</div>
									</div>
									<div class="row text-center">
										<div class="row-md-9">
												<p><?php echo get_field('quote_tekst'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endif ?>
				</div>
			</div>
			<div class="border-bottom">
				<div class="container">
					<img src="<?php root() ?>img/border_bottom.png"/>
				</div>
			</div>

		</section>

		<section id="travel-info">
			<div class="row">
				<div class="container">
					<div class="col-md-7">
						<h2>Reisomschrijving</h2>
						<div class="element-line">
							<div class="panel-group" id="accordion">
								<?php
									$reisplanning = get_field('reisplanning');
									foreach($reisplanning as $key=>$planning) :
								?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" <?php if ($key!=0) echo 'class="collapsed"'; ?>><?php echo $planning['dag']; ?><i class="fa fa-plus pull-right"></i></a></h4>
									</div>
									<div id="collapse<?php echo $key; ?>" class="panel-collapse collapse <?php if ($key==0) echo 'in'; ?>">
										<div class="panel-body">
											<p>
												<?php echo $planning['dagplanning']; ?>
											</p>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-md-offset-1">
						<h2>Data en prijzen</h2>
						<div class="travel-dates">
							<?php
								$reisdata = get_field('reisdata');
								foreach($reisdata as $key => $data) :

									switch ($data['aantal_beschikbare_plaatsen']) {
										case 0:
											$flag = 'redflag';
											$flagtext = 'deze reis is volzet';
											break;
										case 1:
										case 2:
											$flag = 'yellowflag';
											$flagtext = 'laatste plaatsen';
											break;
										default:
											$flag = 'greenflag';
											$flagtext = 'nog plaatsen beschikbaar';
											break;
									}

									if($data['aantal_beschikbare_plaatsen'] == false){
										$flag = 'greenflag';
										$flagtext = 'nog plaatsen beschikbaar';
									}
							?>
							<div class="travel-date">
								<div class="mybutton medium book">
									<button type="link" class="linkbutton" data-url="<?php echo home_url('/'); ?>boek-een-reis?reis=<?php echo the_id(); ?>&amp;id=<?php echo $key; ?>">
										<span data-hover="Boek">Boek</span>
									</button>
								</div>
								<p><?php echo substr($data['vertrekdatum'], 6, 2) .'/'. substr($data['vertrekdatum'], 4, 2); ?> - <?php echo substr($data['einddatum'], 6, 2) .'/'. substr($data['einddatum'], 4, 2) .'/'. substr($data['einddatum'], 0, 4); ?></p>
								<span class="travel-price">&euro;<?php echo get_price($data['prijs']); ?></span><br />
								<i class="fa fa-flag <?php echo $flag; ?>"></i><span class="flag"><?php echo $flagtext; ?></span>
							</div>
							<?php endforeach; ?>

						</div>
					</div>
							

					<?php if (get_field('reisdata_individueel')): ?>

					<div class="col-md-3 col-md-offset-1">
						<h4 class="individueel">Individueel reizen</h4>
						<div class="travel-dates">

						<?php 
							$reisdata = get_field('reisdata_individueel');
							foreach($reisdata as $key => $data) :
						?>

							<div class="travel-date individueel">
								<p>
									Data naar keuze tussen <?php echo substr($data['vertrekdatum'], 6, 2) .'/'. substr($data['vertrekdatum'], 4, 2); ?> - <?php echo substr($data['einddatum'], 6, 2) .'/'. substr($data['einddatum'], 4, 2) .'/'. substr($data['einddatum'], 0, 4); ?>
									<?php if ($data['beschrijving']): ?>
										(<?php echo $data['beschrijving']; ?>)
									<?php endif ?>
								</p>
								<span class="travel-price">
									<?php echo ($data['aantal_dagen'] == 1) ? '1 dag' : $data['aantal_dagen'] . ' dagen'; ?></br>
									€<?php echo get_price($data['prijs']); ?></br>
								</span>
								<div class="mybutton medium book">
									<button type="link" class="linkbutton" data-url="<?php echo home_url('/'); ?>boek-een-reis?reis=<?php echo the_id(); ?>&amp;id=<?php echo $key; ?>&amp;di=1">
										<span data-hover="Boek">Boek</span>
									</button>
								</div>
							</div>

						<?php endforeach; ?>

						</div>
					</div>

					<?php endif ?>

					<?php if (get_field('reisdata_info')): ?>

					<div class="col-md-3 col-md-offset-8">
						<div class="travel-dates">
							<div class="travel-date-extra">
								<p>
									<?php echo get_field('reisdata_info'); ?>
								</p>
							</div>
						</div>
					</div>

					<?php endif ?>
				</div>
			</div>
		</section>


		<section class="row yellow">
			<div class="border-top">
				<div class="container">
					<img src="<?php root() ?>img/border_top.png"/>
				</div>
			</div>
			<div class="container yellow-content">
				<div class="row">
					<div class="col-md-3 setting">
						<i class="fa fa-lock"></i>
						<h4>inbegrepen</h4>
						<ul>
							<?php 
								$inbegrepen = get_field('inbegrepen');
								foreach ($inbegrepen as $incl):
							?>
								<li><?php echo $incl['item']; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="col-md-3 setting">
						<i class="fa fa-unlock-alt"></i>
						<h4>niet inbegrepen</h4>
						<ul>
							<?php 
								$niet_inbegrepen = get_field('niet_inbegrepen');
								foreach ($niet_inbegrepen as $nincl):
							?>
								<li><?php echo $nincl['item']; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="col-md-3 setting">
						<i class="fa fa-key"></i>
						<h4>optioneel</h4>
						<ul>
							<?php 
								$optioneel = get_field('optioneel');
								foreach ($optioneel as $opt):
							?>
								<li><?php echo $opt['item']; ?><?php if ($opt['item_prijs']): ?> - &euro;<?php echo $opt['item_prijs']; ?><?php endif ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="col-md-3 setting">
						<i class="fa fa-arrow-circle-o-down"></i>
						<?php if (get_field('reisfiche')): ?>
							<a href="<?php $reisfiche = get_field('reisfiche'); echo $reisfiche['url']; ?>" target="_blank"><h4>download reisfiche</h4></a>
							<p>
								Alle info over deze reis vind je samengevat in deze reisfiche, <a href="<?php $reisfiche = get_field('reisfiche'); echo $reisfiche['url']; ?>" target="_blank">klik hier om de reisfiche te downloaden</a>.
							</p>
						<?php else: ?>
							<h4>download reisfiche</h4>
							<p>
								Voor deze reis is voorlopig geen reisfiche beschikbaar.
							</p>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div class="border-bottom">
				<div class="container">
					<img src="<?php root() ?>img/border_bottom.png"/>
				</div>
			</div>

		</section>

	<?php endwhile; ?>
<?php endif; ?>
<!--
			<script>
			//testimonial slider
			$('.testimonial_wrapper').slick({
			  infinite: false,
			  slidesToShow: 1,
			  slidesToScroll: 1
			});
		</script>
-->
<?php get_footer(); ?>