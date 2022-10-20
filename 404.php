<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bladmineerders-fngl' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bladmineerders-fngl' ); ?></p>

		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main>
<div class="main-area-full"></div>

<?php
get_template_part( 'inc/empty-bar' );
get_sidebar();
get_footer();
