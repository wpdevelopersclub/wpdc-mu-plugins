<?php
/**
 * QA Shortcode
 *
 * @package     UpTechLabs\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace UpTechLabs\FulcrumSite\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class QA extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * @since 1.0.0
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		$content = wp_kses_post( $this->content );
		$content = do_shortcode( $this->content );

		ob_start();
		include( $this->config->view );

		return ob_get_clean();
	}

	/**************
	 * Helpers
	 *************/

	/**
	 * Get the font icon classname.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $show_open Indicates whether icon should indicate an open position.
	 *
	 * @return string|void
	 */
	protected function get_icon( $show_open = false ) {
		$icon = $show_open ? 'close_icon' : 'open_icon';

		return esc_attr( $this->atts[ $icon ] );
	}
}
