//Page Preloader
$(window).load(function() {
	$("#intro-loader").delay(500).fadeOut();
	$(".mask").delay(1000).fadeOut("slow");
});

$(document).ready(function() {

	// Contact Form Request
	$(".validate").validate();
	$(document).on('submit', '#contactform', function() {
		$.ajax({
			url : 'contact/send_mail.php',
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

	// Portfolio Isotope
	var container = $('#travel-wrap');
	container.isotope({
		animationEngine : 'best-available',
		itemSelector: '.travel-box ',
		animationOptions : {
			duration : 200,
			queue : false
		},
	});
	//container.isotope('reLayout', noResultsCheck);
	$('.filters span').click(function() {
		var selector = $(this).attr('data-filter');
		container.isotope({
			filter : selector,
		}, function noResultsCheck(){
			    var numItems = $('.travel-box:not(.isotope-hidden)').length;
			    console.log(numItems);
			    if (numItems == 0) {
			        $("#no-results").fadeIn();
			        $("#no-results").css("display", "block");
			    }
			    else{
			    	$("#no-results").fadeOut();
			    	$("#no-results").css("display", "none");
			    }				
			});

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
			console.log(elfilters);
			if( elfilters.hasClass("non-active") ){
				console.log("set active label non alle reizen");
				setActive(elfilters);
			}
			else{
				inActive(elfilters);
			}
		}
		return false;
	});
	function setActive(el){
		console.log("active");
		el.removeClass("non-active");
		var span = el.find('i');
		span.removeClass("fa-check-circle-o").addClass("fa-ban");		
	}

	function inActive(el){
		console.log("inactive");
		el.addClass("non-active");
		var span = el.find('i');
		span.removeClass("fa-ban").addClass("fa-check-circle-o")		
	}
	function noResultsCheck() {
	    var numItems = $('.item:not(.isotope-hidden)').length;
	    if (numItems == 0) {
	        //do something here, like turn on a div, or insert a msg with jQuery's .html() function
	        alert("There are no results");
	    }
	}
	// function setColumns() {
	// 	container.find('.travel-box').each(function() {
	// 		$(this).addClass("col-md-3 col-sm-2 col-xs-12");
	// 	});
	// }

	// function setProjects() {
	// 	setColumns();
	// 	// container.isotope('reLayout');
	// }


	// container.imagesLoaded(function() {
	// 	setColumns();
	// });
	// $(window).bind('resize', function() {
	// 	setProjects();
	// });

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

	$('.fa-question-circle').popover();


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
