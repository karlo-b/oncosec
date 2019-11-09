<?php
/**
 * Article
 *
 * Displays posts on archives, category, search and index pages.
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

$blog_layout = xt_blog_layout();
$blog_layout = $blog_layout['blog_layout'];

get_template_part( 'inc/template-parts/blog-layouts/' . $blog_layout );
