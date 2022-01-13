<?php
/**
 * Bladmineerders FNGL functions and definitions
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

if ( ! function_exists( 'bladmineerders_fngl_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bladmineerders_fngl_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Healthmasters theme by Fanagalo, use a find and replace
		 * to change 'bladmineerders-fngl' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bladmineerders-fngl', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'bladmineerders-fngl' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Register support for Gutenberg wide images in your theme
		 */
		add_theme_support( 'align-wide' );

	}
endif;

add_action( 'after_setup_theme', 'bladmineerders_fngl_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bladmineerders_fngl_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bladmineerders_fngl_content_width', 640 );
}
add_action( 'after_setup_theme', 'bladmineerders_fngl_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bladmineerders_fngl_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bladmineerders-fngl' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bladmineerders-fngl' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bladmineerders_fngl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bladmineerders_fngl_scripts() {
	wp_enqueue_style( 'bladmineerders-fngl-style', get_stylesheet_uri() );

	/* https://www.customyou.nl/responsive-menu-wordpress-clean-tutorial/ */
	wp_enqueue_script( 'nav-menu.js', get_template_directory_uri() . '/js/nav-menu.js', array('jquery'), '20151111', true );
	/* tot hier */


	wp_enqueue_script( 'bladmineerders-fngl-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'bladmineerders_fngl_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/cpts.php';



// limiet voor aantal zoekresultaten per pagina
// bron https://www.relevanssi.com/knowledge-base/posts-per-page/

add_filter('post_limits', 'postsperpage');
function postsperpage($limits) {
	if (is_search()) {
		global $wp_query;
		$wp_query->query_vars['posts_per_page'] = 1000;
	}
	return $limits;
}

