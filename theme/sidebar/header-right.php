<?php
/**
 * Header Right Sidebar Template
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @since       1.0.0
 */
add_filter( 'wp_nav_menu_args', 'flagship_header_menu_args' );
add_filter( 'wp_nav_menu', 'flagship_header_menu_wrap' );
?>

<?php if ( is_active_sidebar( 'header-right' ) ) : ?>

	<div <?php hybrid_attr( 'header-right' ); ?>>

		<?php dynamic_sidebar( 'header-right' ); ?>

	</div><!-- .header-right -->

	<?php

endif;

remove_filter( 'wp_nav_menu_args', 'flagship_header_menu_args' );
remove_filter( 'wp_nav_menu', 'flagship_header_menu_wrap' );
