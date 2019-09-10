<?php

function jb_modal_footer_script() {

	$modal_script = get_field( 'jb_modal_embed_code', 'option' );

	$modal = "<div class='jb-modal'>";
	$modal .= $modal_script;
	$modal .= "</div>";

	echo $modal;
}

//add_action('wp_footer', 'jb_modal_footer_script');