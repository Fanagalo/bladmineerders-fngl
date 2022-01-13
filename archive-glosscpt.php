<?php
/**
 * The template for displaying archive pages
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

    <div class="category-wrapper">

        <header class="page-header">

		<h1><?php printf( __( '
			[:nl]glosscpt NL[:]
			[:en]glosscpt EN[:]
		') ); ?></h1>

        </header><!-- .page-header -->

        <?php
            $my_query = new WP_Query( array(
                'post_type' => 'glosscpt', 
                'orderby'=>'title', 
                'order'=>'ASC', 
                'posts_per_page'=>-1) );

			if ( $my_query->have_posts() ): 
				$found_posts = array();
		
				foreach ( $my_query->posts as $k=>$p ) {
                    $found_posts[ apply_filters('the_title', $p->post_title) ] = $p;
                }
                ksort($found_posts, SORT_NATURAL | SORT_FLAG_CASE);
                $i=0;

				foreach ($found_posts as $k=>$p) {
                    $my_query->posts[$i++] = $p;
                }

				while ( $my_query->have_posts() ): $my_query->the_post(); 
					if ( is_user_logged_in() ) {
						echo "<div class='entry-meta'>";
						bladmineerders_fngl_edit_post_link('<span class="item-edit-link">','</span>');
						echo "</div>";
					}?>
					<dl class="glossary-item">
						<dt <?php post_class(); ?>><?php the_title(); ?> </dt>
						<dd><?php the_content( '', '' ); ?></dd>
					</dl>
				<?php endwhile;

			endif; 
			wp_reset_postdata(); 
		?>

    </div><!-- .category-wrapper -->


</main>
<div class="main-area-full"></div>



<?php

get_footer();
