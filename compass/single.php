<?php
/**
 * The primary template for all single entries.
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

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

				<?php tha_entry_before(); ?>

				<?php hybrid_get_content_template(); ?>

				<?php get_template_part( 'misc-templates/loop-nav' ); ?>

				<?php comments_template( '', true ); ?>

				<?php tha_entry_after(); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<?php  get_template_part( 'templates/parts/error' ); ?>

	<?php endif; ?>

</main><!-- #content -->

<?php
get_footer();
