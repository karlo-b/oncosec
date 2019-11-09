(function($) {

	/**
	 * Mobile Toggle
	 */
	function MobileToggle() {

		var mobileToggle = $('.xt-mobile-menu-toggle');

		if(mobileToggle.hasClass("active")) {
			$('.xt-mobile-menu-container').removeClass('active').slideUp();
			mobileToggle.removeClass("active").removeClass('xtf-times').addClass('xtf-hamburger').attr( 'aria-expanded', 'false' );
		} else {
			$('.xt-mobile-menu-container').addClass('active').slideDown();
			mobileToggle.addClass("active").removeClass('xtf-hamburger').addClass('xtf-times').attr( 'aria-expanded', 'true' );
			$(window).trigger('resize');
		}

	}

	function mobileToggleClose() {

		var mobileToggle = $('.xt-mobile-menu-toggle');

		if(mobileToggle.hasClass("active")) {
			$('.xt-mobile-menu-container').removeClass('active').slideUp();
			mobileToggle.removeClass("active").removeClass('xtf-times').addClass('xtf-hamburger').attr( 'aria-expanded', 'false' );
		}

	}

	$('.xt-mobile-menu-toggle').click(function() {
		MobileToggle();
	});

	// close mobile menu on anchor link clicks
	// only if menu item doesn't have submenus
	$('.xt-mobile-menu a').click(function() {

		var attribute  = $(this).attr('href');
		var HasSubMenu = $(this).parent().hasClass('menu-item-has-children');

		if((attribute.match("^#") || attribute.match("^/#")) && HasSubMenu == false ) {
			MobileToggle();
		}

	});

	/**
	 * Desktop Breakpoint
	 *
	 * Retrieve Desktop Breakpoint from Body Class
	 */
	var DesktopBreakpointClass = $('body').attr("class").match(/xt-desktop-breakpoint-[\w-]*\b/);

	if( DesktopBreakpointClass !== null ) {
		var string = DesktopBreakpointClass.toString();
		var DesktopBreakpoint = string.match(/\d+/);
	} else {
		var DesktopBreakpoint = '1024';
	}

	/**
	 * Resize Fallback
	 *
	 * Hide open mobile menu on window resize
	 */
	$(window).resize(function() {

		// vars
		var windowHeight           = $(window).height();
		var windowWidth            = $('body').innerWidth();
		var mobileNavWrapperHeight = $('.xt-mobile-nav-wrapper').outerHeight();

		$('.xt-mobile-menu-container.active nav').css({'max-height' : windowHeight - mobileNavWrapperHeight });

		if(windowWidth > DesktopBreakpoint) {
			mobileToggleClose();
			if($('.xt-mobile-mega-menu').length) {
				$('.xt-mobile-mega-menu').removeClass('xt-mobile-mega-menu').addClass('xt-mega-menu');
			}
		} else {
			if($('.xt-mega-menu').length) {
				$('.xt-mega-menu').removeClass('xt-mega-menu').addClass('xt-mobile-mega-menu');
			}
		}

	});

	/**
	 * Submenu Toggle Arrow
	 */
	function SubMenuMobileToggle(that) {

		if($(that).hasClass("active")) {
			$('i', that).removeClass('xtf-arrow-up').addClass('xtf-arrow-down');
			$(that).removeClass('active').attr( 'aria-expanded', 'false' ).siblings('.sub-menu').slideUp();
		} else {
			$('i', that).removeClass('xtf-arrow-down').addClass('xtf-arrow-up');
			$(that).addClass('active').attr( 'aria-expanded', 'true' ).siblings('.sub-menu').slideDown();
		}

	}

	$('.xt-mobile-menu-hamburger .xt-submenu-toggle').click(function(event) {
		event.preventDefault();
		SubMenuMobileToggle(this);
	});

	function SubMenuToggleOnEmtyLink(that) {

		var toggle = $(that).siblings('.xt-submenu-toggle');

		if(toggle.hasClass("active")) {
			$('i', toggle).removeClass('xtf-arrow-up').addClass('xtf-arrow-down');
			toggle.removeClass('active').attr( 'aria-expanded', 'false' ).siblings('.sub-menu').slideUp();
		} else {
			$('i', toggle).removeClass('xtf-arrow-down').addClass('xtf-arrow-up');
			toggle.addClass('active').attr( 'aria-expanded', 'true' ).siblings('.sub-menu').slideDown();
		}

	}

	$('.xt-mobile-menu a').click(function() {

		var attribute  = $(this).attr('href');
		var HasSubMenu = $(this).parent().hasClass('menu-item-has-children');

		if((attribute.match("^#") || attribute.match("^/#")) && HasSubMenu == true ) {
			SubMenuToggleOnEmtyLink(this);
		}
	});

})( jQuery );
