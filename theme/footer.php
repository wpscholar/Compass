<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */
?>

	<?php hybrid_get_sidebar( 'primary' ); ?>

	</div><!-- #site-inner -->

	<?php tha_footer_before(); ?>

	<footer <?php hybrid_attr( 'footer' ); ?>>

		<div class="wrap">

			<?php tha_footer_top(); ?>

			<?php wp_footer(); ?>

			<?php tha_footer_bottom(); ?>

		</div><!-- .wrap -->

	</footer><!-- .footer -->

	<?php tha_footer_after(); ?>

</div><!-- .site-container -->

<?php tha_body_bottom(); ?>

</body>
</html>
