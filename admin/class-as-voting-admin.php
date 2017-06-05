<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.ionics-it.ch
 * @since      1.0.0
 *
 * @package    As_Voting
 * @subpackage As_Voting/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    As_Voting
 * @subpackage As_Voting/admin
 * @author     Philipp Bruhin <info@ionics-it.ch>
 */
class As_Voting_Admin {

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


	/**
	 * Add top menu item
	 *
	 * @since  1.0.0
	 */
	public function add_admin_page() {

		$this->plugin_screen_hook_suffix = add_menu_page(
			__( 'User Voting', 'as-voting' ),
			__( 'User Voting', 'as-voting' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'plugin_page' ),
			'dashicons-groups', null
		);
	}

	/**
	* Handles the plugin admin partial views
	*
	* @since  1.0.0
	*/
	public function plugin_page() {
		$action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';
		$id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

		switch ($action) {
			case 'view':
				$template = dirname( __FILE__ ) . '/partials/user-voting-single.php';
				break;

			case 'edit':
				$template = dirname( __FILE__ ) . '/partials/user-voting-edit.php';
				break;

			case 'new':
				$template = dirname( __FILE__ ) . '/partials/user-voting-new.php';
				break;

			default:
				$template = dirname( __FILE__ ) . '/partials/user-voting-list.php';
				break;
		}

		if ( file_exists( $template ) ) {
			include $template;
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in As_Voting_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The As_Voting_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/as-voting-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in As_Voting_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The As_Voting_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/as-voting-admin.js', array( 'jquery' ), $this->version, false );

	}

}
