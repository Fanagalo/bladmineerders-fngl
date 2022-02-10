<?php

/**
 * Prints hierarchical tree based on assigned templates.
 * 
 * @since 1.07
 * 
 * @param integer   $depth      Number of levels of the tree
 * @param array     $templates  Finds data in records assigned with a template
 */

function fngl_template_lower_taxa_tree($depth,$templates) {

    global $wpdb;

    $sql = "
        SELECT ID,post_title,post_parent 
        FROM $wpdb->posts,$wpdb->postmeta 
        WHERE ID = post_id
        AND meta_value IN(".implode(', ', array_fill(0, count($templates), '%s')).")
        ORDER BY menu_order,post_title ASC
    ";
    // AND post_status = 'publish' could be added, but doubles page generation time

    $query = call_user_func_array(array($wpdb, 'prepare'), array_merge(array($sql), $templates));
    $results = $wpdb->get_results($query);

    $r= array( 'walker' => '' );
    $current_page = get_the_ID();
    $children = get_page_children( $current_page, $results );  

    $output = '<li class="pagenav">' . get_the_title() . '<ul>';
    $output .= walk_page_tree( $children, $depth, $current_page, $r );
    $output .= '</ul>';

    print($output);
}