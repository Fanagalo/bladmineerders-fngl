<?php

function fngl_wp_admin_customize()
    {
        wp_enqueue_style('admin_styles', get_stylesheet_directory_uri() . '/wp-admin-customization.css');
    }
add_action('admin_enqueue_scripts', 'fngl_wp_admin_customize');
