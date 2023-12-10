 <?php
/**
 * Plugin Name: Nonce Example
 * Plugin URI:  http://example.com/
 * Description: Displays an example nonce field and verifies it.
 * Author:      WROX
 * Author URI:  http://wrox.com
 */

add_action('admin_menu','pdev_nonce_example_menu');
 

function pdev_nonce_example_menu(){
    
    add_menu_page(
        'nonce example',
        'nonce example',
        'manage_options',
        'pdev-nonce-example',
        'pdev_nonce_example_template'
        );
}
    
function pdev_nonce_example_template(){
    ;
}
 