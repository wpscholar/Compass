<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

	<?php if ( ! is_front_page() && ! is_home() && ! is_404() ) : ?>

		<?php get_template_part( 'misc-templates/loop-meta' ); ?>

	<?php endif; ?>

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php hybrid_get_content_template(); ?>

		<?php endwhile; ?>

		<?php get_template_part( 'misc-templates/loop-nav' ); ?>

	<?php else : ?>

		<?php  get_template_part( 'templates/parts/error' ); ?>

	<?php endif; ?>

</main><!-- #content -->

<?php
get_footer();
