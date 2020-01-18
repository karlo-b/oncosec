<?php
/**
 * Theme Functions
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Constants
 */
define( 'XT_THEME_DIR', get_template_directory() );
define( 'XT_THEME_URI', get_template_directory_uri() );
define( 'XT_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'XT_CHILD_THEME_URI', get_stylesheet_directory_uri() );
define( 'XT_VERSION', wp_get_theme( 'xt-framework' )->get( 'Version' ) );
define( 'XT_CHILD_VERSION', '1.1' );

add_action( 'after_setup_theme', 'thumb_theme_setup' );
function thumb_theme_setup() {
	add_image_size( 'video-thumb', 400, 225, true ); // (cropped)
}
/**
 * Theme Setup
 */
function xt_theme_setup() {

	// Textdomain
	load_theme_textdomain( 'xt-framework', get_template_directory() . '/languages' );

	// Custom Logo
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 180,
			'height'      => 48,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Custom Background
	add_theme_support(
		'custom-background',
		array(
			'default-color'      => 'ffffff',
			'default-image'      => '',
			'default-repeat'     => 'repeat',
			'default-position-x' => 'left',
			'default-position-y' => 'top',
			'default-size'       => 'auto',
			'default-attachment' => 'scroll',
		)
	);

	// Title Tag
	add_theme_support( 'title-tag' );

	// Editor Styles
	add_theme_support( 'editor-styles' );

	// Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// HTML5 Support
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'caption' ) );

	// Selective Refresh for Widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Nav Menu's
	register_nav_menus(
		array(
			'main_menu'             => __( 'Main Menu', 'xt-framework' ),
			'mobile_menu'           => __( 'Mobile Menu', 'xt-framework' ),
			'pre_header_menu'       => __( 'Pre Header Left', 'xt-framework' ),
			'pre_header_menu_right' => __( 'Pre Header Right', 'xt-framework' ),
			'footer_menu'           => __( 'Footer Left', 'xt-framework' ),
			'footer_menu_right'     => __( 'Footer Right', 'xt-framework' ),
		)
	);

}
add_action( 'after_setup_theme', 'xt_theme_setup' );

/**
 * Content Width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

/**
 * Sidebar
 */
function xt_sidebars() {

	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'xt-framework' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="xt-widgettitle">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Post Brands Row', 'xt-framework' ),
			'id'            => 'single-brands-row',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="xt-widgettitle">',
			'after_title'   => '</h4>',
		)
	);

}
add_action( 'widgets_init', 'xt_sidebars' );

/**
 * Scripts & Styles
 */
function xt_scripts() {

	wp_enqueue_script( 'xt-site', get_template_directory_uri() . '/js/min/site-min.js', array( 'jquery' ), XT_VERSION, true );
	// mobile menu js
	if ( ! get_theme_mod( 'mobile_menu_options' ) || get_theme_mod( 'mobile_menu_options' ) == 'menu-mobile-hamburger' ) {

		// hamburger
		wp_enqueue_script( 'xt-mobile-menu-hamburger', get_template_directory_uri() . '/js/min/mobile-hamburger-min.js', array( 'jquery', 'xt-site' ), XT_VERSION, true );

	} elseif ( get_theme_mod( 'mobile_menu_options' ) == 'menu-mobile-default' ) {

		// default
		wp_enqueue_script( 'xt-mobile-menu-default', get_template_directory_uri() . '/js/min/mobile-default-min.js', array( 'jquery', 'xt-site' ), XT_VERSION, true );

	}

	// style.css
	wp_enqueue_style( 'xt-style', get_template_directory_uri() . '/style.css', '', XT_VERSION );

	// responsive.css
	wp_enqueue_style( 'xt-responsive', get_template_directory_uri() . '/css/min/responsive-min.css', '', XT_VERSION );

	// comment reply
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// rtl
	if ( is_rtl() ) {

		wp_enqueue_style( 'xt-rtl', get_template_directory_uri() . '/css/min/rtl-min.css', '', XT_VERSION );

	}

	if ( in_array( get_theme_mod( 'menu_position' ), array( 'menu-off-canvas', 'menu-off-canvas-left' ) ) ) {

		// Off Canvas
		wp_enqueue_script(
			'xt-menu-off-canvas',
			get_template_directory_uri() . '/js/min/off-canvas-min.js',
			array(
				'jquery',
				'xt-site',
			),
			XT_VERSION,
			true
		);

	}

	if ( get_theme_mod( 'menu_position' ) == 'menu-full-screen' ) {

		// Full Screen
		wp_enqueue_script(
			'xt-menu-full-screen',
			get_template_directory_uri() . '/js/min/full-screen-min.js',
			array(
				'jquery',
				'xt-site',
			),
			XT_VERSION,
			true
		);

	}

	if ( get_theme_mod( 'mobile_menu_options' ) == 'menu-mobile-off-canvas' ) {

		// Full Screen Mobile
		wp_enqueue_script(
			'xt-mobile-menu-off-canvas',
			get_template_directory_uri() . '/js/min/mobile-off-canvas-min.js',
			array(
				'jquery',
				'xt-site',
			),
			XT_VERSION,
			true
		);

	}

}
add_action( 'wp_enqueue_scripts', 'xt_scripts', 10 );

function xt_add_google_fonts() {

	wp_enqueue_style( 'xt-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,700&display=swap', false );
}

	add_action( 'wp_enqueue_scripts', 'xt_add_google_fonts' );

// Init
require_once XT_THEME_DIR . '/inc/init.php';
