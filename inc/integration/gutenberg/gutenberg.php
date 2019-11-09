<?php
/**
 * Gutenberg Integration
 *
 * @package XT Framework
 * @subpackage Integration/Gutenberg
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Theme Setup
 */
function xt_gutenberg_theme_setup() {

	// add Support for Gutenberg Wide Aligned Elements
	add_theme_support( 'align-wide' );

	// Gutenberg Default Font Sizes
	add_theme_support( 'editor-font-sizes', array(

		array(
			'name'		=> __( 'tiny', 'xt-framework' ),
			'shortName'	=> __( 'XS', 'xt-framework' ),
			'size'		=> 12,
			'slug'		=> 'tiny'
		),

		array(
			'name'		=> __( 'small', 'xt-framework' ),
			'shortName'	=> __( 'S', 'xt-framework' ),
			'size'		=> 14,
			'slug'		=> 'small'
		),

		array(
			'name'		=> __( 'regular', 'xt-framework' ),
			'shortName'	=> __( 'M', 'xt-framework' ),
			'size'		=> 16,
			'slug'		=> 'regular'
		),

		array(
			'name'		=> __( 'large', 'xt-framework' ),
			'shortName'	=> __( 'L', 'xt-framework' ),
			'size'		=> 20,
			'slug'		=> 'large'
		),

		array(
			'name'		=> __( 'larger', 'xt-framework' ),
			'shortName'	=> __( 'XL', 'xt-framework' ),
			'size'		=> 32,
			'slug'		=> 'larger'
		),

		array(
			'name'		=> __( 'extra', 'xt-framework' ),
			'shortName'	=> __( 'XXL', 'xt-framework' ),
			'size'		=> 44,
			'slug'		=> 'extra'
		)

	) );

}
add_action( 'after_setup_theme', 'xt_gutenberg_theme_setup' );

/**
 * Generate CSS
 */
function xt_generate_gutenberg_css() {

	ob_start();
	include_once( XT_THEME_DIR . '/inc/integration/gutenberg/gutenberg-styles.php' );
	return xt_minify_css( ob_get_clean() );

}

/**
 * Editor Styles
 */
function xt_gutenberg_block_editor_assets() {

	$inline_styles = xt_generate_gutenberg_css();
	wp_enqueue_style( 'xt-gutenberg-style', get_template_directory_uri() . '/css/block-editor-styles.css', '', XT_VERSION );
	wp_add_inline_style( 'xt-gutenberg-style', $inline_styles );

}
add_action( 'enqueue_block_editor_assets', 'xt_gutenberg_block_editor_assets' );
