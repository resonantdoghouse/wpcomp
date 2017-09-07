<?php
/**
 * Plugin Name: Dev Ajax
 *
 */


function devajax_enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'dev-ajax', plugin_dir_url( __FILE__ ) . '/js/dev-ajax.js', array( 'jquery' ), 'false', true );

}

add_action( 'wp_enqueue_scripts', 'devajax_enqueue_scripts' );



