<?php
/**
 * HTML attribute functions and filters. The purposes of this is to provide a
 * way for theme/plugin devs to hook into the attributes for specific HTML
 * elements and create new or modify existing attributes. The biggest benefit of
 * using this is to provide richer microdata while being forward compatible with
 * the ever-changing Web.  Currently, the default microdata vocabulary supported
 * is Schema.org.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

/* Attributes for major structural elements. */
add_filter( 'hybrid_attr_header',  'flagship_attr_header_class'         );
add_filter( 'hybrid_attr_content', 'flagship_attr_content_class'        );
add_filter( 'hybrid_attr_footer',  'flagship_attr_footer_class'         );
add_filter( 'hybrid_attr_sidebar', 'flagship_attr_sidebar_class', 10, 2 );
add_filter( 'hybrid_attr_menu',    'flagship_attr_menu_class',    10, 2 );

/* Header attributes. */
add_filter( 'hybrid_attr_branding',         'flagship_attr_branding_class'   );
add_filter( 'hybrid_attr_site-title',       'flagship_attr_site_title_class' );
add_filter( 'hybrid_attr_site-description', 'flagship_attr_site_desc_class'  );

/* Post-specific attributes. */
add_filter( 'hybrid_attr_entry-summary',   'flagship_attr_entry_summary_class' );

/**
 * Page <header> element attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @return array
 */
function flagship_attr_header_class( $attr ) {
	$attr['class'] = 'header';
	return $attr;
}

/**
 * Main content container of the page attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @return array
 */
function flagship_attr_content_class( $attr ) {
	$attr['class'] = 'content';
	return $attr;
}

/**
 * Page <footer> element attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @return array
 */
function flagship_attr_footer_class( $attr ) {
	$attr['class'] = 'footer';
	return $attr;
}

/**
 * Sidebar attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @param  string  $context
 * @return array
 */
function flagship_attr_sidebar_class( $attr, $context ) {
	$class = 'sidebar';
	if ( ! empty( $context ) ) {
		$class .= " sidebar-{$context}";
	}
	$attr['class'] = $class;
	return $attr;
}

/**
 * Nav menu attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @param  string  $context
 * @return array
 */
function flagship_attr_menu_class( $attr, $context ) {
	$class = 'menu';
	if ( ! empty( $context ) ) {
		$class .= " menu-{$context}";
	}
	$attr['class'] = $class;
	return $attr;
}

/* === header === */

/**
 * Branding (usually a wrapper for title and tagline) attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @return array
 */
function flagship_attr_branding_class( $attr ) {
	$attr['class'] = 'branding';
	return $attr;
}

/**
 * Site title attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @param  string  $context
 * @return array
 */
function flagship_attr_site_title_class( $attr ) {
	$attr['class'] = 'site-title';
	return $attr;
}

/**
 * Site description attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @param  string  $context
 * @return array
 */
function flagship_attr_site_desc_class( $attr ) {
	$attr['class'] = 'site-description';
	return $attr;
}

/**
 * Post summary/excerpt attributes.
 *
 * @since  2.0.0
 * @access public
 * @param  array   $attr
 * @return array
 */
function flagship_attr_entry_summary_class( $attr ) {
	$attr['class'] = 'entry-content summary';
	return $attr;
}
