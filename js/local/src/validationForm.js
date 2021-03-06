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
	var $buttonSubmit = null;

	function addEventListeners() {
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

	function disableButton() {
		$buttonSubmit = $currentForm.find('input[type=submit]');
		$buttonSubmit.addClass('is-disabled');
	};

	function unDisableButton() {
		$buttonSubmit.removeClass('is-disabled');
	};

	function resetInput(obj) {
		var $data = obj;
		var defaultVal = '';
		for(var key in $data) {
			if($data[key] === 'reset') {
				var $input = $currentForm.find(key);
				$input.val(defaultVal);
				$input.removeClass('ui-state-valid').addClass('ui-state-error');
				$input.blur();
			}
		}
		controlCheckRequired($currentForm);
	};

	function controlCheckRequired(form) {
		$currentForm = form;
		addSupportRequired();
		$inputsRequired = $currentForm.find('.ui-state-error');
		if($inputsRequired.length) {
			showTooltipRequired();
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
		var $form = $currentForm || $('.form-validation');
		$form.h5Validate();
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
			if($('form').length) {
				addSupportRequired();
				addEventListeners();
				hideFormInfo();
			}
			if($('form').length && !$('html').hasClass('ie-9') && !$('html').hasClass('ie-8')) {
				controlAddMask();
			}
		},
		hideAllTooltip: function() {
			hideAllTooltip();
		},
		hideFormInfo: function() {
			hideFormInfo();
		},
		checkRequired: function(form) {
			controlCheckRequired(form);
		},
		disableButton: function() {
			disableButton();
		},
		unDisableButton: function() {
			unDisableButton();
		},
		showInfoError: function() {
			showInfoError();
		},
		showInfoSuccess: function() {
			showInfoSuccess();
		},
		resetInput: function(obj) {
			resetInput(obj);
		},
	};

}());