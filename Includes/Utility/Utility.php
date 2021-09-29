<?php
/**
 * Utility class to perform common operations.
 *
 * @package Ankit\WCSSC
 */

namespace Ankit\WCSSC\Utility;

use Ankit\WCSSC\SaveShareCart;

/**
 * Class Utility
 *
 * @package Ankit\WCSSC\Utility
 */
class Utility {
	/**
	 * Plugin object.
	 *
	 * @var SaveShareCart
	 */
	private $plugin;

	/**
	 * Default user for cart creation
	 *
	 * @var int
	 */
	private $default_user;

	/**
	 * Utility constructor.
	 *
	 * @param SaveShareCart $plugin
	 */
	public function __construct( SaveShareCart $plugin ) {
		$this->plugin       = $plugin;
		$this->default_user = get_option( 'wcssc_user' );
	}

	/**
	 * Plugin instance.
	 *
	 * @return SaveShareCart
	 */
	public function plugin() {
		return $this->plugin;
	}

	/**
	 * Gets the cart post object if it exists.
	 *
	 * @param string $hash Cart hash.
	 *
	 * @return array|false
	 */
	private function get_cart_by_hash( string $hash ) {
		$args = [
			'post_type'        => 'wcssc-cart',
			'post_status'      => array( 'formed' ),
			'suppress_filters' => false,
			'numberposts'      => 1,
			'meta_key'         => 'wcssc_cart_hash',
			'meta_value'       => $hash,
		];

		return get_posts( $args );
	}

	/**
	 * Get cart link by cart hash.
	 *
	 * @param string|null $hash
	 *
	 * @return string
	 */
	public function get_cart_link_by_hash( string $hash = null ) {
		$cart = $this->get_cart_by_hash( $hash );

		if ( ! $cart ) {
			return '';
		}

		return get_permalink( $cart[0]->ID );
	}

	/**
	 * Save the current cart in system.
	 *
	 * @param array $args Cart arguments.
	 *
	 * @return int|\WP_Error
	 */
	public function create_cart( array $args = [] ) {
		$data      = WC()->cart->cart_contents;
		$cart_hash = $_COOKIE['woocommerce_cart_hash'];
		$defaults  = [
			'post_title'  => sprintf(__('Shared cart - %s', 'wcssc'), $cart_hash),
			'post_name'   => $cart_hash,
			'meta_input'  => [
				'wcssc_cart_data' => $data,
				'wcssc_cart_hash' => $cart_hash,
			],
			'post_author' => is_user_logged_in() ? get_current_user_id() : $this->default_user,
			'post_status' => 'formed',
			'post_type'   => 'wcssc-cart',
		];
		$args      = wp_parse_args( $args, $defaults );

		return wp_insert_post( $args );
	}

	/**
	 * Runs on plugin activation.
	 */
	public function install() {
		/**
		 * Create a user, who will create saved carts.
		 */
		$user = username_exists('wcssc_user');

		if( !$user ){
			$password = wp_generate_password();
			$user = wp_create_user( 'wcssc_user', $password );
			update_option( 'wcssc_user', $user, true );
		}else{
			update_option( 'wcssc_user', $user, true );
		}

		/**
		 * Generate rewrite rules. Saved carts endpoint creation.
		 */
		flush_rewrite_rules();
	}
}
