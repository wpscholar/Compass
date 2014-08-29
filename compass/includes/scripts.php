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

add_action( 'wp_enqueue_scripts', 'compass_enqueue_styles' );
/**
 * Enqueue scripts and styles.
 */
function compass_enqueue_styles() {
	$theme = wp_get_theme();
	wp_enqueue_style( 'brick-fonts', '//brick.a.ssl.fastly.net/Raleway:400,600/Clear+Sans:300,300i,600,800', array(), $theme->get( 'Version' ) );
}
