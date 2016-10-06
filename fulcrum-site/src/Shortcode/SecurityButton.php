<?php

/**
 * Security Button Shortcode
 *
 * @package     UpTechLabs\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 * @copyright   2015 WP Developers Club
 */

namespace UpTechLabs\FulcrumSite\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class SecurityButton extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * @since 1.0.0
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		$is_user_logged_in = is_user_logged_in();

		if ( (bool) $this->atts['hide_until_logged_in'] && ! $is_user_logged_in ) {
			return '';
		}

		$class    = $this->atts['class'] ? ' ' . esc_attr( $this->atts['class'] ) : '';
		$url      = $this->get_url( $is_user_logged_in );
		$content  = wp_kses_post( do_shortcode( $this->content ) );
		$view_key = $this->has_access( $is_user_logged_in ) ? 'access_view' : 'view';

		ob_start();
		include( $this->config->{$view_key} );

		return ob_get_clean();

	}

	/**
	 * Get the URL.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $is_user_logged_in
	 *
	 * @return string|void
	 */
	protected function get_url( $is_user_logged_in = false ) {
		$url = $this->atts['href'];

		if ( $this->atts['add_user_id_to_url'] && $this->atts['url_param'] && $is_user_logged_in ) {
			$url = $url . '?memberID=' . get_current_user_id();
		}

		if ( false === strpos( $url, 'http' ) ) {
			$url = site_url( $url );
		}

		return $url;
	}

	/**
	 * Checks if the user has access.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $is_user_logged_in
	 *
	 * @return bool
	 */
	protected function has_access( $is_user_logged_in = false ) {
		if ( ! $this->atts['min_access_level'] ) {
			return true;
		}

		if ( 'public' == $this->atts['min_access_level'] ) {
			return true;
		}

		return $is_user_logged_in;
	}
}
