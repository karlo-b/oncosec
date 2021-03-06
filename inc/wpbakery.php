<?php
/**
 * wpbakery
 *
 * All files are being called from here.
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}






add_action( 'vc_after_init', 'vc_after_init_actions' );

function vc_after_init_actions() {

	/*** Row ***/
	vc_remove_param( 'vc_row', 'rtl_reverse' );
	vc_remove_param( 'vc_row_inner', 'rtl_reverse' );

	vc_add_param(
		'vc_row',
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Row Padding', 'xt-framework' ),
			'param_name' => 'row_padding',
			'weight'     => 10,
			'std'        => '',
			'value'      => array(
				'initial'     => 'xt-padding-initial',
				'none'        => 'xt-padding-none',
				'Small'       => 'xt-padding-small',
				'Medium'      => 'xt-padding-medium',
				'Large'       => 'xt-padding-large',
				'Extra Large' => 'xt-padding-xlarge',
			),
		)
	);
	vc_add_param(
		'vc_row',
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Reverse Row Columns on Desktop Size', 'xt-framework' ),
			'param_name' => 'row_reverse',
			'weight'     => 10,
			'std'        => '',
			'value'      => array(
				'yes' => 'xt-reverse-row',
			),
		)
	);

}



if ( ! function_exists( 'carousel_content' ) ) {
	function carousel_content( $atts, $content = null ) {
		return '<div class="xt-slider">' . do_shortcode( $content ) . '</div>';
	}
	add_shortcode( 'carousel_content', 'carousel_content' );
}

if ( ! function_exists( 'single_carousel_content' ) ) {
	function single_carousel_content( $atts, $content ) {
		extract(
			shortcode_atts(
				array(
					'img' => '',
				),
				$atts
			)
		);

		$image     = wp_get_attachment_image_src( $img, 'full' );
		$image_src = $image['0'];
		$output    = '<div class="slick-item" style="background:url(' . $image_src . ')">
					<div class="xt-content">
					' . do_shortcode( $content ) . '
					</div>					
                </div>';
		return $output;
	}
	add_shortcode( 'single_carousel_content', 'single_carousel_content' );
}




// Mapping
vc_map(
	array(
		'name'                    => __( 'Carousel Content', 'xstream' ),
		'base'                    => 'carousel_content',
		'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
		'as_parent'               => array( 'only' => 'single_carousel_content' ),
		'content_element'         => true,
		'show_settings_on_create' => false,
		'is_container'            => true,
		'js_view'                 => 'VcColumnView',
		'category'                => array( 'XT', 'Content' ),
	)
);

vc_map(
	array(
		'name'                    => __( 'Single Carousel Content', 'xstream' ),
		'base'                    => 'single_carousel_content',
		'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
		'content_element'         => true,
		'as_child'                => array( 'only' => 'carousel_content' ),
		'show_settings_on_create' => true,
		'params'                  => array(
			array(
				'type'       => 'textarea_html',
				'heading'    => __( 'Title', 'xstream' ),
				'param_name' => 'content',
			),
			array(
				'type'       => 'attach_image',
				'heading'    => __( 'Add Image', 'xstream' ),
				'param_name' => 'img',
			),
		),
	)
);

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Carousel_Content extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Single_Carousel_Content extends WPBakeryShortCode {
	}
}


// Create Shortcode box-link
// Use the shortcode: [box-link image="" title="" subtitle=""]
function create_boxlink_shortcode( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'image'     => '',
			'title'     => '',
			'subtitle'  => '',
			'link'      => '',
			'paragraph' => '',
		),
		$atts,
		'box-link'
	);
	// Attributes in var
	$image     = $atts['image'];
	$title     = $atts['title'];
	$subtitle  = $atts['subtitle'];
	$link      = $atts['link'];
	$paragraph = $atts['paragraph'];

	// Output Code
	$output = '<a class="link-box" href="' . $link . '">';
	if ( $image ) {
		$image_obj = wp_get_attachment( $image );
		$image_src = $image_obj['src'];
		$image_alt = $image_obj['alt'];
		$output   .= '<img src="' . $image_src . '" alt="' . $image_alt . '"/>';
	}
	$output .= '<div class="text-content">';
	if ( $title ) {
		$output .= '<h3>' . $title . '</h3>';
	}
	if ( $paragraph ) {
		$output .= '<p>' . $paragraph . '</p>';
	}
	if ( $subtitle ) {
		$output .= '<h4>' . $subtitle . '</h4>';
	}
	$output .= '</div>';
	$output .= '</a>';

	return $output;
}
add_shortcode( 'box-link', 'create_boxlink_shortcode' );

// Create Box Link element for Visual Composer
add_action( 'vc_before_init', 'boxlink_integrateWithVC' );
function boxlink_integrateWithVC() {
	vc_map(
		array(
			'name'                    => __( 'Box Link', 'xstream' ),
			'base'                    => 'box-link',
			'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
			'show_settings_on_create' => false,
			'category'                => __( 'XT', 'xstream' ),
			'params'                  => array(
				array(
					'type'        => 'attach_image',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Image', 'xstream' ),
					'param_name'  => 'image',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Title', 'xstream' ),
					'param_name'  => 'title',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Subtitle', 'xstream' ),
					'param_name'  => 'subtitle',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Link', 'xstream' ),
					'param_name'  => 'link',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Paragraph', 'xstream' ),
					'param_name'  => 'paragraph',
				),
			),
		)
	);
}


// Create Shortcode xt-button
// Use the shortcode: [xt-button title="" url="" class=""]
function create_xtbutton_shortcode( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'title' => '',
			'url'   => '',
			'class' => '',
		),
		$atts,
		'xt-button'
	);
	// Attributes in var
	$title = $atts['title'];
	$url   = $atts['url'];
	$class = $atts['class'];

	return '<a class="' . $class . ' xt-button" href="' . $url . '">' . $title . '</a>';

}
add_shortcode( 'xt-button', 'create_xtbutton_shortcode' );

// Create Custom Button element for Visual Composer
add_action( 'vc_before_init', 'xtbutton_integrateWithVC' );
function xtbutton_integrateWithVC() {
	vc_map(
		array(
			'name'                    => __( 'Custom Button', 'xstream' ),
			'base'                    => 'xt-button',
			'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
			'show_settings_on_create' => false,
			'category'                => __( 'XT', 'xstream' ),
			'params'                  => array(
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Title', 'xstream' ),
					'param_name'  => 'title',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'URL', 'xstream' ),
					'param_name'  => 'url',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Class', 'xstream' ),
					'param_name'  => 'class',
				),
			),
		)
	);
}






if ( ! function_exists( 'image_grid' ) ) {
	function image_grid( $atts, $content = null ) {
		return '<div class="xt-image-grid">' . do_shortcode( $content ) . '</div>';
	}
	add_shortcode( 'image_grid', 'image_grid' );
}

if ( ! function_exists( 'single_image_grid' ) ) {
	function single_image_grid( $atts, $content ) {
		extract(
			shortcode_atts(
				array(
					'image'    => '',
					'title'    => '',
					'subtitle' => '',
					'url'      => '',
				),
				$atts
			)
		);
		$image    = $atts['image'];
		$title    = $atts['title'];
		$subtitle = $atts['subtitle'];
		$url      = $atts['url'];
		$output   = '<div class="image-grid-item">';
		$output  .= $url ? '<a href="' . $url . '" class="xt-content">' : '<div class="xt-content">';

		if ( $image ) {
			$image_obj = wp_get_attachment( $image );
			$image_src = $image_obj['src'];
			$image_alt = $image_obj['alt'];
			$output   .= '<img src="' . $image_src . '" alt="' . $image_alt . '"/>';
		}
			$output .= ( $title && $subtitle ) ? '<div class="text-over">' : '';
		if ( $title ) {
			$output .= '<h3>' . $title . '</h3>';
		}
		if ( $subtitle ) {
			$output .= '<p>' . $subtitle . '</p>';
		}
			$output .= ( $title && $subtitle ) ? '<span class="chevron right"></span></div>' : '';

			$output .= $url ? '</a>' : '</div>';
		$output     .= '</div>';
		return $output;
	}
	add_shortcode( 'single_image_grid', 'single_image_grid' );
}




// Mapping
vc_map(
	array(
		'name'                    => __( 'Image Grid', 'xstream' ),
		'base'                    => 'image_grid',
		'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
		'as_parent'               => array( 'only' => 'single_image_grid' ),
		'content_element'         => true,
		'show_settings_on_create' => false,
		'is_container'            => true,
		'js_view'                 => 'VcColumnView',
		'category'                => array( 'XT', 'Content' ),
	)
);

vc_map(
	array(
		'name'                    => __( 'Single Image Grid', 'xstream' ),
		'base'                    => 'single_image_grid',
		'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
		'content_element'         => true,
		'as_child'                => array( 'only' => 'image_grid' ),
		'show_settings_on_create' => false,
		'params'                  => array(
			array(
				'type'        => 'attach_image',
				'holder'      => 'div',
				'class'       => '',
				'admin_label' => false,
				'heading'     => __( 'Image', 'xstream' ),
				'param_name'  => 'image',
			),
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'class'       => '',
				'admin_label' => false,
				'heading'     => __( 'Title Over', 'xstream' ),
				'param_name'  => 'title',
			),
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'class'       => '',
				'admin_label' => false,
				'heading'     => __( 'Subtitle Over', 'xstream' ),
				'param_name'  => 'subtitle',
			),
			array(
				'type'        => 'textfield',
				'holder'      => 'div',
				'class'       => '',
				'admin_label' => false,
				'heading'     => __( 'URL', 'xstream' ),
				'param_name'  => 'url',
			),
		),
	)
);

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Image_Grid extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Single_Image_Grid extends WPBakeryShortCode {
	}
}


// Create Shortcode xt-team-member
// Use the shortcode: [xt-team-member image="" title="" position="" short_description="" content=""]
function create_xtteammember_shortcode( $atts, $content ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'image'             => '',
			'title'             => '',
			'position'          => '',
			'short_description' => '',
			'content'           => '',
		),
		$atts,
		'xt-team-member'
	);
	// Attributes in var
	$image             = $atts['image'];
	$title             = $atts['title'];
	$position          = $atts['position'];
	$short_description = $atts['short_description'];

	// Output Code
	$output = '<div class="team-member">';
	if ( $image ) {
		$image_obj = wp_get_attachment( $image );
		$image_src = $image_obj['src'];
		$image_alt = $image_obj['alt'];
		$output   .= '<img src="' . $image_src . '" alt="' . $image_alt . '"/>';
	}
	if ( $title ) {
		$output .= '<h3>' . $title . '</h3>';
	}
	if ( $position ) {
		$output .= '<h6>' . $position . '</h6>';
	}
	if ( $short_description ) {
		$output .= '<p class="short-description">' . $short_description . '</p>';
	}
	$output .= '<div class="trigger">>> Read Full Bio</div>';
	$output .= '</div>';
	$output .= '<div class="xt-modal">
			<div class="xt-modal-content">
			<div class="header"><h3>' . $title . '</h3><span class="close-button">×</span></div>
			<div class="content">' . $content . '</div>
			<div class="footer"><span class="close-button-2">Close</span></div>
			</div>
		</div>';

	return $output;
}
add_shortcode( 'xt-team-member', 'create_xtteammember_shortcode' );

// Create Team Member element for Visual Composer
add_action( 'vc_before_init', 'xtteammember_integrateWithVC' );
function xtteammember_integrateWithVC() {
	vc_map(
		array(
			'name'                    => __( 'Team Member', 'xstream' ),
			'base'                    => 'xt-team-member',
			'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
			'show_settings_on_create' => false,
			'category'                => __( 'XT', 'xstream' ),
			'params'                  => array(
				array(
					'type'        => 'attach_image',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Image', 'xstream' ),
					'param_name'  => 'image',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Title', 'xstream' ),
					'param_name'  => 'title',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Position', 'xstream' ),
					'param_name'  => 'position',
				),
				array(
					'type'        => 'textarea',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Short Description', 'xstream' ),
					'param_name'  => 'short_description',
				),
				array(
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Content', 'xstream' ),
					'param_name'  => 'content',
				),
			),
		)
	);
}


// Create Shortcode xt-open-position
// Use the shortcode: [xt-open-position image="" content="" link=""]
function create_xtopenposition_shortcode( $atts, $content ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'image'   => '',
			'link'    => '',
			'content' => '',
		),
		$atts,
		'xt-open-position'
	);
	// Attributes in var
	$image = $atts['image'];
	$link  = $atts['link'];

	// Output Code
	$output = '<div class="open-position">';
	if ( $image ) {
		$image_obj = wp_get_attachment( $image );
		$image_src = $image_obj['src'];
		$image_alt = $image_obj['alt'];
		$output   .= '<img src="' . $image_src . '" alt="' . $image_alt . '"/>';
	}
	if ( $content ) {
		$output .= '<div class="description">' . $content . '</div>';
	}
	if ( $link ) {
		$output .= '<a class="xt-btn-orange center xt-button" href="' . $link . '">LEARN MORE</a>';
	}
	$output .= '</div>';

	return $output;
}
add_shortcode( 'xt-open-position', 'create_xtopenposition_shortcode' );

// Create Open Position element for Visual Composer
add_action( 'vc_before_init', 'xtopenposition_integrateWithVC' );
function xtopenposition_integrateWithVC() {
	vc_map(
		array(
			'name'                    => __( 'Open Position', 'xstream' ),
			'base'                    => 'xt-open-position',
			'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
			'show_settings_on_create' => true,
			'category'                => __( 'XT', 'xstream' ),
			'params'                  => array(
				array(
					'type'        => 'attach_image',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Image', 'xstream' ),
					'param_name'  => 'image',
				),
				array(
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Content', 'xstream' ),
					'param_name'  => 'content',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => true,
					'heading'     => __( 'Link', 'xstream' ),
					'param_name'  => 'link',
				),
			),
		)
	);
}

//Pipeline



if ( ! function_exists( 'pipeline' ) ) {
	function pipeline( $atts, $content = null ) {
		extract(
			shortcode_atts(
				array(
					'title' => '',
				),
				$atts
			)
		);
		return '<div class="xt-pipeline"><div class="pipeline-title"><h2 class="pipelineTitle">Pipeline</h2><h3>' . $title . '</h3></div><div class="pipeline-list">' . do_shortcode( $content ) . '</div></div>';
	}
	add_shortcode( 'pipeline', 'pipeline' );
}

if ( ! function_exists( 'single_pipeline' ) ) {
	function single_pipeline( $atts, $content ) {
		extract(
			shortcode_atts(
				array(
					'regimen'    => '',
					'trial'      => '',
					'indication' => '',
					'partner'    => '',
					'phase'      => '',
					'link'       => '',
				),
				$atts
			)
		);

		$image     = wp_get_attachment_image_src( $partner, 'full' );
		$image_src = $image['0'];
		$output   .= '<div class="pipeline-item">';
		$output   .= ( $link ) ? '<a href="" class="pipeline-inner">' : '<div class="pipeline-inner">';
		$output   .= '<div class="inner-col-2"><p class="rowHeading">REGIMEN</p><div>' . rawurldecode( base64_decode( $regimen ) ) . '</div></div>';
		$output   .= '<div class="inner-col-2"><p class="rowHeading">TRIAL</p><div>' . rawurldecode( base64_decode( $trial ) ) . '</div></div>';
		$output   .= '<div class="inner-col-2"><p class="rowHeading">INDICATION</p><div>' . rawurldecode( base64_decode( $indication ) ) . '</div></div>';
		$output   .= '<div class="inner-col-2"><p class="rowHeading">PARTNER</p><div><img src="' . $image_src . '" alt="partner-image"/></div></div>';

		if ( $phase ) {
			$output .= '<div class="inner-col-4 phase"><div class="progressHeader pl-0">
			<span>PHASE 1</span>
			<span>PHASE 2</span>
			<span>PIVOTAL</span>
		</div>
			<div class="progress">
			<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:' . $phase . '%"></div>
		</div>
		</div>';
		}

		$output .= ( $link ) ? '</a>' : '</div>';
		$output .= '</div>';
		return $output;
	}
	add_shortcode( 'single_pipeline', 'single_pipeline' );
}




// Mapping
vc_map(
	array(
		'name'                    => __( 'Pipeline', 'xstream' ),
		'base'                    => 'pipeline',
		'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
		'as_parent'               => array( 'only' => 'single_pipeline' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'is_container'            => true,
		'js_view'                 => 'VcColumnView',
		'category'                => array( 'XT', 'Content' ),
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Title', 'xstream' ),
				'param_name'  => 'title',
				'admin_label' => true,
			),
		),
	)
);

vc_map(
	array(
		'name'                    => __( 'Pipeline Item', 'xstream' ),
		'base'                    => 'single_pipeline',
		'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
		'content_element'         => true,
		'as_child'                => array( 'only' => 'pipeline' ),
		'show_settings_on_create' => true,
		'params'                  => array(
			array(
				'type'       => 'textarea_raw_html',
				'heading'    => __( 'REGIMEN', 'xstream' ),
				'param_name' => 'regimen',
				'class'      => 'size-fix',
			),
			array(
				'type'       => 'textarea_raw_html',
				'heading'    => __( 'Trial', 'xstream' ),
				'param_name' => 'trial',
				'class'      => 'size-fix',
			),
			array(
				'type'       => 'textarea_raw_html',
				'heading'    => __( 'Indication', 'xstream' ),
				'param_name' => 'indication',
				'class'      => 'size-fix',
			),
			array(
				'type'       => 'attach_image',
				'heading'    => __( 'Partner', 'xstream' ),
				'param_name' => 'partner',
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Phase', 'xstream' ),
				'param_name'  => 'phase',
				'description' => __( 'Progress percentage value without  %', 'textdomain' ),
			),
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Link', 'xstream' ),
				'param_name' => 'link',
			),

		),
	)
);

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Pipeline extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_Single_Pipeline extends WPBakeryShortCode {
	}
}


//Image Hover

// Create Shortcode xt-step-hover
// Use the shortcode: [xt-step-hover image="" content=""]
function create_xtstephover_shortcode( $atts, $content ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'image'   => '',
			'content' => '',
		),
		$atts,
		'xt-step-hover'
	);
	// Attributes in var

	$image_obj = wp_get_attachment( $atts['image'] );
	$image_src = $image_obj['src'];
	$image_alt = $image_obj['alt'];

	// Output Code
	$output  = '<div class="xt-step-hover">';
	$output .= '<div class="image"><img src="' . $image_src . '" alt="' . $image_alt . '"/></div>';
	$output .= '<div class="hover">' . $content . '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode( 'xt-step-hover', 'create_xtstephover_shortcode' );

// Create Step Hover element for Visual Composer
add_action( 'vc_before_init', 'xtstephover_integrateWithVC' );
function xtstephover_integrateWithVC() {
	vc_map(
		array(
			'name'                    => __( 'Step Hover', 'xstream' ),
			'base'                    => 'xt-step-hover',
			'show_settings_on_create' => false,
			'category'                => __( 'XT', 'xstream' ),
			'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
			'params'                  => array(
				array(
					'type'        => 'attach_image',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Image', 'xstream' ),
					'param_name'  => 'image',
				),
				array(
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Content', 'xstream' ),
					'param_name'  => 'content',
				),
			),
		)
	);
}

// Shadow box
// Create Shortcode xt-shadow-box
// Use the shortcode: [xt-shadow-box image="" link="" content=""]
function create_xtshadowbox_shortcode( $atts, $content ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'image'   => '',
			'link'    => '',
			'content' => '',
		),
		$atts,
		'xt-shadow-box'
	);
	// Attributes in var
	$image = $atts['image'];
	$link  = $atts['link'];

	$image_obj = wp_get_attachment( $atts['image'] );
	$image_src = $image_obj['src'];
	$image_alt = $image_obj['alt'];

	// Output Code
	$output  = '<div class="shadow-box">';
	$output .= ( $link ) ? '<a class="inner" href="' . $link . '">' : '<div class="inner">';
	$output .= '<div class="image"><img src="' . $image_src . '" alt="' . $image_alt . '"/></div>';
	$output .= '<div class="content">' . $content . '</div>';
	$output .= ( $link ) ? '</a>' : '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode( 'xt-shadow-box', 'create_xtshadowbox_shortcode' );

// Create Shadow Box Logo element for Visual Composer
add_action( 'vc_before_init', 'xtshadowbox_integrateWithVC' );
function xtshadowbox_integrateWithVC() {
	vc_map(
		array(
			'name'                    => __( 'Shadow Box Logo', 'xstream' ),
			'base'                    => 'xt-shadow-box',
			'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
			'show_settings_on_create' => false,
			'category'                => __( 'XT', 'xstream' ),
			'params'                  => array(
				array(
					'type'        => 'attach_image',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Image', 'xstream' ),
					'param_name'  => 'image',
				),
				array(
					'type'        => 'textfield',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Link', 'xstream' ),
					'param_name'  => 'link',
				),
				array(
					'type'        => 'textarea_html',
					'holder'      => 'div',
					'class'       => '',
					'admin_label' => false,
					'heading'     => __( 'Content', 'xstream' ),
					'param_name'  => 'content',
				),
			),
		)
	);
}


// Create Shortcode xt-video-popup
// Use the shortcode: [xt-video-popup image="" type="" is=""]
function create_xtvideopopup_shortcode($atts) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'image' => '',
			'type' => '',
			'id' => '',
			'title' => '',
		),
		$atts,
		'xt-video-popup'
	);
	// Attributes in var
	$image = $atts['image'];
	$type = $atts['type'];
	$id = $atts['id'];
	$title = $atts['title'];

	$image_obj = wp_get_attachment( $atts['image'] );
	$image_src = $image_obj['src'];
	$image_alt = $image_obj['alt'];
	
	if($title){
		$title = '<h3 class="video-title">'.$title.'</h3>';
	}
	
	if($type == 'youtube'){
		$video = '<div class="vpop" data-type="youtube" data-id="'.$id.'" data-autoplay="true">'.$title.'
		<img src="' . $image_src . '" alt="' . $image_alt . '"/>
		</div>';
	}
	if($type == 'vimeo'){
		$video = '<div class="vpop" data-type="vimeo" data-id="'.$id.'" data-autoplay="true">'.$title.'
		<img src="' . $image_src . '" alt="' . $image_alt . '"/>
		</div>';
	}

	$output .='<div class="xt-video-container">';
	$output .= $video;
	$output .='<div id="video-popup-overlay"></div>
	<div id="video-popup-container">
	  <div id="video-popup-close" class="fade">&#10005;</div>
	  <div id="video-popup-iframe-container">
		<iframe id="video-popup-iframe" src="" width="100%" height="100%" frameborder="0"></iframe>
	  </div>
	</div>';
	$output .='</div>';

	return $output;
}
add_shortcode( 'xt-video-popup', 'create_xtvideopopup_shortcode' );

// Create Video Popup element for Visual Composer
add_action( 'vc_before_init', 'xtvideopopup_integrateWithVC' );
function xtvideopopup_integrateWithVC() {
	vc_map( array(
		'name' => __( 'Video Popup', 'xstream' ),
		'base' => 'xt-video-popup',
		'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
		'show_settings_on_create' => false,
		'category' => __( 'XT', 'xstream'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'admin_label' => false,
				'heading' => __( 'Image', 'xstream' ),
				'param_name' => 'image',
			),
			array(
				'type' => 'checkbox',
				'holder' => 'div',
				'class' => '',
				'admin_label' => false,
				'heading' => __( 'Video Type', 'xstream' ),
				'param_name' => 'type',
				'value' => array(
					__( 'YouTube',  'xstream'  ) => 'youtube',
					__( 'Vimeo',  'xstream'  ) => 'vimeo',
					
				  ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'admin_label' => false,
				'heading' => __( 'Video ID', 'xstream' ),
				'param_name' => 'id',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'admin_label' => false,
				'heading' => __( 'Title', 'xstream' ),
				'param_name' => 'title',
			),
		)
	) );
}

// Create Shortcode featured-articles
// Use the shortcode: [featured-articles Image="" title="" link=""]
function create_featuredarticles_shortcode($atts, $content) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'image' => '',
			'link' => '',
			'content' => '',
		),
		$atts,
		'featured-articles'
	);
	// Attributes in var
	$image = $atts['image'];
	$link = $atts['link'];


	$image_obj = wp_get_attachment( $atts['image'] );
	$image_src = $image_obj['src'];
	$image_alt = $image_obj['alt'];

	// Output Code
	$output = '<div class="featured-article">';
	$output .= '<a href="'.$link.'">';
	$output .= '<img src="' . $image_src . '" alt="' . $image_alt . '"/>';
	$output .= '<div>'.$content.'</div>';
	$output .= '</a>';
	$output .= '</div>';

	return $output;
}
add_shortcode( 'featured-articles', 'create_featuredarticles_shortcode' );

// Create Featured Articles element for Visual Composer
add_action( 'vc_before_init', 'featuredarticles_integrateWithVC' );
function featuredarticles_integrateWithVC() {
	vc_map( array(
		'name' => __( 'Featured Articles', 'xstream' ),
		'base' => 'featured-articles',
		'icon'                    => get_stylesheet_directory_uri() . '/img/icons/icon.png',
		'show_settings_on_create' => false,
		'category' => __( 'XT', 'xstream'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'admin_label' => false,
				'heading' => __( 'Image', 'xstream' ),
				'param_name' => 'image',
			),
			array(
				'type' => 'textarea_html',
				'holder' => 'div',
				'class' => '',
				'admin_label' => false,
				'heading' => __( 'Content', 'xstream' ),
				'param_name' => 'content',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'admin_label' => false,
				'heading' => __( 'Link', 'xstream' ),
				'param_name' => 'link',
			),
		)
	) );
}