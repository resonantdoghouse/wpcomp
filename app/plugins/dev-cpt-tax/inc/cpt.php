<?php

/**
 * Register Person Post Type
 */
function cpt_tax_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'People', 'Post Type General Name', 'dev_cpt_tax' ),
		'singular_name'         => _x( 'Person', 'Post Type Singular Name', 'dev_cpt_tax' ),
		'menu_name'             => __( 'People', 'dev_cpt_tax' ),
		'name_admin_bar'        => __( 'Person', 'dev_cpt_tax' ),
		'archives'              => __( 'People Archives', 'dev_cpt_tax' ),
		'attributes'            => __( 'Person Attributes', 'dev_cpt_tax' ),
		'parent_item_colon'     => __( 'Parent Person:', 'dev_cpt_tax' ),
		'all_items'             => __( 'All People', 'dev_cpt_tax' ),
		'add_new_item'          => __( 'Add New Person', 'dev_cpt_tax' ),
		'add_new'               => __( 'Add Person', 'dev_cpt_tax' ),
		'new_item'              => __( 'New Person', 'dev_cpt_tax' ),
		'edit_item'             => __( 'Edit Person', 'dev_cpt_tax' ),
		'update_item'           => __( 'Update Person', 'dev_cpt_tax' ),
		'view_item'             => __( 'View Person', 'dev_cpt_tax' ),
		'view_items'            => __( 'View People', 'dev_cpt_tax' ),
		'search_items'          => __( 'Search People', 'dev_cpt_tax' ),
		'not_found'             => __( 'Not found', 'dev_cpt_tax' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dev_cpt_tax' ),
		'featured_image'        => __( 'Featured Image', 'dev_cpt_tax' ),
		'set_featured_image'    => __( 'Set featured image', 'dev_cpt_tax' ),
		'remove_featured_image' => __( 'Remove featured image', 'dev_cpt_tax' ),
		'use_featured_image'    => __( 'Use as featured image', 'dev_cpt_tax' ),
		'insert_into_item'      => __( 'Insert into item', 'dev_cpt_tax' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Person', 'dev_cpt_tax' ),
		'items_list'            => __( 'People list', 'dev_cpt_tax' ),
		'items_list_navigation' => __( 'People list navigation', 'dev_cpt_tax' ),
		'filter_items_list'     => __( 'Filter people list', 'dev_cpt_tax' ),
	);
	$args = array(
		'label'                 => __( 'Person', 'dev_cpt_tax' ),
		'description'           => __( 'A post type for adding people with a roles taxonomy', 'dev_cpt_tax' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-universal-access',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'person', $args );

}