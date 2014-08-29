<?php
/**
 * Default Sidebar Template
 *
 * @package     Compass
 * @copyright   Copyright (c) 2014, Flagship, LLC.
 * @license     GPL-2.0+
 * @since       1.0.0
 */
?>

<div <?php hybrid_attr( sprintf( 'footer-widgets-%d', $counter ) ); ?>>

	<?php if ( is_active_sidebar( sprintf( 'footer-%d', $counter ) ) ) : // If the sidebar has widgets. ?>

		<?php dynamic_sidebar( sprintf( 'footer-%d', $counter ) ); // Displays the primary sidebar. ?>

	<?php endif; // End widgets check. ?>

</div><!-- #sidebar-primary -->
