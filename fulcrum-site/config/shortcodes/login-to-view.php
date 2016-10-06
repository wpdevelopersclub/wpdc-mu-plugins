<?php

/**
 * Login to View Shortcode - Runtime Configuration Parameters
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
	'classname' => 'UpTechLabs\FulcrumSite\Shortcode\LoginToView',
	'config'    => array(
		'shortcode' => 'login_to_view',
		'no_view'   => true,
		'view'      => '',
		'defaults'  => array(
			'class'             => '',
			'wpautop'           => 1,
			'alternate_message' => __( 'For members-only', 'fulcrum-site' ),
		),
	),
);
