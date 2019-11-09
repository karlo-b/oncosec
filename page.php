<?php
/**
 * Page Template
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

		<div id="content">

			<?php do_action( 'xt_content_open' ); ?>

			<?php xt_inner_content(); ?>

				<?php do_action( 'xt_inner_content_open' ); ?>

				<main id="main" class="xt-main<?php echo xt_singular_class(); // WPCS: XSS ok. ?>">

					<?php do_action( 'xt_main_content_open' ); ?>

					<?php xt_title(); ?>

					<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div class="entry-content" itemprop="text">

						<?php the_content(); ?>

						<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'xt-framework' ),
							'after'  => '</div>',
						) );
						?>

					</div>

					<?php endwhile; endif; ?>

					<?php comments_template(); ?>

					<?php do_action( 'xt_main_content_close' ); ?>

				</main>

				<?php do_action( 'xt_inner_content_close' ); ?>

			<?php xt_inner_content_close(); ?>

			<?php do_action( 'xt_content_close' ); ?>

		</div>

<?php get_footer(); ?>
