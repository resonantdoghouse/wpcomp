<?php

/**
 * Register Role Taxonomy
 */
function cpt_tax_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Roles', 'Taxonomy General Name', 'dev_cpt_tax' ),
		'singular_name'              => _x( 'Role', 'Taxonomy Singular Name', 'dev_cpt_tax' ),
		'menu_name'                  => __( 'Role', 'dev_cpt_tax' ),
		'all_items'                  => __( 'All Roles', 'dev_cpt_tax' ),
		'parent_item'                => __( 'Parent Role', 'dev_cpt_tax' ),
		'parent_item_colon'          => __( 'Parent Role:', 'dev_cpt_tax' ),
		'new_item_name'              => __( 'New Role Name', 'dev_cpt_tax' ),
		'add_new_item'               => __( 'Add New Role', 'dev_cpt_tax' ),
		'edit_item'                  => __( 'Edit Role', 'dev_cpt_tax' ),
		'update_item'                => __( 'Update Role', 'dev_cpt_tax' ),
		'view_item'                  => __( 'View Role', 'dev_cpt_tax' ),
		'separate_items_with_commas' => __( 'Separate Roles with commas', 'dev_cpt_tax' ),
		'add_or_remove_items'        => __( 'Add or remove Roles', 'dev_cpt_tax' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'dev_cpt_tax' ),
		'popular_items'              => __( 'Popular Roles', 'dev_cpt_tax' ),
		'search_items'               => __( 'Search Roles', 'dev_cpt_tax' ),
		'not_found'                  => __( 'Not Found', 'dev_cpt_tax' ),
		'no_terms'                   => __( 'No Roles', 'dev_cpt_tax' ),
		'items_list'                 => __( 'Roles list', 'dev_cpt_tax' ),
		'items_list_navigation'      => __( 'Roles list navigation', 'dev_cpt_tax' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'role', array( 'person' ), $args );

}