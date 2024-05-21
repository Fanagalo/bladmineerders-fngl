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
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php bladmineerders_fngl_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		// todo: can the next section be deleted?
		// wp_link_pages( array(
		// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bladmineerders-fngl' ),
		// 	'after'  => '</div>',
		// ) );
		?>
	</div><!-- .entry-content -->

	<?php 
		// todo: can the next section be deleted?
		// if ( get_edit_post_link() ) : 
	?>
		<footer class="entry-footer">
			<?php
				bladmineerders_fngl_edit_post_link('<span class="edit-link">','</span>');
			?>
		</footer><!-- .entry-footer -->
	<?php 
		// todo: can the next section be deleted?
		// endif; 
	?>
</article><!-- #post-<?php the_ID(); ?> -->
