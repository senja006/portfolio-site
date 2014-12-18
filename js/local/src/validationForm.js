var validationForm = (function() {
	// для работы необходимы следующие библиотеки: Jquery.inputmask, Jquery.h5Validate

	var params = {
		phone: 'input__phone',
		letters: 'input__letters',
		numbers: 'input__numbers',
		email: 'input__email'
	};
	var $inputsRequired = null;
	var $currentForm = null;
	var sendingProcess = false;
	var $buttonSubmit = null;

	function addEventListeners() {
		$('.form-validation').on('submit', controlValidationForm);
		$('.form-validation').on('focus', '.ui-state-error', hideTooltip);
		$('.input__file').on('change', addNameFile);
		$('.form-validation').on('focus', '.input, .textarea', hideFormInfo);
		$('.form-info-close').on('click', hideFormInfo);
		$('.button--reset').on('click', hideAllTooltip);
	};

	function controlAddMask() {
		addCustomMask();
		addMaskPhone();
		addMaskLetters();
		addMaskNumbers();
	};

	function controlValidationForm(ev) {
		if(sendingProcess) return false;
		addSupportRequired();
		$currentForm = $(this);
		var required = controlCheckRequired();
		// console.log(required);
		// var validEmail = checkEmail();
		if(!required) {
			// showTooltipRequired();
			// showTooltipNoValid();
			return false;
		}
		sendForm();
		return false;
	};

	function sendForm() {
		sendingProcess = true;
		disableButton();
		var data = $currentForm.serialize();
		var url = $currentForm.attr('action');
		var method = $currentForm.attr('method');
		$.ajax({
			url: url,
			type: method,
			dataType: 'html',
			data: data,
			success: function(response) {
				checkResponse(response);
				sendingProcess = false;
				unDisableButton();
			},
			error: function(response) {
				showInfoError();
				sendingProcess = false;
				unDisableButton();
			} ,
		});
	};

	function checkResponse(response) {
		var response = JSON.parse(response);
		var emailStatus = response['email_status'];
		var captchaStatus = response['captcha_status'];
		if(emailStatus === 'false' || captchaStatus === 'false') {
			if(emailStatus === 'false') resetInput('.input--email');
			if(captchaStatus === 'false') resetInput('.input--captcha');
			return false;
		}
		var sendStatus = response['send_status'];
		if(sendStatus) {
			showInfoSuccess();
		}else{
			showInfoError();
		}
	};

	function disableButton() {
		$buttonSubmit = $currentForm.find('input[type=submit]');
		$buttonSubmit.addClass('is-disabled');
	};

	function unDisableButton() {
		$buttonSubmit.removeClass('is-disabled');
	};

	function resetInput(input) {
		var val = '';
		var $input = $currentForm.find(input);
		$input.val(val);
		addSupportRequired();
		controlCheckRequired();
	};

	function controlCheckRequired() {
		$inputsRequired = $currentForm.find('.ui-state-error');
		if($inputsRequired.length) {
			showTooltipRequired();
			return false;
		}else{
			return true;
		}
	};

	function checkEmail() {
		var $inputEmail = $currentForm.find('.' + params.email);
		if(!$inputEmail.length) return true;
		var value = $inputEmail.val();
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    	if (filter.test(value)) {
	        $inputEmail.removeClass('error');
	        return true;
	    }
	    else {
	        $inputEmail.addClass('error');
	        return false;
	    }
	};

	function showTooltipRequired() {
		$inputsRequired.each(function() {
			var $input = $(this);
			var $containerInput = $input.parents('.container-input');
			var $tooltip = $containerInput.find('.tooltip');
			var text = $tooltip.data('required');
			var $containerText = $tooltip.find('.tooltip__span');
			$containerText.text(text);
			$containerInput.addClass('is-error');
		});
	};

	function showTooltipNoValid() {
		$currentForm.find('.error').each(function() {
			var $input = $(this);
			if($input.parents('.is-error').length) return;
			var $containerInput = $input.parents('.container-input');
			var $tooltip = $containerInput.find('.tooltip');
			var text = $tooltip.data('no-valid');
			var $containerText = $tooltip.find('.tooltip__span');
			$containerText.text(text);
			$containerInput.addClass('is-error');
		});
	};

	function addCustomMask() {
		$.extend($.inputmask.defaults.definitions, {
	        'l': {
	            'validator': "[А-Яа-яA-Za-z ]",
	            'cardinality': 1,
	            'prevalidator': null
	        }
	    });
	};

	function addMaskPhone() {
		$('.form-validation').find('.' + params.phone).inputmask({
	        'mask': "+7 999 999 99 99",
	        'showMaskOnHover': false,
	        'placeholder': '',
	        'oncomplete': function() {
	        	$(this).removeClass('error');
	        },
	        'onincomplete': function() {
	        	$(this).addClass('error');
	        },
	    });
	};

	function addMaskLetters() {
		$('.form-validation').find('.' + params.letters).inputmask({
	        'mask': "l",
	        'repeat': 100,
	        'placeholder': '',
	    });
	};

	function addMaskNumbers() {
		$('.form-validation').find('.' + params.numbers).inputmask({
	        'mask': '9',
	        'repeat': 100,
	        'placeholder': '',
	    });
	};

	function addSupportRequired() {
		var $form = $('.form-validation');
		$form.h5Validate();
		$form.find('textarea').trigger('focus');
		$form.find('input').trigger('focus');
		$form.find('input').trigger('blur');
	};

	function hideTooltip() {
		$(this).parents('.is-error').removeClass('is-error');
	};

	function hideAllTooltip() {
		if($currentForm) {
			$currentForm.find('.is-error').removeClass('is-error');
		}	
	};

	function hideFormInfo() {
		$('.form-info-in').slideUp(300);
		return false;
	}

	function addNameFile() {
		var $inputFile = $(this);
		var $inputFileName = $inputFile.parents('.container-input').find('.input__file-name');
		var value = $inputFile.val();
		var arr = value.split('\\');
		var name = arr[arr.length - 1];
		$inputFileName.val(name);
		hideTooltip.apply($inputFile);
	};

	function showInfoSuccess() {
		$currentForm.find('.form-info-success').slideDown(300);
	};

	function showInfoError() {
		$currentForm.find('.form-info-error').slideDown(300);
	};

	return {
		init: function() {
			if($('form').length && !$('html').hasClass('ie-9') && !$('html').hasClass('ie-8')) {
				controlAddMask();
			}
			if($('form').length) {
				addEventListeners();
				hideFormInfo();
				// addSupportRequired();
			}
		},
		hideAllTooltip: function() {
			hideAllTooltip();
		},
		hideFormInfo: function() {
			hideFormInfo();
		},
	};

}());