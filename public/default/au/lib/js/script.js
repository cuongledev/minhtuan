jQuery(document).ready(function($) {
	if ($(window).width() >= 992)
	{
		$(window).scroll(function() {
			var st = parseInt($(this).scrollTop());
			if (st >= 200) {
				$('#header nav').addClass('navOverflow');
			}else {
				$('#header nav').removeClass('navOverflow');
			}
			// toTopButton
			var pageHeight = $(window).height();
			if (st >= pageHeight) {
				$('#toTop').show(400);
			}else {
				$('#toTop').hide(400);
			}
		})

	}

	if ($('#toTop').length)
	{
		$('body').on('click','#toTop',function(){
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			  	var target = $(this.hash);
			  	target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			  	if (target.length) {
				    $('html, body').animate({
				      	scrollTop: target.offset().top
				    }, 1000);
				    return false;
			  	}
			}
		});
	}

	if ($('#partnerCarousel').length) 
	{
		$('#partnerCarousel').owlCarousel({
			loop:true,
		    margin:10,
		    dots: false,
		    lazyLoad:true,
			nav: false,
		    responsive:{
		        0:{
		            items:2
		        },
		        768:{
		            items:3
		        },
		        992:{
		            items:6
		        }
		    }
		});
	}

	if ($('#attachmentFile').length)
	{
		$('#attachmentFile').owlCarousel({
			loop:true,
		    margin:10,
		    dots: false,
		    lazyLoad:true,
			nav: false,
		    responsive:{
		        0:{
		            items:2
		        },
		        768:{
		            items:3
		        },
		        992:{
		            items:6
		        }
		    }
		});
	}

	if ($('#blogCarousel').length) 
	{
		$('#blogCarousel').owlCarousel({
			loop:true,
		    dots: true,
			nav: false,
		    items: 1,
		    autoplay:false,
			autoplayTimeout:5000,
			autoplayHoverPause:false
		});
	}

	if ($('#featured-jobslist').length)
	{
		$('#featured-jobslist').owlCarousel({
			loop:true,
		    margin:10,
		    dots: true,
			nav: false,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true,
		    responsive:{
		        0:{
		            items:1
		        },
		        768:{
		            items:3
		        },
		        992:{
		            items:3
		        }
		    }
		});
	}

	if ($('#changeAvatar').length && $('#changeAvatarInput').length) {
		$('#changeAvatar').click(function(event) {
			$('#changeAvatarInput').click();
		});
	}

	if ($('#openMailBox').length) {
		$('#mailBox').hide();
		$('#openMailBox').click(function(event) {
			$('#mailBox').removeClass('hidden');
			$('#mailBox').show(400);
		});

		$('#closeMailBox').click(function(event) {
			$('#mailBox').hide(400);
		});
	}
});