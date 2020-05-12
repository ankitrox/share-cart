<?php
/**
 * This is the main plugin class. Performs following actions.
 *
 * 1. Add the necessary hooks.
 * 2. Instantiate necessary classes and setup objects.
 */
namespace Ankit\WCSSC;

use Ankit\WCSSC\Admin\Admin;
use Ankit\WCSSC\Frontend\Frontend;

defined( 'ABSPATH' ) || exit;

/**
 * Class SaveShareCart
 *
 * @package Ankit\WCSSC
 */
class SaveShareCart {
	/**
	 * Plugin version number.
	 * This will be semantic version.
	 *
	 * @var int $version
	 */
	public $version;

	/**
	 * Responsible for backend related operations.
	 *
	 * @var object
	 */
	public $admin;

	/**
	 * Responsible for fronend related operations.
	 *
	 * @var object
	 */
	public $frontend;

	/**
	 * SaveShareCart constructor.
	 */
	public function __construct() {
		$this->admin = new Admin();
		$this->seetings = new Settings();
		$this->frontend = new Frontend( $this->seetings );
		$this->hooks();
	}

	public function hooks() {
		add_action( 'woocommerce_init', [ $this, 'init' ] );
	}

	/**
	 * Init hook.
	 */
	public function init() {

	}

}
