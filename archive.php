<?php
/**
 * The template for displaying archive pages
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
				<?php echo __( get_the_archive_title() ); ?>
			</h1>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
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
get_sidebar();
get_footer();
