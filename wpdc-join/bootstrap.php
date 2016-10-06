<?php
/**
 * Join WPDC Plugin
 *
 * @package         UpTechLabs\WPDC\Join
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://UpTechLabs.io
 *
 * @wordpress-plugin
 * Plugin Name:     Join WPDC Plugin
 * Plugin URI:      https://UpTechLabs.io
 * Description:     Adds a registration and Join WPDC
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      https://UpTechLabs.io
 * Text Domain:     slack
 * Requires WP:     4.5
 * Requires PHP:    5.4
 */

/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
namespace UpTechLabs\WPDC\Join;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum_Contract;

if ( ! defined( 'ABSPATH' ) ) {
	exit( "Oh, silly, there's nothing to see here." );
}

add_action( 'register_form', __NAMESPACE__ . '\add_fields_to_register_form' );
/**
 * Add the name fields to the registration form.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_fields_to_register_form() {
	require_once( 'src/views/form.php' );
}

add_filter( 'registration_redirect', __NAMESPACE__ . '\redirect_to_thank_you' );
/**
 * Redirect to the Thank You page.
 *
 * @since 1.0.0
 *
 * @return string|void
 */
function redirect_to_thank_you() {
	return site_url( 'thank-you-for-joining-the-club' );
}


add_action( 'register_new_user', __NAMESPACE__ . '\update_user_info', 1 );
/**
 * Update the user info.
 *
 * @since 1.0.0
 *
 * @param int $user_id
 *
 * @return void
 */
function update_user_info( $user_id ) {
	if ( ! $user_id ) {
		return;
	}

	$fields = array(
		'first_name' => 'user_first_name',
		'last_name' => 'user_last_name',
	);

	foreach( $fields as $key => $post_key ) {
		if ( ! array_key_exists( $post_key, $_POST ) ) {
			continue;
		}

		$value = strip_tags( $_POST[ $post_key ] );
		update_user_meta( $user_id, $key, $value );
	}
}
