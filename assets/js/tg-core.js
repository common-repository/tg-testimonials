jQuery(document).ready(function($) {
        		"use strict";

      $(window).on('load', function () {
        $('.tg_testimonials_wrapper').each(function () {
            var container = $(this);
            var str = $(this).attr("template");
            if (str) {
                var caro = container.find('.tg-carousel');
                if (caro.length) {
                    var loop = caro.data('loop'),
                        nav = caro.data('nav'),
                        dots = caro.data('dots'),
                        mousedrag = caro.data('mousedrag'),
                        autoplay = caro.data('autoplay'),
                        autoplayspeed = caro.data('autoplay-speed'),
                        autoPlayHoverPause = caro.data('hoverpause'),
                        items = caro.data('items'),
                        template = caro.data('template'),
                        mitems = caro.data('mitems'),
                        titems = caro.data('titems'),
                        autoPlayTimeOut = caro.data('autoplay-timeout'),
                        autoHeight = caro.data('auto-height'),
                        smartSpeed = caro.data('smart-speed');
                        if(template != 'template1'){var margin=20;} else{ margin = -38;}
                        if(template == 'template2'){items=1;mitems=1;titems=1;}
                    caro.addClass('owl-carousel owl-theme').owlCarousel({
                        center: true,
                        items:items ? items : 3,
		                margin:margin,	
		                mouseDrag: mousedrag ? true : false,
                        loop: loop ? true : false,
                        nav: nav ? true : false,
                        dots: dots ? true : false,
                        autoplay: autoplay ? true : false,
                        autoplayHoverPause: autoPlayHoverPause ? true : false,
                        autoplayTimeout: autoPlayTimeOut ? autoPlayTimeOut : 5000,
                        autoplaySpeed: autoplayspeed ? autoplayspeed : 5000,
                        smartSpeed: smartSpeed ? smartSpeed : 250,
                        autoHeight: autoHeight ? true : false,
                        responsiveClass: true,
                        responsive: {
			              0: {
			                items:mitems ? mitems : 1,
			              },
			              768: {
			                items:titems ? titems : 2,
			              },
			              1170: {
			                items:items ? items : 3,
			              }
			            }
                    });
                }
            }
        });
    });

 });