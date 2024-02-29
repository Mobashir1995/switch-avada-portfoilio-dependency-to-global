<?php
/**
 * Make Portfolio Category Global
 *
 * @package PluginDevs
 * @since 1.0.0
 */

/**
 * Register Portfolio Category
 */
class RPDA_Register_Portfolio_Category {
	use RPDA_Singleton;

	/**
	 * Register portfolio Custom Post Type
	 *
	 * @since 1.0.0
	 */
	public function register_taxonomy() {
		$permalinks = get_option( 'avada_permalinks' );
		register_taxonomy(
			'portfolio_category',
			'avada_portfolio',
			array(
				'hierarchical' => true,
				'label'        => esc_attr__( 'Portfolio Categories', 'remove-avada-dependency' ),
				'query_var'    => true,
				'rewrite'      => array(
					'slug'       => empty( $permalinks['portfolio_category_base'] ) ? _x( 'portfolio_category', 'slug', 'remove-avada-dependency' ) : $permalinks['portfolio_category_base'],
					'with_front' => false,
				),
				'show_in_rest' => true,
			)
		);
	}

}
