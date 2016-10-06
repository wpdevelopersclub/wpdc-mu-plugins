<?php

/**
 * WPDC MU Plugins Loader
 *
 * @package         UpTechLabs\WPDC
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://UpTechLabs.io
 *
 * @wordpress-plugin
 * Plugin Name:     WPDC Must-User Plugins Loader
 * Plugin URI:      https://github.com/wpdevelopersclub/wpdc-mu-plugins
 * Description:     Loads all Must Use Plugins including Fulcrum, Fulcrum Site, Slack Invite, Typed Features, and WPDC Join
 *
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      http://UpTechLabs.io
 * Text Domain:     ktc
 * Requires WP:     4.5
 * Requires PHP:    5.4
 */
namespace UpTechLabs\WPDC;

include( 'fulcrum/bootstrap.php' );

$fulcrum = \Fulcrum\launch();

$fulcrum_plugins = array(
	'\UpTechLabs\FulcrumSite\launch' => 'fulcrum-site/bootstrap.php',
	'\UpTechLabs\SlackInvite\launch' => 'slack-invite/bootstrap.php',
	'\UpTechLabs\TypedFeatures\launch' => 'typed-features/bootstrap.php',
);

require_once( 'wpdc-join/bootstrap.php' );

foreach ( $fulcrum_plugins as $function_name => $boostrap_filename ) {
	require_once( $boostrap_filename );
	$function_name( $fulcrum );
}

do_action( 'fulcrum_all_must_use_plugins_loaded', $fulcrum );
