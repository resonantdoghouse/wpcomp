<?php

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_redsprout_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'testing_metabox',
		'title'         => __( 'Test Metabox', 'cmb2' ),
		'object_types'  => array( 'post', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	// Regular text field
	$cmb->add_field( array(
		'name'       => __( 'Test', 'cmb2' ),
		'desc'       => __( 'testing', 'cmb2' ),
		'id'         => $prefix . 'text',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats'
	) );

	$cmb->add_field( array(
		'name' => 'Test Date/Time Picker Combo (UNIX timestamp)',
		'id'   => 'wiki_test_datetime_timestamp',
		'type' => 'text_datetime_timestamp',
	) );

	$cmb->add_field( array(
		'name'    => 'Test File',
		'desc'    => 'Upload an image or enter an URL.',
		'id'      => 'wiki_test_image',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
		),
		// query_args are passed to wp.media's library query.
		'query_args' => array(
			'type' => 'application/pdf', // Make library only display PDFs.
			// Or only allow gif, jpg, or png images
			// 'type' => array(
			// 	'image/gif',
			// 	'image/jpeg',
			// 	'image/png',
			// ),
		),
		'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );

}