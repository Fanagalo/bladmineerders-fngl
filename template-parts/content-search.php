<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fanagalo_underscores_core
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-meta">
        <?php bladmineerders_fngl_edit_post_link('<span class="item-edit-link">','</span>'); ?>
    </div>

	<header class="entry-header">
		<h2 class="entry-title">
			<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a> ' ); ?>
			<span class="search-cat-links"><?php echo __( get_the_category_list( ', ', 'bladmineerders-fngl' ) ); ?></span>
		</h2>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-<?php the_ID(); ?> -->
