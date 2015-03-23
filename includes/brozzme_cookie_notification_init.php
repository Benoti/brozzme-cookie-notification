<?php
/**
 * Created by PhpStorm.
 * User: benoti
 * Date: 19/02/15
 * Time: 09:27
 */

function bcn_pp_create(){

    $private_policy_page_content = bcn_pp_text_content();
    $private_policy_page_title = 'Private policy';
    $private_policy_page_post_name = 'private-policy';
    $private_policy_page_post_status = 'publish';
    $private_policy_page_post_author = '1';
    $private_policy_page_post_type = 'page';
    $private_policy_page_comment_status = 'closed';


    $pp_post = array(
        'post_content' => $private_policy_page_content, // The full text of the post.
        'post_name' => $private_policy_page_post_name, // The name (slug) for your post
        'post_title' => $private_policy_page_title, // The title of your post.
        'post_status' => $private_policy_page_post_status, // Default 'draft'.
        'post_type' => $private_policy_page_post_type, // Default 'post'.
        'post_author' => $private_policy_page_post_author, // The user ID number of the author. Default is the current user ID.
        'comment_status' => $private_policy_page_comment_status // Default is the option 'default_comment_status', or 'closed'.

    );

       $pid = wp_insert_post($pp_post);
        if(isset($pid)) {
           return $pid;
        }

}

function bcn_pp_text_content(){

    $output = '';

    $output .= 'This Privacy Policy governs the manner in which  collects, uses, maintains and discloses information collected from users
     (each, a "User") of the '.get_bloginfo('url').' website ("Site"). This privacy policy applies to the Site and all products and services offered by '.get_bloginfo('name');
    $output .= '<h3>Personal identification information</h3>

    We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, place an order, subscribe to the newsletter, fill out a form, and in connection with other activities, services, features or resources we make available on our Site.
    Users may be asked for, as appropriate, name, email address, phone number. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.

    <h3>Non-personal identification information</h3>

    We may collect non-personal identification information about Users whenever they interact with our Site.
    Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.
    ';
    $output .= '<h3>Web browser cookies</h3>

    Our Site may use "cookies" to enhance User experience. User\'s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them.
    User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.

    <h3>How we use collected information</h3>
    '.get_bloginfo('name').' may collect and use Users personal information for the following purposes:

        - To improve customer service
        Information you provide helps us respond to your customer service requests and support needs more efficiently.
        - To personalize user experience
        We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.
        - To improve our Site
        We may use feedback you provide to improve our products and services.
        - To process payments
        We may use the information Users provide about themselves when placing an order only to provide service to that order. We do not share this information with outside parties except to the extent necessary to provide the service.
        - To send periodic emails
    We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests.
    If User decides to opt-in to our mailing list, they will receive emails that may include company news, updates, related product or service information, etc.
    If at any time the User would like to unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email.

        <h3>How we protect your information</h3>

    We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.
';
    $output .= '<h3>Sharing your personal information</h3>

    We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.
    We may use third party service providers to help us operate our business and the Site or administer activities on our behalf, such as sending out newsletters or surveys.
    We may share your information with these third parties for those limited purposes provided that you have given us your permission.';
    $output .= '<h3>Third party websites</h3>

    Users may find advertising or other content on our Site that link to the sites and services of our partners, suppliers, advertisers, sponsors, licensors and other third parties.
    We do not control the content or links that appear on these sites and are not responsible for the practices employed by websites linked to or from our Site.
    In addition, these sites or services, including their content and links, may be constantly changing.
    These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Site, is subject to that website\'s own terms and policies.
    ';
    $output .= '<h3>Changes to this privacy policy</h3>

    '.get_bloginfo('name').' has the discretion to update this privacy policy at any time. When we do, we will revise the updated date at the bottom of this page.
    We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect.
    You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.

    <b>Your acceptance of these terms</b>

    By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site.
    Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.

    Contacting us

    If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at:
    '.get_bloginfo('name').'
    '.get_bloginfo('url').'
    '.get_bloginfo('name').'
    123, '.get_bloginfo('name').' Road
    Zip code City
    Country
    123-456-789
    123-456-789

    This document was last updated on '.date('l jS \of F Y h:i:s A').'

    Privacy policy generated by Cookie Notification by <a href="http://brozzme.com" target="_blank">Brozzme</a> base on generated private policy from http://www.generateprivacypolicy.com';

    return $output;
}