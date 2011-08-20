<?php
/*
Plugin Name: Two Factor Authentication with Twilio
Description: API implmentaion allowing two-factor authentication via Twilio
Version: 0.1
Author: Nullvariable Web Consulting
Author URI: http://www.nullvariable.com
*/


/**
 * Add our config options page to WordPress
 */
add_action('admin_menu', 'twilio_auth_opts_page');

function twilio_auth_opts_page() {
  add_options_page('Twilio Two Factor','Twilio Two Factor', 'update_core', 'twilio-auth', 'twilio_auth_opts_page_render');
}

function twilio_auth_opts_page_render() {
	print '<div class="wrap">';
	print "<h2>" . __( 'Twilio Auth Settings', 'twilio-auth-settings-page' ) . "</h2>";
	print '</div>';
}
