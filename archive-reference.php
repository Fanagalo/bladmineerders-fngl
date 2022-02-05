<?php
/**
 * The template for displaying archive page of the CPT "reference"
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>

<main id="main" class="main-area">
    <div class="entry-content">

        <header class="page-header">
			<h1><?php printf( __( '
				[:nl]Literatuur[:]
				[:en]References[:]
			') ); ?></h1>
        </header>

        <?php printf( __( '
            <div class="panel light-bg">
                [:nl]
                    <h2>Sneller zoeken met browser functionaliteit</h2>

                    <p>Deze literatuurlijst bestaat uit één webpagina met alle, duizenden bronverwijzingen. 
                    Een auteur is het makkelijkst te vinden door de browser (Chrome, Safari, Firefox, Edge) het zoekwerk te laten doen. 
                    Gebruik de toetscombinatie <strong>ctrl + F</strong> (Windows) of <strong>cmd + F</strong> (macOS). 
                    Deze methode is sneller en vollediger dan scrollen door de pagina.</p>
                [:en]
                    <h2>Faster search with browser functionality</h2>

                    <p>This list of references consists of one webpage that contains all thousands of source references. 
                    The fastest way to find an author is to let the browser (Chrome, Safari, Firefox, Edge) search for you. 
                    Use the keyboard shortcut <strong>ctrl + F</strong> (Windows) of <strong>cmd + F</strong> (macOS).
                    This method is faster and more comprehensive than scrolling the page.</p>
                [:]
            </div>
		') ); ?>

        <a name="top"></a>

        <?php
            $results = $wpdb->get_results("
                SELECT post_title, post_content, post_name 
                FROM $wpdb->posts
                WHERE post_status = 'publish'
                AND post_type = 'reference'
                ORDER BY wp_posts.post_name ASC
            ");

            echo '<dl class="reference">';

            foreach ( $results as $result ) {
                echo '<dt>' . $result->post_title . '</dt>';
                echo '<dd>' . $result->post_content . '</dd>';
            }
            echo '</dl>';
        ?>
    </div><!-- .entry-content -->
</main>

<div class="main-area-full"></div>

<?php
get_footer();