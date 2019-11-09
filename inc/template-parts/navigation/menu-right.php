<?php
/**
 * Menu Right
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="xt-container xt-container-center xt-visible-large xt-nav-wrapper xt-menu-right">

	<div class="xt-grid xt-grid-collapse">

		<div class="xt-1-4 xt-logo-container">

			<?php get_template_part( 'inc/template-parts/logo/logo' ); ?>

		</div>

		<div class="xt-3-4 xt-menu-container">

			<?php do_action( 'xt_before_main_menu' ); ?>

			<nav id="navigation" class="xt-clearfix" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php _e( 'Site Navigation', 'xt-framework' ); ?>">

				<?php do_action( 'xt_main_menu_open' ); ?>

				<?php do_action( 'xt_main_menu' ); ?>

				<?php do_action( 'xt_main_menu_close' ); ?>

			</nav>

			<?php do_action( 'xt_after_main_menu' ); ?>

		</div>

	</div>

</div>
