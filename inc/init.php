<?php
/**
 * Init
 *
 * All files are being called from here.
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Is Premium
function xt_is_premium() {
	return function_exists( 'xt_premium' ) ? true : false;
}

// Backwards Compatibility
require_once( XT_THEME_DIR . '/inc/backwards-compatibility.php' );

// Options
require_once( XT_THEME_DIR . '/inc/options.php' );

// Kirki Framework
require_once( XT_THEME_DIR . '/assets/kirki/kirki.php' );

// Kirki Options
require_once( XT_THEME_DIR . '/inc/customizer/xt-kirki.php' );

// Body Classes
require_once( XT_THEME_DIR . '/inc/body-classes.php' );

require_once( XT_THEME_DIR . '/inc/custom-fonts.php' );
// Breadcrumbs
if ( !function_exists( 'breadcrumb_trail' ) ) {
	require_once( XT_THEME_DIR . '/inc/breadcrumbs.php' );
}

// Helpers
require_once( XT_THEME_DIR . '/inc/helpers.php' );

// Comments
require_once( XT_THEME_DIR . '/inc/comments.php' );

// Misc
require_once( XT_THEME_DIR . '/inc/misc.php' );

// Gutenberg
require_once( XT_THEME_DIR . '/inc/integration/gutenberg/gutenberg.php' );

// Customizer
require_once( XT_THEME_DIR . '/inc/customizer/customizer-functions.php' );

// WpBAkery
require_once( XT_THEME_DIR . '/inc/wpbakery.php' );

// Theme Mods
require_once( XT_THEME_DIR . '/inc/theme-mods.php' );

// Header Footer Elementor
if( !function_exists( 'xt_header_footer_elementor_support' ) ) { // backwards compatibility check as this was earlier included in Premium. Will be removed at some point.
	require_once( XT_THEME_DIR . '/inc/integration/header-footer-elementor.php' );
}

// Easy Digital Downloads
if( class_exists( 'Easy_Digital_Downloads' ) ) {
	require_once( XT_THEME_DIR . '/inc/integration/edd/edd.php' );
}

// WooCommerce
if( class_exists( 'WooCommerce' ) ) {
	require_once( XT_THEME_DIR . '/inc/integration/woocommerce/woocommerce.php' );
}

/**
 * Pre Header
 */
function xt_do_pre_header() {
	get_template_part( 'inc/template-parts/pre-header' );
}
add_action( 'xt_pre_header', 'xt_do_pre_header' );

/**
 * Header
 */
function xt_do_header() {
	get_template_part( 'inc/template-parts/header' );
}
add_action( 'xt_header', 'xt_do_header' );

/**
 * Footer
 */
function xt_do_footer() {
	get_template_part( 'inc/template-parts/footer' );
}
add_action( 'xt_footer', 'xt_do_footer' );

/**
 * 404 Page
 */
function xt_do_404() {
	get_template_part( 'inc/template-parts/404' );
}
add_action( 'xt_404', 'xt_do_404' );
