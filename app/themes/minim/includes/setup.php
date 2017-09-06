<?php

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// Activate plugins
function minim_setup_theme() {
	activate_plugin( 'show-current-template/show-current-template.php' );
	activate_plugin( 'kint-debugger/kint-debugger.php' );
	// activate_plugin('pods/init.php');
	// activate_plugin('wordpress-seo/wp-seo.php');
}

/**
 * Setting installation defaults
 *
 * Code from: code.tutsplus.com The full article has lots of great config tricks!
 * https://code.tutsplus.com/tutorials/how-to-activate-plugins-themes-upon-wordpress-installation--cms-23551
 */
// array of options to change
$option = array(
	'blogdescription'               => 'Minim theme',
	'default_ping_status'           => 'closed',
	'permalink_structure'           => '/%postname%/',
	'uploads_use_yearmonth_folders' => '',
	'use_trackback'                 => '',
    'default_ping_status'           => 'closed',
	'default_pingback_flag'         => ''
);

// change the options!
foreach ( $option as $key => $value ) {
	update_option( $key, $value );
}

// flush rewrite rules because we changed the permalink structure
global $wp_rewrite;
$wp_rewrite->flush_rules();