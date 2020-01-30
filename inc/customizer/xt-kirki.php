<?php
/**
 * kirki
 *
 * @package XT Framework
 * @subpackage Customizer
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Textdomain
 *
 * Required. Otherwise, strings cannot be translated.
 */
load_theme_textdomain( 'xt-framework', get_template_directory() . '/languages' );

// Default Font Choice
function xt_default_font_choices(){
	return array(
		'fonts' => apply_filters( 'xt_kirki_font_choices', array() )
	);
}

/**
 * Setup
 */
function xt_customizer_setup( $wp_customize ) {

	// move sections
	$wp_customize->get_section( 'title_tagline' )-> panel ='header_panel';
	$wp_customize->get_section( 'background_image' )-> panel ='layout_panel';

	// move controls
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	// change section title
	$wp_customize->get_section( 'title_tagline' )->title = esc_attr__( 'Logo', 'xt-framework' );
	$wp_customize->get_section( 'background_image' )->title = esc_attr__( 'Background', 'xt-framework' );

	// change panel priority
	$wp_customize->get_panel( 'nav_menus' )->priority = 40;

	// change section priority
	$wp_customize->get_section( 'background_image' )->priority = 200;

	// change control priority
	$wp_customize->get_control( 'custom_logo' )->priority = 0;
	$wp_customize->get_control( 'blogname' )->priority = 9;
	$wp_customize->get_control( 'blogdescription' )->priority = 19;

}
add_action( 'customize_register' , 'xt_customizer_setup', 20 );

/* kirki Configuration */
Kirki::add_config( 'xt', array(
	'capability'        => 'edit_theme_options',
	'option_type'       => 'theme_mod',
	'gutenberg_support' => true,
	'disable_output'    => true
) );


// General
Kirki::add_panel( 'layout_panel', array(
	'priority'			=>		2,
	'title'				=>		esc_attr__( 'General', 'xt-framework' ),
) );

// Blog
Kirki::add_panel( 'blog_panel', array(
	'priority'			=>		2,
	'title'				=>		esc_attr__( 'Blog', 'xt-framework' ),
) );

// Typography
Kirki::add_panel( 'typo_panel', array(
	'priority'			=>		3,
	'title'				=>		esc_attr__( 'Typography', 'xt-framework' ),
) );

// Header
Kirki::add_panel( 'header_panel', array(
	'priority'			=>		4,
	'title'				=>		esc_attr__( 'Header', 'xt-framework' ),
) );

// Footer
Kirki::add_section( 'xt_footer_options', array(
	'title'				=>		esc_attr__( 'Footer', 'xt-framework' ),
	'priority'			=>		5,
) );

/* Sections – Typography */

// Title / Tagline
Kirki::add_section( 'xt_title_tagline_options', array(
	'title'				=>			esc_attr__( 'Site Title / Tagline', 'xt-framework' ),
	'panel'				=>			'typo_panel',
	'priority'			=>			0,
) );

// Text
Kirki::add_section( 'xt_font_options', array(
	'title'				=>			esc_attr__( 'Text', 'xt-framework' ),
	'panel'				=>			'typo_panel',
	'priority'			=>			50,
) );

// Menu
Kirki::add_section( 'xt_menu_font_options', array(
	'title'				=>			esc_attr__( 'Menu', 'xt-framework' ),
	'panel'				=>			'typo_panel',
	'priority'			=>			100,
) );

// H1
Kirki::add_section( 'xt_h1_options', array(
	'title'				=>			esc_attr__( 'H1', 'xt-framework' ),
	'panel'				=>			'typo_panel',
	'priority'			=>			200,
) );

// H2
Kirki::add_section( 'xt_h2_options', array(
	'title'				=>			esc_attr__( 'H2', 'xt-framework' ),
	'panel'				=>			'typo_panel',
	'priority'			=>			300,
) );

// H3
Kirki::add_section( 'xt_h3_options', array(
	'title'				=>			esc_attr__( 'H3', 'xt-framework' ),
	'panel'				=>			'typo_panel',
	'priority'			=>			400,
) );

// H4
Kirki::add_section( 'xt_h4_options', array(
	'title'				=>			esc_attr__( 'H4', 'xt-framework' ),
	'panel'				=>			'typo_panel',
	'priority'			=>			500,
) );

// H5
Kirki::add_section( 'xt_h5_options', array(
	'title'				=>			esc_attr__( 'H5', 'xt-framework' ),
	'panel'				=>			'typo_panel',
	'priority'			=>			600,
) );

// H6
Kirki::add_section( 'xt_h6_options', array(
	'title'				=>			esc_attr__( 'H6', 'xt-framework' ),
	'panel'				=>			'typo_panel',
	'priority'			=>			700,
) );

/* Sections – General */

// Site Layout
Kirki::add_section( 'xt_page_options', array(
	'title'				=>			esc_attr__( 'Layout', 'xt-framework' ),
	'panel'				=>			'layout_panel',
	'priority'			=>			100,
) );

// Accent Color
Kirki::add_section( 'xt_accent_options', array(
	'title'				=>			esc_attr__( 'Accent Color', 'xt-framework' ),
	'panel'				=>			'layout_panel',
	'priority'			=>			200,
) );

// Buttons
Kirki::add_section( 'xt_button_options', array(
	'title'				=>			esc_attr__( 'Theme Buttons', 'xt-framework' ),
	'panel'				=>			'layout_panel',
	'priority'			=>			300,
) );

// Sidebar
Kirki::add_section( 'xt_sidebar_options', array(
	'title'				=>			esc_attr__( 'Sidebar', 'xt-framework' ),
	'panel'				=>			'layout_panel',
	'priority'			=>			400,
) );

// Breadcrumbs
Kirki::add_section( 'xt_breadcrumb_settings', array(
	'title'				=>			esc_attr__( 'Breadcrumbs', 'xt-framework' ),
	'panel'				=>			'layout_panel',
	'priority'			=>			600,
) );

// 404
Kirki::add_section( 'xt_404_options', array(
	'title'				=>			esc_attr__( '404 Page', 'xt-framework' ),
	'panel'				=>			'layout_panel',
	'priority'			=>			700,
) );

/* Sections – Blog */

// General
Kirki::add_section( 'xt_blog_settings', array(
	'title'				=>			esc_attr__( 'General', 'xt-framework' ),
	'panel'				=>			'blog_panel',
	'priority'			=>			100,
) );

// Pagination
Kirki::add_section( 'xt_pagination_settings', array(
	'title'				=>			esc_attr__( 'Pagination', 'xt-framework' ),
	'panel'				=>			'blog_panel',
	'priority'			=>			100,
) );

// Archive Layout
$archives = apply_filters( 'xt_archives', array( 'archive' ) );

foreach ( $archives as $archive ) {

	$checkbox_title = $archive;

	if( $checkbox_title == 'archive' ) {
		$checkbox_title = __( 'Blog / Archive', 'xt-framework' );
	}

	if( $checkbox_title == 'search' ) {
		$checkbox_title = __( 'Search Results', 'xt-framework' );
	}

	Kirki::add_section( 'xt_' . $archive . '_options', array(
		'title'				=>			ucwords( str_replace( '-', ' ', $checkbox_title ) ) . '&nbsp;' . esc_attr__( 'Layout', 'xt-framework' ),
		'panel'				=>			'blog_panel',
		'priority'			=>			100,
	) );

}

// Post Layout
Kirki::add_section( 'xt_single_options', array(
	'title'				=>			esc_attr__( 'Post Layout', 'xt-framework' ),
	'panel'				=>			'blog_panel',
	'priority'			=>			100,
) );

/* Sections – Header */

// Navigation
Kirki::add_section( 'xt_menu_options', array(
	'title'				=>			esc_attr__( 'Navigation', 'xt-framework' ),
	'panel'				=>			'header_panel',
	'priority'			=>			200,
) );

// Sub Menu
Kirki::add_section( 'xt_sub_menu_options', array(
	'title'				=>			esc_attr__( 'Sub Menu', 'xt-framework' ),
	'panel'				=>			'header_panel',
	'priority'			=>			600,
) );

// Mobile Menu
Kirki::add_section( 'xt_mobile_menu_options', array(
	'title'				=>			esc_attr__( 'Mobile Navigation', 'xt-framework' ),
	'panel'				=>			'header_panel',
	'priority'			=>			700,
) );

// Pre Header
Kirki::add_section( 'xt_pre_header_options', array(
	'title'				=>			esc_attr__( 'Pre Header', 'xt-framework' ),
	'panel'				=>			'header_panel',
	'priority'			=>			800,
) );

/* Fields – Breadcrumb Settings */

// Activate
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'breadcrumbs_toggle',
	'label'				=>			esc_attr__( 'Breadcrumbs', 'xt-framework' ),
	'section'			=>			'xt_breadcrumb_settings',
	'default'			=>			0,
	'priority'			=>			1,
) );

// Breadcrumbs
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'breadcrumbs',
	'label'				=>			esc_attr__( 'Display Breadcrumbs on', 'xt-framework' ),
	'section'			=>			'xt_breadcrumb_settings',
	'default'			=>			array( 'archive', 'single' ),
	'priority'			=>			2,
	'multiple'			=>			6,
	'choices'			=>			array(
		'front_page'	=>			esc_attr__( 'Front Page', 'xt-framework' ),
		'archive'		=>			esc_attr__( 'Archives', 'xt-framework' ),
		'single'		=>			esc_attr__( 'Single', 'xt-framework' ),
		'search'		=>			esc_attr__( 'Search Page', 'xt-framework' ),
		'404'			=>			esc_attr__( '404 Page', 'xt-framework' ),
		'page'			=>			esc_attr__( 'Pages', 'xt-framework' ),
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'breadcrumbs_toggle',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Position
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'breadcrumbs_position',
	'label'				=>			esc_attr__( 'Position', 'xt-framework' ),
	'section'			=>			'xt_breadcrumb_settings',
	'default'			=>			'content',
	'priority'			=>			2,
	'multiple'			=>			1,
	'choices'			=>			array(
		'content'		=>			esc_attr__( 'Before Content', 'xt-framework' ),
		'header'		=>			esc_attr__( 'Below Header', 'xt-framework' ),
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'breadcrumbs_toggle',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Alignment
Kirki::add_field( 'xt', array(
	'type'				=>			'radio-image',
	'settings'			=>			'breadcrumbs_alignment',
	'label'				=>			esc_attr__( 'Alignment', 'xt-framework' ),
	'section'			=>			'xt_breadcrumb_settings',
	'default'			=>			'left',
	'priority'			=>			2,
	'multiple'			=>			1,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'left'			=>			XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
		'center'		=>			XT_THEME_URI . '/inc/customizer/img/align-center.jpg',
		'right'			=>			XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'breadcrumbs_toggle',
		'operator'		=>			'==',
		'value'			=>			1,
		),
		array(
		'setting'		=>			'breadcrumbs_position',
		'operator'		=>			'==',
		'value'			=>			'header',
		),
	),
) );

// Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'breadcrumbs_background_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_breadcrumb_settings',
	'default'			=>			'#dedee5;',
	'priority'			=>			2,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'breadcrumbs_toggle',
		'operator'		=>			'==',
		'value'			=>			1,
		),
		array(
		'setting'		=>			'breadcrumbs_position',
		'operator'		=>			'==',
		'value'			=>			'header',
		),
	),
) );

// Font Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'breadcrumbs_font_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_breadcrumb_settings',
	'priority'			=>			2,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'breadcrumbs_toggle',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Accent Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'breadcrumbs_accent_color',
	'label'				=>			esc_attr__( 'Accent Color', 'xt-framework' ),
	'section'			=>			'xt_breadcrumb_settings',
	'priority'			=>			2,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'breadcrumbs_toggle',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Accent Color Hover
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'breadcrumbs_accent_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_breadcrumb_settings',
	'priority'			=>			2,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'breadcrumbs_toggle',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'text',
	'settings'			=>			'breadcrumbs_separator',
	'label'				=>			esc_attr__( 'Separator', 'xt-framework' ),
	'section'			=>			'xt_breadcrumb_settings',
	'default'			=>			'/',
	'priority'			=>			2,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'breadcrumbs_toggle',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

/* Fields – Blog */

// Meta Sortable
Kirki::add_field( 'xt', array(
	'type'				=>			'sortable',
	'settings'			=>			'blog_sortable_meta',
	'label'				=>			esc_attr__( 'Meta Data', 'xt-framework' ),
	'section'			=>			'xt_blog_settings',
	'default'			=>			array(
		'author',
		'date',
	),
	'choices'			=> array(
		'author'		=>			esc_attr__( 'Author', 'xt-framework' ),
		'date'			=>			esc_attr__( 'Date', 'xt-framework' ),
		'comments'		=>			esc_attr__( 'Comments', 'xt-framework' ),
	),
	'priority'			=>			1,
) );

// Alt Tag
Kirki::add_field( 'xt', array(
	'type'				=>			'text',
	'settings'			=>			'blog_meta_separator',
	'label'				=>			esc_attr__( 'Separator', 'xt-framework' ),
	'section'			=>			'xt_blog_settings',
	'priority'			=>			1,
	'default'			=>			'|',
) );

// Alt Tag
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'blog_author_avatar',
	'label'				=>			esc_attr__( 'Author Avatar', 'xt-framework' ),
	'section'			=>			'xt_blog_settings',
	'priority'			=>			1,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'blog_sortable_meta',
		'operator'		=>			'in',
		'value'			=>			'author',
		),
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-101053674',
	'section'			=>			'xt_blog_settings',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			1,
) );

// Excerpt Length
Kirki::add_field( 'xt', array(
	'type'				=>			'number',
	'settings'			=>			'excerpt_lenght',
	'label'				=>			esc_attr__( 'Excerpt Length', 'xt-framework' ),
	'description'		=>			esc_attr__( 'By default the excerpt length is set to return 55 words.', 'xt-framework' ),
	'default'			=>			'55',
	'section'			=>			'xt_blog_settings',
	'priority'			=>			1,
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'100',
		'step'			=>			'1',
	),
) );

// Read More Button
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'blog_read_more_link',
	'label'				=>			esc_attr__( 'Read More Link', 'xt-framework' ),
	'section'			=>			'xt_blog_settings',
	'default'			=>			'button',
	'priority'			=>			1,
	'multiple'			=>			1,
	'choices'			=>			array(
		'text'			=>			esc_attr__( 'Text', 'xt-framework' ),
		'button'		=>			esc_attr__( 'Button', 'xt-framework' ),
		'primary'		=>			esc_attr__( 'Button (Primary)', 'xt-framework' ),
	),
) );

// Read More Text
Kirki::add_field( 'xt', array(
	'type'				=>			'text',
	'settings'			=>			'blog_read_more_text',
	'label'				=>			esc_attr__( 'Read More Text', 'xt-framework' ),
	'section'			=>			'xt_blog_settings',
	'default'			=>			'Read more',
	'priority'			=>			2,
) );

// Categories Title
Kirki::add_field( 'xt', array(
	'type'				=>			'text',
	'settings'			=>			'blog_categories_title',
	'label'				=>			esc_attr__( 'Categories Title', 'xt-framework' ),
	'section'			=>			'xt_blog_settings',
	'default'			=>			'Filed under:',
	'priority'			=>			2,
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-23124507',
	'section'			=>			'xt_blog_settings',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			2,
) );

// Border Radius
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'blog_pagination_border_radius',
	'label'				=>			esc_attr__( 'Border Radius', 'xt-framework' ),
	'section'			=>			'xt_pagination_settings',
	'priority'			=>			2,
	'default'			=>			'0',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'100',
		'step'			=>			'1',
	),
) );

// Pagination Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'blog_pagination_background_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_pagination_settings',
	'transport'			=>			'postMessage',
	'priority'			=>			2,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Pagination Background Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'blog_pagination_background_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_pagination_settings',
	'priority'			=>			2,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Pagination Background Color Active
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'blog_pagination_background_color_active',
	'label'				=>			esc_attr__( 'Active', 'xt-framework' ),
	'section'			=>			'xt_pagination_settings',
	'transport'			=>			'postMessage',
	'priority'			=>			2,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Pagination Font Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'blog_pagination_font_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_pagination_settings',
	'transport'			=>			'postMessage',
	'priority'			=>			2,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Pagination Hover Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'blog_pagination_font_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_pagination_settings',
	'default'			=>			'',
	'priority'			=>			2,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Pagination Active Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'blog_pagination_font_color_active',
	'label'				=>			esc_attr__( 'Active', 'xt-framework' ),
	'section'			=>			'xt_pagination_settings',
	'transport'			=>			'postMessage',
	'default'			=>			'',
	'priority'			=>			2,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Pagination Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'input_slider',
	'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
	'settings'			=>			'blog_pagination_font_size',
	'section'			=>			'xt_pagination_settings',
	'transport'			=>			'postMessage',
	'priority'			=>			2,
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'100',
		'step'			=>			'1',
	),
) );

foreach ( $archives as $archive ) {

	// Width
	Kirki::add_field( 'xt', array(
		'type'				=>			'dimension',
		'label'				=>			esc_attr__( 'Custom Content Width', 'xt-framework' ),
		'settings'			=>			$archive . '_custom_width',
		'section'			=>			'xt_' . $archive . '_options',
		'description'		=>			esc_attr__( 'Default: 1200px', 'xt-framework' ),
		'priority'			=>			0
	) );

	if( $archive !== 'blog' && $archive !== 'search' ) {

	// Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			$archive .'_headline',
		'label'				=>			ucwords( str_replace( '-', ' ', $archive ) ) . '&nbsp;' . esc_attr__( 'Headline', 'xt-framework' ),
		'section'			=>			'xt_'. $archive .'_options',
		'default'			=>			'show',
		'priority'			=>			0,
		'multiple'			=>			1,
		'choices'			=>			array(
			'show'			=>			esc_attr__( 'Show', 'xt-framework' ),
			'hide'			=>			esc_attr__( 'Hide', 'xt-framework' ),
			'hide_prefix'	=>			esc_attr__( 'Remove Prefix', 'xt-framework' ),
		),
	) );

	}

	// Sidebar Layout
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			$archive . '_sidebar_layout',
		'label'				=>			__( 'Sidebar', 'xt-framework' ),
		'section'			=>			'xt_'. $archive . '_options',
		'default'			=>			'global',
		'priority'			=>			0,
		'multiple'			=>			1,
		'choices'			=>			array(
			'global'		=>			esc_attr__( 'Inherit Global Settings', 'xt-framework' ),
			'right'			=>			esc_attr__( 'Right', 'xt-framework' ),
			'left'			=>			esc_attr__( 'Left', 'xt-framework' ),
			'none'			=>			esc_attr__( 'No Sidebar', 'xt-framework' ),
		),
	) );

	// Separator
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			$archive . '-separator-74767',
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			0,
	) );

	// Header
	Kirki::add_field( 'xt', array(
		'type'				=>			'sortable',
		'settings'			=>			$archive . '_sortable_header',
		'label'				=>			esc_attr__( 'Header', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			array(
			'title',
			'meta',
			'featured'
		),
		'choices'			=> array(
			'title'			=>			esc_attr__( 'Title', 'xt-framework' ),
			'meta'			=>			esc_attr__( 'Meta Data', 'xt-framework' ),
			'featured'		=>			esc_attr__( 'Featured Image', 'xt-framework' ),
		),
		'priority'			=>			0,
	) );

	// Footer
	Kirki::add_field( 'xt', array(
		'type'				=>			'sortable',
		'settings'			=>			$archive . '_sortable_footer',
		'label'				=>			esc_attr__( 'Footer', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			array(
			'readmore',
			'categories',
		),
		'choices'			=> array(
			'readmore'		=>			esc_attr__( 'Read More', 'xt-framework' ),
			'categories'	=>			esc_attr__( 'Categories', 'xt-framework' ),
			'tags'			=>			esc_attr__( 'Tags', 'xt-framework' ),
		),
		'priority'			=>			0,
	) );

	// Separator
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			$archive . '-separator-26125',
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			0,
	) );

	// Layout
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			$archive . '_layout',
		'label'				=>			esc_attr__( 'Layout', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			'default',
		'priority'			=>			10,
		'multiple'			=>			1,
		'choices'			=>			apply_filters( 'xt_blog_layouts', array(
			'default'		=>			esc_attr__( 'Default', 'xt-framework' ),
			'beside'		=>			esc_attr__( 'Image Beside Post', 'xt-framework' ),
		) ),
	) );

	// Style
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			$archive . '_post_style',
		'label'				=>			esc_attr__( 'Style', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			'plain',
		'priority'			=>			20,
		'multiple'			=>			1,
		'choices'			=>			array(
			'plain'			=>			esc_attr__( 'Plain', 'xt-framework' ),
			'boxed'			=>			esc_attr__( 'Boxed', 'xt-framework' ),
		),
	) );

	// Stretch Image
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			$archive . '_boxed_image_streched',
		'label'				=>			esc_attr__( 'Stretch Featured Image', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			0,
		'priority'			=>			20,
		'active_callback'	=>			array(
			array(
			'setting'		=>			$archive . '_post_style',
			'operator'		=>			'==',
			'value'			=>			'boxed',
			),
			array(
			'setting'		=>			$archive . '_layout',
			'operator'		=>			'!=',
			'value'			=>			'beside',
			),

		),
	) );

	// Space Between
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'label'				=>			esc_attr__( 'Space Between', 'xt-framework' ),
		'settings'			=>			$archive . '_post_space_between',
		'section'			=>			'xt_' . $archive . '_options',
		'priority'			=>			30,
		'default'			=>			20,
		'choices'			=>			array(
			'min'			=>			'0',
			'max'			=>			'100',
			'step'			=>			'1',
		),
	) );

	/* All Layouts */

	// Alignment
	Kirki::add_field( 'xt', array(
		'type'				=>			'radio-image',
		'settings'			=>			$archive . '_post_content_alignment',
		'label'				=>			esc_attr__( 'Content Alignment', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			'left',
		'priority'			=>			40,
		'multiple'			=>			1,
		'choices'			=>			array(
			'left'			=>			XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
			'center'		=>			XT_THEME_URI . '/inc/customizer/img/align-center.jpg',
			'right'			=>			XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
		),
	) );

	// Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			$archive . '_post_background_color',
		'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			'#f5f5f7',
		'priority'			=>			50,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			$archive . '_post_style',
			'operator'		=>			'==',
			'value'			=>			'boxed',
			),
		),
	) );

	// Accent Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			$archive . '_post_accent_color',
		'label'				=>			esc_attr__( 'Accent Color', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'priority'			=>			60,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Hover
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			$archive . '_post_accent_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'priority'			=>			70,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Title Size
	Kirki::add_field( 'xt', array(
		'type'				=>			'input_slider',
		'label'				=>			esc_attr__( 'Title Font Size', 'xt-framework' ),
		'settings'			=>			$archive . '_post_title_size',
		'section'			=>			'xt_' . $archive . '_options',
		'priority'			=>			80,
		'choices'			=>			array(
			'min'			=>			'0',
			'max'			=>			'50',
			'step'			=>			'1',
		),
	) );

	// Font Size
	Kirki::add_field( 'xt', array(
		'type'				=>			'input_slider',
		'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
		'settings'			=>			$archive . '_post_font_size',
		'section'			=>			'xt_' . $archive . '_options',
		'priority'			=>			90,
		'choices'			=>			array(
			'min'			=>			'0',
			'max'			=>			'50',
			'step'			=>			'1',
		),
	) );

	/* Beside */

	// Beside Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			$archive . '-separator-824021',
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Image Beside Post Layout Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			100,
		'active_callback'	=>			array(
			array(
			'setting'		=>			$archive . '_layout',
			'operator'		=>			'==',
			'value'			=>			'beside',
			),
		),
	) );

	// Image Alignment
	Kirki::add_field( 'xt', array(
		'type'				=>			'radio-image',
		'settings'			=>			$archive . '_post_image_alignment',
		'label'				=>			esc_attr__( 'Image Alignment', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'default'			=>			'left',
		'priority'			=>			110,
		'multiple'			=>			1,
		'choices'			=>			array(
			'left'			=>			XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
			'right'			=>			XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			$archive . '_layout',
			'operator'		=>			'==',
			'value'			=>			'beside',
			),
		),
	) );

	// Image Width
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			$archive . '_post_image_width',
		'label'				=>			esc_attr__( 'Image Width', 'xt-framework' ),
		'section'			=>			'xt_' . $archive . '_options',
		'priority'			=>			120,
		'default'			=>			40,
		'choices'			=>			array(
			'min'			=>			'20',
			'max'			=>			'80',
			'step'			=>			'1',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			$archive . '_layout',
			'operator'		=>			'==',
			'value'			=>			'beside',
			),
		),
	) );

}

/* Fields – Blog (Single) */

// Width
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Custom Content Width', 'xt-framework' ),
	'settings'			=>			'single_custom_width',
	'section'			=>			'xt_single_options',
	'description'		=>			esc_attr__( 'Default: 1200px', 'xt-framework' ),
	'priority'			=>			0,
	'transport'			=>			'postMessage'
) );

// Sidebar Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'single_sidebar_layout',
	'label'				=>			__( 'Sidebar', 'xt-framework' ),
	'section'			=>			'xt_single_options',
	'default'			=>			'global',
	'priority'			=>			0,
	'multiple'			=>			1,
	'choices'			=>			array(
		'global'		=>			esc_attr__( 'Inherit Global Settings', 'xt-framework' ),
		'right'			=>			esc_attr__( 'Right', 'xt-framework' ),
		'left'			=>			esc_attr__( 'Left', 'xt-framework' ),
		'none'			=>			esc_attr__( 'No Sidebar', 'xt-framework' ),
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'single-separator-74767',
	'section'			=>			'xt_single_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			0,
) );

// Header
Kirki::add_field( 'xt', array(
	'type'				=>			'sortable',
	'settings'			=>			'single_sortable_header',
	'label'				=>			esc_attr__( 'Header', 'xt-framework' ),
	'section'			=>			'xt_single_options',
	'default'			=>			array(
		'title',
		'meta',
		'featured'
	),
	'choices'			=> array(
		'title'			=>			esc_attr__( 'Title', 'xt-framework' ),
		'meta'			=>			esc_attr__( 'Meta Data', 'xt-framework' ),
		'featured'		=>			esc_attr__( 'Featured Image', 'xt-framework' ),
	),
	'priority'			=>			0,
) );

// Footer
Kirki::add_field( 'xt', array(
	'type'				=>			'sortable',
	'settings'			=>			'single_sortable_footer',
	'label'				=>			esc_attr__( 'Footer', 'xt-framework' ),
	'section'			=>			'xt_single_options',
	'default'			=>			array(
		'readmore',
		'categories',
	),
	'choices'			=> array(
		'readmore'		=>			esc_attr__( 'Read More', 'xt-framework' ),
		'categories'	=>			esc_attr__( 'Categories', 'xt-framework' ),
		'tags'			=>			esc_attr__( 'Tags', 'xt-framework' ),
	),
	'priority'			=>			0,
) );

// Post Navigation
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'single_post_nav',
	'label'				=>			esc_attr__( 'Post Navigation', 'xt-framework' ),
	'section'			=>			'xt_single_options',
	'default'			=>			'show',
	'priority'			=>			0,
	'multiple'			=>			1,
	'choices'			=>			array(
		'show'			=>			esc_attr__( 'Previous/Next Post', 'xt-framework' ),
		'default'		=>			esc_attr__( 'Post Title', 'xt-framework' ),
		'hide'			=>			esc_attr__( 'Hide', 'xt-framework' ),
	),
) );

/* Fields – General */

// 404 Title
Kirki::add_field( 'xt', array(
	'type'				=>			'text',
	'label'				=>			esc_attr__( 'Title', 'xt-framework' ),
	'settings'			=>			'404_headline',
	'section'			=>			'xt_404_options',
	'default'			=>			esc_html__( "404 - This page couldn't be found.", "xt-framework" ),
	'priority'			=>			1,
) );

// 404 Text
Kirki::add_field( 'xt', array(
	'type'				=>			'text',
	'label'				=>			esc_attr__( 'Text', 'xt-framework' ),
	'settings'			=>			'404_text',
	'section'			=>			'xt_404_options',
	'default'			=>			esc_html__( "Oops! We're sorry, this page couldn't be found!", "xt-framework" ),
	'priority'			=>			2,
) );

// Search Form
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'404_search_form',
	'label'				=>			esc_attr__( 'Search Form', 'xt-framework' ),
	'section'			=>			'xt_404_options',
	'default'			=>			'show',
	'priority'			=>			3,
	'multiple'			=>			1,
	'choices'			=>			array(
		'show'			=>			esc_attr__( 'Show', 'xt-framework' ),
		'hide'			=>			esc_attr__( 'Hide', 'xt-framework' ),
	),
) );

// Max Width
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Page Width', 'xt-framework' ),
	'settings'			=>			'page_max_width',
	'section'			=>			'xt_page_options',
	'description'		=>			esc_attr__( 'Default: 1200px', 'xt-framework' ),
	'priority'			=>			1,
) );

// Boxed
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'page_boxed',
	'label'				=>			esc_attr__( 'Boxed', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'default'			=>			0,
	'priority'			=>			2,
) );

// Boxed Margin
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'page_boxed_margin',
	'label'				=>			esc_attr__( 'Margin', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			3,
	'default'			=>			0,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'80',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_boxed',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Boxed Padding
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'page_boxed_padding',
	'label'				=>			esc_attr__( 'Padding', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			4,
	'default'			=>			20,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'20',
		'max'			=>			'100',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_boxed',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'page_boxed_background',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'default'			=>			'#ffffff',
	'priority'			=>			5,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'alpha'		=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_boxed',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Box Shadow
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'page_boxed_box_shadow',
	'label'				=>			esc_attr__( 'Box Shadow', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'default'			=>			0,
	'priority'			=>			6,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_boxed',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Box Shadow Blur
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'page_boxed_box_shadow_blur',
	'label'				=>			esc_attr__( 'Blur', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			7,
	'default'			=>			25,
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'100',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_boxed',
		'operator'		=>			'==',
		'value'			=>			1,
		),
		array(
		'setting'		=>			'page_boxed_box_shadow',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Box Shadow Spread
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'page_boxed_box_shadow_spread',
	'label'				=>			esc_attr__( 'Spread', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			8,
	'default'			=>			0,
	'choices'			=>			array(
		'min'			=>			'-100',
		'max'			=>			'100',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_boxed',
		'operator'		=>			'==',
		'value'			=>			1,
		),
		array(
		'setting'		=>			'page_boxed_box_shadow',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Box Shadow Horizontal
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'page_boxed_box_shadow_horizontal',
	'label'				=>			esc_attr__( 'Horizontal', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			9,
	'default'			=>			0,
	'choices'			=>			array(
		'min'			=>			'-100',
		'max'			=>			'100',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_boxed',
		'operator'		=>			'==',
		'value'			=>			1,
		),
		array(
		'setting'		=>			'page_boxed_box_shadow',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Box Shadow Vertical
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'page_boxed_box_shadow_vertical',
	'label'				=>			esc_attr__( 'Vertical', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			10,
	'default'			=>			0,
	'choices'			=>			array(
		'min'			=>			'-100',
		'max'			=>			'100',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_boxed',
		'operator'		=>			'==',
		'value'			=>			1,
		),
		array(
		'setting'		=>			'page_boxed_box_shadow',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Box Shadow Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'page_boxed_box_shadow_color',
	'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'default'			=>			'rgba(0,0,0,.15)',
	'priority'			=>			11,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_boxed',
		'operator'		=>			'==',
		'value'			=>			1,
		),
		array(
		'setting'		=>			'page_boxed_box_shadow',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-26125',
	'section'			=>			'xt_page_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			12,
) );

// Scrolltop
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'layout_scrolltop',
	'label'				=>			esc_attr__( 'ScrollTop', 'xt-framework' ),
	'description'		=>			esc_attr__( 'Select if you would like to display a scroll to top arrow', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'default'			=>			'0',
	'priority'			=>			13,
) );

// Position
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'scrolltop_position',
	'label'				=>			esc_attr__( 'Position', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'default'			=>			'right',
	'priority'			=>			14,
	'multiple'			=>			1,
	'choices'			=>			array(
		'right'			=>			esc_attr__( 'Right', 'xt-framework' ),
		'left'			=>			esc_attr__( 'Left', 'xt-framework' ),
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'layout_scrolltop',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	)
) );

// Show after
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'scrolltop_value',
	'label'				=>			esc_attr__( 'Show after (px)', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			15,
	'default'			=>			'400',
	'choices'			=>			array(
		'min'			=>			'50',
		'max'			=>			'1000',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'layout_scrolltop',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	)
) );

// Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'scrolltop_bg_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			16,
	'transport'			=>			'postMessage',
	'default'			=>			'rgba(62,67,73,.5)',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'layout_scrolltop',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	)
) );

// Background Color Hover
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'scrolltop_bg_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			17,
	'default'			=>			'rgba(62,67,73,.7)',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'layout_scrolltop',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	)
) );

// Border Radius
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'scrolltop_border_radius',
	'label'				=>			esc_attr__( 'Border Radius', 'xt-framework' ),
	'section'			=>			'xt_page_options',
	'priority'			=>			18,
	'default'			=>			'0',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'100',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'layout_scrolltop',
		'operator'		=>			'==',
		'value'			=>			1,
		),
	)
) );


/* Fields – Sidebar */

// Postion
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'sidebar_position',
	'label'				=>			esc_attr__( 'Sidebar', 'xt-framework' ),
	'section'			=>			'xt_sidebar_options',
	'default'			=>			'right',
	'priority'			=>			1,
	'multiple'			=>			1,
	'choices'			=>			array(
		'right'			=>			esc_attr__( 'Right', 'xt-framework' ),
		'left'			=>			esc_attr__( 'Left', 'xt-framework' ),
		'none'			=>			esc_attr__( 'No Sidebar', 'xt-framework' ),
	),
) );

// Gap
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'sidebar_gap',
	'label'				=>			esc_attr__( 'Gap', 'xt-framework' ),
	'section'			=>			'xt_sidebar_options',
	'default'			=>			'medium',
	'priority'			=>			2,
	'multiple'			=>			1,
	'choices'			=>			array(
		'divider'		=>			esc_attr__( 'Divider', 'xt-framework' ),
		'xlarge'		=>			esc_attr__( 'xLarge', 'xt-framework' ),
		'large'			=>			esc_attr__( 'Large', 'xt-framework' ),
		'medium'		=>			esc_attr__( 'Medium', 'xt-framework' ),
		'small'			=>			esc_attr__( 'Small', 'xt-framework' ),
		'collapse'		=>			esc_attr__( 'Collapse', 'xt-framework' ),
	),
) );

// Width
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'sidebar_width',
	'label'				=>			esc_attr__( 'Width', 'xt-framework' ),
	'section'			=>			'xt_sidebar_options',
	'priority'			=>			2,
	'default'			=>			'33.3',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'20',
		'max'			=>			'40',
		'step'			=>			'.1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'sidebar_position',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-481013',
	'section'			=>			'xt_sidebar_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			2,
) );

// Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'sidebar_bg_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_sidebar_options',
	'default'			=>			'#f5f5f7',
	'priority'			=>			4,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

/* Fields – Accent Color */

// Accent Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'page_accent_color',
	'label'				=>			esc_attr__( 'Accent Color', 'xt-framework' ),
	'section'			=>			'xt_accent_options',
	'priority'			=>			1,
	'default'			=>			'#3ba9d2',
	'choices'			=>			array(
		'alpha'		=>			true,
	),
) );

// Accent Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'page_accent_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_accent_options',
	'priority'			=>			2,
	'default'			=>			'#8ecde5',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

/* Fields – Buttons */

// Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_bg_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Background Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_bg_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Text Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_text_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Text Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_text_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-81461',
	'section'			=>			'xt_button_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			1,
) );

// Primary
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_primary_bg_color',
	'label'				=>			esc_attr__( 'Primary Background Color', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Primary Background Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_primary_bg_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Primary Text Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_primary_text_color',
	'label'				=>			esc_attr__( 'Primary Font Color', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Primary Text Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_primary_text_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-33757',
	'section'			=>			'xt_button_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			1,
) );

// Border Radius
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'button_border_radius',
	'label'				=>			esc_attr__( 'Border Radius', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'default'			=>			'0',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'100',
		'step'			=>			'1',
	),
) );

// Border Width
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'button_border_width',
	'label'				=>			esc_attr__( 'Border Width', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'default'			=>			'0',
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'10',
		'step'			=>			'1',
	),
) );

// Border Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_border_color',
	'label'				=>			esc_attr__( 'Border Color', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'button_border_width',
		'operator'		=>			'!==',
		'value'			=>			'0',
		),
	),
) );

// Border Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_border_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'button_border_width',
		'operator'		=>			'!==',
		'value'			=>			'0',
		),
	),
) );

// Primary Border Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_primary_border_color',
	'label'				=>			esc_attr__( 'Primary Border Color', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'button_border_width',
		'operator'		=>			'!==',
		'value'			=>			'0',
		),
	),
) );

// Primary Border Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'button_primary_border_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_button_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'button_border_width',
		'operator'		=>			'!==',
		'value'			=>			'0',
		),
	),
) );

/* Fields – Typography */

// Text
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'page_font_toggle',
	'label'				=>			esc_attr__( 'Font Settings', 'xt-framework' ),
	'section'			=>			'xt_font_options',
	'default'			=>			0,
	'priority'			=>			0,
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'page_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_font_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'regular',
	),
	'choices'			=>			xt_default_font_choices(),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_font_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	),
	'priority'			=>			1,
) );

// Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'page_font_color',
	'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
	'section'			=>			'xt_font_options',
	'default'			=>			'#6D7680',
	'priority'			=>			2,
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );


// Title / Tagline

// Title Font Toggle
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'menu_logo_font_toggle',
	'label'				=>			esc_attr__( 'Title Font Settings', 'xt-framework' ),
	'section'			=>			'xt_title_tagline_options',
	'default'			=>			0,
	'priority'			=>			0,
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'menu_logo_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_title_tagline_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'700',
		'subsets'		=>			array( 'latin-ext' ),
	),
	'choices'			=>			xt_default_font_choices(),
	'priority'			=>			1,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'menu_logo_font_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-602564',
	'section'			=>			'xt_title_tagline_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			2,
) );

// Tagline Font Toggle
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'menu_logo_description_toggle',
	'label'				=>			esc_attr__( 'Tagline Font Settings', 'xt-framework' ),
	'section'			=>			'xt_title_tagline_options',
	'default'			=>			0,
	'priority'			=>			3,
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'menu_logo_description_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_title_tagline_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'700',
		'subsets'		=>			array( 'latin-ext' ),
	),
	'choices'			=>			xt_default_font_choices(),
	'priority'			=>			4,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'menu_logo_description_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	)
) );

// Menu
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'menu_font_family_toggle',
	'label'				=>			esc_attr__( 'Menu Font Settings', 'xt-framework' ),
	'section'			=>			'xt_menu_font_options',
	'default'			=>			0,
	'priority'			=>			0,
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'menu_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_menu_font_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'regular',
	),
	'choices'			=>			xt_default_font_choices(),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'menu_font_family_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	),
	'priority'			=>			1,
) );


// H1
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'page_h1_toggle',
	'label'				=>			esc_attr__( 'H1 Settings', 'xt-framework' ),
	'section'			=>			'xt_h1_options',
	'default'			=>			0,
	'priority'			=>			0,
	'description'		=>			esc_attr__( "The settings below will apply to all headlines if not configured separately.", "xt-framework" ),
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'page_h1_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_h1_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'700',
	),
	'choices'			=>			xt_default_font_choices(),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_h1_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	),
	'priority'			=>			1,
) );


// H2
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'page_h2_toggle',
	'label'				=>			esc_attr__( 'H2 Settings', 'xt-framework' ),
	'section'			=>			'xt_h2_options',
	'default'			=>			0,
	'priority'			=>			0,
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'page_h2_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_h2_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'700',
	),
	'choices'			=>			xt_default_font_choices(),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_h2_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	),
	'priority'			=>			1,
) );

// H3
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'page_h3_toggle',
	'label'				=>			esc_attr__( 'H3 Settings', 'xt-framework' ),
	'section'			=>			'xt_h3_options',
	'default'			=>			0,
	'priority'			=>			0,
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'page_h3_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_h3_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'700',
	),
	'choices'			=>			xt_default_font_choices(),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_h3_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	),
	'priority'			=>			1,
) );


// H4
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'page_h4_toggle',
	'label'				=>			esc_attr__( 'H4 Settings', 'xt-framework' ),
	'section'			=>			'xt_h4_options',
	'default'			=>			0,
	'priority'			=>			0,
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'page_h4_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_h4_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'700',
	),
	'choices'			=>			xt_default_font_choices(),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_h4_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	),
	'priority'			=>			1,
) );


// H5
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'page_h5_toggle',
	'label'				=>			esc_attr__( 'H5 Settings', 'xt-framework' ),
	'section'			=>			'xt_h5_options',
	'default'			=>			0,
	'priority'			=>			0,
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'page_h5_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_h5_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'700',
	),
	'choices'			=>			xt_default_font_choices(),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_h5_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	),
	'priority'			=>			1,
) );


// H6
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'page_h6_toggle',
	'label'				=>			esc_attr__( 'H6 Settings', 'xt-framework' ),
	'section'			=>			'xt_h6_options',
	'default'			=>			0,
	'priority'			=>			0,
) );

// Font Family
Kirki::add_field( 'xt', array(
	'type'				=>			'typography',
	'settings'			=>			'page_h6_font_family',
	'label'				=>			esc_attr__( 'Font', 'xt-framework' ),
	'section'			=>			'xt_h6_options',
	'default'			=>			array(
		'font-family'	=>			'Helvetica, Arial, sans-serif',
		'variant'		=>			'700',
	),
	'choices'			=>			xt_default_font_choices(),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'page_h6_toggle',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	),
	'priority'			=>			1,
) );


/* Fields – Pre Header */

// Pre Header Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'radio-buttonset',
	'settings'			=>			'pre_header_layout',
	'label'				=>			esc_attr__( 'Layout', 'xt-framework' ),
	'section'			=>			'xt_pre_header_options',
	'default'			=>			'none',
	'priority'			=>			1,
	'choices'			=>			array(
		'none'			=>			esc_attr__( 'None', 'xt-framework' ),
		'one'			=>			esc_attr__( 'One Column', 'xt-framework' ),
		'two'			=>			esc_attr__( 'Two Columns', 'xt-framework' ),
	),
) );

// Column One Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'pre_header_column_one_layout',
	'label'				=>			esc_attr__( 'Column 1', 'xt-framework' ),
	'section'			=>			'xt_pre_header_options',
	'default'			=>			'text',
	'priority'			=>			2,
	'choices'			=>			array(
		'none'			=>			esc_attr__( 'None', 'xt-framework' ),
		'text'			=>			esc_attr__( 'Text', 'xt-framework' ),
		'menu'			=>			esc_attr__( 'Menu', 'xt-framework' ),
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'pre_header_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Column One
Kirki::add_field( 'xt', array(
	'type'				=>			'textarea',
	'settings'			=>			'pre_header_column_one',
	'label'				=>			esc_attr__( 'Text', 'xt-framework' ),
	'section'			=>			'xt_pre_header_options',
	'default'			=>			esc_attr__( 'Column 1', 'xt-framework' ),
	'priority'			=>			2,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'pre_header_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
		array(
		'setting'		=>			'pre_header_column_one_layout',
		'operator'		=>			'==',
		'value'			=>			'text',
		),
	)
) );

// Column Two Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'pre_header_column_two_layout',
	'label'				=>			esc_attr__( 'Column 2', 'xt-framework' ),
	'section'			=>			'xt_pre_header_options',
	'default'			=>			'text',
	'priority'			=>			2,
	'choices'			=>			array(
		'none'			=>			esc_attr__( 'None', 'xt-framework' ),
		'text'			=>			esc_attr__( 'Text', 'xt-framework' ),
		'menu'			=>			esc_attr__( 'Menu', 'xt-framework' ),
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'pre_header_layout',
		'operator'		=>			'==',
		'value'			=>			'two',
		),
	)
) );

// Column Two
Kirki::add_field( 'xt', array(
	'type'				=>			'textarea',
	'settings'			=>			'pre_header_column_two',
	'label'				=>			esc_attr__( 'Text', 'xt-framework' ),
	'section'			=>			'xt_pre_header_options',
	'default'			=>			esc_attr__( 'Column 2', 'xt-framework' ),
	'priority'			=>			2,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'pre_header_layout',
		'operator'		=>			'==',
		'value'			=>			'two',
		),
		array(
		'setting'		=>			'pre_header_column_two_layout',
		'operator'		=>			'==',
		'value'			=>			'text',
		),
	)
) );

// Height
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'pre_header_height',
	'label'				=>			esc_attr__( 'Height', 'xt-framework' ),
	'section'			=>			'xt_pre_header_options',
	'priority'			=>			4,
	'default'			=>			'10',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'1',
		'max'			=>			'25',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'pre_header_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'pre_header_bg_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_pre_header_options',
	'default'			=>			'#ffffff',
	'priority'			=>			5,
	'transport'			=>			'postMessage',
	'active_callback'	=>			array(
		array(
		'setting'		=>			'pre_header_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	),
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );

// Font Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'pre_header_font_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_pre_header_options',
	'default'			=>			'#6d7680',
	'priority'			=>			6,
	'transport'			=>			'postMessage',
	'active_callback'	=>			array(
		array(
		'setting'		=>			'pre_header_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	),
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );

/* Fields – Logo */

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-05198',
	'section'			=>			'title_tagline',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			4,
) );

// Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'menu_logo_color',
	'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'priority'			=>			11,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'custom_logo',
		'operator'		=>			'==',
		'value'			=>			'',
		),
	)
) );

// Hover Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'menu_logo_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'priority'			=>			12,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'custom_logo',
		'operator'		=>			'==',
		'value'			=>			'',
		),
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-898067',
	'section'			=>			'title_tagline',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			14,
) );

/* Fields – Tagline */

// Toggle
Kirki::add_field( 'xt', array(
	'type'				=>			'checkbox',
	'settings'			=>			'menu_logo_description',
	'label'				=>			esc_attr__( 'Display Tagline', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'default'			=>			'0',
	'priority'			=>			20,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'custom_logo',
		'operator'		=>			'==',
		'value'			=>			'',
		),
	)
) );

// Toggle
Kirki::add_field( 'xt', array(
	'type'				=>			'checkbox',
	'settings'			=>			'menu_logo_description_mobile',
	'label'				=>			esc_attr__( 'Display Tagline on Mobile', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'default'			=>			'0',
	'priority'			=>			20,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'custom_logo',
		'operator'		=>			'==',
		'value'			=>			'',
		),
		array(
		'setting'		=>			'menu_logo_description',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	)
) );

// Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'menu_logo_description_color',
	'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'priority'			=>			22,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'custom_logo',
		'operator'		=>			'==',
		'value'			=>			'',
		),
		array(
		'setting'		=>			'menu_logo_description',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-212074',
	'section'			=>			'title_tagline',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			24,
) );

/* Fields – Logo Settings Misc */

// Logo URL
Kirki::add_field( 'xt', array(
	'type'				=>			'image',
	'settings'			=>			'mobile_logo',
	'label'				=>			esc_attr__( 'Mobile Logo ', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'transport'			=>			'postMessage',
	'priority'			=>			30,
) );


Kirki::add_field( 'xt', array(
	'type'				=>			'link',
	'settings'			=>			'menu_logo_url',
	'label'				=>			esc_attr__( 'Custom Logo URL', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'transport'			=>			'postMessage',
	'priority'			=>			30,
) );

// Alt Tag
Kirki::add_field( 'xt', array(
	'type'				=>			'text',
	'settings'			=>			'menu_logo_alt',
	'label'				=>			esc_attr__( 'Custom "alt" Tag', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'priority'			=>			31,
	'transport'			=>			'postMessage',
	'active_callback'	=>			array(
		array(
		'setting'		=>			'custom_logo',
		'operator'		=>			'!==',
		'value'			=>			'',
		),
	),
) );

// Title Tag
Kirki::add_field( 'xt', array(
	'type'				=>			'text',
	'settings'			=>			'menu_logo_title',
	'label'				=>			esc_attr__( 'Custom "title" Tag', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'priority'			=>			32,
	'transport'			=>			'postMessage',
	'active_callback'	=>			array(
		array(
		'setting'		=>			'custom_logo',
		'operator'		=>			'!==',
		'value'			=>			'',
		),
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-791190',
	'section'			=>			'title_tagline',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			33,
) );

/* Fields – Logo Container Width */

// Container Width
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'menu_logo_container_width',
	'label'				=>			esc_attr__( 'Logo Container Width', 'xt-framework' ),
	'description'		=>			esc_attr__( 'Defines the space in % the logo area takes in the navigation', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'priority'			=>			40,
	'default'			=>			'25',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'10',
		'max'			=>			'40',
		'step'			=>			'1',
	),
) );

// Mobile Container Width
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'mobile_menu_logo_container_width',
	'label'				=>			esc_attr__( 'Logo Container Width (Mobile)', 'xt-framework' ),
	'description'		=>			esc_attr__( 'Defines the space in % the logo area takes in the navigation', 'xt-framework' ),
	'section'			=>			'title_tagline',
	'priority'			=>			41,
	'default'			=>			'66',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'10',
		'max'			=>			'80',
		'step'			=>			'1',
	),
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-44545',
	'section'			=>			'title_tagline',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			42,
) );

/* Fields – Navigation */

// Variations
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'menu_position',
	'label'				=>			esc_attr__( 'Menu', 'xt-framework' ),
	'section'			=>			'xt_menu_options',
	'default'			=>			'menu-right',
	'priority'			=>			0,
	'multiple'			=>			1,
	'choices'			=>			apply_filters( 'xt_menu_position', array(
		'menu-right'	=>			esc_attr__( 'Right (default)', 'xt-framework' ),
		'menu-left'		=>			esc_attr__( 'Left', 'xt-framework' ),
		'menu-centered'	=>			esc_attr__( 'Centered', 'xt-framework' ),
		'menu-stacked'	=>			esc_attr__( 'Stacked', 'xt-framework' ),
		'menu-stacked-advanced'	=>			esc_attr__( 'Stacked (advanced)', 'xt-framework' ),
		'menu-off-canvas'	=>			esc_attr__( 'Off Canvas (right)', 'xt-framework' ),
		'menu-off-canvas-left'	=>			esc_attr__( 'Off Canvas (left)', 'xt-framework' ),
		'menu-full-screen'	=>			esc_attr__( 'Full Screen', 'xt-framework' )
	) ),
) );

// Width
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Navigation Width', 'xt-framework' ),
	'description'		=>			esc_attr__( 'Default: 1200px', 'xt-framework' ),
	'settings'			=>			'menu_width',
	'section'			=>			'xt_menu_options',
	'priority'			=>			1,
) );

// Search Icon
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'menu_search_icon',
	'label'				=>			esc_attr__( 'Search Icon', 'xt-framework' ),
	'section'			=>			'xt_menu_options',
	'priority'			=>			2
) );

// Height
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'label'				=>			esc_attr__( 'Menu Height', 'xt-framework' ),
	'settings'			=>			'menu_height',
	'section'			=>			'xt_menu_options',
	'priority'			=>			3,
	'default'			=>			'20',
	'choices'			=>			array(
		'min'			=>			'10',
		'max'			=>			'80',
		'step'			=>			'1',
	),
) );

// Padding
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'label'				=>			esc_attr__( 'Menu Item Spacing', 'xt-framework' ),
	'settings'			=>			'menu_padding',
	'section'			=>			'xt_menu_options',
	'priority'			=>			4,
	'default'			=>			'20',
	'choices'			=>			array(
		'min'			=>			'5',
		'max'			=>			'40',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'menu_position',
		'operator'		=>			'!=',
		'value'			=>			'menu-off-canvas',
		),
		array(
		'setting'		=>			'menu_position',
		'operator'		=>			'!=',
		'value'			=>			'menu-off-canvas-left',
		),
	)
) );

// Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'menu_bg_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_menu_options',
	'default'			=>			'#f5f5f7',
	'priority'			=>			5,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Font Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'menu_font_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_menu_options',
	'priority'			=>			6,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Font Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'menu_font_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_menu_options',
	'priority'			=>			7,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'input_slider',
	'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
	'settings'			=>			'menu_font_size',
	'section'			=>			'xt_menu_options',
	'priority'			=>			7,
	'default'			=>			'16px',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'100',
		'step'			=>			'1',
	),
) );

/* Fields – Sub Menu */

// Alignment
Kirki::add_field( 'xt', array(
	'type'				=>			'radio-image',
	'settings'			=>			'sub_menu_alignment',
	'label'				=>			esc_attr__( 'Sub Menu Alignment', 'xt-framework' ),
	'section'			=>			'xt_sub_menu_options',
	'default'			=>			'left',
	'priority'			=>			1,
	'multiple'			=>			1,
	'choices'			=>			array(
		'left'			=>			XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
		'center'		=>			XT_THEME_URI . '/inc/customizer/img/align-center.jpg',
		'right'			=>			XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
	),
) );

// Width
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'sub_menu_width',
	'label'				=>			esc_attr__( 'Width', 'xt-framework' ),
	'section'			=>			'xt_sub_menu_options',
	'priority'			=>			1,
	'default'			=>			'220',
	'choices'			=>			array(
		'min'			=>			'100',
		'max'			=>			'400',
		'step'			=>			'1',
	),
) );

// Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'sub_menu_bg_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_sub_menu_options',
	'default'			=>			'#ffffff',
	'transport'			=>			'postMessage',
	'priority'			=>			2,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Background Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'sub_menu_bg_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_sub_menu_options',
	'default'			=>			'#ffffff',
	'priority'			=>			3,
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );

// Accent Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'sub_menu_accent_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_sub_menu_options',
	'transport'			=>			'postMessage',
	'priority'			=>			4,
) );

// Accent Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'sub_menu_accent_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_sub_menu_options',
	'priority'			=>			5,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'input_slider',
	'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
	'settings'			=>			'sub_menu_font_size',
	'section'			=>			'xt_sub_menu_options',
	'priority'			=>			6,
	'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'0',
			'max'			=>			'100',
			'step'			=>			'1',
		),
) );

// Toggle
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'sub_menu_separator',
	'label'				=>			esc_attr__( 'Sub Menu Separator', 'xt-framework' ),
	'section'			=>			'xt_sub_menu_options',
	'default'			=>			0,
	'priority'			=>			6,
) );

// Separator Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'sub_menu_separator_color',
	'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
	'section'			=>			'xt_sub_menu_options',
	'default'			=>			'#f5f5f7',
	'priority'			=>			6,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'sub_menu_separator',
		'operator'		=>			'==',
		'value'			=>			true,
		),
	)
) );


/* Fields – Mobile Navigation */

// Variations
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'mobile_menu_options',
	'label'				=>			esc_attr__( 'Menu', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'default'			=>			'menu-mobile-hamburger',
	'priority'			=>			1,
	'multiple'			=>			1,
	'choices'			=>			apply_filters( 'xt_mobile_menu_options', array(
		'menu-mobile-default'		=>			esc_attr__( 'Default', 'xt-framework' ),
		'menu-mobile-hamburger'		=>			esc_attr__( 'Hamburger', 'xt-framework' )
	) )
) );

// Icon Style
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'mobile_menu_hamburger_style',
	'label'				=>			esc_attr__( 'Hamburger Icon Style', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'default'			=>			'default',
	'priority'			=>			1,
	'multiple'			=>			1,
	'choices'			=>			array(
		'default'		=>			esc_attr__( 'Default', 'xt-framework' ),
		'filled'		=>			esc_attr__( 'Filled', 'xt-framework' ),
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'mobile_menu_options',
		'operator'		=>			'in',
		'value'			=>			array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' )
		)
	)
) );

// Border Radius
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'mobile_menu_hamburger_border_radius',
	'label'				=>			esc_attr__( 'Border Radius', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'priority'			=>			1,
	'default'			=>			'0',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'50',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'mobile_menu_options',
		'operator'		=>			'in',
		'value'			=>			array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' )
		),
		array(
		'setting'		=>			'mobile_menu_hamburger_style',
		'operator'		=>			'==',
		'value'			=>			'filled',
		),
	)
) );

// Hamburger Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'mobile_menu_hamburger_bg_color',
	'label'				=>			esc_attr__( 'Hamburger Icon Color', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'priority'			=>			1,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'mobile_menu_options',
		'operator'		=>			'in',
		'value'			=>			array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' )
		),
		array(
		'setting'		=>			'mobile_menu_hamburger_style',
		'operator'		=>			'==',
		'value'			=>			'filled',
		),
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-680902',
	'section'			=>			'xt_mobile_menu_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			1,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'mobile_menu_options',
		'operator'		=>			'in',
		'value'			=>			array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' )
		)
	)
) );

// Mobile Search Icon
Kirki::add_field( 'xt', array(
	'type'				=>			'toggle',
	'settings'			=>			'mobile_menu_search_icon',
	'label'				=>			esc_attr__( 'Search Icon', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'priority'			=>			1,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'mobile_menu_options',
		'operator'		=>			'!==',
		'value'			=>			'menu-mobile-default'
		)
	)
) );

// Height
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'mobile_menu_height',
	'label'				=>			esc_attr__( 'Height', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'priority'			=>			2,
	'default'			=>			'20',
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'5',
		'max'			=>			'80',
		'step'			=>			'1',
	),
) );

// Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'mobile_menu_background_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'priority'			=>			3,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'mobile_menu_options',
		'operator'		=>			'!=',
		'value'			=>			'menu-mobile-elementor'
		)
	)
) );

// Hamburger Size
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'mobile_menu_hamburger_size',
	'label'				=>			esc_attr__( 'Icon Size', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'default'			=>			'16',
	'priority'			=>			4,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'12',
		'max'			=>			'24',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'mobile_menu_options',
		'operator'		=>			'in',
		'value'			=>			array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' )
		)
	)
) );

// Hamburger Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'mobile_menu_hamburger_color',
	'label'				=>			esc_attr__( 'Icon Color', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'default'			=>			'#6d7680',
	'priority'			=>			5,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'mobile_menu_options',
		'operator'		=>			'in',
		'value'			=>			array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' )
		)
	)
) );

// Separator
Kirki::add_field( 'xt', array(
	'type'				=>			'custom',
	'settings'			=>			'separator-71744',
	'section'			=>			'xt_mobile_menu_options',
	'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
	'priority'			=>			6,
) );

// Menu Item Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'mobile_menu_bg_color',
	'label'				=>			esc_attr__( 'Menu Item Background Color', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'default'			=>			'#ffffff',
	'priority'			=>			9,
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );

// Menu Item Background Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'mobile_menu_bg_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'default'			=>			'#ffffff',
	'priority'			=>			10,
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );

// Font Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'mobile_menu_font_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'priority'			=>			11,
) );

// Font Color Hover
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'mobile_menu_font_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'priority'			=>			12,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Divider Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'mobile_menu_border_color',
	'label'				=>			esc_attr__( 'Divider Color', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'default'			=>			'#d9d9e0',
	'priority'			=>			13,
	'choices'			=>			array(
		'alpha'			=>			true,
	)
) );

// Sub Menu Arrow Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'mobile_menu_submenu_arrow_color',
	'label'				=>			esc_attr__( 'Sub Menu Arrow Color', 'xt-framework' ),
	'section'			=>			'xt_mobile_menu_options',
	'priority'			=>			14,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
) );

// Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'input_slider',
	'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
	'settings'			=>			'mobile_menu_font_size',
	'section'			=>			'xt_mobile_menu_options',
	'priority'			=>			15,
	'default'			=>			'16px',
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'50',
		'step'			=>			'1',
	)
) );

/* Fields – Footer */

// Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'radio-buttonset',
	'settings'			=>			'footer_layout',
	'label'				=>			esc_attr__( 'Footer', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'default'			=>			'two',
	'priority'			=>			1,
	'choices'			=>			array(
		'none'			=>			esc_attr__( 'None', 'xt-framework' ),
		'one'			=>			esc_attr__( 'One Column', 'xt-framework' ),
		'two'			=>			esc_attr__( 'Two Columns', 'xt-framework' ),
	),
) );

// Column One Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'footer_column_one_layout',
	'label'				=>			esc_attr__( 'Column 1', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'default'			=>			'text',
	'priority'			=>			2,
	'choices'			=>			array(
		'none'			=>			esc_attr__( 'None', 'xt-framework' ),
		'text'			=>			esc_attr__( 'Text', 'xt-framework' ),
		'menu'			=>			esc_attr__( 'Menu', 'xt-framework' ),
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Column One
Kirki::add_field( 'xt', array(
	'type'				=>			'textarea',
	'settings'			=>			'footer_column_one',
	'label'				=>			esc_attr__( 'Text', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'default'			=>			esc_html__( '&copy; [year] - [blogname] | All rights reserved', 'xt-framework' ),
	'priority'			=>			2,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
		array(
		'setting'		=>			'footer_column_one_layout',
		'operator'		=>			'==',
		'value'			=>			'text',
		),
	)
) );

// Column Two Layout
Kirki::add_field( 'xt', array(
	'type'				=>			'select',
	'settings'			=>			'footer_column_two_layout',
	'label'				=>			esc_attr__( 'Column 2', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'default'			=>			'text',
	'priority'			=>			3,
	'choices'			=>			array(
		'none'			=>			esc_attr__( 'None', 'xt-framework' ),
		'text'			=>			esc_attr__( 'Text', 'xt-framework' ),
		'menu'			=>			esc_attr__( 'Menu', 'xt-framework' ),
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'==',
		'value'			=>			'two',
		),
	)
) );

// Column Two
Kirki::add_field( 'xt', array(
	'type'				=>			'textarea',
	'settings'			=>			'footer_column_two',
	'label'				=>			esc_attr__( 'Text', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'default'			=>			__( 'Powered by [theme_author]', 'xt-framework' ),
	'priority'			=>			3,
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'==',
		'value'			=>			'two',
		),
		array(
		'setting'		=>			'footer_column_two_layout',
		'operator'		=>			'==',
		'value'			=>			'text',
		),
	)
) );

// Width
Kirki::add_field( 'xt', array(
	'type'				=>			'dimension',
	'label'				=>			esc_attr__( 'Footer Width', 'xt-framework' ),
	'description'		=>			esc_attr__( 'Default: 1200px', 'xt-framework' ),
	'settings'			=>			'footer_width',
	'section'			=>			'xt_footer_options',
	'priority'			=>			5,
	'transport'			=>			'postMessage',
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Footer Height
Kirki::add_field( 'xt', array(
	'type'				=>			'slider',
	'settings'			=>			'footer_height',
	'label'				=>			esc_attr__( 'Height', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'priority'			=>			6,
	'default'			=>			20,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'min'			=>			'1',
		'max'			=>			'100',
		'step'			=>			'1',
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Background Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'footer_bg_color',
	'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'default'			=>			'#f5f5f7',
	'transport'			=>			'postMessage',
	'priority'			=>			7,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Font Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'footer_font_color',
	'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'transport'			=>			'postMessage',
	'priority'			=>			8,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Accent Color
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'footer_accent_color',
	'label'				=>			esc_attr__( 'Accent Color', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'priority'			=>			9,
	'transport'			=>			'postMessage',
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Accent Color Alt
Kirki::add_field( 'xt', array(
	'type'				=>			'color',
	'settings'			=>			'footer_accent_color_alt',
	'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
	'section'			=>			'xt_footer_options',
	'priority'			=>			10,
	'choices'			=>			array(
		'alpha'			=>			true,
	),
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	)
) );

// Font Size
Kirki::add_field( 'xt', array(
	'type'				=>			'input_slider',
	'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
	'settings'			=>			'footer_font_size',
	'section'			=>			'xt_footer_options',
	'priority'			=>			11,
	'default'			=>			'14px',
	'transport'			=>			'postMessage',
	'active_callback'	=>			array(
		array(
		'setting'		=>			'footer_layout',
		'operator'		=>			'!=',
		'value'			=>			'none',
		),
	),
	'choices'			=>			array(
		'min'			=>			'0',
		'max'			=>			'50',
		'step'			=>			'1',
	)
) );




/* Panels */

	// Scripts
	Kirki::add_panel( 'scripts_panel', array(
		'priority'			=>		6,
		'title'				=>		__( 'Scripts & Styles', 'xt' ),
	) );

	/* Sections – Scripts */

	// Header
	Kirki::add_section( 'xt_header_scripts', array(
		'title'				=>			esc_attr__( 'Header', 'xt-framework' ),
		'panel'				=>			'scripts_panel',
		'priority'			=>			100,
	) );

	// Footer
	Kirki::add_section( 'xt_footer_scripts', array(
		'title'				=>			esc_attr__( 'Footer', 'xt-framework' ),
		'panel'				=>			'scripts_panel',
		'priority'			=>			200,
	) );

	/* Sections – Typography */

	// Typekit
	Kirki::add_section( 'xt_typekit_options', array(
		'title'				=>			esc_attr__( 'Typekit', 'xt-framework' ),
		'panel'				=>			'typo_panel',
		'priority'			=>			800,
	) );

	// Typekit
	Kirki::add_section( 'xt_custom_fonts_options', array(
		'title'				=>			esc_attr__( 'Custom Fonts', 'xt-framework' ),
		'panel'				=>			'typo_panel',
		'priority'			=>			900,
	) );

	/* Sections – General */

	// Social Media Links
	Kirki::add_section( 'xt_social_links_options', array(
		'title'				=>			esc_attr__( 'Social Media Links', 'xt-framework' ),
		'panel'				=>			'layout_panel',
		'priority'			=>			1000,
	) );

	// Social Media Icons
	Kirki::add_section( 'xt_social_icons_options', array(
		'title'				=>			esc_attr__( 'Social Media Icons', 'xt-framework' ),
		'panel'				=>			'layout_panel',
		'priority'			=>			1100,
	) );

	/* Sections – Navigation */

	// Sticky Navigation
	Kirki::add_section( 'xt_sticky_menu_options', array(
		'title'				=>			esc_attr__( 'Sticky Navigation', 'xt-framework' ),
		'panel'				=>			'header_panel',
		'priority'			=>			300,
	) );

	// Navigation Effects
	Kirki::add_section( 'xt_menu_effect_options', array(
		'title'				=>			esc_attr__( 'Navigation Hover Effects', 'xt-framework' ),
		'panel'				=>			'header_panel',
		'priority'			=>			400,
	) );

	// Navigation Effects
	Kirki::add_section( 'xt_cta_button_options', array(
		'title'				=>			esc_attr__( 'Call to Action Button', 'xt-framework' ),
		'panel'				=>			'header_panel',
		'priority'			=>			450,
	) );

	// Transparent Header
	Kirki::add_section( 'xt_transparent_header_options', array(
		'title'				=>			esc_attr__( 'Transparent Header', 'xt-framework' ),
		'panel'				=>			'header_panel',
		'priority'			=>			500,
	) );

	/* Fields – General */

	// Separator
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-52921',
		'section'			=>			'xt_404_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			100,
	) );

	// 404
	Kirki::add_field( 'xt', array(
		'type'				=>			'code',
		'label'				=>			esc_attr__( 'Custom 404 Page', 'xt-framework' ),
		'description'		=>			__( 'Replace the default 404 page with your custom layout. <br><br>Example:<br>[elementor-template id="xxx"]<br>[fl_builder_insert_layout id="xxx"]', 'xt-framework' ),
		'settings'			=>			'404_custom',
		'section'			=>			'xt_404_options',
		'priority'			=>			100,
		'choices'			=>			array(
			'language'		=>			'html',
		),
	) );

	// Social Sortable
	Kirki::add_field( 'xt', array(
		'type'				=>			'sortable',
		'settings'			=>			'social_sortable',
		'label'				=>			esc_attr__( 'Social Media Icons', 'xt-framework' ),
		'description'		=>			esc_attr__( 'Display social media icons in your pre-header, footer or template file by using the [social] shortcode.', 'xt-framework' ),
		'section'			=>			'xt_social_icons_options',
		'choices'			=> array(
			'facebook'		=>			esc_attr__( 'Facebook', 'xt-framework' ),
			'twitter'		=>			esc_attr__( 'Twitter', 'xt-framework' ),
			'google'		=>			esc_attr__( 'Google+', 'xt-framework' ),
			'pinterest'		=>			esc_attr__( 'Pinterest', 'xt-framework' ),
			'youtube'		=>			esc_attr__( 'Youtube', 'xt-framework' ),
			'instagram'		=>			esc_attr__( 'Instagram', 'xt-framework' ),
			'vimeo'			=>			esc_attr__( 'Vimeo', 'xt-framework' ),
			'soundcloud'	=>			esc_attr__( 'Soundcloud', 'xt-framework' ),
			'linkedin'		=>			esc_attr__( 'LinkedIn', 'xt-framework' ),
			'yelp'			=>			esc_attr__( 'Yelp', 'xt-framework' ),
		),
		'priority'			=>			1,
	) );

	// Social Shapes
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'social_shapes',
		'label'				=>			esc_attr__( 'Style', 'xt-framework' ),
		'section'			=>			'xt_social_icons_options',
		'default'			=>			' none',
		'priority'			=>			2,
		'multiple'			=>			1,
		'choices'			=>			array(
			' xt-social-shape-plain'		=>			esc_attr__( 'Plain', 'xt-framework' ),
			' xt-social-shape-rounded'	=>			esc_attr__( 'Rounded', 'xt-framework' ),
			' xt-social-shape-boxed'		=>			esc_attr__( 'Boxed', 'xt-framework' ),
		),
	) );

	// Social Styles
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'social_styles',
		'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
		'section'			=>			'xt_social_icons_options',
		'default'			=>			' xt-social-style-default',
		'priority'			=>			3,
		'multiple'			=>			1,
		'choices'			=>			array(
			' xt-social-style-default'	=>			esc_attr__( 'Default', 'xt-framework' ),
			' xt-social-style-grey'		=>			esc_attr__( 'Grey', 'xt-framework' ),
			' xt-social-style-brand'		=>			esc_attr__( 'Brand Colors', 'xt-framework' ),
			' xt-social-style-filled'		=>			esc_attr__( 'Filled', 'xt-framework' ),
		),
	) );

	// Social Size
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'social_sizes',
		'label'				=>			esc_attr__( 'Size', 'xt-framework' ),
		'section'			=>			'xt_social_icons_options',
		'default'			=>			' xt-social-size-small',
		'priority'			=>			4,
		'multiple'			=>			1,
		'choices'			=>			array(
			' xt-social-size-small'		=>			esc_attr__( 'Small', 'xt-framework' ),
			' xt-social-size-large'		=>			esc_attr__( 'Large', 'xt-framework' ),
		),
	) );

	// Social Font Size
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'social_font_size',
		'label'				=>			esc_attr__( 'Font Size', 'xt-framework' ),
		'section'			=>			'xt_social_icons_options',
		'priority'			=>			5,
		'default'			=>			14,
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'12',
			'max'			=>			'32',
			'step'			=>			'1',
		),
	) );

	// Facebook
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'facebook_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'Facebook', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	// Twitter
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'twitter_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'Twitter', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	// Google
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'google_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'Google+', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	// Pinterest
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'pinterest_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'Pinterest', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	// Youtube
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'youtube_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'Youtube', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	// Instagram
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'instagram_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'Instagram', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	// Vimeo
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'vimeo_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'Vimeo', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	// Soundcloud
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'soundcloud_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'Soundcloud', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	// LinkedIn
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'linkedin_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'LinkedIn', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	// Yelp
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'yelp_link',
		'transport'			=>			'postMessage',
		'label'				=>			esc_attr__( 'Yelp', 'xt-framework' ),
		'section'			=>			'xt_social_links_options',
		'priority'			=>			1,
	) );

	/* Fields – Blog Layouts (coming soon) */

	/* Fields – Typography (Page) */

	// Bold Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'page_bold_color',
		'label'				=>			esc_attr__( 'Bold Text Color', 'xt-framework' ),
		'section'			=>			'xt_font_options',
		'priority'			=>			3,
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'alpha'			=>			true,
		)
	) );

	// Line Height
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_line_height',
		'label'				=>			esc_attr__( 'Line Height', 'xt-framework' ),
		'section'			=>			'xt_font_options',
		'priority'			=>			4,
		'default'			=>			'1.7',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'1',
			'max'			=>			'5',
			'step'			=>			'.1',
		),
	) );

	/* Fields – Typography (Menu) */

	// Letter Spacing
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'menu_letter_spacing',
		'label'				=>			esc_attr__( 'Letter Spacing', 'xt-framework' ),
		'section'			=>			'xt_menu_font_options',
		'priority'			=>			3,
		'default'			=>			'0',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'-2',
			'max'			=>			'5',
			'step'			=>			'.5',
		),
	) );

	// Text Transform
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'menu_text_transform',
		'label'				=>			esc_attr__( 'Text transform', 'xt-framework' ),
		'section'			=>			'xt_menu_font_options',
		'default'			=>			'none',
		'priority'			=>			4,
		'multiple'			=>			1,
		'choices'			=>			array(
			'none'			=>			esc_attr__( 'None', 'xt-framework' ),
			'uppercase'		=>			esc_attr__( 'Uppercase', 'xt-framework' ),
		),
	) );

	/* Fields – Typography (H1) */

	// Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'page_h1_font_color',
		'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
		'section'			=>			'xt_h1_options',
		'priority'			=>			3,
		'choices'			=>			array(
			'alpha'			=>			true,
		)
	) );

	// Line Height
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h1_line_height',
		'label'				=>			esc_attr__( 'Line Height', 'xt-framework' ),
		'section'			=>			'xt_h1_options',
		'priority'			=>			4,
		'default'			=>			'1.2',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'1',
			'max'			=>			'5',
			'step'			=>			'.1',
		),
	) );

	// Letter Spacing
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h1_letter_spacing',
		'label'				=>			esc_attr__( 'Letter Spacing', 'xt-framework' ),
		'section'			=>			'xt_h1_options',
		'priority'			=>			5,
		'default'			=>			'0',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'-2',
			'max'			=>			'5',
			'step'			=>			'.5',
		),
	) );

	// Text Transform
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'page_h1_text_transform',
		'label'				=>			esc_attr__( 'Text transform', 'xt-framework' ),
		'section'			=>			'xt_h1_options',
		'default'			=>			'none',
		'priority'			=>			6,
		'multiple'			=>			1,
		'choices'			=>			array(
			'none'			=>			esc_attr__( 'None', 'xt-framework' ),
			'uppercase'		=>			esc_attr__( 'Uppercase', 'xt-framework' ),
		),
	) );

	/* Fields – Typography (H2) */

	// Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'page_h2_font_color',
		'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
		'section'			=>			'xt_h2_options',
		'priority'			=>			3,
		'choices'			=>			array(
			'alpha'			=>			true,
		)
	) );

	// Line Height
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h2_line_height',
		'label'				=>			esc_attr__( 'Line Height', 'xt-framework' ),
		'section'			=>			'xt_h2_options',
		'priority'			=>			4,
		'default'			=>			'1.2',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'1',
			'max'			=>			'5',
			'step'			=>			'.1',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h2_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Letter Spacing
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h2_letter_spacing',
		'label'				=>			esc_attr__( 'Letter Spacing', 'xt-framework' ),
		'section'			=>			'xt_h2_options',
		'priority'			=>			5,
		'default'			=>			'0',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'-2',
			'max'			=>			'5',
			'step'			=>			'.5',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h2_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Text Transform
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'page_h2_text_transform',
		'label'				=>			esc_attr__( 'Text transform', 'xt-framework' ),
		'section'			=>			'xt_h2_options',
		'default'			=>			'none',
		'priority'			=>			6,
		'multiple'			=>			1,
		'choices'			=>			array(
			'none'			=>			esc_attr__( 'None', 'xt-framework' ),
			'uppercase'		=>			esc_attr__( 'Uppercase', 'xt-framework' ),
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h2_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	/* Fields – Typography (H3) */

	// Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'page_h3_font_color',
		'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
		'section'			=>			'xt_h3_options',
		'priority'			=>			3,
		'choices'			=>			array(
			'alpha'			=>			true,
		)
	) );

	// Line Height
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h3_line_height',
		'label'				=>			esc_attr__( 'Line Height', 'xt-framework' ),
		'section'			=>			'xt_h3_options',
		'priority'			=>			4,
		'default'			=>			'1.2',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'1',
			'max'			=>			'5',
			'step'			=>			'.1',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h3_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Letter Spacing
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h3_letter_spacing',
		'label'				=>			esc_attr__( 'Letter Spacing', 'xt-framework' ),
		'section'			=>			'xt_h3_options',
		'priority'			=>			5,
		'default'			=>			'0',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'-2',
			'max'			=>			'5',
			'step'			=>			'.5',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h3_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Text Transform
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'page_h3_text_transform',
		'label'				=>			esc_attr__( 'Text transform', 'xt-framework' ),
		'section'			=>			'xt_h3_options',
		'default'			=>			'none',
		'priority'			=>			6,
		'multiple'			=>			1,
		'choices'			=>			array(
			'none'			=>			esc_attr__( 'None', 'xt-framework' ),
			'uppercase'		=>			esc_attr__( 'Uppercase', 'xt-framework' ),
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h3_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	/* Fields – Typography (H4) */

	// Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'page_h4_font_color',
		'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
		'section'			=>			'xt_h4_options',
		'priority'			=>			3,
		'choices'			=>			array(
			'alpha'			=>			true,
		)
	) );

	// Line Height
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h4_line_height',
		'label'				=>			esc_attr__( 'Line Height', 'xt-framework' ),
		'section'			=>			'xt_h4_options',
		'priority'			=>			4,
		'default'			=>			'1.2',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'1',
			'max'			=>			'5',
			'step'			=>			'.1',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h4_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Letter Spacing
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h4_letter_spacing',
		'label'				=>			esc_attr__( 'Letter Spacing', 'xt-framework' ),
		'section'			=>			'xt_h4_options',
		'priority'			=>			5,
		'default'			=>			'0',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'-2',
			'max'			=>			'5',
			'step'			=>			'.5',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h4_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Text Transform
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'page_h4_text_transform',
		'label'				=>			esc_attr__( 'Text transform', 'xt-framework' ),
		'section'			=>			'xt_h4_options',
		'default'			=>			'none',
		'priority'			=>			6,
		'multiple'			=>			1,
		'choices'			=>			array(
			'none'			=>			esc_attr__( 'None', 'xt-framework' ),
			'uppercase'		=>			esc_attr__( 'Uppercase', 'xt-framework' ),
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h4_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	/* Fields – Typography (H5) */

	// Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'page_h5_font_color',
		'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
		'section'			=>			'xt_h5_options',
		'priority'			=>			3,
		'choices'			=>			array(
			'alpha'			=>			true,
		)
	) );

	// Line Height
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h5_line_height',
		'label'				=>			esc_attr__( 'Line Height', 'xt-framework' ),
		'section'			=>			'xt_h5_options',
		'priority'			=>			4,
		'default'			=>			'1.2',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'1',
			'max'			=>			'5',
			'step'			=>			'.1',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h5_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Letter Spacing
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h5_letter_spacing',
		'label'				=>			esc_attr__( 'Letter Spacing', 'xt-framework' ),
		'section'			=>			'xt_h5_options',
		'priority'			=>			5,
		'default'			=>			'0',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'-2',
			'max'			=>			'5',
			'step'			=>			'.5',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h5_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Text Transform
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'page_h5_text_transform',
		'label'				=>			esc_attr__( 'Text transform', 'xt-framework' ),
		'section'			=>			'xt_h5_options',
		'default'			=>			'none',
		'priority'			=>			6,
		'multiple'			=>			1,
		'choices'			=>			array(
			'none'			=>			esc_attr__( 'None', 'xt-framework' ),
			'uppercase'		=>			esc_attr__( 'Uppercase', 'xt-framework' ),
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h5_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	/* Fields – Typography (H6) */

	// Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'page_h6_font_color',
		'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
		'section'			=>			'xt_h6_options',
		'priority'			=>			3,
		'choices'			=>			array(
			'alpha'			=>			true,
		)
	) );

	// Line Height
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h6_line_height',
		'label'				=>			esc_attr__( 'Line Height', 'xt-framework' ),
		'section'			=>			'xt_h6_options',
		'priority'			=>			4,
		'default'			=>			'1.2',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'1',
			'max'			=>			'5',
			'step'			=>			'.1',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h6_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Letter Spacing
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'page_h6_letter_spacing',
		'label'				=>			esc_attr__( 'Letter Spacing', 'xt-framework' ),
		'section'			=>			'xt_h6_options',
		'priority'			=>			5,
		'default'			=>			'0',
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'min'			=>			'-2',
			'max'			=>			'5',
			'step'			=>			'.5',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h6_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Text Transform
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'page_h6_text_transform',
		'label'				=>			esc_attr__( 'Text transform', 'xt-framework' ),
		'section'			=>			'xt_h6_options',
		'default'			=>			'none',
		'priority'			=>			6,
		'multiple'			=>			1,
		'choices'			=>			array(
			'none'			=>			esc_attr__( 'None', 'xt-framework' ),
			'uppercase'		=>			esc_attr__( 'Uppercase', 'xt-framework' ),
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_h6_toggle',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	/* Fields – Typekit */

	// Toggle
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'enable_typekit',
		'label'				=>			esc_attr__( 'Enable Typekit', 'xt-framework' ),
		'section'			=>			'xt_typekit_options',
		'default'			=>			'0',
		'priority'			=>			'1'
	));

	// ID
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'typekit_id',
		'label'				=>			esc_attr__( 'Typekit ID', 'xt-framework' ),
		'section'			=>			'xt_typekit_options',
		'default'			=>			'iel4zhm',
		'priority'			=>			'2',
		'active_callback'	=>			array(
			array(
			'setting'		=>			'enable_typekit',
			'operator'		=>			'==',
			'value'			=>			'1',
			)
		),
	));

	// Fonts
	Kirki::add_field( 'xt', array(
		'type'				=>			'repeater',
		'label'				=>			esc_attr__( 'Typekit Fonts', 'xt-framework' ),
		'settings'			=>			'typekit_fonts',
		'priority'			=>			'3',
		'section'			=>			'xt_typekit_options',
		'row_label'			=>			array(
			'type'			=>			'text',
			'value'			=>			esc_attr__( 'Typekit Font', 'xt-framework' ),
			),
		'default'			=>			array(
			array(
			'font_name'		=>			'Sofia Pro',
			'font_css_name'	=>			'sofia-pro',
			'font_variants' =>			array( 'regular', 'italic', '700', '700italic' ),
			),
		),
		'fields'			=>			array(
			'font_name'		=>			array(
				'type'		=>			'text',
				'label'		=>			esc_attr__( 'Name', 'xt-framework' ),
			),
			'font_css_name'	=>			array(
				'type'		=>			'text',
				'label'		=>			esc_attr__( 'Font Family', 'xt-framework' ),
			),
			'font_variants'	=>			array(
				'type'		=>			'select',
				'label'		=>			esc_attr__( 'Variants', 'xt-framework' ),
				'multiple'	=>			18,
				'choices'	=>			array(
					'100'		=>		esc_attr__( '100', 'xt-framework' ),
					'100italic'	=>		esc_attr__( '100italic', 'xt-framework' ),
					'200'		=>		esc_attr__( '200', 'xt-framework' ),
					'200italic'	=>		esc_attr__( '200italic', 'xt-framework' ),
					'300'		=>		esc_attr__( '300', 'xt-framework' ),
					'300italic'	=>		esc_attr__( '300italic', 'xt-framework' ),
					'regular'	=>		esc_attr__( 'regular', 'xt-framework' ),
					'italic'	=>		esc_attr__( 'italic', 'xt-framework' ),
					'500'		=>		esc_attr__( '500', 'xt-framework' ),
					'500italic'	=>		esc_attr__( '500italic', 'xt-framework' ),
					'600'		=>		esc_attr__( '600', 'xt-framework' ),
					'600italic'	=>		esc_attr__( '600italic', 'xt-framework' ),
					'700'		=>		esc_attr__( '700', 'xt-framework' ),
					'700italic'	=>		esc_attr__( '700italic', 'xt-framework' ),
					'800'		=>		esc_attr__( '800', 'xt-framework' ),
					'800italic'	=>		esc_attr__( '800italic', 'xt-framework' ),
					'900'		=>		esc_attr__( '900', 'xt-framework' ),
					'900italic'	=>		esc_attr__( '900italic', 'xt-framework' ),
				)
			),
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'enable_typekit',
			'operator'		=>			'==',
			'value'			=>			'1'
			)
		)
	));

	/* Fields – Custom Fonts */

	// Toggle
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'enable_custom_fonts',
		'label'				=>			esc_attr__( 'Enable Custom Fonts', 'xt-framework' ),
		'section'			=>			'xt_custom_fonts_options',
		'default'			=>			'0',
		'priority'			=>			'1'
	));

	// Fonts
	Kirki::add_field( 'xt', array(
		'type'				=>			'repeater',
		'label'				=>			esc_attr__( 'Custom Fonts', 'xt-framework' ),
		'settings'			=>			'custom_fonts',
		'priority'			=>			'3',
		'section'			=>			'xt_custom_fonts_options',
		'row_label'			=>			array(
			'type'			=>			'text',
			'value'			=>			esc_attr__( 'Custom Font', 'xt-framework' ),
			),
		'default'			=>			array(
			array(
			'font_name'		=>			'Kitten',
			'font_css_name'	=>			'kitten, sans-serif',
			'font_woff'		=>			false,
			'font_woff2'	=>			false,
			'font_ttf'		=>			false,
			'font_svg'		=>			false,
			'font_eot'		=>			false
			),
		),
		'fields'			=>		array(
			'font_name'		=>		array(
				'type'		=>		'text',
				'label'		=>		esc_attr__( 'Name', 'xt-framework' ),
			),
			'font_css_name'	=>		array(
				'type'		=>		'text',
				'label'		=>		esc_attr__( 'Font Family', 'xt-framework' ),
			),
			'font_woff'		=>		array(
				'type'		=>		'upload',
				'mime_type'	=>		array(),
				'label'		=>		esc_attr__( 'Woff', 'xt-framework' ),
			),
			'font_woff2'	=>		array(
				'type'		=>		'upload',
				'mime_type'	=>		array(),
				'label'		=>		esc_attr__( 'Woff2', 'xt-framework' ),
			),
			'font_ttf'		=>		array(
				'type'		=>		'upload',
				'mime_type'	=>		array(),
				'label'		=>		esc_attr__( 'TTF', 'xt-framework' ),
			),
			'font_svg'		=>		array(
				'type'		=>		'upload',
				'mime_type'	=>		array(),
				'label'		=>		esc_attr__( 'SVG', 'xt-framework' ),
			),
			'font_eot'		=>		array(
				'type'		=>		'upload',
				'mime_type'	=>		array(),
				'label'		=>		esc_attr__( 'EOT', 'xt-framework' ),
			),
		),
		'active_callback'	=>		array(
			array(
			'setting'		=>		'enable_custom_fonts',
			'operator'		=>		'==',
			'value'			=>		'1'
			)
		)
	));

	/* Fields – Sticky Navigation */

	$i = 0;

	// Toggle
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'menu_sticky',
		'label'				=>			esc_attr__( 'Sticky Navigation', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'0',
		'priority'			=>			$i++,
	) );

	// Logo
	Kirki::add_field( 'xt', array(
		'type'				=>			'image',
		'settings'			=>			'menu_active_logo',
		'label'				=>			esc_attr__( 'Logo', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'custom_logo',
			'operator'		=>			'!=',
			'value'			=>			'',
			),
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Hide Logo
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'menu_active_hide_logo',
		'label'				=>			esc_attr__( 'Hide Logo', 'xt-framework' ),
		'description'		=>			esc_attr__('Hides the logo from the sticky navigation.', 'xt-framework'),
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'0',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-stacked', 'menu-stacked-advanced', 'menu-centered' ),
			),
		)
	) );

	// Height
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'label'				=>			esc_attr__( 'Menu Height', 'xt-framework' ),
		'settings'			=>			'menu_active_height',
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'default'			=>			'20',
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
		'choices'			=>			array(
			'min'			=>			'5',
			'max'			=>			'80',
			'step'			=>			'1',
		),
	) );

	// Logo Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_active_stacked_bg_color',
		'label'				=>			esc_attr__( 'Logo Area Background Color', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'#ffffff',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'==',
			'value'			=>			'menu-stacked-advanced',
			),
			array(
			'setting'		=>			'menu_active_hide_logo',
			'operator'		=>			'==',
			'value'			=>			false,
			)
		),
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_active_bg_color',
		'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'#f5f5f7',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Font Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_active_font_color',
		'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Font Color Alt
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_active_font_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Logo Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_active_logo_color',
		'label'				=>			esc_attr__( 'Logo Color', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'custom_logo',
			'operator'		=>			'==',
			'value'			=>			'',
			),
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Logo Color Alt
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_active_logo_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'custom_logo',
			'operator'		=>			'==',
			'value'			=>			'',
			),
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Separator
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-7016863',
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Box Shadow
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'menu_active_box_shadow',
		'label'				=>			esc_attr__( 'Box Shadow', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			0,
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		),
	) );

	// Box Shadow Blur
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'menu_active_box_shadow_blur',
		'label'				=>			esc_attr__( 'Blur', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'default'			=>			5,
		'choices'			=>			array(
			'min'			=>			'0',
			'max'			=>			'50',
			'step'			=>			'1',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'menu_active_box_shadow',
			'operator'		=>			'==',
			'value'			=>			1,
			),
		),
	) );

	// Box Shadow Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_active_box_shadow_color',
		'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'rgba(0,0,0,.15)',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'menu_active_box_shadow',
			'operator'		=>			'==',
			'value'			=>			1,
			),
		),
	) );

	// Separator
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-8931407',
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Delay
	Kirki::add_field( 'xt', array(
		'type'				=>			'dimension',
		'label'				=>			esc_attr__( 'Delay', 'xt-framework' ),
		'settings'			=>			'menu_active_delay',
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'default'			=>			'',
		'description'		=>			esc_attr__( 'Set a delay after the sticky navigation should appear. Default: 300px', 'xt-framework' ),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Animation
	Kirki::add_field( 'xt', array(
		'type'				=>			'radio-buttonset',
		'settings'			=>			'menu_active_animation',
		'label'				=>			esc_attr__( 'Animation', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'none',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'none'			=>			esc_attr__( 'None', 'xt-framework' ),
			'fade'			=>			esc_attr__( 'Fade In', 'xt-framework' ),
			'slide'			=>			esc_attr__( 'Slide Down', 'xt-framework' ),
			'scroll'		=>			esc_attr__( 'Hide on Scroll', 'xt-framework' ),
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Animation Duration
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'label'				=>			esc_attr__( 'Animation Duration', 'xt-framework' ),
		'settings'			=>			'menu_active_animation_duration',
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'default'			=>			'200',
		'choices'			=>			array(
			'min'			=>			'50',
			'max'			=>			'1000',
			'step'			=>			'10',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'menu_active_animation',
			'operator'		=>			'!==',
			'value'			=>			'none',
			),
			array(
			'setting'		=>			'menu_active_animation',
			'operator'		=>			'!==',
			'value'			=>			'scroll',
			),
		)
	) );

	// Off Canvas Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'active-off-canvas-headline',
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Off Canvas Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left' ),
			)
		)
	) );

	// Full Screen Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'active-full-screen-headline',
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Full Screen Menu Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'==',
			'value'			=>			'menu-full-screen',
			)
		)
	) );

	// Off Canvas Hamburger Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_active_off_canvas_hamburger_color',
		'label'				=>			esc_attr__( 'Icon Color', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left', 'menu-full-screen' ),
			),
		)
	) );

	// Mobile Menu Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'active-mobile-menu-headline',
		'section'			=>			'xt_sticky_menu_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Mobile Menu Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' )
			)
		)
	) );

	// Mobile Menu Hamburger Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'mobile_menu_active_hamburger_bg_color',
		'label'				=>			esc_attr__( 'Hamburger Icon Color', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' )
			),
			array(
			'setting'		=>			'mobile_menu_hamburger_style',
			'operator'		=>			'==',
			'value'			=>			'filled',
			)
		)
	) );

	// Mobile Menu Hamburger Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'mobile_menu_active_hamburger_color',
		'label'				=>			esc_attr__( 'Icon Color', 'xt-framework' ),
		'section'			=>			'xt_sticky_menu_options',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-mobile-hamburger', 'menu-mobile-off-canvas' )
			)
		)
	) );

	/* Fields – Pre Header */

	// Toggle
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'pre_header_sticky',
		'label'				=>			esc_attr__( 'Sticky Pre Header', 'xt-framework' ),
		'section'			=>			'xt_pre_header_options',
		'default'			=>			'0',
		'priority'			=>			0,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'pre_header_layout',
			'operator'		=>			'!=',
			'value'			=>			'none',
			),
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			)
		)
	));

	/* Fields – CTA Button */

	$i = 0;

	// Toggle
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'cta_button',
		'label'				=>			esc_attr__( 'Display Call to Action Button', 'xt-framework' ),
		'description'		=>			esc_attr__( 'You can declare the Call to Action Button manually by assigning the "xt-cta-menu-item" class to your menu-item of choice. Ticking this setting will display the Call to Action Button as the last element inside your main navigation.', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
	) );

	// Button Text
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'cta_button_text',
		'label'				=>			esc_attr__( 'Text', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'cta_button',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Button Link
	Kirki::add_field( 'xt', array(
		'type'				=>			'link',
		'settings'			=>			'cta_button_url',
		'label'				=>			esc_attr__( 'URL', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'cta_button',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Target
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'cta_button_target',
		'label'				=>			esc_attr__( 'Open in a new Tab', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'cta_button',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Separator
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-843375',
		'section'			=>			'xt_cta_button_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			$i++,
	) );

	// Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_background_color',
		'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Background Color Hover
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_background_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Font Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_font_color',
		'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Font Color Hover
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_font_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Transparent Header
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'cta_button_transparent_header_headline',
		'section'			=>			'xt_cta_button_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Transparent Header', 'xt-framework' ) .'</h3>',
		'priority'			=>			$i++,
	) );

	// Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_transparent_background_color',
		'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Background Color Hover
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_transparent_background_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Font Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_transparent_font_color',
		'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Font Color Hover
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_transparent_font_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Sticky Navigation
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'cta_button_sticky_header_headline',
		'section'			=>			'xt_cta_button_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Sticky Navigation', 'xt-framework' ) .'</h3>',
		'priority'			=>			$i++,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_sticky_background_color',
		'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Background Color Hover
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_sticky_background_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Font Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_sticky_font_color',
		'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	// Font Color Hover
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'cta_button_sticky_font_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_cta_button_options',
		'priority'			=>			$i++,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_sticky',
			'operator'		=>			'==',
			'value'			=>			true,
			),
		)
	) );

	/* Fields – Transparent Header */

	// Logo
	Kirki::add_field( 'xt', array(
		'type'				=>			'image',
		'settings'			=>			'menu_transparent_logo',
		'label'				=>			esc_attr__( 'Logo', 'xt-framework' ),
		'section'			=>			'xt_transparent_header_options',
		'priority'			=>			0,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'custom_logo',
			'operator'		=>			'!=',
			'value'			=>			'',
			)
		)
	) );

	// Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_transparent_background_color',
		'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
		'section'			=>			'xt_transparent_header_options',
		'priority'			=>			1,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Font Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_transparent_font_color',
		'label'				=>			esc_attr__( 'Font Color', 'xt-framework' ),
		'section'			=>			'xt_transparent_header_options',
		'priority'			=>			2,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Font Color Alt
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_transparent_font_color_alt',
		'label'				=>			esc_attr__( 'Hover', 'xt-framework' ),
		'section'			=>			'xt_transparent_header_options',
		'priority'			=>			3,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	// Off Canvas Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'menu-transparent-off-canvas-headline',
		'section'			=>			'xt_transparent_header_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Off Canvas Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			4,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left' ),
			)
		)
	) );

	// Full Screen Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'menu-transparent-full-screen-headline',
		'section'			=>			'xt_transparent_header_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Full Screen Menu Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			5,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'==',
			'value'			=>			'menu-full-screen',
			)
		)
	) );

	// Off Canvas Hamburger Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_transparent_hamburger_color',
		'label'				=>			esc_attr__( 'Icon Color', 'xt-framework' ),
		'section'			=>			'xt_transparent_header_options',
		'priority'			=>			6,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left', 'menu-full-screen' ),
			),
		)
	) );

	// Mobile Menu Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'menu-transparent-mobile-headline',
		'section'			=>			'xt_transparent_header_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Mobile Menu Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			7,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'!=',
			'value'			=>			'menu-mobile-default',
			)
		)
	) );

	// Mobile Menu Hamburger Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_transparent_hamburger_bg_color_mobile',
		'label'				=>			esc_attr__( 'Hamburger Icon Color', 'xt-framework' ),
		'section'			=>			'xt_transparent_header_options',
		'priority'			=>			8,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'!=',
			'value'			=>			'menu-mobile-default',
			),
			array(
			'setting'		=>			'mobile_menu_hamburger_style',
			'operator'		=>			'==',
			'value'			=>			'filled',
			)
		)
	) );

	// Mobile Menu Hamburger Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_transparent_hamburger_color_mobile',
		'label'				=>			esc_attr__( 'Icon Color', 'xt-framework' ),
		'section'			=>			'xt_transparent_header_options',
		'priority'			=>			9,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'!=',
			'value'			=>			'menu-mobile-default',
			)
		)
	) );

	/* Fields – Sub Menu */

	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-99985',
		'section'			=>			'xt_sub_menu_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			7,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'!=',
			'value'			=>			'menu-off-canvas',
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'!=',
			'value'			=>			'menu-off-canvas-left',
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'!=',
			'value'			=>			'menu-full-screen',
			),
		)
	) );

	// Animation
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'sub_menu_animation',
		'label'				=>			esc_attr__( 'Sub Menu Animation', 'xt-framework' ),
		'section'			=>			'xt_sub_menu_options',
		'default'			=>			'fade',
		'priority'			=>			7,
		'multiple'			=>			1,
		'choices'			=>			array(
			'fade'			=>			esc_attr__( 'Fade', 'xt-framework' ),
			'down'			=>			esc_attr__( 'Down', 'xt-framework' ),
			'up'			=>			esc_attr__( 'Up', 'xt-framework' ),
			'zoom-in'		=>			esc_attr__( 'Zoom In', 'xt-framework' ),
			'zoom-out'		=>			esc_attr__( 'Zoom Out', 'xt-framework' ),
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'!=',
			'value'			=>			'menu-off-canvas',
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'!=',
			'value'			=>			'menu-off-canvas-left',
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'!=',
			'value'			=>			'menu-full-screen',
			),
		)
	) );

	// Animation Duration
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'label'				=>			esc_attr__( 'Duration', 'xt' ),
		'settings'			=>			'sub_menu_animation_duration',
		'section'			=>			'xt_sub_menu_options',
		'priority'			=>			8,
		'default'			=>			'250',
		'choices'			=>			array(
			'min'			=>			'50',
			'max'			=>			'1000',
			'step'			=>			'10',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'!=',
			'value'			=>			'menu-off-canvas',
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'!=',
			'value'			=>			'menu-off-canvas-left',
			),
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'!=',
			'value'			=>			'menu-full-screen',
			),
		)
	) );

	/* Fields – Mobile Menu */

	// Off Canvas Width
	Kirki::add_field( 'xt', array(
		'type'				=>			'dimension',
		'label'				=>			esc_attr__( 'Menu Width', 'xt-framework' ),
		'description'		=>			esc_attr__( 'Default: 320px', 'xt-framework' ),
		'settings'			=>			'mobile_menu_width',
		'section'			=>			'xt_mobile_menu_options',
		'priority'			=>			7,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'==',
			'value'			=>			'menu-mobile-off-canvas',
			),
		)
	) );

	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-47399',
		'section'			=>			'xt_mobile_menu_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			30,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'==',
			'value'			=>			'menu-mobile-off-canvas',
			),
		)
	) );

	// Off Canvas Overlay
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'mobile_menu_overlay',
		'label'				=>			esc_attr__( 'Overlay', 'xt-framework' ),
		'section'			=>			'xt_mobile_menu_options',
		'priority'			=>			31,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'==',
			'value'			=>			'menu-mobile-off-canvas',
			),
		)
	) );

	// Off Canvas Overlay Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'mobile_menu_overlay_color',
		'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
		'section'			=>			'xt_mobile_menu_options',
		'default'			=>			'rgba(0,0,0,.5)',
		'priority'			=>			32,
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'mobile_menu_options',
			'operator'		=>			'==',
			'value'			=>			'menu-mobile-off-canvas',
			),
			array(
			'setting'		=>			'mobile_menu_overlay',
			'operator'		=>			'==',
			'value'			=>			true,
			)
		)
	) );

	/* Fields – Custom Menu */

	if ( is_plugin_active( 'bb-plugin/fl-builder.php' ) || is_plugin_active( 'elementor-pro/elementor-pro.php' ) ) {

		Kirki::add_field( 'xt', array(
			'type'				=>			'custom',
			'settings'			=>			'separator-61123',
			'section'			=>			'xt_menu_options',
			'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
			'priority'			=>			999998,
		) );

		// Custom Menu
		Kirki::add_field( 'xt', array(
			'type'				=>			'code',
			'label'				=>			esc_attr__( 'Custom Menu', 'xt-framework' ),
			'description'		=>			__( 'Paste your shortcode to replace the default menu with your Custom Menu. <br><br>Example:<br>[elementor-template id="xxx"]<br>[fl_builder_insert_layout id="xxx"]', 'xt-framework' ), //esc_html maybe
			'settings'			=>			'menu_custom',
			'section'			=>			'xt_menu_options',
			'priority'			=>			999999,
			'choices'			=>			array(
				'language'		=>			'html',
			),
		) );

	}

	/* Fields – Stacked (Advanced) */

	// Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'stacked-advanced-headline',
		'section'			=>			'xt_menu_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Advanced Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			100,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'==',
			'value'			=>			'menu-stacked-advanced',
			)
		)
	) );

	// Alignment
	Kirki::add_field( 'xt', array(
		'type'				=>			'radio-image',
		'settings'			=>			'menu_alignment',
		'label'				=>			esc_attr__( 'Menu Alignment', 'xt-framework' ),
		'section'			=>			'xt_menu_options',
		'default'			=>			'left',
		'priority'			=>			110,
		'multiple'			=>			1,
		'choices'			=>			array(
			'left'			=>			XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
			'center'		=>			XT_THEME_URI . '/inc/customizer/img/align-center.jpg',
			'right'			=>			XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'==',
			'value'			=>			'menu-stacked-advanced',
			)
		)
	) );

	// WYSIWYG
	Kirki::add_field( 'xt', array(
		'type'				=>			'wysiwyg',
		'settings'			=>			'menu_stacked_wysiwyg',
		'label'				=>			esc_attr__( 'Content beside Logo', 'xt-framework' ),
		'section'			=>			'xt_menu_options',
		'default'			=>			'',
		'priority'			=>			120,
		'transport'			=>			'postMessage',
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'==',
			'value'			=>			'menu-stacked-advanced',
			),
			array(
			'setting'		=>			'menu_alignment',
			'operator'		=>			'!=',
			'value'			=>			'center',
			)
		),
	) );

	// Logo Height
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'label'				=>			esc_attr__( 'Logo Area Height', 'xt' ),
		'settings'			=>			'menu_stacked_logo_height',
		'section'			=>			'xt_menu_options',
		'priority'			=>			130,
		'default'			=>			'20',
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'==',
			'value'			=>			'menu-stacked-advanced',
			)
		),
		'choices'			=>			array(
			'min'			=>			'5',
			'max'			=>			'80',
			'step'			=>			'1',
		),
	) );

	// Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_stacked_bg_color',
		'label'				=>			esc_attr__( 'Logo Area Background Color', 'xt-framework' ),
		'section'			=>			'xt_menu_options',
		'default'			=>			'#ffffff',
		'priority'			=>			140,
		'transport'			=>			'postMessage',
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'==',
			'value'			=>			'menu-stacked-advanced',
			)
		),
		'choices'			=>			array(
			'alpha'			=>			true,
		),
	) );

	/* Fields – Off Canvas */

	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'off-canvas-headline',
		'section'			=>			'xt_menu_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Off Canvas Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			200,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left' ),
			)
		)
	) );

	// Headline
	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'full-screen-headline',
		'section'			=>			'xt_menu_options',
		'default'			=>			'<h3 style="padding:15px 10px; background:#fff; margin:0;">'. __( 'Full Screen Menu Settings', 'xt-framework' ) .'</h3>',
		'priority'			=>			200,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'==',
			'value'			=>			'menu-full-screen',
			)
		)
	) );

	// Push Menu
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'menu_off_canvas_push',
		'label'				=>			esc_attr__( 'Push Menu', 'xt-framework' ),
		'section'			=>			'xt_menu_options',
		'priority'			=>			210,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left' ),
			),
		)
	) );

	// Menu Width
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'label'				=>			esc_attr__( 'Menu Width', 'xt-framework' ),
		'settings'			=>			'menu_off_canvas_width',
		'section'			=>			'xt_menu_options',
		'priority'			=>			220,
		'default'			=>			'400',
		'choices'			=>			array(
			'min'			=>			'300',
			'max'			=>			'500',
			'step'			=>			'10',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left' ),
			),
		)
	) );

	// Off Canvas Hamburger Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_off_canvas_hamburger_color',
		'label'				=>			esc_attr__( 'Icon Color', 'xt-framework' ),
		'section'			=>			'xt_menu_options',
		'default'			=>			'#6D7680',
		'priority'			=>			230,
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left', 'menu-full-screen' ),
			),
		)
	) );

	// Off Canvas Background Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_off_canvas_bg_color',
		'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
		'section'			=>			'xt_menu_options',
		'default'			=>			'#ffffff',
		'priority'			=>			240,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left', 'menu-full-screen' ),
			),
		)
	) );

	// Off Canvas Submenu Arrow Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_off_canvas_submenu_arrow_color',
		'label'				=>			esc_attr__( 'Sub Menu Arrow Color', 'xt-framework' ),
		'section'			=>			'xt_menu_options',
		'priority'			=>			250,
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left' ),
			),
		)
	) );

	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-08349',
		'section'			=>			'xt_menu_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			260,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left' ),
			),
		)
	) );

	// Off Canvas Overlay
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'menu_overlay',
		'label'				=>			esc_attr__( 'Overlay', 'xt-framework' ),
		'section'			=>			'xt_menu_options',
		'priority'			=>			260,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left' ),
			),
		)
	) );

	// Off Canvas Overlay Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_overlay_color',
		'label'				=>			esc_attr__( 'Background Color', 'xt-framework' ),
		'section'			=>			'xt_menu_options',
		'default'			=>			'rgba(0,0,0,.5)',
		'priority'			=>			270,
		'transport'			=>			'postMessage',
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_position',
			'operator'		=>			'in',
			'value'			=>			array( 'menu-off-canvas', 'menu-off-canvas-left' ),
			),
			array(
			'setting'		=>			'menu_overlay',
			'operator'		=>			'==',
			'value'			=>			true,
			)
		)
	) );

	/* Fields – Navigation Effects */

	// Effect
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'menu_effect',
		'label'				=>			esc_attr__( 'Hover Effect', 'xt-framework' ),
		'section'			=>			'xt_menu_effect_options',
		'default'			=>			'none',
		'priority'			=>			1,
		'multiple'			=>			1,
		'choices'			=>			array(
			'none'			=>			esc_attr__( 'None', 'xt-framework' ),
			'underlined'	=>			esc_attr__( 'Underline', 'xt-framework' ),
			'boxed'			=>			esc_attr__( 'Box', 'xt-framework' ),
			'modern'		=>			esc_attr__( 'Modern', 'xt-framework' ),
		),
	) );

	// Animation
	Kirki::add_field( 'xt', array(
		'type'				=>			'select',
		'settings'			=>			'menu_effect_animation',
		'label'				=>			esc_attr__( 'Animation', 'xt-framework' ),
		'section'			=>			'xt_menu_effect_options',
		'default'			=>			'fade',
		'priority'			=>			1,
		'multiple'			=>			1,
		'choices'			=>			array(
			'fade'			=>			esc_attr__( 'Fade', 'xt-framework' ),
			'slide'			=>			esc_attr__( 'Slide', 'xt-framework' ),
			'grow'			=>			esc_attr__( 'Grow', 'xt-framework' ),
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_effect',
			'operator'		=>			'!=',
			'value'			=>			'none',
			),
			array(
			'setting'		=>			'menu_effect',
			'operator'		=>			'!=',
			'value'			=>			'modern',
			)
		)
	) );

	// Alignment
	Kirki::add_field( 'xt', array(
		'type'				=>			'radio-image',
		'settings'			=>			'menu_effect_alignment',
		'label'				=>			esc_attr__( 'Alignment', 'xt-framework' ),
		'section'			=>			'xt_menu_effect_options',
		'default'			=>			'center',
		'priority'			=>			2,
		'choices'			=>			array(
			'left'			=>			XT_THEME_URI . '/inc/customizer/img/align-left.jpg',
			'center'		=>			XT_THEME_URI . '/inc/customizer/img/align-center.jpg',
			'right'			=>			XT_THEME_URI . '/inc/customizer/img/align-right.jpg',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_effect_animation',
			'operator'		=>			'==',
			'value'			=>			'slide',
			),
			array(
			'setting'		=>			'menu_effect',
			'operator'		=>			'!=',
			'value'			=>			'modern',
			),
			array(
			'setting'		=>			'menu_effect',
			'operator'		=>			'!=',
			'value'			=>			'none',
			)
		)
	) );

	// Color
	Kirki::add_field( 'xt', array(
		'type'				=>			'color',
		'settings'			=>			'menu_effect_color',
		'label'				=>			esc_attr__( 'Color', 'xt-framework' ),
		'section'			=>			'xt_menu_effect_options',
		'priority'			=>			3,
		'choices'			=>			array(
			'alpha'			=>			true,
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_effect',
			'operator'		=>			'!=',
			'value'			=>			'none',
			),
		)
	) );

	// Size (Underlined)
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'menu_effect_underlined_size',
		'label'				=>			esc_attr__( 'Size', 'xt-framework' ),
		'section'			=>			'xt_menu_effect_options',
		'priority'			=>			4,
		'default'			=>			'2',
		'choices'			=>			array(
			'min'			=>			'1',
			'max'			=>			'5',
			'step'			=>			'1',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_effect',
			'operator'		=>			'==',
			'value'			=>			'underlined',
			),
		)
	) );

	// Border Radius (Boxed)
	Kirki::add_field( 'xt', array(
		'type'				=>			'slider',
		'settings'			=>			'menu_effect_boxed_radius',
		'label'				=>			esc_attr__( 'Border Radius', 'xt-framework' ),
		'section'			=>			'xt_menu_effect_options',
		'priority'			=>			5,
		'default'			=>			'0',
		'choices'			=>			array(
			'min'			=>			'0',
			'max'			=>			'50',
			'step'			=>			'1',
		),
		'active_callback'	=>			array(
			array(
			'setting'		=>			'menu_effect',
			'operator'		=>			'==',
			'value'			=>			'boxed',
			),
			array(
			'setting'		=>			'menu_effect_animation',
			'operator'		=>			'!=',
			'value'			=>			'slide',
			)
		)
	) );

	/* Fields – Footer */

	// Sticky
	Kirki::add_field( 'xt', array(
		'type'				=>			'toggle',
		'settings'			=>			'footer_sticky',
		'label'				=>			esc_attr__( 'Sticky Footer', 'xt-framework' ),
		'section'			=>			'xt_footer_options',
		'default'			=>			'0',
		'priority'			=>			0,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'page_boxed',
			'operator'		=>			'!=',
			'value'			=>			true,
			),
		)
	) );

	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-174793',
		'section'			=>			'xt_footer_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			4,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'footer_layout',
			'operator'		=>			'!=',
			'value'			=>			'none',
			)
		)
	) );

	// Theme Author
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'footer_theme_author_name',
		'label'				=>			esc_attr__( 'Theme Author', 'xt-framework' ),
		'section'			=>			'xt_footer_options',
		'priority'			=>			4,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'footer_layout',
			'operator'		=>			'!=',
			'value'			=>			'none',
			)
		)
	) );

	// Theme Author URL
	Kirki::add_field( 'xt', array(
		'type'				=>			'text',
		'settings'			=>			'footer_theme_author_url',
		'label'				=>			esc_attr__( 'URL', 'xt-framework' ),
		'section'			=>			'xt_footer_options',
		'priority'			=>			4,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'footer_layout',
			'operator'		=>			'!=',
			'value'			=>			'none',
			)
		)
	) );

	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-306305',
		'section'			=>			'xt_footer_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			4,
		'active_callback'	=>			array(
			array(
			'setting'		=>			'footer_layout',
			'operator'		=>			'!=',
			'value'			=>			'none',
			)
		)
	) );

	Kirki::add_field( 'xt', array(
		'type'				=>			'custom',
		'settings'			=>			'separator-41749',
		'section'			=>			'xt_footer_options',
		'default'			=>			'<hr style="border-top: 1px solid #ccc; border-bottom: 1px solid #f8f8f8">',
		'priority'			=>			20,
	) );

	// Custom Footer
	Kirki::add_field( 'xt', array(
		'type'				=>			'code',
		'label'				=>			esc_attr__( 'Custom Footer', 'xt-framework' ),
		'description'		=>			__( 'Paste your shortcode to populate a saved row/template throughout your website. <br><br>Examples:<br>[elementor-template id="xxx"]<br>[fl_builder_insert_layout id="xxx"]', 'xt-framework' ), //esc_html maybe
		'settings'			=>			'footer_custom',
		'section'			=>			'xt_footer_options',
		'priority'			=>			20,
		'choices'			=>			array(
			'language'		=>			'html',
		),
	) );

	/* Fields – Scripts & Styles */

	// Head
	Kirki::add_field( 'xt', array(
		'type'				=>			'code',
		'settings'			=>			'head_scripts',
		'section'			=>			'xt_header_scripts',
		'label'				=>			esc_attr__( 'Head Code', 'xt-framework' ),
		'description'		=>			esc_attr__( 'Runs inside the head tag.', 'xt-framework' ),
		'priority'			=>			1,
		'choices'			=>			array(
			'language'		=>			'html',
		),
	) );

	// Header
	Kirki::add_field( 'xt', array(
		'type'				=>			'code',
		'settings'			=>			'header_scripts',
		'section'			=>			'xt_header_scripts',
		'label'				=>			esc_attr__( 'Header Code', 'xt-framework' ),
		'description'		=>			esc_attr__( 'Runs after the opening body tag.', 'xt-framework' ),
		'priority'			=>			2,
		'choices'			=>			array(
			'language'		=>			'html',
		),
	) );

	// Footer
	Kirki::add_field( 'xt', array(
		'type'				=>			'code',
		'settings'			=>			'footer_scripts',
		'section'			=>			'xt_footer_scripts',
		'label'				=>			esc_attr__( 'Footer Code', 'xt-framework' ),
		'description'		=>			esc_attr__( 'Add Scripts (Google Analytics, etc.) here. Runs before the closing body tag (wp_footer).', 'xt-framework' ),
		'priority'			=>			1,
		'choices'			=>			array(
			'language'		=>			'html',
		),
	) );

/**
 * Custom Controls
 */
function xt_custom_controls_default( $wp_customize ) {

	// Logo Size
	$wp_customize->add_setting( 'menu_logo_size_desktop',
		array(
			'sanitize_callback' => 'esc_textarea',
		)
	);

	$wp_customize->add_setting( 'menu_logo_size_tablet',
		array(
			'sanitize_callback' => 'esc_textarea',
		)
	);

	$wp_customize->add_setting( 'menu_logo_size_mobile',
		array(
			'sanitize_callback' => 'esc_textarea',
		)
	);

	$wp_customize->add_control( new XT_Customize_Responsive_Input_Slider(
		$wp_customize,
		'menu_logo_size',
		array(
			'label'	=> esc_attr__( 'Logo Width', 'xt-framework' ),
			'section' => 'title_tagline',
			'settings' => 'menu_logo_size_desktop',
			'priority' => 2,
			'choices'			=>			array(
				'min'			=>			'0',
				'max'			=>			'500',
				'step'			=>			'1',
			),
			'active_callback' => function() { return get_theme_mod( 'custom_logo' ) ? true : false; }
		)
	));

	$wp_customize->add_control( new XT_Customize_Responsive_Input_Slider(
		$wp_customize,
		'menu_logo_size',
		array(
			'label'	=> esc_attr__( 'Logo Width', 'xt-framework' ),
			'section' => 'title_tagline',
			'settings' => 'menu_logo_size_tablet',
			'priority' => 2,
			'choices'			=>			array(
				'min'			=>			'0',
				'max'			=>			'500',
				'step'			=>			'1',
			),
			'active_callback' => function() { return get_theme_mod( 'custom_logo' ) ? true : false; },
		)
	));

	$wp_customize->add_control( new XT_Customize_Responsive_Input_Slider(
		$wp_customize,
		'menu_logo_size',
		array(
			'label'	=> esc_attr__( 'Logo Width', 'xt-framework' ),
			'section' => 'title_tagline',
			'settings' => 'menu_logo_size_mobile',
			'priority' => 2,
			'choices'			=>			array(
				'min'			=>			'0',
				'max'			=>			'500',
				'step'			=>			'1',
			),
			'active_callback' => function() { return get_theme_mod( 'custom_logo' ) ? true : false; },
		)
	));

	// Site Title
	$wp_customize->add_setting( 'menu_logo_font_size_desktop',
		array(
			'default' => '22px',
			'sanitize_callback' => 'esc_textarea',
		)
	);

	$wp_customize->add_setting( 'menu_logo_font_size_tablet',
		array(
			'sanitize_callback' => 'esc_textarea',
		)
	);

	$wp_customize->add_setting( 'menu_logo_font_size_mobile',
		array(
			'sanitize_callback' => 'esc_textarea',
		)
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'menu_logo_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'title_tagline',
			'settings' => 'menu_logo_font_size_desktop',
			'priority' => 13,
			'active_callback' => function() { return get_theme_mod( 'custom_logo' ) ? false : true; },
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'menu_logo_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'title_tagline',
			'settings' => 'menu_logo_font_size_tablet',
			'priority' => 13,
			'active_callback' => function() { return get_theme_mod( 'custom_logo' ) ? false : true; },
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'menu_logo_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'title_tagline',
			'settings' => 'menu_logo_font_size_mobile',
			'priority' => 13,
			'active_callback' => function() { return get_theme_mod( 'custom_logo' ) ? false : true; },
		)
	));

	// Tagline
	$wp_customize->add_setting( 'menu_logo_description_font_size_desktop',
		array(
			'sanitize_callback' => 'esc_textarea',
		)
	);

	$wp_customize->add_setting( 'menu_logo_description_font_size_tablet',
		array(
			'sanitize_callback' => 'esc_textarea',
		)
	);

	$wp_customize->add_setting( 'menu_logo_description_font_size_mobile',
		array(
			'sanitize_callback' => 'esc_textarea',
		)
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'menu_logo_description_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'title_tagline',
			'settings' => 'menu_logo_description_font_size_desktop',
			'priority' => 23,
			'active_callback' => function() { return !get_theme_mod( 'custom_logo' ) && get_theme_mod( 'menu_logo_description' ) ? true : false; },
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'menu_logo_description_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'title_tagline',
			'settings' => 'menu_logo_description_font_size_tablet',
			'priority' => 23,
			'active_callback' => function() { return !get_theme_mod( 'custom_logo' ) && get_theme_mod( 'menu_logo_description' ) ? true : false; },
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'menu_logo_description_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'title_tagline',
			'settings' => 'menu_logo_description_font_size_mobile',
			'priority' => 23,
			'active_callback' => function() { return !get_theme_mod( 'custom_logo' ) && get_theme_mod( 'menu_logo_description' ) ? true : false; },
		)
	));

	// Sub Menu Padding
	$wp_customize->add_setting( 'sub_menu_padding_top',
		array(
			'default' => '10',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_setting( 'sub_menu_padding_right',
		array(
			'default' => '20',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_setting( 'sub_menu_padding_bottom',
		array(
			'default' => '10',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_setting( 'sub_menu_padding_left',
		array(
			'default' => '20',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control( new XT_Customize_Padding_Control(
		$wp_customize,
		'sub_menu_padding',
		array(
			'label'	=> esc_attr__( 'Padding', 'xt-framework' ),
			'section' => 'xt_sub_menu_options',
			'settings' => 'sub_menu_padding_top',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Padding_Control(
		$wp_customize,
		'sub_menu_padding',
		array(
			'label'	=> esc_attr__( 'Padding', 'xt-framework' ),
			'section' => 'xt_sub_menu_options',
			'settings' => 'sub_menu_padding_right',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Padding_Control(
		$wp_customize,
		'sub_menu_padding',
		array(
			'label'	=> esc_attr__( 'Padding', 'xt-framework' ),
			'section' => 'xt_sub_menu_options',
			'settings' => 'sub_menu_padding_bottom',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Padding_Control(
		$wp_customize,
		'sub_menu_padding',
		array(
			'label'	=> esc_attr__( 'Padding', 'xt-framework' ),
			'section' => 'xt_sub_menu_options',
			'settings' => 'sub_menu_padding_left',
			'priority' => 2,
		)
	));

	// Mobile Menu Padding
	$wp_customize->add_setting( 'mobile_menu_padding_top',
		array(
			'default' => '10',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_setting( 'mobile_menu_padding_right',
		array(
			'default' => '20',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_setting( 'mobile_menu_padding_bottom',
		array(
			'default' => '10',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_setting( 'mobile_menu_padding_left',
		array(
			'default' => '20',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control( new XT_Customize_Padding_Control(
		$wp_customize,
		'mobile_menu_padding',
		array(
			'label'	=> esc_attr__( 'Menu Item Padding', 'xt-framework' ),
			'section' => 'xt_mobile_menu_options',
			'settings' => 'mobile_menu_padding_top',
			'priority' => 8,
		)
	));

	$wp_customize->add_control( new XT_Customize_Padding_Control(
		$wp_customize,
		'mobile_menu_padding',
		array(
			'label'	=> esc_attr__( 'Menu Item Padding', 'xt-framework' ),
			'section' => 'xt_mobile_menu_options',
			'settings' => 'mobile_menu_padding_right',
			'priority' => 8,
		)
	));

	$wp_customize->add_control( new XT_Customize_Padding_Control(
		$wp_customize,
		'mobile_menu_padding',
		array(
			'label'	=> esc_attr__( 'Menu Item Padding', 'xt-framework' ),
			'section' => 'xt_mobile_menu_options',
			'settings' => 'mobile_menu_padding_bottom',
			'priority' => 8,
		)
	));

	$wp_customize->add_control( new XT_Customize_Padding_Control(
		$wp_customize,
		'mobile_menu_padding',
		array(
			'label'	=> esc_attr__( 'Menu Item Padding', 'xt-framework' ),
			'section' => 'xt_mobile_menu_options',
			'settings' => 'mobile_menu_padding_left',
			'priority' => 8,
		)
	));

	// Responsive Sidebar Widget Padding
	$responsive_sidebar_padding_settings = array(
		'sidebar_widget_padding_top_desktop', 'sidebar_widget_padding_top_tablet', 'sidebar_widget_padding_top_mobile',
		'sidebar_widget_padding_right_desktop', 'sidebar_widget_padding_right_tablet', 'sidebar_widget_padding_right_mobile',
		'sidebar_widget_padding_bottom_desktop', 'sidebar_widget_padding_bottom_tablet', 'sidebar_widget_padding_bottom_mobile',
		'sidebar_widget_padding_left_desktop', 'sidebar_widget_padding_left_tablet', 'sidebar_widget_padding_left_mobile',
	);

	foreach( $responsive_sidebar_padding_settings as $responsive_sidebar_padding_setting ) {
		$wp_customize->add_setting( $responsive_sidebar_padding_setting,
			array(
				'sanitize_callback' => 'absint'
			)
		);

		$wp_customize->add_control( new XT_Customize_Responsive_Padding_Control(
			$wp_customize,
			'sidebar_widget_padding',
			array(
				'label'	=> esc_attr__( 'Widget Padding', 'xt-framework' ),
				'section' => 'xt_sidebar_options',
				'settings' => $responsive_sidebar_padding_setting,
				'priority' => 3,
			)
		));

	}

	// Responsive Post Style Setting (Boxed)
	$archives = apply_filters( 'xt_archives', array( 'archive' ) );

	foreach ( $archives as $archive ) {

		$responsive_boxed_style_post_settings = array(
			$archive . '_boxed_padding_top_desktop', $archive . '_boxed_padding_top_tablet', $archive . '_boxed_padding_top_mobile',
			$archive . '_boxed_padding_right_desktop', $archive . '_boxed_padding_right_tablet', $archive . '_boxed_padding_right_mobile',
			$archive . '_boxed_padding_bottom_desktop', $archive . '_boxed_padding_bottom_tablet', $archive . '_boxed_padding_bottom_mobile',
			$archive . '_boxed_padding_left_desktop', $archive . '_boxed_padding_left_tablet', $archive . '_boxed_padding_left_mobile',
		);

		foreach( $responsive_boxed_style_post_settings as $responsive_boxed_style_post_setting ) {
			$wp_customize->add_setting( $responsive_boxed_style_post_setting,
				array(
					'sanitize_callback' => 'absint'
				)
			);

			$wp_customize->add_control( new XT_Customize_Responsive_Padding_Control(
				$wp_customize,
				$archive . '_boxed_padding',
				array(
					'label'	=> esc_attr__( 'Padding', 'xt-framework' ),
					'section' => 'xt_' . $archive . '_options',
					'settings' => $responsive_boxed_style_post_setting,
					'priority' => 25,
					'active_callback' => function() use ($archive) { return get_theme_mod( $archive . '_post_style' ) == 'boxed' ? true : false; },
				)
			));

		}

	}

}
add_action( 'customize_register' , 'xt_custom_controls_default' );

// kirki Custom Default Fonts
function xt_custom_default_fonts( $standard_fonts ) {

	$standard_fonts['helvetica_neue'] = array(
		'label' => 'Helvetica Neue',
		'variants' => array( 'regular', 'italic', '700', '700italic' ),
		'stack' => '"Helvetica Neue", Helvetica, Arial, sans-serif',
	);

	$standard_fonts['helvetica'] = array(
		'label' => 'Helvetica',
		'variants' => array( 'regular', 'italic', '700', '700italic' ),
		'stack' => 'Helvetica, Arial, sans-serif',
	);

	$standard_fonts['arial'] = array(
		'label' => 'Arial',
		'variants' => array( 'regular', 'italic', '700', '700italic' ),
		'stack' => 'Arial, Helvetica, sans-serif',
	);

	return $standard_fonts;

}
add_filter( 'kirki/fonts/standard_fonts', 'xt_custom_default_fonts', 0 );


function xt_custom_controls( $wp_customize ) {

	if( class_exists('XT_Customize_Responsive_Input_Slider') ) {

		// Sticky Navigation Logo Size
		$wp_customize->add_setting( 'menu_active_logo_size_desktop',
			array()
		);

		$wp_customize->add_setting( 'menu_active_logo_size_tablet',
			array()
		);

		$wp_customize->add_setting( 'menu_active_logo_size_mobile',
			array()
		);

		$wp_customize->add_control( new XT_Customize_Responsive_Input_Slider(
			$wp_customize,
			'menu_active_logo_size',
			array(
				'label'	=> esc_attr__( 'Logo Width', 'xt-framework' ),
				'section' => 'xt_sticky_menu_options',
				'settings' => 'menu_active_logo_size_desktop',
				'priority' => 3,
				'choices'			=>			array(
					'min'			=>			'0',
					'max'			=>			'500',
					'step'			=>			'1',
				),
				'active_callback' => function() { return get_theme_mod( 'custom_logo' ) && get_theme_mod( 'menu_sticky' ) ? true : false; }
			)
		));

		$wp_customize->add_control( new XT_Customize_Responsive_Input_Slider(
			$wp_customize,
			'menu_active_logo_size',
			array(
				'label'	=> esc_attr__( 'Logo Width', 'xt-framework' ),
				'section' => 'xt_sticky_menu_options',
				'settings' => 'menu_active_logo_size_tablet',
				'priority' => 3,
				'choices'			=>			array(
					'min'			=>			'0',
					'max'			=>			'500',
					'step'			=>			'1',
				),
				'active_callback' => function() { return get_theme_mod( 'custom_logo' ) && get_theme_mod( 'menu_sticky' ) ? true : false; }
			)
		));

		$wp_customize->add_control( new XT_Customize_Responsive_Input_Slider(
			$wp_customize,
			'menu_active_logo_size',
			array(
				'label'	=> esc_attr__( 'Logo Width', 'xt-framework' ),
				'section' => 'xt_sticky_menu_options',
				'settings' => 'menu_active_logo_size_mobile',
				'priority' => 3,
				'choices'			=>			array(
					'min'			=>			'0',
					'max'			=>			'500',
					'step'			=>			'1',
				),
				'active_callback' => function() { return get_theme_mod( 'custom_logo' ) && get_theme_mod( 'menu_sticky' ) ? true : false; }
			)
		));

	}

	// Responsive Font Sizes (Text)
	$wp_customize->add_setting( 'page_font_size_desktop',
		array(
			'default' => '16px'
		)
	);

	$wp_customize->add_setting( 'page_font_size_tablet',
		array()
	);

	$wp_customize->add_setting( 'page_font_size_mobile',
		array()
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_font_options',
			'settings' => 'page_font_size_desktop',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_font_options',
			'settings' => 'page_font_size_tablet',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_font_options',
			'settings' => 'page_font_size_mobile',
			'priority' => 2,
		)
	));

	// Responsive Font Sizes (H1)
	$wp_customize->add_setting( 'page_h1_font_size_desktop',
		array(
			'default' => '32px'
		)
	);

	$wp_customize->add_setting( 'page_h1_font_size_tablet',
		array()
	);

	$wp_customize->add_setting( 'page_h1_font_size_mobile',
		array()
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h1_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h1_options',
			'settings' => 'page_h1_font_size_desktop',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h1_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h1_options',
			'settings' => 'page_h1_font_size_tablet',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h1_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h1_options',
			'settings' => 'page_h1_font_size_mobile',
			'priority' => 2,
		)
	));

	// Responsive Font Sizes (H2)
	$wp_customize->add_setting( 'page_h2_font_size_desktop',
		array(
			'default' => '28px'
		)
	);

	$wp_customize->add_setting( 'page_h2_font_size_tablet',
		array()
	);

	$wp_customize->add_setting( 'page_h2_font_size_mobile',
		array()
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h2_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h2_options',
			'settings' => 'page_h2_font_size_desktop',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h2_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h2_options',
			'settings' => 'page_h2_font_size_tablet',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h2_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h2_options',
			'settings' => 'page_h2_font_size_mobile',
			'priority' => 2,
		)
	));

	// Responsive Font Sizes (H3)
	$wp_customize->add_setting( 'page_h3_font_size_desktop',
		array(
			'default' => '24px'
		)
	);

	$wp_customize->add_setting( 'page_h3_font_size_tablet',
		array()
	);

	$wp_customize->add_setting( 'page_h3_font_size_mobile',
		array()
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h3_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h3_options',
			'settings' => 'page_h3_font_size_desktop',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h3_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h3_options',
			'settings' => 'page_h3_font_size_tablet',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h3_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h3_options',
			'settings' => 'page_h3_font_size_mobile',
			'priority' => 2,
		)
	));

	// Responsive Font Sizes (H4)
	$wp_customize->add_setting( 'page_h4_font_size_desktop',
		array(
			'default' => '20px'
		)
	);

	$wp_customize->add_setting( 'page_h4_font_size_tablet',
		array()
	);

	$wp_customize->add_setting( 'page_h4_font_size_mobile',
		array()
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h4_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h4_options',
			'settings' => 'page_h4_font_size_desktop',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h4_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h4_options',
			'settings' => 'page_h4_font_size_tablet',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h4_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h4_options',
			'settings' => 'page_h4_font_size_mobile',
			'priority' => 2,
		)
	));

	// Responsive Font Sizes (H5)
	$wp_customize->add_setting( 'page_h5_font_size_desktop',
		array(
			'default' => '16px'
		)
	);

	$wp_customize->add_setting( 'page_h5_font_size_tablet',
		array()
	);

	$wp_customize->add_setting( 'page_h5_font_size_mobile',
		array()
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h5_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h5_options',
			'settings' => 'page_h5_font_size_desktop',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h5_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h5_options',
			'settings' => 'page_h5_font_size_tablet',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h5_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h5_options',
			'settings' => 'page_h5_font_size_mobile',
			'priority' => 2,
		)
	));

	// Responsive Font Sizes (H6)
	$wp_customize->add_setting( 'page_h6_font_size_desktop',
		array(
			'default' => '16px'
		)
	);

	$wp_customize->add_setting( 'page_h6_font_size_tablet',
		array()
	);

	$wp_customize->add_setting( 'page_h6_font_size_mobile',
		array()
	);

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h6_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h6_options',
			'settings' => 'page_h6_font_size_desktop',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h6_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h6_options',
			'settings' => 'page_h6_font_size_tablet',
			'priority' => 2,
		)
	));

	$wp_customize->add_control( new XT_Customize_Font_Size_Control(
		$wp_customize,
		'page_h6_font_size',
		array(
			'label'	=> esc_attr__( 'Font Size', 'xt-framework' ),
			'section' => 'xt_h6_options',
			'settings' => 'page_h6_font_size_mobile',
			'priority' => 2,
		)
	));

}
add_action( 'customize_register' , 'xt_custom_controls' );
