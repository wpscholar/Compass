<?php
/**
 * General Theme-Specific Functions.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

add_action( 'init', 'compass_register_image_sizes', 5 );
/**
 * Register custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function compass_register_image_sizes() {
	// Set the 'post-thumbnail' size.
	set_post_thumbnail_size( 175, 130, true );

	// Add the 'compass-full' image size.
	add_image_size( 'compass-full', 1025, 500, false );
}

add_filter( 'excerpt_length', 'compass_excerpt_length' );
/**
 * Add a custom excerpt length.
 *
 * @since  1.0.0
 * @access public
 * @param  integer $length
 * @return integer
 */
function compass_excerpt_length( $length ) {
	return 60;
}

add_action( 'tha_entry_top', 'compass_do_sticky_banner' );
/**
 * Add markup for a sticky ribbon on sticky posts in archive views.
 *
 * @since   1.0.0
 * @return  void
 */
function compass_do_sticky_banner() {
	if ( is_singular() || ! is_sticky() ) {
		return;
	}
	?>
	<div class="corner-ribbon sticky">
		<p class="ribbon-content"><?php _e( 'Sticky', 'compass' ); ?></p>
	</div>
	<?php
}

add_action( 'wp_footer', 'compass_footer_creds' );
/**
 * Display footer credits for the theme.
 *
 * @since   1.0.0
 * @return  void
 */
function compass_footer_creds() {
	echo '<p class="credit">';
		printf(
			// Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link, and 4 is theme name/link.
			__( 'Copyright &#169; %1$s %2$s. Powered by %3$s and %4$s.', 'compass' ),
				date_i18n( 'Y' ), hybrid_get_site_link(), hybrid_get_wp_link(), hybrid_get_theme_link()
			);
	echo '</p><!-- .credit -->';
}
