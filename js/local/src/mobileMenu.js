var mobileMenu = (function() {

	var $link = $('.menu__mobile-a');

	function addEventListeners() {
		$('.menu__mobile-a').on('click', controlShowMenu);
		$('body').on('click', closeMenu);
	};

	function controlShowMenu() {
		if($link.parents('.is-visible').length) {
			$(this).parents('.is-visible').removeClass('is-visible');
		}else{
			$(this).parents('.menu__mobile').addClass('is-visible');
		}
		return false;
	};

	function closeMenu(ev) {
		if($(ev.target).closest('.menu__mobile').length) return;
		$link.click();
	};

	return {
		init: function() {
			if($('.navicon').length) {
				addEventListeners();
			};
		},
	};

}());