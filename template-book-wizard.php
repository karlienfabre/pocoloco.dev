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
 			$reisdatas = get_field('reisdata');
 			$reisdata = $reisdatas[$_GET['id']];
 		 ?>

		<section>
		<form method="post" name="bookingform" id="bookingform" class="element-line validate" role="form">
			<div class="container">
				<div class="row">
					<div id="book-wizard">
					    <h3>Reis</h3>
					    <section>
					    	<div class="row">
						    	<div class="col-md-12 col-sm-12 col-md-12 col-xs-12">
						    		<h2><?php the_title(); ?></h2>
						    	</div>
					    	</div>
					    	<div class="row">
					    		<div class="col-md-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
					    				<label>Algemene info</label></br>
						    			<strong>Basisprijs per persoon</strong> €<?php echo $reisdata['prijs']; ?><!-- <i class="fa fa-question-circle fa-4x" data-toggle="tooltip" title="Here's some amazing content. It's very engaging. Right?"></i> --></br></br>
						    			<!-- <strong>Budget per persoon</strong> €60<i class="fa fa-question-circle fa-4x" id="test" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"></i></br></br> -->
						    			<strong>Inbegrepen</strong></br>
						    			<ul class="no-list-style-type">
										<?php 
											$inbegrepen = get_field('inbegrepen');
											foreach ($inbegrepen as $incl):
										?>
											<li><?php echo $incl['item']; ?></li>
										<?php endforeach; ?>
						    			</ul>

						    			<strong>Niet inbegrepen</strong></br>
						    			<ul class="no-list-style-type">
										<?php 
											$niet_inbegrepen = get_field('niet_inbegrepen');
											foreach ($niet_inbegrepen as $nincl):
										?>
											<li><?php echo $nincl['item']; ?></li>
										<?php endforeach; ?>
										</ul>

						    			<strong>Optioneel</strong></br>
						    			<ul class="no-list-style-type">
										<?php 
											$optioneel = get_field('optioneel');
											foreach ($optioneel as $opt):
										?>
											<li><?php echo $opt['item']; ?></li>
										<?php endforeach; ?>
						    			</ul>

						    			<a href="#" target="_blank">algemene reisvoorwaarden (pdf)</a></br>
						    			<a href="#" target="_blank">verkoopsvoorwaarden (pdf)</a></br>
						    			<?php if (get_field('reisfiche')): ?>
											<a href="<?php echo get_field('reisfiche')['url']; ?>" target="_blank">technische fiche reis (pdf)</a>
										<?php else: ?>
											<a href="#">technische fiche reis (niet beschikbaar)</a>
										<?php endif ?>
					    			</div>
					    		</div>
						    	<div class="col-md-4 col-sm-4 col-md-4 col-xs-12">
							        <div class="form-group">
										<label for="aantalreizigers">Selecteer het aantal reizigers</label>
										<select class="form-control input-m required" name="aantalreizigers" name="aantalreizigers">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="0">6+ - gelieve contact op te nemen via onze contact-pagina</option>
										</select>
									</div>

							        <!-- <div class="form-group">
										<label for="name">Reisperiode</label>
										<select class="form-control input-m required">
											<optgroup label="Juli">
									            <option>04/07/2015 - 11/07/2015</option>
									            <option>12/07/2015 - 19/07/2015</option>
									        </optgroup>
									        <optgroup label="Augustus">
									            <option>04/08/2015 - 11/08/2015</option>
									            <option>12/08/2015 - 19/08/2015</option>
									        </optgroup>
										</select>
									</div> -->

									<?php 
										$args = array(
											'post_type' => 'kantoren',
											'order' => 'ASC',
											'orderby' => 'title',
											'nopaging' => true
										);

										$kantoor_query = new WP_Query( $args );
									?>


							        <div class="form-group">
										<label for="name">Selecteer je joker reiskantoor</label>

										<select class="form-control input-m required">
										<?php $backup = $post; ?>
										<?php while ( $kantoor_query->have_posts() ) : $kantoor_query->the_post(); ?>
											<option value="<?php the_title(); ?>"><?php the_title(); ?></option>
										<?php endwhile; ?>
										<?php $post = $backup; ?>
										</select>
									</div>
								</div>
					    	</div>

					    </section>

					    <h3>Reizigers</h3>
					    <section>
					    	<div class="row">
								<div class="col-md-12">
									<p>Vul de nodige gegevens in van alle reizigers</p>
								</div>
							</div>
					        
					        <div class="row">
								<div class="col-md-12">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class=""> Gegevens hoofdreiziger<i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseOne" class="panel-collapse in" style="height: auto;">
												<div class="panel-body">

													<div class="form-horizontal">
													  <div class="form-group">
													    <label for="Voornaam" class="col-sm-2 col-md-2control-label">Voornaam</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][]" id="Voornaam" placeholder="Voornaam">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Achternaam" class="col-sm-2 col-md-2control-label">Achternaam</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][]" id="Achternaam" placeholder="Achternaam">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="geslacht" class="col-sm-2 col-md-2 control-label">Geslacht</label>
													    <div class="col-sm-2 col-md-2">
															<select class="form-control input-m required" name="reizigers[1][]">
																<option value="Man">Man</option>
																<option value="Vrouw">Vrouw</option>
															</select>
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Geboortedatum" class="col-sm-2 col-md-2control-label">Geboortedatum</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][]" id="Geboortedatum" placeholder="xx/xx/xxxx">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Telefoonnummer" class="col-sm-2 col-md-2control-label">Telefoonnummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][]" id="Telefoonnummer" placeholder="Telefoonnummer">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="gsm" class="col-sm-2 col-md-2control-label">gsm nummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][]" id="gsm" placeholder="gsm">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="email" class="col-sm-2 col-md-2control-label">email</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="email" class="form-control" name="reizigers[1][]" id="email" placeholder="email">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Land" class="col-sm-2 col-md-2 control-label">Land</label>
													    <div class="col-sm-2 col-md-2">
															<select class="form-control input-m required" name="reizigers[1][]">
																<option value="België">België</option>
																<option value="Nederland">Nederland</option>
																<option value="Andere">Andere</option>
															</select>
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Woonplaats" class="col-sm-2 col-md-2control-label">Woonplaats</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][]" id="Woonplaats" placeholder="Woonplaats">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Postcode" class="col-sm-2 col-md-2control-label">Postcode</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][]" id="Postcode" placeholder="Postcode">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Straat" class="col-sm-2 col-md-2control-label">Straat + Nummer + Bus</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][]" id="straat" placeholder="Straat + Nummer + Bus">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="extra" class="col-sm-2 col-md-2control-label">Heb je bepaalde medische voorgeschiedenis die je deelname aan de reis zou belemmeren?</label>
													    <div class="col-sm-3 col-md-3">
													      <textarea type="text" class="form-control" name="reizigers[1][]" id="extra" placeholder="licht toe"></textarea>
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="extra" class="col-sm-2 col-md-2control-label">Heb je bepaalde verwachtingen wat betreft maaltijden? (vegetarisch/andere)</label>
													    <div class="col-sm-3 col-md-3">
													      <textarea type="text" class="form-control" name="reizigers[1][]" id="extra" placeholder="licht toe"></textarea>
													    </div>
													  </div>
													  <h4>contactpersoon bij noodgevallen</h4>	
													  <div class="form-group">
													    <label for="naam" class="col-sm-2 col-md-2control-label">Naam</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][noodgevallen][]" id="Naam" placeholder="Naam">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Telefoonnummer" class="col-sm-2 col-md-2control-label">Telefoonnummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][noodgevallen][]" id="Telefoonnummer" placeholder="Telefoonnummer">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="gsm" class="col-sm-2 col-md-2control-label">gsm nummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][noodgevallen][]" id="gsm" placeholder="gsm">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="email" class="col-sm-2 col-md-2control-label">email</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="email" class="form-control" name="reizigers[1][noodgevallen][]" id="email" placeholder="email">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="verwantschap" class="col-sm-2 col-md-2control-label">verwantschap</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][noodgevallen][]" id="verwantschap" placeholder="verwantschap">
													    </div>
													  </div>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo"> Reiziger 2 <i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="panel-body">

													<div class="form-horizontal">
													  <div class="form-group">
													    <label for="Voornaam" class="col-sm-2 col-md-2control-label">Voornaam</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][]" id="Voornaam" placeholder="Voornaam">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Achternaam" class="col-sm-2 col-md-2control-label">Achternaam</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][]" id="Achternaam" placeholder="Achternaam">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="geslacht" class="col-sm-2 col-md-2 control-label">Geslacht</label>
													    <div class="col-sm-2 col-md-2">
															<select class="form-control input-m required" name="reizigers[2][]">
																<option value="Man">Man</option>
																<option value="Vrouw">Vrouw</option>
															</select>
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Geboortedatum" class="col-sm-2 col-md-2control-label">Geboortedatum</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][]" id="Geboortedatum" placeholder="xx/xx/xxxx">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Telefoonnummer" class="col-sm-2 col-md-2control-label">Telefoonnummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][]" id="Telefoonnummer" placeholder="Telefoonnummer">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="gsm" class="col-sm-2 col-md-2control-label">gsm nummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][]" id="gsm" placeholder="gsm">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="email" class="col-sm-2 col-md-2control-label">email</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="email" class="form-control" name="reizigers[2][]" id="email" placeholder="email">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Land" class="col-sm-2 col-md-2 control-label">Land</label>
													    <div class="col-sm-2 col-md-2">
															<select class="form-control input-m required" name="reizigers[2][]">
																<option value="België">België</option>
																<option value="Nederland">Nederland</option>
																<option value="Andere">Andere</option>
															</select>
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Woonplaats" class="col-sm-2 col-md-2control-label">Woonplaats</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][]" id="Woonplaats" placeholder="Woonplaats">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Postcode" class="col-sm-2 col-md-2control-label">Postcode</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][]" id="Postcode" placeholder="Postcode">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Straat" class="col-sm-2 col-md-2control-label">Straat + Nummer + Bus</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][]" id="straat" placeholder="Straat + Nummer + Bus">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="extra" class="col-sm-2 col-md-2control-label">Heb je bepaalde medische voorgeschiedenis die je deelname aan de reis zou belemmeren?</label>
													    <div class="col-sm-3 col-md-3">
													      <textarea type="text" class="form-control" name="reizigers[2][]" id="extra" placeholder="licht toe"></textarea>
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="extra" class="col-sm-2 col-md-2control-label">Heb je bepaalde verwachtingen wat betreft maaltijden? (vegetarisch/andere)</label>
													    <div class="col-sm-3 col-md-3">
													      <textarea type="text" class="form-control" name="reizigers[2][]" id="extra" placeholder="licht toe"></textarea>
													    </div>
													  </div>
													  <h4>contactpersoon bij noodgevallen</h4>	
													  <div class="form-group">
													    <label for="naam" class="col-sm-2 col-md-2control-label">Naam</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][noodgevallen][]" id="Naam" placeholder="Naam">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="Telefoonnummer" class="col-sm-2 col-md-2control-label">Telefoonnummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][noodgevallen][]" id="Telefoonnummer" placeholder="Telefoonnummer">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="gsm" class="col-sm-2 col-md-2control-label">gsm nummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][noodgevallen][]" id="gsm" placeholder="gsm">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="email" class="col-sm-2 col-md-2control-label">email</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="email" class="form-control" name="reizigers[2][noodgevallen][]" id="email" placeholder="email">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="verwantschap" class="col-sm-2 col-md-2control-label">verwantschap</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][noodgevallen][]" id="verwantschap" placeholder="verwantschap">
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
					    <section>
					    	<div class="row">
								<div class="col-md-12">
									<p>Vul de nodige gegevens in van alle reizigers</p>
								</div>
							</div>
					        
					        <div class="row">
								<div class="col-md-12">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseinsuranceOne" class=""> Verzekeringen hoofdreiziger<i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseinsuranceOne" class="panel-collapse in" style="height: auto;">
												<div class="panel-body">
													<div class="form-group">
													    <label>
													      <input type="checkbox" name="reizigers[1][verzekering][]" value="Reisongevallen &amp; Annulatie &amp; Reisbagage - €3,25/dag (min. €20)"> Reisongevallen &amp; Annulatie &amp; Reisbagage - €3,25/dag (min. €20) 
													    </label>
													</div>
													<div class="form-group">
													    <label>
													      <input type="checkbox" name="reizigers[1][verzekering][]" value="Ik verklaar te beschikken over een eigen reisongevallenverzekering en kan hiervan indien nodig een geldig bewijs en voorwaarden voorleggen">Ik verklaar te beschikken over een eigen reisongevallenverzekering en kan hiervan indien nodig een geldig bewijs en voorwaarden voorleggen
													    </label>
													</div>
													<div class="form-horizontal">
														<div class="form-group">
													    <label for="email" class="col-sm-2 col-md-2control-label">Naam maatschappij</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][verzekering][eigen][]" id="email" placeholder="Naam maatschappij">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="polisnummer" class="col-sm-2 col-md-2control-label">Polisnummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[1][verzekering][eigen][]" id="polisnummer" placeholder="Polisnummer">
													    </div>
													  </div>
													</div>
													<div class="form-group">
													    <label>
													      <input type="checkbox" name="reizigers[1][verzekering][]" value="Ik wens een andere formule van reisongevallen verzekering, contacteer me voor de verschillende mogelijkheden">"Ik wens een andere formule van reisongevallen verzekering, contacteer me voor de verschillende mogelijkheden"
													    </label>
													</div>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseinsuranceTwo"> Verzekeringen 2 <i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseinsuranceTwo" class="panel-collapse collapse">
												<div class="panel-body">
													<div class="form-group">
													    <label>
													      <input type="checkbox" name="reizigers[2][verzekering][]" value="Reisongevallen &amp; Annulatie &amp; Reisbagage - €3,25/dag (min. €20)"> Reisongevallen &amp; Annulatie &amp; Reisbagage - €3,25/dag (min. €20) 
													    </label>
													</div>
													<div class="form-group">
													    <label>
													      <input type="checkbox" name="reizigers[2][verzekering][]" value="Ik verklaar te beschikken over een eigen reisongevallenverzekering en kan hiervan indien nodig een geldig bewijs en voorwaarden voorleggen">Ik verklaar te beschikken over een eigen reisongevallenverzekering en kan hiervan indien nodig een geldig bewijs en voorwaarden voorleggen
													    </label>
													</div>
													<div class="form-horizontal">
														<div class="form-group">
													    <label for="email" class="col-sm-2 col-md-2control-label">Naam maatschappij</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][verzekering][eigen][]" id="email" placeholder="Naam maatschappij">
													    </div>
													  </div>
													  <div class="form-group">
													    <label for="polisnummer" class="col-sm-2 col-md-2control-label">Polisnummer</label>
													    <div class="col-sm-3 col-md-3">
													      <input type="text" class="form-control" name="reizigers[2][verzekering][eigen][]" id="polisnummer" placeholder="Polisnummer">
													    </div>
													  </div>
													</div>
													<div class="form-group">
													    <label>
													      <input type="checkbox" name="reizigers[2][verzekering][]" value="Ik wens een andere formule van reisongevallen verzekering, contacteer me voor de verschillende mogelijkheden">"Ik wens een andere formule van reisongevallen verzekering, contacteer me voor de verschillende mogelijkheden"
													    </label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
					        </div>
					    </section>
					    <h3>Opties</h3>
					    <section>
					    	<div class="row">
								<div class="col-md-12">
									<p>Selecteer per reiziger de nodige opties</p>
								</div>
							</div>
					        
					        <div class="row">
								<div class="col-md-12">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseoptionsOne" class=""> Opties hoofdreiziger<i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseoptionsOne" class="panel-collapse in" style="height: auto;">
												<div class="panel-body">
												<?php 
													$optioneel = get_field('optioneel');
													foreach ($optioneel as $opt):
												?>
													<div class="form-group">
													    <label>
													      <input type="checkbox" name="reizigers[2][opties][]" value="<?php echo $opt['item']; ?>"> <?php echo $opt['item']; ?>
													    </label>
													</div>
												<?php endforeach; ?>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseoptionsTwo"> Opties 2 <i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseoptionsTwo" class="panel-collapse collapse">
												<div class="panel-body">
												<?php 
													$optioneel = get_field('optioneel');
													foreach ($optioneel as $opt):
												?>
													<div class="form-group">
													    <label>
													      <input type="checkbox" name="reizigers[2][opties][]" value="<?php echo $opt['item']; ?>"> <?php echo $opt['item']; ?>
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
					    <section>
					    	<div class="row">
								<div class="col-md-12">
									<p>Hieronder vind je een overzicht van je boeking, je kan nog steeds terugkeren naar een stap en aanpassingen uitvoeren. Onderaan deze pagina kan je je boeking bevestigen </p>
								</div>
							</div>
					    	<div class="row">
								<div class="col-md-12">
						    		<strong><?php the_title(); ?></strong></br>
						    		<strong>Periode</strong>01/07/15 - 07/07/15</br>
						    		<strong>Aantal reizigers</strong>3
								</div>
							</div>
					        <div class="row">
								<div class="col-md-12">
									<div class="panel-group" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseovervieuwOne" class="collapsed"> Overzicht hoofdreiziger<i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseovervieuwOne" class="panel-collapse collapse" style="height: 0px;">
												<div class="panel-body">
													<div class="col-md-6">
													Naam hoofdreiziger</br>
													Adres hoofdreiziger</br>
													Postcode + gemeente </br>
													email</br>
													telefoon</br>
													gsm</br>
													opmerking 1 </br>
													opmerking 1 </br></br>
													</div>
													<div class="col-md-6">

													<strong>Prijs:€<?php echo $reisdata['prijs']; ?></strong></br>
													gekozen verzekering (+€)</br>
													gekozen opties (+€)</br></br>
													<strong>totaal reiziger 1:€785</strong>
													</div>

												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title"><a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseovervieuwTwo"> Overzicht 2 <i class="fa fa-plus pull-right"></i></a></h4>
											</div>
											<div id="collapseovervieuwTwo" class="panel-collapse collapse">
												<div class="panel-body">
													<div class="col-md-6">
													Naam reiziger 2</br>
													Adres reiziger 2</br>
													Postcode + gemeente </br>
													email</br>
													telefoon</br>
													gsm</br>
													opmerking 1 </br>
													opmerking 1 </br></br>
													</div>
													<div class="col-md-6">

													<strong>Prijs:€699</strong></br>
													gekozen verzekering (+€)</br>
													gekozen optiets (+€)</br></br>
													<strong>totaal reiziger 2:€785</strong>
													</div>
												</div>
											</div>
										</div>
									</div>
									<h5>Totaal voor alle reizigers samen: </h5> <h2>€1250</h2>

									<a href="#">algemene reisvoorwaarden (pdf)</a></br>
						    		<a href="#">verkoopsvoorwaarden (pdf)</a></br>
						    		<a href="#">technische fiche reis (pdf)</a></br></br>
									<div class="form-group">
									    <label>
									      <input type="checkbox"> ik aanvaard de reisvoorwaarden. Ik heb de infofiche van de reis gelezen.
									    </label>
									</div>
								</div>
					        </div>
					    </section>
					</div>

				</div>
				<div class="form-respond text-center"></div>
			</div>
		</form><!-- #bookingform -->
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>