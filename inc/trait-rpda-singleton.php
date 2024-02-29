<?php
/**
 * Trait for Singleton Instance and Magic Methods
 *
 * @package PluginDevs
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Base for Singleton
 */
trait RPDA_Singleton {
	/**
	 * The single instance of the class.
	 *
	 * @var CT_Form_Singleton
	 * @since 1.0.1
	 */
	protected static $instance = null;

	/**
	 * Main Instance.
	 *
	 * Ensures only one instance of the plugin is loaded or can be loaded.
	 *
	 * @since 1.0.1
	 * @return CT_Form_Singleton - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor Function.
	 *
	 * Empty Constructor
	 *
	 * @since 1.0.1
	 */
	public function __construct() {}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.1
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cloning is forbidden.', 'remove-avada-dependency' ), '1.0.0' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.1
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Unserializing instances of this class is forbidden.', 'remove-avada-dependency' ), '1.0.0' );
	}
}
