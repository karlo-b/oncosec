<?php
/**
 * 404
 *
 * Construct the Theme's 404 Page
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

		<div id="content">

			<?php do_action( 'xt_content_open' ); ?>

			<?php xt_inner_content(); ?>

				<?php do_action( 'xt_inner_content_open' ); ?>

				<main id="main" class="xt-main<?php echo xt_singular_class(); // WPCS: XSS ok. ?>">

					<div class="xt-text-center">

						<?php echo '<h1 class="entry-title" itemprop="headline">' . apply_filters( 'xt_404_headline', __( "404 - This page couldn't be found.", 'xt-framework' ) ) . '</h1>'; // WPCS: XSS ok. ?>

						<div class="xt-container-center xt-medium-1-2" itemprop="text">

							<?php echo '<p>' . apply_filters( 'xt_404_text', __( "Oops! We're sorry, this page couldn't be found!", 'xt-framework' ) ) . '</p>'; // WPCS: XSS ok. ?>

							<?php get_search_form(); ?>

						</div>

					</div>

				</main>

				<?php do_action( 'xt_inner_content_close' ); ?>

			<?php xt_inner_content_close(); ?>

			<?php do_action( 'xt_content_close' ); ?>

		</div>
