<?php
/**
 * Created by Nabeel
 * Date: 2016-01-22
 * Time: 2:38 AM
 *
 * @package WP_Plugins\ACF_PRO\Media_Button
 */

use WP_Plugins\ACF_PRO\Media_Button\Plugin;

if ( !function_exists( 'acf_pro_url_field_media_button' ) ):
	/**
	 * Get plugin instance
	 *
	 * @return Plugin
	 */
	function acf_pro_url_field_media_button()
	{
		return Plugin::get_instance();
	}
endif;

if ( !function_exists( 'acf_pro_mb_view' ) ):
	/**
	 * Load view
	 *
	 * @param string  $view_name
	 * @param array   $args
	 * @param boolean $return
	 *
	 * @return void
	 */
	function acf_pro_mb_view( $view_name, $args = null, $return = false )
	{
		if ( $return )
		{
			// start buffer
			ob_start();
		}

		acf_pro_url_field_media_button()->load_view( $view_name, $args );

		if ( $return )
		{
			// get buffer flush
			return ob_get_clean();
		}
	}
endif;

if ( !function_exists( 'acf_pro_mb_version' ) ):
	/**
	 * Get plugin version
	 *
	 * @return string
	 */
	function acf_pro_mb_version()
	{
		return acf_pro_url_field_media_button()->version;
	}
endif;