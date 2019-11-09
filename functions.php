<?php
/**
 * Theme Functions
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Constants
 */
define( 'XT_THEME_DIR', get_template_directory() );
define( 'XT_THEME_URI', get_template_directory_uri() );
define( 'XT_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'XT_CHILD_THEME_URI', get_stylesheet_directory_uri() );
define( 'XT_VERSION', wp_get_theme( 'xt-framework' )->get('Version') );
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
	add_theme_support( 'custom-logo',
		array(
			'width'       => 180,
			'height'      => 48,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Custom Background
	add_theme_support( 'custom-background',
		array(
			'default-color'          => 'ffffff',
			'default-image'          => '',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => 'scroll',
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
	register_nav_menus( array(
		'main_menu'             => __( 'Main Menu', 'xt-framework' ),
		'mobile_menu'           => __( 'Mobile Menu', 'xt-framework' ),
		'pre_header_menu'       => __( 'Pre Header Left', 'xt-framework' ),
		'pre_header_menu_right'	=> __( 'Pre Header Right', 'xt-framework' ),
		'footer_menu'           => __( 'Footer Left', 'xt-framework' ),
		'footer_menu_right'     => __( 'Footer Right', 'xt-framework' )
	) );

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

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'xt-framework' ),
		'id'            => 'sidebar-1',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="xt-widgettitle">',
		'after_title'   => '</h4>'
	) );
	register_sidebar( array(
		'name'          => __( 'Post Brands Row', 'xt-framework' ),
		'id'            => 'single-brands-row',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="xt-widgettitle">',
		'after_title'   => '</h4>'
	) );

}
add_action( 'widgets_init', 'xt_sidebars' );

/**
 * Scripts & Styles
 */
function xt_scripts() {

	// site.js
	wp_enqueue_script( 'xt-slick', get_template_directory_uri() . '/js/min/slick-min.js', array( 'jquery' ), XT_VERSION, true );
	wp_enqueue_script( 'xt-site', get_template_directory_uri() . '/js/min/site-min.js', array( 'jquery' ), XT_VERSION, true );
	wp_enqueue_script( 'xt-aniimation', get_template_directory_uri() . '/js/min/jquery-css3-animation-queue-min.js', array( 'jquery' ), XT_VERSION, true );

	// mobile menu js
	if( ! get_theme_mod( 'mobile_menu_options' ) || get_theme_mod( 'mobile_menu_options' ) == 'menu-mobile-hamburger' ) {

		// hamburger
		wp_enqueue_script( 'xt-mobile-menu-hamburger', get_template_directory_uri() . '/js/min/mobile-hamburger-min.js', array( 'jquery', 'xt-site' ), XT_VERSION, true );

	} elseif( get_theme_mod( 'mobile_menu_options' ) == 'menu-mobile-default' ) {

		// default
		wp_enqueue_script( 'xt-mobile-menu-default', get_template_directory_uri() . '/js/min/mobile-default-min.js', array( 'jquery', 'xt-site' ), XT_VERSION, true );

	}

	// style.css
	wp_enqueue_style( 'xt-style', get_template_directory_uri() . '/style.css', '', XT_VERSION );

	// responsive.css
	wp_enqueue_style( 'xt-responsive', get_template_directory_uri() . '/css/min/responsive-min.css', '', XT_VERSION );

	// comment reply
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	// rtl
	if ( is_rtl() ) {

		wp_enqueue_style( 'xt-rtl', get_template_directory_uri() . '/css/min/rtl-min.css', '', XT_VERSION );

	}

	if( in_array( get_theme_mod( 'menu_position' ), array( 'menu-off-canvas', 'menu-off-canvas-left' ) ) ) {

		// Off Canvas
		wp_enqueue_script( 'xt-menu-off-canvas', get_template_directory_uri(). '/js/min/off-canvas-min.js', array(
			'jquery',
			'xt-site'
		), XT_VERSION, true );

	}

	if( get_theme_mod( 'menu_position' ) == 'menu-full-screen' ) {

		// Full Screen
		wp_enqueue_script( 'xt-menu-full-screen', get_template_directory_uri(). '/js/min/full-screen-min.js', array(
			'jquery',
			'xt-site'
		), XT_VERSION, true );

	}

	if( get_theme_mod( 'mobile_menu_options' ) == 'menu-mobile-off-canvas' ) {

		// Full Screen Mobile
		wp_enqueue_script( 'xt-mobile-menu-off-canvas', get_template_directory_uri(). '/js/min/mobile-off-canvas-min.js', array(
			'jquery',
			'xt-site'
		), XT_VERSION, true );

	}

}
add_action( 'wp_enqueue_scripts', 'xt_scripts', 10 );

function xt_add_google_fonts() {

	wp_enqueue_style( 'xt-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,700&display=swap', false );
	}

	add_action( 'wp_enqueue_scripts', 'xt_add_google_fonts' );

// Init
require_once( XT_THEME_DIR . '/inc/init.php' );

function wpb_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/fav.jpg) !important;
background-size:100%;
background-position: center;
color:rgba(0, 0, 0, 0);
background-repeat: no-repeat;
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
  .menu-icon-xt-videos {
			background: #05a4ed!important;
			color:#fff !important;
	}
</style>
';
}
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
function remove_footer_admin () {
echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Development By: <a href="https://xstreamthemes.com/" target="_blank">XstreamThemes</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

add_action( 'login_head', 'namespace_login_style' );
/**
 * Replaces the login header logo
 */
function namespace_login_style() {
    echo '<style>.login h1 a { background-image: url( ' . get_template_directory_uri() . '/img/fav.jpg ) !important; }</style>';
}
// Videos Custom Post Type

// Register Custom Post Type Video
function create_video_cpt() {

	$labels = array(
		'name' => _x( 'Videos', 'Post Type General Name', 'xstream' ),
		'singular_name' => _x( 'Video', 'Post Type Singular Name', 'xstream' ),
		'menu_name' => _x( 'Videos', 'Admin Menu text', 'xstream' ),
		'name_admin_bar' => _x( 'Video', 'Add New on Toolbar', 'xstream' ),
		'archives' => __( 'Video Archives', 'xstream' ),
		'attributes' => __( 'Video Attributes', 'xstream' ),
		'parent_item_colon' => __( 'Parent Video:', 'xstream' ),
		'all_items' => __( 'All Videos', 'xstream' ),
		'add_new_item' => __( 'Add New Video', 'xstream' ),
		'add_new' => __( 'Add New', 'xstream' ),
		'new_item' => __( 'New Video', 'xstream' ),
		'edit_item' => __( 'Edit Video', 'xstream' ),
		'update_item' => __( 'Update Video', 'xstream' ),
		'view_item' => __( 'View Video', 'xstream' ),
		'view_items' => __( 'View Videos', 'xstream' ),
		'search_items' => __( 'Search Video', 'xstream' ),
		'not_found' => __( 'Not found', 'xstream' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'xstream' ),
		'featured_image' => __( 'Featured Image', 'xstream' ),
		'set_featured_image' => __( 'Set featured image', 'xstream' ),
		'remove_featured_image' => __( 'Remove featured image', 'xstream' ),
		'use_featured_image' => __( 'Use as featured image', 'xstream' ),
		'insert_into_item' => __( 'Insert into Video', 'xstream' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Video', 'xstream' ),
		'items_list' => __( 'Videos list', 'xstream' ),
		'items_list_navigation' => __( 'Videos list navigation', 'xstream' ),
		'filter_items_list' => __( 'Filter Videos list', 'xstream' ),
	);
	$args = array(
		'label' => __( 'Video', 'xstream' ),
		'description' => __( '', 'xstream' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-video-alt3',
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array('video-category'),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'xt-videos', $args );

}
add_action( 'init', 'create_video_cpt', 0 );

// Register Taxonomy Video Category
function create_videocategory_tax() {

	$labels = array(
		'name'              => _x( 'Video Categories', 'taxonomy general name', 'xstream' ),
		'singular_name'     => _x( 'Video Category', 'taxonomy singular name', 'xstream' ),
		'search_items'      => __( 'Search Video Categories', 'xstream' ),
		'all_items'         => __( 'All Video Categories', 'xstream' ),
		'parent_item'       => __( 'Parent Video Category', 'xstream' ),
		'parent_item_colon' => __( 'Parent Video Category:', 'xstream' ),
		'edit_item'         => __( 'Edit Video Category', 'xstream' ),
		'update_item'       => __( 'Update Video Category', 'xstream' ),
		'add_new_item'      => __( 'Add New Video Category', 'xstream' ),
		'new_item_name'     => __( 'New Video Category Name', 'xstream' ),
		'menu_name'         => __( 'Video Category', 'xstream' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'xstream' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'videocategory', array('xt-videos'), $args );

}
add_action( 'init', 'create_videocategory_tax' );

