$(document).ready(function () {		

	$(".pay_form").submit(function (e) {
		e.preventDefault();

		var form = $(".pay_form").serialize();
		var insertPoint = $(".response_text");
		$(".send_pay_text").toggle();
		$(".send_pay_text_wait").toggle();
		$(".send_pay_btn").prop("disabled", true);

		$.post({
			data: form,
			url: "/pay/send",

			success: function (response) {
				
				
				$(".send_pay_text_wait").toggle();

				if (response["errorMessage"]){
					insertPoint.text(response["errorMessage"]);
					$(".send_pay_text_error").toggle();
					setTimeout(function () {
						insertPoint.text("");
						$(".send_pay_text_error").toggle();
						$(".send_pay_text").toggle();
						$(".send_pay_btn").prop("disabled", false);
					}, 2000);
				} 
				else{
					$(".send_pay_text_ok").toggle();
					setTimeout(function () {
						insertPoint.text("");
						$(".send_pay_text_ok").toggle();
						$(".send_pay_text").toggle();
						$(".send_pay_btn").prop("disabled", false);
					}, 2000);
				}

			},

			error: function (response) {
				$(".send_pay_text_wait").toggle();
				$(".send_pay_text_error").toggle();
	
				if(response["status"] == 401)
					insertPoint.text("Авторизируйтейсь для проведения платежей!");

				setTimeout(function () {
						insertPoint.text("");
						$(".send_pay_text_error").toggle();
						$(".send_pay_text").toggle();
						$(".send_pay_btn").prop("disabled", false);
					}, 2000);
			}
		});
	});

});