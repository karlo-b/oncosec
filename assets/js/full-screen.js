(function($) {

	/**
	 * Full Screen Animation
	 */
	function menuToggle() {

		if( $('.xt-menu-full-screen').hasClass('active') ) {
			$('.xt-menu-toggle').removeClass("active").attr( 'aria-expanded', 'false' );
			$('.xt-menu-full-screen').removeClass('active');
			$('.xt-menu-full-screen').fadeOut(150);
		} else {
			$('.xt-menu-toggle').addClass("active").attr( 'aria-expanded', 'true' );
			$('.xt-menu-full-screen').addClass('active');
			$('.xt-menu-full-screen').fadeIn(150);
		}

	}

	function menuToggleClose() {

		if( $('.xt-menu-full-screen').hasClass('active') ) {
			$('.xt-menu-full-screen').removeClass('active');
			$('.xt-menu-full-screen').fadeOut(150);
		}

	}

	$('.xt-menu-toggle').click(function() {
		menuToggle();
	});

	$('.xt-menu-full-screen .xt-close').click(function() {
		menuToggleClose();
	});

	$(document).keyup(function(e) {
		if (e.keyCode === 27) {
			menuToggleClose();
		}
	});

})( jQuery );
