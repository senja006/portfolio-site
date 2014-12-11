var popup = (function() {

	function addEventListeners() {
		$('.open-popup').on('click', openPopup);
		$('.popup').on('click', '.close', closePopup);
	};

	function openPopup(ev) {
		var $thisLink = $(this);
		var currentPopup = $thisLink.attr('href');
		var $currentPopup = $(currentPopup);
		$currentPopup.addClass('is-visible');
		return false;
	};

	function closePopup() {
		var $this = $(this);
		var $popup = $this.parents('.popup');
		$popup.removeClass('is-visible');
		validationForm.hideAllTooltip();
		validationForm.hideFormInfo();
		return false;
	};

	return {
		init: function() {
			if($('.popup').length) {
				addEventListeners();
			};
		},
	};

}());