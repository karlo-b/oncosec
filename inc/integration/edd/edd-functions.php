<?php
/**
 * EDD Functions
 *
 * @package XT Framework
 * @subpackage Integration/EDD
 */

/**
 * Helpers
 */
function xt_is_edd_single() {

	if( is_singular( 'download' ) ) {
		return true;
	} else {
		return false;
	}

}

function xt_is_edd_archive() {

	if( is_post_type_archive( 'download' ) || is_tax( 'download_category' ) || is_tax( 'download_tag' ) ) {
		return true;
	} else {
		return false;
	}

}

function xt_is_edd_page() {

	if ( is_singular( 'download' ) || is_post_type_archive( 'download' ) || is_tax( 'download_category' ) || is_tax( 'download_tag' ) || edd_is_checkout() || edd_is_success_page() || edd_is_failed_transaction_page() || edd_is_purchase_history_page() ) {
		return true;
	} else {
		return false;
	}

}

/**
 * Register Sidebars
 */
function xt_edd_sidebar() {

	// Shop Page Sidebar
	register_sidebar( array(
		'id'			=> 'xt-edd-sidebar',
		'name'			=> __( 'Easy Digital Downloads Sidebar', 'xt-framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="xt-widgettitle">',
		'after_title'	=> '</h4>',
		'description'	=> __( 'This Sidebar is being displayed on EDD Archive Pages.', 'xt-framework' ),
	) );

	// Product Page Sidebar
	register_sidebar( array(
		'id'			=> 'xt-edd-product-sidebar',
		'name'			=> __( 'Easy Digital Downloads Product Page Sidebar', 'xt-framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'	=> '<h4 class="xt-widgettitle">',
		'after_title'	=> '</h4>',
		'description'	=> __( 'This Sidebar is being displayed on EDD Product Pages.', 'xt-framework' ),
	) );

}
add_action( 'widgets_init', 'xt_edd_sidebar' );

/**
 * Apply Sidebars
 */
function xt_edd_sidebars( $sidebar ) {

		if( xt_is_edd_archive() ) {

			$sidebar = 'xt-edd-sidebar';

		} elseif( xt_is_edd_single() ) {

			$sidebar ='xt-edd-product-sidebar';

		}

	return $sidebar;

}
add_filter( 'xt_do_sidebar', 'xt_edd_sidebars' );

/**
 * Filter Sidebar Layout
 */
function xt_edd_sidebar_layout( $sidebar ) {

	if( xt_is_edd_single() ) {

		$edd_single_sidebar_layout = get_theme_mod( 'edd_single_sidebar_layout', 'global' );

		if( $edd_single_sidebar_layout !== 'global' ) {
			$sidebar = $edd_single_sidebar_layout;
		}
	}

	if( xt_is_edd_archive() ) {

		$edd_sidebar_layout = get_theme_mod( 'edd_sidebar_layout', 'global' );

		if( $edd_sidebar_layout !== 'global' ) {
			$sidebar = $edd_sidebar_layout;
		}
	}

	return $sidebar;

}
add_filter( 'xt_sidebar_layout', 'xt_edd_sidebar_layout' );

/**
 * Cart Menu Item
 */
function xt_edd_menu_item() {

	// vars
	$icon			= get_theme_mod( 'edd_menu_item_icon', 'cart' );
	$css_classes	= apply_filters( 'xt_edd_menu_item_classes', 'menu-item xt-edd-menu-item' );
	$title			= apply_filters( 'xt_edd_menu_item_title', __( 'Shopping Cart', 'xt-framework' ) );
	$cart_count		= edd_get_cart_quantity();
	$cart_url		= edd_get_checkout_uri();

	// construct menu item
	$menu_item = '';

	$menu_item .= '<li class="'. esc_attr( $css_classes ) .'">';

		$menu_item .= '<a href="' . esc_url( $cart_url ) . '" title="'. esc_attr( $title ) .'">';

			$menu_item .= '<span class="screen-reader-text">'. __( 'Shopping Cart', 'xt-framework' ) .'</span>';

			$menu_item .= apply_filters( 'xt_edd_before_menu_item', '' );

			$menu_item .= '<i class="xtf xtf-'. esc_attr( $icon ) .'"></i>';
			if( get_theme_mod( 'edd_menu_item_count' ) !== 'hide' ) {
				$menu_item .= '<span class="xt-edd-menu-item-count">' . wp_kses_data( $cart_count ) . '<span class="screen-reader-text">'. __( 'Items in Cart', 'xt-framework' ) .'</span></span>';
			}

			$menu_item .= apply_filters( 'xt_edd_after_menu_item', '' );

		$menu_item .= '</a>';

		$menu_item .= apply_filters( 'xt_edd_menu_item_dropdown', '' );

	$menu_item .= '</li>';

	return $menu_item;

}

/**
 * Add Cart Menu Item to Main Navigation
 */
function xt_edd_menu_icon( $items, $args ) {

	// stop right here if menu item is hidden
	if( get_theme_mod( 'edd_menu_item_desktop' ) == 'hide' ) return $items;

	// hide if we're on non-EDD pages
	if( get_theme_mod( 'edd_menu_item_hide_if_not_edd' ) && !xt_is_edd_page() ) return $items;

	// stop here if we're on a off canvas menu
	if( xt_is_off_canvas_menu() ) return $items;

	if ( $args->theme_location === 'main_menu' ) {

		$items .= xt_edd_menu_item();
	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'xt_edd_menu_icon', 10, 2 );

/**
 * Add Cart Menu Item to Mobile Menu Toggle
 */
function xt_edd_menu_icon_mobile() {

	// hide if mobile EDD menu item is disabled
	if( get_theme_mod( 'edd_menu_item_mobile' ) == 'hide' ) return;

	// hide if we're on non-EDD pages
	if( get_theme_mod( 'edd_menu_item_hide_if_not_edd' ) && !xt_is_edd_page() ) return;

	$menu_item = '<ul class="xt-mobile-nav-item">';
	$menu_item .= xt_edd_menu_item();
	$menu_item .= '</ul>';

	echo $menu_item; // WPCS: XSS ok.

}
add_action( 'xt_before_mobile_toggle', 'xt_edd_menu_icon_mobile' );

/**
 * EDD Ajax
 */
function xt_edd_ajax() {

    wp_enqueue_script( 'xt-edd-ajax', get_template_directory_uri() . '/assets/edd/js/edd-ajax.js', array(  'jquery' ), '', true );

	wp_localize_script(
		'xt-edd-ajax',
		'xt_edd_fragments',
		array(
			'ajaxurl'	=> function_exists( 'edd_get_ajax_url' ) ? edd_get_ajax_url() : admin_url( 'admin-ajax.php' ),
			'nonce'		=> wp_create_nonce( 'edd_ajax_nonce' )
		)
	);

}
add_action( 'wp_enqueue_scripts', 'xt_edd_ajax' );

function xt_edd_fragments() {

	check_ajax_referer( 'edd_ajax_nonce', 'security' );

	$menu_item = xt_edd_menu_item();
	echo $menu_item; // WPCS: XSS ok.
	die();

}
add_action( 'wp_ajax_xt_edd_fragments', 'xt_edd_fragments' );
add_action( 'wp_ajax_nopriv_xt_edd_fragments', 'xt_edd_fragments' );
