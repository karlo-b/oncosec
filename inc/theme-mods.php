<?php
/**
 * Theme Mods
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Excerpt Length
 */
function xt_excerpt_length( $excerpt_length ) {

	$xt_excerpt_length = get_theme_mod( 'excerpt_lenght' );

	if( !$xt_excerpt_length || $xt_excerpt_length == 0 ) return $excerpt_length;

	$excerpt_length = $xt_excerpt_length;

	return $excerpt_length;

}
add_filter( 'excerpt_length', 'xt_excerpt_length', 999 );

/**
 * Filter 404 Page Title
 */
function xt_custom_404_title( $title ) {

	$custom_title = get_theme_mod( '404_headline' );

	if( $custom_title ) {
		$title = $custom_title;
	}

	return $title;

}
add_filter( 'xt_404_headline', 'xt_custom_404_title' );

/**
 * Filter 404 Page Text
 */
function xt_custom_404_text( $text ) {

	$custom_text = get_theme_mod( '404_text' );

	if( $custom_text ) {
		$text = $custom_text;
	}

	return $text;

}
add_filter( 'xt_404_text', 'xt_custom_404_text' );

/**
 * Hide Search Form from 404 Page
 */
function xt_remove_404_search_form() {

    if( is_404() && get_theme_mod( '404_search_form' ) == 'hide' ) {

        add_filter( 'get_search_form', '__return_false' );

    }

}
add_action( 'wp', 'xt_remove_404_search_form' );

/**
 * Search Menu Item
 *
 * Construct Search Menu Item to be displayed inside the main menu and navigation header.
 */
function xt_search_menu_item( $is_navigation = true, $is_mobile = false ) {

	$class = $is_mobile ? 'xt-mobile-nav-item' : 'xt-nav-item';

	// if we have a shop, we're going to call the product search form
	if ( class_exists( 'WooCommerce' ) && get_theme_mod( 'woocommerce_search_menu_item' ) ) {
		$search_form = get_product_search_form( $echo = false );
	} else {
		$search_form = get_search_form( $echo = false );
	}

	$search_form = apply_filters( 'xt_search_menu_item_form', $search_form );

	// initialize $search_item
	$search_item = '';

	// we have a slightly different markup for the search menu item if it's being displayed outside the main menu
	$search_item .= $is_navigation ? '<li class="menu-item xt-menu-item-search" aria-haspopup="true" aria-expanded="false"><a href="javascript:void(0)" role="button">' : '<button class="'. $class .' xt-menu-item-search" aria-haspopup="true" aria-expanded="false">';
	$search_item .= '<span class="screen-reader-text">'. __( 'Search Toggle', 'xt-framework' ) .'</span>';
	$search_item .= '<div class="xt-menu-search">';
	$search_item .= $search_form;
	$search_item .= '</div>';
	$search_item .= '<i class="xtf xtf-search" aria-hidden="true"></i>';
	$search_item .= $is_navigation ? '</a></li>' : '</button>';

	return $search_item;

}

/**
 * Search Menu Item
 *
 * Adding the Search Menu Item to the main navigation
 */
function xt_search_menu_icon( $items, $args ) {

	// stop here, if we have an off-canvas menu
	if( xt_is_off_canvas_menu() ) return $items;

	// only add the Search Menu Item to the main navigation and if it's enabled
	if( $args->theme_location == 'main_menu' && get_theme_mod( 'menu_search_icon' ) ) {

		$items .= xt_search_menu_item();

	}

	return $items;

}
add_filter( 'wp_nav_menu_items','xt_search_menu_icon', 20, 2 );

/**
 * Search Menu Item
 *
 * Adding the Search Menu Item to the mobile navigation header
 */
function xt_search_menu_icon_mobile() {

	// stop here if Search Menu Item is turned off for mobiles
	if( !get_theme_mod( 'mobile_menu_search_icon' ) ) return;

	$menu_item = xt_search_menu_item( $is_navigation = false, $is_mobile = true );

	echo $menu_item; // WPCS: XSS ok.

}
add_action( 'xt_before_mobile_toggle', 'xt_search_menu_icon_mobile', 20 );

/**
 * Custom Breadcrumbs Separator
 */
function xt_breadcrumbs_custom_separator( $separator ) {

	$custom_separator = get_theme_mod( 'breadcrumbs_separator' );

	if( $custom_separator ) {
		$separator = $custom_separator;
	}

	return $separator;

}
add_filter( 'xt_breadcrumbs_separator', 'xt_breadcrumbs_custom_separator' );

/**
 * Next Post Link
 */
function xt_next_post_link( $next ) {

	if( get_theme_mod( 'single_post_nav' ) !== 'default' ) return $next;

	$next = '%title &rarr;';

	return $next;

}
add_filter( 'xt_next_post_link', 'xt_next_post_link' );

/**
 * Previous Post Link
 */
function xt_previous_post_link( $prev ) {

	if( get_theme_mod( 'single_post_nav' ) !== 'default' ) return $prev;

	$prev = '&larr; %title';

	return $prev;

}
add_filter( 'xt_previous_post_link', 'xt_previous_post_link' );

/**
 * Categories Title
 */
function xt_categories_title( $title ) {

	$cat_title = get_theme_mod( 'blog_categories_title' );

	if( $cat_title && $cat_title !== 'Filed under:' ) {

		$title = $cat_title;

	}

	return $title;

}
add_filter( 'xt_categories_title', 'xt_categories_title' );

/**
 * Read More Text
 */
function xt_read_more_text( $text ) {

	$read_more_text = get_theme_mod( 'blog_read_more_text' );

	if( $read_more_text && $read_more_text !== 'Read more' ) {

		$text = $read_more_text;

	}

	return $text;

}
add_filter( 'xt_read_more_text', 'xt_read_more_text' );

/**
 * Aritlce Meta Separator
 */
 function xt_article_meta_separator( $separator ) {

	$blog_meta_separator = get_theme_mod( 'blog_meta_separator' );

	if( $blog_meta_separator ) {
		$separator = ' ' . $blog_meta_separator. ' ';
	}

	return $separator;

}
add_filter( 'xt_article_meta_separator', 'xt_article_meta_separator' );




/**
 * Call to Action Button
 */
function xt_cta_menu_item( $items, $args ) {

	// stop here if we're on a off canvas menu
	if( xt_is_off_canvas_menu() ) return $items;

	if( $args->theme_location === 'main_menu'  && get_theme_mod( 'cta_button' ) ) {

		// Vars
		$button_target = '';
		$button_text   = get_theme_mod( 'cta_button_text' ) ? get_theme_mod( 'cta_button_text' ) : __( 'Call to Action', 'xtpremium' );
		$button_link   = get_theme_mod( 'cta_button_url' ) ? get_theme_mod( 'cta_button_url' ) : '#';

		if( get_theme_mod( 'cta_button_target' ) ) {
			$button_target = ' target="_blank"';
		}

		// CTA Button
		$cta_button = '<li class="menu-item xt-cta-menu-item">';
		$cta_button .= '<a'. $button_target .' href="'. esc_url( $button_link ) .'">'. esc_html( $button_text ) .'</a>';
		$cta_button .= '</li>';

		$items .= $cta_button;

	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'xt_cta_menu_item', apply_filters( 'xt_cta_menu_item_priority', 50 ), 2 );


/**
 * Head Scripts
 */
function xt_custom_head_scripts_823932() {

	$head_scripts = get_theme_mod( 'head_scripts' );

	if ( $head_scripts ) {

		echo $head_scripts;

	}

}
add_action( 'wp_head', 'xt_custom_head_scripts_823932' );

/**
 * Header Scripts
 */
function xt_custom_header_scripts_103802138() {

	$header_scripts = get_theme_mod( 'header_scripts' );

	if ( $header_scripts ) {

		echo $header_scripts;

	}

}
add_action( 'xt_body_open', 'xt_custom_header_scripts_103802138' );

/**
 * Footer Scripts
 */
function xt_custom_footer_scripts_0848420() {

	$footer_scripts = get_theme_mod( 'footer_scripts' );

	if ( $footer_scripts ) {

		echo $footer_scripts;

	}

}
add_action( 'wp_footer', 'xt_custom_footer_scripts_0848420' );

/**
 * Off Canvas Search
 */
function xt_search_menu_icon_off_canvas() {

	if( !get_theme_mod( 'menu_search_icon' ) ) return;

	if( !xt_is_off_canvas_menu() || get_theme_mod( 'menu_position' ) == 'menu-off-canvas-left' ) return;

	$menu_item = xt_search_menu_item( $in_navigation = false, $is_mobile = false );

	echo $menu_item; // WPCS: XSS ok.

}
add_action( 'xt_before_menu_toggle', 'xt_search_menu_icon_off_canvas' );

/**
 * Add Pre Header to Sticky Navigation
 */
function xt_pre_header_sticky() {

	if ( get_theme_mod( 'pre_header_sticky' ) ) {

		remove_action( 'xt_pre_header', 'xt_do_pre_header' );
		add_action( 'xt_before_main_navigation', 'xt_do_pre_header' );

	}

}
add_action( 'wp', 'xt_pre_header_sticky' );


/**
 * Custom Footer
 */
function xt_custom_footer() {

	$custom_footer = get_theme_mod( 'footer_custom' );

	if ( $custom_footer ) {

		echo '<div class="xt-footer-wrap">'.do_shortcode( $custom_footer ).'</div>';

	}

}
add_action( 'xt_before_footer', 'xt_custom_footer' );
