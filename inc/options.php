<?php
/**
 * Options
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Load Metaboxes
 */
function xt_metabox_setup() {

	add_action( 'add_meta_boxes', 'xt_metaboxes' );
	add_action( 'save_post', 'xt_save_metadata', 10, 2 );

}
add_action( 'load-post.php', 'xt_metabox_setup' );
add_action( 'load-post-new.php', 'xt_metabox_setup' );

/**
 * Metaboxes
 */
function xt_metaboxes() {

	// Get public Post Types
	$post_types = get_post_types( array( 'public' => true ) );

	// Remove Post Types from array
	unset( $post_types['xt_hooks'], $post_types['elementor_library'], $post_types['fl-builder-template'] );

	// Add Options Metabox
	add_meta_box( 'xt', esc_html__( 'Template Settings', 'xt-framework' ), 'xt_options_metabox', $post_types, 'side', 'default' );

	// Add Sidebar Metabox
	add_meta_box( 'xt_sidebar', esc_html__( 'Sidebar', 'xt-framework' ), 'xt_sidebar_metabox', $post_types, 'side', 'default' );

}

/**
 * Options Metabox
 */
function xt_options_metabox( $post ) {

	wp_nonce_field( basename( __FILE__ ), 'xt_options_nonce' );
	$xt_stored_meta = get_post_meta( $post->ID );

	if (!isset( $xt_stored_meta['xt_options'][0] ) ) {
		$xt_stored_meta['xt_options'][0] = false;
	}

	$mydata = $xt_stored_meta['xt_options'];

	if ( strpos( $mydata[0], 'remove-title' ) !== false ) {
		$remove_title = 'remove-title';
	} else {
		$remove_title = false;
	}

	if ( strpos( $mydata[0], 'full-width') !== false ) {
		$full_width = 'full-width';
	} elseif( strpos( $mydata[0], 'contained') !== false ) {
		$full_width = 'contained';
	} else {
		$full_width = 'layout-global';
	}

	if ( strpos( $mydata[0], 'remove-featured') !== false ) {
		$remove_featured = 'remove-featured';
	} else {
		$remove_featured = false;
	}

	if ( strpos( $mydata[0], 'remove-header') !== false ) {
		$remove_header = 'remove-header';
	} else {
		$remove_header = false;
	}

	if ( strpos( $mydata[0], 'remove-footer') !== false ) {
		$remove_footer = 'remove-footer';
	} else {
		$remove_footer = false;
	}

	?>

	<!-- Layout -->

	<h4><?php _e( 'Layout', 'xt-framework' ); // WPCS: XSS ok. ?></h4>

	<div>
		<input id="layout-global" type="radio" name="xt_options[]" value="layout-global" <?php checked( $full_width, 'layout-global' ); ?> />
		<label for="layout-global"><?php _e( 'Inherit Global Settings', 'xt-framework' ); // WPCS: XSS ok. ?></label>
		<?php if( !xt_is_premium() ) {
			echo '<a style="text-decoration: none; box-shadow: none;" href="https://xstreamthemes.com//docs/global-template-settings/" target="_blank"><i style="font-size: 18px; margin-top: -3px; width: 15px; height: 15px;" class="dashicons dashicons-editor-help"></i></a>';
		} ?>
	</div>

	<div>
		<input id="layout-contained" type="radio" name="xt_options[]" value="contained" <?php checked( $full_width, 'contained' ); ?> />
		<label for="layout-contained"><?php _e( 'Contained', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

	<div>
		<input id="layout-full-width" type="radio" name="xt_options[]" value="full-width" <?php checked( $full_width, 'full-width' ); ?> />
		<label for="layout-full-width"><?php _e( 'Full Width', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

	<!-- Disable Elements -->

	<h4><?php _e( 'Disable Elements', 'xt-framework' ); // WPCS: XSS ok. ?></h4>

	<div>
		<input id="remove-title" type="checkbox" name="xt_options[]" value="remove-title" <?php checked( $remove_title, 'remove-title' ); ?> />
		<label for="remove-title"><?php _e( 'Page Title', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

	<div>
		<input id="remove-featured" type="checkbox" name="xt_options[]" value="remove-featured" <?php checked( $remove_featured, 'remove-featured' ); ?> />
		<label for="remove-featured"><?php _e( 'Featured Image', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

	<div>
		<input id="remove-header" type="checkbox" name="xt_options[]" value="remove-header" <?php checked( $remove_header, 'remove-header' ); ?> />
		<label for="remove-header"><?php _e( 'Header', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

	<div>
		<input id="remove-footer" type="checkbox" name="xt_options[]" value="remove-footer" <?php checked( $remove_footer, 'remove-footer' ); ?> />
		<label for="remove-footer"><?php _e( 'Footer', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

<?php }

/**
 * Sidebar Metabox
 */
function xt_sidebar_metabox( $post ) {

	wp_nonce_field( basename( __FILE__ ), 'xt_sidebar_nonce' );
	$xt_stored_meta = get_post_meta( $post->ID );

	$xt_sidebar_position = isset ( $xt_stored_meta['xt_sidebar_position'][0] ) ? $xt_stored_meta['xt_sidebar_position'][0] : 'global';

	?>

	<div>
		<input id="sidebar-global" type="radio" name="xt_sidebar_position" value="global" <?php checked( $xt_sidebar_position, 'global' ); ?> />
		<label for="sidebar-global"><?php _e( 'Inherit Global Settings', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

	<div>
		<input id="sidebar-right" type="radio" name="xt_sidebar_position" value="right" <?php checked( $xt_sidebar_position, 'right' ); ?> />
		<label for="sidebar-right"><?php _e( 'Right Sidebar', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

	<div>
		<input id="sidebar-left" type="radio" name="xt_sidebar_position" value="left" <?php checked( $xt_sidebar_position, 'left' ); ?> />
		<label for="sidebar-left"><?php _e( 'Left Sidebar', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

	<div>
		<input id="no-sidebar" type="radio" name="xt_sidebar_position" value="none" <?php checked( $xt_sidebar_position, 'none' ); ?> />
		<label for="no-sidebar"><?php _e( 'No Sidebar', 'xt-framework' ); // WPCS: XSS ok. ?></label>
	</div>

<?php }

/**
 * Save Metadata
 */
function xt_save_metadata( $post_id ) {

	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['xt_options_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST['xt_options_nonce'] ), basename( __FILE__ ) ) ) ? true : false;
	$is_valid_sidebar_nonce = ( isset( $_POST['xt_sidebar_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST['xt_sidebar_nonce'] ), basename( __FILE__ ) ) ) ? true : false;

	// stop here if is autosave, revision or nonce is invalid
	if ( $is_autosave || $is_revision || !$is_valid_nonce || !$is_valid_sidebar_nonce ) {
		return;
	}

	// stop if current user can't edit posts
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// save options metadata
	$checked = array();

	if ( isset( $_POST['xt_options'] ) ) {

		if ( in_array( 'remove-title', $_POST['xt_options'] ) !== false ) { // WPCS: sanitization ok.
			$checked[] .= 'remove-title';
		}

		if ( in_array( 'full-width', $_POST['xt_options'] ) !== false ) { // WPCS: sanitization ok.
			$checked[] .= 'full-width';
		}

		if ( in_array( 'contained', $_POST['xt_options'] ) !== false ) { // WPCS: sanitization ok.
			$checked[] .= 'contained';
		}

		if ( in_array( 'layout-global', $_POST['xt_options'] ) !== false ) { // WPCS: sanitization ok.
			$checked[] .= 'layout-global';
		}

		if ( in_array( 'remove-featured', $_POST['xt_options'] ) !== false ) { // WPCS: sanitization ok.
			$checked[] .= 'remove-featured';
		}

		if ( in_array( 'remove-header', $_POST['xt_options'] ) !== false ) { // WPCS: sanitization ok.
			$checked[] .= 'remove-header';
		}

		if ( in_array( 'remove-footer', $_POST['xt_options'] ) !== false ) { // WPCS: sanitization ok.
			$checked[] .= 'remove-footer';
		}

	}

	update_post_meta( $post_id, 'xt_options', $checked );

	// save sidebar metadata
	$xt_sidebar_position = isset( $_POST['xt_sidebar_position'] ) ? $_POST['xt_sidebar_position'] : '';

	update_post_meta( $post_id, 'xt_sidebar_position', $xt_sidebar_position );

}




/**
 * Load Metaboxes
 */
function xt_premium_metabox_setup() {

	add_action( 'add_meta_boxes', 'xt_premium_add_metaboxes', 20 );
	add_action( 'save_post', 'xt_premium_meta_save', 10, 2 );

}
add_action( 'load-post.php', 'xt_premium_metabox_setup' );
add_action( 'load-post-new.php', 'xt_premium_metabox_setup' );

/**
 * Metaboxes
 */
function xt_premium_add_metaboxes() {

	// Get public Post Types
	$post_types = get_post_types( array( 'public' => true ) );

	// Remove Post Types from array
	unset( $post_types['xt_hooks'], $post_types['elementor_library'], $post_types['fl-builder-template'] );

	// Add Options Metabox
	add_meta_box( 'xt_header', esc_html__( 'Transparent Header', 'xtpremium' ), 'xt_premium_options_metabox', $post_types, 'side', 'default' );

}

/**
 * Options Metabox
 */
function xt_premium_options_metabox( $post ) {

	wp_nonce_field( basename( __FILE__ ), 'xt_premium_options_nonce' );
	$xt_stored_meta = get_post_meta( $post->ID );

	if (!isset( $xt_stored_meta['xt_premium_options'][0] ) ) {
		$xt_stored_meta['xt_premium_options'][0] = false;
	}

	$mydata = $xt_stored_meta['xt_premium_options'][0];

	if ( strpos( $mydata, 'transparent-header') !== false ) {
		$transparent_header = 'transparent-header';
	} else {
		$transparent_header = false;
	}

	?>

	<div>
		<input id="transparent-header" type="checkbox" name="xt_premium_options[]" value="transparent-header" <?php checked( $transparent_header, 'transparent-header' ); ?> />
		<label for="transparent-header"><?php _e( 'Transparent Header', 'xtpremium' ); ?></label>
	</div>

<?php }

function xt_premium_meta_save( $post_id ) {

	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['xt_premium_options_nonce'] ) && wp_verify_nonce( sanitize_key( $_POST['xt_premium_options_nonce'] ), basename( __FILE__ ) ) ) ? true : false;

	// stop here if is autosave, revision or nonce is invalid
	if( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	// stop if current user can't edit posts
	if( !current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	// save options metadata
	$checked = array();

	if ( isset( $_POST['xt_premium_options'] ) ) {

		if ( in_array( 'transparent-header', $_POST['xt_premium_options'] ) !== false ) {

			$checked[] = 'transparent-header';

		}

	}

	update_post_meta( $post_id, 'xt_premium_options', $checked );

}
