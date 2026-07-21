<?php

/**
 * Helper function to format number according to language
 * Usage
 * @since bladmineerders-fngl version 3.2.4
 * @param string       number
 * @return string      string
 */

function fngl_number_format_localized($number) {
    if (qtranxf_getLanguage() == 'nl') {
        return number_format($number, 0, ',', '.');
    } else {
        return number_format($number, 0, '.', ',');
    }
}


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
    return '<span class="published-posts-number">' . fngl_number_format_localized($published_posts) . '</span>';
}
add_shortcode('statistics_posts_by_type', 'fngl_statistics_posts_by_type_shortcode');


/**
 * Shortcode to show number of published posts with a specified template, 
 * used for site statistics
 * Usage [statistics_posts_by_template template="abc.php"]
 * 
 * @since bladmineerders-fngl version 3.2.1
 * @param string       a post_template
 * @return string      HTML code with a class
 */

function fngl_get_template_counts()
{
    static $counts = null;

    if ($counts === null) {
        global $wpdb;
        $results = $wpdb->get_results(
            "SELECT m.meta_value as template, COUNT(*) as total
             FROM {$wpdb->posts} as p
             JOIN {$wpdb->postmeta} as m ON p.ID = m.post_id
             WHERE p.post_status = 'publish'
             AND m.meta_key = '_wp_page_template'
             GROUP BY m.meta_value"
        );

        $counts = array();
        foreach ($results as $row) {
            $counts[$row->template] = (int) $row->total;
        }
    }

    return $counts;
}

function statistics_posts_by_template_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'template' => 'abc.php',
    ), $atts, 'count_template');

    $counts = fngl_get_template_counts();

    $templates = array_map('trim', explode(',', $atts['template']));

    $published_posts = 0;
    foreach ($templates as $template_name) {
        if (isset($counts[$template_name])) {
            $published_posts += $counts[$template_name];
        }
    }

    return '<span class="published-posts-number">' . fngl_number_format_localized($published_posts) . '</span>';
}
add_shortcode('statistics_posts_by_template', 'statistics_posts_by_template_shortcode');



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
    return '<span class="published-posts-number">' . fngl_number_format_localized($images_number) . '</span>';
}
add_shortcode('statistics_images', 'fngl_statistics_images_shortcode');


/**
 * Shortcode to display current date and time in Dutch or English 
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


/**
 * Shortcode to display current date in Dutch or English 
 * Usage  [date-now]
 * 
 * @since bladmineerders-fngl version 1.0.11
 * @return string
 */

function fngl_current_date_shortcode()
{

    if (qtranxf_getLanguage() == 'nl') {
        $current_date = date_i18n('j F Y');
    } else {
        $current_date = date_i18n('F j, Y');
    }

    return $current_date;
}
add_shortcode('date-now', 'fngl_current_date_shortcode');



/**
 * Shortcode to display current year 
 * Usage  [year-now]
 * 
 * @since bladmineerders-fngl version 1.0.12
 * @return string
 */

function fngl_current_year_shortcode()
{
    return date('Y');
}
add_shortcode('year-now', 'fngl_current_year_shortcode');
