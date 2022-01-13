<?php

/* custom post type "references" declareren */

function bladmineerders_fngl_cpt_references() {

	$labels = array(
		'name'               => _x( 'References', 'post type general name', 'bladmineerders-fngl' ),
		'singular_name'      => _x( 'Reference', 'post type singular name', 'bladmineerders-fngl' ),
		'menu_name'          => _x( 'References', 'admin menu', 'bladmineerders-fngl' ),
		'name_admin_bar'     => _x( 'Reference', 'add new on admin bar', 'bladmineerders-fngl' ),
		'add_new'            => _x( 'Add New', 'bladmineerders-fngl' ),
		'add_new_item'       => __( 'Add New Reference', 'bladmineerders-fngl' ),
		'new_item'           => __( 'New Reference', 'bladmineerders-fngl' ),
		'edit_item'          => __( 'Edit Reference', 'bladmineerders-fngl' ),
		'view_item'          => __( 'View Reference', 'bladmineerders-fngl' ),
		'all_items'          => __( 'All References', 'bladmineerders-fngl' ),
		'search_items'       => __( 'Search References', 'bladmineerders-fngl' ),
		'parent_item_colon'  => __( 'Parent References:', 'bladmineerders-fngl' ),
		'not_found'          => __( 'No references found.', 'bladmineerders-fngl' ),
		'not_found_in_trash' => __( 'No references found in Trash.', 'bladmineerders-fngl' ),
	);

	$support = array(
		'title',
		'editor',
		'thumbnail',
		'excerpt',
		'custom-fields',
		'revisions',
		'page-attributes',
	);

	$args = array(
		'label'               => _x( 'References', 'post type general name', 'bladmineerders-fngl' ),
		'labels'              => $labels,
		'menu_position'       => 2,
		'supports'            => $support,
		'public'              => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => true,
        'has_archive'         => true,
	);

    register_post_type( 'references', $args );
}
add_action( 'init', 'bladmineerders_fngl_cpt_references' );

/* custom post type "glosscpt" declareren */

function bladmineerders_fngl_cpt_glosscpt()
{

	$labels = array(
		'name'               => _x('glosscpt', 'post type general name', 'bladmineerders-fngl'),
		'singular_name'      => _x('Glossary Item', 'post type singular name', 'bladmineerders-fngl'),
		'menu_name'          => _x('Glossary', 'admin menu', 'bladmineerders-fngl'),
		'name_admin_bar'     => _x('Glossary', 'add new on admin bar', 'bladmineerders-fngl'),
		'add_new'            => _x('Add New', 'bladmineerders-fngl'),
		'add_new_item'       => __('Add New Item', 'bladmineerders-fngl'),
		'new_item'           => __('New Item', 'bladmineerders-fngl'),
		'edit_item'          => __('Edit Item', 'bladmineerders-fngl'),
		'view_item'          => __('View Item', 'bladmineerders-fngl'),
		'all_items'          => __('All Items', 'bladmineerders-fngl'),
		'search_items'       => __('Search Items', 'bladmineerders-fngl'),
		'parent_item_colon'  => __('Parent glossary:', 'bladmineerders-fngl'),
		'not_found'          => __('No items found.', 'bladmineerders-fngl'),
		'not_found_in_trash' => __('No items found in Trash.', 'bladmineerders-fngl'),
	);

	$support = array(
		'title',
		'editor',
		'thumbnail',
		'excerpt',
		'custom-fields',
		'revisions',
		'page-attributes',
	);

	$args = array(
		'label'               => _x('glosscpt', 'post type general name', 'bladmineerders-fngl'),
		'labels'              => $labels,
		'menu_position'       => 2,
		'supports'            => $support,
		'public'              => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
		'taxonomies'          => array('category', 'post_tag'),
		'hierarchical'        => true,
        'has_archive'         => true,
	);

	register_post_type('glosscpt', $args);
}
add_action('init', 'bladmineerders_fngl_cpt_glosscpt');