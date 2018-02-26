<?php

/**
 * Actions Hooks & Filters
 */
add_action('wp_enqueue_scripts', 'redsprout_enqueue_scripts');
add_action('rest_api_init', 'redsprout_register_endpoints');

/**
 * Child Theme parent style & custom stylesheet
 */
function redsprout_enqueue_scripts()
{
    // styles
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/custom.css'); 
    // scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('redsprout', get_stylesheet_directory_uri() . '/js/redsprout.js', array('jquery'), false, true);

    wp_localize_script('redsprout', 'redsprout_vars', array(
        'rest_url' => esc_url_raw(rest_url()),
        'wpapi_nonce' => wp_create_nonce('wp_rest'),
        'post_id' => get_the_ID(),
        'comments_open' => comments_open(get_the_ID())
    ));
}

/**
 * Rest endpoint
 */
function redsprout_register_endpoints()
{
    register_rest_route(
        'redsprout/v1',
        '/votes/',
        array(
            'methods' => 'POST',
            'callback' => 'redsprout_add_vote',
        )
    );
}

/**
 * Basic vote testing no authentication or validation
 * Test with postman, the id of the post and number
 * Check your postmeta table for stored values
 */
function redsprout_add_vote(WP_REST_Request $request)
{
    $votes = intval(get_post_meta($request->get_param('id'), 'votes', true));
    if (false === (bool)update_post_meta($request->get_param('id'), 'votes', $votes + 1)) {
        return new WP_Error('vote_error', __('Unable to add vote', 'redsprout'), $request->get_param('id'));
    }
    return $votes + 1;
}