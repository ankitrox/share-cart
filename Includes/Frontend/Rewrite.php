<?php

namespace Ankit\WCSSC\Frontend;

use WP_Rewrite;

class Rewrite {
	/**
	 * Rewrite constructor.
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Hook everything required for rewrite module.
	 */
	private function hooks() {
		add_filter( 'query_vars', [ $this, 'query_vars' ] );
		add_filter( 'generate_rewrite_rules', [ $this, 'rewrite_rules' ] );
		add_action( 'init', [ $this, 'endpoints' ] );
		add_action( 'woocommerce_account_saved-carts_endpoint', [ $this, 'saved_carts_table' ] );
	}

	/**
	 * Rewrite rules.
	 *
	 * @param WP_Rewrite $wp_rewrite Rewrite rules array.
	 *
	 * @return WP_Rewrite
	 */
	public function rewrite_rules( WP_Rewrite $wp_rewrite ) {
		$share_cart_rules = [
			'saved-cart/([A-Za-z0-9]+)?$' => 'index.php?saved-cart=$matches[1]',
		];

		$wp_rewrite->rules = $share_cart_rules + $wp_rewrite->rules;

		return $wp_rewrite;
	}

	/**
	 * Rewrite endpoints.
	 *
	 * * 'saved-carts'
	 */
	public function endpoints() {
		add_rewrite_endpoint( 'saved-carts', EP_ROOT | EP_PAGES );
	}

	/**
	 * Add query vars.
	 *
	 * @param array List of query variables.
	 *
	 * @return array
	 */
	public function query_vars( $query_vars ) {
		$query_vars[] = 'saved-cart';
		$query_vars[] = 'saved-carts';

		return $query_vars;
	}

	public function saved_carts_table() {
		echo '<div id="saved-carts-table">' . __( "Loading your saved carts...", "wcssc" ) . '</div>';
	}
}