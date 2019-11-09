(function($) {

	/**
	 * Toggle
	 */
	function menuToggle() {

		if($('.xt-menu-off-canvas').hasClass("active")) {
			$('.xt-menu-toggle').removeClass("active").attr( 'aria-expanded', 'false' );
			$('.xt-menu-off-canvas').removeClass('active');
			$('body').removeClass('active');
			$('.xt-menu-overlay').stop().animate({opacity:'0'}, 300, function() {
				$(this).css({display:'none'});
			});
		} else {
			$('.xt-menu-off-canvas').attr( 'tabindex', '-1' ).focus();
			$('.xt-menu-toggle').addClass("active").attr( 'aria-expanded', 'true' );
			$('.xt-menu-off-canvas').addClass('active');
			$('body').addClass('active');
			$('.xt-menu-overlay').stop().css({display:'block'}).animate({opacity:'1'}, 300);
		}

	}

	function menuToggleClose() {

		if($('.xt-menu-off-canvas').hasClass("active")) {
			$('.xt-menu-toggle').removeClass("active").attr( 'aria-expanded', 'false' );
			$('.xt-menu-off-canvas').removeClass('active');
			$('body').removeClass('active');
			$('.xt-menu-overlay').stop().animate({opacity:'0'}, 300, function() {
				$(this).css({display:'none'});
			});
		}

	}

	$('.xt-menu-toggle').click(function() {
		menuToggle();
	});

	$('.xt-menu-off-canvas .xt-close').click(function() {
		menuToggle();
	});

	$(window).click(function() {
		menuToggleClose();
	});

	$(document).keyup(function(e) {
		if (e.keyCode === 27) {
			menuToggleClose();
		}
	});

	$('.xt-menu-off-canvas, .xt-menu-toggle').click(function(event){
		event.stopPropagation();
	});

	/**
	 * Sub Menu Toggle
	 */
	$('.xt-menu-off-canvas .xt-submenu-toggle').click(function(event) {

		event.preventDefault();

		if($(this).hasClass("active")) {
			$('i', this).removeClass('xtf-arrow-up').addClass('xtf-arrow-down');
			$(this).removeClass('active').attr( 'aria-expanded', 'false' ).siblings('.sub-menu').slideUp();
		} else {
			$('i', this).removeClass('xtf-arrow-down').addClass('xtf-arrow-up');
			$(this).addClass('active').attr( 'aria-expanded', 'true' ).siblings('.sub-menu').slideDown();
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
	 * Hide open menu on window resize
	 */
	$(window).resize(function(){

		var windowWidth = $(window).width();

		if(windowWidth < DesktopBreakpoint) {
			menuToggleClose();
		}

	});

})( jQuery );
