/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
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

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );


	/**
	 * Container width
	 */
	wp.customize( 'xews_lite_container_width', function( value ) {
		value.bind( function( to ) {
			$( '.container' ).css('max-width', to+'px' );
		} );
	} );


	//Site title & tagline color
	wp.customize( 'xews_lite_title_tagline_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a,.main-header-xews-wrapper.main-header-elem-wrap.header-elements-wrap.cww-flex .site-title a,.site-branding p.site-description,.main-header-xews-wrapper.main-header-elem-wrap.header-elements-wrap.cww-flex p.site-description' ).css('color', to );
		} );
	} );

	//main menu font size
	wp.customize( 'xews_lite_nav_font_size', function( value ) {
		value.bind( function( to ) {
			$( '.main-navigation .menu-primary-menu-container ul li a' ).css('font-size', to+'px' );
		} );
	} );

	//main menu text transform
	wp.customize( 'xews_lite_nav_text_transform', function( value ) {
		value.bind( function( to ) {
			$( '.main-navigation .menu-primary-menu-container ul li a' ).css('text-transform', to );
		} );
	} );


}( jQuery ) );
