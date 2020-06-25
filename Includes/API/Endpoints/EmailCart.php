<?php
/**
 * Save cart endpoint class.
 */

namespace Ankit\WCSSC\Endpoint;

use Ankit\WCSSC\Interfaces\Endpoint;
use WP_REST_Request;
use WP_REST_Server;
use WP_REST_Response;

/**
 * Class SaveCart
 *
 * @package Ankit\WCSSC\Endpoint
 */
class EmailCart implements Endpoint {
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
		$email_address  = sanitize_text_field( $_POST['to'] );
		$subject        = sanitize_text_field( $_POST['title'] );
		$link           = esc_url_raw( $_POST['link'] );
		$headers        = [];
		$helper         = unserialize( $request->get_attributes()['args']['helper'] );
		$email_settings = $helper->plugin()->settings()->section( 'email' );
		$body           = $this->email_body( $email_settings['wcssc_email_body'], $link );

		if ( ! empty( $email_settings['wcssc_email_from'] ) && ! empty( $email_settings['wcssc_email_from_name'] ) ) {
			$headers[] = 'From: ' . $email_settings['wcssc_email_from_name'] . ' <' . $email_settings['wcssc_email_from'] . '>';
		}

		$sent = wp_mail( $email_address, $subject, $body, $headers );

		if ( $sent ) {
			return new WP_REST_Response(
				[
					'success' => true,
					'message' => __( 'Email sent successfully', 'wcssc' ),
				]
			);
		}

		return new WP_REST_Response(
			[
				'success' => false,
				'message' => __( 'Error: Email cannot be sent at this moment.', 'wcssc' ),
			]
		);

	}

	/**
	 * Prepare the email message to be sent for sharing cart.
	 * Mainly replaces all placeholders with associated links and content.
	 *
	 * @param string $body Email content with placeholders.
	 * @param string $cat_link Cart link to be shared.
	 *
	 * @return string $body Email content with placeholders replaced.
	 */
	private function email_body( string $body, $cat_link ) {
		$body = str_replace( '{blogname}', get_bloginfo( 'name' ), $body );
		$body = str_replace( '{cart_link}', $cat_link, $body );
		$body = str_replace( '{siteurl}', get_bloginfo( 'url' ), $body );

		return $body;
	}

	/**
	 * Endpoint name.
	 */
	public function endpoint() {

		return 'email-cart';
	}

	/**
	 * Visitors can email the cart even if they are not logged in.
	 *
	 * @return bool|mixed
	 */
	public function permission_callback() {

		return true;
	}
}
