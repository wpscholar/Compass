<?php
/**
 * The breadcrumbs template.
 *
 * @package     Compass
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

// Check for Yoast breadcrumb support.
if ( function_exists( 'yoast_breadcrumb' ) ) {
	yoast_breadcrumb( '<nav class="breadcrumbs" itemprop="breadcrumb">', '</nav>' );
}

// Check for hybrid breadcrumb support.
else if ( function_exists( 'breadcrumb_trail' ) ) {
	breadcrumb_trail(
		array(
			'container'     => 'nav',
			'separator'     => '>',
			'show_browse'   => false,
			'show_on_front' => false,
		)
	);
}
