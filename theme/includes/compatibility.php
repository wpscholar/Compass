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

add_action( 'after_setup_theme', 'compass_jetpack_setup', 15 );
/**
 * Make adjustments to the theme when Jetpack is installed and activated.
 *
 * @since  1.0.0
 * @return null if Jetpack isn't active
 */
function compass_jetpack_setup() {
	//* Return early if Jetpack isn't enabled.
	if ( ! class_exists( 'Jetpack' ) ) {
		return;
	}

	//* Add support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );

	//* Get the active jetpack modules.
	$modules = get_option( 'jetpack_active_modules' );

	//* Remove cleaner gallery if either Tiled Galleries or Carousel is active.
	if ( count( array_intersect( array( 'tiled-gallery', 'carousel' ), (array) $modules ) ) > 0 ) {
		remove_theme_support( 'cleaner-gallery' );
	}
}
