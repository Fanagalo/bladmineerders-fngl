<?php

/**
Template Name: Host - Species Determination
 *
 * Custom template used for Species of Hosts
 * Displays text from the content field if any
 * Displays parasites of this Host Species in a sortable table
 * Includes a legend on the bottom of the table
 * Shows the modification date
 * 
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

	<?php
	while (have_posts()) :
		the_post();
		get_template_part('template-parts/content', 'determination-separate-table');
	endwhile; // End of the loop.
	?>

</main>
<div class="main-area-full"></div>

<?php
get_template_part('inc/modification-date');
get_sidebar();
get_footer();
