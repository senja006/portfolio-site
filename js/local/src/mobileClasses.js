var mobileClasses = (function() {

	var $html = $('html');

	function addEventListeners() {
		$(window).on('resize', addClassPage);
	};

	function addClassPage() {
		var windowWidth = $(window).width();
		if(windowWidth < 960) {
			$html.addClass('is-tablet');
		}else{
			$html.removeClass('is-tablet');
		}
	};

	return {
		init: function() {
			addEventListeners();
			addClassPage();
		},
	};

}());