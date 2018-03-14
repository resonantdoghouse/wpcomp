<?php

/**
 * Actions Hooks & Filters
 */
add_action( 'wp_enqueue_scripts', 'dev_megamenu_enqueue_scripts' );
add_action( 'after_setup_theme', 'dev_megamenu_register_menu' );
add_action( 'widgets_init', 'dev_megamenu_widgets_init' );


/**
 * Child Theme parent style & custom stylesheet
 */
function dev_megamenu_enqueue_scripts() {
	/**
	 * Styles
	 */
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'dev-megamenu-style', get_stylesheet_directory_uri() . '/assets/css/dev-megamenu.css' );
	/**
	 * Scripts
	 */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'dev-megamenu-script', get_stylesheet_directory_uri() . '/assets/js/dev-megamenu.js', array( 'jquery' ), false, true );

}


function dev_megamenu_register_menu() {
	register_nav_menus( array(
		'dev_megamenu' => 'Mega Menu!'
	) );
}


function dev_megamenu_widgets_init() {
	$location  = 'dev_megamenu';
	$css_class = 'has-mega-menu';
	$locations = get_nav_menu_locations();
	if ( isset( $locations[ $location ] ) ) {
		$menu = get_term( $locations[ $location ], 'nav_menu' );
		if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
			foreach ( $items as $item ) {
				if ( in_array( $css_class, $item->classes ) ) {
					register_sidebar( array(
						'id'   => 'mega-menu-widget-area-' . $item->ID,
						'name' => $item->title . ' - Mega Menu',
					) );
				}
			}
		}
	}
}
