<?php
/**
 * Healthmasters theme by Fanagalo Theme Customizer
 *
 * @package Fanagalo_underscores_core
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bladmineerders_fngl_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'bladmineerders_fngl_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'bladmineerders_fngl_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'bladmineerders_fngl_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bladmineerders_fngl_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bladmineerders_fngl_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bladmineerders_fngl_customize_preview_js() {
	wp_enqueue_script( 'bladmineerders-fngl-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bladmineerders_fngl_customize_preview_js' );
