<?php
/**
 * Plugin Name: Brozzme Cookie notification
 * Plugin URI: http://brozzme.com/cookie-notifiation
 * Description: A simple implementation of the Law on Cookies for WordPress .
 * Version: 1.0.0
 * Author: Benoît Faure
 * Author URI: http://brozzme.com
 * Domain Path: /languages
 * Text Domain: brozzme-cookie-notification
 *
 * Settings options 1: b_cookie_general_settings
 * Settings options 2: b_cookie_notification_accept_settings
 * Settings options 3: b_cookie_notification_policy_settings
 * Settings options 4: b_cookie_notification_display_settings
 * Settings options 4: b_cookie_notification_cookies_settings
 *
 * settings array : array('b_cookie_general_settings', 'b_cookie_notification_accept_settings', 'b_cookie_notification_policy_settings', 'b_cookie_notification_display_settings');
 */




//ini_set('display_errors', 1);
defined( 'ABSPATH' ) OR exit;

(@__DIR__ == '__DIR__') && define('__DIR__', realpath(dirname(__FILE__)));

define("BCNPATH", __FILE__)  ;
//require_once __DIR__ .'/includes/hook_mce.php';

register_activation_hook(   __FILE__, 'brozzme_cookie_notification_plugin_activation' );
register_deactivation_hook( __FILE__, 'brozzme_cookie_notification_plugin_deactivation' );
register_uninstall_hook(    __DIR__ .'/uninstall.php', 'brozzme_cookie_notification_plugin_uninstall' );

// load options settings
$bcn_options = get_option('b_cookie_general_settings');
if($bcn_options['bcn_enable_cookie'] == 'false' && !is_admin()){
    return;
}

require_once __DIR__ .'/includes/brozzme_cookie_notification_init.php';
require_once( __DIR__ .'/includes/bcn_functions.php' );
require_once( __DIR__ .'/includes/bcn_options_settings.php' );

require_once( __DIR__ .'/includes/bcn_help.php' );


$random_notification_message = array(__('This website uses cookies to offer you a better browsing experience. Find out more, how we use these cookies on the private policy link','brozzme-cookie-notification'),
    __('By using our website, you agree to the use of our cookies.','brozzme-cookie-notification'),
    __('We use cookies to give the best possible experience on our website.','brozzme-cookie-notification'),
    __('Cookies on this site: Find out more about our cookies. If you continue to browse our site you are consenting on their use.','brozzme-cookie-notification'),
    __(get_bloginfo('name').' uses cookies. By browsing this site you are agreeing to our use of cookies.','brozzme-cookie-notification'),
    __(get_bloginfo('name').' websites use cookies. If you continue browsing the site you are agreeing to our use of cookies. For more details about cookies and how to manage them, see our cookie policy.','brozzme-cookie-notification'),
    __('To give you the best possible experience this site uses cookie, Continuing to use this website you agree to use of cookies.','brozzme-cookie-notification')
);
$random_privatepolicy_message = array(__('Private policy','brozzme-cookie-notification'),
    __(  'Cookie policy','brozzme-cookie-notification'),
    __( 'Read more','brozzme-cookie-notification'),
    __( 'Term of use','brozzme-cookie-notification'),
    __('Find out more here','brozzme-cookie-notification')
);

$random_acceptbutton_message = array(__('Ok','brozzme-cookie-notification'),
    __('Continue','brozzme-cookie-notification'),
    __('X','brozzme-cookie-notification')
);
$random_decline_message = array(__('Decline','brozzme-cookie-notification'),
    __('No','brozzme-cookie-notification'),
    __('I do not want','brozzme-cookie-notification')
);

$random_message = bcn_random_choice($random_notification_message);
$random_privatepolicy = bcn_random_choice($random_privatepolicy_message);
$random_acceptbutton = bcn_random_choice($random_acceptbutton_message);
$random_declinebutton = bcn_random_choice($random_decline_message);

//echo ($random_message);
function brozzme_cookie_notification_plugin_activation(){
/*
* options array
* array('b_cookie_general_settings', 'b_cookie_notification_accept_settings', 'b_cookie_notification_policy_settings', 'b_cookie_notification_display_settings', 'b_cookie_notification_cookies_settings' );
*
* Settings options 1: b_cookie_general_settings
* array( bcn_enable_cookie, bcn_template, bcn_background_color, bcn_text_color, bcn_notification_text, bcn_policyButton,bcn_policyButton_text, bcn_acceptText, )
*

*/

    if(!get_option('b_cookie_general_settings')) {

        //not present, so add
        $options = array(
            'bcn_enable_cookie'=> 'true', // set to 1 to enable plugin
            'bcn_template'=> 'false',
            'bcn_background_color'=> '#000',
            'bcn_text_color'=> '#FFF',
            'bcn_text_fontsize'=> '0.6em',
            'bcn_border_radius'=> 'true',
            'bcn_notification_text'=>  __('By using our website, you agree to the use of our cookies.','brozzme-cookie-notification'), //Message displayed on bar
            );

        add_option('b_cookie_general_settings', $options);

    }
/*
* Settings options 2: b_cookie_notification_accept_settings
*/

    if(!get_option('b_cookie_notification_accept_settings')) {
        //not present, so add

        $options = array(
            'bcn_acceptText'=> __('Ok','brozzme-cookie-notification'), //Text on accept/enable button
            'bcn_acceptText_bg_color'=> '#333',
            'bcn_acceptText_color'=> '#FFF',
            'bcn_acceptText_hover_bg_color'=> '#6b6b6b',
            'bcn_acceptText_hover_color'=> '#FFF',
            'bcn_declineButton'=> 'false',
            'bcn_declineText'=> 'Decline',
            'bcn_declineText_color'=> '#FFF',
            'bcn_declineText_bg_color'=> '#990000',
            'bcn_declineText_hover_bg_color'=> '#bb0000',
            'bcn_declineText_hover_color'=> '#FFF',
        );

        add_option('b_cookie_notification_accept_settings', $options);

    }
/*
* Settings options 3: b_cookie_notification_policy_settings

*/
    if(!get_option('b_cookie_notification_policy_settings')) {

/*
* Create private policy page
*/
        if(bcn_the_slug_exists('private-policy') == 'false'){
          $pid =  bcn_pp_create();
        }

        //not present, so add

        $options = array(
            'bcn_policyButton'=> 'true', //Set to true to show Privacy Policy button
            'bcn_policyButton_text'=> __('Private policy','brozzme-cookie-notification'), //Text on Privacy Policy button
            'bcn_close_button'=>'true',
            'bcn_policyButton_color'=> '#FFF',
            'bcn_policyButton_bg_color'=> '#333',
            'bcn_policyButton_hover_color'=>'#8B0000',
            'bcn_policyButton_hover_bg_color'=>'#999',
            'bcn_policyURL'=> get_bloginfo('url').'/private-policy/', //URL of Privacy Policy
            'bcn_policyPageID'=> $pid,
            'bcn_policyPage_del'=>'true'
        );

        add_option('b_cookie_notification_policy_settings', $options);

    }


/*
* Settings options 4: b_cookie_notification_display_settings
*/
    if(!get_option('b_cookie_notification_display_settings')) {
        //not present, so add
        $options = array(
          //  'bcn_expireDays'=> 365, //Number of days for cookieBar cookie to be stored for
            'bcn_fixed'=> true, //Set to true to add the class "fixed" to the cookie bar. Default CSS should fix the position
            'bcn_bottom'=> false, //Force CSS when fixed, so bar appears at bottom of website
            'bcn_effect'=> 'slide', //Options: slide, fade, hide
            'bcn_element'=> 'body', //Element to append/prepend cookieBar to. Remember "." for class or "#" for id.
            'bcn_append'=> false, //Set to true for cookieBar HTML to be placed at base of website. Actual position may change according to CSS
            'bcn_zindex'=> '9999', //Can be set in CSS, although some may prefer to set here
        );

        add_option('b_cookie_notification_display_settings', $options);

    }
/*
* Settings options 5: b_cookie_notification_cookies_settings
*/
    if(!get_option('b_cookie_notification_cookies_settings')) {
        //not present, so add
        $options = array(
            'bcn_expireDays'=> 365, //Number of days for cookieBar cookie to be stored for
            'bcn_autoEnable'=> true, //Set to true for cookies to be accepted automatically. Banner still shows
            'bcn_acceptOnContinue'=> false, //Set to true to silently accept cookies when visitor moves to another page
            'bcn_forceShow'=>false, //Force cookieBar to show regardless of user cookie preference


        );

        add_option('b_cookie_notification_cookies_settings', $options);

    }

}

// function to merge multiple options arrays into one
//
function globalize_bcn_options_name(){
    $option = array();
    $option_names =  array(
                'b_cookie_general_settings',
                'b_cookie_notification_accept_settings',
                'b_cookie_notification_policy_settings',
                'b_cookie_notification_display_settings',
                'b_cookie_notification_cookies_settings'
    );
    foreach($option_names as $option_name){
    $option += get_option($option_name);
    }

    return $option;
}

function brozzme_cookie_notification_plugin_deactivation(){
    $option = get_option('b_cookie_notification_policy_settings');
    if($option['bcn_policyPage_del']== 'true'){
        wp_delete_post($option['bcn_policyPageID'], true);
    }

    $options_names = array('b_cookie_general_settings', 'b_cookie_notification_accept_settings', 'b_cookie_notification_policy_settings', 'b_cookie_notification_display_settings', 'b_cookie_notification_cookies_settings');

    foreach($options_names as $option_name){
     delete_option($option_name);
        //  delete_option('b_cookie_general_settings');
    }



}

// add menu for configuration

add_action( 'admin_menu', 'brozzme_cookie_notification_add_admin_menu' );

function brozzme_cookie_notification_add_admin_menu(  ) {

    add_options_page('Cookie Notification', __('Cookie notification', 'brozzme-cookie-notification'), 'manage_options', 'brozzme-cookie-notification', 'bcn_options_page');

}

add_action( 'plugins_loaded', 'bcn_load_textdomain' );

/**
 * Load plugin textdomain.
 */
function bcn_load_textdomain() {
    load_plugin_textdomain( 'brozzme-cookie-notification', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
/**
 * plugin settings links
 */
add_filter('plugin_action_links', 'brozzme_cookie_notification_plugin_action_links', 10, 2);

function brozzme_cookie_notification_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        // The &quot;page&quot; query string value must be equal to the slug
        // of the Settings admin page we defined earlier, which in
        // this case equals &quot;myplugin-settings&quot;.
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=brozzme-cookie-notification">'.__('Settings', 'brozzme-cookie-notification').'</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}


add_action( 'wp_enqueue_scripts', 'b_cookie_notification_front_script',12 );

function b_cookie_notification_front_script(){

    wp_register_script(
        'cookie-notification-script',
        plugins_url( '/js/jquery.cookiebar.js', __FILE__ ),
        array( 'jquery' )
    );

   wp_enqueue_script( 'cookie-notification-script' );

    $option_bcn = globalize_bcn_options_name();

    wp_localize_script(
        'cookie-notification-script',
        'cookie_notification_setting', array(
            'message' => $option_bcn['bcn_notification_text'],
            'acceptButton'=> true, //Set to true to show accept/enable button
            'acceptText'=> $option_bcn['bcn_acceptText'], //Text on accept/enable button
            'declineButton'=> $option_bcn['bcn_declineButton'], //Set to true to show decline/disable button
            'declineText'=> $option_bcn['bcn_declineText'], //Text on decline/disable button
            'policyButton'=> $option_bcn['bcn_policyButton'], //Set to true to show Privacy Policy button
            'policyText'=> $option_bcn['bcn_policyButton_text'], //Text on Privacy Policy button
            'policyURL'=> $option_bcn['bcn_policyURL'], //URL of Privacy Policy
            'autoEnable'=> $option_bcn['bcn_autoEnable'], //Set to true for cookies to be accepted automatically. Banner still shows
            'acceptOnContinue'=> $option_bcn['bcn_acceptOnContinue'], //Set to true to silently accept cookies when visitor moves to another page
            'expireDays'=> $option_bcn['bcn_expireDays'], //Number of days for cookieBar cookie to be stored for
            'forceShow'=> $option_bcn['bcn_forceShow'], //Force cookieBar to show regardless of user cookie preference
            'barEffect'=> $option_bcn['bcn_effect'], //Options: slide, fade, hide
            'barElement'=> $option_bcn['bcn_element'], //Element to append/prepend cookieBar to. Remember "." for class or "#" for id.
            'barAppend'=> $option_bcn['bcn_append'], //Set to true for cookieBar HTML to be placed at base of website. Actual position may change according to CSS
            'barFixed'=> $option_bcn['bcn_fixed'], //Set to true to add the class "fixed" to the cookie bar. Default CSS should fix the position
            'barBottom'=> $option_bcn['bcn_bottom'], //Force CSS when fixed, so bar appears at bottom of website
            'barZindex'=> $option_bcn['bcn_zindex'], //Can be set in CSS, although some may prefer to set here
            'closedivbutton'=> $option_bcn['bcn_close_button']
        )
    );
    wp_enqueue_style(
        'cookie-notification-style',
        plugins_url( '/css/jquery.cookiebar.css', __FILE__ ),
        array(),
        '1.0.0'
    );
    wp_enqueue_style(
        'style',
        plugins_url( '/css/style_bcn.css', __FILE__ ),
        array(),
        '1.0.0'
    );
}
//add_action('the_content', 'wp_brozzme_test');
function wp_brozzme_test($content){

    $output = $content;
    $output .= 'cool';
    return $output;
}
// default or custom template for the cookie notification bar
if($bcn_options['bcn_template']== 'false') {
    add_action('wp_enqueue_scripts', 'brozzme_cookie_notification_enqueue_custom_style');
}

function brozzme_cookie_notification_enqueue_custom_style(){
    $option_bcn = globalize_bcn_options_name();
    wp_register_script(
        'cookie-notification-style',
        plugins_url( '/js/front-end-cookie-style.js', __FILE__ ),
        array( 'jquery' ),
        '1.1.0',
        false
    );

    wp_localize_script(
        'cookie-notification-style',
        'cookieCustomStyle', array(
             'bcn_background_color' => $option_bcn['bcn_background_color'],
             'bcn_text_color' => $option_bcn['bcn_text_color'],
             'bcn_text_fontsize' => $option_bcn['bcn_text_fontsize'],
             'bcn_border_radius' => $option_bcn['bcn_border_radius'],
             'bcn_acceptText_bg_color' => $option_bcn['bcn_acceptText_bg_color'],
             'bcn_acceptText_color' => $option_bcn['bcn_acceptText_color'],
             'bcn_acceptText_hover_bg_color' => $option_bcn['bcn_acceptText_hover_bg_color'],
             'bcn_acceptText_hover_color' => $option_bcn['bcn_acceptText_hover_color'],
             'bcn_declineText_bg_color' => $option_bcn['bcn_declineText_bg_color'],
             'bcn_declineText_color' => $option_bcn['bcn_declineText_color'],
             'bcn_declineText_hover_bg_color' => $option_bcn['bcn_declineText_hover_bg_color'],
             'bcn_declineText_hover_color' => $option_bcn['bcn_declineText_hover_color'],
             'bcn_policyButton_color' => $option_bcn['bcn_policyButton_color'],
             'bcn_policyButton_bg_color' => $option_bcn['bcn_policyButton_bg_color'],
             'bcn_policyButton_hover_color' => $option_bcn['bcn_policyButton_hover_color'],
             'bcn_policyButton_hover_bg_color' => $option_bcn['bcn_policyButton_hover_bg_color']
        )
    );

    wp_enqueue_script( 'cookie-notification-style' );
}

// admin color picker
add_action( 'admin_enqueue_scripts', 'brozzme_bcn_add_color_picker' );
function brozzme_bcn_add_color_picker( $hook ) {

    if( is_admin() ) {

        // Add the color-picker css file
        wp_enqueue_style( 'wp-color-picker' );
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'color-picker-custom', plugins_url( 'js/color-picker-custom.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

        wp_enqueue_script('copy-textarea', plugins_url('js/copy-textarea.js', __FILE__), array('jquery'), false, true);


        wp_enqueue_style('wp-selectric', plugins_url('css/selectric.css', __FILE__));
        wp_enqueue_script('wp-selectric-js', plugins_url('js/jquery.selectric.js', __FILE__), array('jquery'), false, true);

        wp_enqueue_style(
            'style',
            plugins_url( 'css/admin_style.css', __FILE__ ),
            array(),
            '1.0.0'
        );

    }
}


//add_action('the_content', 'noticecookie_view');

function noticecookie_view(){

    print_r($_COOKIE);



}


add_action('wp_head', 'set_notification_cookie');
function set_notification_cookie(){
   ?>
    <script type="text/javascript">
        (function ( $ ) {
        $(document).ready(function(){
            $.cookieBar({
            });
        });
        }( jQuery ) );
    </script>
<?php

}