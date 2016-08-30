jQuery(document).ready(function($) {

    if ($('.our-services-carousel').length) {
        $('.our-services-carousel').owlCarousel({
            loop:true,
            dots: false,
            nav: false,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            margin: 15,
            responsive : {
                // breakpoint from 0 up
                0 : {
                    items: 1
                },
                // breakpoint from 480 up
                480 : {
                    items: 1
                },
                // breakpoint from 768 up
                768 : {
                    items: 2
                },
                992 : {
                    items: 4
                }
            },
        })

        $('.carousel-prev').click(function(event) {
            $(this).parent().next().trigger('prev.owl.carousel');
        });

        $('.carousel-next').click(function(event) {
            $(this).parent().next().trigger('next.owl.carousel');
        });
    }

    if ($('.hero-slider').length) {
        $('.hero-slider').owlCarousel({
            loop:true,
            dots: true,
            nav: false,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            items: 1
        })

        $('.slider-prev').click(function(event) {
            $(this).parent().next().trigger('prev.owl.carousel');
        });

         $('.slider-next').click(function(event) {
            $(this).parent().next().trigger('next.owl.carousel');
        });
    }

    if ($('#partner-carousel').length)
    {
        $('#partner-carousel').owlCarousel({
            loop:true,
            dots: false,
            nav: false,
            margin: 25,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:2,
                },
                600:{
                    items:3,
                },
                1000:{
                    items:5,
                }
            }
        });
    }

    var mainNavToTop = parseInt($('.main-navigation').offset().top);
    var lastScroll = 0;

    $(window).scroll(function() {
        var st = parseInt($(this).scrollTop());
        if (st >= mainNavToTop) {
            $('.main-navigation').addClass('fixed-navigation');
        }else {
            $('.main-navigation').removeClass('fixed-navigation');
        }
        lastScroll = st;
    });
	
});