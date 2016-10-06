<?php
/**
 * Plugin Controller
 *
 * @package     UpTechLabs\FulcrumSite
 * @since       1.2.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace UpTechLabs\FulcrumSite;

use Fulcrum\Addon\Addon;

class Plugin extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.2.0';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '4.5';

	/*************************
	 * Instantiate & Init
	 ************************/

	/**
	 * Addons can overload this method for additional functionality
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	protected function init_addon() {
		do_action( 'fulcrum_site_loaded' );

		add_action( 'edit_form_after_title', array( $this, 'enable_page_for_posts_editor' ) );

		add_filter( 'login_redirect', array( $this, 'redirect_to_account_after_login' ), 10, 3 );

		add_filter( 'genesis_load_deprecated', '__return_false' );
	}

	/**
	 * Redirect the user to their account page after logging in.
	 *
	 * @since 1.0.0
	 *
	 * @param string $redirect_to
	 * @param $request
	 * @param $user
	 *
	 * @return string|void
	 */
	public function redirect_to_account_after_login( $redirect_to, $request, $user ) {
		$is_ssl = fulcrum_is_dev_environment() ? 'http' : 'https';

		return site_url( '/member-dashboard', $is_ssl );
	}

	/**
	 * Enable the editor again on the page_for_posts.
	 *
	 * @since 1.0.0
	 *
	 * @param $post
	 *
	 * @return void
	 */
	public function enable_page_for_posts_editor( $post ) {
		if ( $post->ID == get_option( 'page_for_posts' ) ) {
			add_post_type_support( 'page', 'editor' );
		}
	}
}
