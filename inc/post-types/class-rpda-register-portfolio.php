<?php
/**
 * Make Portfolio Global
 *
 * @package PluginDevs
 * @since 1.0.0
 */

/**
 * Register Portfolio Post Type
 */
class RPDA_Register_Portfolio {
	use RPDA_Singleton;

	/**
	 * Register portfolio Custom Post Type
	 *
	 * @since 1.0.0
	 */
	public function register_portfilio() {
		$fusion_settings_array = get_option( 'rdpa_fusion_options' );
		$portfolio_slug        = isset( $fusion_settings_array ) && is_array( $fusion_settings_array ) && array_key_exists( 'portfolio_slug', $fusion_settings_array ) && ! empty( $fusion_settings_array['portfolio_slug'] ) ? $fusion_settings_array['portfolio_slug'] : 'produkt-portfolio';
		register_post_type(
			'avada_portfolio',
			array(
				'labels'       => array(
					'name'                     => _x( 'Portfolio', 'Post Type General Name', 'remove-avada-dependency' ),
					'singular_name'            => _x( 'Portfolio', 'Post Type Singular Name', 'remove-avada-dependency' ),
					'add_new_item'             => __( 'Add New Portfolio Post', 'remove-avada-dependency' ),
					'edit_item'                => __( 'Edit Portfolio Post', 'remove-avada-dependency' ),
					'item_published'           => __( 'Portfolio published.', 'remove-avada-dependency' ),
					'item_published_privately' => __( 'Portfolio published privately.', 'remove-avada-dependency' ),
					'item_reverted_to_draft'   => __( 'Portfolio reverted to draft.', 'remove-avada-dependency' ),
					'item_scheduled'           => __( 'Portfolio scheduled.', 'remove-avada-dependency' ),
					'item_updated'             => __( 'Portfolio updated.', 'remove-avada-dependency' ),
				),
				'public'       => true,
				'has_archive'  => true,
				'show_ui'      => true,
				'show_in_menu' => true,
				'rewrite'      => array(
					'slug' => $portfolio_slug,
				),
				'show_in_rest' => true,
				'supports'     => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
				'can_export'   => true,
				'menu_icon'    => 'dashicons-format-image',
			)
		);
	}

}
