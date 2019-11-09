<?php
/**
 * Comments Template
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// don't load it if you can't comment
if ( post_password_required() )	return;

?>

<?php if ( have_comments() ) : ?>

	<?php do_action( 'xt_before_comments' ); ?>

	<section class="commentlist">

		<h3 id="comments-title"><?php comments_number( __( '<span>No</span> Comments', 'xt-framework' ), __( '<span>One</span> Comment', 'xt-framework' ), __( '<span>%</span> Comments', 'xt-framework' ) );?></h3>

		<ul class="comments">

			<?php
				wp_list_comments( array(
					'avatar_size'	=>		80,
					'callback'		=>		'xt_comments',
					'reply_text'	=>		__( 'Reply', 'xt-framework' ),
				) );
			?>

		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="xt-comment-nav xt-clearfix" aria-label="<?php _e( 'Comments Navigation', 'xt-framework' ); ?>">
			<span class="screen-reader-text"><?php _e( 'Comments Navigation', 'xt-framework' ) ?></span>
			<div class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'xt-framework' ) ); ?></div>
			<div class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'xt-framework' ) ); ?></div>
		</nav>
		<?php endif; ?>

	</section>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.' , 'xt-framework' ); // WPCS: XSS ok. ?></p>
	<?php endif; ?>

	<?php do_action( 'xt_after_comments' ); ?>

<?php endif; ?>

<?php

$args = array(
	'title_reply'          => apply_filters( 'xt_leave_comment', __( 'Leave a Comment', 'xt-framework' ) ),
	/* translators: 1: comment title */
	'title_reply_to'       => apply_filters( 'xt_leave_reply', __( 'Leave a Reply to %s', 'xt-framework' ) ),
	'cancel_reply_link'    => apply_filters( 'xt_cancel_reply', __( 'Cancel Reply', 'xt-framework' ) ),
	'label_submit'         => apply_filters( 'xt_post_comment', __( 'Post Comment', 'xt-framework' ) ),
);

do_action( 'xt_before_comment_form' );

comment_form( $args );

do_action( 'xt_after_comment_form' );
