<?php

if ( function_exists( 'acf_add_options_page' ) ) {
	// create ACF options page
	$args = array(
		'page_title' => 'Modal Settings',
		'icon_url'   => 'dashicons-admin-settings'
	);
	acf_add_options_page( $args );
}
