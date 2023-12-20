<?php

/*
Template Name: Host - Genus - Galler
Template Post Type: page, host
 *
 * Custom template used for Genera of Hosts
 * Displays text from the content field: mainly a dichotomous table to the Parasite Species
 * Displays a hierarchical tree of lower taxa
 * Shows the modification date
 * THIS IS A TEMPORARY SOLUTION in the process of making Hosts into a CPT
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
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
	?>


</main>
<div class="main-area-full"></div>

<?php
get_template_part( 'inc/modification-date' );
get_sidebar();
get_footer();
