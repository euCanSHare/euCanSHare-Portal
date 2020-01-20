<?php

namespace Leadin\includes\connection;

use \Leadin\includes\utils as utils;

if ( ! defined( 'LEADIN_PLUGIN_VERSION' ) ) {
	wp_die( '', '', 403 );
}

add_action( 'wp_ajax_leadin_registration_ajax', 'utils\leadin_validate_nonce', 1 );
add_action( 'wp_ajax_leadin_registration_ajax', 'utils\leadin_manage_options_or_403', 2 );
add_action( 'wp_ajax_leadin_registration_ajax', 'Leadin\includes\connection\leadin_registration_ajax', 3 );

/**
 * Handler for ajax call to connect portal
 */
function leadin_registration_ajax() {
	$existing_portal_id = get_option( 'leadin_portalId' );

	if ( ! empty( $existing_portal_id ) ) {
		wp_die( '{"error": "Registration is already complete for this portal"}', '', 400 );
	}

	$request_body    = file_get_contents( 'php://input' );
	$data            = json_decode( $request_body, true );
	$new_portal_id   = intval( $data['portalId'] );
	$new_user_domain = $data['domain'];

	if ( empty( $new_portal_id ) ) {
		$error_body = array(
			'error'   => 'Registration missing required fields',
			'request' => $request_body,
		);
		wp_die( json_encode( $error_body ), '', 400 );
	}

	if ( empty( $new_user_domain ) || utils\leadin_is_invalid_domain( $new_user_domain ) ) {
		$error_body = array(
			'error'   => 'invalid domain in submission',
			'request' => $request_body,
		);
		wp_die( json_encode( $error_body ), '', 400 );
	}
	add_option( 'leadin_portalId', $new_portal_id );
	add_option( 'leadin_portal_domain', $new_user_domain );

	wp_die( '{"message": "Success!"}' );
}
