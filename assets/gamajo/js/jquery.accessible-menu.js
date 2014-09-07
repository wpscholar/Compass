/**
 * Gamajo Accessible Menu.
 *
 * Improves menu accessibility in two ways:
 *  * Adds a delay to submenus disappearing when moving the mouse away.
 *  * Makes submenus appear when tabbing through menu items with the keyboard.
 *
 * Kudos to Rian Rietveld for the code on which this plugin is based.
 *
 * After enqueueing this file (or concatenating it with your theme JS file),
 * call it with:
 *
 * $( document ).gamajoAccessibleMenu();
 *
 * If you want to limit it to only certain menus, then change document to a
 * limited scope, e.g.
 *
 * $( '#menu-after-header' ).gamajoAccessibleMenu();
 *
 * Here are the default options:
 *
 * jQuery( document ).gamajoAccessibleMenu({
 *		// The CSS class to add to indicate item is hovered or focused
 *		hoverClass: 'menu-item-hover',
 *
 *		// The delay to keep submenus showing after mouse leaves
 *		hoverDelay: 250,
 *
 * 		// Selector for general menu items. If you remove the default menu item
 * 		// classes, then you may want to call this plugin with this value
 * 		// set to something like 'nav li' or '.menu li'.
 * 		menuItemSelector: '.menu-item'
 * });
 */

;(function( $, window, document, undefined ) {
	'use strict';

	// Create the defaults once
	var pluginName = 'gamajoAccessibleMenu',
		hoverTimeout = [],
		defaults = {
			// The CSS class to add to indicate item is hovered or focused
			hoverClass: 'menu-item-hover',

			// The delay to keep submenus showing after mouse leaves
			hoverDelay: 250,

			// Selector for general menu items. If you remove the default menu item
			// classes, then you may want to call this plugin with this value
			// set to something like 'nav li' or '.menu li'.
			menuItemSelector: '.menu-item'
		};

	// The actual plugin constructor
	function Plugin( element, options ) {
		this.element = element;
		// jQuery has an extend method which merges the contents of two or
		// more objects, storing the result in the first object. The first object
		// is generally empty as we don't want to alter the default options for
		// future instances of the plugin
		this.settings = $.extend( {}, defaults, options );
		// this._defaults = defaults;
		// this._name = pluginName;
		this.init();
	}

	// Avoid Plugin.prototype conflicts
	$.extend( Plugin.prototype, {
		init: function() {
			$( this.element )
				.on( 'mouseenter.' + pluginName, this.settings.menuItemSelector, this.settings, this.menuItemEnter )
				.on( 'mouseleave.' + pluginName, this.settings.menuItemSelector, this.settings, this.menuItemLeave )
				.find( 'a' )
				.on( 'focus.'  + pluginName + ', blur.' + pluginName, this.settings, this.menuItemToggleClass );
		},

		/**
		 * Add class to menu item on hover so it can be delayed on mouseout.
		 *
		 * @since 1.0.0
		 */
		menuItemEnter: function( event ) {
			// Clear all existing hover delays
			$.each( hoverTimeout, function( index ) {
				$( '#' + index ).removeClass( event.data.hoverClass );
				clearTimeout( hoverTimeout[index] );
			});
			// Reset list of hover delays
			hoverTimeout = [];

			$( this ).addClass( event.data.hoverClass );
		},

		/**
		 * After a short delay, remove a class when mouse leaves menu item.
		 *
		 * @since 1.0.0
		 */
		menuItemLeave: function( event ) {
			var $self = $( this );
			// Delay removal of class
			hoverTimeout[this.id] = setTimeout( function() {
				$self.removeClass( event.data.hoverClass );
			}, event.data.hoverDelay );
		},

		/**
		 * Toggle menu item class when a link fires a focus or blur event.
		 *
		 * @since 1.0.0
		 */
		menuItemToggleClass: function( event ) {
			$( this ).parents( event.data.menuItemSelector ).toggleClass( event.data.hoverClass );
		}
	});

	// A really lightweight plugin wrapper around the constructor,
	// preventing against multiple instantiations
	$.fn[ pluginName ] = function( options ) {
		this.each( function() {
			if ( ! $.data( this, 'plugin_' + pluginName ) ) {
				$.data( this, 'plugin_' + pluginName, new Plugin( this, options ) );
			}
		});

		// chain jQuery functions
		return this;
	};
})( jQuery, window, document );
