<?php
/**
 * Menu Stacked
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="xt-container xt-container-center xt-visible-large xt-nav-wrapper xt-menu-stacked">

	<?php get_template_part( 'inc/template-parts/logo/logo' ); ?>

	<?php do_action( 'xt_before_main_menu' ); ?>

	<nav id="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php _e( 'Site Navigation', 'xt-framework' ); ?>">

		<?php do_action( 'xt_main_menu_open' ); ?>

		<?php do_action( 'xt_main_menu' ); ?>

		<?php do_action( 'xt_main_menu_close' ); ?>

	</nav>

	<?php do_action( 'xt_after_main_menu' ); ?>


</div>
