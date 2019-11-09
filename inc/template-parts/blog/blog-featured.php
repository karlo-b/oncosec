<?php
/**
 * Featured Image
 *
 * Renders featured image on archives.
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// stop if there's no thumbnail
if( !has_post_thumbnail() ) return;

?>

<div class="xt-post-image-wrapper">
	<a class="xt-post-image-link" href="<?php echo esc_url( get_permalink() ); ?>">
		<span class="screen-reader-text"><?php the_title() ?></span>
		<?php the_post_thumbnail( apply_filters( 'xt_blog_post_thumbnail_size', 'full' ), array( 'class' => 'xt-post-image', 'itemprop' => 'image' ) ); ?>
	</a>
</div>
