<?php
/**
 * Categories
 *
 * Renders categories on archives.
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// stop here if this is not a blog post
if( get_post_type() !== 'post' ) return;

echo '<p class="footer-categories">';

echo get_the_category_list(' ');

echo '</p>';
