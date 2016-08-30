jQuery(document).ready(function($) {

	if ($('.bg-slider').length) 
	{
		$('.bg-slider').owlCarousel({
			loop:true,
		    dots: false,
			nav: false,
		    items: 1,
		    autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true
		});
	}

	if ($('.tesimonial-carousel').length) 
	{
		$('.tesimonial-carousel').owlCarousel({
			loop:true,
		    dots: false,
			nav: false,
		    items: 1,
		    autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true
		});

		$('.carousel-testimonial-prev').click(function(event) {
			$('.tesimonial-carousel').trigger('prev.owl.carousel');
		});

		$('.carousel-testimonial-next').click(function(event) {
			$('.tesimonial-carousel').trigger('next.owl.carousel');
		});
	}

	if ($('.package-carousel').length) 
	{
		$('.package-carousel').owlCarousel({
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
		});

		$('.carousel-prev').click(function(event) {
			$(this).parent().next().trigger('prev.owl.carousel');
		});

		$('.carousel-next').click(function(event) {
			$(this).parent().next().trigger('next.owl.carousel');
		});
	}
	
});