<?php

/**
 * Child Theme
 * Use parent theme style
 */
add_action('wp_enqueue_scripts', 'minim_enqueue_styles');

function minim_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}