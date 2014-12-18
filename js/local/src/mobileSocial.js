var mobileSocial = (function() {

	var $social = $('.social');

	function addEventListeners() {
		$(window).on('resize', setOptionsSocial);
	};

	function setOptionsSocial() {
		var windowWidth = $(window).width();
		if(windowWidth < 960) {
			$social.addClass('soc--mobile');
		}else{
			$social.removeClass('soc--mobile');
		}
	};

	return {
		init: function() {
			addEventListeners();
			setOptionsSocial();
		},
	};

}());