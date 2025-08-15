<?php

/**
 * Bladmineerders FNGL functions and definitions
 * @package bladmineerders-fngl
 * @since version 0.75
 */

// Disable use XML-RPC
add_filter('xmlrpc_enabled', '__return_false');


if (! function_exists('bladmineerders_fngl_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bladmineerders_fngl_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /assets/languages/ directory.
		 * If you're building a theme based on Healthmasters theme by Fanagalo, use a find and replace
		 * to change 'bladmineerders-fngl' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('bladmineerders-fngl', get_template_directory() . '/assets/languages');

		// Add default posts and comments RSS feed links to head.
		// add_theme_support( 'automatic-feed-links' ); 2024-05-21 disabled for performance reasons

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary', 'bladmineerders-fngl'),
		));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');
	}
endif;

add_action('after_setup_theme', 'bladmineerders_fngl_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bladmineerders_fngl_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'bladmineerders-fngl'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'bladmineerders-fngl'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'bladmineerders_fngl_widgets_init');


/**
 * Enqueue scripts and styles.
 */

function bladmineerders_fngl_scripts()
{
	wp_enqueue_style('style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

	// Script for responsive mobile menu
	// source: https://www.customyou.nl/responsive-menu-wordpress-clean-tutorial/
	wp_enqueue_script('nav-menu.js', get_template_directory_uri() . '/assets/js/nav-menu.js', array('jquery'), '20151111', true);

	// Helps with accessibility for keyboard only users. Original from _s
	wp_enqueue_script('bladmineerders-fngl-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);
}
add_action('wp_enqueue_scripts', 'bladmineerders_fngl_scripts');

/* Add functions from directory "inc" */
require get_template_directory() . '/inc/block-editor-disable.php';         // Remove block editor
require get_template_directory() . '/inc/comments-disable.php';             // Remove comments
require get_template_directory() . '/inc/cpts.php';                         // Custom Post Types
require get_template_directory() . '/inc/custom-header.php';                // Custom Header
require get_template_directory() . '/inc/lower-taxa-tree.php';              // Function for lower taxa tree for hosts and parasites
require get_template_directory() . '/inc/sidebar-registration.php';         // Sidebar registration
require get_template_directory() . '/inc/shortcodes.php';   				// Shortcodes to create site statistics and more
require get_template_directory() . '/inc/template-functions.php';           // Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-tags.php';                // Custom template tags for this theme
require get_template_directory() . '/inc/wp-admin-customize.php';           // Customize wp-admin with stylesheet wp-admin-customization.css
require get_template_directory() . '/inc/add_names_fields_to_search.php';   // Extend WordPress search to include custom fields