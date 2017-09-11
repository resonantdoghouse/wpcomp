<?php

/**
 * Child Theme use parent style
 */
function minim_enqueue_sripts()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'minim_enqueue_sripts');