( function( $ ) {

	/* Layout */

	// Page Boxed Margin
	wp.customize( 'page_boxed_margin', function( value ) {
		value.bind( function( newval ) {
			$('.xt-page').css('margin-top', newval + 'px' ).css('margin-bottom', newval + 'px' );
		} );
	} );

	// Page Boxed Padding
	wp.customize( 'page_boxed_padding', function( value ) {
		value.bind( function( newval ) {
			$('.xt-container').css('padding-left', newval + 'px' ).css('padding-right', newval + 'px' );
		} );
	} );

	// Page Boxed Background Color
	wp.customize( 'page_boxed_background', function( value ) {
		value.bind( function( newval ) {
			$('.xt-page').css('background-color', newval );
		} );
	} );

	// ScrollTop Background Color
	wp.customize( 'scrolltop_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.scrolltop').css('background', newval );
		} );
	} );

	// ScrollTop Background Color
	wp.customize( 'scrolltop_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.scrolltop').css('border-radius', newval + 'px' );
		} );
	} );

	/* Menu */

	// Font Size
	wp.customize( 'menu_font_size', function( value ) {
		value.bind( function( newval ) {
			var suffix = '';
			if( $.isNumeric( newval ) ) {
				suffix = 'px';
			};
			$('.xt-menu a, .xt-mobile-menu a').css('font-size', newval + suffix );
		} );
	} );

	/* Sub Menu */

	// Background Color
	wp.customize( 'sub_menu_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-sub-menu > .menu-item-has-children:not(.xt-mega-menu) .sub-menu li, .xt-sub-menu > .xt-mega-menu > .sub-menu').css('background-color', newval );
		} );
	} );

	// Font Color
	wp.customize( 'sub_menu_accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-menu .sub-menu a').css('color', newval );
		} );
	} );

	// Font Size
	wp.customize( 'sub_menu_font_size', function( value ) {
		value.bind( function( newval ) {
			var suffix = '';
			if( $.isNumeric( newval ) ) {
				suffix = 'px';
			};
			$('.xt-menu .sub-menu a').css('font-size', newval + suffix );
		} );
	} );

	/* Mobile Navigation */

	// Hamburger Size
	wp.customize( 'mobile_menu_hamburger_size', function( value ) {
		value.bind( function( newval ) {
			$('.xt-mobile-nav-item').css('font-size', newval + 'px' );
		} );
	} );

	// Hamburger Border Radius (Filled)
	wp.customize( 'mobile_menu_hamburger_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.xt-mobile-nav-item').css('border-radius', newval + 'px' );
		} );
	} );

	/* Logo */

	// Logo Container Width
	wp.customize( 'menu_logo_container_width', function( value ) {
		value.bind( function( newval ) {
			var calculation = 100-newval;
			$('.xt-navigation .xt-1-4').css('width', newval + '%' );
			$('.xt-navigation .xt-3-4').css('width', calculation + '%' );
		} );
	} );

	// Logo Container Width
	wp.customize( 'mobile_menu_logo_container_width', function( value ) {
		value.bind( function( newval ) {
			var calculation = 100-newval;
			$('.xt-navigation .xt-2-3').css('width', newval + '%' );
			$('.xt-navigation .xt-1-3').css('width', calculation + '%' );
		} );
	} );

	/* Tagline */

	// tagline color
	wp.customize( 'menu_logo_description_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-tagline').css('color', newval );
		} );
	} );

	// tagline font size
	wp.customize( 'menu_logo_description_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.xt-tagline').css('font-size', newval );
		} );
	} );

	/* Navigation */

	/* Mobile Menu */
	wp.customize( 'mobile_menu_height', function( value ) {
		value.bind( function( newval ) {
			$('.xt-mobile-nav-wrapper').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px' );
		} );
	} );

	wp.customize( 'mobile_menu_submenu_arrow_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-submenu-toggle').css('color', newval );
		} );
	} );

	/* Pre Header */

	wp.customize( 'pre_header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('#xt-pre-header').css('background-color', newval );
		} );
	} );

	wp.customize( 'pre_header_height', function( value ) {
		value.bind( function( newval ) {
			$('.xt-inner-pre-header').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px' );
		} );
	} );

	wp.customize( 'pre_header_font_color', function( value ) {
		value.bind( function( newval ) {
			$('#xt-pre-header').css('color', newval );
		} );
	} );

	/* Blog – Pagination */
	wp.customize( 'blog_pagination_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers').css('border-radius', newval + 'px' );
		} );
	} );

	wp.customize( 'blog_pagination_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers:not(.current)').css('background', newval );
		} );
	} );

	wp.customize( 'blog_pagination_background_color_active', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers.current').css('background', newval );
		} );
	} );

	wp.customize( 'blog_pagination_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers:not(.current)').css('color', newval );
		} );
	} );

	wp.customize( 'blog_pagination_font_color_active', function( value ) {
		value.bind( function( newval ) {
			$('.pagination .page-numbers.current').css('color', newval );
		} );
	} );

	wp.customize( 'blog_pagination_font_size', function( value ) {
		value.bind( function( newval ) {
			var suffix = '';
			if( $.isNumeric( newval ) ) {
				suffix = 'px';
			};
			$('.pagination .page-numbers').css('font-size', newval + suffix );
		} );
	} );

	/* Blog – Single */
	wp.customize( 'single_custom_width', function( value ) {
		value.bind( function( newval ) {
			$('.single #inner-content').css('max-width', newval );
		} );
	} );

	/* Sidebar */

	wp.customize( 'sidebar_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-sidebar .widget, .elementor-widget-sidebar .widget').css('background-color', newval );
		} );
	} );

	wp.customize( 'sidebar_width', function( value ) {
		value.bind( function( newval ) {
			$('.xt-sidebar-wrapper').css('width', newval + '%' );
			$('.xt-main').css('width', 100 - newval + '%' );
		} );
	} );

	/* Buttons */

	wp.customize( 'button_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.xt-button, input[type="submit"]').css('border-radius', newval + 'px' );
		} );
	} );

	wp.customize( 'button_border_width', function( value ) {
		value.bind( function( newval ) {
			$('.xt-button, input[type="submit"]').css('border-width', newval + 'px' ).css('border-type', 'solid' );
		} );
	} );

	wp.customize( 'button_border_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-button, input[type="submit"]').css('border-color', newval );
		} );
	} );

	/* Breadcrumbs */
	wp.customize( 'breadcrumbs_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-breadcrumbs-container').css('background', newval );
		} );
	} );

	wp.customize( 'breadcrumbs_alignment', function( value ) {
		value.bind( function( newval ) {
			$('.xt-breadcrumbs-container').css('text-align', newval );
		} );
	} );

	wp.customize( 'breadcrumbs_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-breadcrumbs').css('color', newval );
		} );
	} );

	wp.customize( 'breadcrumbs_accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-breadcrumbs a').css('color', newval );
		} );
	} );

	/* WooCommerce */

	/* Defaults */

	// Buttons
	wp.customize( 'button_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce a.button, .woocommerce button.button').css('border-radius', newval + 'px' );
		} );
	} );

	// Custom Width
	wp.customize( 'woocommerce_loop_custom_width', function( value ) {
		value.bind( function( newval ) {
			$('.archive.woocommerce #inner-content').css('max-width', newval );
		} );
	} );

	/* Loop */

	// Image Alignment (List)
	wp.customize( 'woocommerce_loop_image_alignment', function( value ) {
		value.bind( function( newval ) {
			if( newval == 'left' ) {
				$('.xt-woo-list-view .xt-woo-loop-thumbnail-wrapper').css('float', 'left' );
				$('.xt-woo-list-view .xt-woo-loop-summary').css('float', 'right' );
			} else {
				$('.xt-woo-list-view .xt-woo-loop-thumbnail-wrapper').css('float', 'right' );
				$('.xt-woo-list-view .xt-woo-loop-summary').css('float', 'left' );
			}
		} );
	} );

	// Image Width
	wp.customize( 'woocommerce_loop_image_width', function( value ) {
		value.bind( function( newval ) {
			$('.xt-woo-list-view .xt-woo-loop-thumbnail-wrapper').css('width', newval-2 + '%');
			$('.xt-woo-list-view .xt-woo-loop-summary').css('width', 98-newval + '%');
		} );
	} );

	// Loop Title Font Size
	wp.customize( 'woocommerce_loop_title_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product h3, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product .woocommerce-loop-category__title').css('font-size', newval );
		} );
	} );

	// Loop Title Font Color
	wp.customize( 'woocommerce_loop_title_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product h3, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product .woocommerce-loop-category__title').css('color', newval );
		} );
	} );

	// Loop Price Font Size
	wp.customize( 'woocommerce_loop_price_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .price').css('font-size', newval );
		} );
	} );

	// Loop Price Font Color
	wp.customize( 'woocommerce_loop_price_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .price').css('color', newval );
		} );
	} );

	// Loop Out of Stock Font Size
	wp.customize( 'woocommerce_loop_out_of_stock_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .xt-woo-loop-out-of-stock').css('font-size', newval );
		} );
	} );

	// Loop Out of Stock Font Color
	wp.customize( 'woocommerce_loop_out_of_stock_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .xt-woo-loop-out-of-stock').css('color', newval );
		} );
	} );

	// Loop Out of Stock Background Color
	wp.customize( 'woocommerce_loop_out_of_stock_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce ul.products li.product .xt-woo-loop-out-of-stock').css('background-color', newval );
		} );
	} );

	// Loop Out of Stock Font Size
	wp.customize( 'woocommerce_loop_sale_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce span.onsale').css('font-size', newval );
		} );
	} );

	// Loop Badge Color
	wp.customize( 'woocommerce_loop_sale_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce span.onsale').css('color', newval );
		} );
	} );

	// Loop Badge Background Color
	wp.customize( 'woocommerce_loop_sale_background_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce span.onsale').css('background-color', newval );
		} );
	} );

	/* Single */

	wp.customize( 'woocommerce_single_custom_width', function( value ) {
		value.bind( function( newval ) {
			$('.single.woocommerce #inner-content').css('max-width', newval );
		} );
	} );

	// Image Alignment
	wp.customize( 'woocommerce_single_alignment', function( value ) {
		value.bind( function( newval ) {
			if( newval == 'right' ) {
				$('.woocommerce div.product div.summary, .woocommerce #content div.product div.summary, .woocommerce-page div.product div.summary, .woocommerce-page #content div.product div.summary').css('float', 'left' );
				$('.woocommerce div.product div.images, .woocommerce #content div.product div.images, .woocommerce-page div.product div.images, .woocommerce-page #content div.product div.images').css('float', 'right' );
				$('.single-product.woocommerce span.onsale').css('display', 'none' );
			} else {
				$('.woocommerce div.product div.summary, .woocommerce #content div.product div.summary, .woocommerce-page div.product div.summary, .woocommerce-page #content div.product div.summary').css('float', 'right' );
				$('.woocommerce div.product div.images, .woocommerce #content div.product div.images, .woocommerce-page div.product div.images, .woocommerce-page #content div.product div.images').css('float', 'left' );
				$('.single-product.woocommerce span.onsale').css('display', 'block' );
			}
		} );
	} );

	// Image Width
	wp.customize( 'woocommerce_single_image_width', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce div.product div.images, .woocommerce #content div.product div.images, .woocommerce-page div.product div.images, .woocommerce-page #content div.product div.images').css('width', newval-2 + '%' );
			$('.woocommerce div.product div.summary, .woocommerce #content div.product div.summary, .woocommerce-page div.product div.summary, .woocommerce-page #content div.product div.summary').css('width', 98 - newval + '%' );
		} );
	} );

	// Single Price Font Size
	wp.customize( 'woocommerce_single_price_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce div.product span.price, .woocommerce div.product p.price').css('font-size', newval );
		} );
	} );

	// Single Price Font Color
	wp.customize( 'woocommerce_single_price_color', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce div.product span.price, .woocommerce div.product p.price').css('color', newval );
		} );
	} );

	// Single Tabs Font Size
	wp.customize( 'woocommerce_single_tabs_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.woocommerce div.product .woocommerce-tabs ul.tabs li a').css('font-size', newval );
		} );
	} );

	/* Footer */

	// Width
	wp.customize( 'footer_width', function( value ) {
		value.bind( function( newval ) {
			$('.xt-inner-footer').css('max-width', newval );
		} );
	} );

	// Height
	wp.customize( 'footer_height', function( value ) {
		value.bind( function( newval ) {
			$('.xt-inner-footer').css('padding-top', newval + 'px' ).css('padding-bottom', newval + 'px' );
		} );
	} );

	// Background Color
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-page-footer').css('background-color', newval );
		} );
	} );

	// Color
	wp.customize( 'footer_font_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-page-footer').css('color', newval );
		} );
	} );

	// Color
	wp.customize( 'footer_accent_color', function( value ) {
		value.bind( function( newval ) {
			$('.xt-page-footer a').css('color', newval );
		} );
	} );

	wp.customize( 'footer_font_size', function( value ) {
		value.bind( function( newval ) {
			$('.xt-inner-footer').css('font-size', newval );
		} );
	} );

	/* Easy Digital Downloads */

	/* Defaults */

	// Buttons
	wp.customize( 'button_border_radius', function( value ) {
		value.bind( function( newval ) {
			$('.edd-submit.button').css('border-radius', newval + 'px' );
		} );
	} );

} )( jQuery );
