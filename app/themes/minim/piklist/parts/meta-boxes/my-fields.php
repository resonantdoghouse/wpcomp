<?php
/*
Title: Piklist Custom Fields
Post Type: post
*/

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