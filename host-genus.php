<?php
/**
Template Name: Host - Genus
 *
 * Custom template used for Genera of Hosts
 * Displays text from the content field: mainly a dichotomous table to the Parasite Species
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
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
	?>

	<div class="lower-taxa">
		<?php printf( __( '[:nl]<h2 class="table-all-species"><a name="all"></a>Tabellen voor alle parasieten per soort</h2>[:]
						   [:en]<h2 class="table-all-species"><a name="all"></a>Tables for all parasites per species</h2>[:]'
		) ); ?>

		<?php
			$templates = array('host-genus.php','host-genus-determination.php','host-species-determination.php');
			fngl_template_lower_taxa_tree(2,$templates);
		?>
	</div><!-- .lower-taxa -->

</main>
<div class="main-area-full"></div>

<?php
get_template_part( 'inc/modification-date' );
get_sidebar();
get_footer();
