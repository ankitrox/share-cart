<?php
/**
 * API Manager for handling API relaated operations.
 *
 * @package Ankit\WCSSC
 * @author Ankit Gade <contact@sharethingz.com>
 * @since 2.0.0
 * @version 1.0.0
 */

namespace Ankit\WCSSC\API;

use Ankit\WCSSC\API\Endpoints\EmailCart;
use Ankit\WCSSC\API\Endpoints\GetLink;
use Ankit\WCSSC\API\Endpoints\SaveCart;
use Ankit\WCSSC\Utility\Utility;

/**
 * Class API_Manager
 */
class API_Manager {
	/**
	 * Create cart endpoint.
	 *
	 * @var string
	 */
	private $namespace = 'wcssc/v1';

	/**
	 * Route for the endpoint.
	 *
	 * @var string
	 */
	private $endpoints = [];

	/**
	 * Utility object.
	 *
	 * @var Utility
	 */
	private $utility;

	/**
	 * API_Manager constructor.
	 *
	 * @param Utility $utils
	 */
	public function __construct( Utility $utils ) {
		$this->utility     = $utils;
		$this->endpoints[] = new GetLink();
		$this->endpoints[] = new SaveCart();
		$this->endpoints[] = new EmailCart();
		$this->hooks();
	}

	private function hooks() {
		add_filter( 'rest_wcssc-cart_query', [ $this, 'rest_query' ] );
		add_action( 'rest_api_init', [ $this, 'register_endpoints' ] );
	}

	/**
	 * Register the endpoits associated with the plugin.
	 */
	public function register_endpoints() {
		foreach ( $this->endpoints as $endpoint ) {
			register_rest_route(
				$this->namespace,
				$endpoint->endpoint(),
				[
					'methods'             => $endpoint->method(),
					'callback'            => [ $endpoint, 'callback' ],
					'args'                => [ 'helper' => serialize( $this->utility ) ],
					'permission_callback' => [ $endpoint, 'permission_callback' ],
				]
			);
		}
	}

	/**
	 * Filter query args for REST.
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	public function rest_query( array $args ) {
		/**
		 * For saved carts display API request.
		 */
		if ( ! empty( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'wcssc_api' ) ) {
			$args['author'] = get_current_user_id();
			$args['status'] = 'publish';
		}

		return $args;
	}
}
