<?php

/**
 * Child Theme use parent style
 */
function minim_enqueue_sripts()
{
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'minim_enqueue_sripts');










add_action( 'admin_menu', 'linked_url' );
function linked_url() {
	add_menu_page( 'linked_url', 'External link', 'read', 'my_slug', '', 'dashicons-text', 1 );
}

add_action( 'admin_menu' , 'linkedurl_function' );
function linkedurl_function() {
	global $menu;
	$menu[1][2] = "post.php?post=23&action=edit";
}