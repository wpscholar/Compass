<?php
/**
 * A template part to display single entry navigation and pagination for archives.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */
?>

<?php if ( is_singular( 'post' ) ) : // If viewing a single post page. ?>

	<nav class="nav-single">
		<?php previous_post_link( '<span class="nav-previous">' . __( '%link', 'compass' ) . '</span>', '&larr; Previous Post' ); ?>
		<?php next_post_link(     '<span class="nav-next">' . __( '%link', 'compass' ) . '</span>', 'Next Post &rarr;' ); ?>
	</nav><!-- .nav-singl -->

<?php elseif ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive, or search results. ?>

	<?php loop_pagination(
		array(
			'prev_text' => _x( '&larr; <span class="screen-reader-text">Previous Page</span>', 'posts navigation', 'compass' ),
			'next_text' => _x( '<span class="screen-reader-text">Next Page</span> &rarr;', 'posts navigation', 'compass' )
		)
	); ?>

<?php endif; // End check for type of page being viewed. ?>
