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
	 * Rewrite object.
	 *
	 * @var Rewrite
	 */
	private $rewrite;

	/**
	 * Cart object.
	 *
	 * @var Cart
	 */
	private $cart;

	/**
	 * Frontend constructor.
	 *
	 * @param Utility $util
	 */
	public function __construct( Utility $util ) {
		$this->util    = $util;
		$this->enqueue = new Enqueue( $this->util );
		$this->rewrite = new Rewrite();
		$this->cart    = new Cart( $this->util );
		$this->hooks();
	}

	/**
	 * Add necessary hooks.
	 */
	public function hooks() {
		add_filter( 'the_content', [ $this->cart, 'single_cart_content' ], 99 );
		add_action( 'woocommerce_account_menu_items', [ $this, 'menu_items' ] );
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

	/**
	 * Add new item to `My account` navigation list.
	 *
	 * @param array $items List of menu items.
	 *
	 * @return array
	 */
	public function menu_items( array $items ) {
		if ( ! empty( $items['customer-logout'] ) ) {
			$logout_text = $items['customer-logout'];
			unset( $items['customer-logout'] );
		}

		$label = $this->util->plugin()->settings()->get( 'wcssc_saved_cart_title' );
		$label = empty( $label ) ? __( 'Saved carts', 'wcssc' ) : $label;

		$items['saved-carts'] = $label;

		if ( $logout_text ) {
			$items['customer-logout'] = $logout_text;
		}

		return $items;
	}
}
