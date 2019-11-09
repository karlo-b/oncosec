<?php
/**
 * Custom Fonts
 *
 * @package XT Framework Premium Add-On
 * @subpackage Customizer
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Custom Fonts Optgroup
 */
function xt_custom_font_group_824520( $custom_choice ) {

	$custom_fonts_enable	= get_theme_mod( 'enable_custom_fonts' );
	$custom_fonts			= get_theme_mod( 'custom_fonts' );
	$variants				= array();

	if ( $custom_fonts_enable && !empty( $custom_fonts ) ) {

		foreach( $custom_fonts as $key => $custom_font ) {

			$children[] = array(
				'id'	=> $custom_font['font_css_name'],
				'text'	=> $custom_font['font_name'],
			);
			$variants[ @$custom_font['font_css_name'] ] = array( 'regular' );

		}

		$custom_choice['families']['xt_premium_custom_fonts'] = array(
			'text'		=> esc_attr__( 'Custom Fonts', 'xtpremium' ),
			'children'	=> $children,
		);

		$custom_choice['variants'] = $variants;

	}

	return $custom_choice;

}
add_filter( 'xt_kirki_font_choices', 'xt_custom_font_group_824520', 10 );


/**
 * Elementor Integration
 */
function xt_custom_font_elementor_group( $font_groups ) {

	$custom_font_base				= 'xt-custom-fonts';
	$new_group[$custom_font_base]	= __( 'Custom Fonts', 'xtpremium' );
	$font_groups					= $new_group + $font_groups;

	return $font_groups;

}
add_filter( 'elementor/fonts/groups', 'xt_custom_font_elementor_group' );

function xt_add_elementor_custom_fonts( $fonts ) {

	$custom_font_base		= 'xt-custom-fonts';
	$custom_fonts_enable	= get_theme_mod( 'enable_custom_fonts' );
	$custom_fonts			= get_theme_mod( 'custom_fonts' );

	if ( $custom_fonts_enable && !empty( $custom_fonts ) ) {

		foreach( $custom_fonts as $key => $custom_font ) {
			$fonts[ $custom_font['font_css_name'] ] = $custom_font_base;
		}
	}

	return $fonts;
}
add_filter( 'elementor/fonts/additional_fonts', 'xt_add_elementor_custom_fonts' );

/**
 * Beaver Builder Integration
 */
function xt_bb_custom_fonts( $bb_fonts ) {

	$custom_fonts_enable	= get_theme_mod( 'enable_custom_fonts' );
	$custom_fonts			= get_theme_mod( 'custom_fonts' );

	if ( $custom_fonts_enable && !empty( $custom_fonts ) ) {

		$fonts = array();

		foreach( $custom_fonts as $key => $custom_font ) {
			$fonts[$custom_font['font_css_name']] = array(
				'fallback' => 'Verdana, Arial, sans-serif',
				'weights'  => array( '100', '200', '300', '400', '500', '600', '700', '800', '900' ),
			);
		}

		$bb_fonts = array_merge( $bb_fonts, $fonts );

	}

	return $bb_fonts;

}
add_filter( 'fl_theme_system_fonts', 'xt_bb_custom_fonts' );
add_filter( 'fl_builder_font_families_system', 'xt_bb_custom_fonts' );
