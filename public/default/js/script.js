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
			loop:false,
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

	if ($('.related-product-carousel').length)
	{
		$('.related-product-carousel').owlCarousel({
			loop:false,
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
			        items : 4,
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

		if ($('.product-gallery').length > 1){
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
			    thumbs: true,
			    thumbImage: false,
			    thumbsPrerendered: true,
			    thumbContainerClass: 'product-navigation',
			    thumbItemClass: 'product-navigation-item'
			})
		}

	if ($('.qty').length) {

		$('.plus').click(function(event) {
			var $currentVal = parseInt($(this).parents('.quantity').find('.qty').val());
			$(this).parents('.quantity').find('.qty').val($currentVal + 1).change();
			$(this).parents('.quantity').find('.minus').removeAttr('disabled');
		});

		$('.minus').click(function(event) {
			var $currentVal = parseInt($(this).parents('.quantity').find('.qty').val());

			if ($currentVal >= 1) {
				$(this).parents('.quantity').find('.qty').val($currentVal - 1).change();
			} else {
				$(this).parents('.quantity').find('.minus').attr('disabled', 'disabled');
			}
		});

	}

	
});