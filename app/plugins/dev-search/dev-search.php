<?php
/**
 * Plugin Name: Dev Search
 * Description: Custom Search using query strings & ACF Options
 */

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}

require_once( __DIR__ . '/inc/custom-search.php' );
require_once( __DIR__ . '/inc/acf-options.php' );
require_once( __DIR__ . '/inc/enqueue.php' );
