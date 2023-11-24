<?php
/**
 * Plugin Name:       MojPlugin
 * Plugin URI:        https://example.com/plugins/pdev
 * Description:       Kratki opis PlugIn
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      5.6
 * Author:            Edis Mekic
 * Author URI:        https://example.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pdev
 * Domain Path:       /public/lang
 */

// Define the namespace
namespace PDEV;

// Enable error reporting during development
error_reporting(E_ALL);
ini_set('display_errors', 1);



function pdev_create_menu() {
    add_menu_page(
        'PDEV Settings Page',
        'PDEV Settings',
        'manage_options',
        'pdev-options',
        'pdev_settings_page', // Make sure this function is defined
        'dashicons-smiley',
        99
        );
    
}

// Include the necessary files
require_once plugin_dir_path(__FILE__) . 'src/Activation.php';
require_once plugin_dir_path(__FILE__) . 'src/Deactivation.php';
require_once plugin_dir_path(__FILE__) . 'src/functions.php';

// Output path information on admin pages
add_action('admin_notices', function () {
    echo '<p>' . plugin_dir_path(__FILE__) . '</p>';
});
    
    add_action('admin_notices', function () {
        echo '<p>' . plugin_dir_url(__FILE__) . '</p>';
    });
        
        // Register activation hook
        register_activation_hook(__FILE__, function () {
            \PDEV\Activation::activate();
        });
            
            register_deactivation_hook(__FILE__, function () {
                \PDEV\Deactivation::deactivate();
            });
                
                add_action('admin_menu', 'PDEV\pdev_create_menu');