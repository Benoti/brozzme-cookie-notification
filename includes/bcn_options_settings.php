<?php
/**
 * Created by PhpStorm.
 * User: benoti
 * Date: 19/02/15
 * Time: 09:28
 *
 * Settings options 1: b_cookie_notification_settings
 * array(bcn_enable_cookie, bcn_notification_text, bcn_acceptText, bcn_policyButton, bcn_template, bcn_background_color, bcn_text_color, bcn_policyButton_text)
 * Settings options 2: b_cookie_notification_accept_settings
 * array(bcn_acceptText_bg_color, bcn_acceptText_color, bcn_acceptText_hover_bg_color, bcn_acceptText_hover_color)
 * Settings options 3: b_cookie_notification_policy_settings
 * array(bcn_policyButton_color, bcn_policyButton_hover_color, bcn_policyButton_hover_bg_color, bcn_policyURL)
 * Settings options 4: b_cookie_notification_display_settings
 * array(bcn_expireDays, bcn_fixed, bcn_bottom, bcn_effect, bcn_element, bcn_append, bcn_zindex)
 */

add_action( 'admin_init', 'brozzme_cookie_notification_settings_init' );

function brozzme_cookie_notification_settings_init(  ) {
    register_setting( 'brozzmeCookieNotificationGeneralSettings', 'b_cookie_general_settings' );
    register_setting( 'brozzmeCookieNotification', 'b_cookie_notification_settings' );
    register_setting( 'brozzmeCookieNotificationAcceptDecline', 'b_cookie_notification_accept_settings' );
    register_setting( 'brozzmeCookieNotificationDeclineTemplate', 'b_cookie_notification_decline_settings' );
    register_setting( 'brozzmeCookieNotificationPolicyTemplate', 'b_cookie_notification_policy_settings' );
    register_setting( 'brozzmeCookieNotificationDisplay', 'b_cookie_notification_display_settings' );
    register_setting( 'brozzmeCookieNotificationCookies', 'b_cookie_notification_cookies_settings' );

//general settings
    add_settings_section(
        'bcn_brozzmeCookieNotificationGeneralSettings_section',
        __( 'General settings option for Cookie Notification by Brozzme', 'brozzme-cookie-notification' ),
        'brozzme_cookie_notification_general_settings_section_callback',
        'brozzmeCookieNotificationGeneralSettings'
    );
            add_settings_field(
                'bcn_enable_cookie',
                __( 'Enable Cookie Notification', 'brozzme-cookie-notification' ),
                'bcn_enable_cookie_render',
                'brozzmeCookieNotificationGeneralSettings',
                'bcn_brozzmeCookieNotificationGeneralSettings_section'
            );
            add_settings_field(
                'bcn_notification_text',
                __( 'Notification text', 'brozzme-cookie-notification' ),
                'bcn_notification_text_render',
                'brozzmeCookieNotificationGeneralSettings',
                'bcn_brozzmeCookieNotificationGeneralSettings_section'
            );
            add_settings_field(
                'bcn_template',
                __( 'Default template', 'brozzme-cookie-notification' ),
                'bcn_template_render',
                'brozzmeCookieNotificationGeneralSettings',
                'bcn_brozzmeCookieNotificationGeneralSettings_section'
            );
            add_settings_field(
                'bcn_background_color',
                __( 'Choose background color', 'brozzme-cookie-notification' ),
                'bcn_background_color_render',
                'brozzmeCookieNotificationGeneralSettings',
                'bcn_brozzmeCookieNotificationGeneralSettings_section'
            );
            add_settings_field(
                'bcn_text_color',
                __( 'Text color', 'brozzme-cookie-notification' ),
                'bcn_text_color_render',
                'brozzmeCookieNotificationGeneralSettings',
                'bcn_brozzmeCookieNotificationGeneralSettings_section'
            );
            add_settings_field(
                'bcn_text_fontsize',
                __( 'Text font size', 'brozzme-cookie-notification' ),
                'bcn_text_fontsize_render',
                'brozzmeCookieNotificationGeneralSettings',
                'bcn_brozzmeCookieNotificationGeneralSettings_section'
            );
            add_settings_field(
                'bcn_border_radius',
                __( 'Apply border radius to buttons link', 'brozzme-cookie-notification' ),
                'bcn_border_radius_render',
                'brozzmeCookieNotificationGeneralSettings',
                'bcn_brozzmeCookieNotificationGeneralSettings_section'
            );
            add_settings_field(
                'bcn_close_button',
                __( 'Add close button', 'brozzme-cookie-notification' ),
                'bcn_close_button_render',
                'brozzmeCookieNotificationGeneralSettings',
                'bcn_brozzmeCookieNotificationGeneralSettings_section'
            );
// notification options
//    add_settings_section(
//        'bcn_brozzmeCookieNotification_section',
//        __( 'Settings options for Cookie Notification by Brozzme', 'brozzme-cookie-notification' ),
//        'brozzme_cookie_notification_settings_section_callback',
//        'brozzmeCookieNotification'
//    );

    // Accept / Decline OPTIONS
    add_settings_section(
        'bcn_brozzmeCookieNotificationAcceptDecline_section',
        __( 'Settings options for Cookie Notification by Brozzme', 'brozzme-cookie-notification' ),
        'brozzme_cookie_notification_accept_settings_section_callback',
        'brozzmeCookieNotificationAcceptDecline'
    );

            add_settings_field(
                'bcn_acceptText',
                __( 'Accept button text', 'brozzme-cookie-notification' ),
                'bcn_acceptText_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_acceptText_bg_color',
                __( 'Accept button background color', 'brozzme-cookie-notification' ),
                'bcn_acceptText_bg_color_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_acceptText_color',
                __( 'Accept button color', 'brozzme-cookie-notification' ),
                'bcn_acceptText_color_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_acceptText_hover_bg_color',
                __( 'Accept button hover background color', 'brozzme-cookie-notification' ),
                'bcn_acceptText_hover_bg_color_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_acceptText_hover_color',
                __( 'Accept button hover color', 'brozzme-cookie-notification' ),
                'bcn_acceptText_hover_color_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_declineButton',
                __( 'Enable Decline button', 'brozzme-cookie-notification' ),
                'bcn_declineButton_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_declineText',
                __( 'Decline button text', 'brozzme-cookie-notification' ),
                'bcn_declineText_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_declineText_bg_color',
                __( 'Decline button background color', 'brozzme-cookie-notification' ),
                'bcn_declineText_bg_color_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_declineText_color',
                __( 'Decline text color', 'brozzme-cookie-notification' ),
                'bcn_declineText_color_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_declineText_hover_bg_color',
                __( 'Decline button hover background color', 'brozzme-cookie-notification' ),
                'bcn_declineText_hover_bg_color_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );
            add_settings_field(
                'bcn_declineText_hover_color',
                __( 'Decline text hover color', 'brozzme-cookie-notification' ),
                'bcn_declineText_hover_color_render',
                'brozzmeCookieNotificationAcceptDecline',
                'bcn_brozzmeCookieNotificationAcceptDecline_section'
            );

    // POLICY BUTTON TEMPLATES OPTIONS
    add_settings_section(
        'bcn_brozzmeCookieNotificationPolicyTemplate_section',
        __( 'Settings options for Cookie Notification by Brozzme', 'brozzme-cookie-notification' ),
        'brozzme_cookie_notification_policy_settings_section_callback',
        'brozzmeCookieNotificationPolicyTemplate'
    );

            add_settings_field(
                'bcn_policyButton',
                __( 'Enable policy button', 'brozzme-cookie-notification' ),
                'bcn_policyButton_render',
                'brozzmeCookieNotificationPolicyTemplate',
                'bcn_brozzmeCookieNotificationPolicyTemplate_section'
            );
            add_settings_field(
                'bcn_policyButton_text',
                __( 'Text of the policy (read more) button', 'brozzme-cookie-notification' ),
                'bcn_policyButton_text_render',
                'brozzmeCookieNotificationPolicyTemplate',
                'bcn_brozzmeCookieNotificationPolicyTemplate_section'
            );
            add_settings_field(
                'bcn_policyButton_color',
                __( 'Policy button color', 'brozzme-cookie-notification' ),
                'bcn_policyButton_color_render',
                'brozzmeCookieNotificationPolicyTemplate',
                'bcn_brozzmeCookieNotificationPolicyTemplate_section'
            );
            add_settings_field(
                'bcn_policyButton_bg_color',
                __( 'Policy button background color', 'brozzme-cookie-notification' ),
                'bcn_policyButton_bg_color_render',
                'brozzmeCookieNotificationPolicyTemplate',
                'bcn_brozzmeCookieNotificationPolicyTemplate_section'
            );
            add_settings_field(
                'bcn_policyButton_hover_color',
                __( 'Hover policy button color', 'brozzme-cookie-notification' ),
                'bcn_policyButton_hover_color_render',
                'brozzmeCookieNotificationPolicyTemplate',
                'bcn_brozzmeCookieNotificationPolicyTemplate_section'
            );
            add_settings_field(
                'bcn_policyButton_hover_bg_color',
                __( 'Hover policy button background color', 'brozzme-cookie-notification' ),
                'bcn_policyButton_hover_bg_color_render',
                'brozzmeCookieNotificationPolicyTemplate',
                'bcn_brozzmeCookieNotificationPolicyTemplate_section'
            );
            add_settings_field(
                'bcn_policyURL',
                __( 'Url of the read more link', 'brozzme-cookie-notification' ),
                'bcn_policyURL_render',
                'brozzmeCookieNotificationPolicyTemplate',
                'bcn_brozzmeCookieNotificationPolicyTemplate_section'
            );
            add_settings_field(
                'bcn_policyPageID',
                __( 'Info about Private policy page', 'brozzme-cookie-notification' ),
                'bcn_policyPageID_render',
                'brozzmeCookieNotificationPolicyTemplate',
                'bcn_brozzmeCookieNotificationPolicyTemplate_section'
            );
            add_settings_field(
                'bcn_policyPage_del',
                __( 'Delete private policy page on desactivation', 'brozzme-cookie-notification' ),
                'bcn_policyPage_del_render',
                'brozzmeCookieNotificationPolicyTemplate',
                'bcn_brozzmeCookieNotificationPolicyTemplate_section'
            );
    // cookiebar display options
    add_settings_section(
        'bcn_brozzmeCookieNotificationDisplay_section',
        __( 'Settings options for Cookie Notification by Brozzme', 'brozzme-cookie-notification' ),
        'brozzme_cookie_notification_display_settings_section_callback',
        'brozzmeCookieNotificationDisplay'
    );

            add_settings_field(
                'bcn_fixed',
                __( 'Fixed', 'brozzme-cookie-notification' ),
                'bcn_fixed_render',
                'brozzmeCookieNotificationDisplay',
                'bcn_brozzmeCookieNotificationDisplay_section'
            );
            add_settings_field(
                'bcn_bottom',
                __( 'Bottom', 'brozzme-cookie-notification' ),
                'bcn_bottom_render',
                'brozzmeCookieNotificationDisplay',
                'bcn_brozzmeCookieNotificationDisplay_section'
            );
            add_settings_field(
                'bcn_effect',
                __( 'Effect', 'brozzme-cookie-notification' ),
                'bcn_effect_render',
                'brozzmeCookieNotificationDisplay',
                'bcn_brozzmeCookieNotificationDisplay_section'
            );

            add_settings_field(
                'bcn_element',
                __( 'Element to append/prepend cookie to', 'brozzme-cookie-notification' ),
                'bcn_element_render',
                'brozzmeCookieNotificationDisplay',
                'bcn_brozzmeCookieNotificationDisplay_section'
            );
            add_settings_field(
                'bcn_append',
                __( 'Set to true for bar HTML to be placed at base of website', 'brozzme-cookie-notification' ),
                'bcn_append_render',
                'brozzmeCookieNotificationDisplay',
                'bcn_brozzmeCookieNotificationDisplay_section'
            );

            add_settings_field(
                'bcn_zindex',
                __( 'Z-index', 'brozzme-cookie-notification' ),
                'bcn_zindex_render',
                'brozzmeCookieNotificationDisplay',
                'bcn_brozzmeCookieNotificationDisplay_section'
            );
    // cookiebar cookies options
    add_settings_section(
        'bcn_brozzmeCookieNotificationCookies_section',
        __( 'Cookies settings for Cookie Notification by Brozzme', 'brozzme-cookie-notification' ),
        'brozzme_cookie_notification_cookies_settings_section_callback',
        'brozzmeCookieNotificationCookies'
    );
            add_settings_field(
                'bcn_expireDays',
                __( 'Lifetime of the cookie', 'brozzme-cookie-notification' ),
                'bcn_expireDays_render',
                'brozzmeCookieNotificationCookies',
                'bcn_brozzmeCookieNotificationCookies_section'
            );
            add_settings_field(
                'bcn_autoEnable',
                __( 'Set to true for cookies to be accepted automatically. Banner still shows', 'brozzme-cookie-notification' ),
                'bcn_autoEnable_render',
                'brozzmeCookieNotificationCookies',
                'bcn_brozzmeCookieNotificationCookies_section'
            );
            add_settings_field(
                'bcn_acceptOnContinue',
                __( 'Set to true to silently accept cookies when visitor moves to another page', 'brozzme-cookie-notification' ),
                'bcn_acceptOnContinue_render',
                'brozzmeCookieNotificationCookies',
                'bcn_brozzmeCookieNotificationCookies_section'
            );
            add_settings_field(
                'bcn_forceShow',
                __( 'Force cookieBar to show regardless of user cookie preference', 'brozzme-cookie-notification' ),
                'bcn_forceShow_render',
                'brozzmeCookieNotificationCookies',
                'bcn_brozzmeCookieNotificationCookies_section'
            );
// 'bcn_autoEnable'=> true, // Set to true for cookies to be accepted automatically. Banner still shows
//         'bcn_acceptOnContinue'=> false, //Set to true to silently accept cookies when visitor moves to another page
//         'bcn_forceShow'=>false, //Force cookieBar to show regardless of user cookie preference

    add_settings_section(
        'bcn_brozzmeCookieNotificationHelp_section',
        __( 'Help for Cookie Notification by Brozzme', 'brozzme-cookie-notification' ),
        'brozzme_cookie_notification_help_section_callback',
        'brozzmeCookieNotificationHelp'
    );
            add_settings_field(
                'bcn_help',
                __( 'Help', 'brozzme-cookie-notification' ),
                'bcn_help_render',
                'brozzmeCookieNotificationHelp',
                'bcn_brozzmeCookieNotificationHelp_section'
            );

}
/*
* Settings options 1: b_cookie_general_settings
* array(bcn_enable_cookie, bcn_template, bcn_background_color, bcn_text_color, bcn_text_fontsize, bcn_border_radius, bcn_close_button)
* Settings options 2: b_cookie_notification_settings
* array(bcn_notification_text, bcn_acceptText, bcn_policyButton, bcn_policyButton_text)
* Settings options 3: b_cookie_notification_accept_settings
* array(bcn_acceptText_bg_color, bcn_acceptText_color, bcn_acceptText_hover_bg_color, bcn_acceptText_hover_color)
* Settings options 4: b_cookie_notification_policy_settings
* array(bcn_policyButton_color, bcn_policyButton_hover_color, bcn_policyButton_hover_bg_color, bcn_policyURL)
* Settings options 5: b_cookie_notification_display_settings
* array(bcn_expireDays, bcn_fixed, bcn_bottom, bcn_effect, bcn_element, bcn_append, bcn_zindex)
*/

// start b_cookie_general_settings

function bcn_enable_cookie_render(  ) {

    $options = get_option( 'b_cookie_general_settings' );
    ?>
    <select name="b_cookie_general_settings[bcn_enable_cookie]">
        <option value="true" <?php if ( $options['bcn_enable_cookie'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_enable_cookie'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>

    </select>
<?php

}
function bcn_notification_text_render(  ){
    global $random_notification_message;
    $options = get_option( 'b_cookie_general_settings' );

    $output = '';
    foreach($random_notification_message as $key=>$message){
        $output .= '<option value="'.$message.'">'.$message.'</option>';
    }
    ?>
    <label for="random_message"><?php _e('Select a message', 'brozzme-cookie-notification');?></label><br/><br/>
    <select name="random_message" id="random_message" style="width:450px;"><?php echo $output; ?></select>
    <br/>
    <label for="random_message"><?php _e('Customize the message', 'brozzme-cookie-notification');?></label><br/><br/>
    <textarea name="b_cookie_general_settings[bcn_notification_text]" id="bcn_notification_text" class="small-text" cols="50" rows="5">
<?php echo $options['bcn_notification_text']; ?>
    </textarea>
<?php
}
function bcn_template_render( ) {

    $options = get_option( 'b_cookie_general_settings' );
    ?>
    <select name="b_cookie_general_settings[bcn_template]">
        <option value="true" <?php if ( $options['bcn_template'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Default', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_template'] =='false' ) echo 'selected="selected"'; ?>><?php _e( 'Custom', 'brozzme-cookie-notification' );?></option>

    </select>
<?php
}
function bcn_background_color_render(  ){

    $options = get_option( 'b_cookie_general_settings' );
    ?>
    <input type='text' name='b_cookie_general_settings[bcn_background_color]' value='<?php echo $options['bcn_background_color']; ?>' class='color-field'>
<?php

}
function bcn_text_color_render(  ){

    $options = get_option( 'b_cookie_general_settings' );
    ?>
    <input type='text' name='b_cookie_general_settings[bcn_text_color]' value='<?php echo $options['bcn_text_color']; ?>' class='color-field'>
<?php

}
function bcn_text_fontsize_render( ) {

    $options = get_option( 'b_cookie_general_settings' );
    ?>
    <select name="b_cookie_general_settings[bcn_text_fontsize]">
        <option value="0.6em" <?php if ( $options['bcn_text_fontsize'] == '0.6em' ) echo 'selected="selected"'; ?>>0.6 em</option>
        <option value="0.8em" <?php if ( $options['bcn_text_fontsize'] == '0.8em' ) echo 'selected="selected"'; ?>>0.8 em</option>
        <option value="1em" <?php if ( $options['bcn_text_fontsize'] == '1em' ) echo 'selected="selected"'; ?>>1 em</option>
        <option value="1.2em" <?php if ( $options['bcn_text_fontsize'] == '1.2em' ) echo 'selected="selected"'; ?>>1.2 em</option>

    </select>
<?php
}

function bcn_border_radius_render( ) {

    $options = get_option( 'b_cookie_general_settings' );
    ?>
    <select name="b_cookie_general_settings[bcn_border_radius]">
        <option value="true" <?php if ( $options['bcn_border_radius'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_border_radius'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>

    </select>
<?php
}

function bcn_close_button_render(){
    $options = get_option( 'b_cookie_general_settings' );
    ?>
    <select name="b_cookie_general_settings[bcn_close_button]">
        <option value="true" <?php if ( $options['bcn_close_button'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_close_button'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>

    </select>
<?php
}
// end general settings

// start accept/decline settings
function bcn_acceptText_render(  ) {
    global $random_acceptbutton_message;
    $options = get_option( 'b_cookie_notification_accept_settings' );
    $output = '';
    foreach($random_acceptbutton_message as $key=>$message){
        $output .= '<option value="'.$message.'">'.$message.'</option>';
    }
?>
    <label for="random_message"><?php _e('Select a button message', 'brozzme-cookie-notification');?></label><br/><br/>
    <select name="random_acceptText" id="random_acceptText" style="width:450px;"><?php echo $output; ?></select>
    <br/>
    <label for="random_message"><?php _e('Customize the button message', 'brozzme-cookie-notification');?></label><br/><br/>
    <input size="50" type='text' id ='bcn_acceptText' name='b_cookie_notification_accept_settings[bcn_acceptText]' value='<?php echo $options['bcn_acceptText']; ?>'>
<?php

}

// ACCEPT AND DECLINE BUTTON OPTIONS FUNCTIONS
//Settings options 2: b_cookie_notification_accept_settings

function bcn_acceptText_color_render(  ){

    $options = get_option( 'b_cookie_notification_accept_settings' );
    ?>
    <input type='text' name='b_cookie_notification_accept_settings[bcn_acceptText_color]' value='<?php echo $options['bcn_acceptText_color']; ?>' class='color-field'>
<?php

}
function bcn_acceptText_bg_color_render(){
    $options = get_option( 'b_cookie_notification_accept_settings' );
    ?>
    <input type='text' name='b_cookie_notification_accept_settings[bcn_acceptText_bg_color]' value='<?php echo $options['bcn_acceptText_bg_color']; ?>' class='color-field'>
<?php


}
function bcn_acceptText_hover_bg_color_render(  ){

    $options = get_option( 'b_cookie_notification_accept_settings' );
    ?>
    <input type='text' name='b_cookie_notification_accept_settings[bcn_acceptText_hover_bg_color]' value='<?php echo $options['bcn_acceptText_hover_bg_color']; ?>' class='color-field'>
<?php

}
function bcn_acceptText_hover_color_render(  ){

    $options = get_option( 'b_cookie_notification_accept_settings' );
    ?>
    <input type='text' name='b_cookie_notification_accept_settings[bcn_acceptText_hover_color]' value='<?php echo $options['bcn_acceptText_hover_color']; ?>' class='color-field'>
<?php

}
function bcn_declineButton_render( ) {

    $options = get_option( 'b_cookie_notification_accept_settings' );
    ?>
    <select name="b_cookie_notification_accept_settings[bcn_declineButton]">
        <option value="true" <?php if ( $options['bcn_declineButton'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_declineButton'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>

    </select>
<?php
}
function bcn_declineText_render(){
    global $random_decline_message;
    $options = get_option( 'b_cookie_notification_accept_settings' );

    $output = '';
    foreach($random_decline_message as $key=>$message){
        $output .= '<option value="'.$message.'">'.$message.'</option>';
    }

    ?>
    <label for="random_message"><?php _e('Select a button message', 'brozzme-cookie-notification');?></label><br/><br/>
    <select name="random_declineText" id="random_declineText" style="width:450px;"><?php echo $output; ?></select>
    <br/>
    <label for="random_decline"><?php _e('Customize the decline button message', 'brozzme-cookie-notification');?></label><br/><br/>
    <input type='text'  class="bcn-input" id='bcn_declineText' name='b_cookie_notification_accept_settings[bcn_declineText]' value='<?php echo esc_attr($options['bcn_declineText']); ?>'>
<?php

}
function bcn_declineText_color_render(  ){

    $options = get_option( 'b_cookie_notification_accept_settings' );
    ?>
    <input type='text' name='b_cookie_notification_accept_settings[bcn_declineText_color]' value='<?php echo $options['bcn_declineText_color']; ?>' class='color-field'>
<?php

}
function bcn_declineText_bg_color_render(){
    $options = get_option( 'b_cookie_notification_accept_settings' );
    ?>
    <input type='text' name='b_cookie_notification_accept_settings[bcn_declineText_bg_color]' value='<?php echo $options['bcn_declineText_bg_color']; ?>' class='color-field'>
<?php


}
function bcn_declineText_hover_bg_color_render(  ){

    $options = get_option( 'b_cookie_notification_accept_settings' );
    ?>
    <input type='text' name='b_cookie_notification_accept_settings[bcn_declineText_hover_bg_color]' value='<?php echo $options['bcn_declineText_hover_bg_color']; ?>' class='color-field'>
<?php

}
function bcn_declineText_hover_color_render(  ){

    $options = get_option( 'b_cookie_notification_accept_settings' );
    ?>
    <input type='text' name='b_cookie_notification_accept_settings[bcn_declineText_hover_color]' value='<?php echo $options['bcn_declineText_hover_color']; ?>' class='color-field'>
<?php

}


// PRIVACY BUTTON OPTIONS
// Settings options 3: b_cookie_notification_policy_settings
// array(bcn_policyButton_color, bcn_policyButton_hover_color, bcn_policyButton_hover_bg_color, bcn_policyURL)
function bcn_policyButton_render( ) {

    $options = get_option( 'b_cookie_notification_policy_settings' );
    ?>
    <select name="b_cookie_notification_policy_settings[bcn_policyButton]">
        <option value="true" <?php if ( $options['bcn_policyButton'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_policyButton'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>

    </select>
<?php
}

function bcn_policyButton_text_render(){
    global $random_privatepolicy_message;
    $options = get_option( 'b_cookie_notification_policy_settings' );

    $output = '';
    foreach($random_privatepolicy_message as $key=>$message){
        $output .= '<option value="'.$message.'">'.$message.'</option>';
    }

    ?>
    <label for="random_message"><?php _e('Select a button message', 'brozzme-cookie-notification');?></label><br/><br/>
    <select name="random_policyButton" id="random_policyButton" style="width:450px;"><?php echo $output; ?></select>
    <br/>
    <label for="random_message"><?php _e('Customize the button message', 'brozzme-cookie-notification');?></label><br/><br/>
    <input type='text'  class="bcn-input" id='bcn_policyButton_text' name='b_cookie_notification_policy_settings[bcn_policyButton_text]' value='<?php echo esc_attr($options['bcn_policyButton_text']); ?>'>
<?php

}
function bcn_policyButton_color_render(  ){

    $options = get_option( 'b_cookie_notification_policy_settings' );
    ?>
    <input type='text' name='b_cookie_notification_policy_settings[bcn_policyButton_color]' value='<?php echo $options['bcn_policyButton_color']; ?>' class='color-field'>
<?php

}
function bcn_policyButton_bg_color_render(  ){

    $options = get_option( 'b_cookie_notification_policy_settings' );
    ?>
    <input type='text' name='b_cookie_notification_policy_settings[bcn_policyButton_bg_color]' value='<?php echo $options['bcn_policyButton_bg_color']; ?>' class='color-field'>
<?php

}

function bcn_policyButton_hover_color_render(  ){

    $options = get_option( 'b_cookie_notification_policy_settings' );
    ?>
    <input type='text' name='b_cookie_notification_policy_settings[bcn_policyButton_hover_color]' value='<?php echo $options['bcn_policyButton_hover_color']; ?>' class='color-field'>
<?php

}

function bcn_policyButton_hover_bg_color_render(  ){

    $options = get_option( 'b_cookie_notification_policy_settings' );
    ?>
    <input type='text' name='b_cookie_notification_policy_settings[bcn_policyButton_hover_bg_color]' value='<?php echo $options['bcn_policyButton_hover_bg_color']; ?>' class='color-field'>
<?php

}

function bcn_policyURL_render(  ){

    $options = get_option( 'b_cookie_notification_policy_settings' );
    ?>
    <input class="bcn-input" type='text' name='b_cookie_notification_policy_settings[bcn_policyURL]' value='<?php echo $options['bcn_policyURL']; ?>'>
    <br/><i><?php _e('i.e:','brozzme-cookie-notification');?> http://domain.com/private-policy/</i>
<?php

}

function bcn_policyPageID_render(){
    $options = get_option( 'b_cookie_notification_policy_settings' );
    ?>
    <p></span><a href="<?php echo get_permalink( $options['bcn_policyPageID'] ); ?>"><?php _e('Display','brozzme-cookie-notification');?></a> <span class"edit"><a href="./post.php?post=<?php echo $options['bcn_policyPageID']; ?>&action=edit"><?php _e('Modify','brozzme-cookie-notification');?></a></span></p>
    <p><?php _e('Put the new page ID for your private policy rules, according to the url of the read more link.','brozzme-cookie-notification');?></p>
    <input type='text' name='b_cookie_notification_policy_settings[bcn_policyPageID]' value='<?php echo $options['bcn_policyPageID']; ?>'>
<?php

}
function bcn_policyPage_del_render(  ) {

    $options = get_option( 'b_cookie_notification_policy_settings' );
    ?>
    <select name="b_cookie_notification_policy_settings[bcn_policyPage_del]">
        <option value="true" <?php if ( $options['bcn_policyPage_del'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_policyPage_del'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>

    </select>
<?php

}
// COOKIE NOTIFICATION BEHAVIOUR OPTIONS
// Settings options 4: b_cookie_notification_display_settings
// array(bcn_fixed, bcn_bottom, bcn_effect, bcn_element, bcn_append, bcn_zindex)


function bcn_effect_render (){
    $options = get_option( 'b_cookie_notification_display_settings' );
    ?>
    <select name="b_cookie_notification_display_settings[bcn_effect]">
        <option value="slide" <?php if ( $options['bcn_effect'] == 'slide' ) echo 'selected="selected"'; ?>><?php _e( 'Slide', 'brozzme-cookie-notification' );?></option>
        <option value="fade" <?php if ( $options['bcn_effect'] == 'fade' ) echo 'selected="selected"'; ?>><?php _e( 'Fade', 'brozzme-cookie-notification' );?></option>
        <option value="hide" <?php if ( $options['bcn_effect'] == 'hide' ) echo 'selected="selected"'; ?>><?php _e( 'Hide', 'brozzme-cookie-notification' );?></option>
    </select>
<?php
}
function bcn_element_render (){
    $options = get_option( 'b_cookie_notification_display_settings' );
    ?>
    <input type='text' name='b_cookie_notification_display_settings[bcn_element]' value='<?php echo $options['bcn_element']; ?>'>
    <p><i>Remember "." for class or "#" for id.</i></p>
<?php

}
function bcn_append_render (){
    $options = get_option( 'b_cookie_notification_display_settings' );
    ?>
    <select name="b_cookie_notification_display_settings[bcn_append]">
        <option value="true" <?php if ( $options['bcn_append'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_append'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No (default)', 'brozzme-cookie-notification' );?></option>
        <p><i><?php _e('Set to Yes, HTML will be placed at base of website, actual position may change according to CSS','brozzme-cookie-notification');?></i></p>
    </select>
<?php
}
function bcn_fixed_render (){
    $options = get_option( 'b_cookie_notification_display_settings' );
    ?>
    <select name="b_cookie_notification_display_settings[bcn_fixed]">
        <option value="true" <?php if ( $options['bcn_fixed'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_fixed'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>
       </select>
<?php
}
function bcn_bottom_render (){
    $options = get_option( 'b_cookie_notification_display_settings' );
    ?>
    <select name="b_cookie_notification_display_settings[bcn_bottom]">
        <option value="true" <?php if ( $options['bcn_bottom'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_bottom'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>
    </select>
<?php
}
function bcn_zindex_render (){
    $options = get_option( 'b_cookie_notification_display_settings' );
    ?>
    <input type='text' name='b_cookie_notification_display_settings[bcn_zindex]' value='<?php echo $options['bcn_zindex']; ?>'>

<?php
}

// COOKIE NOTIFICATION COOKIES BEHAVIOUR OPTIONS
// Settings options 5: b_cookie_notification_cookies_settings
// array(bcn_expireDays, bcn_fixed, bcn_bottom, bcn_effect, bcn_element, bcn_append, bcn_zindex)

function bcn_expireDays_render (){
    $options = get_option( 'b_cookie_notification_cookies_settings' );
    ?>
    <select name="b_cookie_notification_cookies_settings[bcn_expireDays]">
        <option value="365" <?php if ( $options['bcn_expireDays'] == 365 ) echo 'selected="selected"'; ?>><?php _e( 'Default (1 year)', 'brozzme-cookie-notification' );?></option>
        <option value="190" <?php if ( $options['bcn_expireDays'] == 190 ) echo 'selected="selected"'; ?>><?php _e( '190 days', 'brozzme-cookie-notification' );?></option>
        <option value="30" <?php if ( $options['bcn_expireDays'] == 30 ) echo 'selected="selected"'; ?>><?php _e( '90 days', 'brozzme-cookie-notification' );?></option>
        <option value="90" <?php if ( $options['bcn_expireDays'] == 90 ) echo 'selected="selected"'; ?>><?php _e( '30 days', 'brozzme-cookie-notification' );?></option>
    </select>
<?php
}
function bcn_autoEnable_render(){
    $options = get_option( 'b_cookie_notification_cookies_settings' );
    ?>
    <select name="b_cookie_notification_cookies_settings[bcn_autoEnable]">
        <option value="true" <?php if ( $options['bcn_autoEnable'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_autoEnable'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>
    </select>
<?php
}
function bcn_acceptOnContinue_render(){
    $options = get_option( 'b_cookie_notification_cookies_settings' );
    ?>
    <select name="b_cookie_notification_cookies_settings[bcn_acceptOnContinue]">
        <option value="true" <?php if ( $options['bcn_acceptOnContinue'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_acceptOnContinue'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>
    </select>
<?php
}
function bcn_forceShow_render(){
    $options = get_option( 'b_cookie_notification_cookies_settings' );
    ?>
    <select name="b_cookie_notification_cookies_settings[bcn_forceShow]">
        <option value="true" <?php if ( $options['bcn_forceShow'] == 'true' ) echo 'selected="selected"'; ?>><?php _e( 'Yes', 'brozzme-cookie-notification' );?></option>
        <option value="false" <?php if ( $options['bcn_forceShow'] == 'false' ) echo 'selected="selected"'; ?>><?php _e( 'No', 'brozzme-cookie-notification' );?></option>
    </select>
<?php
}

function bcn_help_render (){

}

function brozzme_cookie_notification_general_settings_section_callback(  ) {

    echo __( 'General settings', 'brozzme-cookie-notification' );

}

function brozzme_cookie_notification_accept_settings_section_callback(  ) {

    echo __( 'Manage accept button settings for ', 'brozzme-cookie-notification' ).' '.get_bloginfo('name');

}
function brozzme_cookie_notification_policy_settings_section_callback(  ) {

    echo __( 'Manage policy settings for ', 'brozzme-cookie-notification' ).' '.get_bloginfo('name');

}

function brozzme_cookie_notification_help_section_callback(  ) {

    echo __( 'Help / FAQ ', 'brozzme-cookie-notification' );
    echo brozzme_cookie_notification_welcome_page();

}

function brozzme_cookie_notification_display_settings_section_callback(){
    echo __( 'Manage Cookie Notification options settings ', 'brozzme-cookie-notification' );

}
function brozzme_cookie_notification_cookies_settings_section_callback(){
    echo __( 'Manage Cookie Notification cookies settings ', 'brozzme-cookie-notification' );

}

function bcn_options_page(  ) {

    ?>
    <div class="wrap">


        <h2>Brozzme Cookie notification</h2>
        <?php

        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'general_settings';
        ?>

        <h2 class="nav-tab-wrapper">
            <a href="?page=brozzme-cookie-notification&tab=general_settings" class="nav-tab <?php echo $active_tab == 'general_settings' ? 'nav-tab-active' : ''; ?>">General settings</a>
           <a href="?page=brozzme-cookie-notification&tab=accept_template_options" class="nav-tab <?php echo $active_tab == 'accept_template_options' ? 'nav-tab-active' : ''; ?>">Accept / Decline</a>
            <a href="?page=brozzme-cookie-notification&tab=policy_template_options" class="nav-tab <?php echo $active_tab == 'policy_template_options' ? 'nav-tab-active' : ''; ?>">Policy template</a>
            <a href="?page=brozzme-cookie-notification&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Display</a>
            <a href="?page=brozzme-cookie-notification&tab=cookies_options" class="nav-tab <?php echo $active_tab == 'cookies_options' ? 'nav-tab-active' : ''; ?>">Cookies Options</a>
            <a href="?page=brozzme-cookie-notification&tab=help_options" class="nav-tab <?php echo $active_tab == 'help_options' ? 'nav-tab-active' : ''; ?>">Help</a>
        </h2>
        <form action='options.php' method='post'>
        <?php
        if( $active_tab == 'display_options' ) {
            settings_fields('brozzmeCookieNotificationDisplay');
            do_settings_sections('brozzmeCookieNotificationDisplay');

        }
        elseif( $active_tab == 'accept_template_options' ) {
                settings_fields('brozzmeCookieNotificationAcceptDecline');
                do_settings_sections('brozzmeCookieNotificationAcceptDecline');

            }
         elseif( $active_tab == 'policy_template_options' ) {
            settings_fields('brozzmeCookieNotificationPolicyTemplate');
            do_settings_sections('brozzmeCookieNotificationPolicyTemplate');

        }
        elseif( $active_tab == 'cookies_options' ) {
            settings_fields('brozzmeCookieNotificationCookies');
            do_settings_sections('brozzmeCookieNotificationCookies');

        }
        elseif( $active_tab == 'help_options' ) {
            settings_fields('brozzmeCookieNotificationHelp');
           // do_settings_sections('brozzmeCookieNotificationHelp');

        }
       
        else {
            settings_fields('brozzmeCookieNotificationGeneralSettings');
            do_settings_sections('brozzmeCookieNotificationGeneralSettings');
          }
            submit_button();
        ?>

    </form>
    </div>
    <?php


 $options = globalize_bcn_options_name();

        ?>
    <pre ><?php var_dump($options);?></pre>
    <?php
echo count($options);
  //  echo '<h3 class="update">'.$options['bcn_notification_text'].'</h3>';

  //  brozzme_cookie_notification_welcome_page();
}

