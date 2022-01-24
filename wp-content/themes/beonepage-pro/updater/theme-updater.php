<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package BeOnePage
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	get_template_part( '/updater/theme-updater', 'admin' );
	//require_once ( dirname( __FILE__ ) . '/theme-updater-admin.php' );
	
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://betheme.me', // Site where EDD is hosted
		'item_name'      => 'BeOnePage', // Name of theme
		'theme_slug'     => get_template(), // Theme slug
		'version'        => beonepage_get_version(), // The current version of this theme
		'author'         => 'BeTheme', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '', // Optional, allows for a custom license renewal link
		'beta'           => true, // Optional, set to true to opt into beta versions
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'beonepage' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'beonepage' ),
		'license-key'               => __( 'License Key', 'beonepage' ),
		'license-action'            => __( 'License Action', 'beonepage' ),
		'deactivate-license'        => __( 'Deactivate License', 'beonepage' ),
		'activate-license'          => __( 'Activate License', 'beonepage' ),
		'status-unknown'            => __( 'License status is unknown.', 'beonepage' ),
		'renew'                     => __( 'Renew?', 'beonepage' ),
		'unlimited'                 => __( 'unlimited', 'beonepage' ),
		'license-key-is-active'     => __( 'License key is active.', 'beonepage' ),
		'expires%s'                 => __( 'Expires %s.', 'beonepage' ),
		'expires-never'             => __( 'Lifetime License.', 'beonepage' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'beonepage' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'beonepage' ),
		'license-key-expired'       => __( 'License key has expired.', 'beonepage' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'beonepage' ),
		'license-is-inactive'       => __( 'License is inactive.', 'beonepage' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'beonepage' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'beonepage' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'beonepage' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'beonepage' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'beonepage' ),
	)

);
