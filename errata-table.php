<?php

/**
Template Name: Errata with tabel
 *
 * Custom template used for Errata in the book "Plant Galls of Europe" by J.C. Roskam
 * Displays text from the content field if any
 * Displays errata in a sortable table
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
		get_template_part('template-parts/content', 'page');
	endwhile; // End of the loop.
	?>

	<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#ErrataTable').DataTable({
				paging: false,
				info: false,
				"language": {
					"search": "Search",
				}
			})
		});
	</script>
	<p>&nbsp;</p>
	<div class="table-legend">

		<?php printf(__('
				<div class="table-legend-column">
					<h3>FILTER AND SORT TABLE</h3> 
					To <strong>filter</strong> the table above, add a text to the search field (top right of the table).<br/>
				</div>
				<div class="table-legend-column">
					<h3>&nbsp;</h3>
					To <strong>sort a column</strong> click on an arrow after the column name (both ascending and descending). <br/>
				</div>
				<div class="table-legend-column">
					<h3>&nbsp;</h3>
					<strong>Sort multiple columns</strong> with Shift&nbsp;+&nbsp;click on the arrows.
				</div>
		')); ?>
		<p style="clear:both">&nbsp;</p>
	</div>


</main>
<div class="main-area-full"></div>

<?php
get_template_part('inc/modification-date');
get_sidebar();
get_footer();
