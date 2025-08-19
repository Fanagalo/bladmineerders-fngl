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
        SELECT p.ID, p.post_title, p.post_parent, p.menu_order
        FROM $wpdb->posts p
        INNER JOIN $wpdb->postmeta pm ON p.ID = pm.post_id
        WHERE pm.meta_value IN(" . implode(', ', array_fill(0, count($templates), '%s')) . ")
        ORDER BY p.menu_order, p.post_title ASC
        ";

    // AND p.post_status = 'publish' could be added, but doubles page generation time

    $query = call_user_func_array(array($wpdb, 'prepare'), array_merge(array($sql), $templates));
    $results = $wpdb->get_results($query);

    $r = array( 'walker' => '' );
    $current_page = get_the_ID();
    $children = get_page_children( $current_page, $results );  

    if (empty($children)) {
        return;
    } 
    else {
        $pre_output = '<li class="pagenav">' . get_the_title() . '<ul>';
        $output = walk_page_tree( $children, $depth, $current_page, $r );
        $post_output = '</ul>';
        echo "{$pre_output}{$output}{$post_output}"; 
    }
}