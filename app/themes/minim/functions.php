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


/**
 * Setup
 *
 */
include_once __DIR__ . '/includes/setup.php';
add_action("after_switch_theme", "minim_setup_theme");

/**
 * runs everytime the page loads
 */
// add_action( 'after_setup_theme', 'minim_setup_theme' );



/**
 * WordPress customizer fields
 * Basic text fields
 * @param $wp_customize
 */
function bcwmk_customize_register($wp_customize)
{
    bcwmk_social_customizer_section($wp_customize);
    bcwmk_bg_img_customizer_section($wp_customize);
}

add_action('customize_register', 'bcwmk_customize_register');


function bcwmk_social_customizer_section($wp_customize)
{

    $wp_customize->add_setting('bcwmk_facebook_handle', array(
        'default' => '',
        'transport' => 'refresh'
    ));

    $wp_customize->add_section('bcwmk_social_section', array(
        'title' => __('BCWMK Social Settings', 'bcwmk'),
        'priority' => 30
    ));


    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'bcwmk_social_facebook_input',
            array(
                'label' => __('Facebook Handle', 'bcwmk'),
                'section' => 'bcwmk_social_section',
                'settings' => 'bcwmk_facebook_handle'
            )
        )
    );

}


/**
 * WordPress customizer fields
 * image field, background image style
 * @param $wp_customize
 */
function bcwmk_bg_img_customizer_section($wp_customize)
{

    $wp_customize->add_setting('bcwmk_background_image_handle', array(
        'default' => '',
        'transport' => 'refresh'
    ));

    $wp_customize->add_section('bcwmk_bg_img_section', array(
        'title' => __('Background Image', 'bcwmk'),
        'priority' => 30
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'bcwmk_bg_img_input',
            array(
                'label' => __('Background Image', 'bcwmk'),
                'section' => 'bcwmk_bg_img_section',
                'settings' => 'bcwmk_background_image_handle'
            )
        )
    );

}

function bcwmk_bg_image_output()
{
    if (get_theme_mod('bcwmk_background_image_handle')) {
        echo get_theme_mod('bcwmk_background_image_handle');
    } else {
        echo get_template_directory_uri() . '/assets/img/startup-1.jpg';
    }
}


/**
 * Setting installation defaults
 *
 * Code from: code.tutsplus.com
 * Read the article, it's full of great config tricks!
 * https://code.tutsplus.com/tutorials/how-to-activate-plugins-themes-upon-wordpress-installation--cms-23551
 */

// array of options to change
$option = array(
    // we don't want no description
//    'blogdescription' => '',
    // change category base
//    'category_base' => '/cat',
    // change tag base
//    'tag_base' => '/label',
    // disable comments
//    'default_comment_status' => 'closed',
    // disable trackbacks
//    'use_trackback' => '',
    // disable pingbacks
    'default_ping_status' => 'closed',
    // disable pinging
//    'default_pingback_flag' => '',
    // change the permalink structure
    'permalink_structure' => '/%postname%/',
    // dont use year/month folders for uploads
//    'uploads_use_yearmonth_folders' => '',
    // don't use those ugly smilies
//    'use_smilies' => ''
);

// change the options!
foreach ($option as $key => $value) {
    update_option($key, $value);
}

// flush rewrite rules because we changed the permalink structure
global $wp_rewrite;
$wp_rewrite->flush_rules();




?>