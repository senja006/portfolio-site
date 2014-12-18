var pageSize = (function() {

	var heightFooter = null;

	function addEventListeners() {
		$(window).on('resize', controlSetPaddingPage);
	};

	function controlSetPaddingPage() {
		getHeightFooter();
		setPaddingPage();
	};

	function getHeightFooter() {
		heightFooter = $('.footer').outerHeight();
	};

	function setPaddingPage() {
		$('.page').css('padding-bottom', heightFooter);
	};

	return {
		init: function() {
			if($('.footer').length) {
				controlSetPaddingPage();
				addEventListeners();
			};
		},
	};

}());