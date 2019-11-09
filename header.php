<?php
/**
 * Theme Header
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php xt_body_schema_markup(); ?>>
	<a class="screen-reader-text skip-link" href="#content" title="<?php echo esc_attr__( 'Skip to content', 'xt-framework' ); ?>"><?php _e( 'Skip to content', 'xt-framework' ); // WPCS: XSS ok. ?></a>

	<?php do_action( 'wp_body_open' ); ?>

	<?php do_action( 'xt_body_open' ); ?>

	<div id="container" class="hfeed xt-page">

		<?php do_action( 'xt_before_header' ); ?>

		<?php do_action('xt_header'); ?>

		<?php do_action( 'xt_after_header' ); ?>
