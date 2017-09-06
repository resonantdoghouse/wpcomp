<?php

// Includes
include_once __DIR__ . '/inc/setup.php';
include_once __DIR__ . '/inc/enqueue.php';
include_once __DIR__ . '/inc/customizer.php';

/**
 * Setup
 */
add_action("after_switch_theme", "minim_setup_theme");

// runs everytime the page loads
// add_action( 'after_setup_theme', 'minim_setup_theme' );




?>