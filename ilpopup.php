<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jomichaelis.de
 * @since             1.0.0
 * @package           Ilpopup
 *
 * @wordpress-plugin
 * Plugin Name:       Initial Language Popup
 * Plugin URI:        https://github.com/jomichaelis/ilpopup
 * Description:       This Plugin let's the visitor choose the language at first visit of the page.
 * Version:           1.0.0
 * Author:            Jo Michaelis
 * Author URI:        https://jomichaelis.de
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ilpopup
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ILPOPUP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ilpopup-activator.php
 */
function activate_ilpopup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ilpopup-activator.php';
	Ilpopup_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ilpopup-deactivator.php
 */
function deactivate_ilpopup() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ilpopup-deactivator.php';
	Ilpopup_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ilpopup' );
register_deactivation_hook( __FILE__, 'deactivate_ilpopup' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ilpopup.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ilpopup() {

	$plugin = new Ilpopup();
	$plugin->run();

}
run_ilpopup();
