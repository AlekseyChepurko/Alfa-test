$(document).ready(function () {		

	$(".send_limits_btn").click(function (e) {
		e.preventDefault();

		$(".save_text").toggle();
		$(".wait_text").toggle();

		var form = $(".limitations_form").serialize();

		$.post({
			data: form,
			url: "./save_limits",
			success: function (response) {
				$(".wait_text").toggle();
				$(".success_text").toggle();
				
				setTimeout(function () {
					$(".success_text").toggle();
					$(".save_text").toggle();
				}, 1000);
			},

			fail: function (respone) {
				$(".wait_text").toggle();
				$(".fail_text").toggle();	

				setTimeout(function () {
					$(".fail_text").toggle();
					$(".save_text").toggle();
				}, 1000);			 
				console.log(response);
			}
		});
	});

});