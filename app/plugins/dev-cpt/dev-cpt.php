<?php
/**
 * Plugin Name: Dev CPT
 * text-domain: dev-cpt
 *
 */

if ( ! function_exists( 'add_action' ) ) {
	echo 'Not allowed!';
	exit();
}

define( 'POST_TYPE', 'bass' );

add_action( 'init', 'custom_post_type' );
add_filter( 'single_template', 'dev_cpt_single_template' );
add_filter( 'archive_template', 'dev_cpt_archive_template' );


function custom_post_type() {

	$txt_dom = 'dev-cpt';

	$pt_name        = POST_TYPE;
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
		'name'               => __( $pt_name, $txt_dom ),
		'singular_name'      => __( $pt_name_single, $txt_dom ),
		'add_new'            => __( 'Add New', $txt_dom ),
		'add_new_item'       => __( 'Add New ' . $pt_name_single, $txt_dom ),
		'edit_item'          => __( 'Edit ' . $pt_name_single, $txt_dom ),
		'new_item'           => __( 'New ' . $pt_name_single, $txt_dom ),
		'all_items'          => __( 'All ' . $pt_name_plural, $txt_dom ),
		'view_item'          => __( 'View ' . $pt_name_single, $txt_dom ),
		'search_items'       => __( 'Search ' . $pt_name_plural, $txt_dom ),
		'not_found'          => __( 'No ' . $pt_name_plural . ' found', $txt_dom ),
		'not_found_in_trash' => __( 'No ' . $pt_name_plural . ' found in Trash', $txt_dom ),
		'menu_name'          => __( $pt_name_plural, $txt_dom )
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

	register_post_type( POST_TYPE, $args );

}


function dev_cpt_single_template( $single_template ) {
	global $post;
	global $pt_name;

	if ( $post->post_type == POST_TYPE ) {
		$single_template = dirname( __FILE__ ) . '/pt-tmplt-single.php';
	}

	return $single_template;
}

function dev_cpt_archive_template( $archive_template ) {
	global $post;
	global $pt_name;

	if ( $post->post_type == POST_TYPE ) {
		$archive_template = dirname( __FILE__ ) . '/pt-tmplt-archive.php';
	}

	return $archive_template;
}

