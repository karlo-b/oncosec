<?php
/**
 * Featured Image
 *
 * Renders the featured image on single pages.
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

$options = get_post_meta( get_the_ID(), 'xt_options', true );

$remove_featured = $options ? in_array( 'remove-featured', $options ) : false;

// stop here if featured image has been disabled
if( $remove_featured ) return;

?>

<div class="xt-post-image-wrapper">

	<?php the_post_thumbnail( apply_filters( 'xt_single_post_thumbnail_size', 'full' ), array( 'class' => 'xt-post-image', 'itemprop' => 'image' ) ); ?>

</div>
