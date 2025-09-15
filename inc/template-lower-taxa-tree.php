<?php

/**
 * Prints hierarchical tree based on assigned templates.
 * 
 * @since 1.07
 * 
 * @param integer   $depth      Number of levels of the tree
 * @param array     $templates  Finds data in records assigned with a template
 */

function fngl_template_lower_taxa_tree($depth, $templates) {
    if (empty($templates) || $depth < 1) {
        return;
    }
    
    $current_page = get_the_ID();
    if (!$current_page) {
        return;
    }
    
    // Store page IDs that have cached data for easier cleanup
    $page_cache_list = get_option('fngl_taxa_cached_pages', array());
    
    // Create cache key with page ID at the end for easier targeting
    $template_hash = md5(serialize($templates));
    $cache_key = "fngl_taxa_tree_{$template_hash}_{$depth}_{$current_page}";
    
    $cached_result = get_transient($cache_key);
    if ($cached_result !== false) {
        echo $cached_result;
        return;
    }
    
    global $wpdb;
    $sql = "
        SELECT p.ID, p.post_title, p.post_parent, p.menu_order 
        FROM $wpdb->posts p
        INNER JOIN $wpdb->postmeta pm ON p.ID = pm.post_id
        WHERE pm.meta_key = '_wp_page_template'
        AND pm.meta_value IN(" . implode(', ', array_fill(0, count($templates), '%s')) . ")
        AND p.post_status = 'publish'
        ORDER BY p.menu_order, p.post_title ASC
    ";
    
    $query = call_user_func_array(array($wpdb, 'prepare'), array_merge(array($sql), $templates));
    $results = $wpdb->get_results($query);
    
    if (empty($results)) {
        return;
    }
    
    $children = get_page_children($current_page, $results);  
    if (empty($children)) {
        return;
    }
    
    $r = array('walker' => '');
    $pre_output = '<li class="pagenav">' . get_the_title() . '<ul>';
    $output = walk_page_tree($children, $depth, $current_page, $r);
    $post_output = '</ul>';
    $final_output = $pre_output . $output . $post_output;
    
    // Cache for 1 month
    set_transient($cache_key, $final_output, MONTH_IN_SECONDS);
    
    // Track which pages have cached data
    if (!in_array($current_page, $page_cache_list)) {
        $page_cache_list[] = $current_page;
        update_option('fngl_taxa_cached_pages', $page_cache_list);
    }
    
    echo $final_output;
}

// Function to clear all transients for a specific page
function fngl_clear_page_taxa_cache($page_id) {
    global $wpdb;
    
    // Get all transients that end with this page ID
    $results = $wpdb->get_results($wpdb->prepare(
        "SELECT option_name FROM $wpdb->options 
         WHERE option_name LIKE '_transient_fngl_taxa_tree_%%_%d'",
        $page_id
    ));
    
    foreach ($results as $result) {
        $transient_key = str_replace('_transient_', '', $result->option_name);
        delete_transient($transient_key);
    }
    
    // Remove from tracked pages list
    $page_cache_list = get_option('fngl_taxa_cached_pages', array());
    $page_cache_list = array_diff($page_cache_list, array($page_id));
    update_option('fngl_taxa_cached_pages', $page_cache_list);
}

// Hook to clear cache when pages are updated
function fngl_handle_page_update($post_id) {
    if (get_post_type($post_id) !== 'page') {
        return;
    }
    
    // Clear cache for this page
    fngl_clear_page_taxa_cache($post_id);
    
    // Clear cache for parent and children since hierarchy affects the tree
    $parent_id = wp_get_post_parent_id($post_id);
    if ($parent_id) {
        fngl_clear_page_taxa_cache($parent_id);
    }
    
    $children = get_children(array(
        'post_parent' => $post_id,
        'post_type' => 'page',
        'fields' => 'ids'
    ));
    
    foreach ($children as $child_id) {
        fngl_clear_page_taxa_cache($child_id);
    }
}

add_action('save_post', 'fngl_handle_page_update');
add_action('wp_trash_post', 'fngl_handle_page_update');
add_action('delete_post', 'fngl_handle_page_update');