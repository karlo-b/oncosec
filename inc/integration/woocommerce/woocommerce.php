<?php
/**
 * WooCommerce Integration
 *
 * @package XT Framework
 * @subpackage Integration/WooCommerce
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Change WooCommerce Inline Styles Location
 */
function xt_woo_change_inline_style_location( $location ) {

	$location = xt_is_premium() ? 'xt-premium-woocommerce' : 'xt-woocommerce';

	return $location;

}
add_filter( 'xt_add_inline_style', 'xt_woo_change_inline_style_location' );

/**
 * Theme Setup
 */
function xt_woo_theme_setup() {

	// WooCommerce
	add_theme_support( 'woocommerce', array(
		'gallery_thumbnail_image_width' => 300,
		'single_image_width' => 800,
	) );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'xt_woo_theme_setup' );

// Remove Default WooCommerce Styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Scripts & Styles
 */
function xt_woo_scripts() {

	// WooCommerce Layout
	wp_enqueue_style( 'xt-woocommerce-layout', get_template_directory_uri() . '/css/min/woocommerce-layout-min.css', '', XT_VERSION );

	// WooCommerce
	wp_enqueue_style( 'xt-woocommerce', get_template_directory_uri() . '/css/min/woocommerce-min.css', '', XT_VERSION );

	// WooCommerce Smallscreen
	wp_enqueue_style( 'xt-woocommerce-smallscreen', get_template_directory_uri() . '/css/min/woocommerce-smallscreen-min.css', '', XT_VERSION );

}
add_action( 'wp_enqueue_scripts', 'xt_woo_scripts', 10 );

// WooCommerce Customizer Settings
require_once( XT_THEME_DIR . '/inc/integration/woocommerce/xt-kirki-woocommerce.php' );

// WooCommerce Functions
require_once( XT_THEME_DIR . '/inc/integration/woocommerce/woocommerce-functions.php' );

// WooCommerce Customizer Styles
require_once( XT_THEME_DIR . '/inc/integration/woocommerce/woocommerce-styles.php' );
