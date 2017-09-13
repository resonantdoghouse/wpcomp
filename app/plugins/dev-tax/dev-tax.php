<?php
/**
 * Plugin Name: Dev Tax
 * Description: custom taxonomies used with Dev CPT
 * Text Domain: dev-tax
 */

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}

add_action( 'init', 'bass_type_taxonomy', 0 );

function bass_type_taxonomy() {

	$txt_dom         = 'dev-tax';
	$tax_name        = 'bass-type';
	$tax_name_single = 'Bass Type';
	$tax_name_plural = 'Bass Types';
	$tax_post_type   = 'bass';

	$labels = array(
		'name'                       => _x( $tax_name_plural, 'Taxonomy General Name', $txt_dom ),
		'singular_name'              => _x( $tax_name_single, 'Taxonomy Singular Name', $txt_dom ),
		'menu_name'                  => __( $tax_name_single, $txt_dom ),
		'all_items'                  => __( 'All Genres', $txt_dom ),
		'parent_item'                => __( 'Parent ' . $tax_name_single, $txt_dom ),
		'parent_item_colon'          => __( 'Parent ' . $tax_name_single, $txt_dom ),
		'new_item_name'              => __( 'New ' . $tax_name_single, $txt_dom . ' Name', $txt_dom ),
		'add_new_item'               => __( 'Add New ' . $tax_name_single, $txt_dom ),
		'edit_item'                  => __( 'Edit ' . $tax_name_single, $txt_dom ),
		'update_item'                => __( 'Update Genre', $txt_dom ),
		'view_item'                  => __( 'View Item', $txt_dom ),
		'separate_items_with_commas' => __( 'Separate ' . $tax_name_single . ' with commas', $txt_dom ),
		'add_or_remove_items'        => __( 'Add or remove ' . $tax_name_single, $txt_dom ),
		'choose_from_most_used'      => __( 'Choose from the most used ' . $tax_name_single, $txt_dom ),
		'popular_items'              => __( 'Popular Items', $txt_dom ),
		'search_items'               => __( 'Search ' . $tax_name_plural, $txt_dom ),
		'not_found'                  => __( 'Not Found', $txt_dom ),
		'no_terms'                   => __( 'No items', $txt_dom ),
		'items_list'                 => __( 'Items list', $txt_dom ),
		'items_list_navigation'      => __( 'Items list navigation', $txt_dom ),
	);

	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'query_var'         => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'rewrite'           => array( 'slug' => 'manufacturer' ),
		'show_in_rest'       => true,
		'rest_base'          => 'manufacturer',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	);

	register_taxonomy( $tax_name, array( $tax_post_type ), $args );

}

