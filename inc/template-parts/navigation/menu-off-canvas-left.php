<?php
/**
 * Off Canvas Menu Left
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="xt-container xt-container-center xt-visible-large xt-nav-wrapper xt-menu-left">

	<div class="xt-grid xt-grid-collapse">

		<div class="xt-3-4 xt-menu-container">

			<div class="xt-menu-toggle-container">

				<?php do_action( 'xt_before_menu_toggle' ); ?>

				<button id="xt-menu-toggle" class="xt-nav-item xt-menu-toggle xtf xtf-hamburger" aria-label="<?php _e( 'Site Navigation', 'xt-framework' ); ?>" aria-controls="navigation" aria-expanded="false" aria-haspopup="true">
					<span class="screen-reader-text"><?php _e( 'Menu Toggle', 'xt-framework' ); ?></span>
				</button>

				<?php do_action( 'xt_after_menu_toggle' ); ?>

			</div>

		</div>

		<div class="xt-1-4 xt-logo-container">

			<?php get_template_part( 'inc/template-parts/logo/logo' ); ?>

		</div>

	</div>

</div>

<!-- Off Canvas Menu -->

<div class="xt-menu-off-canvas xt-menu-off-canvas-left xt-visible-large">

	<?php do_action( 'xt_before_main_menu' ); ?>

	<nav id="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-labelledby="xt-menu-toggle">

		<?php do_action( 'xt_main_menu_open' ); ?>

		<?php do_action( 'xt_main_menu' ); ?>

		<?php do_action( 'xt_main_menu_close' ); ?>

	</nav>

	<?php do_action( 'xt_after_main_menu' ); ?>

	<i class="xt-close xtf xtf-times" aria-hidden="true"></i>

</div>

<?php if( get_theme_mod( 'menu_overlay' ) ) echo '<div class="xt-menu-overlay"></div>'; ?>
