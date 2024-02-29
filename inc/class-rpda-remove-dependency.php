<?php
/**
 * Main Class Setup
 *
 * @package PluginDevs
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Main Class
 */
final class RPDA_Remove_Dependency {
	use RPDA_Singleton;

	/**
	 * DPGW_Gateway version.
	 *
	 * @var string
	 * @since 1.0.0
	 */
	public $version = '1.0.0';

	/**
	 * RPDA_Portfolio Object
	 *
	 * @var object
	 * @since 1.0.0
	 */
	public $portfolio = null;

	/**
	 * RPDA_Portfolio_Category Object
	 *
	 * @var object
	 * @since 1.0.0
	 */
	public $portfolio_category = null;

	/**
	 * RPDA_Portfolio_Skills Object
	 *
	 * @var object
	 * @since 1.0.0
	 */
	public $portfolio_skills = null;

	/**
	 * RPDA_Portfolio_Tags Object
	 *
	 * @var object
	 * @since 1.0.0
	 */
	public $portfolio_tags = null;

	/**
	 * RPDA_Options Object
	 *
	 * @var object
	 * @since 1.0.0
	 */
	public $options = null;

	/**
	 * Constructor Function.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->objects();
		$this->hooks();
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 *
	 * @since 1.0.0
	 */
	public function includes() {
		require_once RPDA_PATH . 'inc/class-rpda-options.php';
		require_once RPDA_PATH . 'inc/post-types/class-rpda-register-portfolio.php';
		require_once RPDA_PATH . 'inc/taxonomies/class-rpda-register-portfolio-category.php';
		require_once RPDA_PATH . 'inc/taxonomies/class-rpda-register-portfolio-skills.php';
		require_once RPDA_PATH . 'inc/taxonomies/class-rpda-register-portfolio-tags.php';
	}

	/**
	 * Define Constants.
	 *
	 * @since 1.0.0
	 */
	private function define_constants() {
		$this->define( 'RPDA_Version', $this->version );
		$this->define( 'RPDA_PATH', plugin_dir_path( RPDA_PLUGIN_FILE ) );
		$this->define( 'RPDA_URL', plugin_dir_url( RPDA_PLUGIN_FILE ) );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string          $name  Constant name.
	 * @param int|string|bool $value Constant value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 */
	private function hooks() {
		add_action( 'update_option_fusion_options', array( $this->options, 'clone_avada_options' ), 99, 3 );
		register_activation_hook( RPDA_PLUGIN_FILE, array( $this->options, 'clone_avada_options_on_installation' ) );

		if ( ! post_type_exists( 'avada_portfolio' ) ) {
			add_action( 'init', array( $this->portfolio, 'register_portfilio' ) );
		}

		if ( ! taxonomy_exists( 'portfolio_category' ) ) {
			add_action( 'init', array( $this->portfolio_category, 'register_taxonomy' ) );
		}

		if ( ! taxonomy_exists( 'portfolio_skills' ) ) {
			add_action( 'init', array( $this->portfolio_skills, 'register_taxonomy' ) );
		}

		if ( ! taxonomy_exists( 'portfolio_tags' ) ) {
			add_action( 'init', array( $this->portfolio_tags, 'register_taxonomy' ) );
		}
	}

	/**
	 * Load Plugin Textdomain.
	 *
	 * @since 1.0.1
	 */
	public function load_plugin_textdomain() {

	}

	/**
	 * Declare all objects here.
	 *
	 * @since 1.0.0
	 */
	public function objects() {
		$this->portfolio          = RPDA_Register_Portfolio::instance();
		$this->options            = RPDA_Options::instance();
		$this->portfolio_category = RPDA_Register_Portfolio_Category::instance();
		$this->portfolio_skills   = RPDA_Register_Portfolio_Skills::instance();
		$this->portfolio_tags     = RPDA_Register_Portfolio_Tags::instance();
	}

}
