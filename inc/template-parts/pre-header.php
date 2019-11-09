<?php
/**
 * Pre Header
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// vars
$pre_header_layout            = get_theme_mod( 'pre_header_layout' );
$layout                       = $pre_header_layout == 'one' ? ' xt-pre-header-one-column' : ' xt-pre-header-two-columns';
$inner_layout                 = $pre_header_layout == 'one' ? 'xt-inner-pre-header-content' : 'xt-inner-pre-header-left';
$pre_header_hook_open         = $pre_header_layout == 'one' ? 'xt_pre_header_open' : 'xt_pre_header_left_open';
$pre_header_hook_close        = $pre_header_layout == 'one' ? 'xt_pre_header_close' : 'xt_pre_header_left_close';
$pre_header_column_one        = get_theme_mod( 'pre_header_column_one', __( 'Column 1', 'xt-framework' ) );
$pre_header_column_two        = get_theme_mod( 'pre_header_column_two', __( 'Column 2', 'xt-framework' ) );
$pre_header_column_one_layout = get_theme_mod( 'pre_header_column_one_layout', 'text' );
$pre_header_column_two_layout = get_theme_mod( 'pre_header_column_two_layout', 'text' );


// stop here if there's no pre-header or it has been set to none
if( !$pre_header_layout || $pre_header_layout == 'none' ) return;

?>

			<div id="xt-pre-header">

				<?php do_action( 'xt_before_pre_header' ); ?>

				<div class="xt-inner-pre-header xt-container xt-container-center<?php echo esc_attr( $layout ); ?>">

					<div class="<?php echo esc_attr( $inner_layout ); ?>">

						<?php do_action( $pre_header_hook_open ); ?>

						<?php

						if( $pre_header_column_one_layout == 'text' ) {

							wp_nav_menu(array(
								'theme_location'	=>		'pre_header_menu',
								'container'			=>		false,
								'menu_class'		=>		'xt-menu xt-sub-menu xt-visible-large' . xt_sub_menu_animation(),
								'depth'				=>		'2',
								'fallback_cb'		=>		false,
							));

							echo do_shortcode( $pre_header_column_one );

						} elseif( $pre_header_column_one_layout == 'menu' ) {

							wp_nav_menu(array(
								'theme_location'	=>		'pre_header_menu',
								'container'			=>		false,
								'menu_class'		=>		'xt-menu xt-sub-menu xt-visible-large' . xt_sub_menu_animation(),
								'depth'				=>		'2',
								'fallback_cb'		=>		'xt_menu_fallback',
							));

						}

						?>

						<?php do_action( $pre_header_hook_close ); ?>

					</div>

					<?php if ( $pre_header_layout == 'two' ) { ?>

					<div class="xt-inner-pre-header-right">

						<?php do_action( 'xt_pre_header_right_open' ); ?>

						<?php

						if( $pre_header_column_two_layout == 'text' ) {

							echo do_shortcode( $pre_header_column_two );

							wp_nav_menu(array(
								'theme_location'	=>		'pre_header_menu_right',
								'container'			=>		false,
								'menu_class'		=>		'xt-menu xt-sub-menu xt-visible-large' . xt_sub_menu_animation(),
								'depth'				=>		'2',
								'fallback_cb'		=>		false,
							));

						} elseif( $pre_header_column_two_layout == 'menu' ) {

							wp_nav_menu(array(
								'theme_location'	=>		'pre_header_menu_right',
								'container'			=>		false,
								'menu_class'		=>		'xt-menu xt-sub-menu xt-visible-large' . xt_sub_menu_animation(),
								'depth'				=>		'2',
								'fallback_cb'		=>		'xt_menu_fallback',
							));

						}

						?>

						<?php do_action( 'xt_pre_header_right_close' ); ?>

					</div>

					<?php } ?>

		        </div>

		        <?php do_action( 'xt_after_pre_header' ); ?>

			</div>
