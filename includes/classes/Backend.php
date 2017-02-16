<?php namespace WP_Plugins\ACF_PRO\Media_Button;

/**
 * Backend logic
 *
 * @package WP_Plugins\ACF_PRO\Media_Button
 */
class Backend extends Component
{
	/**
	 * Constructor
	 *
	 * @return void
	 */
	protected function init()
	{
		parent::init();

		// ACF url field render action
		add_action( 'acf/render_field/type=url', [ &$this, 'add_media_button' ], 20 );

		// ACF enqueue script action
		add_action( 'acf/input/admin_enqueue_scripts', [ &$this, 'load_assets' ] );
	}

	/**
	 * Add media library button to field
	 *
	 * @param array $field
	 *
	 * @return void
	 */
	public function add_media_button( $field )
	{
		if ( !is_admin() )
		{
			// skip if not in admin dashboard
			return;
		}

		echo '<p class="acf-media-library-button-wrapper">',
		'<button type="button" class="button acf-media-library-button">',
		'<i class="dashicons dashicons-admin-media"></i> ', __( 'Media Library/Upload', ACF_PRO_MB_DOMAIN ),
		'</button></p>';
	}

	/**
	 * Load JS & CSS assets
	 *
	 * @return void
	 */
	public function load_assets()
	{
		if ( !is_admin() )
		{
			// skip if not in admin dashboard
			return;
		}

		// Assets
		wp_enqueue_style( 'acf-pro-media-button', Helpers::enqueue_path() . 'css/admin.css', null, acf_pro_mb_version() );
		wp_enqueue_script( 'acf-pro-media-button', Helpers::enqueue_path() . 'js/admin.js', [ 'jquery' ], acf_pro_mb_version(), true );

		// Localization
		wp_localize_script( 'acf-pro-media-button', 'acf_pro_media_button', [
			'i18n' => [
				'frame_title'   => __( 'Media Library', ACF_PRO_MB_DOMAIN ),
				'select_button' => __( 'Select', ACF_PRO_MB_DOMAIN ),
			],
		] );
	}
}
