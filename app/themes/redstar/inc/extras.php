<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RedStar_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function redstar_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'redstar_body_classes' );





/**
 * Make hero image customizable through CFS field or featured image.
 */
function redstar_dynamic_css() {
	if ( ! is_page_template( 'page-templates/about.php' ) ) {
		return;
	}

	$image = CFS()->get( 'about_header_image' );
	if ( ! $image ) {
		return;
	}
	$hero_css = ".page-template-about .entry-header {
		background:
			linear-gradient( to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100% ),
			url({$image}) no-repeat center bottom;
		background-size: cover, cover;
		height: 100vh;
	}";
	wp_add_inline_style( 'redstar-style', $hero_css );
}
add_action( 'wp_enqueue_scripts', 'redstar_dynamic_css' );
