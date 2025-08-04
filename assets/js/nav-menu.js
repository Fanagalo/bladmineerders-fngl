( function( window, $, undefined ) {
	'use strict';
	// Add toggles to menus
	$( '#site-navigation' ).before( '<button class="menu-toggle" role="button" aria-pressed="false"></button>' ); 

	// Add toggles to sub menus
	$( '#site-navigation .sub-menu' ).before( '<button class="sub-menu-toggle" role="button" aria-pressed="false"></button>' ); 

	// Show/hide the navigation
	$( '.menu-toggle, .sub-menu-toggle' ).on( 'click', 

	function() {
		var $this = $( this );
		$this.attr( 'aria-pressed', 

			function( index, value ) {
				return 'false' === value ? 'true' : 'false';
				}
			);

			$this.toggleClass( 'activated' );
			$this.next( '#site-navigation, .sub-menu' ) .toggle() ;

		});
	}
)

( this, jQuery );