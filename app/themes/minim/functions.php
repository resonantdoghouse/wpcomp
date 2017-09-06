<?php

// Includes
include_once __DIR__ . '/includes/setup.php';
include_once __DIR__ . '/includes/enqueue.php';
include_once __DIR__ . '/includes/customizer.php';

/**
 * Setup
 */
add_action("after_switch_theme", "minim_setup_theme");

// runs everytime the page loads
// add_action( 'after_setup_theme', 'minim_setup_theme' );




?>