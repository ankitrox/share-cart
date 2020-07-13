<?php
/**
 * Plugin Name: Save and Share Cart for WooCommerce
 * Plugin URI: http://wc-cart.com/
 * Description: A WooCommerce plugin to share cart on different social media platforms.
 * Version: 2.0.5
 * Author: Ankit Gade
 * Author URI: https://sharethingz.com/
 * Text Domain: wcssc
 * Domain Path: /languages
 *
 * @package Ankit\WCSSC
 */

namespace Ankit\WCSSC;

if ( ! defined( 'ABSPATH' ) ) {
	wp_die( __( 'This operation is not allowed', 'wcssc' ) ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

define( 'WCSSC_BASE', dirname( __FILE__ ) );
define( 'WCSSC_BASE_FILE', __FILE__ );
define( 'WCSSC_BASE_URL', plugins_url( basename( dirname( __FILE__ ) ) ) );
define( 'WCSSC_ASSETS_BUILD', WCSSC_BASE_URL . '/assets/js/build' );
define( 'WCSSC_ASSET_MANIFEST', WCSSC_BASE . '/assets/js/build/asset-manifest.json' );

require WCSSC_BASE . '/vendor/autoload.php';

$share_cart = new SaveShareCart();
