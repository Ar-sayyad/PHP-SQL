/*
Author       : Hash Theme.
Template Name: Evanta - Responsive Event Landing Page
Version      : 1.0
*/
/*=============================================
Table Of Contents
================================================

01. PRELOADER JS
02. MENU JS
03. TIMER JS
04. SECTIONS BACKGROUNDS
05. TESTIMONIAL SLIDER JS
06. EVENT SLIDER JS
07. SPONSORS SLIDER JS
08. GOOGLE MAP
09. VENOBOX JS
10. WOW ANIMATION JS
11. SNOW FALL JS
 

Table Of Contents end
================================================
*/
(function($) {
    'use strict';

    jQuery(document).on('ready', function() {

        /* 01. PRELOADER JS */
		
		$(window).on('load', function() {
            $('.loadscreen').fadeOut();
            $('.preloader').delay(350).fadeOut('slow');
        });
		
	
        /* 02. MENU JS */
		
        $(window).on('scroll', function() {
            if ($("#mainNav").offset().top > 100) {
                $("#mainNav").addClass("navbar-shrink");
            } else {
                $("#mainNav").removeClass("navbar-shrink");
            }
        });
		
        $('a.js-scroll-trigger').on('click', function(e) {
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top - 48
            }, 1000);
            e.preventDefault();
        });
		
        // Closes responsive menu when a scroll trigger link is clicked
        $('.js-scroll-trigger').on('click', function() {
            $('.navbar-collapse').collapse('hide');
        });

        // Activate scrollspy to add active class to navbar items on scroll
        $('body').scrollspy({
            target: '#mainNav',
            offset: 54
        });

		
        /* 03. TIMER JS */
		
        $('#clock').countdown('2017/12/25', function(event) {
            var $this = $(this).html(event.strftime('' + '<h4>%d :<span>Days</span></h4>' + '<h4>%H :<span>hr</span></h4>' + '<h4>%M :<span>min</span></h4>' + '<h4>%S <span>sec</span></h4>'));
        });
		
		

		/* 04. SECTIONS BACKGROUNDS */

        var pageSection = $("section,div");
        pageSection.each(function(indx) {

            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });

		
        /* 05. HOME SLIDER JS */
		
		$('.home-slider').owlCarousel({
            loop: true,
            margin: 0,
            dots: true,
            nav: true,
            autoplay: false,
            navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
		
        /* 05. TESTIMONIAL SLIDER JS */
		
		$('.testimonial-slider').owlCarousel({
            loop: true,
            margin: 30,
            dots: true,
            nav: false,
            autoplay: true,
            navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });



        /* 06. EVENT SLIDER JS */
		
		$('.event-slider').owlCarousel({
            loop: true,
            margin: 30,
            dots: true,
            nav: false,
            autoplay: false,
            navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });


        /* 07. SPONSORS SLIDER JS */
		
		$('.sponsors-slider').owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            autoplay: true,
			autoplayTimeout: 2500,
            navText: ["<i class='icofont icofont-thin-left'></i>", "<i class='icofont icofont-thin-right'></i>"],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });



        /* 07. SPONSORS SLIDER JS */
		
		$('.message-slider').owlCarousel({
			loop:true,
			margin: 30,
			nav: false,
			autoplay: true,
			autoplayTimeout: 2300,
			dots: false,
			items:1,
			mouseDrag: true,
			animateIn: "fadeInDown",
			animateOut: "fadeOutDown"
        });



		/* 08. GOOGLE MAP */

        
        google.maps.event.addDomListener(window, 'load', initialize);
		function initialize() {
            var mapOptions = {
                zoom: 11,
                scrollwheel: false,
                center: new google.maps.LatLng(40.7143528, -74.0059731)
            };
            var map = new google.maps.Map(document.getElementById('map'),
                mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.7143528, -74.0059731),
                animation: google.maps.Animation.BOUNCE,
                icon: 'assets/img/map-marker.png',
                map: map
            });
        }

    });
		
		

    /* 09. VENOBOX JS */

    $('.venobox').venobox({
        numeratio: true,
        titleattr: 'data-title',
        titlePosition: 'bottom',
        spinner: 'wave'
    });

    /* 10. WOW ANIMATION JS */

    new WOW().init();
	/* 11. SNOW FALL JS */
	
	$('.home-static-2,.home-static-4,.valentine-snow').snowfall({
	  round: true,
	  flakeCount : 300,
	  maxSpeed : 5,
	  maxSize : 5
	});
	
})(jQuery);