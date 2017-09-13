<?php
/**
 * Plugin Name: Dev Ajax
 * Description: Ajax testing
 * Text Domain: dev-ajax
 */

add_action( 'wp_enqueue_scripts', 'devajax_enqueue_scripts' );
add_action( 'page_template', 'dev_ajax_template' );

function devajax_enqueue_scripts() {

	wp_enqueue_style( 'dev-ajax', plugin_dir_url( __FILE__ ) . '/src/css/dev-ajax.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'dev-ajax', plugin_dir_url( __FILE__ ) . '/src/js/dev-ajax.js', array( 'jquery' ), 'false', true );

}

function dev_ajax_template( $template ) {

	if ( is_page( 'testing' ) ) {
		$template = dirname( __FILE__ ) . '/templates/da-posts.php';
	}
	return $template;
}
