<?php
/**
 * Misc
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main Navigation Fallback
 *
 * is displayed if no menu is selected and user is logged in + able to edit theme options
 */
function xt_main_menu_fallback() {

	if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) && is_customize_preview() ) {

		?>

		<ul class="xt-menu">
		<li class="menu-item">
		<a href="javascript:void(0)" onclick="parent.wp.customize.panel('nav_menus').focus()"><?php _e( 'Add Menu', 'xt-framework' ); // WPCS: XSS ok. ?></a>
		</li>
		</ul>

		<?php

	} elseif ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) {

		echo '<ul class="xt-menu">';
		echo '<li class="menu-item">';
		echo '<a href="' . esc_url( admin_url( '/nav-menus.php' ) ) . '">' . __( 'Add Menu', 'xt-framework' ) . '</a>'; // WPCS: XSS ok.
		echo '</li>';
		echo '</ul>';

	}

}

/**
 * Mobile Navigation Fallback
 *
 * is displayed if no menu is selected and user is logged in + able to edit theme options
 */
function xt_mobile_menu_fallback() {

	if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) && is_customize_preview() ) {

		?>

		<ul class="xt-mobile-menu">
		<li class="menu-item">
		<a href="javascript:void(0)" onclick="parent.wp.customize.panel('nav_menus').focus()"><?php _e( 'Add Menu', 'xt-framework' ); // WPCS: XSS ok. ?></a>
		</li>
		</ul>

		<?php

	} elseif ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) {

		echo '<ul class="xt-menu">';
		echo '<li class="menu-item">';
		echo '<a href="' . esc_url( admin_url( '/nav-menus.php' ) ) . '">' . __( 'Add Menu', 'xt-framework' ) . '</a>'; // WPCS: XSS ok.
		echo '</li>';
		echo '</ul>';

	}

}

/**
 * Navigation Fallback
 *
 * is displayed if no menu is selected and user is logged in + able to edit theme options
 */
function xt_menu_fallback() {

	if ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) && is_customize_preview() ) {

		?>

		<a href="javascript:void(0)" onclick="parent.wp.customize.panel('nav_menus').focus()"><?php _e( 'Add Menu', 'xt-framework' ); // WPCS: XSS ok. ?></a>

		<?php

	} elseif ( is_user_logged_in() && current_user_can( 'edit_theme_options' ) ) {

		echo '<a href="' . esc_url( admin_url( '/nav-menus.php' ) ) . '">' . __( 'Add Menu', 'xt-framework' ) . '</a>'; // WPCS: XSS ok.

	}

}

/**
 * Add description to main menu items
 */
function xt_menu_description( $item_output, $item, $depth, $args ) {

	if ( 'main_menu' == $args->theme_location && strlen( $item->description ) > 1 ) {

		$item_output .= '<div class="xt-menu-description">' . $item->description . '</div>';

	}

	return $item_output;

}
add_filter( 'walker_nav_menu_start_el', 'xt_menu_description', 10, 4 );

/**
 * Allow HTML inside menu descriptions
 */
remove_filter( 'nav_menu_description', 'strip_tags' );

function xt_menu_description_html( $menuItem ) {

	if ( isset( $menuItem->post_type ) && 'nav_menu_item' == $menuItem->post_type ) {

		$menuItem->description = apply_filters( 'nav_menu_description', $menuItem->post_content );

	}

	return $menuItem;

}
add_filter( 'wp_setup_nav_menu_item', 'xt_menu_description_html' );

/**
 * Remove kirki telemetry
 */
add_filter( 'kirki_telemetry', '__return_false' );
