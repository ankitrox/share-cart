<?php
/**
 * General Settings Section.
 */

namespace Ankit\WCSSC\Section;

if ( ! defined( 'ABSPATH' ) ) {
	wp_die( __( 'This operation is not allowed', 'wcssc' ) );
}

use Ankit\WCSSC\Interfaces\SettingsSubSection;

/**
 * Class General
 *
 * @package Ankit\WCSSC\Section
 */
class Email implements SettingsSubSection {
	/**
	 * Name of sub section.
	 *
	 * @var string
	 */
	private $name = 'email';

	/**
	 * Returns the fields to register in woocommerce settings tab.
	 *
	 * @return array
	 */
	public function get_fields() {

		return include WCSSC_BASE . '/Includes/data/settings/email-settings.php';
	}

	/**
	 * Name of sub section.
	 *
	 * @return string
	 */
	public function get_name() {

		return $this->name;
	}

}
