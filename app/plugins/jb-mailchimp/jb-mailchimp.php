<?php
/**
 * Plugin Name: JB MailChimp
 * Description: MailChimp integration
 * textdomain: jb-mailchimp
 */

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}

require_once( __DIR__ . '/inc/mailchimp.php' );
require_once( __DIR__ . '/inc/enqueue.php' );
require_once( __DIR__ . '/inc/admin/options-page.php' );
