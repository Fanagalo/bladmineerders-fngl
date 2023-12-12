<?php

/* Declaration of custom post type "reference" */

function bladmineerders_fngl_cpt_reference() {

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
		// 'parent_item_colon'  => __( 'Parent References:', 'bladmineerders-fngl' ),
		'not_found'          => __( 'No references found.', 'bladmineerders-fngl' ),
		'not_found_in_trash' => __( 'No references found in Trash.', 'bladmineerders-fngl' ),
	);

	$support = array(
		'title',
		'editor',
		// 'thumbnail',
		// 'excerpt',
		// 'custom-fields',
		'revisions',
		// 'page-attributes',
	);

	$args = array(
		// 'label'               => _x( 'References', 'post type general name', 'bladmineerders-fngl' ),
		'labels'              => $labels,
		'menu_position'       => 31,
		'supports'            => $support,
		'public'              => true,
		'capability_type'     => 'page',
		// 'show_in_rest'        => true,
		// 'taxonomies'          => array( 'category', 'post_tag' ),
		// 'hierarchical'        => true,
        'has_archive'         => true,
		'menu_icon'           => 'none',
	);

    register_post_type( 'reference', $args );
}
add_action( 'init', 'bladmineerders_fngl_cpt_reference' );


/* Declaration of custom post type "glossary" */

function bladmineerders_fngl_cpt_glossary()
{

	$labels = array(
		'name'               => _x('Glossary', 'post type general name', 'bladmineerders-fngl'),
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
		// 'parent_item_colon'  => __('Parent glossary:', 'bladmineerders-fngl'),
		'not_found'          => __('No items found.', 'bladmineerders-fngl'),
		'not_found_in_trash' => __('No items found in Trash.', 'bladmineerders-fngl'),
	);

	$support = array(
		'title',
		'editor',
		// 'thumbnail',
		// 'excerpt',
		// 'custom-fields',
		'revisions',
		// 'page-attributes',
	);

	$args = array(
		// 'label'               => _x('glossary', 'post type general name', 'bladmineerders-fngl'),
		'labels'              => $labels,
		'menu_position'       => 32,
		'supports'            => $support,
		'public'              => true,
		'capability_type'     => 'page',
		// 'show_in_rest'        => true,
		// 'taxonomies'          => array('category', 'post_tag'),
		// 'hierarchical'        => true,
        'has_archive'         => true,
		'menu_icon'           => 'none',

	);

	register_post_type('glossary', $args);
}
add_action('init', 'bladmineerders_fngl_cpt_glossary');


/* This action shows all the glossary items in one page */

function fngl_get_all_glossary_posts( $query ) {
	if( !is_admin() && $query->is_main_query() && is_post_type_archive( 'glossary' ) ) {
		$query->set( 'posts_per_page', '-1' );
//		$query->set( 'orderby', 'title' ); // doesn't work due to multilingual titles
//		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'fngl_get_all_glossary_posts' );
