/**
 * Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Customizer preview reload changes asynchronously.
 * Things like site title, description, and background color changes.
 */

( function( $ ) {
	
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Agama skin
	wp.customize( 'agama_skin', function( value ) {
		value.bind( function( to ) {
			var skin = jQuery('#agama-customize-css');
			if( '' !== to ) {
				skin.prepend( 'import url('+ agama.skin_url + to +'.css);' );
			}
		} );
	
	} );
} )( jQuery );
