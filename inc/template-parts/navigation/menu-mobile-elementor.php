<?php
/**
 * Mobile Menu - Custom
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

echo '<div class="xt-mobile-menu-custom xt-hidden-large">';

echo do_shortcode( get_theme_mod( 'menu_custom' ) );

echo '</div>';
