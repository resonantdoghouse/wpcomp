<?php

add_action( 'wp_enqueue_scripts', 'devajax_enqueue_scripts' );

function devajax_enqueue_scripts() {
	wp_enqueue_style( 'dev-search', plugin_dir_url( __FILE__ ) . '\../js/script.js', array( 'jquery' ), 'false', true );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'dev-search', plugin_dir_url( __FILE__ ) . '\../js/script.js', array( 'jquery' ), 'false', true );
}