var mobileClasses = (function() {

	var $html = $('html');

	function addEventListeners() {
		$(window).on('resize', addClassPage);
	};

	function addClassPage() {
		var windowWidth = $(window).width();
		$html.removeClass('is-phone').removeClass('is-tablet');
		if(windowWidth < 960) {
			$html.addClass('is-tablet');
		}
		if(windowWidth < 768) {
			$html.addClass('is-phone');
		}
		
	};

	return {
		init: function() {
			addEventListeners();
			addClassPage();
		},
	};

}());