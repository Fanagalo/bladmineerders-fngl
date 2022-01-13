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

	<div class="lower-taxon">
		<?php printf( __( '[:nl]<h2 class="table-all-species"><a name="all"></a>Tabellen voor alle parasieten per soort</h2>[:]
						   [:en]<h2 class="table-all-species"><a name="all"></a>Tables for all parasites per species</h2>[:]'
		) ); ?>

		<?php
			wp_list_pages( array( 'title_li' => $post->post_title, 'child_of' => $post->ID, 'depth' => 3, ) ); 


/* vervangende functie voor wp_list_pages?
echo '<ul>';
	$mypages = get_pages( array( 
		'child_of' => $post->ID, 
		'hierarchical' => false, 
		'sort_column' => menu_order, 
		'meta_key' => '',
		'meta_value' => 'host-genus-determination.php',) 
	);
	
	foreach( $mypages as $page ) {   
		echo '<li><a href="' . get_page_link( $page->ID ) . '">' . $page->post_title . $page->meta_value . '</a></li>';
	}   
echo '</ul>';
// tot hier 
*/

?>
	</div>

	<?php get_template_part( 'inc/modification-date' ); ?>

</main>
<div class="main-area-full"></div>

<?php

get_footer();
