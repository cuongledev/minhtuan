jQuery(document).ready(function($) {

	if ($('#slider').length) 
	{
		$('#slider').owlCarousel({
			loop:true,
		    dots: true,
			nav: false,
		    items: 1,
		    autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true
		});
	}

	if ($('.product-carousel').length)
	{
		$('.product-carousel').owlCarousel({
			loop:true,
		    dots: false,
			nav: false,
		    responsive : {
			    // breakpoint from 0 up
			    0 : {
			        items : 2,
			    },
			    // breakpoint from 480 up
			    768 : {
			        items : 3,
			    },
			    // breakpoint from 768 up
			    992 : {
			        items : 5,
			    }
			},
		    autoplay:false,
			autoplayTimeout:5000,
			autoplayHoverPause:false,
			margin: 20
		});

		$('#carousel-navigation .next').click(function(event) {
			$(this).parent().next().trigger('next.owl.carousel');
		});

		$('#carousel-navigation .prev').click(function(event) {
			$(this).parent().next().trigger('prev.owl.carousel');
		});
	}

	if ($('#blog-carousel').length)
	{
		$('#blog-carousel').owlCarousel({
			loop:true,
		    dots: false,
			nav: false,
		    responsive : {
			    // breakpoint from 0 up
			    0 : {
			        items : 1,
			    },
			    // breakpoint from 480 up
			    768 : {
			        items : 2,
			    },
			    // breakpoint from 768 up
			    992 : {
			        items : 2,
			    }
			},
		    autoplay:false,
			autoplayTimeout:5000,
			autoplayHoverPause:false,
			margin: 20
		})
	}

	if ($('#partner-carousel').length)
	{
		$('#partner-carousel').owlCarousel({
			loop:true,
		    dots: false,
			nav: false,
		    responsive : {
			    // breakpoint from 0 up
			    0 : {
			        items : 2,
			    },
			    // breakpoint from 480 up
			    768 : {
			        items : 3,
			    },
			    // breakpoint from 768 up
			    992 : {
			        items : 6,
			    }
			},
		    autoplay:false,
			autoplayTimeout:5000,
			autoplayHoverPause:false,
			margin: 20
		})
	}

	if ($(window).width() <= 768)
	{
		$('#offcanvasButton').click(function(event) {
			$('.mobile-navigation').css({
				'z-index': 999
			});
		});
		
	}

	if ($('.product-gallery').length)
	{
		$('.product-gallery').owlCarousel({
			loop:true,
		    dots: false,
			nav: false,
		    items: 1,
		    autoplay:false,
			autoplayTimeout:5000,
			autoplayHoverPause:false,
			margin: 10,
			mouseDrag: false,
			 // Enable thumbnails
		    thumbs: true,
		    // When only using images in your slide (like the demo) use this option to dynamicly create thumbnails without using the attribute data-thumb.
		    thumbImage: false,
		    // Enable this if you have pre-rendered thumbnails in your html instead of letting this plugin generate them. This is recommended as it will prevent FOUC
		    thumbsPrerendered: true,
		    // Class that will be used on the thumbnail container
		    thumbContainerClass: 'product-navigation',
		    // Class that will be used on the thumbnail item's
		    thumbItemClass: 'product-navigation-item'
		})
	}

	
});