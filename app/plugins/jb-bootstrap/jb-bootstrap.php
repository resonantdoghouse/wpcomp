<?php
/**
 * jb plugin bootstrap file
 *
 * @since             0.1.0
 * @package           jb_bootstrap
 *
 * @wordpress-plugin
 * Plugin Name:       JB Bootstrap
 * Plugin URI:        https://github.com/resonantdoghouse/wpcomp
 * Description:       Bootstrap for plugin development
 * Version:           0.1.0
 * Author:            Jim
 * Author URI:        https://github.com/resonantdoghouse/wpcomp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain:       jb-bootstrap
 */

// If this file is accessed directory, then abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include the files for rendering the display.
require_once( __DIR__ . '/admin/class-meta-box.php' );
require_once( __DIR__ . '/admin/class-meta-box-display.php' );

add_action( 'plugins_loaded', 'jb_bootstrap_init' );
/**
 * Starts the plugin by initializing the meta box, its display, and then
 * sets the plugin in motion.
 */
function jb_bootstrap_init() {

	$meta_box = new Meta_Box( new Meta_Box_Display() );
	$meta_box->init();
}