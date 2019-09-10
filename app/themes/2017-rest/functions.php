<?php

/**
 * Actions Hooks & Filters
 */
add_action('wp_enqueue_scripts', 'rest_enqueue_scripts');

/**
 * Child Theme parent style & custom stylesheet
 */
function rest_enqueue_scripts()
{
    // styles
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('rest-style', get_stylesheet_directory_uri() . '/css/custom.css');

    // scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('rest-script', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), false, true);

    // localized js
    wp_localize_script('rest-script', 'rest_vars', array(
        'rest_url' => esc_url_raw(rest_url()),
        'wpapi_nonce' => wp_create_nonce('wp_rest'),
        'post_id' => get_the_ID(),
        'user_id' => get_current_user_id(),
        'comments_open' => comments_open(get_the_ID()),
    ));
}

add_action('rest_api_init', function () {
    register_rest_route('rest/v1', 'like', array(
        'methods' => 'POST',
        'callback' => 'rest_like',
    ));
});

/**
 * Like post create post_meta
 */
function rest_like($request)
{

    $post_id = $request->get_param('id');
    $user_id = $request->get_param('user');

    if (!empty(get_post_meta($post_id, 'likes'))) {
        $likes = get_post_meta($post_id, 'likes')[0];
        $likes++;
        update_post_meta($post_id, 'likes', $likes);
    } else {
        add_post_meta($post_id, 'likes', 1);
    }

    return rest_ensure_response('post liked');
}
