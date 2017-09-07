<?php
/**
 * Plugin Name: Dev Instagram
 *
 */
function devinstagram_enqueue_scripts() {

	wp_enqueue_style( 'dev-instagram-owl-carousel', plugin_dir_url( __FILE__ ) . '/lib/owl-carousel/owl.carousel.min.css' );
	wp_enqueue_style( 'dev-instagram-owl-theme', plugin_dir_url( __FILE__ ) . '/lib/owl-carousel/owl.theme.default.min.css' );
	wp_enqueue_style( 'dev-instagram', plugin_dir_url( __FILE__ ) . '/css/dev-instagram.css', array() );

	wp_enqueue_script( 'jquery', array(), 'false', false );
	wp_enqueue_script( 'spectragram', plugin_dir_url( __FILE__ ) . '/js/spectragram.min.js', array( 'jquery' ), 'false', false );
	wp_enqueue_script( 'dev-instagram-owl-carousel', plugin_dir_url( __FILE__ ) . '/lib/owl-carousel/owl.carousel.min.js', array( 'jquery' ), '1.0.0', false );
	wp_enqueue_script( 'dev-instagram', plugin_dir_url( __FILE__ ) . '/js/dev-instagram.js', array(
		'jquery',
		'spectragram',
		'dev-instagram-owl-carousel'
	), 'false', true );

}

add_action( 'wp_enqueue_scripts', 'devinstagram_enqueue_scripts' );

