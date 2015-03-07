<?php 
/*
Template Name: Boek wizard template
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

	<?php endwhile; ?>
<?php endif; ?>

<?php 
	$args = array(
		'p'             => $_GET['reis'],
		'post_type'   => 'reizen',
		'post_status' => 'publish',
	);

$query = new WP_Query( $args );
 ?>

 <?php if ( !$query->have_posts() ) {
 		wp_redirect(get_post_type_archive_link( 'reizen' ));
 	} ?>

 	<?php while ( $query->have_posts() ) : $query->the_post(); ?>

 		<?php
 			if (isset($_GET['di'])) {
 				$reisdatas = get_field('reisdata_individueel');
 			}
 			else{
 				$reisdatas = get_field('reisdata');
 			}
 			$reisdata = $reisdatas[$_GET['id']];
 		 ?>

		<section>
		<form method="post" name="bookingform" id="bookingform" class="element-line validate" role="form">
			<div class="container">
				<div class="row">
					<div id="book-wizard">
					    <h3>Reis</h3>
					    <section class="booking1">
					    	<div class="row">
						    	<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">
						    		<h2><?php the_title(); ?></h2>
						    	</div>
					    	</div>
					    	<div class="row">
					    		<div class="col-md-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
					    				<label>Algemene info</label><br />
						    			<strong>Basisprijs per persoon</strong> €<?php echo $reisdata['prijs']; ?><!-- <i class="fa fa-question-circle fa-4x" data-toggle="tooltip" title="Here's some amazing content. It's very engaging. Right?"></i> --><br /><br />
						    			<!-- <strong>Budget per persoon</strong> €60<i class="fa fa-question-circle fa-4x" id="test" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"></i><br /><br /> -->
						    			<strong>Inbegrepen</strong><br />
						    			<ul class="no-list-style-type">
										<?php 
											$inbegrepen = get_field('inbegrepen');
											foreach ($inbegrepen as $incl):
										?>
											<li><?php echo $incl['item']; ?></li>
										<?php endforeach; ?>
						    			</ul>

						    			<strong>Niet inbegrepen</strong><br />
						    			<ul class="no-list-style-type">
										<?php 
											$niet_inbegrepen = get_field('niet_inbegrepen');
											foreach ($niet_inbegrepen as $nincl):
										?>
											<li><?php echo $nincl['item']; ?></li>
										<?php endforeach; ?>
										</ul>

						    			<strong>Optioneel</strong><br />
						    			<ul class="no-list-style-type">
											<?php 
												$optioneel = get_field('optioneel');
												foreach ($optioneel as $opt):
											?>
												<li><?php echo $opt['item']; ?><?php if ($opt['item_prijs']): ?> - &euro;<?php echo $opt['item_prijs']; ?><?php endif ?></li>
											<?php endforeach; ?>
						    			</ul>

						    			<a href="http://www.joker.be/sites/default/files/reisvoorwaarden_2015_-2016.pdf" target="_blank">algemene reisvoorwaarden (pdf)</a><br />
						    			<a href="http://www.epower.amadeus.com/joker/Portals/joker/AgencyRules.aspx" target="_blank">verkoopsvoorwaarden (pdf)</a><br />
						    			<?php if (get_field('reisfiche')): ?>
											<a href="<?php $reisfiche = get_field('reisfiche'); echo $reisfiche['url']; ?>" target="_blank">technische fiche reis (pdf)</a>
										<?php else: ?>
											<a href="#">technische fiche reis (niet beschikbaar)</a>
										<?php endif ?>
					    			</div>
					    		</div>
						    	<div class="col-md-4 col-sm-4 col-md-4 col-xs-12">
							        <div class="form-group">
										<label for="aantalreizigers">Selecteer het aantal reizigers</label>
										<select class="form-control input-m aantal-reizigers" name="aantalreizigers" id="aantalreizigers">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="0">6+ - gelieve contact op te nemen via onze contact-pagina</option>
										</select>
									</div>

									<?php if (isset($_GET['di'])): ?>
							        <div class="form-group">
										<label for="vertrekdatum">Vertrekdatum tussen <?php echo substr($reisdata['vertrekdatum'], 6, 2) .'/'. substr($reisdata['vertrekdatum'], 4, 2); ?> - <?php echo substr($reisdata['einddatum'], 6, 2) .'/'. substr($reisdata['einddatum'], 4, 2) .'/'. substr($reisdata['einddatum'], 0, 4); ?></label>
										<input type="date" id="vertrekDatum" name="vertrekDatum" class="form-control required dateISO">
										<!-- <input type="date" id="vertrekdatum" name="vertrekdatum" class="required" min="<?php echo date("Y-m-d", strtotime($reisdata['vertrekdatum'])); ?>" max="<?php echo date("Y-m-d", strtotime($reisdata['einddatum'])); ?>"> -->
									</div>
									<?php endif ?>

									<?php 
										$args = array(
											'post_type' => 'kantoren',
											'order' => 'ASC',
											'orderby' => 'title',
											'nopaging' => true
										);

										$kantoor_query = new WP_Query( $args );
									?>

									<?php if (get_field('verzenden_naar') == 'Joker kantoren' || get_field('verzenden_naar') == false): ?>
								        <div class="form-group selecteer-kantoor">
											<label for="name">Selecteer je reiskantoor</label>
											<select class="form-control input-m" name="gekozenkantoor" id="gekozenkantoor">
											<?php $backup = $post; ?>
											<?php while ( $kantoor_query->have_posts() ) : $kantoor_query->the_post(); ?>
												<option value="<?php the_title(); ?>" data-phone="<?php echo get_field('telefoonnummer') ?>" data-email="<?php echo get_field('emailadres') ?>"><?php the_title(); ?></option>
											<?php endwhile; ?>
											<?php $post = $backup; ?>
											</select>
											<input type="hidden" name="kantoorphone" id="kantoorphone">
											<input type="hidden" name="kantooremail" id="kantooremail">
										</div>
									<?php else: ?>
											<input type="hidden" name="gekozenkantoor" id="gekozenkantoor" value="Poco Loco Adventures">
											<input type="hidden" name="kantoorphone" id="kantoorphone" value="+32(0)35016790">
											<input type="hidden" name="kantooremail" id="kantooremail" value="pocoloco@pocolocoadventures.be">
									<?php endif ?>
								</div>
					    	</div>

					    </section>

					    <h3>Reizigers</h3>
					    <section class="booking2">
					    	<div class="row">
								<div class="col-md-12">
									<p>Vul de nodige gegevens in van alle reizigers</p>
								</div>
							</div>
					        
					        <div class="row">
								<div class="col-md-12">
									<div class="panel-group reizigers-data" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse%id%" class="">Gegevens %title%<i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapse%id%" class="panel-collapse %active%">
												<div class="panel-body">
											        <div class="form-horizontal">
											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="Voornaam">Voornaam *</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="Voornaam" name="reizigers[%id%][0]" type="text" placeholder="Voornaam">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="Achternaam">Achternaam *</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="Achternaam" name="reizigers[%id%][1]" type="text" placeholder="Achternaam">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="geslacht">Geslacht *</label>

											                <div class="col-sm-2 col-md-2">
											                    <select class="form-control input-m required" name="reizigers[%id%][2]">
											                        <option value="Man">
											                            Man
											                        </option>

											                        <option value="Vrouw">
											                            Vrouw
											                        </option>
											                    </select>
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="Geboortedatum">Geboortedatum *</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="Geboortedatum" name="reizigers[%id%][3]" type="text" placeholder="xx/xx/xxxx">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="Telefoonnummer">Telefoonnummer *</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="Telefoonnummer" name="reizigers[%id%][4]" type="text" placeholder="Telefoonnummer">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="gsm">gsm nummer *</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="gsm" name="reizigers[%id%][5]" type="text" placeholder="gsm">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="email">email *</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required email" id="email" name="reizigers[%id%][6]" type="email" placeholder="email">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="Land">Land *</label>

											                <div class="col-sm-2 col-md-2">
											                    <select class="form-control input-m required" name="reizigers[%id%][7]">
											                        <option value="België">
											                            België
											                        </option>

											                        <option value="Nederland">
											                            Nederland
											                        </option>

											                        <option value="Andere">
											                            Andere
											                        </option>
											                    </select>
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="Woonplaats">Woonplaats *</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="Woonplaats" name="reizigers[%id%][8]" type="text" placeholder="Woonplaats">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="Postcode">Postcode *</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="Postcode" name="reizigers[%id%][9]" type="text" placeholder="Postcode">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="straat">Straat + Nummer + Bus *</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="straat" name="reizigers[%id%][10]" type="text" placeholder="Straat + Nummer + Bus">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="extra">Heb je bepaalde medische voorgeschiedenis die je deelname aan de reis zou belemmeren?</label>

											                <div class="col-sm-3 col-md-3">
											                    <textarea class="form-control" id="extra" name="reizigers[%id%][11]"></textarea>
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="extra">Heb je bepaalde verwachtingen wat betreft maaltijden? (vegetarisch/andere)</label>

											                <div class="col-sm-3 col-md-3">
											                    <textarea class="form-control" id="extra" name="reizigers[%id%][12]"></textarea>
											                </div>
											            </div>

											            <h4>contactpersoon bij noodgevallen</h4>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="naam">Naam</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control" id="Naam" name="reizigers[%id%][noodgevallen][0]" type="text" placeholder="Naam">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="Telefoonnummer">Telefoonnummer</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control" id="Telefoonnummer" name="reizigers[%id%][noodgevallen][1]" type="text" placeholder="Telefoonnummer">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="gsm">gsm nummer</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control" id="gsm" name="reizigers[%id%][noodgevallen][2]" type="text" placeholder="gsm">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="email">email</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control email" id="email" name="reizigers[%id%][noodgevallen][3]" type="email" placeholder="email">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="verwantschap">verwantschap</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control" id="verwantschap" name="reizigers[%id%][noodgevallen][4]" type="text" placeholder="verwantschap">
											                </div>
											            </div>
											        </div>
											    </div>
											</div>
										</div>
									</div>
								</div>
					        </div>
					    </section>

					    <h3>Verzekeringen</h3>
					    <section class="booking3">
					    	<div class="row">
								<div class="col-md-12">
									<p>Vul de nodige gegevens in van alle reizigers</p>
								</div>
							</div>
					        
					        <div class="row">
								<div class="col-md-12">
									<div class="panel-group reizigers-verzekeringen" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseinsurance%id%" class=""> Verzekeringen %title%<i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseinsurance%id%" class="panel-collapse %active%">
												<div class="panel-body">
											        <div class="form-group">
											            <label><input name="reizigers[%id%][verzekering][]" class="verzekeringen required" type="radio" value="Reisongevallen &amp; Annulatie &amp; Reisbagage - &euro;3,25/dag (min. &euro;20)"> Reisongevallen &amp; Annulatie &amp; Reisbagage - &euro;3,25/dag (min. &euro;20)</label>
											        </div>

											        <div class="form-group">
											            <label><input name="reizigers[%id%][verzekering][]" class="verzekeringen eigenverzekering" type="radio" value="Eigen reisongevallenverzekering + geldig bewijs en voorwaarden"> Ik verklaar te beschikken over een eigen reisongevallenverzekering en
											            kan hiervan indien nodig een geldig bewijs en voorwaarden
											            voorleggen</label>
											        </div>

											        <div class="form-horizontal eigenverzekeringform">
											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="naammaatschappij">Naam
											                maatschappij</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="naammaatschappij" name="reizigers[%id%][verzekering][eigen][0]" type="text" placeholder="Naam maatschappij">
											                </div>
											            </div>

											            <div class="form-group">
											                <label class="col-sm-2 col-md-2 control-label" for="polisnummer">Polisnummer</label>

											                <div class="col-sm-3 col-md-3">
											                    <input class="form-control required" id="polisnummer" name="reizigers[%id%][verzekering][eigen][1]" type="text" placeholder="Polisnummer">
											                </div>
											            </div>
											        </div>

											        <div class="form-group">
											            <label><input name="reizigers[%id%][verzekering][]" class="verzekeringen" type="radio" value="Ik wens een andere formule van reisongevallen verzekering, contacteer me voor de verschillende mogelijkheden"> Ik
											            wens een andere formule van reisongevallen verzekering, contacteer
											            me voor de verschillende mogelijkheden</label>
											        </div>
											    </div>
											</div>
										</div>
									</div>
								</div>
					        </div>
					    </section>
					    <h3>Opties</h3>
					    <section class="booking4">
					    	<div class="row">
								<div class="col-md-12">
									<p>Selecteer per reiziger de nodige opties</p>
								</div>
							</div>
					        
					        <div class="row">
								<div class="col-md-12">
									<div class="panel-group reizigers-options" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseoptions%id%" class=""> Opties %title%<i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseoptions" class="panel-collapse %active%">
												<div class="panel-body">
												<?php 
													$optioneel = get_field('optioneel');
													foreach ($optioneel as $opt):
												?>
													<div class="form-group">
													    <label>
													      <input type="checkbox" name="reizigers[1][opties][]" value="<?php echo $opt['item']; ?><?php if ($opt['item_prijs']): ?> - &euro;<?php echo $opt['item_prijs']; ?>" data-price="<?php echo $opt['item_prijs']; ?><?php endif ?>"> <?php echo $opt['item']; ?><?php if ($opt['item_prijs']): ?> - &euro;<?php echo $opt['item_prijs']; ?><?php endif ?>
													    </label>
													</div>
												<?php endforeach; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
					        </div>
					    </section>
					    <h3>Bevestiging</h3>
					    <section class="booking5">
					    	<div class="row">
								<div class="col-md-12">
									<p>Hieronder vind je een overzicht van je boeking, je kan nog steeds terugkeren naar een stap en aanpassingen uitvoeren. Onderaan deze pagina kan je je boeking bevestigen </p>
								</div>
							</div>
					    	<div class="row">
								<div class="col-md-12">
						    		<strong><?php the_title(); ?></strong><br />
						    		<strong>Periode</strong> <?php echo substr($reisdata['vertrekdatum'], 6, 2) .'/'. substr($reisdata['vertrekdatum'], 4, 2); ?> - <?php echo substr($reisdata['einddatum'], 6, 2) .'/'. substr($reisdata['einddatum'], 4, 2) .'/'. substr($reisdata['einddatum'], 0, 4); ?><br />
						    		<strong>Aantal reizigers</strong> <span id="sp-aantalreizigers"></span>
								</div>
							</div>
					        <div class="row">
								<div class="col-md-12">
									<!-- <div class="panel-group reizigers-overview" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseovervieuw%id%" class="collapsed"> Overzicht %title%<i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseovervieuw%id%" class="panel-collapse collapse" style="height: 0px;">
												<div class="panel-body">
													<div class="col-md-6">
													Naam hoofdreiziger<br />
													Adres hoofdreiziger<br />
													Postcode + gemeente <br />
													email<br />
													telefoon<br />
													gsm<br />
													opmerking 1 <br />
													opmerking 1 <br /><br />
													</div>
													<div class="col-md-6">

													<strong>Prijs:€<?php echo $reisdata['prijs']; ?></strong><br />
													gekozen verzekering (+€)<br />
													gekozen opties (+€)<br /><br />
													<strong>totaal reiziger 1:€785</strong>
													</div>

												</div>
											</div>
										</div>
									</div> -->
									<!-- <h5>Totaal voor alle reizigers samen: </h5> <h2>€1250</h2> -->

									<a href="http://www.joker.be/sites/default/files/reisvoorwaarden_2015_-2016.pdf" target="_blank">algemene reisvoorwaarden (pdf)</a><br />
						    		<a href="http://www.epower.amadeus.com/joker/Portals/joker/AgencyRules.aspx" target="_blank">verkoopsvoorwaarden (pdf)</a><br />
						    		<?php if (get_field('reisfiche')): ?>
											<a href="<?php $reisfiche = get_field('reisfiche'); echo $reisfiche['url'] ?>" target="_blank">technische fiche reis (pdf)</a>
										<?php else: ?>
											<a href="#">technische fiche reis (niet beschikbaar)</a>
										<?php endif ?>
						    		<br /><br />
									<div class="form-group">
									    <input type="checkbox" class="required" id="reisvoorwaardenaccepteren" name="reisvoorwaardenaccepteren">
									    <label for="reisvoorwaardenaccepteren"> ik aanvaard de reisvoorwaarden. Ik heb de infofiche van de reis gelezen. </label>
									</div>
								</div>
					        </div>
					    </section>
					</div>
				</div>
				<div class="form-respond text-center"></div>
			</div>

			<input type="hidden" name="reisfiche" value="<?php echo $reisfiche = get_field('reisfiche'); echo $reisfiche['url'] ?>">
			<input type="hidden" name="reisurl" value="<?php the_permalink(); ?>">
			<input type="hidden" name="reistitel" value="<?php the_title(); ?>">
			<input type="hidden" name="reisperiode" value="<?php echo substr($reisdata['vertrekdatum'], 6, 2) .'/'. substr($reisdata['vertrekdatum'], 4, 2); ?> - <?php echo substr($reisdata['einddatum'], 6, 2) .'/'. substr($reisdata['einddatum'], 4, 2) .'/'. substr($reisdata['einddatum'], 0, 4); ?>">
			<input type="hidden" name="reisprijs" value="<?php echo $reisdata['prijs']; ?>">
		</form><!-- #bookingform -->
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>