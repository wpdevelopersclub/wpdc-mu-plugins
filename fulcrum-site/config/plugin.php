<?php
/**
 * Fulcrum Site Plugin Runtime Configuration Parameters.
 *
 * @package     UpTechLabs\FulcrumSite
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace UpTechLabs\FulcrumSite;

return array(

	'plugin_activation_keys' => array(),
	
	'register_concretes' => array(),

	'service_providers' => array(

		/****************************
		 * Assets
		 ****************************/
		'style.fontawesome'   => array(
			'provider' => 'provider.asset',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/assets/font-awesome.php',
		),
		// This is the minified live site scripts
		'script.fulcrum_site'   => array(
			'provider' => 'provider.asset',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/assets/plugin-build.php',
		),

		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.clearfix'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/clearfix.php',
		),
		'shortcode.info_box'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/info-box.php',
		),
		'shortcode.login_to_view'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/login-to-view.php',
		),
		'shortcode.qa'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/qa.php',
		),
		'shortcode.security_button'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/security-button.php',
		),
	),
);
