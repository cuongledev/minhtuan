jQuery(document).ready(function($) {

	// Calling LayerSlider on the target element with adding custom slider options
    $('#layerslider').layerSlider({
        autoStart: true,
        responsiveUnder : 960,
        layersContainer : 960,
        firstLayer: 1,
        skin: 'v5',
        skinsPath: 'lib/plugins/layerslider/skins/'

        // Please make sure that you didn't forget to add a comma to the line endings
        // except the last line!
    });

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

    if ($('.our-team-carousel').length) {
        $('.our-team-carousel').owlCarousel({
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

        // $('.carousel-prev').click(function(event) {
        //     $(this).parent().next().trigger('prev.owl.carousel');
        // });

        // $('.carousel-next').click(function(event) {
        //     $(this).parent().next().trigger('next.owl.carousel');
        // });
    }

    if ($('.testimonial-carousel').length) {
        $('.testimonial-carousel').owlCarousel({
            loop:true,
            dots: true,
            nav: false,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            margin: 15,
            items: 1
        })


    }

    if ($('.widget-carousel').length) {
        $('.widget-carousel').owlCarousel({
            loop:true,
            dots: false,
            nav: false,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            margin: 15,
            items: 1
        })

        $('.carousel-prev').click(function(event) {
            $(this).parent().next().trigger('prev.owl.carousel');
        });

        $('.carousel-next').click(function(event) {
            $(this).parent().next().trigger('next.owl.carousel');
        });
    }

    if ($('.partner-carousel').length) {
        $('.partner-carousel').owlCarousel({
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
                    items: 2
                },
                // breakpoint from 480 up
                480 : {
                    items: 2
                },
                // breakpoint from 768 up
                768 : {
                    items: 3
                },
                992 : {
                    items: 6
                }
            },
        })
    }
	
});