<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin
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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
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
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/plugin-name-admin.css', array(), $this->version, 'all');
		wp_enqueue_style('bootstrap-css', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/plugin-name-admin.js', array('jquery'), $this->version, false);
		wp_enqueue_script('bootstrap-js', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), $this->version, false);
	}
	/**
	 * Add our custom menue.
	 *
	 * @since    1.0.0
	 */
	public function ad_adder_admin_menu()
	{
		add_options_page('Ad Adder Settings ', 'Ad Adder', 'manage_options', 'adadder/mainsettings.php', array($this, 'ad_adder_admin_page'));
		// add_menu_page('Ad Adder Settings ', 'Ad Adder Settings', 'manage_options', 'adadder/mainsettings.php', array($this, 'ad_adder_admin_page'), 'dashicons-tickets', 250);
		// add_submenu_page('adadder/mainsettings.php', 'Add adder submenu page', 'Add adder submenu title', 'manage_options', 'adadder/minorsettings.php', array($this, 'adadder_admin_sub_page'));
	}

	public function ad_adder_admin_page()
	{
		//return views
		require_once 'partials/plugin-name-admin-display.php';
	}
	// public function ad_adder_admin_sub_page()
	// {
	// 	//return subpage views
	// 	require_once 'partials/plugin-name-admin-sub-page-display.php';
	// }

	/**
	 * Register custom fields for plugin settings.
	 *
	 * @since    1.0.0
	 */
	public function register_ad_adder_general_settings()
	{
		// add_settings_section( $id:string, $title:string, $callback:callable, $page:string, $args:array )
		// add_settings_field( 'theplaceofadd', 'Place of Ad', array($this, 'placeodaddHTML'), $page:string, $section:string, $args:array )
		register_setting('adaddercustomsettings', 'place_of_ad', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
		register_setting('adaddercustomsettings', 'data_aa_of_ad', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));
		register_setting('adaddercustomsettings', 'src_of_ad', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));
		register_setting('adaddercustomsettings', 'style_of_add', array('sanitize_callback' => 'sanitize_text_field', 'default' => ''));
	}
}
