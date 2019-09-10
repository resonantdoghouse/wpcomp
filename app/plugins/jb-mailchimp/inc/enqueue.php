<?php

add_action( 'wp_enqueue_scripts', 'jb_mailchimp_enqueue_scripts' );

function jb_mailchimp_enqueue_scripts() {
	wp_enqueue_style( 'jb-mailchimp', plugin_dir_url( __FILE__ ) . '../css/style.css' );
//	wp_enqueue_script( 'jquery' );
//	wp_enqueue_script( 'js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js' );
//	wp_enqueue_script( 'jb-modal', plugin_dir_url( __FILE__ ) . '\../js/script.js', array( 'jquery' ), 'false', true );
}

add_action( 'admin_enqueue_scripts', 'jb_mailchimp_enqueue_admin_scripts' );

function jb_mailchimp_enqueue_admin_scripts() {
	wp_enqueue_style( 'jb-mailchimp-admin', plugin_dir_url( __FILE__ ) . '../css/style.css' );
}