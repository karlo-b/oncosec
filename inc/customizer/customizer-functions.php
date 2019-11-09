<?php
/**
 * Customizer Functions
 *
 * @package XT Framework
 * @subpackage Customizer
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Adjust Customizer Preview Responsive Sizes
 */
function xt_adjust_customizer_responsive_sizes() {

	// vars
	$medium_breakpoint = function_exists( 'xt_breakpoint_medium' ) ? xt_breakpoint_medium() : 768;
	$mobile_breakpoint = function_exists( 'xt_breakpoint_mobile' ) ? xt_breakpoint_mobile() : 480;

	$tablet_margin_left = -$medium_breakpoint/2 . 'px';
	$tablet_width = $medium_breakpoint . 'px';

	$mobile_margin_left = -$mobile_breakpoint/2 . 'px';
	$mobile_width = $mobile_breakpoint . 'px';

	?>

	<style>
		.wp-customizer .preview-tablet .wp-full-overlay-main {
			margin-left: <?php echo esc_attr( $tablet_margin_left ); ?>;
			width: <?php echo esc_attr( $tablet_width ); ?>;
		}
		.wp-customizer .preview-mobile .wp-full-overlay-main {
			margin-left: <?php echo esc_attr( $mobile_margin_left ); ?>;
			width: <?php echo esc_attr( $mobile_width ); ?>;
			height: 680px;
		}
	</style>

	<?php

}
add_action( 'customize_controls_print_styles', 'xt_adjust_customizer_responsive_sizes' );

/**
 * Minify CSS
 *
 * Function that's being used to minify Custom CSS
 */
function xt_minify_css( $css ) {

	// Remove Comments
	$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
	// Remove space after colons
	$css = str_replace( ': ', ':', $css );
	$css = str_replace( ' {', '{', $css );
	$css = str_replace( ', ', ',', $css );
	// Remove whitespace
	$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );

	return $css;

}

/**
 * Generate Customizer CSS
 */
function xt_generate_css() {

	ob_start();
	include( get_template_directory() . '/inc/customizer/styles.php' );
	return xt_minify_css( ob_get_clean() );

}

/**
 * Create xt-customizer-styles.css file
 */
function xt_create_customizer_css_file() {

	if( apply_filters( 'xt_css_output', 'inline' ) !== 'file' ) return;

	$css = xt_generate_css();

	require_once( ABSPATH . 'wp-admin/includes/file.php' );

	global $wp_filesystem;

	$upload_dir = wp_upload_dir();
	$dir        = trailingslashit( $upload_dir['basedir'] ) . 'xt-framework/';

	WP_Filesystem();

	// create xt-customizer-styles.css file if it doesn't exist.
	if( !file_exists( $upload_dir['basedir'] .'/xt-framework/xt-customizer-styles.css' ) ) {

		$wp_filesystem->mkdir( $dir );
		$wp_filesystem->put_contents( $dir . 'xt-customizer-styles.css', $css, 0644 );

	} else {

		// override the file only if changes have been made to the customizer.
		// I'm not sure yet if it's better to override the file regardless or do this check.
		if( $css !== $wp_filesystem->get_contents( $dir . 'xt-customizer-styles.css' ) ) {

			$wp_filesystem->put_contents( $dir . 'xt-customizer-styles.css', $css, 0644 );

		}

	}

}
add_action( 'wp_loaded', 'xt_create_customizer_css_file' );

/**
 * Enqueue Customizer CSS
 */
function xt_customizer_frontend_scripts() {

	$css_output = apply_filters( 'xt_css_output', 'inline' );

	if( $css_output === 'inline' ) {

		$inline_styles = xt_generate_css();
		wp_add_inline_style( apply_filters( 'xt_add_inline_style', 'xt-style' ), $inline_styles );

	} elseif( $css_output === 'file' ) {

		$upload_dir = wp_upload_dir();

		if( file_exists( $upload_dir['basedir'] .'/xt-framework/xt-customizer-styles.css' ) ) {

			wp_enqueue_style( 'xt-customizer', $upload_dir['baseurl'] .'/xt-framework/xt-customizer-styles.css', '', XT_VERSION );

		}

	}

}
add_action( 'wp_enqueue_scripts', 'xt_customizer_frontend_scripts', 11 );

/**
 * Customizer CSS Live Preview
 */
function xt_customizer_preview_css() {

	if( !is_customize_preview() ) return;

	echo '<style type="text/css">';
	require( get_template_directory() . '/inc/customizer/styles.php' );
	echo '</style>';

}
add_action( 'wp_head', 'xt_customizer_preview_css', 999 );

/**
 * Post Message
 */
function xt_customizer_preview_js() {

	wp_enqueue_script( 'xt-postmessage', get_template_directory_uri() . '/inc/customizer/js/postmessage.js', array(  'jquery', 'customize-preview' ), '', true );

}
add_action( 'customize_preview_init' , 'xt_customizer_preview_js' );

/**
 * Scripts & Styles
 */
function xt_customizer_scripts_styles() {

	wp_enqueue_script( 'xt-customizer', get_template_directory_uri() . '/inc/customizer/js/xt-customizer.js', array( 'jquery' ), false, true );
	wp_enqueue_style( 'xt-customizer', get_template_directory_uri() . '/inc/customizer/css/xt-customizer.css' );

}
add_action( 'customize_controls_print_styles' , 'xt_customizer_scripts_styles' );

// Custom Controls
require( get_template_directory() . '/inc/customizer/custom-controls.php' );


/**
 * Premium Add-On Menu Variations
 */
add_filter( 'xt_menu_position', function( $choices ) {

	$choices['menu-stacked-advanced'] = esc_attr__( 'Stacked (advanced)', 'xt-framework' );
	$choices['menu-off-canvas']       = esc_attr__( 'Off Canvas (right)', 'xt-framework' );
	$choices['menu-off-canvas-left']  = esc_attr__( 'Off Canvas (left)', 'xt-framework' );
	$choices['menu-full-screen']      = esc_attr__( 'Full Screen', 'xt-framework' );
	$choices['menu-elementor']        = esc_attr__( 'Custom Menu', 'xt-framework' );

	return $choices;

});

/**
 * Premium Add-On Mobile Menu Variations
 */
add_filter( 'xt_mobile_menu_options', function( $choices ) {

	$choices['menu-mobile-off-canvas'] = esc_attr__( 'Off Canvas', 'xt-framework' );
	$choices['menu-mobile-elementor']  = esc_attr__( 'Custom Menu', 'xt-framework' );

	return $choices;

});

/**
 * Allow Font Uploads
 */
function xt_add_custom_upload_mimes( $mime_types ) {

	$mime_types['otf']   = 'application/x-font-otf';
	$mime_types['woff']  = 'application/x-font-woff';
	$mime_types['woff2'] = 'application/x-font-woff2';
	$mime_types['ttf']   = 'application/x-font-ttf';
	$mime_types['svg']   = 'image/svg+xml';
	$mime_types['eot']   = 'application/vnd.ms-fontobject';

	return $mime_types;

}
add_filter( 'upload_mimes', 'xt_add_custom_upload_mimes', 0 );
