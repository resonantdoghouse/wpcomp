<?php

// actions and filters
add_filter( 'get_search_form', 'dev_custom_search_form' );
add_action( 'pre_get_posts', 'dev_search_pre_get_posts' );

/*
 * Filter Search Form
 */
function dev_custom_search_form( $form ) {
	/*
	 * Toggle Search Options
	 */
	$search_categories = true;
	$search_users      = true;
	$search_tags       = true;

	// check if ACF options enabled
	$category_option = get_field( 'dev_search_categories', 'option' );
	if ( $category_option ) {
		( $category_option == 'on' ) ? $search_categories = true : $search_categories = false;
	}
	$user_option = get_field( 'dev_search_users', 'option' );
	if ( $user_option ) {
		( $user_option == 'on' ) ? $search_users = true : $search_users = false;
	}
	$tag_option = get_field( 'dev_search_tags', 'option' );
	if ( $tag_option ) {
		( $tag_option == 'on' ) ? $search_tags = true : $search_tags = false;
	}

	/*
	 * Query Categories, Users, & Tags
	 */
	// get users
	( $search_users ) ? $blog_users = get_users( 'orderby=nicename' ) : $blog_users = null;
	// get categories
	( $search_categories ) ? $categories = get_categories() : $categories = null;
	// get tags
	( $search_tags ) ? $tags = get_tags() : $tags = null;

	/*
	 * Persist input values
	 */
	$search_query = get_search_query();
	// user val from url
	( isset( $_GET['user_query'] ) ) ? $user_val = $_GET['user_query'] : $user_val = '';
	// category val from url
	( isset( $_GET['category'] ) ) ? $cat_val = $_GET['category'] : $cat_val = '';
	// tag val from url
	( isset( $_GET['tag'] ) ) ? $tag_val = $_GET['tag'] : $tag_val = '';

	/*
	 *  Search Form
	 */
	$form = '<form action="' . esc_url( home_url( '/' ) ) . '" name="s" role="search" method="get">';
	// search field
	$form .= "<input class='dev-search-input' name='s' placeholder='search' value='{$search_query}' />";

	// Show or hide user select
	if ( $search_users ) {
		// user select
		$form .= '<label class="screen-reader-text" for="user">Users</label>';
		$form .= '<select class="dev-user-select" name="user_query">';
		$form .= "<option value='' >User</option>";
		foreach ( $blog_users as $user ) {
			$name    = esc_html( $user->display_name );
			$user_id = intval( $user->ID );
			if ( $user_id == $user_val ) {
				$form .= "<option value='{$user_id}' selected >{$name}</option>";
			} else {
				$form .= "<option value='{$user_id}'>{$name}</option>";
			}
		}
		$form .= '</select>';
	}

	// Show or hide category select
	if ( $search_categories ) {
		// category select
		$form .= '<label class="screen-reader-text" for="category">Categories</label>';
		$form .= '<select class="dev-category-select" name="category">';
		$form .= "<option value='' >Category</option>";
		foreach ( $categories as $category ) {
			$cat_name = esc_html( $category->name );
			$cat_id   = intval( $category->term_id );
			if ( $cat_id == $cat_val ) {
				$form .= "<option value='{$cat_id}' selected >{$cat_name}</option>";
			} else {
				$form .= "<option value='{$cat_id}' >{$cat_name}</option>";
			}
		}
		$form .= '</select>';
	}

	// Show or hide tag select
	if ( $search_tags ) {
		// Tag select
		$form .= '<label class="screen-reader-text" for="tag">Tag</label>';
		$form .= '<select class="dev-tag-select" name="tag">';
		$form .= "<option value='' >Tag</option>";
		foreach ( $tags as $tag ) {

			$tag_name = esc_html( $tag->name );
			$tag_id   = intval( $tag->term_id );

			if ( $tag_id == $tag_val ) {
				$form .= "<option value='{$tag_name}' selected >{$tag_name}</option>";
			} else {
				$form .= "<option value='{$tag_name}'>{$tag_name}</option>";
			}
		}
		$form .= '</select>';
	}

	// hidden input for checking if custom search
	$form .= '<input name="custom-search" value="true" type="hidden" />';
	// clear form
	$form .= '<input type="button" class="dev-clear-form" value="Clear" />';
	// search submit
	$form .= '<input type="submit" value="Search" />';
	$form .= '</form>';

	return $form;
}

/*
 * Filter posts loop based on url query
 */
function dev_search_pre_get_posts( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		// possible use of date to sort posts
		$today = date( 'Ymd' );

		$query->set('post_type', 'post' );

		// search posts by user id
		if ( isset( $_GET['user_query'] ) &&  $_GET['user_query'] != '' ) {
			$user = $_GET['user_query'];
			$query->set( 'author', intval($user) );
		}
		// search posts by category
		if ( isset( $_GET['category'] ) && $_GET['category'] != '' ) {
			$category = $_GET['category'];
			$query->set( 'cat', intval( $category ) );
		}

		// search posts by tag
		if ( isset( $_GET['tag'] ) && $_GET['tag'] != '' ) {
			$tag = $_GET['tag'];
			$query->set( 'tag',  $tag);
		}
	}
}
