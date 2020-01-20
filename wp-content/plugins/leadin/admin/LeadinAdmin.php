<?php

namespace Leadin\admin;

use \Leadin\includes\utils as utils;

if ( ! defined( 'LEADIN_PLUGIN_VERSION' ) ) {
	wp_die( '', '', 403 );
}

// =============================================
// Define Constants
// =============================================
if ( ! defined( 'LEADIN_ADMIN_PATH' ) ) {
	define( 'LEADIN_ADMIN_PATH', untrailingslashit( __FILE__ ) );
}

if ( ! defined( 'LEADIN_LANDING_PAGE' ) ) {
	define( 'LEADIN_LANDING_PAGE', 'leadin_dashboard' );
}

/**
 * LeadinAdmin Class
 */
class LeadinAdmin {
	/**
	 * Class constructor
	 */
	public function __construct() {
		// =============================================
		// Hooks & Filters
		// =============================================
		$plugin_version = get_option( 'leadin_pluginVersion' );

		// If the plugin version matches the latest version escape the update function.
		if ( LEADIN_PLUGIN_VERSION !== $plugin_version ) {
			self::leadin_update_check();
		}

		add_action( 'admin_init', array( &$this, 'leadin_maybe_redirect' ) );
		add_action( 'admin_init', array( &$this, 'leadin_validate_options' ) );
		add_action( 'admin_menu', array( &$this, 'leadin_add_menu_items' ) );
		add_action( 'admin_enqueue_scripts', array( &$this, 'add_leadin_admin_scripts' ) );
		add_filter( 'plugin_action_links_leadin/leadin.php', array( $this, 'leadin_plugin_settings_link' ) );
		add_filter( 'plugin_action_links_leadin/leadin.php', array( $this, 'leadin_plugin_advanced_features_link' ) );
		add_action( 'admin_notices', array( &$this, 'leadin_add_background_iframe' ) );
		add_action( 'admin_notices', array( &$this, 'leadin_action_required_notice' ) );
		add_action( 'admin_footer', array( $this, 'leadin_add_feedback' ) );

		$affiliate = $this->get_affiliate_code();
		if ( $affiliate ) {
			add_option( 'hubspot_affiliate_code', $affiliate );
		}
		$this->hydrate_acquisition_attribution();
	}

	/**
   * Render the disconnected banner.
   */
	private function leadin_render_disconnected_banner() {
		$treatment_value = utils\leadin_get_treatment( 'WP004' );
		if ( LEADIN_NEW_BANNER_GATE && 2 === $treatment_value ) {
			?>
				<div class="notice notice-warning is-dismissible leadin-notice">
					<div class="leadin-notice__logo">
						<img src="<?php echo esc_attr( LEADIN_PATH . '/assets/images/hubspot-wordmark.svg' ); ?>" />
					</div>
					<div class="leadin-notice__title">
						<?php echo esc_html( __( 'Grow your list. Manage your contacts. Send beautiful email.', 'leadin' ) ); ?>
					</div>
					<div class="leadin-notice__content">
						<?php echo esc_html( __( 'Power up your site for free with the ultimate all-in-one marketing plugin for WordPress.', 'leadin' ) ); ?>
						<a class="leadin-notice__cta leadin-button leadin-primary-button" href="./admin.php?page=leadin&bannerClick=true">
							<?php echo esc_html( __( 'Connect my account', 'leadin' ) ); ?>
						</a>
					</div>
				</div>

			<?php
		} else {
			?>
				<div id="hubspot-dashboard-banner" class="notice notice-warning is-dismissible">
					<p>
						<img src="<?php echo esc_attr( LEADIN_PATH . '/assets/images/sprocket.svg' ); ?>" height="16" style="margin-bottom: -3px" />
						&nbsp;
						<?php
							echo sprintf(
								esc_html( __( 'The HubSpot plugin isn’t connected right now. To use HubSpot tools on your WordPress site, %1$sconnect the plugin now%2$s.', 'leadin' ) ),
								'<a href="admin.php?page=leadin&bannerClick=true">',
								'</a>'
							); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
					</p>
				</div>
			<?php
		}
	}

	/**
 	 * Find what notice (if any) needs to be rendered
   */
	public function leadin_action_required_notice() {
		$current_screen = get_current_screen();
		$message_type   = '';
		if ( 'leadin' !== $current_screen->parent_base ) {
			if ( ! get_option( 'leadin_portalId' ) && utils\leadin_is_admin() ) {
				$message_type = 'DISCONNECTED_MESSAGE';
			}
		}
		if ( 'DISCONNECTED_MESSAGE' === $message_type ) {
			$this->leadin_render_disconnected_banner();
		}
	}

	/**
	 * Redirect after activation.
	 */
	public function leadin_maybe_redirect() {
		if ( get_transient( 'leadin_redirect_after_activation' ) ) {
			delete_transient( 'leadin_redirect_after_activation' );
			wp_safe_redirect( admin_url( 'admin.php?page=leadin' ) );
			exit;
		} elseif ( ! empty( get_option( 'leadin_portalId' ) ) && isset( $_GET['page'] ) && 'leadin' === $_GET['page'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			// Redirect to the default landing page if the user is already logged in.
			wp_safe_redirect( admin_url( 'admin.php?page=' . LEADIN_LANDING_PAGE ) );
			exit;
		}
	}

	/**
	 * Return affiliate code from either file or option.
	 */
	private function get_affiliate_code() {
		$affiliate = get_option( 'hubspot_affiliate_code' );
		if ( ! $affiliate ) {
			$affiliate = trim( preg_replace( '/\s\s+/', ' ', utils\leadin_file_get_contents( 'hs_affiliate.txt' ) ) );
		}
		if ( $affiliate ) {
			return $affiliate;
		}
		return false;
	}

	/**
	 * Get hubspot_acquisition_attribution option
	 */
	private function get_acquisition_attribution_option() {
		return get_option( 'hubspot_acquisition_attribution' );
	}

	/**
	 * Return attribution string from wither file or option
	 */
	private function hydrate_acquisition_attribution() {
		if ( $this->get_acquisition_attribution_option() ) {
			return;
		}

		if ( file_exists( LEADIN_PLUGIN_DIR . '/hs_attribution.txt' ) ) {
			$acquisition_attribution = trim( utils\leadin_file_get_contents( 'hs_attribution.txt' ) );
			add_option( 'hubspot_acquisition_attribution', $acquisition_attribution );
		}
	}

	/**
	 * Store current version in option
	 */
	private function leadin_update_check() {
		update_option( 'leadin_pluginVersion', LEADIN_PLUGIN_VERSION );
	}

	// =============================================
	// Menus
	// =============================================
	/**
	 * Adds Leadin menu to /wp-admin sidebar
	 */
	public function leadin_add_menu_items() {
		global $submenu;
		global $wp_version;

		$notification_icon = '';
		if ( ! get_option( 'leadin_portalId' ) ) {
			$notification_icon = ' <span class="update-plugins count-1"><span class="plugin-count">!</span></span>';
		}

		$portal_id = get_option( 'leadin_portalId' );
		if ( ! empty( $portal_id ) ) {
			add_menu_page( __( 'HubSpot', 'leadin' ), __( 'HubSpot', 'leadin' ) . $notification_icon, 'edit_posts', 'leadin', array( $this, 'leadin_build_app' ), 'dashicons-sprocket', '25.100713' );
			add_submenu_page( 'leadin', __( 'Dashboard', 'leadin' ), __( 'Dashboard', 'leadin' ), 'edit_posts', 'leadin_dashboard', array( $this, 'leadin_build_app' ) );
			add_submenu_page( 'leadin', __( 'Contacts', 'leadin' ), __( 'Contacts', 'leadin' ), 'edit_posts', 'leadin_contacts', array( $this, 'leadin_build_app' ) );
			add_submenu_page( 'leadin', __( 'Lists', 'leadin' ), __( 'Lists', 'leadin' ), 'edit_posts', 'leadin_lists', array( $this, 'leadin_build_app' ) );
			add_submenu_page( 'leadin', __( 'Forms', 'leadin' ), __( 'Forms', 'leadin' ), 'edit_posts', 'leadin_forms', array( $this, 'leadin_build_app' ) );
			add_submenu_page( 'leadin', __( 'Settings', 'leadin' ), __( 'Settings', 'leadin' ), 'edit_posts', 'leadin_settings', array( $this, 'leadin_build_app' ) );
			remove_submenu_page( 'leadin', 'leadin' );
		} else {
			add_menu_page( __( 'HubSpot', 'leadin' ), __( 'HubSpot', 'leadin' ) . $notification_icon, 'manage_options', 'leadin', array( $this, 'leadin_build_app' ), 'dashicons-sprocket', '25.100713' );
		}
	}

	// =============================================
	// Settings Page
	// =============================================
	/**
	 * Adds setting link for Leadin to plugins management page
	 *
	 * @param   array $links Return the links for the settings page.
	 * @return  array
	 */
	public function leadin_plugin_settings_link( $links ) {
		$portal_id = get_option( 'leadin_portalId' );
		if ( ! empty( $portal_id ) ) {
			$page = 'leadin_settings';
		} else {
			$page = 'leadin';
		}
		$url           = get_admin_url( get_current_blog_id(), "admin.php?page=$page" );
		$settings_link = '<a href="' . $url . '">' . __( 'Settings', 'leadin' ) . '</a>';
		array_unshift( $links, $settings_link );
		return $links;
	}

	/**
	 * Adds advanced features link for Leadin to plugins management page
	 *
	 * @param   array $links Return the links for the advanced features page.
	 * @return  array
	 */
	public function leadin_plugin_advanced_features_link( $links ) {
		$portal_id = get_option( 'leadin_portalId' );
		if ( ! empty( $portal_id ) ) {
			$url                    = LEADIN_BASE_URL . '/pricing/' . $portal_id . '/marketing?' . utils\leadin_get_query_params();
			$advanced_features_link = '<a class="hubspot-menu-pricing" target="_blank" href="' . esc_attr( $url ) . '">' . esc_html( __( 'Advanced Features', 'leadin' ) ) . '</a>';
			array_push( $links, $advanced_features_link );
		}
		return $links;
	}

	/**
	 * Creates leadin app
	 */
	public function leadin_build_app() {
		global $wp_version;

		wp_enqueue_style( 'leadin-bridge-css' );

		$error_message = '';

		if ( version_compare( phpversion(), LEADIN_REQUIRED_PHP_VERSION, '<' ) ) {
			$error_message = sprintf(
				__( 'HubSpot All-In-One Marketing %1$s requires PHP %2$s or higher. Please upgrade WordPress first.', 'leadin' ),
				LEADIN_PLUGIN_VERSION,
				LEADIN_REQUIRED_PHP_VERSION
			);
		} elseif ( version_compare( $wp_version, LEADIN_REQUIRED_WP_VERSION, '<' ) ) {
			$error_message = sprintf(
				__( 'HubSpot All-In-One Marketing %1$s requires PHP %2$s or higher. Please upgrade WordPress first.', 'leadin' ),
				LEADIN_PLUGIN_VERSION,
				LEADIN_REQUIRED_WP_VERSION
			);
		}

		if ( $error_message ) {
			?>
				<div class='notice notice-warning'>
					<p>
						<?php echo esc_html( $error_message ); ?>
					</p>
				</div>
			<?php
		} else {
			$iframe_url = utils\leadin_get_iframe_src();
			?>
				<iframe id="leadin-iframe" src="<?php echo esc_attr( $iframe_url ); ?>"></iframe>
			<?php
		}
	}

	/**
	 * Render background iframe
	 */
	public function leadin_add_background_iframe() {
		$screen = get_current_screen();
		if ( 'dashboard' === $screen->id || 'post' === $screen->id || 'page' === $screen->id ) {
			$background_iframe_url = utils\leadin_get_background_iframe_src();
			?>
				<iframe class="leadin-background-iframe" style="display: none" id="leadin-iframe" src="<?php echo esc_attr( $background_iframe_url ); ?>"></iframe>
			<?php
		}
	}

	/**
	 * Setup plugin feedback
	 */
	public function leadin_add_feedback() {
		if ( get_current_screen()->id === 'plugins' ) {
			// handlers and logic are added via jQuery in the frontend.
			?>
				<div id="leadin-feedback-container" style="display: none;">
					<div class="leadin-feedback-header">
							<h2><?php echo esc_html( __( "We're sorry to see you go", 'leadin' ) ); ?></h2>
							<div class="leadin-modal-close">
								<svg class="leadin-close-svg" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
									<path class="leadin-close-path" d="M14.5,1.5l-13,13m0-13,13,13" transform="translate(-1 -1)"></path>
								</svg>
							</div>
					</div>
					<div class="leadin-feedback-body">
						<div>
							<strong>
								<?php echo esc_html( __( "If you have a moment, please let us know why you're deactivating the plugin.", 'leadin' ) ); ?>
							</strong>
						</div>
						<form id='leadin-deactivate-form' class="leadin-deactivate-form">
							<?php
							$radio_buttons = array(
								"I can't sign up or log in",
								"I don't want to sign up to HubSpot",
								"The plugin isn't working",
								"The plugin isn't useful",
								"Temporarily disabling or troubleshooting",
							);

							$radio_button_translations = array(
								__( "I can't sign up or log in", 'leadin' ),
								__( "I don't want to sign up to HubSpot", 'leadin' ),
								__( "The plugin isn't working", 'leadin' ),
								__( "The plugin isn't useful", 'leadin' ),
								__( "Temporarily disabling or troubleshooting", "leadin" ),
							);

							$buttons_count = count( $radio_buttons );
							for ( $i = 0; $i < $buttons_count; $i++ ) {
								?>
									<div class="leadin-radio-input-container">
										<input
											type="radio"
											id="leadinFeedback<?php echo esc_attr( $i ); ?>"
											name="feedback"
											value="<?php echo esc_attr( $radio_buttons[ $i ] ); ?>"
											class="leadin-feedback-radio"
											required
										>
										<label for="leadinFeedback<?php echo esc_attr( $i ); ?>">
											<?php echo esc_html( $radio_button_translations[ $i ] ); ?>
										</label>
									</div>
								<?php
							}
							?>
							<div class="leadin-radio-input-container">
								<input type="radio" id="leadinFeedbackOther" name="feedback" value="Other" class="leadin-feedback-radio">
								<label for="leadinFeedbackOther"><?php echo esc_html( __( 'Other', 'leadin' ) ); ?></label>
							</div>
							<textarea name="details" class="leadin-feedback-text-area leadin-feedback-text-control" placeholder="<?php echo esc_html( __( 'Feedback...', 'leadin' ) ); ?>"></textarea>
							<input type="hidden" name="portal_id" value="<?php echo esc_html( get_option( 'leadin_portalId' ) ); ?>">

							<div>
								<strong>
									<?php echo esc_html( __( "Thank you for your feedback. If you would like to tell us more please add your email and we'll get in touch.", 'leadin' ) ); ?>
								</strong>
							</div>

							<input name="email" type="email" class="leadin-input" placeholder="<?php echo esc_attr( __( 'Email', 'leadin' ) ); ?>">

							<div class="leadin-button-container">
								<button type="submit" id="leadin-feedback-submit" class="leadin-button leadin-primary-button leadin-loader-button">
									<div class="leadin-loader-button-content">
										<?php echo esc_html( __( 'Submit & deactivate', 'leadin' ) ); ?>
									</div>
									<div class="leadin-loader"></div>
								</button>
								<button type="button" id="leadin-feedback-skip" class="leadin-button leadin-secondary-button">
									<?php echo esc_html( __( 'Skip & deactivate', 'leadin' ) ); ?>
								</button>
							</div>
						</form>
					</div>
				</div>
			<?php
		}
	}

	// =============================================
	// Admin Styles & Scripts
	// =============================================
	/**
	 * Adds admin javascript
	 */
	public function add_leadin_admin_scripts() {
		wp_register_style( 'leadin-bridge-css', LEADIN_PATH . '/assets/style/leadin-bridge.css?', array(), LEADIN_PLUGIN_VERSION );
		wp_register_script( 'leadin-js', LEADIN_JS_BASE_PATH . '/leadin.js', array( 'jquery' ), LEADIN_PLUGIN_VERSION, true );
		wp_localize_script( 'leadin-js', 'leadinConfig', utils\leadin_get_leadin_config() );
		wp_localize_script( 'leadin-js', 'leadinI18n', utils\leadin_get_leadin_i18n() );
		wp_enqueue_script( 'leadin-js' );

		if ( get_current_screen()->id === 'plugins' ) {
			wp_enqueue_style( 'leadin-feedback-css', LEADIN_PATH . '/assets/style/leadin-feedback.css', array(), LEADIN_PLUGIN_VERSION );
			wp_enqueue_script( 'leadin-feedback', LEADIN_JS_BASE_PATH . '/feedback.js', array( 'jquery', 'thickbox' ), LEADIN_PLUGIN_VERSION, true );
		}
	}

	/**
	 * Validate existing options
	*/
	function leadin_validate_options() {
		$portal_id       = get_option( 'leadin_portalId' );
		$valid_portal_id = intval( $portal_id ) || ctype_digit( $portal_id );

		if ( ! $valid_portal_id ) {
			delete_option( 'leadin_portalId' );
			delete_option( 'leadin_portal_domain' );
		}

		if ( $valid_portal_id ) {
			$domain = get_option( 'leadin_portal_domain' );
			if ( utils\leadin_is_invalid_domain( $domain ) ) {
				delete_option( 'leadin_portal_domain' );
			}
		}
	}
}
