<?php
/*
Title: Piklist Custom Fields
Post Type: post
*/

piklist( 'field', array(
	'type'        => 'file',
	'field'       => 'custom_upload_media',
	'label'       => 'Add File(s)',
	'description' => 'This is the media uploader',
	'options'     => array(
		'modal_title' => 'Add File(s)',
		'button'      => 'Add'
	)
) );

piklist( 'field', array(
	'type'     => 'text',
	'field'    => 'field_one',
	'label'    => 'First Field',
	'add_more' => true
) );

piklist( 'field', array(
	'type'  => 'colorpicker',
	'field' => 'field_two',
	'label' => 'Second Field'
) );