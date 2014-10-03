<?php
/**
 * A template part to display comment pagination.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */
?>

<?php if ( get_option( 'page_comments' ) && 1 < get_comment_pages_count() ) : ?>

	<nav class="comments-nav" role="navigation" aria-labelledby="comments-nav-title">

		<h3 id="comments-nav-title" class="screen-reader-text"><?php _e( 'Comments Navigation', 'compass' ); ?></h3>

		<?php previous_comments_link( _x( '&larr; Previous', 'comments navigation', 'compass' ) ); ?>

		<span class="page-numbers"><?php
			// Translators: Comments page numbers. 1 is current page and 2 is total pages.
			printf( __( 'Page %1$s of %2$s', 'compass' ), get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1, get_comment_pages_count() );
		?></span>

		<?php next_comments_link( _x( 'Next &rarr;', 'comments navigation', 'compass' ) ); ?>

	</nav><!-- .comments-nav -->

	<?php

endif;
