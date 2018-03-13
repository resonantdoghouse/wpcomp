<?php

function flexi_scripts() {
	/*
	 * Stylesheets
	 */
	wp_enqueue_style( 'flexi-fonts', 'https://fonts.googleapis.com/css?family=Istok+Web:400,700|Lora' );
	wp_enqueue_style( 'flexi-style', get_stylesheet_uri() );
	wp_enqueue_style( 'fullcalendar', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' );
	wp_enqueue_style( 'fullcalendar-print', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css' );

	/*
	 * Scripts
	 */
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'flexi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'flexi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'fullcalendar', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js', array('jquery', 'moment'), '20151215', true );
	wp_enqueue_script( 'flexi', get_template_directory_uri() . '/build/js/script.min.js', array('jquery', 'fullcalendar'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	wp_localize_script('flexi', 'flexi_vars', array(
			'posts' =>  get_posts( [
				'posts_per_page' => 5,
				'category' => 0
			])
		)
	);

}