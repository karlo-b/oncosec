<?php
/**
 * Article None
 *
 * being displayed if no post has been found
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>
						<?php echo '<h1 class="entry-title" itemprop="headline">' . apply_filters( 'xt_no_post_headline', __( "Oops, this article couldn't be found!", 'xt-framework' ) ) . '</h1>'; // WPCS: XSS ok. ?>

						<div class="entry-content" itemprop="text">

							<?php echo '<p>' . apply_filters( 'xt_no_post_content', __( "Something went wrong.", 'xt-framework' ) ) . '</p>'; // WPCS: XSS ok. ?>

						</div>
