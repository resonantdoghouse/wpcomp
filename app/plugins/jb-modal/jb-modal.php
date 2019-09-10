<?php
/**
 * Plugin Name: JB Modal
 * Description: Custom Modal
 */

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}

require_once( __DIR__ . '/inc/custom-modal.php' );
require_once( __DIR__ . '/inc/acf-options.php' );
require_once( __DIR__ . '/inc/enqueue.php' );
