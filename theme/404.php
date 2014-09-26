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

<div id="site-inner" class="site-inner">

	<?php hybrid_get_menu( 'breadcrumbs' ); ?>

	<?php tha_content_before(); ?>

	<main <?php hybrid_attr( 'content' ); ?>>

		<?php tha_content_top(); ?>

		<?php get_template_part( 'content/error', '404' ); ?>

		<?php tha_content_bottom(); ?>

	</main><!-- #content -->

	<?php tha_content_after(); ?>

	<?php hybrid_get_sidebar( 'primary' ); ?>

</div><!-- #site-inner -->

<?php
get_footer();
