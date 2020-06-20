<?php

namespace Ankit\WCSSC\API\Controllers;

use WP_REST_Posts_Controller;
use WP_Error;
use WP_Post;

class SavedCarts_Controller extends WP_REST_Posts_Controller {
	/**
	 * Allow logged in user to get the list of saved carts.
	 *
	 * @return bool|true|\WP_Error
	 */
	public function get_items_permissions_check() {
		if ( is_user_logged_in() ) {
			return true;
		}
	}

	/**
	 * Permission check for deleting the cart.
	 *
	 * @return true|void|\WP_Error
	 */
	public function delete_item_permissions_check( $request ) {
		$post = $this->get_post( $request['id'] );

		if ( is_wp_error( $post ) ) {
			return $post;
		}

		if( ! is_user_logged_in() ) {
			return new WP_Error( 'rest_cannot_delete', __( 'This operation is not allowed', 'wcssc' ), [ 'status' => rest_authorization_required_code() ] );
		}

		$user_id = get_current_user_id();
		$author = (int) $post->post_author;

		if( $author !== $user_id ) {
			return new WP_Error( 'rest_cannot_delete', __( 'You are not authorized to do this operation', 'wcssc' ), [ 'status' => rest_authorization_required_code() ] );
		}

		return true;
	}

	/**
	 * Checks if a post can be deleted.
	 *
	 * @since 2.0.0
	 *
	 * @param object $post Post object.
	 *
	 * @return bool Whether the post can be deleted.
	 */
	public function check_delete_permission( WP_Post $post ) {

		return (int) $post->post_author === get_current_user_id();
	}
}
