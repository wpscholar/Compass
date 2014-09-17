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
			var menuSelectors = [],
				menuSide      = 'right';

			if ( $( '#menu-header' ).length ) {
				menuSelectors.push( '#menu-header' );
			}

			if ( $( '#after-header' ).length ) {
				menuSelectors.push( '#menu-after-header' );
			}

			//* End here if we don't have a menu.
			if ( menuSelectors.length === 0 ) {
				return;
			}

			//* Add a responsive menu button.
			$( '#branding' ).before( '<button id="responsive-menu-button" class="menu-button" role="button" aria-pressed="false"></button>' );

			//* Switch the menu side if a RTL langauge is in use.
			if ( $( 'body' ).hasClass( 'rtl' ) ) {
				menuSide = 'left';
			}

			//* Sidr menu init.
			$( '#responsive-menu-button' ).sidr({
				name: 'sidr-main',
				renaming: false,
				side: menuSide,
				source: menuSelectors.toString(),
				onOpen: function() {
					$( '#responsive-menu-button' ).attr( 'aria-pressed', function() {
						return 'true';
					});
					$( '#responsive-menu-button' ).toggleClass( 'activated' );
					$( '.site-container' ).on( 'click.wpscCloseSidr', function() {
						$.sidr( 'close', 'sidr-main' );
						event.preventDefault();
					});
				},
				onClose: function() {
					$( '#responsive-menu-button' ).attr( 'aria-pressed', function() {
						return 'false';
					});
					$( '#responsive-menu-button' ).toggleClass( 'activated' );
					$( '.site-container' ).off( 'click.wpscCloseSidr' );
				}
			});

			//* Close sidr menu if open on larger screens
			$( window ).resize(function() {
				if( window.innerWidth > 1023 ) {
					$.sidr('close', 'sidr-main');
					$( '#responsive-menu-button' ).attr( 'aria-pressed', function() {
						return 'false';
					});
				}
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
