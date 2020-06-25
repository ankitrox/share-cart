<?php
/**
 * Backend class for the plugin.
 *
 * @package Ankit\WCSSC
 * @since 2.0.0
 * @version 1.0.0
 * @author Ankit Gade <contact@sharethingz.com>
 */

namespace Ankit\WCSSC\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	wp_die( __( 'This operation is not allowed', 'wcssc' ) );
}

/**
 * Class Admin
 *
 * @package Ankit\WCSSC\Admin
 */
class Admin {
	/**
	 * Admin related settings object.
	 *
	 * @var Settings
	 */
	public $settings;

	/**
	 * Admin constructor.
	 */
	public function __construct() {
		$this->hooks();
	}

	/**
	 * Add admin related hooks.
	 */
	public function hooks() {
		add_filter( 'woocommerce_get_settings_pages', array( $this, 'setting_page' ) );
	}

	/**
	 * Return settings tab class.
	 *
	 * @param array $settings_pages Array of settings pages classes.
	 *
	 * @return array
	 */
	public function setting_page( $settings_pages ) {
		$this->settings   = new Settings();
		$settings_pages[] = $this->settings;

		return $settings_pages;
	}

}
