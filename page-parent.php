<?php
/**
Template Name: Page - Parent
 *
 * Custom template used for Pages with that are parent to other pages
 * Includes text from the content field
 * Displays a hierarchical tree to child pages
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
		while ( have_posts() ) :
			the_post();
		get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
	?>

	<div class="lower-taxa">
		<?php
			$templates = array('page-parent.php','default');
			fngl_template_lower_taxa_tree(3,$templates);
		?>
	</div><!-- .lower-taxa -->

</main>
<div class="main-area-full"></div>

<?php
get_template_part( 'inc/modification-date' );
get_sidebar();
get_footer();
