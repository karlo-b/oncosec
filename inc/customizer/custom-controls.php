<?php
/**
 * Custom Controls
 *
 * @package XT Framework
 * @subpackage Customizer
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Custom Controls
 */
if( class_exists( 'WP_Customize_Control' ) ) {

	/**
	 * Responsive Font Size Control
	 */
	class XT_Customize_Font_Size_Control extends WP_Customize_Control {
		public $type = 'xt-responsive-font-size';

		public function enqueue() {
			wp_enqueue_script( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/js/xt-customizer-controls.js', array( 'jquery' ), false, true );
			wp_enqueue_style( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/css/xt-customizer-controls.css' );
		}

		public function render_content() {

			$devices = array( 'desktop', 'tablet', 'mobile' ); ?>

			<span class="customize-control-title"><?php echo esc_attr( $this->label ); ?></span>

			<ul class="xt-responsive-options">
				<li class="desktop">
					<button type="button" class="preview-desktop active" data-device="desktop">
						<i class="dashicons dashicons-desktop"></i>
					</button>
				</li>
				<li class="tablet">
					<button type="button" class="preview-tablet" data-device="tablet">
						<i class="dashicons dashicons-tablet"></i>
					</button>
				</li>
				<li class="mobile">
					<button type="button" class="preview-mobile" data-device="mobile">
						<i class="dashicons dashicons-smartphone"></i>
					</button>
				</li>
			</ul>

			<?php foreach ($devices as $device) { ?>

			<div class="xt-control-<?php echo esc_attr( $device ); ?>">

				<?php $link = $this->get_link() ?>

				<?php $link = str_replace( 'mobile', $device, $link ); ?>

				<?php $link = str_replace( '"', '', $link ); ?>

				<label>

					<input type="text" <?php echo esc_html( $link ); ?> value="<?php echo esc_textarea( $this->value() ); ?>">

				</label>

			</div>

			<?php } ?>

		<?php }

	}

	/**
	 * Padding Control
	 */
	class XT_Customize_Padding_Control extends WP_Customize_Control {
		public $type = 'xt-padding';

		public function enqueue() {
			wp_enqueue_script( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/js/xt-customizer-controls.js', array( 'jquery' ), false, true );
			wp_enqueue_style( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/css/xt-customizer-controls.css' );
		}

		public function render_content() {

			$areas = array( 'top', 'right', 'bottom', 'left' ); ?>

			<span class="customize-control-title"><?php echo esc_attr( $this->label ); ?></span>

			<?php foreach ( $areas as $area ) { ?>

			<div class="xt-control-padding-<?php echo esc_attr( $area ); ?>">

				<?php

				$link = $this->get_link();
				$link = str_replace( 'left', $area, $link );
				$link = str_replace( '"', '', $link );

				?>

				<label>

					<input style="text-align:center;" type="number" <?php echo esc_attr( $link ) ?> value="<?php echo esc_textarea( $this->value() ); ?>">
					<small><?php echo esc_attr( ucfirst( $area ) ); ?></small>

				</label>

			</div>

			<?php } ?>

			<span class="px">px</span>

		<?php }

	}

	/**
	 * Responsive Padding Control
	 */
	class XT_Customize_Responsive_Padding_Control extends WP_Customize_Control {

		public $type = 'xt-responsive-padding';

		public function enqueue() {
			wp_enqueue_script( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/js/xt-customizer-controls.js', array( 'jquery' ), false, true );
			wp_enqueue_style( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/css/xt-customizer-controls.css' );
		}

		public function render_content() {

			$devices = array( 'desktop', 'tablet', 'mobile' );
			$areas = array( 'top', 'right', 'bottom', 'left' );

			?>

			<span class="customize-control-title"><?php echo esc_attr( $this->label ); ?></span>

			<ul class="xt-responsive-options">
				<li class="desktop">
					<button type="button" class="preview-desktop active" data-device="desktop">
						<i class="dashicons dashicons-desktop"></i>
					</button>
				</li>
				<li class="tablet">
					<button type="button" class="preview-tablet" data-device="tablet">
						<i class="dashicons dashicons-tablet"></i>
					</button>
				</li>
				<li class="mobile">
					<button type="button" class="preview-mobile" data-device="mobile">
						<i class="dashicons dashicons-smartphone"></i>
					</button>
				</li>
			</ul>

			<?php foreach ($devices as $device) { ?>

			<div class="xt-control-<?php echo esc_attr( $device ); ?>">

			<?php foreach ( $areas as $area ) { ?>

			<div class="xt-control-padding-<?php echo esc_attr( $area ); ?>">

				<?php

				$link = $this->get_link();
				$link = str_replace( 'left', $area, $link );
				$link = str_replace( 'mobile', $device, $link );
				$link = str_replace( '"', '', $link );

				?>

				<label>

					<input style="text-align:center;" type="number" <?php echo esc_attr( $link ) ?> value="<?php echo esc_textarea( $this->value() ); ?>">
					<small><?php echo esc_attr( ucfirst( $area ) ); ?></small>

				</label>

			</div>

			<?php } ?>

			<span class="px">px</span>

			</div>

			<?php } ?>

		<?php }

	}

	/**
	 * Input Slider Conltrol
	 */
	class XT_Customize_Input_Slider extends Kirki_Control_Base {

		public $type = 'xt-input-slider';

		public function enqueue() {
			wp_enqueue_script( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/js/xt-customizer-controls.js', array( 'jquery' ), false, true );
			wp_enqueue_style( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/css/xt-customizer-controls.css' );
		}

		public function render_content() {
		?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="xt-input-slider-control">
				<div class="slider" slider-min-value="<?php echo esc_attr( $this->choices['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->choices['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->choices['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
				<input type="text" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
			</div>
		<?php
		}
	}

	// Register Input Slider Conltrol with Kirki
	add_filter( 'kirki_control_types', function( $controls ) {
		$controls['input_slider'] = 'XT_Customize_Input_Slider';
		return $controls;
	} );

	/**
	 * Responsive Input Slider Conltrol
	 */
	class XT_Customize_Responsive_Input_Slider extends WP_Customize_Control {

		public $type = 'xt-responsive-input-slider';

		public function enqueue() {
			wp_enqueue_script( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/js/xt-customizer-controls.js', array( 'jquery' ), false, true );
			wp_enqueue_style( 'xt-customizer-controls', XT_THEME_URI . '/inc/customizer/css/xt-customizer-controls.css' );
		}

		public function render_content() {

			$devices = array( 'desktop', 'tablet', 'mobile' );
			$areas = array( 'top', 'right', 'bottom', 'left' );

		?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

			<ul class="xt-responsive-options">
				<li class="desktop">
					<button type="button" class="preview-desktop active" data-device="desktop">
						<i class="dashicons dashicons-desktop"></i>
					</button>
				</li>
				<li class="tablet">
					<button type="button" class="preview-tablet" data-device="tablet">
						<i class="dashicons dashicons-tablet"></i>
					</button>
				</li>
				<li class="mobile">
					<button type="button" class="preview-mobile" data-device="mobile">
						<i class="dashicons dashicons-smartphone"></i>
					</button>
				</li>
			</ul>

			<?php foreach ($devices as $device) { ?>

			<div class="xt-control-<?php echo esc_attr( $device ); ?>">

				<?php $link = $this->get_link() ?>

				<?php $link = str_replace( 'mobile', $device, $link ); ?>

				<?php $link = str_replace( '"', '', $link ); ?>

				<div class="xt-input-slider-control">
					<div class="slider" slider-min-value="<?php echo esc_attr( $this->choices['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->choices['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->choices['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
					<input type="text" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php echo $link ?> />
				</div>

			</div>

			<?php

			}

		}

	}

}
