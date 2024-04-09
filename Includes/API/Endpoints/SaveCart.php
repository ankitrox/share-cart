<?php
/**
 * Save cart endpoint class.
 */

namespace Ankit\WCSSC\API\Endpoints;

use Ankit\WCSSC\Interfaces\Endpoint;
use WP_REST_Request;
use WP_REST_Server;
use WP_REST_Response;

/**
 * Class SaveCart
 *
 * @package Ankit\WCSSC\Endpoint
 */
class SaveCart implements Endpoint {

	/**
	 * Return the request method.
	 *
	 * @return string
	 */
	public function method() {

		return WP_REST_Server::CREATABLE;
	}

	/**
	 * @param WP_REST_Request $request
	 *
	 * @return string|void
	 */
	public function callback( WP_REST_Request $request ) {
		$title       = sanitize_text_field( $_POST['title'] );
		$description = sanitize_textarea_field( $_POST['content'] );
		$helper      = unserialize( $request->get_attributes()['args']['helper'] );

		$cart = $helper->create_cart(
			[
				'post_title'   => $title,
				'post_content' => $description,
				'post_author'  => get_current_user_id(),
				'post_status'  => 'publish',
			]
		);

		if ( ! is_wp_error( $cart ) ) {
			return new WP_REST_Response(
				[
					'success' => true,
					'message' => __( 'Cart created successfully', 'wcssc' ),
				]
			);
		}

		return new WP_REST_Response(
			[
				'success' => false,
				'message' => __( 'Failed to create cart', 'wcssc' ),
			]
		);
	}

	/**
	 * Endpoint name.
	 */
	public function endpoint() {

		return 'save-cart';
	}

	/**
	 * Checks if cart hash is present, then the request will be processed. Otherwise,
	 * error will be returned.
	 *
	 * @return bool|mixed
	 */
	public function permission_callback() {

		return is_user_logged_in();
	}
}
