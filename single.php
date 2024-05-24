<?php
/**
 * The template for displaying all single posts
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

	<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile; // End of the loop.
	?>

</main>
<div class="main-area-full"></div>

<?php
get_template_part('inc/modification-date');
get_sidebar();
get_footer();
