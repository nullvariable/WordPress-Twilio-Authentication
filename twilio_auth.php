<?php
/*
Plugin Name: Two Factor Authentication with Twilio
Description: API implmentaion allowing two-factor authentication via Twilio
Version: 0.1
Author: Nullvariable Web Consulting
Author URI: http://www.nullvariable.com
*/

/**
 * Queue our WordPress hooks
 */
add_action('admin_menu', 'twilio_auth_opts_page');
add_action( 'admin_init', 'twilio_auth_register_settings' );

function twilio_auth_register_settings() { // whitelist options
  register_setting( 'twilio-auth', 'twilio_auth_AccountSid' );
  register_setting( 'twilio-auth', 'twilio_auth_AuthToken' );
}

/**
 * Add our config options page to WordPress
 */
function twilio_auth_opts_page() {
  add_options_page('Twilio Two Factor','Twilio Two Factor', 'update_core', 'twilio-auth', 'twilio_auth_opts_page_render');
}

function twilio_auth_opts_page_render() {
	print '<div class="wrap">';
	print "<h2>" . __( 'Twilio Auth Settings', 'twilio-auth-settings-page' ) . "</h2>";
	print '<form method="post" action="options.php">';
	settings_fields( 'twilio-auth' );
	do_settings_fields( 'twilio-auth' ); ?>
	<table class="form-table">
        <tr valign="top">
        <th scope="row"><?php __('Twilio AccountSid'); ?></th>
        <td><input type="text" name="twilio_auth_AccountSid" value="<?php echo get_option('twilio_auth_AccountSid'); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row"><?php __('Twilio AuthToken'); ?></th>
        <td><input type="text" name="twilio_auth_AuthToken" value="<?php echo get_option('twilio_auth_AuthToken'); ?>" /></td>
        </tr>
    </table>
	<p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>
	</form><?php
	print '</div>';
}


