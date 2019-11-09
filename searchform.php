<?php
/**
 * Search Form Template
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'xt-framework' ); ?></span>
		<input type="search" id="s" name="s" value="" placeholder="<?php echo esc_attr( apply_filters( 'xt_search_placeholder', __( 'Search &hellip;', 'xt-framework' ) ) ); // WPCS: XSS ok. ?>" title="<?php echo esc_attr( apply_filters( 'xt_search_title', __( 'Press enter to search', 'xt-framework' ) ) ); // WPCS: XSS ok. ?>" />
	</label>
</form>
