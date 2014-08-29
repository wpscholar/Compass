<?php
/**
 * Script and Style Loaders and Related Functions.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

add_action( 'wp_enqueue_scripts', 'compass_scripts' );
/**
 * Enqueue scripts and styles.
 */
function compass_scripts() {
	$theme = wp_get_theme();
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,400,600,700', array(), $theme->get( 'Version' ) );
}
