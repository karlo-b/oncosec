<?php
/**
 * Mobile Menu - Default
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="xt-mobile-menu-default xt-hidden-large">

	<div class="xt-mobile-nav-wrapper xt-container">

		<div class="xt-mobile-logo-container">

			<?php get_template_part( 'inc/template-parts/logo/logo-mobile' ); ?>

		</div>

		<div class="xt-menu-toggle-container">

			<a id="xt-mobile-menu-toggle" href="javascript:void(0)" class="xt-mobile-menu-toggle xt-button xt-button-full" aria-label="<?php _e( 'Site Navigation', 'xt-framework' ); ?>" aria-controls="navigation" aria-expanded="false" aria-haspopup="true" role="button">
				<?php echo apply_filters( 'xt_mobile_menu_text', __( 'Menu', 'xt-framework' ) ); // WPCS: XSS ok. ?>
			</a>

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

	</div>

</div>
