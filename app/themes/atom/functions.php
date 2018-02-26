<?php

/**
 * Child Theme parent style
 */
add_action('wp_enqueue_scripts', 'minim_enqueue_sripts');
function minim_enqueue_sripts()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('custom-style', get_stylesheet_directory_uri()  . '/css/custom.css');
}



/**
 *  Admin a custom menu to the admin page
 */
add_action( 'admin_menu', 'linked_url' );
function linked_url() {
	add_menu_page( 'linked_url', 'External link', 'read', 'my_slug', '', 'dashicons-text', 1 );
}

/**
 * Admin custom menu link to edit a post
 */
add_action( 'admin_menu' , 'linkedurl_function' );
function linkedurl_function() {
	global $menu;
	$menu[1][2] = "post.php?post=23&action=edit";
}