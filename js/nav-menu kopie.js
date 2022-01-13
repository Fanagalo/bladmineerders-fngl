( function( window, $, undefined ) {
'use strict';
$( 'menu' ).before( '<button class="menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to menus
$( 'menu .sub-menu' ).before( '<button class="sub-menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to sub menus
// Show/hide the navigation
$( '.menu-toggle, .sub-menu-toggle' ).on( 'click', function() {
var $this = $( this );
$this.attr( 'aria-pressed', function( index, value ) {
return 'false' === value ? 'true' : 'false';
});
$this.toggleClass( 'activated' );
$this.next( 'menu, .sub-menu' ).slideToggle(  '800' );
});
})( this, jQuery );