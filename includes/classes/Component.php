<?php namespace WP_Plugins\ACF_PRO\Media_Button;

/**
 * Base Component
 *
 * @package WP_Plugins\ACF_PRO\Media_Button
 */
class Component extends Singular
{
	/**
	 * Plugin Main Component
	 *
	 * @var Plugin
	 */
	protected $plugin;

	/**
	 * Constructor
	 *
	 * @return void
	 */
	protected function init()
	{
		// vars
		$this->plugin = Plugin::get_instance();
	}
}
