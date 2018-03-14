<?php

/**
 * Actions Hooks & Filters
 */
add_action( 'wp_enqueue_scripts', 'dev_megamenu_enqueue_scripts' );
add_action( 'after_setup_theme', 'dev_megamenu_register_menu' );

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
	register_nav_menu( 'dev-megamenu', __( 'Mega Menu!', 'dev-megamenu' ) );
}