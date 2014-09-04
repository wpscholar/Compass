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

		//* Navigation Tab Fix
		navTabbing: function( $ ) {
			var $primaryNav, $button, hoverClass = 'menu-item-hover',

			/**
			 * Add in responsive menu feature.
			 *
			 * @since 1.0.0
			 */
			responsiveMenu = function() {
				$primaryNav = $( '#menu-primary-navigation' );
				$primaryNav.before( '<button id="js-menu-toggle" class="menu-primary-toggle">Menu</button>' );
				$button = $( '#js-menu-toggle' );
				$button.attr({
					'aria-controls': 'menu-primary-navigation',
					'aria-expanded': 'false'
				});

				$button.on( 'click.incipio', function() {
					if( 'true' === $(this).attr( 'aria-expanded' ) ) {
						closeMenu();
					} else {
						openMenu();
					}
				});
			},

			openMenu = function() {
				$primaryNav.slideDown();
				$button.attr({
					'aria-expanded': 'true'
				});
			},

			closeMenu = function() {
				$primaryNav.slideUp();
				$button.attr({
					'aria-expanded': 'false'
				});
			},

			/**
			 * Add class to menu item on hover.
			 *
			 * @since 1.0.0
			 */
			menuItemEnter = function() {
				$( this ).addClass( hoverClass );
			},

			/**
			 * After a short delay, remove a class when mouse leaves menu item.
			 *
			 * @since 1.0.0
			 */
			menuItemLeave = function() {
				$( this ).delay( '250' ).removeClass( hoverClass );
			},

			/**
			 * Toggle menu item class when a link fires a focus or blur event.
			 *
			 * @since 1.0.0
			 */
			menuItemToggleClass = function() {
				$( this ).parents( '.menu-item' ).toggleClass( hoverClass );
			},

			/**
			 * Fire events on document ready, and bind other events.
			 *
			 * @since 1.0.0
			 */
			ready = function() {
				responsiveMenu();

				$( '.menu li' )
					.on( 'mouseenter.incipio', menuItemEnter )
					.on( 'mouseleave.incipio', menuItemLeave )
					.find( 'a' )
					.on( 'focus.incipio blur.incipio', menuItemToggleClass );
			};

			// Only expose the ready function to the world
			return {
				ready: ready
			};
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
			$( '#site-inner' ).fitVids();
		}

	});

	// Document ready.
	jQuery(function($) {
		compass.skipLinks();
		compass.navTabbing($);
		compass.mobileNav();
		compass.loadFitVids();
	});
})( this, jQuery );
