<?php

namespace Leadin\includes\connection;

use \Leadin\includes\utils as utils;

if ( ! defined( 'LEADIN_PLUGIN_VERSION' ) ) {
	wp_die( '', '', 403 );
}

add_action( 'wp_ajax_leadin_disconnect_ajax', 'utils\leadin_validate_nonce', 1 );
add_action( 'wp_ajax_leadin_disconnect_ajax', 'utils\leadin_manage_options_or_403', 2 );
add_action( 'wp_ajax_leadin_disconnect_ajax', 'Leadin\includes\connection\leadin_disconnect_ajax', 3 );

/**
 * AJAX handler to disconnect portal id
 */
function leadin_disconnect_ajax() {
	delete_option( 'leadin_portal_domain' );
	if ( get_option( 'leadin_portalId' ) ) {
		delete_option( 'leadin_portalId' );
		wp_die( '{"message": "Success!"}' );
	} else {
		wp_die( '{"No leadin_portal_id found, cannot disconnect."}', '', 204 );
	}
}
