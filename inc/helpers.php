<?php
/**
 * Helpers
 *
 * Collection of helper functions
 *
 * @package XT Framework
 */

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * strpos array helper function
 */
function xt_strposa( $haystack, $needles, $offset = 0 ) {

	if ( ! is_array( $needles ) ) {
		$needles = array( $needles );
	}

	foreach ( $needles as $needle ) {
		if ( strpos( $haystack, $needle, $offset ) !== false ) {
			return true; // stop on first true result
		}
	}

	return false;

}

/**
 * Pingback
 */
function xt_pingback_header() {

	// add Pingback header if we're on a singular & pings are open
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '">';
	}

}
add_action( 'wp_head', 'xt_pingback_header' );

/**
 * Schema Markup
 */
function xt_body_schema_markup() {

	// Blog variable
	$is_blog = ( is_home() || is_date() || is_category() || is_author() || is_tag() || is_attachment() || is_singular( 'post' ) ) ? true : false;

	// Default itemtype
	$itemtype = 'WebPage';

	// Define itemtype for Blog pages, otherwise use WebPage
	$itemtype = ( $is_blog ) ? 'Blog' : $itemtype;

	// Define itemtype for search results, otherwise use WebPage
	$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;

	// Make result filterable
	$result = apply_filters( 'xt_body_itemtype', $itemtype );

	// Output
	echo 'itemscope="itemscope" itemtype="https://schema.org/' . esc_html( $result ) . '"'; // WPCS: XSS ok.

}

/**
 * Inner Content
 */
function xt_inner_content( $echo = true ) {

	if ( is_singular() ) {

		// vars
		$options = get_post_meta( get_the_ID(), 'xt_options', true );

		// checking if template is set to full width
		// return false if $options is empty
		$fullwidth = $options ? in_array( 'full-width', $options ) : false;

		// checking if template is set to contained
		// return false if $options is empty
		$contained = $options ? in_array( 'contained', $options ) : false;

		// construct inner-content wrapper
		// return false if template is set to full-width
		$inner_content = $fullwidth ? false : apply_filters( 'xt_inner_content', '<div id="inner-content" class="xt-container xt-container-center xt-padding-medium">' );

		// check if Premium Add-On is active
		// only proceed if template is not set to contained
		if ( xt_is_premium() && ! $contained ) {

			// vars
			$xt_settings = get_option( 'xt_settings' );

			// get the array of post types that are set to full width under Appearance -> Theme Settings -> Global Templat Settings
			$fullwidth_global = isset( $xt_settings['xt_fullwidth_global'] ) ? $xt_settings['xt_fullwidth_global'] : array();

			// if current post type has been set to full-width globally, set $inner_content to false
			$fullwidth_global && in_array( get_post_type(), $fullwidth_global ) ? $inner_content = false : '';

		}

		// on archives, we only add the xt_inner_content filter
	} else {

		$inner_content = apply_filters( 'xt_inner_content', '<div id="inner-content" class="xt-container xt-container-center xt-padding-medium">' );

	}

	if ( $echo ) {

		echo $inner_content; // WPCS: XSS ok.

	} else {

		return $inner_content;

	}

}

/**
 * Inner Content Close
 */
function xt_inner_content_close() {

	if ( is_singular() ) {

		$options = get_post_meta( get_the_ID(), 'xt_options', true );

		$fullwidth = $options ? in_array( 'full-width', $options ) : false;

		$contained = $options ? in_array( 'contained', $options ) : false;

		$inner_content_close = $fullwidth ? false : '</div>';

		if ( xt_is_premium() && ! $contained ) {

			$xt_settings = get_option( 'xt_settings' );

			$fullwidth_global = isset( $xt_settings['xt_fullwidth_global'] ) ? $xt_settings['xt_fullwidth_global'] : array();

			$fullwidth_global && in_array( get_post_type(), $fullwidth_global ) ? $inner_content_close = false : '';

		}
	} else {

		$inner_content_close = '</div>';

	}

	echo $inner_content_close; // WPCS: XSS ok.

}

/**
 * Title
 */
function xt_title() {

	$options = get_post_meta( get_the_ID(), 'xt_options', true );

	$removetitle = $options ? in_array( 'remove-title', $options ) : false;

	$title = $removetitle ? false : '<h1 class="entry-title" itemprop="headline">' . get_the_title() . '</h1>';

	if ( xt_is_premium() ) {

		$xt_settings = get_option( 'xt_settings' );

		$removetitle_global = isset( $xt_settings['xt_removetitle_global'] ) ? $xt_settings['xt_removetitle_global'] : array();

		$removetitle_global && in_array( get_post_type(), $removetitle_global ) ? $title = false : '';

	}

	if ( $title ) {

		do_action( 'xt_before_page_title' );

		echo $title; // WPCS: XSS ok.

		do_action( 'xt_after_page_title' );

	}

}

/**
 * Disable Header
 */
function xt_remove_header() {

	// stop here if we're on archives
	if ( ! is_singular() ) {
		return;
	}

	// vars
	$options = get_post_meta( get_the_ID(), 'xt_options', true );

	// checking if disable header is checked
	// return false if $options is empty
	$remove_header = $options ? in_array( 'remove-header', $options ) : false;

	// remove header if disable header is checked
	if ( $remove_header ) {
		remove_action( 'xt_header', 'xt_do_header' );
	}

}
add_action( 'wp', 'xt_remove_header' );

/**
 * Disable Footer
 */
function xt_remove_footer() {

	// stop here if we're on archives
	if ( ! is_singular() ) {
		return;
	}

	// vars
	$options = get_post_meta( get_the_ID(), 'xt_options', true );

	// checking if disable footer is checked
	// return false if $options is empty
	$remove_footer = $options ? in_array( 'remove-footer', $options ) : false;

	// remove footer if disable footer is checked
	// also remove custom footer that has been added in the customizer
	if ( $remove_footer ) {
		remove_action( 'xt_footer', 'xt_do_footer' );
		remove_action( 'xt_before_footer', 'xt_custom_footer' );
	}

}
add_action( 'wp', 'xt_remove_footer' );

/**
 * ScrollTop
 */
function xt_scrolltop() {

	if ( get_theme_mod( 'layout_scrolltop' ) ) {

		$scrollTop = get_theme_mod( 'scrolltop_value', 400 );
		echo '<a class="scrolltop" href="javascript:void(0)" data-scrolltop-value="' . (int) $scrollTop . '">';
		echo '<span class="screen-reader-text">' . __( 'Scroll to Top', 'xt-framework' ) . '</span>';
		echo '</a>';

	}

}
add_action( 'wp_footer', 'xt_scrolltop' );

/**
 * Archive Class
 *
 * We're adding unique classes to each archive type that exists
 *
 * xt-archive-content
 * xt-{post-type}-archive
 * xt-{archive-type}-content (for post archives)
 *
 * xt-{post-type}-archive-content (for cpt archives)
 * xt-{post-type}-taxonomy-content (for cpt-related taxonomies)
 */
function xt_archive_class() {

	$archive_class = '';

	if ( is_date() ) {
		$archive_class = ' xt-archive-content xt-post-archive xt-date-content';
	} elseif ( is_category() ) {
		$archive_class = ' xt-archive-content xt-post-archive xt-category-content';
	} elseif ( is_tag() ) {
		$archive_class = ' xt-archive-content xt-post-archive xt-tag-content';
	} elseif ( is_author() ) {
		$archive_class = ' xt-archive-content xt-post-archive xt-author-content';
	} elseif ( is_home() ) {
		$archive_class = ' xt-archive-content xt-post-archive xt-blog-content';
	} elseif ( is_search() ) {
		$archive_class = ' xt-archive-content xt-post-archive xt-search-content';
	} elseif ( is_post_type_archive() ) {

		$post_type = get_post_type();
		if ( ! $post_type ) {
			return $archive_class; // stop here if no post has been found
		}

		$archive_class  = ' xt-archive-content';
		$archive_class .= ' xt-' . $post_type . '-archive';
		$archive_class .= ' xt-' . $post_type . '-archive-content';

	} elseif ( is_tax() ) {

		$post_type = get_post_type();
		if ( ! $post_type ) {
			return $archive_class; // stop here if no post has been found
		}

		$archive_class  = ' xt-archive-content';
		$archive_class .= ' xt-' . $post_type . '-archive';
		$archive_class .= ' xt-' . $post_type . '-archive-content';
		$archive_class .= ' xt-' . $post_type . '-taxonomy-content';

	}

	return apply_filters( 'xt_archive_class', $archive_class );

}

/**
 * Singular Class
 */
function xt_singular_class() {

	if ( is_singular( 'post' ) ) {
		$singular_class = ' xt-single-content';
	} elseif ( is_attachment() ) {
		$singular_class = ' xt-attachment-content';
	} elseif ( is_page() ) {
		$singular_class = ' xt-page-content';
	} elseif ( is_404() ) {
		$singular_class = ' xt-404-content';
	} else {
		$post_type      = get_post_type();
		$singular_class = ' xt-' . $post_type . '-content';
	}

	return apply_filters( 'xt_singular_class', $singular_class );

}

/**
 * Archive Header
 */
function xt_archive_header() {

	if ( is_author() ) { ?>

		<section class="xt-author-box">
			<h1 class="page-title"><span class="vcard"><?php echo get_the_author(); ?></span></h1>
			<p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
			<?php echo get_avatar( get_the_author_meta( 'email' ), 120 ); ?>
		</section>

		<?php
	} else {

		if ( get_the_archive_title() ) {

			do_action( 'xt_before_page_title' );

			the_archive_title( '<h1 class="page-title">', '</h1>' );

			do_action( 'xt_after_page_title' );

		}

		the_archive_description( '<div class="taxonomy-description">', '</div>' );

	}

}

/**
 * Archive Headline
 */
function xt_archive_title( $title ) {

	$archive_headline = get_theme_mod( 'archive_headline' );

	if ( is_category() ) {

		if ( $archive_headline == 'hide_prefix' ) {
			$title = single_cat_title( '', false );
		} elseif ( $archive_headline == 'hide' ) {
			$title = false;
		}
	} elseif ( is_tag() ) {

		if ( $archive_headline == 'hide_prefix' ) {
			$title = single_tag_title( '', false );
		} elseif ( $archive_headline == 'hide' ) {
			$title = false;
		}
	} elseif ( is_date() ) {

		$date = get_the_date( 'F Y' );
		if ( is_year() ) {
			$date = get_the_date( 'Y' );
		}
		if ( is_day() ) {
			$date = get_the_date( 'F j, Y' );
		}

		if ( $archive_headline == 'hide_prefix' ) {
			$title = $date;
		} elseif ( $archive_headline == 'hide' ) {
			$title = false;
		}
	} elseif ( is_post_type_archive() ) {

		if ( $archive_headline == 'hide_prefix' ) {
			$title = post_type_archive_title( '', false );
		} elseif ( $archive_headline == 'hide' ) {
			$title = false;
		}
	} elseif ( is_tax() ) {

		if ( $archive_headline == 'hide_prefix' ) {
			$title = single_term_title( '', false );
		} elseif ( $archive_headline == 'hide' ) {
			$title = false;
		}
	}

	return $title;

}
add_filter( 'get_the_archive_title', 'xt_archive_title', 10 );

/**
 * Responsive Breakpoints
 *
 * Simple check if Responsive Breakpoints are set
 */
if ( ! function_exists( 'xt_has_responsive_breakpoints' ) ) {

	function xt_has_responsive_breakpoints() {

		// there can't be Responsive Breakpoints if there's no Premium Add-On
		if ( ! xt_is_premium() ) {
			return false;
		}

		// vars
		$xt_settings = get_option( 'xt_settings' );

		// check if custom breakpoints are set, otherwise return false
		if ( ! empty( $xt_settings['xt_breakpoint_medium'] ) || ! empty( $xt_settings['xt_breakpoint_desktop'] ) || ! empty( $xt_settings['xt_breakpoint_mobile'] ) ) {
			return true;
		} else {
			return false;
		}

	}
}

/**
 * Right Sidebar
 */
function xt_do_sidebar_right() {

	if ( xt_sidebar_layout() == 'right' ) {
		get_sidebar();
	}

}
add_action( 'xt_sidebar_right', 'xt_do_sidebar_right' );

/**
 * Left Sidebar
 */
function xt_do_sidebar_left() {

	if ( xt_sidebar_layout() == 'left' ) {
		get_sidebar();
	}

}
add_action( 'xt_sidebar_left', 'xt_do_sidebar_left' );

/**
 * Sidebar Layout
 */
function xt_sidebar_layout() {

	// Default Sidebar Position is 'right'
	$sidebar = get_theme_mod( 'sidebar_position', 'right' );

	$archive_sidebar_position = get_theme_mod( 'archive_sidebar_layout', 'global' );
	$sidebar                  = $archive_sidebar_position !== 'global' ? $archive_sidebar_position : $sidebar;

	if ( is_singular() ) {

		$id                             = get_the_ID();
		$single_sidebar_position        = get_post_meta( $id, 'xt_sidebar_position', true );
		$single_sidebar_position_global = get_theme_mod( 'single_sidebar_layout', 'global' );

		$sidebar = $single_sidebar_position_global !== 'global' ? $single_sidebar_position_global : $sidebar;
		$sidebar = $single_sidebar_position && $single_sidebar_position !== 'global' ? $single_sidebar_position : $sidebar;

	}

	return apply_filters( 'xt_sidebar_layout', $sidebar );

}

/*
 * Article Meta
 *
 * Construct Sortable Article Meta
 */
function xt_article_meta() {

	$blog_meta = get_theme_mod( 'blog_sortable_meta', array( 'author', 'date' ) );

	if ( is_array( $blog_meta ) && ! empty( $blog_meta ) ) {

		do_action( 'xt_before_article_meta' );
		echo '<p class="article-meta">';
		do_action( 'xt_article_meta_open' );

		foreach ( $blog_meta as $value ) {

			switch ( $value ) {
				case 'author':
					do_action( 'xt_before_author_meta' );
					xt_author_meta();
					do_action( 'xt_after_author_meta' );
					break;
				case 'date':
					do_action( 'xt_before_date_meta' );
					xt_date_meta();
					do_action( 'xt_after_date_meta' );
					break;
				case 'comments':
					do_action( 'xt_before_comments_meta' );
					xt_comments_meta();
					do_action( 'xt_after_comments_meta' );
					break;
				default:
					break;
			}
		}

		do_action( 'xt_article_meta_close' );
		echo '</p>';
		do_action( 'xt_after_article_meta' );

	}

}

/**
 * Blog Meta – Author
 */
function xt_author_meta() {

	$rtl    = is_rtl();
	$avatar = get_theme_mod( 'blog_author_avatar' );

	if ( ! $rtl && $avatar ) {
		echo get_avatar( get_the_author_meta( 'ID' ), 128 );
	}

	echo sprintf(
		'<span class="article-author author vcard" itemscope="itemscope" itemprop="author" itemtype="https://schema.org/Person"><a class="url fn" href="%1$s" title="%2$s" rel="author" itemprop="url"><span itemprop="name">%3$s</span></a></span>', // WPCS: XSS ok, sanitization ok.
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'xt-framework' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);

	if ( $rtl && $avatar ) {
		echo get_avatar( get_the_author_meta( 'ID' ), 128 );
	}

	echo '<span class="article-meta-separator">' . apply_filters( 'xt_article_meta_separator', ' | ' ) . '</span>';

}

/*
 * Blog Meta – Date
 */
function xt_date_meta() {

	echo '<span class="posted-on">' . __( 'Posted on', 'xt-framework' ) . '</span> <time class="article-time published" datetime="' . get_the_date( 'c' ) . '" itemprop="datePublished">' . get_the_date() . '</time>'; // WPCS: XSS ok.
	echo '<span class="article-meta-separator">' . apply_filters( 'xt_article_meta_separator', ' | ' ) . '</span>';

}

/**
 * Blog Meta – Comments
 */
function xt_comments_meta() {

	echo '<span class="comments-count">';

	comments_number( __( '<span>No</span> Comments', 'xt-framework' ), __( '<span>1</span> Comment', 'xt-framework' ), __( '<span>%</span> Comments', 'xt-framework' ) );

	echo '</span>';

	echo '<span class="article-meta-separator">' . apply_filters( 'xt_article_meta_separator', ' | ' ) . '</span>';

}

/**
 * Blog Layout
 */
function xt_blog_layout() {

	$template_parts_header = get_theme_mod( 'archive_sortable_header', array( 'title', 'meta', 'featured' ) );
	$template_parts_footer = get_theme_mod( 'archive_sortable_footer', array( 'readmore', 'categories' ) );
	$blog_layout           = get_theme_mod( 'archive_layout', 'default' );
	$style                 = get_theme_mod( 'archive_post_style', 'plain' );
	$stretched             = get_theme_mod( 'archive_boxed_image_streched', false );

	if ( $blog_layout !== 'beside' && $style == 'boxed' && $stretched ) {
		$style .= ' stretched';
	}

	return apply_filters(
		'xt_blog_layout',
		array(
			'blog_layout'           => $blog_layout,
			'template_parts_header' => $template_parts_header,
			'template_parts_footer' => $template_parts_footer,
			'style'                 => $style,
		)
	);

}

/**
 * Navigation
 *
 * Set wp_nav_menu for main navigations
 */
function xt_nav_menu() {

	$custom_menu = get_theme_mod( 'menu_custom' );

	if ( $custom_menu ) {

		echo do_shortcode( $custom_menu );

	} elseif ( in_array( get_theme_mod( 'menu_position' ), array( 'menu-off-canvas', 'menu-off-canvas-left' ) ) ) {

		wp_nav_menu(
			array(
				'theme_location' => 'main_menu',
				'container'      => false,
				'menu_class'     => 'xt-menu',
				'depth'          => 3,
				'fallback_cb'    => 'xt_main_menu_fallback',
			)
		);

	} elseif ( get_theme_mod( 'menu_position' ) == 'menu-full-screen' ) {

		wp_nav_menu(
			array(
				'theme_location' => 'main_menu',
				'container'      => false,
				'menu_class'     => 'xt-menu',
				'depth'          => 1,
				'fallback_cb'    => 'xt_main_menu_fallback',
			)
		);

	} else {

		wp_nav_menu(
			array(
				'theme_location' => 'main_menu',
				'container'      => false,
				'menu_class'     => 'xt-menu xt-sub-menu' . xt_sub_menu_alignment() . xt_sub_menu_animation() . xt_menu_hover_effect(),
				'depth'          => 4,
				'fallback_cb'    => 'xt_main_menu_fallback',
			)
		);

	}
}
add_action( 'xt_main_menu', 'xt_nav_menu' );

/**
 * Menu
 *
 * returns the menu selected under Header -> Navigation in the WordPress customizer
 */
function xt_menu() {
	return get_theme_mod( 'menu_position', 'menu-right' );
}

/**
 * Mobile Menu
 *
 * returns the menu selected under Header -> Mobile Navigation in the WordPress customizer
 */
function xt_mobile_menu() {
	return get_theme_mod( 'mobile_menu_options', 'menu-mobile-hamburger' );
}

/**
 * Is Off Canvas Menu
 *
 * A simple check that returns true if an Off-Canvas menu is being used
 */
function xt_is_off_canvas_menu() {

	if ( in_array( get_theme_mod( 'menu_position' ), array( 'menu-off-canvas', 'menu-off-canvas-left', 'menu-full-screen' ) ) ) {
		return true;
	} else {
		return false;
	}

}

/**
 * Add Sub Menu Indicators to Mobile Menu's
 */
function xt_mobile_sub_menu_indicators( $item_output, $items, $depth, $args ) {

	if ( $args->theme_location == 'mobile_menu' || ( in_array( get_theme_mod( 'menu_position' ), array( 'menu-off-canvas', 'menu-off-canvas-left' ) ) && $args->theme_location == 'main_menu' ) ) {

		if ( isset( $items->classes ) && in_array( 'menu-item-has-children', $items->classes ) ) {
			$item_output .= '<button class="xt-submenu-toggle" aria-expanded="false"><i class="xtf xtf-arrow-down" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Menu Toggle', 'xt-framework' ) . '</span></button>';
		}
	}

	return $item_output;

}
add_filter( 'walker_nav_menu_start_el', 'xt_mobile_sub_menu_indicators', 10, 4 );

/**
 * Sub Menu Alignment
 */
function xt_sub_menu_alignment() {

	$sub_menu_alignment = get_theme_mod( 'sub_menu_alignment', 'left' );
	$alignment          = ' xt-sub-menu-align-' . $sub_menu_alignment;

	return $alignment;

}

/**
 * Sub Menu Animation
 */
function xt_sub_menu_animation() {

	$sub_menu_animation = get_theme_mod( 'sub_menu_animation', 'fade' );
	$sub_menu_animation = ' xt-sub-menu-animation-' . $sub_menu_animation;

	return $sub_menu_animation;

}

/**
 * Menu Alignment
 *
 * return the stacked advanced menu alignment
 */
function xt_menu_alignment() {

	$alignment = get_theme_mod( 'menu_alignment', 'left' );
	$alignment = ' menu-align-' . $alignment;

	return $alignment;

}

/**
 * Menu Effect
 */
function xt_menu_hover_effect() {

	$menu_effect           = get_theme_mod( 'menu_effect', 'none' );
	$menu_effect_animation = get_theme_mod( 'menu_effect_animation', 'fade' );
	$menu_effect_alignment = get_theme_mod( 'menu_effect_alignment', 'center' );

	$hover_effect  = ' xt-menu-effect-' . $menu_effect;
	$hover_effect .= ' xt-menu-animation-' . $menu_effect_animation;
	$hover_effect .= ' xt-menu-align-' . $menu_effect_alignment;

	return $hover_effect;

}

/**
 * Navigation Attributes
 *
 * Currently only being used to add the sub menu animation duration
 */
function xt_navigation_attributes() {

	// vars
	$submenu_animation_duration = get_theme_mod( 'sub_menu_animation_duration' );

	// Construct Navigation Attributes
	$navigation_attributes = $submenu_animation_duration ? 'data-sub-menu-animation-duration="' . esc_attr( $submenu_animation_duration ) . '"' : 'data-sub-menu-animation-duration="250"';

	echo $navigation_attributes; // WPCS: XSS ok.

}

/**
 * Responsive embed/oembed
 */
function xt_responsive_embed( $html, $url, $attr ) {

	$providers = array( 'vimeo.com', 'youtube.com', 'youtu.be', 'wistia.com', 'wistia.net' );

	if ( xt_strposa( $url, $providers ) ) {
			$html = '<div class="xt-video">' . $html . '</div>';
	}

	return $html;

}
add_filter( 'embed_oembed_html', 'xt_responsive_embed', 10, 3 );




/**
 * Sticky Navigation
 */
function xt_sticky_navigation() {

	// vars
	$menu_sticky                    = get_theme_mod( 'menu_sticky' );
	$menu_active_delay              = get_theme_mod( 'menu_active_delay' );
	$menu_active_animation          = get_theme_mod( 'menu_active_animation' );
	$menu_active_animation_duration = get_theme_mod( 'menu_active_animation_duration' );

	if ( $menu_sticky ) {

		$sticky_navigation  = 'data-sticky="true"';
		$sticky_navigation .= $menu_active_delay ? ' data-sticky-delay="' . esc_attr( $menu_active_delay ) . '"' : ' data-sticky-delay="300px"';
		$sticky_navigation .= $menu_active_animation ? ' data-sticky-animation="' . esc_attr( $menu_active_animation ) . '"' : false;
		$sticky_navigation .= $menu_active_animation_duration ? ' data-sticky-animation-duration="' . esc_attr( $menu_active_animation_duration ) . '"' : ' data-sticky-animation-duration="200"';

		echo $sticky_navigation;

	}

}


/**
 * Transparent Header
 *
 * Add a class to .xt-navigation if Transparent Header body class exists
 */
function xt_transparent_header() {

	$classes = get_body_class();

	if ( in_array( 'xt-transparent-header', $classes ) ) {

		echo ' xt-navigation-transparent';

	}

}

/**
 * Transparent Header Body Class
 */
function xt_transparent_header_body_class_2083582( $classes ) {

	// don't take it further if we're on archives
	if ( is_singular() ) {

		$options = get_post_meta( get_the_ID(), 'xt_premium_options', true );

		// check if Transparent Header is ticked
		// return false if $options is empty
		$transparent_header = $options ? in_array( 'transparent-header', $options ) : false;

		if ( $transparent_header ) {

			$classes[] = 'xt-transparent-header';

		} else {

			// check for Global Settings
			$xt_settings = get_option( 'xt_settings' );

			// get the array of post types that are set to Transparent Header under Appearance -> Theme Settings -> Global Templat Settings
			$transparent_header_global = isset( $xt_settings['xt_transparent_header_global'] ) ? $xt_settings['xt_transparent_header_global'] : array();

			if ( in_array( get_post_type(), $transparent_header_global ) ) {
				$classes[] = 'xt-transparent-header';
			}
		}

		// Archives
	} else {

		$xt_settings = get_option( 'xt_settings' );

		// get the array of post types that are set to Transparent Header under Appearance -> Theme Settings -> Global Templat Settings
		$transparent_headers_global = isset( $xt_settings['xt_transparent_header_global'] ) ? $xt_settings['xt_transparent_header_global'] : array();

		// remove public post types from array as we've already taken care of them above
		$transparent_headers_global = array_diff( $transparent_headers_global, get_post_types( array( 'public' => true ) ) );

		if ( ! empty( $transparent_headers_global ) ) {

			foreach ( $transparent_headers_global as $transparent_header_global ) {

				switch ( $transparent_header_global ) {

					case '404':
						if ( is_404() ) {
							$classes[] = 'xt-transparent-header';
						}
						break;
					case 'front_page':
						if ( is_home() ) {
							$classes[] = 'xt-transparent-header';
						}
						break;
					case 'search':
						if ( is_search() ) {
							$classes[] = 'xt-transparent-header';
						}
						break;
					case 'archives':
						if ( is_archive() ) {
							$classes[] = 'xt-transparent-header';
						}
						break;
					case 'post_archives':
						if ( is_date() || is_category() || is_author() || is_tag() ) {
							$classes[] = 'xt-transparent-header';
						}
						break;
					default:
						// Post Type Archives
						// cut given value to get cpt (example: turns download_archive into download to use it in is_post_type_archive())
						$transparent_header_global = substr( $transparent_header_global, 0, strpos( $transparent_header_global, '_' ) );

						if ( is_post_type_archive( $transparent_header_global ) ) {
							$classes[] = 'xt-transparent-header';
						}

						// apply to related taxonomies
						$taxonomies = get_object_taxonomies( $transparent_header_global, 'names' );

						if ( ! empty( $taxonomies ) ) {

							foreach ( $taxonomies as $taxonomy ) {
								if ( is_tax( $taxonomy ) ) {
									$classes[] = 'xt-transparent-header';
								}
							}
						}
						break;

				}
			}
		}
	}

	return $classes;

}
add_filter( 'body_class', 'xt_transparent_header_body_class_2083582' );

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
   add_filter( 'upload_mimes', 'cc_mime_types' );


/**
 * Desktop Breakpoint
 */
function xt_breakpoint_desktop() {

	$xt_settings = get_option( 'xt_settings' );

	if ( ! empty( $xt_settings['xt_breakpoint_desktop'] ) ) {
		$desktop_breakpoint = (int) $xt_settings['xt_breakpoint_desktop'];
	} else {
		$desktop_breakpoint = 1024;
	}

	return $desktop_breakpoint;

}

/**
 * Medium Breakpoint
 */
function xt_breakpoint_medium() {

	$xt_settings = get_option( 'xt_settings' );

	if ( ! empty( $xt_settings['xt_breakpoint_medium'] ) ) {
		$medium_breakpoint = (int) $xt_settings['xt_breakpoint_medium'];
	} else {
		$medium_breakpoint = 768;
	}

	return $medium_breakpoint;

}

/**
 * Mobile Breakpoint
 */
function xt_breakpoint_mobile() {

	$xt_settings = get_option( 'xt_settings' );

	if ( ! empty( $xt_settings['xt_breakpoint_mobile'] ) ) {
		$mobile_breakpoint = (int) $xt_settings['xt_breakpoint_mobile'];
	} else {
		$mobile_breakpoint = 480;
	}

	return $mobile_breakpoint;

}


function xt_premium_body_classes( $classes ) {

	$push_menu     = get_theme_mod( 'menu_off_canvas_push' );
	$menu_position = get_theme_mod( 'menu_position' );

	if ( $push_menu && $menu_position == 'menu-off-canvas' ) {
		$classes[] = 'xt-push-menu-right';
	}

	if ( $push_menu && $menu_position == 'menu-off-canvas-left' ) {
		$classes[] = 'xt-push-menu-left';
	}

	if ( xt_has_responsive_breakpoints() ) {

		$classes[] = 'xt-responsive-breakpoints';

		$classes[] = 'xt-mobile-breakpoint-' . xt_breakpoint_mobile();
		$classes[] = 'xt-medium-breakpoint-' . xt_breakpoint_medium();
		$classes[] = 'xt-desktop-breakpoint-' . xt_breakpoint_desktop();

	}

	return $classes;

}
add_filter( 'body_class', 'xt_premium_body_classes' );


/**
 * Social Icon Shortcode
 */
function xt_social() {

	$active_networks = get_theme_mod( 'social_sortable', array() );
	$social_shape    = get_theme_mod( 'social_shapes' );
	$social_style    = get_theme_mod( 'social_styles' );
	$social_size     = get_theme_mod( 'social_sizes' );

	ob_start();

	if ( ! empty( $active_networks ) && is_array( $active_networks ) ) :
		?>
	<div class="xt-social-icons<?php echo esc_attr( $social_shape . $social_style . $social_size ); ?>">
		<?php foreach ( $active_networks as $social_network_label ) : ?>
			<a class="xt-social-icon xt-social-<?php echo esc_attr( $social_network_label ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $social_network_label . '_link', '' ) ); ?>">
				<i class="xtf xtf-<?php echo esc_attr( $social_network_label ); ?>" aria-hidden="true"></i>
			</a>
		<?php endforeach; ?>
	</div>
		<?php
	endif;

	return ob_get_clean();

}
add_shortcode( 'social', 'xt_social' );


// Limit excerpts

function get_excerpt( $limit ) {
	$excerpt = get_the_content();
	$excerpt = preg_replace( ' ([.*?])', '', $excerpt );
	$excerpt = strip_shortcodes( $excerpt );
	$excerpt = strip_tags( $excerpt );
	$excerpt = substr( $excerpt, 0, $limit );
	$excerpt = substr( $excerpt, 0, strripos( $excerpt, ' ' ) );
	$excerpt = trim( preg_replace( '/\s+/', ' ', $excerpt ) );
	return $excerpt;
}

add_action( 'xt_content_open', 'single_brands_row' );
function single_brands_row() {
	if ( is_single() ) {
		if ( is_active_sidebar( 'single-brands-row' ) ) {
			echo '<div class="xt-container-full-width">';
			dynamic_sidebar( 'single-brands-row' );
			echo '</div>';
		}
	}
}

// Add author contact methods


function change_contact_info( $contactmethods ) {
	unset( $contactmethods['aim'] );
	unset( $contactmethods['yim'] );
	unset( $contactmethods['jabber'] );
	$contactmethods['website_title'] = 'Website Title';
	$contactmethods['twitter']       = 'Twitter';
	$contactmethods['facebook']      = 'Facebook';
	$contactmethods['linkedin']      = 'Linked In';
	return $contactmethods;
}

add_filter( 'user_contactmethods', 'change_contact_info', 10, 1 );

// Optimizations
// remove unnecessary header info
add_action( 'init', 'remove_header_info' );
function remove_header_info() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'start_post_rel_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link' );         // for WordPress < 3.0
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' ); // for WordPress >= 3.0
}

// remove extra CSS that 'Recent Comments' widget injects
add_action( 'widgets_init', 'remove_recent_comments_style' );
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action(
		'wp_head',
		array(
			$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
			'recent_comments_style',
		)
	);
}

// remove dashicons in frontend to non-admin
function wpdocs_dequeue_dashicon() {
	if ( current_user_can( 'update_core' ) ) {
		return;
	}
	wp_deregister_style( 'dashicons' );
}
	add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

// Disable Gutenberg editor.
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );
// Don't load Gutenberg-related stylesheets.
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
function remove_block_css() {
	wp_dequeue_style( 'wp-block-library' ); // WordPress core
	wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}

//Optimizations
function wpb_remove_version() {
	return '';
}
	add_filter( 'the_generator', 'wpb_remove_version' );



// Image helper function
function wp_get_attachment( $attachment_id ) {
	$attachment = get_post( $attachment_id );
	return array(
		'alt'         => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption'     => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href'        => get_permalink( $attachment->ID ),
		'src'         => $attachment->guid,
		'title'       => $attachment->post_title,
	);
}

// Shortcode: [button text="" url="" class=""]
function create_button_shortcode( $atts ) {

	$atts = shortcode_atts(
		array(
			'text'  => '',
			'url'   => '',
			'class' => '',
		),
		$atts,
		'button'
	);

	$text  = $atts['text'];
	$url   = $atts['url'];
	$class = $atts['class'];

	return '<a class="' . $class . ' xt-button" href="' . $url . '">' . $text . '</a>';

}
	add_shortcode( 'button', 'create_button_shortcode' );


	// WpBakery Admin Styles
	add_action('admin_head', 'vc_cstomize');

	function vc_cstomize() {
	  echo '<style>
		.wpb_xt-team-member .textarea_html{
			display:none;
		}
		textarea.regimen, 
		textarea.trial,
		textarea.indication
		{
			height: 60px;
			color: #000!important;
			font-family: "Open Sans"!important;
			font-size: 14px!important;
		}
	  </style>';
	}

	function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
		add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
	   }
	   add_action( 'init', 'disable_emojis' );
	   
	   /**
		* Filter function used to remove the tinymce emoji plugin.
		* 
		* @param array $plugins 
		* @return array Difference betwen the two arrays
		*/
	   function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
		return array();
		}
	   }
	   
	   /**
		* Remove emoji CDN hostname from DNS prefetching hints.
		*
		* @param array $urls URLs to print for resource hints.
		* @param string $relation_type The relation type the URLs are printed for.
		* @return array Difference betwen the two arrays.
		*/
	   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
		if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
	   
	   $urls = array_diff( $urls, array( $emoji_svg_url ) );
		}
	   
	   return $urls;
	   }