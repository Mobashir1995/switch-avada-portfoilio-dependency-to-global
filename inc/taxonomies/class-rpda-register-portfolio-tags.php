<?php
/**
 * Make Portfolio Tags Global
 *
 * @package PluginDevs
 * @since 1.0.0
 */

/**
 * Register Portfolio Tags
 */
class RPDA_Register_Portfolio_Tags {
	use RPDA_Singleton;

	/**
	 * Register Portfolio Tags Taxonomy
	 *
	 * @since 1.0.0
	 */
	public function register_taxonomy() {
		$permalinks = get_option( 'avada_permalinks' );
		register_taxonomy(
			'portfolio_tags',
			'avada_portfolio',
			array(
				'hierarchical' => false,
				'label'        => esc_attr__( 'Portfolio Tags', 'fusion-core' ),
				'query_var'    => true,
				'rewrite'      => array(
					'slug'       => empty( $permalinks['portfolio_tags_base'] ) ? _x( 'portfolio_tags', 'slug', 'fusion-core' ) : $permalinks['portfolio_tags_base'],
					'with_front' => false,
				),
				'show_in_rest' => true,
			)
		);
	}

}
