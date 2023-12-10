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
    
function pdev_nonce_example_template(){?>
   <div class=wrap> 
   
   <h1 class="wp-heading-inline">Nonce Example</h1>
   
   <?php $value = get_option( 'pdev_nonce_example' ); ?>
   
   <form method="post" action="">
    <?php wp_nonce_field( 'pdev_nonce_action', 'pdev_nonce_name' ); ?>
    
                              <label>
                                 Enter your name:
                                 <input type="text" name="pdev_nonce_example"
                                 value="<?php echo esc_attr( $value ); ?>"/>
                          </label>
                 </p>
                     <?php submit_button( 'Submit', 'primary' ); ?>
             </form>

   </div>
   <?php
}
 