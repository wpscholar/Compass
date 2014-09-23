<?php
/**
 * The after-header nav menu template.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */
?>

<?php if ( has_nav_menu( 'after-header' ) ) : ?>

	<nav <?php hybrid_attr( 'menu', 'after-header' ); ?>>

		<span id="menu-after-header-title" class="menu-toggle off-screen">
			<button class="screen-reader-text"><?php
				/* Translators: %s is the nav menu name. This is the nav menu title shown to screen readers. */
				printf( _x( '%s Menu', 'nav menu title', 'compass' ), hybrid_get_menu_location_name( 'after-header' ) );
			?></button>
		</span><!-- .menu-toggle -->

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'after-header',
				'container'       => '',
				'menu_id'         => 'after-header',
				'menu_class'      => 'nav-menu after-header',
				'fallback_cb'     => '',
				'items_wrap'      => '<div class="wrap"><ul id="%s" class="%s">%s</ul></div>',
			)
		); ?>

	</nav><!-- #menu-after-header -->

	<?php

endif; // End check for menu.
