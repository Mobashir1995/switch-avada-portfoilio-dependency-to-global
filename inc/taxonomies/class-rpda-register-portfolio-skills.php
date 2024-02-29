<?php
/**
 * Make Portfolio Skills Global
 *
 * @package PluginDevs
 * @since 1.0.0
 */

/**
 * Register Portfolio Skills
 */
class RPDA_Register_Portfolio_Skills {
	use RPDA_Singleton;

	/**
	 * Register Portfolio Skill Taxonomy
	 *
	 * @since 1.0.0
	 */
	public function register_taxonomy() {
		$permalinks = get_option( 'avada_permalinks' );
		register_taxonomy(
			'portfolio_skills',
			'avada_portfolio',
			array(
				'hierarchical' => true,
				'label'        => esc_attr__( 'Portfolio Skills', 'fusion-core' ),
				'query_var'    => true,
				'labels'       => array(
					'add_new_item' => esc_attr__( 'Add New Skill', 'fusion-core' ),
				),
				'rewrite'      => array(
					'slug'       => empty( $permalinks['portfolio_skills_base'] ) ? _x( 'portfolio_skills', 'slug', 'fusion-core' ) : $permalinks['portfolio_skills_base'],
					'with_front' => false,
				),
				'show_in_rest' => true,
			)
		);
	}

}
