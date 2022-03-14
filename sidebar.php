<?php
/**
 * The sidebar containing the main widget area
 *
 * @package bladmineerders-fngl
 * @since version 1.0.11
 */

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
?>

	<div class="sidebar-area-full"></div>
	<aside id="secondary" class="widget-area sidebar-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
	<div class="sidebar-area-full"></div>
