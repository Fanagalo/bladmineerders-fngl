<?php

/*
 * replacement for plugin Category Tag Pages version 1.0 by Marzio Carro 
 * the code is a literal copy of the plugin
 */

/*
* Add the 'post_tag' and the 'category' taxonomies, which are the names of
* the existing taxonomies used for tags and categories the Post type 'page'.
*/
if ( ! function_exists('cattagpages_register_taxonomy') ) {
    function cattagpages_register_taxonomy() {
        // register tag taxonomy for pages
        register_taxonomy_for_object_type('post_tag', 'page');
        // register category taxonomy for pages
        register_taxonomy_for_object_type('category', 'page');
        }
    add_action('init', 'cattagpages_register_taxonomy');
}

/*
* Display all post_types on the tags archive page and on the categories
* archive page.
*/
if( ! function_exists('cattagpages_search') ){
    function cattagpages_search($wp_query) {
        // tag query
        if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
        // category query
        if ($wp_query->get('category_name')) $wp_query->set('post_type', 'any');
        }
    add_action('pre_get_posts', 'cattagpages_search');
}