<?php

if ( function_exists( 'acf_add_options_page' ) ) {
	// create ACF options page
	$args = array(
		'page_title' => 'Search Settings',
		'icon_url'   => 'dashicons-search'
	);
	acf_add_options_page( $args );
}

if ( function_exists( 'acf_add_local_field_group' ) ):

	acf_add_local_field_group( array(
		'key'                   => 'group_5c3835de8f634',
		'title'                 => 'Search Options',
		'fields'                => array(
			array(
				'key'               => 'field_5c3835e54911e',
				'label'             => 'Categories',
				'name'              => 'dev_search_categories',
				'type'              => 'radio',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'choices'           => array(
					'on'  => 'on',
					'off' => 'off',
				),
				'allow_null'        => 0,
				'other_choice'      => 0,
				'default_value'     => '',
				'layout'            => 'horizontal',
				'return_format'     => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key'               => 'field_5c383680e4b44',
				'label'             => 'Users',
				'name'              => 'dev_search_users',
				'type'              => 'radio',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'choices'           => array(
					'on'  => 'on',
					'off' => 'off',
				),
				'allow_null'        => 0,
				'other_choice'      => 0,
				'default_value'     => '',
				'layout'            => 'horizontal',
				'return_format'     => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key'               => 'field_5c383fbf547da',
				'label'             => 'Tags',
				'name'              => 'dev_search_tags',
				'type'              => 'radio',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'choices'           => array(
					'on'  => 'on',
					'off' => 'off',
				),
				'allow_null'        => 0,
				'other_choice'      => 0,
				'default_value'     => '',
				'layout'            => 'horizontal',
				'return_format'     => 'value',
				'save_other_choice' => 0,
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'acf-options-search-settings',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => 1,
		'description'           => 'Enable or disable search fields',
	) );

endif;