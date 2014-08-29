<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */
?>

<?php get_header(); ?>

<main <?php hybrid_attr( 'content' ); ?>>

	<article class="entry error-404 not-found">

		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'compass' ); ?></h1>
		</header><!-- .page-header -->

		<div class="entry-content">

			<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'compass' ); ?></p>

			<?php get_search_form(); ?>

			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

			<?php
			/* translators: %1$s: smiley */
			$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'compass' ), convert_smilies( ':)' ) ) . '</p>';
			the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2> $archive_content" );
			?>

			<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

		</div><!-- .entry-content -->

	</article><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
