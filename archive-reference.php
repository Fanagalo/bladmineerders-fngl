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
        <a name="top"></a>

        <?php

        $results = $wpdb->get_results("
                SELECT post_title, post_content 
                FROM $wpdb->posts
                WHERE post_status = 'publish'
                AND post_type = 'reference'
                ORDER BY wp_posts.post_title ASC
        ");

        echo '<dl class="reference">';

        foreach ( $results as $result ) {
            echo '<dt>' . $result->post_title . '</dt>';
            echo '<dd>' . $result->post_content . '</dd>';
        }
        echo '</dl>';

        ?>

</main>
<div class="main-area-full"></div>



<?php

get_footer();