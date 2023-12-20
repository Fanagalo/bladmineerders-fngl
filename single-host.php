<?php

/**
 * The template shows all variants of Custom Post Type "host"
 * 
 * @package bladmineerders-fngl
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

	<pre>template: host-single.php</pre>

<?php
	// loop
	while (have_posts()) :
		the_post();
		get_template_part('template-parts/content', 'page');
	endwhile;

	// find out if a post has children
	$args = array(
		'post_type'   => 'host',
		'post_status' => 'publish',
		'post_parent' => $post->ID,
	);
	$child_pages = get_children($args);

	if (!empty($child_pages)) {

	/* lower taxa for parent and genus posts */
		echo '<div class="lower-taxa">';

		// TODO: table header for genus posts
		printf(__(
			'[:nl]<h2 class="table-all-species"><a name="all"></a>Tabellen voor alle parasieten per soort</h2>[:]
						   [:en]<h2 class="table-all-species"><a name="all"></a>Tables for all parasites per species</h2>[:]'
		));
		// end of table header

		$templates = array('host-parent.php', 'host-genus.php', 'default', 'host-genus-determination.php', 'host-species-determination.php');
		fngl_template_lower_taxa_tree(3, $templates);

		echo '</div><!-- .lower-taxa -->';

	} else {
		// script and legend for genus and species determination
		// TODO: still visible on gallers (and leafminers)
		get_template_part('inc/det-table-script-legend');
	}

?>


</main>
<div class="main-area-full"></div>

<?php
get_template_part('inc/modification-date');
get_sidebar();
get_footer();
