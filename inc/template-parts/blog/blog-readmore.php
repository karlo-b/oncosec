<?php
/**
 * Read More
 *
 * Renders read more link on archives.
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

$read_more_class = get_theme_mod( 'blog_read_more_link' ) == 'text' ? ' xt-inline-block' : ' xt-button';
if( get_theme_mod( 'blog_read_more_link' ) == 'primary' ) $read_more_class .= ' xt-button-primary';

$read_more_text = apply_filters( 'xt_read_more_text', __( 'Read more', 'xt-framework' ) );

echo sprintf( '<a href="%1$s" class="%2$s">%3$s%4$s</a>',
	esc_url( get_permalink() ),
	'xt-read-more' . esc_attr( $read_more_class ),
	esc_html( $read_more_text ),
	'<span class="screen-reader-text">' . get_the_title() . '</span>'
);
