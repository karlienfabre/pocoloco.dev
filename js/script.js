//Page Preloader
$(window).load(function() {
	$("#intro-loader").delay(50).fadeOut();
	$(".mask").delay(100).fadeOut("slow");
	
	// Booking addClient
	$(".aantal-reizigers").change(function(){
	
		$(".reizigers-data").empty();
		$(".reizigers-verzekeringen").empty();

		var htmlTemplateData = '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseID" class=""> Gegevens [TITLE]<i class="fa fa-plus pull-right"></i></a></h4></div>[openclose]<div class="panel-body"><div class="form-horizontal"> <div class="form-group"> <label for="Voornaam" class="col-sm-2 col-md-2control-label">Voornaam</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][]" id="Voornaam" value="test-Voornaam"> </div> </div> <div class="form-group"> <label for="Achternaam" class="col-sm-2 col-md-2control-label">Achternaam</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][]" id="Achternaam" value="test-Achternaam"> </div> </div> <div class="form-group"> <label for="geslacht" class="col-sm-2 col-md-2 control-label">Geslacht</label> <div class="col-sm-2 col-md-2"><select class="form-control input-m required" name="reizigers[ID][]"><option value="Man">Man</option><option value="Vrouw">Vrouw</option></select> </div> </div> <div class="form-group"> <label for="Geboortedatum" class="col-sm-2 col-md-2control-label">Geboortedatum</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][]" id="Geboortedatum" value="test-xx/xx/xxxx"> </div> </div> <div class="form-group"> <label for="Telefoonnummer" class="col-sm-2 col-md-2control-label">Telefoonnummer</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][]" id="Telefoonnummer" value="test-Telefoonnummer"> </div> </div> <div class="form-group"> <label for="gsm" class="col-sm-2 col-md-2control-label">gsm nummer</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][]" id="gsm" value="test-gsm"> </div> </div> <div class="form-group"> <label for="email" class="col-sm-2 col-md-2control-label">email</label> <div class="col-sm-3 col-md-3"> <input type="email" class="form-control" name="reizigers[ID][]" id="email" value="test-email"> </div> </div> <div class="form-group"> <label for="Land" class="col-sm-2 col-md-2 control-label">Land</label> <div class="col-sm-2 col-md-2"><select class="form-control input-m required" name="reizigers[ID][]"><option value="België">België</option><option value="Nederland">Nederland</option><option value="Andere">Andere</option></select> </div> </div> <div class="form-group"> <label for="Woonplaats" class="col-sm-2 col-md-2control-label">Woonplaats</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][]" id="Woonplaats" value="test-Woonplaats"> </div> </div> <div class="form-group"> <label for="Postcode" class="col-sm-2 col-md-2control-label">Postcode</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][]" id="Postcode" value="test-Postcode"> </div> </div> <div class="form-group"> <label for="Straat" class="col-sm-2 col-md-2control-label">Straat + Nummer + Bus</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][]" id="straat" value="test-Straat + Nummer + Bus"> </div> </div> <div class="form-group"> <label for="extra" class="col-sm-2 col-md-2control-label">Heb je bepaalde medische voorgeschiedenis die je deelname aan de reis zou belemmeren?</label> <div class="col-sm-3 col-md-3"> <textarea type="text" class="form-control" name="reizigers[ID][]" id="extra" value="test-licht toe"></textarea> </div> </div> <div class="form-group"> <label for="extra" class="col-sm-2 col-md-2control-label">Heb je bepaalde verwachtingen wat betreft maaltijden? (vegetarisch/andere)</label> <div class="col-sm-3 col-md-3"> <textarea type="text" class="form-control" name="reizigers[ID][]" id="extra" value="test-licht toe"></textarea> </div> </div> <h4>contactpersoon bij noodgevallen</h4> <div class="form-group"> <label for="naam" class="col-sm-2 col-md-2control-label">Naam</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][noodgevallen][]" id="Naam" value="test-Naam"> </div> </div> <div class="form-group"> <label for="Telefoonnummer" class="col-sm-2 col-md-2control-label">Telefoonnummer</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][noodgevallen][]" id="Telefoonnummer" value="test-Telefoonnummer"> </div> </div> <div class="form-group"> <label for="gsm" class="col-sm-2 col-md-2control-label">gsm nummer</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][noodgevallen][]" id="gsm" value="test-gsm"> </div> </div> <div class="form-group"> <label for="email" class="col-sm-2 col-md-2control-label">email</label> <div class="col-sm-3 col-md-3"> <input type="email" class="form-control" name="reizigers[ID][noodgevallen][]" id="email" value="test-email"> </div> </div> <div class="form-group"> <label for="verwantschap" class="col-sm-2 col-md-2control-label">verwantschap</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][noodgevallen][]" id="verwantschap" value="test-verwantschap"> </div> </div></div></div></div></div>';
		var htmlTemplateVerzekering = '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseinsuranceID" class=""> Verzekeringen [TITLE] <i class="fa fa-plus pull-right"></i></a></h4></div>[openclose]<div class="panel-body"><div class="form-group"> <label> <input type="radio" name="reizigers[ID][verzekering][]" value="Reisongevallen &amp; Annulatie &amp; Reisbagage - €3,25/dag (min. €20)"> Reisongevallen &amp; Annulatie &amp; Reisbagage - €3,25/dag (min. €20) </label></div><div class="form-group"> <label> <input type="radio" name="reizigers[ID][verzekering][]" value="Eigen reisongevallenverzekering + geldig bewijs en voorwaarden">Ik verklaar te beschikken over een eigen reisongevallenverzekering en kan hiervan indien nodig een geldig bewijs en voorwaarden voorleggen </label></div><div class="form-horizontal"><div class="form-group"> <label for="email" class="col-sm-2 col-md-2control-label">Naam maatschappij</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][verzekering][eigen][]" id="email" value="test-Naam maatschappij"> </div> </div> <div class="form-group"> <label for="polisnummer" class="col-sm-2 col-md-2control-label">Polisnummer</label> <div class="col-sm-3 col-md-3"> <input type="text" class="form-control" name="reizigers[ID][verzekering][eigen][]" id="polisnummer" value="test-Polisnummer"> </div> </div></div><div class="form-group"> <label> <input type="radio" name="reizigers[ID][verzekering][]" value="Ik wens een andere formule van reisongevallen verzekering, contacteer me voor de verschillende mogelijkheden">"Ik wens een andere formule van reisongevallen verzekering, contacteer me voor de verschillende mogelijkheden" </label></div></div></div></div>';
		var htmlTemplateOptions = "<div class='panel panel-default'><div class='panel-heading'><h4 class='panel-title'><a data-toggle='collapse' data-parent='#accordion' href='#collapseoptionsID' class=''> Opties [TITLE]<i class='fa fa-plus pull-right'></i></a></h4></div>[opencloseoptions]<div class='panel-body'><?php $optioneel = get_field('optioneel');foreach ($optioneel as $opt):?><div class='form-group'> <label> <input type='checkbox' name='reizigers[ID][opties][]' value='<?php echo $opt['item']; ?><?php if ($opt['item_prijs']): ?> - &euro;<?php echo $opt['item_prijs']; ?>' data-price='<?php echo $opt['item_prijs']; ?><?php endif ?>'> <?php echo $opt['item']; ?><?php if ($opt['item_prijs']): ?> - &euro;<?php echo $opt['item_prijs']; ?><?php endif ?> </label></div><?php endforeach; ?></div></div></div>";
		var aantalReizigers = $(".aantal-reizigers").val();
		var title="";
		var openclosedata="";
		var opencloseverzekeringen="";
		var opencloseoptions="";
		for (var i = 1; i <= aantalReizigers; i++) {

			if(i == 1){
				title = "hoofdreiziger";
				openclosedata='<div id="collapse'+i+'" class="panel-collapse in" style="height: auto;">';
				opencloseverzekeringen='<div id="collapseinsurance'+i+'" class="panel-collapse in" style="height: auto;">';
				opencloseoptions = '<div id="collapseoptions" class="panel-collapse in" style="height: auto;">';
			}
			else{
				title = "reiziger "+i;
				openclosedata='<div id="collapse'+i+'" class="panel-collapse collapse">';
				opencloseverzekeringen='<div id="collapseinsurance'+i+'" class="panel-collapse collapse">';
				opencloseoptions = '<div id="collapseoptions'+i+'" class="panel-collapse collapse"">';
			}
			addReiziger($(".reizigers-data"), htmlTemplateData, title, openclosedata, i  );
			addReiziger($(".reizigers-verzekeringen"), htmlTemplateVerzekering, title, opencloseverzekeringen, i  );
			addReiziger($(".reizigers-options"), htmlTemplateOptions, title, opencloseoptions, i  );	
		};

	});
	jQuery(".aantal-reizigers").trigger("change");
	function addReiziger(div, template, title, openclose, i){
		var htmltemplate = "";
		htmltemplate = template;
		htmltemplate = htmltemplate.replace("[TITLE]", title).replace("[openclose]", openclose).replace("[i]", i);
		div.append(htmltemplate);
	}

	// Travel Isotope
	var container = $('#travel-wrap');
	container.isotope({
		animationEngine : 'best-available',
		itemSelector: '.travel-box ',
		animationOptions : {
			duration : 200,
			queue : false
		},
	});

	$('.filters span').click(function() {
		
		var elfilters = $(this).parents().eq(1);

		if( (elfilters.attr("id") == "alleReizen") && elfilters.hasClass("non-active") )
		{
			$(".label").each(function(){
				inActive( $(this) );
			});
			setActive(elfilters);
		}
		else{
			//set label alleReizen inactive
			inActive( $("#alleReizen") );
			if( elfilters.hasClass("non-active") ){
				setActive(elfilters);
			}
			else{
				inActive(elfilters);
			}
		}
		checkFilter();
		return false;
	});



	
	$(".filters span").click(function(){
		var filters=[];
		console.log("filters before adding "+filters);

		$(".search.filters").children().each(function(){
			var filter = $(this).children().children().attr("data-filter");

			if( $(this).hasClass("non-active") ){

				filters = jQuery.grep(filters, function(value){
					return value != filter;
				}); 

			}
			else{
				if(jQuery.inArray(filter,filters) == -1){
				    filters.push(filter);
				}
			}


		});

		filters = filters.join("");
		filterItems(filters);
		console.log("filters after adding "+filters);

	});


	function filterItems(filters){
		console.log("filter items with filters:" + filters);
		container.isotope({
			filter : filters,
		}, function noResultsCheck(){
			    var numItems = $('.travel-box:not(.isotope-hidden)').length;
			    if (numItems == 0) {
			        $("#no-results").fadeIn();
			        $("#no-results").css("display", "block");
			    }
			    else{
			    	$("#no-results").fadeOut();
			    	$("#no-results").css("display", "none");
			    }				
			});		
	}

	function setActive(el){
		el.removeClass("non-active");
		var span = el.find('i');
		span.removeClass("fa-check-circle-o").addClass("fa-ban");		
	}

	function inActive(el){
		el.addClass("non-active");
		var span = el.find('i');
		span.removeClass("fa-ban").addClass("fa-check-circle-o")		
	}
	function checkFilter(){

		var filterdivs = $('.filters span').parent().parent();

		if( filterdivs.not('.non-active').length == 0 ){
			setActive( $("#alleReizen") );
		}

		var filterLabels = $(".filters .label");

		if( filterLabels.not('.non-active').length == 0){
			setActive( $("#alleReizen") );
		}

	}
	function noResultsCheck() {
	    var numItems = $('.item:not(.isotope-hidden)').length;
	    if (numItems == 0) {
	        //do something here, like turn on a div, or insert a msg with jQuery's .html() function
	        alert("There are no results");
	    }
	}
});

$(document).ready(function() {

	//random background image
	if ($('#bgimg').length){
		var images = [
						'0',
						'1',
						'2',
						'3',
						'4',
						'5'
					];

		$("#bgimg").attr('src',$("#bgimg").attr('src').replace(/[0-9]+(?!.*[0-9])/,images[Math.floor(Math.random() * images.length)]));
	}

	// Contact Form Request
	$(".validate").validate();
	$(document).on('submit', '#contactform', function() {
		$.ajax({
			url : 'http://dev.design311.com/pocoloco/wp-content/themes/pocoloco/mailscripts/send_mail.php',
			type : 'post',
			dataType : 'json',
			data : $(this).serialize(),
			success : function(data) {
				if (data == true) {
					$('.form-respond').html("<div class='content-message'> <i class='fa fa-rocket fa-4x'></i> <h2>Email Sent Successfully</h2> <p>Your message has been submitted.</p> </div>");
				} else {
					$('.form-respond').html("<div class='content-message'> <i class='fa fa-times fa-4x'></i> <h2>Error sending</h2> <p>Try again later.</p> </div>");
				}
			},
			error : function(xhr, err) {
				$('.form-respond').html("<div class='content-message'> <i class='fa fa-times fa-4x'></i> <h2>Error sending</h2> <p>Try again later.</p> </div>");
			}
		});
		return false;
	});

	//booking form
	$('.actions a[href$="#finish"]').click(function(){
		$('#bookingform').submit();
	});
	$(document).on('submit', '#bookingform', function() {
		$.ajax({
			url : 'http://dev.design311.com/pocoloco/wp-content/themes/pocoloco/mailscripts/send_booking_confirmation.php',
			type : 'post',
			dataType : 'json',
			data : $(this).serialize(),
			success : function(data) {
				if (data == true) {
					$('.form-respond').html("<div class='content-message'> <i class='fa fa-rocket fa-4x'></i> <h2>Email Sent Successfully</h2> <p>Your message has been submitted.</p> </div>");
					console.log(data);
				} else {
					$('.form-respond').html("<div class='content-message'> <i class='fa fa-times fa-4x'></i> <h2>Error sending</h2> <p>Try again later.</p> </div>");
				}
			},
			error : function(xhr, err) {
				$('.form-respond').html("<div class='content-message'> <i class='fa fa-times fa-4x'></i> <h2>Error sending</h2> <p>Try again later.</p> </div>");
			}
		});
		return false;
	});

	//Elements Appear from top
	$('.item_top').each(function() {
		$(this).appear(function() {
			$(this).delay(150).animate({
				opacity : 1,
				top : "0px"
			}, 1000);
		});
	});

	//Elements Appear from bottom
	$('.item_bottom').each(function() {
		$(this).appear(function() {
			$(this).delay(150).animate({
				opacity : 1,
				bottom : "0px"
			}, 1000);
		});
	});

	//Elements Appear from left
	$('.item_left').each(function() {
		$(this).appear(function() {
			$(this).delay(150).animate({
				opacity : 1,
				left : "0px"
			}, 1000);
		});
	});

	//Elements Appear from right
	$('.item_right').each(function() {
		$(this).appear(function() {
			$(this).delay(150).animate({
				opacity : 1,
				right : "0px"
			}, 1000);
		});
	});

	//Elements Appear in fadeIn effect
	$('.item_fade_in').each(function() {
		$(this).appear(function() {
			$(this).delay(150).animate({
				opacity : 1,
				right : "0px"
			}, 1000);
		});
	});

	$("#navigation").sticky({
		topSpacing : 0
	});

	$(".container").fitVids();

	$('a.external').click(function() {
		var url = $(this).attr('href');
		$('.mask').fadeIn(250, function() {
			document.location.href = url;
		});
		$("#intro-loader").fadeIn("slow");
		return false;
	});

	$('.flexslider').flexslider({
		animation : "slide",
		slideshowSpeed: 3200,
		pauseOnHover: true,
	});

	$('.intro-flexslider').flexslider({
		animation : "fade",
		touch: false,
		directionNav : false,
		controlNav : false,
		slideshowSpeed : 5000,
		animationSpeed : 600,
	});


	// Radial progress bar
	$('.cart').appear(function() {
		var easy_pie_chart = {};
		$('.circular-item').removeClass("hidden");
		$('.circular-pie').each(function() {
			var text_span = $(this).children('span');
			$(this).easyPieChart($.extend(true, {}, easy_pie_chart, {
				size : 250,
				animate : 2000,
				lineWidth : 6,
				lineCap : 'square',
				barColor : $(this).data('color'),
				lineWidth : 20,
				trackColor : '#2B2925',
				scaleColor : false,
				onStep : function(value) {
					text_span.text(parseInt(value, 10) + 1 + '%');
				}
			}));
		});
	});

	$(".short-text").each(function(){
		var newP = shorten( $(this).text(), 200 );
		$(this).text(newP);
	});

	//shorten travel text
	function shorten(text, maxLength) {
	    var ret = text;
	    if (ret.length > maxLength) {
	        ret = ret.substr(0,maxLength-3) + "...";
	    }
	    return ret;
	}

	//Navigation Scrolling
	$(function() {
		$('#brand, .nav li a, .start-button').bind('click', function(event) {
			var $anchor = $(this);

			$('html, body').stop().animate({
				scrollTop : $($anchor.attr('href')).offset().top - 60
			}, 1500, 'easeInOutExpo');

			event.preventDefault();
		});
	});

	//Navigation Dropdown
	$('.nav a.int-collapse-menu').click(function() {
		$(".navbar-collapse").collapse("hide")
	});

	$('body').on('touchstart.dropdown', '.dropdown-menu', function(e) {
		e.stopPropagation();
	});

	var onMobile = false;
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
	  if (jQuery(window).width() < 1200) {
	    onMobile = true;
	  }
	}

	//Back To Top
	$(window).scroll(function() {
		if ($(window).scrollTop() > 400) {
			$("#back-top").fadeIn(200);
		} else {
			$("#back-top").fadeOut(200);
		}
	});
	$('#back-top').click(function() {
		$('html, body').stop().animate({
			scrollTop : 0
		}, 1500, 'easeInOutExpo');
	});

	if ((onMobile === false ) && ($('.parallax-slider').length )) {
		skrollr.init({
			edgeStrategy : 'set',
			smoothScrolling : false,
			forceHeight : false
		});

	}

	$('.fa-question-circle').tooltip();


	//button action
	$("button.linkbutton").click(function(){
		var url = $(this).data("url");
		$(location).attr('href', url);
	});

	//choice buttons 
	$(".choice").click(function(){
		if( $(this).hasClass("non-active") ){

			$(".choice").each(function(){
				$(this).addClass("non-active");
			});

			$(this).removeClass("non-active");
		}

		if( $(this).hasClass("video") ){
			$("#topslider").css("display","none");
			$("#topvideo").css("display","block");
		}

		if( $(this).hasClass("foto") ){
			$("#topvideo").css("display","none");
			$("#topslider").css("display","block");			
		}
	});


});

//FullScreen Slider
$(function() {
	$('#fullscreen-slider').maximage({
		cycleOptions : {
			fx : 'fade',
			speed : 1000,
			timeout : 6000,
			prev : '#slider_left',
			next : '#slider_right',
			pause : 1,
			before : function(last, current) {
				jQuery('.slide-content').fadeOut().animate({
					top : '100px'
				}, {
					queue : false,
					easing : 'easeOutQuad',
					duration : 550
				});
				jQuery('.slide-content').fadeOut().animate({
					top : '-100px'
				});
			},
			after : function(last, current) {
				jQuery('.slide-content').fadeIn().animate({
					top : '0'
				}, {
					queue : false,
					easing : 'easeOutQuad',
					duration : 450
				});
			}
		},
		onFirstImageLoaded : function() {
			jQuery('#cycle-loader').delay(800).hide();
			jQuery('#fullscreen-slider').delay(800).fadeIn('slow');
			jQuery('.slide-content').fadeIn().animate({
				top : '0'
			});
			jQuery('.slide-content a').bind('click', function(event) {
				var $anchor = $(this);
				jQuery('html, body').stop().animate({
					scrollTop : $($anchor.attr('href')).offset().top - 44
				}, 1500, 'easeInOutExpo');
				event.preventDefault();
			});
		}
	});
});

//Parallax
$(window).bind('load', function() {
	parallaxInit();
});

function parallaxInit() {
	$('#one-parallax').parallax("30%", 0.1);
	$('#two-parallax').parallax("30%", 0.1);
	$('#three-parallax').parallax("30%", 0.1);
	$('#four-parallax').parallax("30%", 0.1);
	$('#five-parallax').parallax("30%", 0.1);
	$('#six-parallax').parallax("30%", 0.1);
	$('#seven-parallax').parallax("30%", 0.1);
	/*add as necessary*/
}

// Number Counter
(function() {
	var Core = {
		initialized : false,
		initialize : function() {
			if (this.initialized)
				return;
			this.initialized = true;
			this.build();
		},
		build : function() {
			this.animations();
		},
		animations : function() {
			// Count To
			$(".number-counters [data-to]").each(function() {
				var $this = $(this);
				$this.appear(function() {
					$this.countTo({});
				}, {
					accX : 0,
					accY : -150
				});
			});
		},
	};
	Core.initialize();
})();

//blog slider / homepage
jQuery('.blog_container').slick({
  infinite: false,
  slidesToShow: 3,
  slidesToScroll: 1
});

//Booking wizard
jQuery("#book-wizard").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    labels:{
    	next: "volgende",
   		previous: "vorige",
   		finish: "boeken"
    }
});