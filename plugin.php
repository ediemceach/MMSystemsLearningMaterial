<?php
/*
Plugin Name: Settings API example
Plugin URI: https://example.com/
Description: A complete and practical example of the WordPress Settings API
Author: Edis
Author URI: http://wrox.com
*/

add_action( 'admin_menu', 'pdev_styling_create_menu' );

function pdev_styling_create_menu() {
    
    //create custom top-level menu
    add_menu_page( 'Testing Plugin Styles', 'Plugin Styling',
        'manage_options', __FILE__, 'pdev_styling_settings' );
    
}?>

<?php
function pdev_styling_settings() {
    ?>
    <div class="wrap">

    <div class="notice notice-error is-dismissible">
        <p>There has been an error.</p>
    </div>
 
    <div class="notice notice-warning is-dismissible">
        <p>This is a warning message.</p>
    </div>
 
    <div class="notice notice-success is-dismissible">
        <p>This is a success message.</p>
    </div>
 
    <div class="notice notice-info is-dismissible">
        <p>This is some information.</p>
        
        
        
    </div>
    <?php
}
?>


<?php
add_action( 'wp_enqueue_scripts', 'pdev_load_dashicons_front_end' );
 
function pdev_load_dashicons_front_end() {
    wp_enqueue_style( 'dashicons' );
}
?>