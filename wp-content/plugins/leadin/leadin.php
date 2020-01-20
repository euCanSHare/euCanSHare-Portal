<?php

namespace Leadin;
/**
 * Plugin Name: HubSpot All-In-One Marketing - Forms, Popups, Live Chat
 * Plugin URI: http://www.hubspot.com/integrations/wordpress
 * Description: HubSpot’s official WordPress plugin allows you to add forms, popups, and live chat to your website and integrate with the best WordPress CRM.
 * Version: 7.18.81
 * Author: HubSpot
 * Author URI: http://www.hubspot.com
 * License: GPL v3
 * Text Domain: leadin
 * Domain Path: /languages/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// =============================================
// Define Constants
// =============================================
if ( ! defined( 'LEADIN_BASE_PATH' ) ) {
	define( 'LEADIN_BASE_PATH', __FILE__ );
}

if ( ! defined( 'LEADIN_PATH' ) ) {
	define( 'LEADIN_PATH', untrailingslashit( plugins_url( '', LEADIN_BASE_PATH ) ) );
}

if ( ! defined( 'LEADIN_PLUGIN_DIR' ) ) {
	define( 'LEADIN_PLUGIN_DIR', untrailingslashit( dirname( LEADIN_BASE_PATH ) ) );
}

if ( ! defined( 'LEADIN_PLUGIN_SLUG' ) ) {
	define( 'LEADIN_PLUGIN_SLUG', basename( dirname( LEADIN_BASE_PATH ) ) );
}

if ( file_exists( LEADIN_PLUGIN_DIR . '/includes/leadin-overrides.php' ) ) {
	require_once LEADIN_PLUGIN_DIR . '/includes/leadin-overrides.php';
}

if ( ! defined( 'LEADIN_REQUIRED_WP_VERSION' ) ) {
	define( 'LEADIN_REQUIRED_WP_VERSION', '4.0' );
}

if ( ! defined( 'LEADIN_REQUIRED_PHP_VERSION' ) ) {
	define( 'LEADIN_REQUIRED_PHP_VERSION', '5.6' );
}

if ( ! defined( 'LEADIN_DB_VERSION' ) ) {
	define( 'LEADIN_DB_VERSION', '2.2.5' );
}

if ( ! defined( 'LEADIN_PLUGIN_VERSION' ) ) {
	define( 'LEADIN_PLUGIN_VERSION', '7.18.81' );
}

if ( ! defined( 'LEADIN_SOURCE' ) ) {
	define( 'LEADIN_SOURCE', 'leadin.com' );
}

if ( ! defined( 'LEADIN_SCRIPT_LOADER_DOMAIN' ) ) {
	define( 'LEADIN_SCRIPT_LOADER_DOMAIN', 'js.hs-scripts.com' );
}

if ( ! defined( 'LEADIN_FORMS_SCRIPT_URL' ) ) {
	define( 'LEADIN_FORMS_SCRIPT_URL', '//js.hsforms.net/forms/v2.js' );
}

if ( ! defined( 'LEADIN_FORMS_PAYLOAD' ) ) {
	define( 'LEADIN_FORMS_PAYLOAD', '' );
}

if ( ! defined( 'LEADIN_ENV' ) ) {
	define( 'LEADIN_ENV', 'prod' );
}

if ( ! defined( 'LEADIN_BASE_URL' ) ) {
	define( 'LEADIN_BASE_URL', 'https://app.hubspot.com' );
}

if ( ! defined( 'LEADIN_SIGNUP_BASE_URL' ) ) {
	define( 'LEADIN_SIGNUP_BASE_URL', LEADIN_BASE_URL );
}

if ( ! defined( 'LEADIN_JS_BASE_PATH' ) ) {
	define( 'LEADIN_JS_BASE_PATH', LEADIN_PATH . '/js/dist' );
}

if ( ! defined( 'LEADIN_STATIC_BUNDLE_VERSION' ) ) {
	define( 'LEADIN_STATIC_BUNDLE_VERSION', 'static-1.1457' );
}

if ( ! defined( 'LEADIN_NEW_BANNER_GATE' ) ) {
	define( 'LEADIN_NEW_BANNER_GATE', false );
}

// =============================================
// Set autoload
// =============================================
require_once LEADIN_PLUGIN_DIR . '/vendor/autoload.php';
require_once ABSPATH . 'wp-admin/includes/plugin.php';

use \Leadin\main\ClassLeadin;


// =============================================
// Hooks & Filters
// =============================================
/**
 * Parse shortcode
 *
 * @param array $attributes Shortcode attributes.
 */
function leadin_add_hubspot_shortcode( $attributes ) {
	$parsed_attributes = shortcode_atts(
		array(
			'type'   => null,
			'portal' => null,
			'id'     => null,
		),
		$attributes
	);

	if (
		! isset( $parsed_attributes['type'] ) ||
		! isset( $parsed_attributes['portal'] ) ||
		! isset( $parsed_attributes['id'] )
	) {
		return;
	}

	$portal_id = $parsed_attributes['portal'];
	$id        = $parsed_attributes['id'];

	switch ( $parsed_attributes['type'] ) {
		case 'form':
			return '
				<' . 'script charset="utf-8" type="text/javascript" src="' . LEADIN_FORMS_SCRIPT_URL . '"></script>
				<script>
					hbspt.forms.create({
						portalId: ' . $portal_id . ',
						formId: "' . $id . '",
						shortcode: "wp",
						' . LEADIN_FORMS_PAYLOAD . '
					});
				</script>
			';
		case 'cta':
			return '
				<!--HubSpot Call-to-Action Code -->
				<span class="hs-cta-wrapper" id="hs-cta-wrapper-' . $id . '">
						<span class="hs-cta-node hs-cta-' . $id . '" id="' . $id . '">
								<!--[if lte IE 8]>
								<div id="hs-cta-ie-element"></div>
								<![endif]-->
								<a href="https://cta-redirect.hubspot.com/cta/redirect/' . $portal_id . '/' . $id . '" >
										<img class="hs-cta-img" id="hs-cta-img-' . $id . '" style="border-width:0px;" src="https://no-cache.hubspot.com/cta/default/' . $portal_id . '/' . $id . '.png"  alt="New call-to-action"/>
								</a>
						</span>
						<' . 'script charset="utf-8" src="//js.hubspot.com/cta/current.js"></script>
						<script type="text/javascript">
								hbspt.cta.load(' . $portal_id . ', \'' . $id . '\', {});
						</script>
				</span>
				<!-- end HubSpot Call-to-Action Code -->
			';
	}
}

/**
 * Checks the stored database version against the current data version + updates if needed
 */
function leadin_init() {
	load_plugin_textdomain( 'leadin', false, '/leadin/languages' );
	new ClassLeadin();
	add_shortcode( 'hubspot', 'Leadin\leadin_add_hubspot_shortcode' );
}

/**
 * Redirect to the HubSpot plugin's main page after activation
 */
function leadin_plugin_activate() {
	set_transient( 'leadin_redirect_after_activation', true, 60 );
}

/**
 * Disconnect the account and clean all options set after deactivation
 */
function leadin_plugin_deactivate() {
	// Disconnect portal and clean properties
	foreach ( array(
		'leadin_portal_domain',
		'leadin_portalId',
		'leadin_pluginVersion',
		'hubspot_affiliate_code',
		'hubspot_acquisition_attribution',
	) as $option_name
	) {
		if ( get_option( $option_name ) ) {
			delete_option( $option_name );
		}
	}
}

register_activation_hook( __FILE__, 'leadin_plugin_activate' );
register_deactivation_hook( __FILE__, 'leadin_plugin_deactivate' );

add_action( 'plugins_loaded', 'Leadin\leadin_init', 14 );
