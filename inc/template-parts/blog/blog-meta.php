<?php
/**
 * Meta
 *
 * Renders author/post meta on archives.
 *
 * @package XT Framework
 * @subpackage Template Parts
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// stop here if this is not a blog post
if( get_post_type() !== 'post' ) return;

xt_article_meta();
