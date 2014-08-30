<?php
/**
 * A template part for displaying single status entries.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>

	<?php tha_entry_top(); ?>

	<?php if ( get_option( 'show_avatars' ) ) : // If avatars are enabled. ?>

		<header class="entry-header">
			<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
		</header><!-- .entry-header -->

	<?php endif; // End avatars check. ?>

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php hybrid_post_format_link(); ?>
		<span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
		<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
		<?php if ( function_exists( 'ev_post_views' ) ) ev_post_views( array( 'text' => '%s' ) ); ?>
		<?php edit_post_link(); ?>
		<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => '<span class="genericon genericon-category"></span> %s', ) ); ?>
		<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => '<span class="genericon genericon-tag"></span> %s', ) ); ?>
	</footer><!-- .entry-footer -->

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
