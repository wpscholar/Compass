<?php
/**
 * The default WordPress search form is lacking in terms of accessibility.
 * In order to bring it into compliance with WCAG we need to make a few changes.
 * This class adds some aria labels and a unique ID to each search form instance.
 * It also applies some filters which can be used to control the output of the
 * search form.
 *
 * @package     FlagshipLibrary
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

/**
 * Flagship Search Form Class.
 *
 * @since  1.0.0
 * @author Gary Jones
 * @return void
 */
class Flagship_Search_Form {
	protected $id;

	public function get_form() {
		return sprintf(
			'<form class="search-form" method="get" action="%s" role="search">%s</form>',
			esc_url( home_url( '/' ) ),
			$this->get_label() . $this->get_input() . $this->get_button()
		);
	}

	protected function get_label() {
		$label = apply_filters( 'flagship_search_form_label', __( 'Search site', 'compass' ) );

		return sprintf(
			'<label for="%s" class="screen-reader-text">%s</label>',
			esc_attr( $this->get_id() ),
			esc_attr( $label )
		);
	}

	protected function get_input() {
		$value = get_search_query() ? apply_filters( 'the_search_query', get_search_query() ) : '';
		$placeholder = apply_filters( 'flagship_search_text', __( 'Search this website', 'compass' ) );

		return sprintf(
			'<input type="search" name="s" id="%s" placeholder="%s" autocomplete="off" value="%s" />',
			esc_attr( $this->get_id() ),
			esc_attr( $placeholder ),
			esc_attr( $value )
		);
	}

	protected function get_button() {
		return sprintf(
			'<button type="submit" aria-label="%s"><span class="screen-reader-text">%s</span></button>',
			esc_attr( apply_filters( 'flagship_search_button_label', __( 'Search', 'compass' ) ) ),
			apply_filters( 'flagship_search_button_text', __( 'Search', 'compass' ) )
		);
	}

	protected function get_id() {
		if ( ! isset( $this->id ) ) {
			$this->id = uniqid( 'searchform-' );
		}

		return $this->id;
	}
}
