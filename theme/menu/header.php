<?php
/**
 * The header nav menu template.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */
$fallback = '';
if ( ! has_nav_menu( 'header-right' ) && ! has_nav_menu( 'after-header' ) ) {
	$fallback = 'compass_nav_fallback_cb';
}
?>

<section <?php hybrid_attr( 'header-right' ); ?>>

	<nav <?php hybrid_attr( 'menu', 'header' ); ?>>

		<?php if ( has_nav_menu( 'header-right' ) ) : ?>

			<span id="menu-header-title" class="menu-toggle off-screen">
				<button class="screen-reader-text"><?php
					/* Translators: %s is the nav menu name. This is the nav menu title shown to screen readers. */
					printf( _x( '%s Menu', 'nav menu title', 'compass' ), hybrid_get_menu_location_name( 'header-right' ) );
				?></button>
			</span><!-- .menu-toggle -->

		<?php endif; ?>

		<?php
		$right = apply_filters( 'nav_right', '<li class="right">' . get_search_form( false ) . '</li>' );
		wp_nav_menu(
			array(
				'theme_location'  => 'header',
				'container'       => '',
				'menu_id'         => 'header-nav',
				'menu_class'      => 'nav-menu header',
				'fallback_cb'     => $fallback,
				'items_wrap'      => '<ul id="%s" class="%s">%s</ul>',
			)
		); ?>

	</nav><!-- #menu-header -->

</section>
