<?php

/**
 * Shortcode to show number of published posts of the specified posttype, 
 * used for site statistics
 * Usage [statistics_posts_by_type posttype="post"]
 * 
 * @since bladmineerders-fngl version 1.0.10
 * @param string       a post_type
 * @return string      HTML code with a class
 */

function fngl_statistics_posts_by_type_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'posttype' => 'page',
    ), $atts ));

    $published_posts = wp_count_posts($posttype)->publish;

    if (qtranxf_getLanguage() == 'nl') {
        $formatted_published_posts = number_format($published_posts, 0, ',', '.');
    } else {
        $formatted_published_posts = number_format($published_posts, 0, '.', ',');
    }

    return '<span class="published-posts-number">' . $formatted_published_posts . '</span>';
}
add_shortcode('statistics_posts_by_type', 'fngl_statistics_posts_by_type_shortcode');


/**
 * Shortcode to show number of images in wp_posts table, 
 * with offset for images that are not in the database; 
 * used for site statistics.
 * Usage  [statistics_posts_by_type offset="10270"]
 * 
 * @since bladmineerders-fngl version 1.0.10
 * @param int       number to add to found attachments in table
 * @return string   HTML code with a class
 */

function fngl_statistics_images_shortcode( $atts ) {

    extract( shortcode_atts( array(
        'offset' => 10270,   // default, this is number of images in folder wp-content/uploads/beeld
    ), $atts ));

    $offset = 10270;
    $images_as_attachment = wp_count_posts('attachment')->inherit;
    $images_number = $images_as_attachment + $offset;

    if (qtranxf_getLanguage() == 'nl') {
        $formatted_images_number = number_format($images_number, 0, ',', '.');
    } else {
        $formatted_images_number = number_format($images_number, 0, '.', ',');
    }

    return '<span class="published-images-number">' . $formatted_images_number . '</span>';
}
add_shortcode('statistics_images', 'fngl_statistics_images_shortcode');


/**
 * Shortcode to display current date and time in Dutch or English, 
 * Usage  [date-time-now]
 * 
 * @since bladmineerders-fngl version 1.0.11
 * @return string
 */

function fngl_current_date_time_shortcode() {

    if (qtranxf_getLanguage() == 'nl') {
        $current_date_time = date_i18n('j F Y \o\m G:i');
    } else {
        $current_date_time = date_i18n('F j, Y, g:i A','',true) . ' UTC';
    }

    return $current_date_time;
} 
add_shortcode('date-time-now','fngl_current_date_time_shortcode'); 