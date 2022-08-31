<?php
/**
Template Name: Category News
 *
 * Custom template used for News
 * Includes text from the content field if any
 * Displays 12 newest articles from the category "news"
 * Shows pagination to older articles
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

        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $my_query = new WP_Query( array(
            'category_name' => 'news', 
            'orderby'=>'post_date', 
            'order'=>'DESC', 
            'posts_per_page'=>12,
            'paged' =>$paged,
            ) );

    
        if ( $my_query ->have_posts() ):
            while ( $my_query->have_posts() ): $my_query->the_post(); ?>
        
                <div class="entry-meta">
                    <?php bladmineerders_fngl_edit_post_link('<span class="item-edit-link">','</span>'); ?>
                </div>

                <div class="news-article">
                    <h2 <?php post_class(); ?>><?php the_title(); ?> </h2>

                    <div class="moddate-line">
                        <?php printf( __( '[:nl]Laatste bewerking[:en]Last modified[:] ' ) ); ?>
                        <?php echo get_the_modified_date('j');?>.<?php echo MonthRoman( get_the_modified_date('n') ); ?>.<?php echo get_the_modified_date('Y');?>
                        <?php echo get_post_modified_time('G:i'); ?>
                    </div>

                    <?php the_content( '', '' ); ?>
                </div><!-- .news-article -->

            <?php endwhile; ?>

            <div class="list-pagination-full">
                <div class="list-pagination-area">
                <?php 
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $my_query->max_num_pages,
                        'mid_size'     => 1,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'prev_text'    => '«', // default '« Previous' translates
                        'next_text'    => '»', // default 'Next »' translates
                    ) );
                ?>
                </div><!-- .list-pagination-area -->
            </div><!-- .list-pagination-full -->

        <?php endif; 

        wp_reset_postdata(); ?>

    </div><!-- .entry-content -->

</main>

<div class="main-area-full"></div>

<?php
get_sidebar();
get_footer();



