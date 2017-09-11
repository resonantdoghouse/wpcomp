<?php
/**
 * Plugin Name: Dev CPT
 * text-domain: dev-cpt
 *
 */


function custom_post_type() {

	$txt_dom = 'dev-cpt';

	$pt_name        = 'Bass';
	$pt_name_single = 'Bass';
	$pt_name_plural = 'Basses';

	$pt_archive = 'basses';
	$pt_slug    = 'bass';

	$pt_ico           = 'dashicons-cart';
	$pt_capability    = 'post';
	$pt_menu_position = 5;

	$pt_rest = 'basses';

	$pt_supports = array(
		'title',
		'editor',
		'excerpt',
		'author',
		'thumbnail',
		'revisions',
		'comments',
	);


	$labels = array(
		'name'               => __( $pt_name, 'cmap' ),
		'singular_name'      => __( $pt_name_single, 'cmap' ),
		'add_new'            => __( 'Add New', 'cmap' ),
		'add_new_item'       => __( 'Add New ' . $pt_name_single, 'cmap' ),
		'edit_item'          => __( 'Edit ' . $pt_name_single, 'cmap' ),
		'new_item'           => __( 'New ' . $pt_name_single, 'cmap' ),
		'all_items'          => __( 'All ' . $pt_name_plural, 'cmap' ),
		'view_item'          => __( 'View ' . $pt_name_single, 'cmap' ),
		'search_items'       => __( 'Search ' . $pt_name_plural, 'cmap' ),
		'not_found'          => __( 'No ' . $pt_name_plural . ' found', 'cmap' ),
		'not_found_in_trash' => __( 'No ' . $pt_name_plural . ' found in Trash', 'cmap' ),
		'menu_name'          => __( $pt_name_plural, 'cmap' )
	);

	$args = array(

		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'query_var'             => true,
		'rewrite'               => true,
		'capability_type'       => $pt_capability,
		'has_archive'           => $pt_archive,
		'menu_icon'             => $pt_ico,
		'hierarchical'          => false,
		'menu_position'         => null,
		'show_in_rest'          => true,
		'rest_base'             => $pt_rest,
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' )

	);

	register_post_type( $pt_name, $args );

}

add_action( 'init', 'custom_post_type' );