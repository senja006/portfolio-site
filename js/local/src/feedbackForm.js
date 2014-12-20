var feedbackForm = (function() {

	var $form = $('.feedback__form');
	var sendingProcess = false;

	function addEventListeners() {
		$('.feedback__form').on('submit', controlSendFeedback);
	};

	function controlSendFeedback() {
		if(sendingProcess) return false;
		validationForm.checkRequired($form);
		if($form.find('.ui-state-error').length) {
			return false;
		}
		sendFeedback();
		return false;
	};

	function sendFeedback() {
		sendingProcess = true;
		validationForm.disableButton();
		var data = $form.serialize();
		$.ajax({
			url: 'send-mail',
			type: 'POST',
			dataType: 'html',
			data: data,
			success: function(response) {
				checkResponse(response);
				// console.log(response);
				sendingProcess = false;
				validationForm.unDisableButton();
			},
			error: function(response) {
				validationForm.showInfoError();
				sendingProcess = false;
				validationForm.unDisableButton();
			} ,
		});
	};

	function checkResponse(response) {
		var response = JSON.parse(response);
		var emailStatus = response['email_status'];
		var captchaStatus = response['captcha_status'];
		if(emailStatus === 'false' || captchaStatus === 'false') {
			var $data = {};
			if(emailStatus === 'false') {
				$data['.input--email'] = 'reset';
			}
			if(captchaStatus === 'false') {
				$data['.input--captcha'] = 'reset';
			}
			// console.log($data);
			validationForm.resetInput($data);
			return false;
		}
		var sendStatus = response['send_status'];
		if(sendStatus) {
			validationForm.showInfoSuccess();
		}else{
			validationForm.showInfoError();
		}
	};

	return {
		init: function() {
			if($('.feedback__form').length) {
				addEventListeners();
			};
		},
	};

}());