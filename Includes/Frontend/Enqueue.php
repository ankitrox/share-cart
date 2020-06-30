<?php
/**
 * Enqueues the scripts and styles for frontend.
 */

namespace Ankit\WCSSC\Frontend;

use Ankit\WCSSC\Utility\Utility;

defined( 'ABSPATH' ) || exit;

/**
 * Class Enqueue
 *
 * @package Ankit\WCSSC\Frontend
 */
class Enqueue {
	/**
	 * Utility object.
	 *
	 * @var Utility
	 */
	private $util;

	/**
	 * Enqueue constructor.
	 *
	 * @param Utility $utility
	 */
	public function __construct( Utility $utility ) {
		$this->util = $utility;
		$this->hooks();
	}

	/**
	 * Add hooks for enqueuing scripts and styles.
	 */
	public function hooks() {
		add_action( 'wp_enqueue_scripts', [ $this, 'load_scripts' ] );
		add_filter( 'script_loader_tag', [ $this, 'load_async_defer' ], 10, 2 );
	}

	/**
	 * Load the plugin script async and defer.
	 * This should not block the page rendering.
	 *
	 * @param $tag
	 * @param $handle
	 *
	 * @return mixed
	 */
	public function load_async_defer( $tag, $handle ) {
		if ( ! preg_match( '/^wcssc-/', $handle ) ) {
			return $tag;
		}

		return str_replace( ' src', ' async defer src', $tag );
	}

	/**
	 * Load the scripts and styles from build folder.
	 * We will use asset-manifest.json to load the js/css files.
	 */
	public function load_scripts() {
		if( is_cart() || is_account_page() || apply_filters( 'wcssc_enqueue_scripts', false ) ) {

			$settings                            = [];
			$settings['socials']                 = $this->util->plugin()->settings()->active_social_medias();
			$settings['nonce']                   = is_user_logged_in() ? wp_create_nonce( 'wp_rest' ) : '';
			$settings['wcssc_nonce']             = wp_create_nonce( 'wcssc_api' );
			$settings['wcssc_btn_text']          = $this->util->plugin()->settings()->get( 'wcssc_btn_txt' );
			$settings['wcssc_captcha_key']       = $this->util->plugin()->settings()->get( 'wcssc_captcha_key' );
			$settings['api_path']['get_link']    = home_url( rest_get_url_prefix() . '/wcssc/v1/get-link' );
			$settings['api_path']['save_cart']   = home_url( rest_get_url_prefix() . '/wcssc/v1/save-cart' );
			$settings['api_path']['email_cart']  = home_url( rest_get_url_prefix() . '/wcssc/v1/email-cart' );
			$settings['api_path']['saved_carts'] = home_url( rest_get_url_prefix() . '/wp/v2/wcssc-cart/' );
			$settings['api_path']['delete_cart'] = home_url( rest_get_url_prefix() . '/wp/v2/wcssc-cart/{id}' );

			/**
			 * Enqueue font awesome script
			 */
			wp_enqueue_style( 'wcssc-font-awesome', 'https://use.fontawesome.com/releases/v5.12.1/css/all.css', array(), false );
			wp_enqueue_style( 'wcssc', WCSSC_ASSETS_BUILD . '/main.css' );
			wp_enqueue_script( 'wcssc-main', WCSSC_ASSETS_BUILD . '/index.js', [
				'wp-data',
				'wp-core-data',
				'wp-i18n'
			], null, true );
			wp_set_script_translations( 'wcssc-main', 'wcssc', WCSSC_BASE . '/languages/' . get_locale() );
			wp_localize_script( 'wcssc-main', 'wcssc_settings', $settings );
		}
	}

}
