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


