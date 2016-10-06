<?php

/**
 * Login to View Shortcode
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

class LoginToView extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * @since 1.0.0
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		if ( ! is_user_logged_in() ) {
			return esc_html( $this->atts['alternate_message'] );
		}

		$content = wp_kses_post( do_shortcode( $this->content ) );

		return $this->atts['wpautop'] ? wpautop( $content ) : $content;
	}
}
