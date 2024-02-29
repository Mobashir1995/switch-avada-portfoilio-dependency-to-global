<?php
/**
 * Plugin Name: Remove Portfolio Dependency from Avada
 * Plugin URI: https://plugin-devs.com/
 * Description: Remove Portfolio Dependency from Avada and make it available from any theme
 * Version: 1.0.0
 * Author: Mobashir
 * Author URI: https://plugin-devs.com/
 * Text Domain: remove-avada-dependency
 * Tested up to: 6.4.3
 * Requires at least: 6.2
 * Requires PHP: 7.4
 *
 * @package PluginDevs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'RPDA_PLUGIN_FILE' ) ) {
	define( 'RPDA_PLUGIN_FILE', __FILE__ );
}

if ( ! trait_exists( 'RPDA_PLUGIN_FILE', false ) ) {
	require_once dirname( RPDA_PLUGIN_FILE ) . '/inc/trait-rpda-singleton.php';
}

// Include the main WooCommerce class.
if ( ! class_exists( 'RPDA_Remove_Dependency', false ) ) {
	require_once dirname( RPDA_PLUGIN_FILE ) . '/inc/class-rpda-remove-dependency.php';
}

RPDA_Remove_Dependency::instance();
