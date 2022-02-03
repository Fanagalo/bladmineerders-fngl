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

    <div class="entry-content">

        <header class="page-header">
			<h1><?php printf( __( '
				[:nl]Terminologie[:]
				[:en]Glossary[:]
			') ); ?></h1>
        </header>

		<?php
			if ( have_posts() ) :
				echo '<dl class="glossary">';

				// sort titles alphabetically
				$found_posts = array();

				foreach ( $wp_query->posts as $k=>$p ) {
					$found_posts[ apply_filters('the_title', $p->post_title) ] = $p;
				}

				ksort($found_posts, SORT_NATURAL | SORT_FLAG_CASE);
				$i=0;

				foreach ($found_posts as $k=>$p) {
					$wp_query->posts[$i++] = $p;
				}

				while ( have_posts() ) :
					the_post();
					the_title( '<dt>', '</dt>' );
					echo '<dd>';
					the_content( '', '' );
					echo '</dd>';
				endwhile;

				wp_reset_postdata();

				echo '</dl>';
			endif; ?>

    </div><!-- .entry-content -->

</main>
<div class="main-area-full"></div>

<?php
get_footer();
