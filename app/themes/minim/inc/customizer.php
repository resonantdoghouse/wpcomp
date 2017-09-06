<?php

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