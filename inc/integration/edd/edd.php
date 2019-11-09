<?php
/**
 * Easy Digital Downloads Integration
 *
 * @package XT Framework
 * @subpackage Integration/EDD
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Scripts & Styles
 */
function xt_edd_scripts() {

	wp_dequeue_style( 'edd-styles' );
	wp_deregister_style( 'edd-styles' );

	if( class_exists( 'EDD_Software_Licensing' ) ) {

		wp_dequeue_style( 'edd-sl-styles' );
		wp_deregister_style( 'edd-sl-styles' );

	}

	// EDD Default Style
	wp_enqueue_style( 'xt-edd', get_template_directory_uri() . '/css/min/edd-min.css', '', XT_VERSION );

}
add_action( 'wp_enqueue_scripts', 'xt_edd_scripts', 10 );

// EDD Customizer Settings
require_once( XT_THEME_DIR . '/inc/integration/edd/xt-kirki-edd.php' );

// EDD Functions
require_once( XT_THEME_DIR . '/inc/integration/edd/edd-functions.php' );

// EDD Customizer Styles
require_once( XT_THEME_DIR . '/inc/integration/edd/edd-styles.php' );
