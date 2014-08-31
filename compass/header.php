<?php
/**
 * The Header for our theme.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */
?>
<!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes( 'html' ); ?>>

<head>
<?php tha_head_top(); ?>
<?php wp_head(); ?>
<?php tha_head_bottom(); ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

	<?php tha_body_top(); ?>

	<div id="site-container" class="site-container">

		<div class="skip-link off-screen">
			<a href="#content" class="screen-reader-text"><?php _e( 'Skip to content', 'compass' ); ?></a>
		</div><!-- .skip-link -->

		<?php tha_header_before(); ?>

		<header <?php hybrid_attr( 'header' ); ?>>

			<div class="wrap">

				<?php tha_header_top(); ?>

				<div <?php hybrid_attr( 'branding' ); ?>>
					<?php hybrid_site_title(); ?>
					<?php hybrid_site_description(); ?>
				</div><!-- #branding -->

				<?php hybrid_get_menu( 'header' ); ?>

				<?php tha_header_bottom(); ?>

			</div>

		</header><!-- #header -->

		<?php tha_header_after(); ?>

		<?php hybrid_get_menu( 'after-header' ); ?>

		<?php tha_content_before(); ?>

		<div id="site-inner" class="site-inner">

			<?php tha_content_top(); ?>

			<?php hybrid_get_menu( 'breadcrumbs' ); ?>
