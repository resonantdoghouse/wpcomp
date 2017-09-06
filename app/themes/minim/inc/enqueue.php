<?php

/**
 * Child Theme
 * Use parent theme style
 */

function minim_enqueue_sripts()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri() . '/lib/owl-carousel/owl.carousel.min.css');
	wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri() . '/lib/owl-carousel/owl.carousel.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('main-script', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'minim_enqueue_sripts');






function my_custom_init() {
	remove_post_type_support( 'post', 'custom-fields' );
}
add_action( 'init', 'my_custom_init' );