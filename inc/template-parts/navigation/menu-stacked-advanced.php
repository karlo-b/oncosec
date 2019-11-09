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

<div class="xt-visible-large xt-menu-stacked-advanced<?php echo esc_attr( xt_menu_alignment() ); ?>">

	<div class="xt-menu-stacked-advanced-wrapper">

		<div class="xt-container xt-container-center">

			<div class="xt-1-4">

			<?php get_template_part( 'inc/template-parts/logo/logo' ); ?>

			</div>

			<div class="xt-3-4">
				<?php echo do_shortcode( get_theme_mod( 'menu_stacked_wysiwyg' ) ); ?>
			</div>

		</div>

	</div>

	<?php do_action( 'xt_before_main_menu' ); ?>

	<nav id="navigation" class="xt-container xt-container-center xt-nav-wrapper" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="<?php _e( 'Site Navigation', 'xt-framework' ); ?>">

		<?php do_action( 'xt_main_menu_open' ); ?>

		<?php do_action( 'xt_main_menu' ); ?>

		<?php do_action( 'xt_main_menu_close' ); ?>

	</nav>

	<?php do_action( 'xt_after_main_menu' ); ?>

</div>
