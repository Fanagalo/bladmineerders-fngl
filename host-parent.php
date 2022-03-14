<?php

/**
Template Name: Host - Parent
 *
 * Custom template used for Parents of Hosts
 * Displays text from the content field: mainly a dichotomous table to the Parasite Species
 * Displays a hierarchical tree of lower taxa
 * Shows the modification date with Latin month
 * 
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

	<?php
		while (have_posts()) : the_post();
			get_template_part('template-parts/content', 'page');
		endwhile; 
	?>	

	<div class="lower-taxa">
		<?php
			$templates = array('host-parent.php','host-genus.php','host-genus-determination.php','host-species-determination.php');
			fngl_template_lower_taxa_tree(3,$templates);
		?>
	</div><!-- .lower-taxa -->

</main>
<div class="main-area-full"></div>

<?php
get_template_part( 'inc/modification-date' );
get_sidebar();
get_footer();