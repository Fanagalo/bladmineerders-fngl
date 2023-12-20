<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">
	<pre>template: category-host-plant-species.php</pre>

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

	endwhile; // End of the loop.
	?>

</main>
<div class="main-area-full"></div>

<?php
get_template_part('inc/modification-date');
get_sidebar();
get_footer();
