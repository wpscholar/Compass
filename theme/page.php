<?php
/**
 * The primary template for all single pages.
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

<?php tha_content_before(); ?>

<main <?php hybrid_attr( 'content' ); ?>>

	<?php tha_content_top(); ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php hybrid_get_content_template(); ?>

			<?php comments_template( '', true ); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<?php get_template_part( 'content/error' ); ?>

	<?php endif; ?>

	<?php tha_content_bottom(); ?>

</main><!-- #content -->

<?php tha_content_after(); ?>

<?php
get_footer();
