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

<p>
<input type="submit" name="Save" value="Save Options"/>
<input type="submit" name="Save" value="Save Options" 
    class="button-primary"/>
</p><p>
<input type="submit" name="Secondary" value="Secondary Button"/>
<input type="submit" name="Secondary" value="Secondary Button" 
    class="button-secondary"/>
</p>


<a href="#">Search</a>
<a href="#" class="button-primary">Search Primary</a>
<a href="#" class="button-secondary">Search Secondary</a>
        
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