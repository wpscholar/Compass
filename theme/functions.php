<?php
/**
 * Theme Setup Functions and Definitions.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

// Include Hybrid Core.
require_once( trailingslashit( get_template_directory() ) . 'hybrid-core/hybrid.php' );
new Hybrid();

add_action( 'after_setup_theme', 'compass_setup', 5 );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since   1.0.0
 * @return  void
 */
function compass_setup() {
	// Add Support for Theme layouts.
	add_theme_support(
		'theme-layouts',
		array(
			'1c'        => __( '1 Column Wide',                'compass' ),
			'1c-narrow' => __( '1 Column Narrow',              'compass' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'compass' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'compass' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' )
	);

	// Handle content width for embeds and images.
	hybrid_set_content_width( 1140 );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Load theme styles.
	add_theme_support( 'hybrid-core-styles', array( 'google-fonts', 'parent', 'style', )	);

	// Add navigation menus.
	register_nav_menu( 'after-header', _x( 'After Header Menu', 'nav menu location', 'compass' ) );

	$formats = array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat',
	);

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', $formats );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add support for easer image usage.
	add_theme_support( 'get-the-image' );

	// Nicer [gallery] shortcode implementation.
	add_theme_support( 'cleaner-gallery' );

	// Better captions for themes to style.
	add_theme_support( 'cleaner-caption' );

	// Add support for loop pagination.
	add_theme_support( 'loop-pagination' );

	// Add support for flagship footer widgets.
	add_theme_support( 'flagship-footer-widgets', 3 );
}

add_action( 'after_setup_theme', 'compass_includes' );
/**
 * Load all required theme files.
 *
 * @since   1.0.0
 * @return  void
 */
function compass_includes() {
	// Set the includes directories.
	$includes_dir = get_template_directory() . '/includes';

	// Load the main init file in the library directory.
	require_once $includes_dir . '/library/init.php';

	// Load all PHP files in the vendor directory.
	require_once $includes_dir . '/vendor/tha-theme-hooks.php';

	// Load all PHP files in the includes directory.
	require_once $includes_dir . '/compatibility.php';
	require_once $includes_dir . '/general.php';
	require_once $includes_dir . '/scripts.php';
	require_once $includes_dir . '/widgetize.php';
}

// Add a hook for child themes to execute code.
do_action( 'flagship_after_setup_parent' );
