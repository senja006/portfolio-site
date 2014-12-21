var addProject = (function() {

	var $form = $('#add-project__form');
	var sendingProcess = false;
	var files = null;
	var $data = {};

	function addEventListeners() {
		$form.on('submit', controlAddProject);
		$form.find('input[type=file]').on('change', prepareUpload);
	};

	function controlAddProject() {
		if(sendingProcess) return false;
		validationForm.checkRequired($form);
		if($form.find('.ui-state-error').length) {
			return false;
		}
		addFile();
		// addProject();
		return false;
	};

	function addProject() {
		// sendingProcess = true;
		// validationForm.disableButton();
		var data = $form.serialize();
		$.ajax({
			url: 'add-project.php',
			type: 'POST',
			dataType: 'html',
			data: data,
			success: function(response) {
				var response = getObj(response);
				if(response['project_status'] === 'true') {
            		validationForm.showInfoSuccess();
            		updateWorkList();
            	}else{
            		validationForm.showInfoError();
            	}
				sendingProcess = false;
				validationForm.unDisableButton();
			},
			error: function(response) {
				validationForm.showInfoError();
				sendingProcess = false;
				validationForm.unDisableButton();
			},
		});
	};

	function addFile() {
		sendingProcess = true;
		validationForm.disableButton();
		var data = new FormData();
		$.each(files, function(key, value) {
			data.append(key, value);
		});
        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(response) {
            	if(response['file_status'] === 'true') {
            		addProject();
            	}else{
            		// validationForm.showInfoError();
            		$data['.input__file-name'] = 'reset';
            		validationForm.resetInput($data);
            		sendingProcess = false;
					validationForm.unDisableButton();
            	}
            },
            error: function() {
            	validationForm.showInfoError();
            	sendingProcess = false;
				validationForm.unDisableButton();
            	console.log('ошибка загрузки');	
            },
        });
        return false;
	};

	function prepareUpload(event) {
		files = event.target.files;
	};

	function getObj(json) {
		var obj = JSON.parse(json);
		return obj;
	};

	function updateWorkList() {
		$.ajax({
			url: 'work-list.php',
			type: 'POST',
			dataType: 'html',
			data: '',
			success: function(response) {
				addNewWorkList(response);
				setTimeout(function() {
					$form.trigger('reset');
				}, 1000);
				
			},
			error: function(response) {
				console.log('ошибка вывода работ');
			},
		});
	};

	function addNewWorkList(response) {
		setTimeout(function() {
			var $container = $('.work__ul');
			$container.empty().append(response);
		}, 1000);
	};

	return {
		init: function() {
			if($('.work__add').length) {
				addEventListeners();
			};
		},
	};

}());