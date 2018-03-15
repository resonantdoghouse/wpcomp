<?php
/*
Plugin Name:  Dev Cpt Tax
Plugin URI:   https://catkittycat.com
Description:  Testing Custom Post Types & Taxonomies
Version:      0.0.1
Author:       Cat Kitty Cat
Author URI:   https://catkittycat.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  dev_cpt_tax
*/

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}

/**
 * Includes
 */
require plugin_dir_path( __FILE__ ) . '/inc/cpt.php';
require plugin_dir_path( __FILE__ ) . '/inc/tax.php';

/**
 * Actions & Filters
 */
add_action( 'init', 'cpt_tax_custom_post_type', 0 );
add_action( 'init', 'cpt_tax_custom_taxonomy', 0 );