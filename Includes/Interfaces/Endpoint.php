<?php
/**
 * Interface for Endpoint.
 *
 * If we want to register new endpoints in plugin,
 * it should adhere to this interface.
 *
 * Interface Endpoint
 */

namespace Ankit\WCSSC\Interfaces;

use WP_REST_Request;

interface Endpoint {

	/**
	 * Return endpoint name.
	 *
	 * Endpoint constructor.
	 */
	public function endpoint();

	/**
	 * Endpoint callback function.
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return string
	 */
	public function callback( WP_REST_Request $request );

	/**
	 * Method for the request.
	 *
	 * `POST`, `GET` or `DELETE`
	 *
	 * @return string
	 */
	public function method();

	/**
	 * Permission callback for individual endpoint.
	 *
	 * @return mixed
	 */
	public function permission_callback();
}
