<?php
/**
 * A template part to display meta data for an archive page.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */
?>

<div <?php hybrid_attr( 'loop-meta' ); ?>>

	<h1 <?php hybrid_attr( 'loop-title' ); ?>><?php hybrid_loop_title(); ?></h1>

	<?php if ( is_category() || is_tax() ) : ?>

		<?php hybrid_get_menu( 'sub-terms' ); ?>

	<?php endif; ?>

	<?php if ( ! is_paged() && $desc = hybrid_get_loop_description() ) : ?>

		<div <?php hybrid_attr( 'loop-description' ); ?>>
			<?php echo $desc; ?>
		</div><!-- .loop-description -->

	<?php endif; ?>

</div><!-- .loop-meta -->
