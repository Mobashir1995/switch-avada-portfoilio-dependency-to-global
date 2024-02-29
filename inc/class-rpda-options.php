<?php
/**
 * WordPress Settings Options
 *
 * @package PluginDevs
 * @since 1.0.0
 */

/**
 * Create Settings Options
 */
class RPDA_Options {
	use RPDA_Singleton;

	/**
	 * Sync Avada Settings Options
	 *
	 * @param array  $old_value Old Option Value.
	 * @param array  $value     New Option Value.
	 * @param string $option    Option Name.
	 *
	 * @since 1.0.0
	 */
	public function clone_avada_options( $old_value, $value, $option ) {
		update_option( 'rdpa_fusion_options', $value );
	}

	/**
	 * Create Avada Settings Options on plugin installation
	 *
	 * @since 1.0.0
	 */
	public function clone_avada_options_on_installation() {
		$fusion_settings = get_option( 'fusion_options' );
		if (
			isset( $fusion_settings ) &&
			is_array( $fusion_settings ) &&
			array_key_exists( 'portfolio_slug', $fusion_settings ) &&
			! empty( $fusion_settings['portfolio_slug'] )
		) {
			$this->clone_avada_options( null, $fusion_settings, 'fusion_options' );
		}
	}

}
