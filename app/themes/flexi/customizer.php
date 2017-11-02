<?php

// function flexi_customize_register( $wp_customize ){
// 	flexi_bg_img_customizer_section( $wp_customize );
// }

// function flexi_bg_img_customizer_section( $wp_customize ){
// 	$wp_customize->add_setting( 'flexi_background_image_handle', array(
// 		'default'       =>  '',
// 		'transport'     =>  'refresh'
// 	));
// 	$wp_customize->add_section( 'flexi_bg_img_section', array(
// 		'title'         =>  __( 'Background Image', 'flexi' ),
// 		'priority'      =>  30
// 	));query_posts
// 	$wp_customize->add_control(
// 		new WP_Customize_Image_Control(
// 			$wp_customize,
// 			'flexi_bg_img_input',
// 			array(
// 				'label'          => __( 'Background Image', 'flexi' ),
// 				'section'        => 'flexi_bg_img_section',
// 				'settings'       => 'flexi_background_image_handle'
// 			)
// 		)
// 	);
// }