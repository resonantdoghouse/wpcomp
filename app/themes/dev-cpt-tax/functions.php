<?php

/**
* Actions Hooks & Filters
*/
add_action( 'wp_enqueue_scripts', 'dev_cpt_tax_enqueue_scripts' );


/**
* Child Theme parent style & custom stylesheet
*/
function dev_cpt_tax_enqueue_scripts() {
/**
* Styles
*/
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
//wp_enqueue_style( 'dev-cpt-tax-style', get_stylesheet_directory_uri() . '/assets/css/dev-cpt-tax.css' );
/**
* Scripts
*/
//wp_enqueue_script( 'jquery' );
//wp_enqueue_script( 'dev-cpt-tax-script', get_stylesheet_directory_uri() . '/assets/js/dev-cpt-tax.js', array( 'jquery' ), false, true );

}