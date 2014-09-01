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
			var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
				is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
				is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

			if ( ( is_webkit || is_opera || is_ie ) && 'undefined' !== typeof( document.getElementById ) ) {
				var eventMethod = ( window.addEventListener ) ? 'addEventListener' : 'attachEvent';
				window[ eventMethod ]( 'hashchange', function() {
					var element = document.getElementById( location.hash.substring( 1 ) );

					if ( element ) {
						if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
							element.tabIndex = -1;

						element.focus();
					}
				}, false );
			}
		},

		//* Navigation Tab Fix
		navTabbing: function( a ) {

			var b, c, d = "menu-item-hover",
				e = function() {
					b = a("#menu-after-header"), b.before('<button id="js-menu-toggle" class="menu-primary-toggle">Menu</button>'), c = a("#js-menu-toggle"), c.attr({
						"aria-controls": "menu-primary-navigation",
						"aria-expanded": "false"
					}), c.on("click.dt", function() {
						"true" === a(this).attr("aria-expanded") ? g() : f()
					})
				},
				f = function() {
					b.slideDown(), c.attr({
						"aria-expanded": "true"
					})
				},
				g = function() {
					b.slideUp(), c.attr({
						"aria-expanded": "false"
					})
				},
				h = function() {
					a(this).addClass(d)
				},
				i = function() {
					a(this).delay("250").removeClass(d)
				},
				j = function() {
					a(this).parents(".menu-item").toggleClass(d)
				},
				k = function() {
					e(), a(".menu li").on("mouseenter.dt", h).on("mouseleave.dt", i).find("a").on("focus.dt blur.dt", j)
				};
			return {
				ready: k
			}
		},

		//* Mobile Menu
		mobileNav: function() {

			$('header .nav-menu').addClass('responsive-menu').before('<div class="responsive-menu-icon"></div>');

			$('.responsive-menu-icon').click(function(){
				$(this).next('header .nav-menu').slideToggle();
			});

			$(window).resize(function(){
				if(window.innerWidth > 768) {
					$('header .nav-menu, nav .sub-menu').removeAttr('style');
					$('.responsive-menu > .menu-item').removeClass('menu-open');
				}
			});

			$('.responsive-menu > .menu-item').click(function(event){
				if (event.target !== this)
				return;
					$(this).find('.sub-menu:first').slideToggle(function() {
					$(this).parent().toggleClass('menu-open');
				});
			});
		}

	});

	// Document ready.
	jQuery(function() {
		compass.skipLinks();
		compass.navTabbing();
		compass.mobileNav();
	});

})( this, jQuery );
