jQuery(document).ready(function($) {

	$('#cart-form').submit(function(event) {
		var name = input[name="name"];
		var email = input[name="email"];
		var tel = input[name="tel"];
		var address = input[name="address"];
		var payments = input[name="payments"];
		var url = $(this).serialize();

		$('#loader-add-product').show();

		$.ajaxSetup({
			url: url,
			type: 'POST',
			data: {
				name: name,
				email: email,
				tel: tel,
				address: address,
				payments: payments,
			},
		})
		.done(function() {
			$('.cart-infomation').hide();
			$('.cart-tablet').hide();
			
			console.log("success");
		})
		.fail(function() {
			console.log("fuck");
		})
		.always(function() {
			$('#loader-add-product').hide();
		});
	
	});
});