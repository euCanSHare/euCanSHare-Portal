<?php

namespace Leadin\includes\gutenberg;

use \Leadin\includes\utils as utils;

/**
 * Registers the leadin Gutenberg block js
 */
function leadin_register_gutenberg_block() {
	wp_register_script( 'leadin-gutenberg', LEADIN_JS_BASE_PATH . '/gutenberg.js', array( 'wp-blocks', 'wp-element', 'leadin-js' ), LEADIN_PLUGIN_VERSION, true );
	wp_localize_script( 'leadin-gutenberg', 'leadinConfig', utils\leadin_get_leadin_config() );
	wp_localize_script( 'leadin-gutenberg', 'leadinI18n', utils\leadin_get_leadin_i18n() );

	register_block_type(
		'hubspot/leadin-forms',
		array(
			'style'         => 'leadin-gutenberg-styles',
			'editor_style'  => 'leadin-gutenberg-styles-editor',
			'editor_script' => 'leadin-gutenberg',
		)
	);
}

/**
 * Adds the HubSpot block category
 *
 * @param bool $categories categories.
 * @param bool $post post.
 */
function leadin_gutenberg_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'leadin-blocks',
				'title' => __( 'HubSpot', 'leadin' ),
			),
		)
	);
}

if ( utils\leadin_is_portal_connected() && function_exists( 'register_block_type' ) ) {
	add_filter( 'block_categories', 'Leadin\includes\gutenberg\leadin_gutenberg_category', 10, 2 );
	add_action( 'init', 'Leadin\includes\gutenberg\leadin_register_gutenberg_block' );
}
