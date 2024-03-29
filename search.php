<?php
/**
 * The template for displaying search results pages
 *
 * @package bladmineerders-fngl
 * @since version 0.75
 */

get_header();
?>

<div class="main-area-full"></div>
<main id="main" class="main-area">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( $wp_query->found_posts . " " . esc_html__( 'Search Results for: %s', 'bladmineerders-fngl' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );

		endwhile;

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main>
<div class="main-area-full"></div>

<?php
get_template_part( 'inc/empty-bar' );
get_sidebar();
get_footer();
