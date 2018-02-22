<?php
/**
 * TAXONOMIES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

// Register Custom Taxonomy
function redstar_tax_product_type() {

	$labels = array(
		'name'                       => 'Product Types',
		'singular_name'              => 'Product Type',
		'menu_name'                  => 'Product Types',
		'all_items'                  => 'All Product Types',
		'parent_item'                => 'Parent Product Type',
		'parent_item_colon'          => 'Parent Product Type:',
		'new_item_name'              => 'New Product Type Name',
		'add_new_item'               => 'Add New Product Type',
		'edit_item'                  => 'Edit Product Type',
		'update_item'                => 'Update Product Type',
		'view_item'                  => 'View Product Type',
		'separate_items_with_commas' => 'Separate Product Types with commas',
		'add_or_remove_items'        => 'Add or remove Product Types',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Product Types',
		'search_items'               => 'Search Product Types',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No Product Types',
		'items_list'                 => 'Product Types list',
		'items_list_navigation'      => 'Product Types list navigation',
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
	register_taxonomy( 'product-type', array( 'product' ), $args );

}
add_action( 'init', 'redstar_tax_product_type', 0 );
