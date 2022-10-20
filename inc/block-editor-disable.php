<?php

/* Disable block editor */
add_filter('use_block_editor_for_post', '__return_false', 10);
 
/* Disables the block editor from managing widgets */
add_filter( 'use_widgets_block_editor', '__return_false' );
 
add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );
 
    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );
 
    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );
