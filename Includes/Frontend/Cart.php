<?php
/**
 * Cart related operations on frontend.
 *
 * @package Ankit\WCSSC
 * @author Ankit Gade <ankit.gade@news.co.uk>
 * @since 2.0.0
 * @version 1.0.0
 */

namespace Ankit\WCSSC\Frontend;

use Ankit\WCSSC\Utility\Utility;

/**
 * Class Cart.
 *
 * @package Ankit\WCSSC\Frontend
 */
class Cart {
	/**
	 * Utility object.
	 *
	 * @var Utility
	 */
	private $utility;

	/**
	 * Cart object.
	 *
	 * @var object
	 */
	private $cart = null;

	/**
	 * Load cart URL.
	 *
	 * @var string`
	 */
	private $load_cart;

	/**
	 * Cart constructor.
	 *
	 * @param Utility $utils
	 */
	public function __construct( Utility $utils ) {
		$this->utility = $utils;

		/**
		 * Setup cart related data.
		 */
		add_action( 'wp', function () {
			if ( is_singular( 'wcssc-cart' ) ) {
				$this->cart      = get_post_meta( get_the_ID(), 'wcssc_cart_data', true );
				$this->load_cart = wp_nonce_url( get_permalink( get_the_ID() ), 'load_wcssc_cart', 'load_cart' );
			}
		});

		add_action( 'wp', [ $this, 'load_cart' ], 11 );
	}

	/**
	 * Include template for single saved cart.
	 * You can overwrite this template by using it in your theme
	 *
	 * @param string $content Content of the post.
	 *
	 * @return string Filtered content.
	 */
	public function single_cart_content( $content ) {
		$filtered_content = null;
		if ( $this->cart ) {
			$cart     = $this->cart;
			$load_url = $this->load_cart;
			$template = locate_template( 'single-saved-cart.php', false, false );

			if ( empty( $template ) ) {
				$template = WCSSC_BASE . '/templates/single-saved-cart.php';
			}

			ob_start();
			require $template;
			$filtered_content = ob_get_clean();
		}

		return ( $filtered_content ) ? $filtered_content : $content;
	}

	/**
	 * Load the saved cart into main WooCommerce cart.
	 */
	public function load_cart() {
		global $woocommerce;
		$load_cart_nonce = filter_input( INPUT_GET, 'load_cart', FILTER_SANITIZE_STRING );

		if( $this->cart && wp_verify_nonce( $load_cart_nonce, 'load_wcssc_cart' ) ) {
			$woocommerce->cart->empty_cart();

			foreach ( $this->cart as $key => $item ) {
				$woocommerce->cart->add_to_cart( $item['product_id'], $item['quantity'], $item['variation_id'], $item['variation'] );
			}

			wp_redirect( get_permalink( wc_get_page_id( 'cart' ) ) );
			die( 1 );
		}
	}
}
