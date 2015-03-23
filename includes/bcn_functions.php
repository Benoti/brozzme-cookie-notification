<?php
/**
 * Created by PhpStorm.
 * User: benoti
 * Date: 11/03/15
 * Time: 09:47
 */

function bcn_the_slug_exists($post_name) {
    global $wpdb;
    if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
        return true;
    } else {
        return false;
    }
}

function bcn_random_choice($message_array){

    $output = array_rand($message_array, 1);

    return $message_array[$output];

}