<?php
/**
Template Name: Specials
 *
 * Custom template used for Pages in the category Specials
 * Similar to page.php 
 * Shows the modification date
 *
 * @package bladmineerders-fngl
 * @since version 0.76
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
?>

</main>
<div class="main-area-full"></div>

<?php
get_template_part( 'inc/modification-date' );
get_sidebar();
get_footer();
