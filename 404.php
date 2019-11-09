<?php
/**
 * 404 Page
 *
 * Displayed if a page couldn't be found.
 * See also inc/template-parts/404.php
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

get_header();

do_action( 'xt_404' );

get_footer();
