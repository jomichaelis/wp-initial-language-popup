(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	function getCookie(name) {
		const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
		if (match) {
			return match[2];
		}
		return null;
	}

	function setCookie(name, value, days) {
		const expires = new Date();
		expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
		document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
	}
	
	$( window ).load(function() {
		if (!getCookie('ilpopup_shown')) {
			$('#ilpopupPopup').show();
		}
		
		$('#ilp-button-easy').click(function() {
			setCookie('ilpopup_shown', 'true', 365);
			var path = window.location.pathname;
			if (!path.startsWith("/de_ls")) {
				window.location.replace("/de_ls" + path);
			} else {
				$('#ilpopupPopup').hide();
			}
		});

		$('#ilp-button-normal').click(function() {
			$('#ilpopupPopup').hide();
			setCookie('ilpopup_shown', 'true', 365);
		});
	});

})( jQuery );
