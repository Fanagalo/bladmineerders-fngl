<?php
/**
Template Name: Category specials
 *
 * Custom template used for Specials
 * Displays text from the content field if any
 * Displays articles from the category "specials"
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">
    <div class="entry-content">

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
            'category_name' => 'specials', 
            'orderby'=>'post_date', 
            'order'=>'DESC', 
            'posts_per_page'=>-1) );

        if ( $my_query ->have_posts() ):
    
            while ( $my_query->have_posts() ): $my_query->the_post(); ?>
        
                <div class="entry-meta">
                    <?php bladmineerders_fngl_edit_post_link('<span class="item-edit-link">','</span>'); ?>
                </div>
    
                <div class="news-article">
                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
    
                    <div class="mod_date-container">
                        <?php printf( __( '[:nl]Laatste bewerking[:en]Last modified[:] ' ) ); ?>
                        <?php echo get_the_modified_date('j');?>.<?php echo MonthRoman( get_the_modified_date('n') ); ?>.<?php echo get_the_modified_date('Y');?>
                    </div>
    
                    <?php 
                        the_content( sprintf(
                            wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bladmineerder-fngl' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ) );
    
                    ?>
                </div>
            <?php endwhile; 
    
        endif; 
    
        wp_reset_postdata(); ?>

    </div><!-- .entry-content -->

</main>
<div class="main-area-full"></div>

<?php
get_sidebar();
get_footer();