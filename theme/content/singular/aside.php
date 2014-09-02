<?php
/**
 * A template part for displaying single aside entries.
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

	<header class="entry-header">

		<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>

		<p class="entry-meta">
			<?php hybrid_post_format_link(); ?>
			<span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
			<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
			<?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', '' ); ?>
			<?php if ( function_exists( 'ev_post_views' ) ) ev_post_views( array( 'text' => '%s' ) ); ?>
			<?php edit_post_link(); ?>
		</p><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<p class="entry-meta">
			<?php hybrid_post_terms( array( 'taxonomy' => 'category', ) ); ?>
			<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', ) ); ?>
		</p>
	</footer><!-- .entry-footer -->

	<?php tha_entry_bottom(); ?>

</article><!-- .entry -->
