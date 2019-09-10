<?php

/*
 * Plugin Name: JB Rest
 * Plugin URI: https://github.com/resonantdoghouse/
 * Description: Who is JSON and why do they need so much REST?
 * Author: Jim
 * Version: 0.0.1
 * Author URI: https://github.com/resonantdoghouse/
 */

// check to make sure users admin users 
if (!function_exists('add_action')) {
    echo 'Not allowed!';
    exit();
}

// hook for WP REST API
add_action('rest_api_init', 'jb_rest_routes');

/**
 * Register new rest api endpoints
 */
function jb_rest_routes()
{
    register_rest_route(
        'jb/v1',
        '/post/',
        array(
            'methods' => 'POST',
            'callback' => 'jb_create_post',
        )
    );

    register_rest_route(
        'jb/v1',
        '/get/(?P<post_id>\d+)',
        array(
            'methods' => 'GET',
            'callback' => 'jb_get_post',
        )
    );

    register_rest_route(
        'jb/v1',
        '/random/',
        array(
            'methods' => 'GET',
            'callback' => 'jb_get_random_post',
        )
    );
}

/**
 * Create a new post, requires auth e.g. basic auth for testing
 */
function jb_create_post($request)
{
    $title = $request->get_param('title');
    $content = $request->get_param('content');

    $post_id = wp_insert_post(array(
        'post_title' => $title,
        'post_content' => $content
    ));

    return $post_id;
}

/**
 * Get post by ID
 */
function jb_get_post($request)
{
    $args = array(
        'post__in' => array($request['post_id'])
    ); 

    $posts = get_posts($args);

    if (empty($posts)) {
        return new WP_Error( 'no posts found', 'there is no post with that ID', array('status' => 404) );
    }

    $response = new WP_REST_Response($posts);
    $response->set_status(200);

    return $response;
}

/**
 * Get a random post
 */
function jb_get_random_post(){
    $args = array(
        'orderby' => 'rand',
        'posts_per_page' => 1
    ); 

    $posts = get_posts($args);

    if (empty($posts)) {
        return new WP_Error( 'no posts found', 'could not get a random post', array('status' => 404) );
    }

    $response = new WP_REST_Response($posts);
    $response->set_status(200);

    return $response;
}