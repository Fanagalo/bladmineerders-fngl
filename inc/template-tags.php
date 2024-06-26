<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Fanagalo_underscores_core
 */

if ( ! function_exists( 'bladmineerders_fngl_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function bladmineerders_fngl_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'bladmineerders-fngl' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'bladmineerders_fngl_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function bladmineerders_fngl_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'bladmineerders-fngl' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'bladmineerders_fngl_edit_post_link' ) ) :
	/**
	 * Edit button function with default and customizable tags  
	 */
	function bladmineerders_fngl_edit_post_link($before = '<span class="edit-link">', $after = '</span>') {

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'bladmineerders-fngl' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			$before,
			$after
		);
	}
endif;

if ( ! function_exists( 'bladmineerders_fngl_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bladmineerders_fngl_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'bladmineerders-fngl' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'bladmineerders-fngl' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bladmineerders-fngl' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'bladmineerders-fngl' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		/* Edit button function removed from this section to use separately */ 
	}
endif;


if ( ! function_exists( 'bladmineerders_fngl_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function bladmineerders_fngl_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

/**
 * Function for displaying Roman number as month
 * inspiration : http://www.hashbangcode.com/blog/php-function-turn-integer-roman-numerals
 */

function MonthRoman($integer) { 
	$integer = intval($integer);
		$result = '';

		$lookup = array(
		'xii'  => 12,
		'xi'   => 11,
		'x'    => 10,
		'ix'   =>  9,
		'viii' =>  8,
		'vii'  =>  7,
		'vi'   =>  6,
		'v'    =>  5,
		'iv'   =>  4,
		'iii'  =>  3,
		'ii'   =>  2,
		'i'    =>  1);

	foreach($lookup as $roman => $value) {
		$matches = intval($integer/$value);
		$result .= str_repeat($roman,$matches);
		$integer = $integer % $value;
	}
	return $result;
}


