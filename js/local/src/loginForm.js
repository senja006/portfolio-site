var loginForm = (function() {

	var $form = $('.admin__form');
	var sendingProcess = false;
	var $link = null;

	function addEventListeners() {
		$('.admin__form').on('submit', controlCheckLogin);
		$('.login').on('click', controlLoginOut);
	};

	function controlCheckLogin() {
		if(sendingProcess) return false;
		validationForm.checkRequired($form);
		if($form.find('.ui-state-error').length) {
			return false;
		}
		checkLogin();
		return false;
	};

	function checkLogin() {
		sendingProcess = true;
		validationForm.disableButton();
		var data = $form.serialize();
		$.ajax({
			url: 'login-server.php',
			type: 'POST',
			dataType: 'html',
			data: data,
			success: function(response) {
				checkResponse(response);
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
		var loginStatus = response['login_status'];
		if(loginStatus === 'false') {
			var $data = {};
			$data['.input__login'] = 'reset';
			$data['.input__pass'] = 'reset';
			validationForm.resetInput($data);
		}else{
			window.location.href = 'index.php';
		}
	};

	function controlLoginOut(ev) {
		$link = $(this);
		if($('.is-auth').length) {
			if($link.hasClass('is-process')) return false;
			$link.addClass('is-process');
			loginOut();
			return false;
		}
	};

	function loginOut() {
		$.ajax({
			url: 'login-out.php',
			type: 'POST',
			dataType: 'html',
			data: '',
			success: function(response) {
				window.location.reload();
			},
			error: function(response) {
				$link.removeClass('is-process');
			},
		});
	};

	return {
		init: function() {
			addEventListeners();
		},
	};

}());