<?php

namespace Leadin\includes\utils;

/**
 * Function file
 *
 * @phpcs:disable WordPress.PHP.DevelopmentFunctions.error_log_error_log
 * @phpcs:disable WordPress.PHP.DevelopmentFunctions.error_log_print_r
 */

if ( ! defined( 'LEADIN_PLUGIN_VERSION' ) ) {
	wp_die( '', '', 403 );
}

if ( ! defined( 'LEADIN_PORTAL_ID' ) ) {
	DEFINE( 'LEADIN_PORTAL_ID', intval( get_option( 'leadin_portalId' ) ) );
}

/**
 * Returns the user role for the current user
 */
function leadin_get_user_role() {
	global $current_user;

	$user_roles = $current_user->roles;
	$user_role  = array_shift( $user_roles );

	return $user_role;
}

/**
 * Returns if a portal is connected to the plugin.
 */
function leadin_is_portal_connected() {
	$portal_id = get_option( 'leadin_portalId' );
	return ! empty( $portal_id );
}

/**
 * Get a treatment value based on number of variations. Stores it in an option so that it doesn't change.
 *
 * @param string $name name of the treatment.
 * @param number $number_of_variations number of variations.
 */
function leadin_get_treatment( $name, $number_of_variations = 2 ) {
	$treatment = (int) get_option( $name );
	if ( empty( $treatment ) ) {
		$treatment = wp_rand( 1, $number_of_variations );
		add_option( $name, $treatment );
	}
	return $treatment;
}

/**
 * Return query string from object
 *
 * @param array $arr query parameters to stringify.
 */
function leadin_http_build_query( $arr ) {
	return http_build_query( $arr, null, ini_get( 'arg_separator.output' ), PHP_QUERY_RFC3986 );
}

/**
 * Return the given version until the patch version
 * eg: 6.4.2.1-beta => 6.4.2
 *
 * @param string $version version.
 */
function leadin_parse_version( $version ) {
	preg_match( '/^\d+(\.\d+){0,2}/', $version, $match );
	if ( empty( $match ) ) {
		return '';
	}
	return $match[0];
}

/**
 * Validate static version
 *
 * @param string $version version of the static bundle.
 */
function leadin_is_valid_static_version( $version ) {
	preg_match( '/static-\d+\.\d+/', $version, $match );
	return ! empty( $match );
}

/**
 * Return array of query parameters to add to the iframe src
 */
function leadin_get_query_params() {
	global $wp_version;

	$query_param_array = array(
		'l'     	=> get_locale(),
		'php'   	=> leadin_parse_version( phpversion() ),
		'v'     	=> LEADIN_PLUGIN_VERSION,
		'wp'    	=> leadin_parse_version( $wp_version ),
		'theme' 	=> get_option( 'stylesheet' ),
		'admin' 	=> leadin_is_admin(),
		'domain' 	=> get_site_url()
	);

	if ( leadin_is_valid_static_version( LEADIN_STATIC_BUNDLE_VERSION ) ) {
		$query_param_array['s'] = LEADIN_STATIC_BUNDLE_VERSION;
	}

	return leadin_http_build_query( $query_param_array );
}

/**
 * Return the affiliate code
 */
function leadin_get_affiliate_code() {
	$affiliate_link = get_option( 'hubspot_affiliate_code' );
	preg_match( '/(?:(?:hubs\.to)|(?:mbsy\.co))\/([a-zA-Z0-9]+)/', $affiliate_link, $matches );
	if ( count( $matches ) === 2 ) {
		return $matches[1];
	} else {
		return $affiliate_link;
	}
}

/**
 * Return utm_campaign to add to the signup link
 */
function leadin_get_utm_campaign() {
	$wpe_template = get_option( 'wpe_template' );
	if ( $wpe_template === 'hubspot' ) {
		return 'wp-engine-site-template';
	}
}

/**
 * Return the signup url based on the site options
 */
function leadin_get_signup_url() {
	if ( isset( $_GET['leadin_connect'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$portal_id = filter_var( wp_unslash( $_GET['leadin_connect'] ), FILTER_VALIDATE_INT ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return LEADIN_BASE_URL . "/hubspot-plugin/$portal_id/connect?isNewPortal=true&" . leadin_get_query_params();
	}

	// Get attribution string.
	$acquisition_option = get_option( 'hubspot_acquisition_attribution', '' );
	parse_str( $acquisition_option, $signup_params );
	$signup_params['enableCollectedForms'] = 'true';
	$treatment_value                       = leadin_get_treatment( 'WP004' );
	$signup_params['wp_redirect_url']      = admin_url( 'admin.php?page=leadin&leadin_connect=true' );

	if ( ! empty( $_GET['bannerClick'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( LEADIN_NEW_BANNER_GATE ) {
			$signup_params['utm_id'] = 'WP004' . ( 2 === $treatment_value ? 'Variant' : 'Control' );
		}
	}

	// Get leadin query.
	$leadin_query = leadin_get_query_params();
	parse_str( $leadin_query, $leadin_params );

	$signup_params = array_merge( $signup_params, $leadin_params );

	// Add signup pre-fill info.
	$wp_user                    	 	= wp_get_current_user();
	$signup_params['firstName'] 		= $wp_user->user_firstname;
	$signup_params['lastName']  		= $wp_user->user_lastname;
	$signup_params['email']     		= $wp_user->user_email;
	$signup_params['company']   		= get_bloginfo( 'name' );
	$signup_params['domain']    		= get_site_url();
	// TODO: Only temporary fix. We need a proper mechanism to specify to signup the experiments should be disabled on the tests
	$signup_params['exp-disabled']	= "true";

	$affiliate_code = leadin_get_affiliate_code();
	$signup_url     = LEADIN_SIGNUP_BASE_URL . '/signup/wordpress?';

	if ( LEADIN_SIGNUP_BASE_URL !== LEADIN_BASE_URL ) {
		$signup_params['redirectBaseUrl'] = LEADIN_BASE_URL;
	}

	if ( $affiliate_code ) {
		$signup_url     .= leadin_http_build_query( $signup_params );
		$destination_url = rawurlencode( $signup_url );
		return "https://mbsy.co/$affiliate_code?url=$destination_url";
	}

	$signup_params['utm_source'] = 'wordpress-plugin';
	$signup_params['utm_medium'] = 'marketplaces';

	$utm_campaign = leadin_get_utm_campaign();
	if ( ! empty( $utm_campaign ) ) {
		$signup_params['utm_campaign'] = $utm_campaign;
	}

	return $signup_url . leadin_http_build_query( $signup_params );
}

/**
 * Return ajax url
 */
function leadin_get_ajax_url() {
	return parse_url( get_admin_url( get_current_blog_id(), 'admin-ajax.php' ) )['path'];
}

/**
 * Get the parsed `leadin_route` from the query string
 */
function leadin_get_leadin_route() {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$leadin_route = isset( $_GET['leadin_route'] ) ? wp_unslash( $_GET['leadin_route'] ) : array();
	return is_array( $leadin_route ) ? $leadin_route : array();
}

/**
 * Get page name from the current page id.
 * E.g. "hubspot_page_leadin_forms" => "forms"
 */
function leadin_get_page_id() {
	$screen_id = get_current_screen()->id;
	return preg_replace( '/^(hubspot_page_|toplevel_page_)/', '', $screen_id );
}

/**
 * Get a map of page => url
 */
function leadin_get_routes_mapping() {
	$portal_id      = get_option( 'leadin_portalId' );
	$dashboard_path = "/reports-dashboard/$portal_id/marketing";

	return array(
		'leadin'           => $dashboard_path,
		'leadin_dashboard' => $dashboard_path,
		'leadin_contacts'  => "/contacts/$portal_id/contacts",
		'leadin_lists'     => "/contacts/$portal_id/lists",
		'leadin_forms'     => "/forms/$portal_id",
		'leadin_settings'  => "/hubspot-plugin/$portal_id/settings",
	);
}

/**
 * Returns the right iframe src
 * The src will be `/hubspot-plugin/{portalId}/{path}/{routes}`,
 * where path is the content after `leadin_` in ?page=leadin_path
 * and routes is the content of the `leadin_route` query parameter
 * eg: ?page=leadin_forms&leadin_route[0]=foo&leadin_route[1]=bar
 * will point to /hubspot-plugin/{portalId}/forms/foo/bar
 */
function leadin_get_iframe_src() {
	if ( ! leadin_is_portal_connected() ) {
		return leadin_get_signup_url();
	}

	$page_id = leadin_get_page_id();
	$routes  = leadin_get_routes_mapping();

	if ( isset( $routes[ $page_id ] ) ) {
		$route = $routes[ $page_id ];
	} else {
		$route = $routes[''];
	}

	$sub_routes = join( '/', leadin_get_leadin_route() );
	$sub_routes = empty( $sub_routes ) ? $sub_routes : "/$sub_routes";

	return LEADIN_BASE_URL . "$route$sub_routes?" . leadin_get_query_params();
}

/**
 * Get background iframe src
 */
function leadin_get_background_iframe_src() {
	$portal_id     = get_option( 'leadin_portalId' );
	$portal_id_url = '';

	if ( leadin_is_portal_connected() ) {
		$portal_id_url = "/$portal_id";
	}

	$query  = '';
	$screen = get_current_screen();
	if ( 'dashboard' === $screen->id && LEADIN_NEW_BANNER_GATE ) {
		$treatment_value = leadin_get_treatment( 'WP004' );
		$query           = 'treatment=WP004' . ( 2 === $treatment_value ? 'Variant' : 'Control' ) . '&';
	}

	return LEADIN_BASE_URL . "/hubspot-plugin$portal_id_url/background?$query" . leadin_get_query_params();
}

/**
 * Get the leadinConfig
 */
function leadin_get_leadin_config() {
	global $wp_version;

	return array(
		'adminUrl'            => admin_url(),
		'ajaxUrl'             => leadin_get_ajax_url(),
		'env'                 => constant( 'LEADIN_ENV' ),
		'formsScript'         => constant( 'LEADIN_FORMS_SCRIPT_URL' ),
		'formsScriptPayload'  => constant( 'LEADIN_FORMS_PAYLOAD' ),
		'hubspotBaseUrl'      => constant( 'LEADIN_BASE_URL' ),
		'leadinPluginVersion' => constant( 'LEADIN_PLUGIN_VERSION' ),
		'locale'              => get_locale(),
		'nonce'               => wp_create_nonce( 'hubspot-ajax' ),
		'phpVersion'          => leadin_parse_version( phpversion() ),
		'pluginPath'          => constant( 'LEADIN_PATH' ),
		'plugins'             => get_plugins(),
		'portalId'            => get_option( 'leadin_portalId' ),
		'portalDomain'        => get_option( 'leadin_portal_domain' ),
		'routes'              => leadin_get_routes_mapping(),
		'theme'               => get_option( 'stylesheet' ),
		'wpVersion'           => leadin_parse_version( $wp_version ),
		'pricingQuery'        => leadin_get_query_params(),
	);
}

/**
 * Get leadinI18n
 */
function leadin_get_leadin_i18n() {
	return array(
		'chatflows'            => __( 'Live Chat', 'leadin' ),
		'email'                => __( 'Email', 'leadin' ),
		'pricing'              => __( 'Advanced Features', 'leadin' ),
		'signIn'               => __( 'Sign In', 'leadin' ),
		'selectExistingForm'   => __( 'Select an existing form', 'leadin' ),
		'selectForm'           => __( 'Select a form', 'leadin' ),
		'formBlockTitle'       => __( 'HubSpot Form', 'leadin' ),
		'formBlockDescription' => __( 'Select and embed a HubSpot form', 'leadin' ),
	);
}

/**
 * Return true if the current user has the `manage_options` capability
 */
function leadin_is_admin() {
	return current_user_can( 'manage_options' );
}

/**
 * Return 403 if the current user does not have the `manage_options` capability
 */
function leadin_manage_options_or_403() {
	if ( ! leadin_is_admin() ) {
		wp_die( '{ "error": "Insufficient permissions" }', '', 403 );
	}
}

/**
 * Validate nonce sent with ajax
 */
function leadin_validate_nonce() {
	$valid = check_ajax_referer( 'hubspot-ajax', false, false );
	if ( ! $valid ) {
		wp_die( '{ "error": "CSRF token missing or invalid" }', 403 );
	}
}

/** Get content of local file
 *
 * @param string $file_path Relative path starting from the leadin folder.
 */
function leadin_file_get_contents( $file_path ) {
	if ( file_exists( plugin_dir_path( LEADIN_BASE_PATH ) . $file_path ) ) {
		return file_get_contents( plugin_dir_path( LEADIN_BASE_PATH ) . $file_path );
	}
	return '';
}

/**
 * Validate domain.
 *
 * @param string $domain domain.
 */
function leadin_is_invalid_domain( $domain ) {
	return ! preg_match( '/^(?:[-A-Za-z0-9]+\.)+[A-Za-z]{2,}$/', $domain, $match );
}
