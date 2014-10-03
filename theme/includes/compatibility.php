<?php
/**
 * Plugin Compatibility File
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

add_action( 'after_setup_theme', 'compass_jetpack_setup', 12 );
/**
 * Make adjustments to the theme when Jetpack is installed and activated.
 *
 * @since  1.0.0
 * @return void
 */
function compass_jetpack_setup() {
	// Return early if Jetpack isn't activated.
	if ( ! class_exists( 'Jetpack' ) ) {
		return;
	}

	// Add support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

	// Get the active jetpack modules.
	$modules   = get_option( 'jetpack_active_modules' );

	// List all modules which conflict with the Cleaner Gallery feature.
	$conflicts = array(
		'tiled-gallery',
		'carousel',
	);

	// Remove Cleaner Gallery support if any conflicting modules are active.
	if ( count( array_intersect( $conflicts, (array) $modules ) ) !== 0 ) {
		remove_theme_support( 'cleaner-gallery' );
	}
}
