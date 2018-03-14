<?php

/**
 * Actions Hooks & Filters
 */
add_action( 'wp_enqueue_scripts', 'dev_navwalker_enqueue_scripts' );


/**
 * Child Theme parent style & custom stylesheet
 */
function dev_navwalker_enqueue_scripts() {
	/**
	 * Styles
	 */
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'dev-navwalker-style', get_stylesheet_directory_uri() . '/assets/css/dev-navwalker.css' );
	/**
	 * Scripts
	 */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'dev-navwalker-script', get_stylesheet_directory_uri() . '/assets/js/dev-navwalker.js', array( 'jquery' ), false, true );

}


class Description_Walker extends Walker_Nav_Menu {

	/**
	 * @param string $output
	 * @param WP_Post $item
	 * @param int $depth
	 * @param array $args
	 * @param int $id
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$classes = empty ( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join(
			' '
			, apply_filters(
				'nav_menu_css_class'
				, array_filter( $classes ), $item
			)
		);

		! empty ( $class_names )
		and $class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= "<li id='menu-item-$item->ID' $class_names>";

		$attributes = '';

		! empty( $item->attr_title )
		and $attributes .= ' title="' . esc_attr( $item->attr_title ) . '"';
		! empty( $item->target )
		and $attributes .= ' target="' . esc_attr( $item->target ) . '"';
		! empty( $item->xfn )
		and $attributes .= ' rel="' . esc_attr( $item->xfn ) . '"';
		! empty( $item->url )
		and $attributes .= ' href="' . esc_attr( $item->url ) . '"';

		// insert description for top level elements only
		// you may change this
		$description = ( ! empty ( $item->description ) and 1 == $depth )
			? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small><a href="' . esc_attr( $item->url ) . '">Read More</a>' : '';

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$item_output = $args->before
		               . "<a $attributes>"
		               . $args->link_before
		               . $title
		               . '</a> '
		               . $args->link_after
		               . $description
		               . $args->after;

		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters(
			'walker_nav_menu_start_el'
			, $item_output
			, $item
			, $depth
			, $args
		);
	}
}