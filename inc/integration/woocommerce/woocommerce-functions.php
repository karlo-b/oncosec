<?php
/**
 * WooCommerce Functions
 *
 * @package XT Framework
 * @subpackage Integration/WooCommerce
 */

/**
 * Custom Fragments Refresh
 */
function xt_woo_fragment_refresh() {

	wp_enqueue_script( 'xt-woocommerce-fragment-refresh', get_template_directory_uri() . '/assets/woocommerce/js/woocommerce-fragment-refresh.js', array( 'jquery' ), '', true  );

	if( is_product() && 'yes' === get_option( 'woocommerce_enable_ajax_add_to_cart' ) && get_theme_mod( 'woocommerce_single_add_to_cart_ajax' ) ) {
		wp_enqueue_script( 'xt-woocommerce-single-add-to-cart-ajax', get_template_directory_uri() . '/assets/woocommerce/js/woocommerce-single-add-to-cart-ajax.js', array( 'jquery' ), '', true );
	}

}
add_action( 'wp_enqueue_scripts', 'xt_woo_fragment_refresh' );

/**
 * Deregister Defaults
 */
function xt_woo_deregister_defaults() {

	// Default Sidebar
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

	// Default Wrappers
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

	// Loop
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

}
add_action( 'wp', 'xt_woo_deregister_defaults', 10 );

/**
 * Register Defaults
 */
function xt_woo_register_defaults() {

	add_action( 'woocommerce_after_shop_loop_item', 'xt_woo_loop_content' );

}
add_action( 'wp', 'xt_woo_register_defaults', 20 );

/**
 * Remove first & last classes from WooCommerce Loop
 */
function xt_woo_loop_remove_first_last_class( $classes ) {

	if( 'product' == get_post_type() ) {
		$classes = array_diff( $classes, array( 'first', 'last' ) );
	}

	return $classes;

}
add_filter( 'post_class', 'xt_woo_loop_remove_first_last_class', 21 );

/**
 * Register Sidebars
 */
function xt_woo_sidebar() {

	// Shop Page Sidebar
	register_sidebar( array(
		'id'			=> 'xt-woocommerce-sidebar',
		'name'			=> __( 'WooCommerce Sidebar', 'xt-framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="xt-widgettitle">',
		'after_title'	=> '</h4>',
		'description'	=> __( 'This Sidebar is being displayed on WooCommerce Archive Pages.', 'xt-framework' ),
	) );

	// Product Page Sidebar
	register_sidebar( array(
		'id'			=> 'xt-woocommerce-product-sidebar',
		'name'			=> __( 'WooCommerce Product Page Sidebar', 'xt-framework' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'	=> '<h4 class="xt-widgettitle">',
		'after_title'	=> '</h4>',
		'description'	=> __( 'This Sidebar is being displayed on WooCommerce Product Pages.', 'xt-framework' ),
	) );

}
add_action( 'widgets_init', 'xt_woo_sidebar' );

/**
 * Filter Sidebars
 */
function xt_woo_sidebars( $sidebar ) {

	if( is_woocommerce() ) {

		if( is_product() ) {

			$sidebar ='xt-woocommerce-product-sidebar';

		} else {

			$sidebar = 'xt-woocommerce-sidebar';

		}

	}

	return $sidebar;

}
add_filter( 'xt_do_sidebar', 'xt_woo_sidebars' );

/* Wrappers */

/**
 * Wrapper Start
 */
function xt_woo_output_content_wrapper() {

	//vars
	$grid_gap = get_theme_mod( 'sidebar_gap', 'medium' );

	echo '<div id="content">';

	do_action( 'xt_content_open' );

	xt_inner_content();

	do_action( 'xt_inner_content_open' );

	echo '<div class="xt-grid xt-main-grid xt-grid-'. esc_attr( $grid_gap ) .'">';

	do_action( 'xt_sidebar_left' );

	echo '<main id="main" class="xt-main xt-medium-2-3'. xt_archive_class() .'">';

	do_action( 'xt_main_content_open' );

}
add_action( 'woocommerce_before_main_content', 'xt_woo_output_content_wrapper', 10 );

/**
 * Wrapper End
 */
function xt_woo_output_content_wrapper_end() {

	do_action( 'xt_main_content_close' );

	echo '</main>';

	do_action( 'xt_sidebar_right' );

	do_action( 'xt_inner_content_close' );

	xt_inner_content_close();

	do_action( 'xt_content_close' );

	echo '</div>';

}
add_action( 'woocommerce_after_main_content', 'xt_woo_output_content_wrapper_end', 10 );

/**
 * Filter Sidebar Layout
 */
function xt_woo_sidebar_layout( $sidebar ) {

	if( is_product() ) {

		$sidebar = get_theme_mod( 'woocommerce_single_sidebar_layout', 'none' );

		$id               = get_the_ID();
		$sidebar_position = get_post_meta( $id, 'xt_sidebar_position', true );

		if( $sidebar_position && $sidebar_position !== 'global' ) {
			$sidebar = $sidebar_position;
		}

	} elseif( is_shop() || is_product_category() ) {

		$sidebar = get_theme_mod( 'woocommerce_sidebar_layout', 'none' );

	}

	return $sidebar;

}
add_filter( 'xt_sidebar_layout', 'xt_woo_sidebar_layout' );

/**
 * Apply Content/Archive Class
 */
function xt_woo_archive_class( $archive_class ) {

	if( is_product() ) {

		$archive_class = ' xt-product-content';

	} elseif( is_shop() || is_product_category() ) {

		$archive_class = ' xt-product-archive';

	}

	return $archive_class;

}
add_filter( 'xt_archive_class', 'xt_woo_archive_class' );

/**
 * Product Loop Start
 *
 * Custom Product Loop Wrapper to take advantage of the CSS Framework Grid Component
 */
function xt_woo_product_loop_start() {

	$mobile_breakpoint  = get_theme_mod( 'woocommerce_loop_products_per_row_mobile', 1 );
	$tablet_breakpoint  = get_theme_mod( 'woocommerce_loop_products_per_row_tablet', 3 );
	$desktop_breakpoint = get_theme_mod( 'woocommerce_loop_products_per_row_desktop', 4 );
	$grid_gap           = get_theme_mod( 'woocommerce_loop_grid_gap', 'large' );

	return '<ul class="xt-grid xt-grid-'. esc_attr( $grid_gap ) .' xt-grid-1-'. esc_attr( $mobile_breakpoint ) .' xt-grid-small-1-'. esc_attr( $tablet_breakpoint ) .' xt-grid-large-1-'. esc_attr( $desktop_breakpoint ) .' products">';

}
add_filter( 'woocommerce_product_loop_start', 'xt_woo_product_loop_start', 0 );

/**
 * Product Loop End
 */
function xt_woo_product_loop_end() {

	return '</ul>';

}
add_filter( 'woocommerce_product_loop_end', 'xt_woo_product_loop_end', 0 );

/**
 * Product Wrapper Start
 */
function xt_woo_loop_product_wrap_start() {

	echo '<div class="xt-woo-product-wrapper xt-clearfix">';

}
add_action( 'woocommerce_before_shop_loop_item', 'xt_woo_loop_product_wrap_start', 0 );

/**
 * Product Wrapper End
 */
function xt_woo_loop_product_wrap_end() {

	echo '</div>';

}
add_action( 'woocommerce_after_shop_loop_item', 'xt_woo_loop_product_wrap_end', 100 );

/**
 * Thumbnail Wrapper Start
 */
function xt_woo_loop_thumbnail_wrap_start() {

	echo '<div class="xt-woo-loop-thumbnail-wrapper">';
	echo '<a href="' . esc_url( get_the_permalink() ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';

}
add_action( 'woocommerce_before_shop_loop_item_title', 'xt_woo_loop_thumbnail_wrap_start', 5 );

/**
 * Thumbnail Wrapper End
 */
function xt_woo_loop_thumbnail_wrap_end() {

	echo '</a>';
	echo '</div>';

}
add_action( 'woocommerce_before_shop_loop_item_title', 'xt_woo_loop_thumbnail_wrap_end', 12 );

/* Theme Mods */

/**
 * Remove Sale Badge from Loop
 */
function xt_woo_loop_remove_sale_badge() {

	$sale_badge_position = get_theme_mod( 'woocommerce_loop_sale_position' );

	if ( $sale_badge_position && $sale_badge_position == 'none' ) {
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	}

}
add_action( 'wp', 'xt_woo_loop_remove_sale_badge' );

/**
 * Hide WooCommerce Page Title on Archives
 */
function xt_woo_loop_remove_page_title( $page_title ) {

	if ( get_theme_mod( 'woocommerce_loop_remove_page_title' ) ) {
		$page_title = false;
	}

	return $page_title;

}
add_filter( 'woocommerce_show_page_title' , 'xt_woo_loop_remove_page_title' );

/**
 * Remove WooCommerce Breadcrumbs from Shop Pages
 */
function xt_woo_loop_remove_breadcrumbs() {

	if( get_theme_mod( 'woocommerce_loop_remove_breadcrumbs' ) ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}

}
add_action( 'wp', 'xt_woo_loop_remove_breadcrumbs' );

/**
 * Remove the Results Count from Shop Pages
 */
function xt_woo_loop_remove_result_count() {

	if( get_theme_mod( 'woocommerce_loop_remove_result_count' ) ) {
		remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
	}

}
add_action( 'wp', 'xt_woo_loop_remove_result_count' );

/**
 * Remove the Sorting Dropdown from Shop Pages
 */
function xt_woo_loop_remove_ordering() {

	if( get_theme_mod( 'woocommerce_loop_remove_ordering' ) ) {
		remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
	}

}
add_action( 'wp', 'xt_woo_loop_remove_ordering' );

/* General Functions */

/**
 * Out of Stock Notice
 */
function xt_woo_loop_out_of_stock() {

	$out_of_stock_notice = get_theme_mod( 'woocommerce_loop_out_of_stock_notice' );

	if( !$out_of_stock_notice || $out_of_stock_notice !== 'hide' ) {

		$out_of_stock			= get_post_meta( get_the_ID(), '_stock_status', true );
		$out_of_stock_string	= apply_filters( 'xt_woo_loop_out_of_stock_string', __( 'Out of stock', 'xt-framework' ) );

		if ( $out_of_stock == 'outofstock' ) {
			echo '<span class="xt-woo-loop-out-of-stock">'. esc_html( $out_of_stock_string ) .'</span>';
		}

	}

}
add_action( 'woocommerce_before_shop_loop_item_title', 'xt_woo_loop_out_of_stock', 11 );

/**
 * Add Parent Category to Loop
 */
function xt_woo_loop_category() { ?>

	<span class="xt-woo-product-category">
		<?php
		global $product;
		$categories = function_exists( 'wc_get_product_category_list' ) ? wc_get_product_category_list( get_the_ID(), ',', '', '' ) : $product->get_categories( ',', '', '' );

		$categories = strip_tags( $categories );
		if ( $categories ) {
			list( $parent_category ) = explode( ',', $categories );
			echo esc_html( $parent_category );
		}
		?>
	</span>

<?php }

/**
 * Loop Title
 */
function xt_woo_loop_title() {

	echo '<a href="' . esc_url( get_the_permalink() ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
	echo '<h3 class="woocommerce-loop-product__title">' . get_the_title() . '</h3>';
	echo '</a>';

}

/**
 * Loop Short Description
 */
function xt_woo_loop_short_description() {

	if ( has_excerpt() ) { ?>

		<div class="xt-woo-loop-excerpt">
			<?php the_excerpt(); ?>
		</div>

	<?php }

}

/**
 * Loop Content
 */
function xt_woo_loop_content() {

	$content = get_theme_mod( 'woocommerce_loop_sortable_content', array( 'category', 'title', 'price', 'add_to_cart' ) );

	if ( is_array( $content ) && !empty( $content ) ) {

		do_action( 'xt_woo_loop_before_summary' );
		echo '<div class="xt-woo-loop-summary">';
		do_action( 'xt_woo_loop_summary_open' );

		foreach ( $content as $value ) {

			switch ( $value ) {
				case 'title':
					do_action( 'xt_woo_loop_before_title' );
					xt_woo_loop_title();
					do_action( 'xt_woo_loop_after_title' );
					break;
				case 'price':
					do_action( 'xt_woo_loop_before_price' );
					woocommerce_template_loop_price();
					do_action( 'xt_woo_loop_after_price' );
					break;
				case 'rating':
					do_action( 'xt_woo_loop_before_rating' );
					woocommerce_template_loop_rating();
					do_action( 'xt_woo_loop_after_rating' );
					break;
				case 'excerpt':
					do_action( 'xt_woo_loop_before_excerpt' );
					xt_woo_loop_short_description();
					do_action( 'xt_woo_loop_after_excerpt' );
					break;
				case 'add_to_cart':
					do_action( 'xt_woo_loop_before_add_to_cart' );
					woocommerce_template_loop_add_to_cart();
					do_action( 'xt_woo_loop_after_add_to_cart' );
					break;
				case 'category':
					do_action( 'xt_woo_loop_before_category' );
					xt_woo_loop_category();
					do_action( 'xt_woo_loop_after_category' );
					break;
				default:
					break;
			}
		}

		do_action( 'xt_woo_loop_summary_close' );
		echo '</div>';
		do_action( 'xt_woo_loop_after_summary' );

	}
}

/**
 * Products per Row
 */
function xt_loop_columns() {

	$columns = get_theme_mod( 'woocommerce_loop_products_per_row_desktop', 4 );
	return $columns;

}
add_filter( 'loop_shop_columns', 'xt_loop_columns' );

/**
 * Current Menu Item Class
 *
 * Add Current Menu Item Class to WooCommerce Menu Item if we're on the Cart Page
 */
function xt_woo_menu_item_class_current( $css_classes ) {

	if( is_cart() ) $css_classes .= ' current-menu-item';

	return $css_classes;

}
add_filter( 'xt_woo_menu_item_classes', 'xt_woo_menu_item_class_current' );

/* Menu Item */

/**
 * Cart Menu Item
 */
function xt_woo_menu_item() {

	// vars
	$icon			= get_theme_mod( 'woocommerce_menu_item_icon', 'cart' );
	$css_classes	= apply_filters( 'xt_woo_menu_item_classes', 'menu-item xt-woo-menu-item' );
	$title			= apply_filters( 'xt_woo_menu_item_title', __( 'Shopping Cart', 'xt-framework' ) );
	$cart_count		= WC()->cart->get_cart_contents_count();
	$cart_url		= wc_get_cart_url();

	// construct menu item
	$menu_item = '';

	$menu_item .= '<li class="'. esc_attr( $css_classes ) .'">';

		$menu_item .= '<a href="' . esc_url( $cart_url ) . '" title="'. esc_attr( $title ) .'">';

			$menu_item .= '<span class="screen-reader-text">'. __( 'Shopping Cart', 'xt-framework' ) .'</span>';

			$menu_item .= apply_filters( 'xt_woo_before_menu_item', '' );

			$menu_item .= '<i class="xtf xtf-'. esc_attr( $icon ) .'"></i>';
			if( get_theme_mod( 'woocommerce_menu_item_count' ) !== 'hide' ) {
				$menu_item .= '<span class="xt-woo-menu-item-count">' . wp_kses_data( $cart_count ) . '<span class="screen-reader-text">'. __( 'Items in Cart', 'xt-framework' ) .'</span></span>';
			}

			$menu_item .= apply_filters( 'xt_woo_after_menu_item', '' );

		$menu_item .= '</a>';

		$menu_item .= apply_filters( 'xt_woo_menu_item_dropdown', '' );

	$menu_item .= '</li>';

	return $menu_item;

}

/**
 * Add Cart Menu Item to Main Navigation
 */
function xt_woo_menu_icon( $items, $args ) {

	// stop right here if menu item is hidden
	if( get_theme_mod( 'woocommerce_menu_item_desktop' ) == 'hide' ) return $items;

	// hide if we're on non-WooCommerce pages
	if( get_theme_mod( 'woocommerce_menu_item_hide_if_not_wc' ) && !is_woocommerce() ) return $items;

	// stop here if we're on a off canvas menu
	if( xt_is_off_canvas_menu() ) return $items;

	if ( $args->theme_location === 'main_menu' ) {

		$items .= xt_woo_menu_item();
	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'xt_woo_menu_icon', 10, 2 );

/**
 * Add Cart Menu Item to Mobile Menu Toggle
 */
function xt_woo_menu_icon_mobile() {

	// hide if mobile WooCommerce menu item is disabled
	if( get_theme_mod( 'woocommerce_menu_item_mobile' ) == 'hide' ) return;

	// hide if we're on non-WooCommerce pages
	if( get_theme_mod( 'woocommerce_menu_item_hide_if_not_wc' ) && !is_woocommerce() ) return;

	$menu_item = '<ul class="xt-mobile-nav-item">';
	$menu_item .= xt_woo_menu_item();
	$menu_item .= '</ul>';

	echo $menu_item; // WPCS: XSS ok.

}
add_action( 'xt_before_mobile_toggle', 'xt_woo_menu_icon_mobile' );

/**
 * WooCommerce Fragments
 */
function xt_woo_fragments( $fragments ) {

	$fragments['li.xt-woo-menu-item'] = xt_woo_menu_item();

	return $fragments;

}
add_filter( 'woocommerce_add_to_cart_fragments', 'xt_woo_fragments' );

/**
 * Add to Cart Ajax on Product Pages
 */
function xt_woo_single_add_to_cart_ajax() {

	if ( 'yes' !== get_option( 'woocommerce_enable_ajax_add_to_cart' ) ) return;
	if ( !get_theme_mod( 'woocommerce_single_add_to_cart_ajax' ) ) return;

	$product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
	$quantity          = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( $_POST['quantity'] );
	$variation_id      = absint( $_POST['variation_id'] );
	$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity );
	$product_status    = get_post_status( $product_id );

	if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id ) && 'publish' === $product_status ) {

		do_action( 'woocommerce_ajax_added_to_cart', $product_id );

		if ( 'yes' === get_option('woocommerce_cart_redirect_after_add' ) ) {
			wc_add_to_cart_message( array( $product_id => $quantity ), true );
		}

		WC_AJAX :: get_refreshed_fragments();

	} else {

		$data = array(
			'error' => true,
			'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ) );

		echo wp_send_json( $data );
	}

	wp_die();

}
add_action( 'wp_ajax_xt_woo_single_add_to_cart_ajax', 'xt_woo_single_add_to_cart_ajax' );
add_action( 'wp_ajax_nopriv_xt_woo_single_add_to_cart_ajax', 'xt_woo_single_add_to_cart_ajax' );
