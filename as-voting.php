<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ionics-it.ch
 * @since             1.0.0
 * @package           As_Voting
 *
 * @wordpress-plugin
 * Plugin Name:       Apfelspalter Voting
 * Plugin URI:        https://www.ionics-it.ch
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Philipp Bruhin
 * Author URI:        https://www.ionics-it.ch
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       as-voting
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-as-voting-activator.php
 */
function activate_as_voting() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-as-voting-activator.php';
	As_Voting_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-as-voting-deactivator.php
 */
function deactivate_as_voting() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-as-voting-deactivator.php';
	As_Voting_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_as_voting' );
register_deactivation_hook( __FILE__, 'deactivate_as_voting' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-as-voting.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_as_voting() {

	$plugin = new As_Voting();
	$plugin->run();

}
run_as_voting();
