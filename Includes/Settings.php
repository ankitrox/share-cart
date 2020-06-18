<?php
/**
 * This class is a repository for settings values.
 *
 * @package Ankit\WCSSC
 * @author Ankit Gade <contact@sharethingz.com>
 * @since 2.0.0
 * @version 1.0.0
 */

namespace Ankit\WCSSC;

use Ankit\WCSSC\Section\Email;
use Ankit\WCSSC\Section\General;
use Ankit\WCSSC\Section\SaveCart;

class Settings {
	/**
	 * Setting types like
	 * `General`, `Email`, `Save Cart` etc.
	 *
	 * @var array
	 */
	private $types = [];

	/**
	 * This will hold the settings values.
	 *
	 * @var array
	 */
	private $configs = [];

	/**
	 * Settings constructor.
	 */
	public function __construct() {
		$this->types[] = new General();
		$this->types[] = new Email();
		$this->types[] = new SaveCart();

		$this->fetch_settings();
	}

	/**
	 * Fetches the settings value for plugin options.
	 */
	private function prepare_settings() {
		$resultant = [];

		foreach ( $this->types as $type ) {
			$resultant = array_merge( $resultant, $type->get_fields() );
		}

		foreach( $resultant as $key => $value ) {
			if( ! isset( $value['id'] ) ) {
				unset( $resultant['key'] );
			}
		}

		return wp_list_pluck( $resultant, 'id' );
	}

	/**
	 * Fetches the settings
	 */
	private function fetch_settings() {
		$settings = $this->prepare_settings();

		foreach ( $settings as $setting ) {
			$this->configs[$setting] = get_option( $setting, null );
		}
	}

	/**
	 * Return the list of active social media.
	 */
	public function active_social_medias() {
		$media = [];
		if ( isset( $this->configs['active_social_media'] ) ) {
			return $this->configs['active_social_media'];
		}

		foreach ( $this->configs as $id => $value ) {
			if ( strpos( $id, 'wcssc_sm_' ) === 0 ) {
				if ( 'yes' === $value ) {
					$media[] = sanitize_title( str_replace( 'wcssc_sm_', '', $id ) );
				}
			}
		}

		return $this->configs['active_social_media'] = $media;
	}

	/**
	 * Get settings for particular section.
	 * Example: General, Email and Save cart.
	 *
	 * @param string $section Name of section to retrieve.
	 *
	 * @return array
	 */
	public function section( string $section = null ) {
		$settings = [];

		if ( ! $section ) {
			return $settings;
		}

		foreach ( $this->types as $type ) {
			if ( $section === $type->get_name() ) {
				$fields   = wp_list_pluck( $type->get_fields(), 'id' );
				$settings = array_intersect_key( $this->configs, array_flip( $fields ) );
			}
		}

		return $settings;
	}

}
