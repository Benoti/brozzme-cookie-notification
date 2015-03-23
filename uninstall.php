<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19/03/15
 * Time: 09:27
 */
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();

function brozzme_cookie_notification_plugin_uninstall(){
    $option_names =  array(
        'b_cookie_general_settings',
        'b_cookie_notification_accept_settings',
        'b_cookie_notification_policy_settings',
        'b_cookie_notification_display_settings',
        'b_cookie_notification_cookies_settings'
    );
    foreach($option_names as $option_name) {

        delete_option($option_name);

    }
}
