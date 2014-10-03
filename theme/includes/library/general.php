<?php
/**
 * General theme helper functions.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

/**
 * Sets a common class, `.nav-menu`, for the custom menu widget if used in the
 * header right sidebar.
 *
 * @since  1.0.0
 * @param  array $args Header menu args.
 * @return array $args Modified header menu args.
 */
function flagship_header_menu_args( $args ) {
	$args['menu_class'] .= ' nav-menu';
	return $args;
}

/**
 * Wrap the header navigation menu in its own nav tags with markup API.
 *
 * @since  1.0.0
 * @param  $menu Menu output.
 * @return string $menu Modified menu output.
 */
function flagship_header_menu_wrap( $menu ) {
	return sprintf( '<nav %s>', hybrid_get_attr( 'widget-menu', 'header' ) ) . $menu . '</nav>';
}

add_filter( 'get_search_form', 'flagship_get_search_form' );
/**
 * Customize the search form to improve accessibility.
 *
 * @since  1.0.0
 * @return string Search form markup.
 */
function flagship_get_search_form() {
	$search = new Flagship_Search_Form;
	return $search->get_form();
}

add_action( 'widgets_init', 'flagship_register_footer_widget_areas' );
/**
 * Register footer widget areas based on the number of widget areas the user
 * wishes to create with `add_theme_support()`.
 *
 * @since  1.0.0
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
 * @uses   locate_template() Load the footer widget template.
 * @return null Return early if there's no theme support.
 */
function flagship_footer_widgets() {
	// Get the current theme's support for footer widgets.
	$footer_widgets = get_theme_support( 'flagship-footer-widgets' );

	if ( ! $footer_widgets || ! isset( $footer_widgets[0] ) || ! is_numeric( $footer_widgets[0] ) ) {
		return;
	}

	// Return early if the first widget area has no widgets.
	if ( ! is_active_sidebar( 'footer-1' ) ) {
		return;
	}

	$footer_widgets = (int) $footer_widgets[0];

	$counter = 1;

	?>
	<div <?php hybrid_attr( 'footer-widgets' ); ?>>
		<div class="wrap">
			<?php while ( $counter <= $footer_widgets ) : ?>
				<?php include( locate_template( 'sidebar/footer-widgets.php' ) ); ?>
				<?php $counter++; ?>
			<?php endwhile; ?>
		</div>
	</div>
	<?php
}
