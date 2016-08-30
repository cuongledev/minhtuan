jQuery(document).ready(function($) {


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

	
});