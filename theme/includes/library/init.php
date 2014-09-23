<?php
/**
 * Load all required library files.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

/**
 * Return the correct path to the flagship library directory.
 *
 * @since   1.0.0
 * @return  string
 */
function flagship_get_library_directory() {
	return get_template_directory() . '/includes/library';
}

//* Load all the PHP files in the library directory.
require_once flagship_get_library_directory() . '/classes/class-search-form.php';
require_once flagship_get_library_directory() . '/attributes.php';
require_once flagship_get_library_directory() . '/general.php';
require_once flagship_get_library_directory() . '/hybrid-tweaks.php';
