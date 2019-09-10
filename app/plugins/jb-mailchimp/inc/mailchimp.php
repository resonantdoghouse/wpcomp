<?php

require_once( __DIR__ . "../../vendor/autoload.php" );

use \DrewM\MailChimp\MailChimp;

$MailChimp = '';

function jb_mailchimp_connect( $api_key ) {
	_e( 'api key is set connecting to MailChimp', 'jb-mailchimp' );
	global $MailChimp;

	$MailChimp = new MailChimp( $api_key );

	d( $MailChimp );
//	d($MailChimp->getLastError());
	?>

	<?php
//	d($MailChimp);

	function load_lists() {
		global $MailChimp;
		$result = $MailChimp->get( 'lists' );
		$lists  = $result['lists'];
		echo "<ul>";
		foreach ( $lists as $list ) {
			echo "<li><strong>";
			_e( "list name: ", "jb-mailchimp" );
			echo "</strong>";
			echo $list['name'];
			echo "<strong>";
			_e( "subscribers: ", "jb-mailchimp" );
			echo "</strong>";
			echo "{$list['stats']['member_count']}";
			echo "</li>";
		}
		echo "</ul>";
	}


//	load_lists($MailChimp);
//	load_templates();
}


function load_template_options() {
	global $MailChimp;
	$templates         = array();
	$response          = $MailChimp->get( 'templates' );
	$templates         = $response['templates'];
	$selected_template = get_option( 'jb_mailchimp_select_template' );
//	 d($selected_template);
	foreach ( $templates as $template ) {
		if ( $template['name'] == $selected_template ) {
			echo "<option selected data-template-id='{$template['id']}' value='{$template['name']}'>
					{$template['name']}</option>";
		} else {
			echo "<option data-template-id='{$template['id']}' value='{$template['name']}'>
					{$template['name']}</option>";
		}
	}
// d($templates);
}

function load_template_images() {
	global $MailChimp;
	$templates = array();
	$response  = $MailChimp->get( 'templates' );
	$templates = $response['templates'];
	echo "<div class='mc-template-imgs'>";
	foreach ( $templates as $template ) {
		echo "<img class='mc-template-img' src='{$template['thumbnail']}'/>";
	}
	echo "</div>";
// d($templates);
}



