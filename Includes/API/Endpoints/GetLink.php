<?php
/**
 * Get cart link endpoint.
 */

namespace Ankit\WCSSC\Endpoint;

defined( 'ABSPATH' ) || exit;

use Ankit\WCSSC\Interfaces\Endpoint;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;

/**
 * Class GetLink
 *
 * @package Ankit\WCSSC\Endpoint
 */
class GetLink implements Endpoint {

	/**
	 * Return the request method.
	 *
	 * @return string
	 */
	public function method() {
		return WP_REST_Server::CREATABLE;
	}

	/**
	 * Callback function for endpoint.
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return string|void
	 */
	public function callback( WP_REST_Request $request ) {
		$cart_hash = sanitize_text_field( $_COOKIE['woocommerce_cart_hash'] );

		if ( empty( $cart_hash ) ) {
			return new WP_REST_Response( 'Forbidden!', 403 );
		}

		$helper    = unserialize( $request->get_attributes()['args']['helper'] );
		$cart_link = $helper->get_cart_link_by_hash( $cart_hash );

		if ( ! $cart_link ) {
			$cart      = $helper->create_cart();
			$cart_link = get_permalink( $cart );
		}

		return new WP_REST_Response( [ 'link' => $cart_link ], 200 );
	}

	/**
	 * Endpoint name.
	 */
	public function endpoint() {

		return 'get-link';
	}

	/**
	 * Checks if cart hash is present, then the request will be processed. Otherwise,
	 * error will be returned.
	 *
	 * @return bool|mixed
	 */
	public function permission_callback() {
		$cart_hash = isset( $_COOKIE['woocommerce_cart_hash'] ) ? sanitize_text_field( $_COOKIE['woocommerce_cart_hash'] ) : null;

		if( ! $cart_hash ) {
			return false;
		}

		return true;
	}
}
