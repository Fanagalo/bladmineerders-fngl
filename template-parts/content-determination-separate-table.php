<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fanagalo_underscores_core
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
	</header><!-- .entry-header -->

	<?php
	// get name fields from post_meta
	$allfields = get_post_meta(get_the_ID());

	$nl_vern_fields = isset($allfields['nl_vernacular']) ? $allfields['nl_vernacular'] : null;
	$en_vern_fields = isset($allfields['en_vernacular']) ? $allfields['en_vernacular'] : null;
	$synonym_fields = isset($allfields['synonym']) ? $allfields['synonym'] : null;
	$name_note_field = isset($allfields['name_note']) ? $allfields['name_note'] : null;

	if ($nl_vern_fields || $en_vern_fields || $synonym_fields || $name_note_field) {

		echo "<div class='names-block'>";
		echo "<h2>" . __('Alternative names', 'bladmineerders-fngl') . "</h2>";

		if ($en_vern_fields) {
			echo "<h3>" . __('English vernacular name', 'bladmineerders-fngl') . "</h3><ul class='en_vernacular'>";
			foreach ($en_vern_fields as $field) {
				if (!empty($field)) {
					echo "<li>" . $field;
				}
			}
			echo "</ul>";
		}

		if ($nl_vern_fields) {
			echo "<h3>" . __('Dutch vernacular name', 'bladmineerders-fngl') . "</h3><ul class='nl_vernacular'>";
			foreach ($nl_vern_fields as $field) {
				if (!empty($field)) {
					echo "<li>" . $field;
				}
			}
			echo "</ul>";
		}

		if ($synonym_fields) {
			echo "<h3>" . __('Synonym', 'bladmineerders-fngl') . "</h3><ul class='synonym'>";
			foreach ($synonym_fields as $field) {
				if (!empty($field)) {
					echo "<li>" . $field;
				}
			}
			echo "</ul>";
		}

		if (!empty($name_note_field[0])) {
			echo "<h3>" . __('Note', 'bladmineerders-fngl') . "</h3><p class='name_note'>" . $name_note_field[0] . "</p>";
		}

		echo "</div><!-- names-block -->";
	}
	?>

	<div class="entry-content">
		<?php
			// the_content();
		?>
	</div><!-- .entry-content -->

	<div class="determination-table">
		<?php
		
		echo "<h2>" . __('Determination table', 'bladmineerders-fngl') . "</h2>";
		
		// best place for unfolding legenda

		global $wpdb;
		$wpdb->show_errors();
		$host_slug = $post->post_name;

		// SELECT host,organ,mode,stage,tax_top,tax_middle,tax_family,parasite,genera_number,species_number,host_slug,parasite_slug 

		$tabledata = $wpdb->get_results("
				SELECT *
				FROM host_determination 
				WHERE host_slug = '$host_slug' 
			");

		if ($tabledata) {
			echo '<table id="DeterminationTable" class="display"><thead><tr>';

			if (get_locale() == 'nl_NL') {
				echo '<!-- <th>host</th> -->
					<th>orgaan</th>
					<th>parasi&shy;teer&shy;wijze</th>
					<th>stadium</th>
					<th>hoofd&shy;groep</th>
					<th>groep</th>
					<th>familie</th>
					<th>parasiet</th>
					<th>P<!-- parasite with image --></th>
					<th>G</th>
					<th>S</th>
					<!-- <th>host_slug</th> -->
					<!-- <th>parasite_slug</th> -->';
			} else {
				echo '<!-- <th>host</th> -->
					<th>organ</th>
					<th>mode</th>
					<th>stage</th>
					<th>main group</th>
					<th>group</th>
					<th>family</th>
					<th>parasite</th>
					<th>P<!-- parasite with image --></th>
					<th>G</th>
					<th>S</th>
					<!-- <th>host_slug</th> -->
					<!-- <th>parasite_slug</th> -->';
			}
			echo '</tr></<thead><tbody>';
		} else {
			if (get_locale() == 'nl_NL') {
				echo '<p class="no-table-data">Nog geen gegevens voor een tabel beschikbaar.</p>';
			}else{
				echo '<p class="no-table-data">No table data available yet.</p>';
			}
		}

		foreach ($tabledata as $row) {

			/* translation of organ terms */
			$organ = $row->organ;

			if (get_locale() == 'nl_NL') {
				$organ_trans_nl = array(
					'bud'         => 'knop',          
					'dead wood'   => 'dood hout',
					'flower'      => 'bloem',
					'fruit'       => 'vrucht',
					'leaf'        => 'blad',
					'leaf bud'    => 'bladknop',
					'root'        => 'wortel',
					'root collar' => 'wortelhals',
					'seed'        => 'zaad',
					'stem'        => 'stengel',
					'systemic'    => 'systemisch',
				);
				$organ = strtr($organ, $organ_trans_nl);
			} else {
				$organ;
			}

			/* translation of mode terms */
			$mode = $row->mode;

			$mode = strtr($mode, "0", " ");

			if (get_locale() == 'nl_NL') {
				$mode_trans_nl = array(
					'borer'            => 'boorder',
					'canker'           => 'kanker',    
					'down'             => 'dons',
					'film'             => 'overtrek',
					'free'             => 'vrij',      
					'gall'             => 'gal',
					'hidden'           => 'verborgen', 
					// 'inquiline'        => 'inquiline'        // no translation necessary
					'leaf spot'        => 'bladvlek',
					'macro fungus'     => 'macrofungus',
					'miner'            => 'mineerder',
					'miner > borer'    => 'mineerder > boorder',
					'oviposition scar' => 'ovipositie-litteken',
					// 'predator'         => 'predator',        // no translation necessary
					'pustule'          => 'wrat',
					'saprotrophic'     => 'saprotroof',
					'scale'            => 'schildluis',
					'stripe'           => 'streep',
					"witches' broom"   => "heksenbezem",
				);
				$mode = strtr($mode, $mode_trans_nl);
			// } elseif (get_locale() == 'en_US') {
			// 	$mode_trans_en = array(
			// 		'oviposition scar' => 'oviposi&shy;tion scar',
			// 		'saprotrophic'     => 'sapro&shy;trophic',
			// 	);
			// 	$mode = strtr($mode, $mode_trans_en);
			} else {
				$mode;
			}

			/* translation of stage terms */
			$stage = $row->stage;

			// replace 0 with empty string
			$stage = strtr($stage, "0", " ");

			if (
				get_locale() == 'nl_NL'
			) {
				$stage_trans_nl = array(
					'agamous gen.'    => 'agame gen.',
					'anamorph'        => 'anamorf',
					'egg'             => 'ei',
					'larva'           => 'larve',
					'older larva'     => 'oudere larve',
					'sexual gen.'     => 'sexuele gen.',
					'spring gen.'     => 'voorjaarsgen.',
					'summer gen.'     => 'zomergen.',
					'teleomorph'      => 'teleomorf',
					'young larva'     => 'jonge larve',
				);
				$stage = strtr($stage, $stage_trans_nl);
			} else {
				$stage;
			}

			/* replace 1 with camera SVG image */
			$parasite_with_image = str_replace("1", "<i class='parasite_with_image'>&nbsp;</i>", $row->parasite_with_image);

			/* fill the table */

			echo '<tr>';
			// echo '<td>' . $row->host . '</td>';
			echo '<td>' . $organ . '</td>';
			echo '<td>' . $mode . '</td>';
			echo '<td>' . $stage . '</td>';
			echo '<td>' . $row->tax_top . '</td>';
			echo '<td>' . $row->tax_middle . '</td>';
			echo '<td>' . $row->tax_family . '</td>';
			echo '<td><a href="' . get_site_url() . '/' . $row->parasite_slug . '">' . $row->parasite . '</a></td>';
			echo '<td>' . $parasite_with_image . '</td>';
			echo '<td>' . $row->genera_number . '</td>';
			echo '<td>' . $row->species_number . '</td>';
			// echo '<td>' . $row->host_slug . '</td>';
			// echo '<td>' . $row->parasite_slug . '</td>';

			echo '</tr>';
		}

		echo "</tbody></table>";

		?>
	</div><!-- .determination-table -->

	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			bladmineerders_fngl_edit_post_link('<span class="edit-link">', '</span>');
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<script type="text/javascript">
	new DataTable('#DeterminationTable', {
		paging: false,
		info: false,
		"language": {
			"search": "Filter",
		}
	});
</script>

<div class="table-legend">
	<?php get_template_part('template-parts/content', 'determination-legenda'); ?>
	<p style="clear:both">&nbsp;</p>
</div>