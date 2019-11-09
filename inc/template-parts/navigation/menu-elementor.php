<?php
/**
 * Custom Menu
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

echo '<div class="xt-menu-custom xt-visible-large">';

echo do_shortcode( get_theme_mod( 'menu_custom' ) );

echo '</div>';
