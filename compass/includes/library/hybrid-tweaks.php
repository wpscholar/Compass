<?php
/**
 * Tweaks and Adjustments for the Hybrid Core Framework.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

//* Remove the default Hybrid head elements.
remove_action( 'wp_head', 'hybrid_meta_template', 1 );
remove_action( 'wp_head', 'hybrid_doctitle',      0 );

add_action( 'wp_head', 'flagship_doctitle',  0 );
/**
 * Add the title to the header with a more SEO-friendly seperator.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function flagship_doctitle() {
	printf( "<title>%s</title>\n", wp_title( '-', false ) );
}

add_filter( 'hybrid_content_template_hierarchy', 'flagship_content_template_hierarchy' );
/**
 * Search the template paths and replace them with singular and archive versions.
 *
 * By default, the content template heirarchy forces you to add logic for single
 * and archive content within the templates themsleves. This makes the templates
 * overly complex and I would prefer to seperate them into individual files.
 *
 * @since  1.0.0
 * @access public
 * @param  array
 * @return array
 */
function flagship_content_template_hierarchy( $templates ) {
	if ( is_singular() || is_attachment() ) {
		$templates = str_replace( 'content/', 'content/singular/', $templates );
	} else {
		$templates = str_replace( 'content/', 'content/archive/', $templates );
	}
	return $templates;
}

add_filter( 'hybrid_site_title', 'flagship_seo_site_title' );
/**
 * Returns the linked site title wrapped in a `<p>` tag unless on the home page
 * or the main blog page where no other H1 exists.
 *
 * @since  2.0.0
 * @access public
 * @param  $title
 * @return string
 */
function flagship_seo_site_title( $title ) {
	if ( is_front_page() || is_home() ) {
		return $title;
	}
	return str_replace( array( '<h1', '</h1' ), array( '<p', '</p' ), $title );
}

add_filter( 'hybrid_site_description', 'flagship_seo_site_description' );
/**
 * Returns the site description wrapped in a `<p>` tag.
 *
 * @since  2.0.0
 * @access public
 * @param  $desc
 * @return string
 */
function flagship_seo_site_description( $desc ) {
	return str_replace( array( '<h2', '</h2' ), array( '<p', '</p' ), $desc );
}

add_filter( 'excerpt_more', 'flagship_seo_excerpt_more' );
/**
 * Filter the default Hybrid more link to add a rel="nofollow" attribute.
 *
 * @since  1.0.0
 * @access public
 * @param  string $text
 * @return string
 */
function flagship_seo_excerpt_more( $text ) {
	return str_replace( 'class="more-link"', 'rel="nofollow" class="more-link"', $text );
}

add_action( 'widgets_init', 'flagship_register_footer_widget_areas' );
/**
 * Register footer widget areas based on the number of widget areas the user
 * wishes to create with `add_theme_support()`.
 *
 * @since 1.0.0
 *
 * @uses   register_sidebar() Register footer widget areas.
 * @return null Return early if there's no theme support.
 */
function flagship_register_footer_widget_areas() {
	// Get the current theme's support for footer widgets.
	$footer_widgets = get_theme_support( 'flagship-footer-widgets' );

	if ( ! $footer_widgets || ! isset( $footer_widgets[0] ) || ! is_numeric( $footer_widgets[0] ) ) {
		return;
	}

	$footer_widgets = (int) $footer_widgets[0];

	$counter = 1;

	while ( $counter <= $footer_widgets ) {
		hybrid_register_sidebar(
			array(
				'id'          => sprintf( 'footer-%d', $counter ),
				'name'        => sprintf( __( 'Footer %d', 'compass' ), $counter ),
				'description' => sprintf( __( 'Footer %d widget area.', 'compass' ), $counter ),
			)
		);

		$counter++;
	}
}

add_action( 'tha_footer_before', 'flagship_footer_widgets' );
/**
 * Displays all registered footer widget areas using a template.
 *
 * @since  1.0.0
 *
 * @uses   locate_template() Load the footer widget template.
 * @return null Return early if there's no theme support.
 */
function flagship_footer_widgets() {
	//* Get the current theme's support for footer widgets.
	$footer_widgets = get_theme_support( 'flagship-footer-widgets' );

	if ( ! $footer_widgets || ! isset( $footer_widgets[0] ) || ! is_numeric( $footer_widgets[0] ) ) {
		return;
	}

	//* Check to see if first widget area has widgets. If not, do nothing. No need to check all footer widget areas.
	if ( ! is_active_sidebar( 'footer-1' ) ) {
		return;
	}

	$footer_widgets = (int) $footer_widgets[0];

	$counter = 1;

	echo '<div ' . hybrid_get_attr( 'footer-widgets' ) . '>';
		echo '<div class="wrap">';
			while ( $counter <= $footer_widgets ) {
				include( locate_template( 'sidebar/footer-widgets.php' ) );
				$counter++;
			}
		echo '</div>';
	echo '</div>';
}
