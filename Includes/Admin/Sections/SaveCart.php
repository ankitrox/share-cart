<?php
/**
 * Save cart related settings section.
 *
 * @package Ankit\WCSSC
 * @since 2.0.0
 * @version 1.0.0
 * @author Ankit Gade <ankit.gade@news.co.uk>
 */

namespace Ankit\WCSSC\Admin\Sections;

if ( ! defined( 'ABSPATH' ) ) {
	wp_die( __( 'This operation is not allowed', 'wcssc' ) );
}

use Ankit\WCSSC\Interfaces\SettingsSubSection;

/**
 * Class SaveCart
 *
 * @package Ankit\WCSSC\Section
 */
class SaveCart implements SettingsSubSection {
	/**
	 * Section name.
	 *
	 * @var string
	 */
	private $name = 'save-cart';

	public function get_fields() {

		return include WCSSC_BASE . '/Includes/data/settings/save-cart-settings.php';
	}

	public function get_name() {

		return $this->name;
	}
}
