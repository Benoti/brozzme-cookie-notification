<?php
/**
 * Created by PhpStorm.
 * User: benoti
 * Date: 17/03/15
 * Time: 13:12
 */

function brozzme_cookie_notification_welcome_page(){

    ?>
    <div style="font-size:3.2vh;margin-bottom:15px;line-height: 3.7vh;padding-bottom: 15px;width: 80%;"><em><strong>Cookie Notification</strong></em> is a WordPress plugin allows you to inform users that your site uses cookies and to comply with the EU cookie law regulations. This plugin has been developped to improve the integration with no coding skills. A lot of settings options will blow yourself and definitly make you love this new law.</div>

    <div style="padding-bottom: 15px;width: 80%;">
    <em><strong>Cookie Notification</strong></em> plugin creates a small bar at the top or bottom of the website with a short message about cookies and accept, decline, and privacy policy buttons. Once a user has made the decision to either accept or decline, the <em><strong>Cookie Notification</strong></em> bar slides up, then disappears. <em><strong>Cookie Notification</strong></em> can be set up to work in a variety of ways. By default, it uses assumed consent. This means that when a user visits the website, cookies can be set as normal with no interruption. The <em><strong>Cookie Notification</strong></em> bar is still displayed to provide the user with options for cookies. It can also be set up to assume refusal. So when a user visits the website, until they press the accept button on the <em><strong>Cookie Notification</strong></em> bar, no cookies should be set. You can specify which buttons show on the <em><strong>Cookie Notification</strong></em> bar. The default is to show the accept and privacy policy buttons and no decline button. This way, assumed consent is used, and the user cannot opt out of cookies. If the user is unhappy about the use of cookies, they can simply leave the website. The <em><strong>Cookie Notification</strong></em> bar is also very easy to style and very quick way and easy meaning it can fit in with the website design and colour scheme.
    </div>
    <div style="background-color:#c5dec2;border-radius:3px;padding:20px;margin-bottom:10px">On the 26th of May 2012, the EU government decided it was necessary for every website available inside the EU to give visitors the option to allow or disable cookies. While most people saw this as unnecessary and a disruption to collecting analytical data, etc, the EU law was passed. <span>Install <em><strong>Cookie notification by Brozzme</strong></em> and your website complies with the Cookies Directive regulations !</span></div>

    <ul>
        <li>Multi tabbed options page,</li>
        <li>Auto-generated private policy page on activation,</li>
        <li>Select your text in examples or write your own notification text, accept button and many more,</li>
        <li>Activate or remove close button</li>
        <li>Fixed or default behaviour, top or bottom positioning, hide effects,</li>
        <li>Cookie lifetime,</li>
        <li>Default or custom template,</li>
    </ul>
    <em>Custom template allow you to modify :</em>
    <ul>
        <li>Font-size, font-color,</li>
        <li>Button text, button color, button border-radius,</li>
        <li>Etc...</li>
    </ul>
    This plugin have been tested up to WordPress 4.1.1

    This plugin is based on <a href="http://www.primebox.co.uk/projects/jquery-cookiebar/" target="_blank">cookieBar.js</a> for the cookies works, generated private policy page based on <a href="http://www.generateprivacypolicy.com" target="_blank">Generate private policy</a>.
    <h3>How to install <em>Cookie notification by Brozzme </em>?</h3>
    <h3>How to configure the plugin ?</h3>
<?php
    global $random_message;
    global $random_privatepolicy;
    global $random_acceptbutton;
    echo $random_message.$random_acceptbutton.$random_privatepolicy;
}