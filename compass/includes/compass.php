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
 * Registers custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function compass_register_image_sizes() {
	//* Sets the 'post-thumbnail' size.
	set_post_thumbnail_size( 175, 130, true );

	//* Adds the 'compass-full' image size.
	add_image_size( 'compass-full', 1025, 500, false );
}

add_filter( 'excerpt_more', 'compass_excerpt_more' );
/**
 * Adds a read more button to post excerpts.
 *
 * @since  1.0.0
 * @access public
 * @param  string     $more
 * @return string
 */
function compass_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'compass' ) . ' &rarr;</a>';
}

add_filter( 'excerpt_length', 'compass_excerpt_length' );
/**
 * Adds a custom excerpt length.
 *
 * @since  1.0.0
 * @access public
 * @param  int     $length
 * @return int
 */
function compass_excerpt_length( $length ) {
	return 60;
}

/**
 * Output primary nav menu fallback message.
 *
 * @since 1.0.0
 *
 * @param  array $args
 * @return string
 */
function compass_nav_fallback_cb( $args ) {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	?>
	<p class="no-menu">
		<?php _e( 'Ready to create your first menu?', 'compass' ); ?>

		<?php
		printf( '<a class="button" href="%s">%s</a>',
			esc_url( admin_url( 'nav-menus.php' ) ),
			__( 'Let\'s Get Started!', 'compass' )
		);
		?>
	</p>
	<?php
}

add_action( 'wp_footer', 'compass_footer_creds' );
/**
 * Displays footer credits for the theme.
 *
 * @since  1.0.0
 */
function compass_footer_creds() {
	echo '<p class="credit">';
		printf(
			/* Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link, and 4 is theme name/link. */
			__( 'Copyright &#169; %1$s %2$s. Powered by %3$s and %4$s.', 'compass' ),
				date_i18n( 'Y' ), hybrid_get_site_link(), hybrid_get_wp_link(), hybrid_get_theme_link()
			);
	echo '</p><!-- .credit -->';
}
