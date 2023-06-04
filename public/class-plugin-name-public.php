<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/plugin-name-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/plugin-name-public.js', array('jquery'), $this->version, false);
	}

	public function embed_ad($content)
	{
		if (is_single() && is_main_query()) {
			if (get_option('place_of_ad', '0') == '0') {
				$content_sections = explode("<h2", $content);
				$result = $content_sections[0];
				foreach ($content_sections as $index => $section) {
					if ($index == 0) {
						continue;
					}
					$result .= '<iframe data-aa=' . get_option('data_aa_of_ad', '') . ' ' . 'src="' . get_option('src_of_ad', '') . '"' . ' ' . 'style="' . get_option('style_of_add', '') . '"' . '></iframe>';
					$result .= '<h2' . $section;
				}
				return $result;
			} elseif (get_option('place_of_ad', '0') == '1') {
				$content_sections = explode("</h2>", $content);
				$result = $content_sections[0];
				foreach ($content_sections as $index => $section) {
					if ($index == 0) {
						continue;
					}
					$result .= '</h2>';
					$result .= '<iframe data-aa=' . get_option('data_aa_of_ad', '') . ' ' . 'src="' . get_option('src_of_ad', '') . '"' . ' ' . 'style="' . get_option('style_of_add', '') . '"' . '></iframe>';
					$result .= $section;
				}
				return $result;
			}
		}
		return $content;
	}
}
