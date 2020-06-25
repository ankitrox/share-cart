<?php
/**
 * Admin settings class.
 *
 * This will add all the sections and subsections.
 */

namespace Ankit\WCSSC\Admin;

if ( ! defined( 'ABSPATH' ) ) {
	wp_die( __( 'This operation is not allowed', 'wcssc' ) );
}

use Ankit\WCSSC\Section\Email;
use Ankit\WCSSC\Section\General;
use Ankit\WCSSC\Section\SaveCart;
use WC_Settings_Page;
use Ankit\WCSSC\Interfaces\SettingsSubSection;

/**
 * Class Settings
 *
 * @package Ankit\WCSSC\Admin
 */
class Settings extends WC_Settings_Page {
	/**
	 * Sub-sections to add inside `Share Cart` tab.
	 *
	 * @var array $sub_sections
	 */
	private $sub_sections = [];

	/**
	 * Settings tab slug.
	 *
	 * @var string
	 */
	private $tab = 'wcssc';

	/**
	 * Settings constructor.
	 */
	public function __construct() {
		$this->id    = $this->tab;
		$this->label = __( 'Save Share Cart', 'wcssc' );
		parent::__construct();

		$this->sub_sections['general']   = new General();
		$this->sub_sections['email']     = new Email();
		$this->sub_sections['save-cart'] = new SaveCart();

		$this->register();
	}

	/**
	 * Register settings.
	 *
	 * 1. Create the settings tab.
	 * 2. Create sub-section.
	 * 3. Add fields in sub-sections.
	 */
	public function register() {
		add_filter( 'woocommerce_settings_tabs_array', [ $this, 'add_settings_tab' ], 200 );
	}

	/**
	 * Sections added under `Share Cart` tab.
	 *
	 * @param array $sections
	 *
	 * @return array
	 */
	public function get_sections() {
		$sections = [];

		foreach ( $this->sub_sections as $section ) {
			$sections[ $section->get_name() ] = ucfirst( str_replace( '-', ' ', $section->get_name() ) );
		}

		return $sections;
	}

	public function get_settings() {
		global $current_section;
		$section = empty( $current_section ) ? 'general' : $current_section;

		return $this->sub_sections[ $section ]->get_fields();
	}

	/**
	 * Add the plugin settings tab `Share Cart`.
	 *
	 * @param array $tabs
	 *
	 * @return mixed
	 */
	public function add_settings_tab( $tabs ) {
		$tabs[ $this->tab ] = __( 'Share Cart', 'wcssc' );

		return $tabs;
	}

	/**
	 * Adds the subsection inside settings tab.
	 *
	 * @param SettingsSubSection $section
	 */
	public function add_section( SettingsSubSection $section ) {
		$name                        = (string) $section->get_name();
		$this->sub_sections[ $name ] = $section;
	}

	/**
	 * Remove a sub section from settings tab.
	 *
	 * @param SettingsSubSection $section
	 */
	public function remove_section( SettingsSubSection $section ) {
		$name = (string) $section->get_name();

		if ( isset( $this->sub_sections[ $name ] ) ) {
			unset( $this->sub_sections[ $name ] );
		}
	}
}
