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

$options = array(
    'color' => 'red', // Enclose color in quotes
    'fontsize' => '120%',
    'border' => '2px solid red'
);

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
    
        add_submenu_page( 'pdev-options', 'About The PDEV Plugin', 'About',
            'manage_options', 'pdev-about', 'pdev_about_page' );
        add_submenu_page( 'pdev-options', 'Help With The PDEV Plugin',
            'Help', 'manage_options', 'pdev-help', 'pdev_help_page' );
        add_submenu_page( 'pdev-options', 'Uninstall The PDEV Plugin',
            'Uninstall', 'manage_options', 'pdev-uninstall', 'pdev_uninstall_page' );
    
}

function pdev_create_submenu() {
    
    //create a submenu under Settings
    add_submenu_page(
        'options-general.php', // parent menu slug
        'PDEV Plugin Settings',
        'PDEV Settings',
        'manage_options',
        'pdev_plugin',
        'pdev_plugin_option_page'
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
                add_option( 'pdev_plugin_color', 'red' );
                add_action('admin_menu', 'PDEV\pdev_create_menu');
                add_action( 'admin_menu', 'PDEV\pdev_create_submenu' );
                update_option( 'pdev_plugin_options', $options );
             