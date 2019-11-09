<?php
/**
 * Theme Footer
 * See also inc/template-parts/footer.php
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

		do_action( 'xt_before_footer' );

		if ( get_theme_mod( 'footer_layout' ) !== 'none' ) do_action( 'xt_footer' );

		do_action( 'xt_after_footer' );

		?>

	</div>

<?php do_action( 'xt_body_close' ); ?>

<?php wp_footer(); ?>

</body>

</html>
