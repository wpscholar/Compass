/**
 * Global JavaScript for Compass
 *
 * Includes all JS which is required within all sections of the theme.
 */

window.compass = window.compass || {};

(function( window, $, undefined ) {
	'use strict';

	var compass = window.compass;

	$.extend( compass, {

		//* Skip Link Focus Fix
		skipLinks: function() {
			var eventMethod,
				isWebkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
				isOpera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
				isIe     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

			if ( ( isWebkit || isOpera || isIe ) && 'undefined' !== typeof( document.getElementById ) ) {
				eventMethod = ( window.addEventListener ) ? 'addEventListener' : 'attachEvent';
				window[ eventMethod ]( 'hashchange', function() {
					var element = document.getElementById( location.hash.substring( 1 ) );

					if ( element ) {
						if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
							element.tabIndex = -1;
						}

						element.focus();
					}
				}, false );
			}
		},

		//* Mobile Menu
		mobileNav: function() {
			$( 'header .nav-menu' ).addClass( 'responsive-menu' ).before( '<div class="responsive-menu-icon"></div>' );

			$( '.responsive-menu-icon' ).click( function() {
				$( this ).next( 'header .nav-menu' ).slideToggle();
			});

			$( window ).resize( function() {
				if ( window.innerWidth > 768 ) {
					$( 'header .nav-menu, nav .sub-menu' ).removeAttr( 'style' );
					$( '.responsive-menu > .menu-item' ).removeClass( 'menu-open' );
				}
			});

			$( '.responsive-menu > .menu-item' ).click( function( event ) {
				if (event.target !== this) {
					return;
				}
				$( this ).find( '.sub-menu:first' ).slideToggle(function() {
					$( this ).parent().toggleClass( 'menu-open' );
				});
			});
		},

		//* FitVids Init
		loadFitVids: function() {
			if ( $.fn.fitVids ) {
				$( '#site-inner' ).fitVids();
			}
		}

	});

	// Document ready.
	jQuery(function() {
		compass.skipLinks();
		compass.mobileNav();
		compass.loadFitVids();
		jQuery( document ).gamajoAccessibleMenu();
	});
})( this, jQuery );

// jQuery(document).gamajoAccessibleMenu();
