<?php
/**
 * kirki WooCommerce
 *
 * @package XT Framework
 * @subpackage Integration/WooCommerce
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Textdomain
load_theme_textdomain( 'xt-framework', get_template_directory() . '/languages' );

/* Setup */
function xt_woo_customizer_setup( $wp_customize ) {

	// change section priorities
	$wp_customize->get_section( 'woocommerce_store_notice' )->priority = 10;
	$wp_customize->get_section( 'woocommerce_product_images' )->priority = 20;
	$wp_customize->get_section( 'woocommerce_product_catalog' )->priority = 30;
	$wp_customize->get_section( 'woocommerce_checkout' )->priority = 50;

	// change section title
	$wp_customize->get_section( 'woocommerce_product_catalog' )->title = esc_attr__( 'Shop Page', 'xt-framework' );

}
add_action( 'customize_register' , 'xt_woo_customizer_setup', 20 );

/* kirki Configuration */

Kirki::add_config( 'xt', array(
	'capability'		=>			'edit_theme_options',
	'option_type'		=>			'theme_mod',
	'disable_output'	=>			true
) );

/* Sections – WooCommerce */

// Menu Item
Kirki::add_section( 'xt_woocommerce_menu_item_options', array(
	'title'				=>			__( 'Menu Item', 'xt-framework' ),
	'panel'				=>			'woocommerce',
	'priority'			=>			25,
) );

// Product Page
Kirki::add_section( 'xt_woocommerce_product_options', array(
	'title'				=>			__( 'Product Page', 'xt-framework' ),
	'panel'				=>			'woocommerce',
	'priority'			=>			40,
) );

// Sidebar
Kirki::add_section( 'xt_woocommerce_sidebar_options', array(
	'title'				=>			__( 'Sidebar', 'xt-framework' ),
	'panel'				=>			'woocommerce',
	'priority'			=>			60,
) );

// Notices
Kirki::add_section( 'xt_woocommerce_notices_options', array(
	'title'				=>			__( 'Notices', 'xt-framework' ),
	'panel'				=>			'woocommerce',
	'priority'			=>			70,
) );

/* Fields – Sidebar */

// Shop Sidebar Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_sidebar_layout',
	'label'				=>			esc_attr__( 'Shop Page Sidebar', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_sidebar_options',
	'default'			=>			'none',
	'priority'			=>			0,
	'multiple'			=>			1,
	'choices'			=>			array(
		'right'			=>			esc_attr__( 'Right', 'xt-framework' ),
		'left'			=>			esc_attr__( 'Left', 'xt-framework' ),
		'none'			=>			esc_attr__( 'No Sidebar', 'xt-framework' ),
	),
) );

// Product Sidebar Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_single_sidebar_layout',
	'label'				=>			esc_attr__( 'Product Page Sidebar', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_sidebar_options',
	'default'			=>			'none',
	'priority'			=>			1,
	'multiple'			=>			1,
	'choices'			=>			array(
		'right'			=>			esc_attr__( 'Right', 'xt-framework' ),
		'left'			=>			esc_attr__( 'Left', 'xt-framework' ),
		'none'			=>			esc_attr__( 'No Sidebar', 'xt-framework' ),
	),
) );

/* Fields – Menu Item */

// Hide from non WC-Pages
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'woocommerce_menu_item_hide_if_not_wc',
	'label'				=>			esc_attr__( 'Hide from non-Shop Pages', 'xt-framework' ),
	'description'		=>			__( 'Display Menu Item only on WooCommerce related pages', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			0,
	'priority'			=>			5,
) );

// Turn Search into Product Search
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'woocommerce_search_menu_item',
	'label'				=>			esc_attr__( 'Product Search', 'xt-framework' ),
	'description'		=>			__( 'Turn the Search Menu Item into a Product Search', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			0,
	'priority'			=>			5,
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-88057',
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			5,
) );

// Menu Item
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_menu_item_desktop',
	'label'				=>			esc_attr__( 'Visibility (Desktop)', 'xt-framework' ),
	'description'		=>			__( 'Adds a Cart Icon to your Main Navigation', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			'show',
	'priority'			=>			10,
	'multiple'			=>			1,
	'choices'			=>			array(
		'show'			=>			esc_attr__( 'Show', 'xt-framework' ),
		'hide'			=>			esc_attr__( 'Hide', 'xt-framework' ),
	),
) );

// Menu Item Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_menu_item_desktop_color',
	'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			'',
	'priority'			=>			11,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_menu_item_desktop',
		'operator'		=>			'!=',
		'value'			=>			'hide',
		),
		array(
		'setting'		=>			'woocommerce_menu_item_count',
		'operator'		=>			'!=',
		'value'			=>			'hide',
		),
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-75733',
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			12,
) );

// Mobile Menu Item
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_menu_item_mobile',
	'label'				=>			esc_attr__( 'Visibility (Mobile)', 'xt-framework' ),
	'description'		=>			__( 'Adds a Cart Icon to your Mobile Navigation', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			'show',
	'priority'			=>			13,
	'multiple'			=>			1,
	'choices'			=>			array(
		'show'			=>			esc_attr__( 'Show', 'xt-framework' ),
		'hide'			=>			esc_attr__( 'Hide', 'xt-framework' ),
	),
) );

// Menu Item Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_menu_item_mobile_color',
	'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			'',
	'priority'			=>			14,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_menu_item_mobile',
		'operator'		=>			'!=',
		'value'			=>			'hide',
		),
		array(
		'setting'		=>			'woocommerce_menu_item_count',
		'operator'		=>			'!=',
		'value'			=>			'hide',
		),
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-36652',
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			15,
) );

// Menu Item Count
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_menu_item_count',
	'label'				=>			esc_attr__( 'Count', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_menu_item_options',
	'default'			=>			'show',
	'priority'			=>			16,
	'multiple'			=>			1,
	'choices'			=>			array(
		'show'			=>			esc_attr__( 'Show', 'xt-framework' ),
		'hide'			=>			esc_attr__( 'Hide', 'xt-framework' ),
	),
) );

/* Fields – Shop & Archive Pages (Loop) */

// Custom Width
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Custom Content Width', 'xt-framework' ),
	'settings'			=>			'woocommerce_loop_custom_width',
	'section'			=>			'woocommerce_product_catalog',
	'description'		=>			esc_attr__( 'Default: 1200px', 'xt-framework' ),
	'priority'			=>			10,
	'transport'			=>			'postMessage'
) );

Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-56123',
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			10,
) );

// Remove Page Title
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'woocommerce_loop_remove_page_title',
	'label'				=>			esc_attr__( 'Hide Page Title', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			0,
	'priority'			=>			10,
) );

// Remove Breadcrumbs
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'woocommerce_loop_remove_breadcrumbs',
	'label'				=>			esc_attr__( 'Hide Breadcrumbs', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			0,
	'priority'			=>			10,
) );

// Remove Result Count
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'woocommerce_loop_remove_result_count',
	'label'				=>			esc_attr__( 'Hide Result Count', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			0,
	'priority'			=>			10,
) );

// Remove Ordering
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'woocommerce_loop_remove_ordering',
	'label'				=>			esc_attr__( 'Hide Ordering', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			0,
	'priority'			=>			10,
) );

Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-72124',
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			10,
) );

function xt_woo_custom_controls_default( $wp_customize ) {

	$wp_customize->add_setting( 'woocommerce_loop_products_per_row_desktop',
		array(
			'default' => '4',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_setting( 'woocommerce_loop_products_per_row_tablet',
		array(
			'default' => '2',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_setting( 'woocommerce_loop_products_per_row_mobile',
		array(
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'woocommerce_loop_products_per_row',
		array(
			'label'	=> esc_attr__( 'Products per Row', 'xt-framework' ),
			'section' => 'woocommerce_product_catalog',
			'settings' => 'woocommerce_loop_products_per_row_desktop',
			'priority' => 15,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'woocommerce_loop_products_per_row',
		array(
			'label'	=> esc_attr__( 'Products per Row', 'xt-framework' ),
			'section' => 'woocommerce_product_catalog',
			'settings' => 'woocommerce_loop_products_per_row_tablet',
			'priority' => 15,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'woocommerce_loop_products_per_row',
		array(
			'label'	=> esc_attr__( 'Products per Row', 'xt-framework' ),
			'section' => 'woocommerce_product_catalog',
			'settings' => 'woocommerce_loop_products_per_row_mobile',
			'priority' => 15,
		)
	));

}
add_action( 'customize_register' , 'xt_woo_custom_controls_default' );

// Gap
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_loop_grid_gap',
	'label'				=>			esc_attr__( 'Grid Gap', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'large',
	'priority'			=>			20,
	'multiple'			=>			1,
	'choices'			=>			array(
		'small'			=>			esc_attr__( 'Small', 'xt-framework' ),
		'medium'		=>			esc_attr__( 'Medium', 'xt-framework' ),
		'large'			=>			esc_attr__( 'Large', 'xt-framework' ),
		'xlarge'		=>			esc_attr__( 'xLarge', 'xt-framework' ),
		'collapse'		=>			esc_attr__( 'Collapse', 'xt-framework' ),
	),
) );

// Content Alignment
Kirki::add_field( 'xt', array(
	'type'				=>			'radio-image',
	'settings'			=>			'woocommerce_loop_content_alignment',
	'label'				=>			esc_attr__( 'Content Alignment', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'left',
	'priority'			=>			20,
	'multiple'			=>			1,
	'choices'			=>			array(
		'left'			=>			XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
		'center'		=>			XT_THEME_URI . '/inc/customizer/img/align-center.jpg',
		'right'			=>			XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
	),
) );

// Product Structure
Kirki::add_field( 'xt', array(
	'type'				=>			'sortable',
	'settings'			=>			'woocommerce_loop_sortable_content',
	'label'				=>			esc_attr__( 'Structure', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			array(
		'category',
		'title',
		'price',
		'add_to_cart'
	),
	'choices'			=> array(
		'category'		=>			esc_attr__( 'Category', 'xt-framework' ),
		'title'			=>			esc_attr__( 'Title', 'xt-framework' ),
		'rating'		=>			esc_attr__( 'Rating', 'xt-framework' ),
		'price'			=>			esc_attr__( 'Price', 'xt-framework' ),
		'add_to_cart'	=>			esc_attr__( 'Add to Cart Button', 'xt-framework' ),
		'excerpt'		=>			esc_attr__( 'Short Description', 'xt-framework' ),
	),
	'priority'			=>			20,
) );

// Layout
Kirki::add_field(
	'xt',
	array(
		'type'        => 'select',
		'settings'    => 'woocommerce_loop_layout',
		'label'       => esc_attr__( 'Layout', 'xt-framework' ),
		'section'     => 'woocommerce_product_catalog',
		'default'     => 'default',
		'priority'    => 20,
		'choices'     => array(
			'default' => esc_attr__( 'Default', 'xt-framework' ),
			'list'    => esc_attr__( 'List', 'xt-framework' ),
		),
	)
);

// Alignment
Kirki::add_field( 'xt', array(
	'type'            => 'radio-image',
	'settings'        => 'woocommerce_loop_image_alignment',
	'label'           => esc_attr__( 'Image Alignment', 'xt-framework' ),
	'section'         => 'woocommerce_product_catalog',
	'default'         => 'left',
	'priority'        => 20,
	'multiple'        => 1,
	'transport'       => 'postMessage',
	'choices'         => array(
		'left'        => XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
		'right'       => XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_layout',
			'operator' => '==',
			'value'    => 'list',
		),
	),
) );

// Image Container Width
Kirki::add_field( 'xt', array(
	'type'            => 'slider',
	'settings'        => 'woocommerce_loop_image_width',
	'label'           => esc_attr__( 'Image Width', 'xt-framework' ),
	'section'         => 'woocommerce_product_catalog',
	'priority'        => 20,
	'default'         => 50,
	'transport'       => 'postMessage',
	'choices'         => array(
		'min'         => '25',
		'max'         => '75',
		'step'        => '1',
	),
	'active_callback' => array(
		array(
			'setting'  => 'woocommerce_loop_layout',
			'operator' => '==',
			'value'    => 'list',
		),
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-56377',
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			20,
) );

// Sale Position
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_loop_sale_position',
	'label'				=>			esc_attr__( 'Sale Badge', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'outside',
	'priority'			=>			30,
	'multiple'			=>			1,
	'choices'			=>			array(
		'outside'		=>			esc_attr__( 'Outside', 'xt-framework' ),
		'inside'		=>			esc_attr__( 'Inside', 'xt-framework' ),
		'none'			=>			esc_attr__( 'Hide', 'xt-framework' ),
	),
) );

// Sale Position
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_loop_sale_layout',
	'label'				=>			esc_attr__( 'Layout', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'round',
	'priority'			=>			30,
	'multiple'			=>			1,
	'choices'			=>			array(
		'round'			=>			esc_attr__( 'Round', 'xt-framework' ),
		'square'		=>			esc_attr__( 'Square', 'xt-framework' ),
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_loop_sale_position',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Sale Alignment
Kirki::add_field( 'xt', array(
	'type'				=>			'radio-image',
	'settings'			=>			'woocommerce_loop_sale_alignment',
	'label'				=>			esc_attr__( 'Alignment', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'left',
	'priority'			=>			30,
	'multiple'			=>			1,
	'choices'			=>			array(
		'left'			=>			XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
		'center'		=>			XT_THEME_URI . '/inc/customizer/img/align-center.jpg',
		'right'			=>			XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_loop_sale_position',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Sale Badge Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
	'settings'			=>			'woocommerce_loop_sale_font_size',
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'priority'			=>			30,
	'default'			=>			'14px',
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_loop_sale_position',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Sale Badge Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_loop_sale_font_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'default'			=>			'#fff',
	'priority'			=>			30,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_loop_sale_position',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Sale Badge Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_loop_sale_background_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'default'			=>			'#4fe190',
	'priority'			=>			30,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_loop_sale_position',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-37611',
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			30,
) );

// Title Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Title Font Size', 'xt-framework' ),
	'settings'			=>			'woocommerce_loop_title_size',
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'priority'			=>			30,
	'default'			=>			'16px',
) );

// Title Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_loop_title_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'default'			=>			'#3e4349',
	'priority'			=>			30,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-58256',
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			30,
) );

// Price Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Price Font Size', 'xt-framework' ),
	'settings'			=>			'woocommerce_loop_price_size',
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'priority'			=>			30,
	'default'			=>			'16px',
) );

// Price Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_loop_price_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'default'			=>			'#3e4349',
	'priority'			=>			30,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-91969',
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			30,
) );

// Out of Stock Notice
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_loop_out_of_stock_notice',
	'label'				=>			esc_attr__( 'Out of Stock Notice', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'default'			=>			'show',
	'priority'			=>			30,
	'multiple'			=>			1,
	'choices'			=>			array(
		'show'			=>			esc_attr__( 'Show', 'xt-framework' ),
		'hide'			=>			esc_attr__( 'Hide', 'xt-framework' ),
	)
) );

// Out of Stock Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
	'settings'			=>			'woocommerce_loop_out_of_stock_font_size',
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'priority'			=>			30,
	'default'			=>			'14px',
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_loop_out_of_stock_notice',
		'operator'		=>			'!=',
		'value'			=>			'hide',
		),
	)
) );

// Out of Stock Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_loop_out_of_stock_font_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'default'			=>			'#fff',
	'priority'			=>			30,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_loop_out_of_stock_notice',
		'operator'		=>			'!=',
		'value'			=>			'hide',
		),
	)
) );

// Out of Stock Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_loop_out_of_stock_background_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'woocommerce_product_catalog',
	'transport'			=>			'postMessage',
	'default'			=>			'rgba(0,0,0,.7)',
	'priority'			=>			30,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_loop_out_of_stock_notice',
		'operator'		=>			'!=',
		'value'			=>			'hide',
		),
	)
) );

/* Fields – Product Page */

$product_priority = 0;

// Custom Width
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Custom Content Width', 'xt-framework' ),
	'settings'			=>			'woocommerce_single_custom_width',
	'section'			=>			'xt_woocommerce_product_options',
	'description'		=>			esc_attr__( 'Default: 1200px', 'xt-framework' ),
	'priority'			=>			$product_priority++,
	'transport'			=>			'postMessage'
) );

// Alignment
Kirki::add_field( 'xt', array(
	'type'				=>			'radio-image',
	'settings'			=>			'woocommerce_single_alignment',
	'label'				=>			esc_attr__( 'Image Alignment', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'left',
	'priority'			=>			$product_priority++,
	'multiple'			=>			1,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'left'			=>			XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
		'right'			=>			XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
	)
) );

// Image Container Width
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'woocommerce_single_image_width',
	'label'				=>			esc_attr__( 'Image Width', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'priority'			=>			$product_priority++,
	'default'			=>			50,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'25',
		'max'			=>			'75',
		'step'			=>			'1',
	),
) );

// Summary Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_single_summary_separator',
	'label'				=>			esc_attr__( 'Summary Separator', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'hide',
	'priority'			=>			$product_priority++,
	'choices'			=>			array(
		'hide'			=>			esc_attr__( 'Hide', 'xt-framework' ),
		'show'			=>			esc_attr__( 'Show', 'xt-framework' ),
	)
) );

// Price Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Price Font Size', 'xt-framework' ),
	'settings'			=>			'woocommerce_single_price_size',
	'section'			=>			'xt_woocommerce_product_options',
	'transport'			=>			'postMessage',
	'priority'			=>			$product_priority++,
	'default'			=>			'22px',
) );

// Price Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_single_price_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'transport'			=>			'postMessage',
	'default'			=>			'#3e4349',
	'priority'			=>			$product_priority++,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-45153',
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			$product_priority++,
) );

// Tabs Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_single_tabs',
	'label'				=>			esc_attr__( 'Tabs Layout', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'default',
	'priority'			=>			$product_priority++,
	'multiple'			=>			1,
	'choices'			=>			array(
		'default'		=>			esc_attr__( 'Default', 'xt-framework' ),
		'modern'		=>			esc_attr__( 'Modern', 'xt-framework' ),
	)
) );

// Tabs Headlines
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_single_tabs_remove_headline',
	'label'				=>			esc_attr__( 'Headlines', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'show',
	'priority'			=>			$product_priority++,
	'choices'			=>			array(
		'hide'			=>			esc_attr__( 'Hide', 'xt-framework' ),
		'show'			=>			esc_attr__( 'Show', 'xt-framework' ),
	)
) );

// Tabs Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
	'settings'			=>			'woocommerce_single_tabs_font_size',
	'section'			=>			'xt_woocommerce_product_options',
	'transport'			=>			'postMessage',
	'priority'			=>			$product_priority++,
	'default'			=>			'16px',
) );

// Tabs Font Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_single_tabs_font_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'#3e4349',
	'priority'			=>			$product_priority++,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Tabs Hover Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_single_tabs_font_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'',
	'priority'			=>			$product_priority++,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Tabs Active Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_single_tabs_font_color_active',
	'label'				=>			esc_attr__( 'Active', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'',
	'priority'			=>			$product_priority++,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Tabs Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_single_tabs_background_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'#e7e7ec',
	'priority'			=>			$product_priority++,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_single_tabs',
		'operator'		=>			'!=',
		'value'			=>			'modern',
		),
	)
) );

// Tabs Background Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_single_tabs_background_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'#f5f5f7',
	'priority'			=>			$product_priority++,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_single_tabs',
		'operator'		=>			'!=',
		'value'			=>			'modern',
		),
	)
) );

// Tabs Background Color Active
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_single_tabs_background_color_active',
	'label'				=>			esc_attr__( 'Active', 'xt-framework' ),
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'#ffffff',
	'priority'			=>			$product_priority++,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'woocommerce_single_tabs',
		'operator'		=>			'!=',
		'value'			=>			'modern',
		),
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-9987953',
	'section'			=>			'xt_woocommerce_product_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			$product_priority++,
) );

Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'woocommerce_single_add_to_cart_ajax',
	'label'				=>			esc_attr__( 'Enable AJAX add to cart button', 'xt-framework' ),
	'section'			=> 			'xt_woocommerce_product_options',
	'priority'			=>			$product_priority++,
	'default'			=>			false,
) );

/* Fields – Checkout Page */

// Alignment
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'woocommerce_checkout_layout',
	'label'				=>			esc_attr__( 'Layout', 'xt-framework' ),
	'section'			=>			'woocommerce_checkout',
	'default'			=>			'default',
	'priority'			=>			1,
	'multiple'			=>			1,
	'choices'			=>			array(
		'default'		=>			esc_attr__( 'Default', 'xt-framework' ),
		'side'			=>			esc_attr__( 'Side by Side', 'xt-framework' )
	)
) );

Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-82245',
	'section'			=>			'woocommerce_checkout',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			2,
) );

/* Fields – Messages/Notices */

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-06205833',
	'section'			=>			'woocommerce_store_notice',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			100,
) );

// Store Notice Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_store_notice_color',
	'label'				=>			esc_attr__( 'Store Notice', 'xt-framework' ),
	'section'			=>			'woocommerce_store_notice',
	'default'			=>			'',
	'priority'			=>			100,
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );

// Info Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_info_notice_color',
	'label'				=>			esc_attr__( 'Info Notice', 'xt-framework' ),
	'section'			=>			'woocommerce_store_notice',
	'default'			=>			'',
	'priority'			=>			100,
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );

// Message Color (Success)
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_message_notice_color',
	'label'				=>			esc_attr__( 'Success Notice', 'xt-framework' ),
	'section'			=>			'woocommerce_store_notice',
	'default'			=>			'',
	'priority'			=>			100,
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );

// Error Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'woocommerce_error_notice_color',
	'label'				=>			esc_attr__( 'Error Notice', 'xt-framework' ),
	'section'			=>			'woocommerce_store_notice',
	'default'			=>			'',
	'priority'			=>			100,
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );
