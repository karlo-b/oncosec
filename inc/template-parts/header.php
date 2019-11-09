<?php
/**
 * Header
 *
 * Construct the Theme Header
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

		<header id="header" class="xt-page-header" itemscope="itemscope" itemtype="https://schema.org/WPHeader">

			<?php do_action( 'xt_header_open' ); ?>

			<?php do_action( 'xt_pre_header' ); ?>

			<!-- Navigation -->
			<div class="xt-navigation<?php if ( function_exists( 'xt_transparent_header' ) ) xt_transparent_header(); ?>" <?php xt_navigation_attributes() ?> <?php if ( function_exists( 'xt_sticky_navigation' ) ) xt_sticky_navigation(); ?>>

				<?php do_action( 'xt_before_main_navigation' ); ?>

				<!-- Main Navigation -->
				<?php get_template_part( 'inc/template-parts/navigation/' . xt_menu() ); ?>

				<!-- Mobile Navigation -->
				<?php get_template_part( 'inc/template-parts/navigation/' . xt_mobile_menu() ); ?>

				<?php do_action( 'xt_after_main_navigation' ); ?>

			</div>

			<?php do_action( 'xt_header_close' ); ?>

		</header>
