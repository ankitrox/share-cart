<?php
/**
 * Perform necessary operations for displaying
 *
 * 1. share cart button.
 * 2. Saved cart table.
 */

namespace Ankit\WCSSC\Frontend;

use Ankit\WCSSC\Settings;
use Ankit\WCSSC\Utility\Utility;

/**
 * Class Frontend
 *
 * @package Ankit\WCSSC\Frontend
 */
class Frontend {
	/**
	 * Configuration array.
	 *
	 * @var Settings Ankit\WCSSC\Admin\Settings
	 */
	private $util;

	/**
	 * Enqueue object.
	 *
	 * @var Enqueue
	 */
	private $enqueue;

	/**
	 * Frontend constructor.
	 *
	 * @param Utility $util
	 */
	public function __construct( Utility $util ) {
		$this->util = $util;
		$this->enqueue  = new Enqueue( $this->util );
		$this->hooks();
	}

	/**
	 * Add necessary hooks.
	 */
	public function hooks() {
		add_action( $this->get_button_position(), [ $this, 'render_button' ] );
	}

	/**
	 * This will just render a span,
	 * button will be rendered by the
	 * react component: ShareButton
	 */
	public function render_button() {
		echo '<span id="wcssc-button-container"></span>';
	}

	/**
	 * `Share Cart` Button position.
	 *
	 * @return mixed|void
	 */
	public function get_button_position() {
		return get_option( 'wc_wcssc_button_pos', 'woocommerce_after_cart_table' );
	}
}
