<?php
/*
Plugin Name:  Dev EvtBrite
Plugin URI:   https://catkittycat.com
Description:  Testing Event Brite
Version:      0.0.1
Author:       Cat Kitty Cat
Author URI:   https://catkittycat.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  dev-evtbr
*/

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}


define( 'DEV_EVTBR_PATH', plugin_dir_url( __FILE__ ) );

add_action( 'admin_menu', 'dev_evtbr_menu' );

function dev_evtbr_menu() {
	$dev_evtbr_menu_page = add_submenu_page(
		'tools.php',
		'Dev EvtBr',
		'Import Events',
		'manage_options',
		'dev-evtbr',
		'dev_evtbr_submenu_callback' );

	add_action( 'load-' . $dev_evtbr_menu_page, 'load_admin_js' );
}

function dev_evtbr_submenu_callback() {
	echo '<div class="wrap dev-evtbr-fadein"><div id="icon-tools" class="icon32"></div>';
	echo '<h2>Import Events from Eventbrite</h2>';
	echo '<p>This tool will import eventbrite data and create new posts with <strong>The Events Calendar plugin. 🗓</strong></p>';
	echo '<p>Register an app with your Eventbrite account first. Then get an auth key at: <a target="_blank" href="https://www.eventbrite.ca/myaccount/apps/">eventbrite.ca/myaccount/apps/</a></p>';
	echo '<p>paste in the key for Your personal OAuth token. Please note your <strong>api key is not stored in the database</strong>, you will have to enter it each time. </p>';
	echo '<input id="dev-evtbr-import-token" class="dev-evtbr-import-token" type="password" placeholder="api token">';
	echo '<button id="dev-evtbr-import-events" class="dev-evtbr-import-events">Load Events</button>';
	echo '<div id="dev-evtbr-appended-events" class="dev-evtbr-appended-events"></div>';
	echo '</div>';
}

// This function is only called when our plugin's page loads!
function load_admin_js() {
	// Unfortunately we can't just enqueue our scripts here - it's too early. So register against the proper action hook to do it
	add_action( 'admin_enqueue_scripts', 'enqueue_admin_js' );
}

function enqueue_admin_js() {

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'dev-evtbr-js', DEV_EVTBR_PATH . '/js/dev-evtbr.js', array( 'jquery' ), '0.0.1', true );

	wp_localize_script( 'dev-evtbr-js', 'dev_evtbr',
		array(
			'rest_url' => rest_url(),
			'nonce'    => wp_create_nonce( 'wp_rest' )
		)
	);

	wp_enqueue_style( 'dev-evtbr', DEV_EVTBR_PATH . '/css/dev-evtbr.css' );

}