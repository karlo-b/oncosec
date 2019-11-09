<?php
/**
 * Mobile Menu - Off Canvas
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="xt-mobile-menu-off-canvas xt-hidden-large">

	<div class="xt-mobile-nav-wrapper xt-container">

		<div class="xt-mobile-logo-container xt-2-3">

			<?php get_template_part( 'inc/template-parts/logo/logo-mobile' ); ?>

		</div>

		<div class="xt-menu-toggle-container xt-1-3">

			<?php do_action( 'xt_before_mobile_toggle' ); ?>

			<button id="xt-mobile-menu-toggle" class="xt-mobile-nav-item xt-mobile-menu-toggle xtf xtf-hamburger" aria-label="<?php _e( 'Site Navigation', 'xt-framework' ); ?>" aria-controls="navigation" aria-expanded="false" aria-haspopup="true">
				<span class="screen-reader-text"><?php _e( 'Menu Toggle', 'xt-framework' ); ?></span>
			</button>

			<?php do_action( 'xt_after_mobile_toggle' ); ?>

		</div>

	</div>

	<div class="xt-mobile-menu-container">

		<nav id="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-labelledby="xt-mobile-menu-toggle">

			<?php wp_nav_menu(array(
				'theme_location'	=>		'mobile_menu',
				'container'			=>		false,
				'menu_class'		=>		'xt-mobile-menu',
				'depth'				=>		4,
				'fallback_cb'		=>		'xt_mobile_menu_fallback'
			)); ?>

		</nav>

		<i class="xt-close xtf xtf-times" aria-hidden="true"></i>

	</div>

</div>

<?php if( get_theme_mod( 'mobile_menu_overlay' ) ) echo '<div class="xt-mobile-menu-overlay"></div>'; ?>
