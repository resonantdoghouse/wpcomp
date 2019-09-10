<?php

// create custom plugin settings menu
add_action( 'admin_menu', 'jb_mailchimp_create_menu' );

function jb_mailchimp_create_menu() {

	//create new top-level menu
	add_menu_page( 'MailChimp Settings', 'MailChimp Settings',
		'administrator', __FILE__, 'jb_mailchimp_settings_page',
		plugins_url( '\..\../images/mailchimp-icon.png', __FILE__ ) );

	//call register settings function
	add_action( 'admin_init', 'register_jb_mailchimp_settings' );
}


function register_jb_mailchimp_settings() {
	//register our settings
	register_setting( 'jb-mailchimp-settings-group', 'jb_mailchimp_api_key' );
	register_setting( 'jb-mailchimp-settings-group', 'jb_mailchimp_test' );
	register_setting( 'jb-mailchimp-settings-group', 'jb_mailchimp_select_template' );
}

function jb_mailchimp_settings_page() {

	$api_key_set = false;
	if ( get_option( 'jb_mailchimp_api_key' ) ) {
		$api_key_set = true;
	}

	if ( $api_key_set ) {
		$api_key = get_option( 'jb_mailchimp_api_key' );
		jb_mailchimp_connect( $api_key );
	} else {
		_e( 'api key not set', 'jb-mailchimp' );
	}
	?>
    <div class="wrap">
        <h1>JB MailChimp</h1>

        <form method="post" action="options.php" class="jb-mailchimp-options-form">
            <div class="form-row">

				<?php settings_fields( 'jb-mailchimp-settings-group' ); ?>
				<?php do_settings_sections( 'jb-mailchimp-settings-group' ); ?>

                <label>MailChimp API Key
                    <input type="text" name="jb_mailchimp_api_key"
                           value="<?php echo esc_attr( get_option( 'jb_mailchimp_api_key' ) ); ?>"/>
                </label>

                <label>test
                    <input type="text" name="jb_mailchimp_test"
                           value="<?php echo esc_attr( get_option( 'jb_mailchimp_test' ) ); ?>"/>
                </label>

				<?php if ( $api_key_set ): ?>

                    <label>MailChimp Templates
                        <select name="jb_mailchimp_select_template">
							<?php load_template_options(); ?>
                        </select>
                    </label>
					<?php
					load_lists();
//					load_template_images();
					?>
				<?php endif; ?>
            </div>

            <div class="form-row">
                <div class="form-row__inner">
					<?php submit_button(); ?>
                </div>
            </div>

        </form>


    </div>
<?php } ?>