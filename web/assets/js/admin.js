$(document).ready(function () {		

	$(".limitations_form").submit(function (e) {
		e.preventDefault();

		$(".save_text").toggle();
		$(".wait_text").toggle();

		$(".send_limits_btn").prop("disabled", true);

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
					$(".send_limits_btn").prop("disabled", false);
				}, 1000);
			},

			error: function (respone) {
				$(".wait_text").toggle();
				$(".fail_text").toggle();	

				setTimeout(function () {
					$(".fail_text").toggle();
					$(".save_text").toggle();
					$(".send_limits_btn").prop("disabled", false);
				}, 1000);			 
				console.log(response);
			}
		});
	});

});