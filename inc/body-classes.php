<?php
/**
 * Body Classes
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Body Classes
 */
function xt_body_classes( $classes ) {

	// Add wpbf Body Class
	$classes[] = 'xt';

	// Add xt-{post-name} Body Class on Singular
	if( is_singular() ) {
		global $post;
		$classes[] = 'xt-' . $post->post_name;
	}

	// Sidebar Classes
	if( is_page() && !is_page_template( 'page-sidebar.php' ) ) {
		$classes[] = 'xt-no-sidebar';
	} else {
		$classes[] = xt_sidebar_layout() == 'none' ? 'xt-no-sidebar' : 'xt-sidebar-' . xt_sidebar_layout();
	}

	// Full Width Body Class
	$inner_content = xt_inner_content( $echo = false );

	if( !$inner_content ) {
		$classes[] = 'xt-full-width';
	}

	if( get_theme_mod( 'woocommerce_loop_layout' ) == 'list' ) {
		$classes[] = 'xt-woo-list-view';
	}

	return $classes;

}
add_filter( 'body_class', 'xt_body_classes' );

/**
 * Post Classes
 */
function xt_post_classes( $classes ) {

	// Add xt-post class to all Posts
	$classes[] = 'xt-post';

	return $classes;

}
add_filter( 'post_class', 'xt_post_classes' );
