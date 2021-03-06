//Page Preloader
$(window).load(function() {

	$(".filters span").click(function(){
		console.log("filter click");
		var filter = $(this).children().attr("data-filter")
		$.filterItems(filter);

		var label = $(this).parent();
		$(".label").each(function(){
			inActive( $(this) );
		});
		setActive(label);

	});
	
	$.filterItems = function(filter){
		var container = $('#travel-wrap');
		container.isotope({
			filter : filter,	
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

	//Check URL on parameters
	var params = {};

	if (location.search) {
	    var parts = location.search.substring(1).split('&');

	    for (var i = 0; i < parts.length; i++) {
	        var nv = parts[i].split('=');
	        if (!nv[0]) continue;
	        params[nv[0]] = nv[1] || true;
	    }
	}
	var filter = $("button[data-filter='." + params.f + "']").parent();
	filter.trigger("click");
	

	function setActive(el){
		el.removeClass("non-active");
		var i = el.find('i');
		i.removeClass("fa-check-circle-o").addClass("fa-ban");		
	}

	function inActive(el){
		el.addClass("non-active");
		var i = el.find('i');
		i.removeClass("fa-ban").addClass("fa-check-circle-o")		
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

	//booking addReizigers
	var htmlTemplateData = $('.reizigers-data').html();
	var htmlTemplateVerzekering = $('.reizigers-verzekeringen').html();
	var htmlTemplateOptions = $('.reizigers-options').html();
	var htmlTemplateOverview = $('.reizigers-overview').html();
	
	$(".aantal-reizigers").change(function(){
		$(".reizigers-data").empty();
		$(".reizigers-verzekeringen").empty();
		$(".reizigers-options").empty();
		//$(".reizigers-overview").empty();

		var aantalReizigers = $(".aantal-reizigers").val();
		var title='';
		var active='';
		for (var i = 1; i <= aantalReizigers; i++) {

			if(i == 1){
				title = "hoofdreiziger";
				active = 'in" style="height: auto;';
			}
			else{
				title = "reiziger "+i;
				active = ' collapse';
			}

			addReiziger($(".reizigers-data"), htmlTemplateData, title, active, i );
			addReiziger($(".reizigers-verzekeringen"), htmlTemplateVerzekering, title, active, i );
			addReiziger($(".reizigers-options"), htmlTemplateOptions, title, active, i );	
			//addReiziger($(".reizigers-overview"), htmlTemplateOverview, title, active, i );	
		};

	});
	jQuery(".aantal-reizigers").trigger("change");
	function addReiziger(div, template, title, active, i){
		var htmltemplate = "";
		htmltemplate = template;
		htmltemplate = htmltemplate.replace("%title%", title).replace("%active%", active).replace(/%id%/g, i);
		div.append(htmltemplate);
	}

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
		
		var formdata = $(this).serializeObject();

		$.ajax({
			url : 'http://pocolocoadventures.be/wp-content/themes/pocoloco/mailscripts/send_mail.php',
			type : 'post',
			dataType : 'json',
			data : formdata,
			success : function(data) {
				if (data == true) {
					$('.form-respond').html("<div class='content-message'><h2>Je bericht is goed verzonden</h2> <p>We beantwoorden je vraag binnen de 48 uur.</p> </div>");
					ga('send', 'event', 'Contact', 'Submit');
				} else {
					$('.form-respond').html("<div class='content-message'><h2>Er is iets fout gelopen</h2> <p>Probeer het later nog eens.</p> </div>");
				}
			},
			error : function(xhr, err) {
				$('.form-respond').html("<div class='content-message'><h2>Er is iets fout gelopen</h2> <p>Probeer het later nog eens.</p> </div>");
			}
		});
		return false;
	});

	// Niewsbrief Form Request
	$(".validate").validate();
	$(document).on('submit', '#nieuwsbriefform', function(e) {
		
		var formdata = $(this).serializeObject();

		$.ajax({
			url : 'http://pocolocoadventures.be/wp-content/themes/pocoloco/mailscripts/newsletter_subscribe.php',
			type : 'post',
			dataType : 'json',
			data : formdata,
			success : function(data) {
				if (data.status == 'success') {
					$('.form-respond').html("<div class='content-message'><h2>Je inschrijving is verwerkt</h2> <p>We sturen je binnenkort onze nieuwsbrief.</p> </div>");
					ga('send', 'event', 'Nieuwsbrief', 'Submit');
				} else {
					$('.form-respond').html("<div class='content-message'><h2>Er is iets fout gelopen</h2> <p>"+data.message+"</p> </div>");
				}
			},
			error : function(xhr, err) {
				$('.form-respond').html("<div class='content-message'><h2>Er is iets fout gelopen</h2> <p>Probeer het later nog eens.</p> </div>");
			}
		});
		return false;
	});

	//booking form
	$(document).on('submit', '#bookingform', function() {

		$('div.actions, section.booking5').slideUp();

		var formdata = $(this).serializeObject();

		$.ajax({
			url : 'http://pocolocoadventures.be/wp-content/themes/pocoloco/mailscripts/send_booking_confirmation.php',
			type : 'post',
			dataType : 'json',
			data : formdata,
			success : function(data) {
				if (data == true) {
					$('.form-respond').html("<div class='content-message'><h2>Je inschrijving is verwerkt</h2> <p>We nemen spoedig contact met je op.</p> </div>");
					ga('send', 'event', 'Booking', 'Submit');
				} else {
					$('.form-respond').html("<div class='content-message'><h2>Er is iets fout gelopen email</h2> <p>Probeer het later nog eens.</p> </div>");
				}
			},
			error : function(xhr, err) {
				$('.form-respond').html("<div class='content-message'><h2>Er is iets fout gelopen</h2> <p>Probeer het later nog eens.</p> </div>");
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


	$('a.external').click(function() {
		var url = $(this).attr('href');
		$('.mask').fadeIn(250, function() {
			document.location.href = url;
		});
		$("#intro-loader").fadeIn("slow");
		return false;
	});

	$(".short-text").each(function(){
		var newP = shorten( $(this).text(), 200 );
		$(this).text(newP);
	});
	
	$(".medium-text").each(function(){
		var newP = shorten( $(this).text(), 350 );
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

	//choice video/film 
	$(".choice").click(function(){
		if( $(this).hasClass("video") ){
			$("#topslider").css("display","none");
			$("#topvideo").css("display","block");
		}

		if( $(this).hasClass("foto") ){
			$("#topvideo").css("display","none");
			$("#topslider").css("display","block");			
		}
	});

	/*$('input.verzekeringen').change(function(){	
    	console.log("change");
		if($(this).hasClass('eigenverzekering')) {
			$('.eigenverzekeringform :input').prop("disabled", false);
		}
		else{
			$('.eigenverzekeringform :input').prop("disabled", true);
		}
	})*/

	$('#gekozenkantoor').change(function(){		
		$('#kantooremail').val($('#gekozenkantoor option:selected').data('email'));
		$('#kantoorphone').val($('#gekozenkantoor option:selected').data('phone'));
	})
	if ($(".selecteer-kantoor").length != 0) {
		$("#gekozenkantoor").trigger("change");
	};

	$('#aantalreizigers').change(function(){
		$('#sp-aantalreizigers').text($('#aantalreizigers').val());
	})

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
//Flexslider
$('.flexslider').flexslider({
	animation : "slide",
	slideshowSpeed: 3200,
	pauseOnHover: true,
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

//blog slider / homepage
jQuery('.blog_container').slick({
  infinite: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

//Booking wizard
var form = $("#bookingform");

jQuery("#book-wizard").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    labels:{
    	next: "volgende",
   		previous: "vorige",
   		finish: "boeken"
    },
    onStepChanging: function (event, currentIndex, newIndex)
    {
    	// Always allow step back to the previous step even if the current step is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }

        // Needed in some cases if the user went back (clean up)
        if (currentIndex > newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }

        $('.panel-collapse.collapse').show().removeClass('collapse').addClass('in').css('height', 'auto');

        return validateBookingform();
    },
    onFinishing: function (event, currentIndex)
    {
        return validateBookingform();
    },
    onFinished: function (event, currentIndex)
    {
        $('#bookingform').submit();
    }
});

function validateBookingform(){

	form.validate({
		debug:true
	}).settings.ignore = ":disabled,:hidden";
    return form.valid();
}

jQuery.extend(jQuery.validator.messages, {
    required: "Dit veld is verplicht",
    //remote: "Please fix this field.",
    email: "Gelieve een geldig e-mailadres in te vullen",
    //url: "Please enter a valid URL.",
    date: "Gelieve een datum in te te vullen (YYYY/MM/DD)",
    dateISO: "Gelieve een datum in te te vullen (YYYY/MM/DD)",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});

//testimonial slider
jQuery('.testimonial_wrapper').slick({
  infinite: false,
  slidesToShow: 1,
  slidesToScroll: 1
});

//button action
$(".linkbutton").click(function(){
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

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};