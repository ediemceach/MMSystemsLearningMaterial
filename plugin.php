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
        <h1><span class="dashicons dashicons-smiley"></span> My Plugin</h1>
<h2><span class="dashicons dashicons-visibility"></span> My Plugin</h2>
<h3><span class="dashicons dashicons-universal-access"></span> My Plugin</h3>
<h4><span class="dashicons dashicons-buddicons-replies"></span> My Plugin</h4>
<h5><span class="dashicons dashicons-businesswoman"></span> My Plugins</h5>
<h6><span class="dashicons dashicons-thumbs-up"></span> My Plugin</h6>
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