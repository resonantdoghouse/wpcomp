<?php
/**
 * Plugin Name: Dev Ajax
 */


add_action( 'wp_enqueue_scripts', 'devajax_enqueue_scripts' );
add_action( 'theme_page_templates', 'devajax_template' );

function devajax_enqueue_scripts() {

	wp_enqueue_style( 'animated-modal', plugin_dir_url( __FILE__ ) . '/lib/animate.min.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'animated-modal', plugin_dir_url( __FILE__ ) . '/lib/animatedModal.min.js', array( 'jquery' ), 'false', true );
	wp_enqueue_script( 'dev-ajax', plugin_dir_url( __FILE__ ) . '/js/dev-ajax.js', array( 'jquery' ), 'false', true );

}

function devajax_template( $templates ) {
	$templates[ plugin_dir_url( __FILE__ ) . '/templates/test.php' ] = 'Test Template';

	return $templates;
}