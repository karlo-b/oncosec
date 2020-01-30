<?php
/**
 * Logo Mobile
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// vars
$menu_alt_tag    = get_theme_mod( 'menu_logo_alt', get_bloginfo( 'name' ) );
$menu_title_tag  = get_theme_mod( 'menu_logo_title', get_bloginfo( 'name' ) );
$menu_logo_url   = get_theme_mod( 'menu_logo_url', home_url() );
$custom_logo_id  = get_theme_mod( 'custom_logo' );
$custom_logo_url = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$custom_logo_url = apply_filters( 'xt_logo_mobile', $custom_logo_url[0] );
$tagline         = get_bloginfo( 'description' );
$tagline_toggle  = get_theme_mod( 'menu_logo_description_mobile' );


$mobile_logo_url    =  get_theme_mod( 'mobile_logo' );

if($mobile_logo_url  ){
	echo '<div class="xt-mobile-logo"'. esc_html( $menu_active_logo ) .' itemscope="itemscope" itemtype="https://schema.org/Organization">';
	echo '<a class="xt-remove-font-size" href="'. get_home_url( null, '/' ).'" itemprop="url">';
	echo '<img src="'. $mobile_logo_url .'" alt="'.esc_html( get_bloginfo( 'name' ) ).' " title="'. esc_attr(get_bloginfo( 'name' ) ) .'" itemprop="logo" />';
	echo '</a>';
	echo '</div>';
}


