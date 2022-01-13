<?php

/**
Template Name: Host - Parent
 *
 * Custom template used for Higher Taxa of Hosts
 * Includes text from the content field if any
 * Displays a hierarchical tree of lower taxa
 * Shows the modification date
 * 
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

		get_template_part('template-parts/content', 'page');

	endwhile; // End of the loop.

	?>

	<div class="lower-taxon">
		<?php
		// wp_list_pages(array('title_li' => $post->post_title, 'child_of' => $post->ID, 'depth' => 3));

		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => -1));
		$childrenpages = get_page_children($post->ID, $all_wp_pages);
		$n = 0;
		foreach ($childrenpages as $postnummer) {
			echo $n . ". " . $postnummer->ID . '<br/>';
			++$n;
		}



		?>
	</div>

	<?php get_template_part('inc/modification-date'); ?>

</main>
<div class="main-area-full"></div>

<?php

get_footer();
