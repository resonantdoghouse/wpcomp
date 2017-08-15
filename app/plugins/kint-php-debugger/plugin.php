<?php
/**
 * Kint PHP Debugger - a modern and powerful PHP debugging helper
 *
 * @package         Kint_PHP_Debugger
 * @author          hellofromTonya
 * @license         dual license GPL-2.0+ & MIT (Kint is licensed MIT)
 * @link            http://hellofromtonya.com/
 *
 * @wordpress-plugin
 * Plugin Name:     Kint PHP Debugger
 * Plugin URI:      http://hellofromtonya.com/
 * Description:     Kint is a a modern and powerful PHP debugging helper, which requires zero-setup and replaces var_dump(), print_r() and debug_backtrace().  This plugin is a wrapper for Kint.
 * Version:         1.1.4
 * Author:          hellofromTonya
 * Author URI:      http://hellofromtonya.com
 * Text Domain:     wpkint
 * Requires WP:     3.5
 * Requires PHP:    5.3
 */
namespace Kint_PHP_Debugger;

$pathto_kint = trailingslashit( __DIR__ ) . 'src/kint-php/kint/Kint.class.php';

if ( ! class_exists( 'Kint' ) && is_readable( $pathto_kint ) ) {
	require_once( $pathto_kint );
}
