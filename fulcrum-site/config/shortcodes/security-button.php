<?php

/**
 * Info Box Shortcode - Runtime Configuration Parameters
 *
 * @package     UpTechLabs\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace UpTechLabs\FulcrumSite\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'UpTechLabs\FulcrumSite\Shortcode\SecurityButton',
	'config'    => array(
		'shortcode'   => 'security_button',
		'view'        => FULCRUM_SITE_PLUGIN_DIR . 'src/Shortcode/views/security-button-no-access.php',
		'access_view' => FULCRUM_SITE_PLUGIN_DIR . 'src/Shortcode/views/security-button-access.php',
		'defaults'    => array(
			'class'                => '',
			'open_new_tab'         => 0,
			'icon'                 => '',
			'href'                 => '',
			'min_access_level'     => 'public',
			'hide_until_logged_in' => 0,
			'add_user_id_to_url'   => 0,
			'url_param'            => 'userID',
		),
	),
);
