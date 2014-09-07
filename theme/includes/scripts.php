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
 * Enqueue theme styles.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function compass_enqueue_styles() {
	wp_enqueue_style( 'brick-fonts', '//brick.a.ssl.fastly.net/Raleway:400,600/Clear+Sans:300,300i,600,800', array(), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'compass_enqueue_scripts' );
/**
 * Enqueue theme scripts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function compass_enqueue_scripts() {
	$js_dir = trailingslashit( get_template_directory_uri() ) . 'js/';
	$suffix = hybrid_get_min_suffix();

	wp_enqueue_script( 'fitvids', $js_dir . "jquery.fitvids{$suffix}.js", array( 'jquery' ), null, true );
	wp_enqueue_script( 'compass', $js_dir . "theme{$suffix}.js", array( 'jquery', 'fitvids' ), null, true );
}
