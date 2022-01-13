<?php
/**
Template Name: Category FAQ
 *
 * Custom template used for Frequently Asked Question
 * Displays text from the content field if any
 * Displays articles from the category "faq"
 * 
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">
    <div class="category-wrapper">

        <?php
        /*
        * Loop for page content
        */
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', 'page' );
            endwhile; // End of the loop.
        endif;

        /*
        * Loop for category content
        */
        $my_query = new WP_Query( array(
            'category_name' => 'faq', 
            'orderby'=>'post_date', 
            'order'=>'DESC', 
            'posts_per_page'=>-1) );

        if ( $my_query ->have_posts() ):
            while ( $my_query->have_posts() ): $my_query->the_post(); ?>
        
                <div class="entry-meta">
                    <?php bladmineerders_fngl_edit_post_link('<span class="item-edit-link">','</span>'); ?>
                </div>

                <div class="faq-article">
                    <h2 <?php post_class(); ?>><?php the_title(); ?> </h2>
                    <?php the_content( '', '' ); ?>
                </div>
            <?php endwhile; 
        endif; 
        
        wp_reset_postdata(); ?>

    </div><!-- .category-wrapper -->

</main>
<div class="main-area-full"></div>

<?php

get_footer();
