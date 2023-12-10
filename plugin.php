 <?php
/**
 * Plugin Name: Validation Example
 * Plugin URI:  http://example.com/
 * Description: Displays an example Validation
 * Author:      Edis
 * Author URI:  http://dunp.np.ac.rs
 */

add_action('admin_menu','pdev_validation_example_menu');

 

function pdev_validation_example_menu(){
    
    add_menu_page(
        'validation example',
        'validation example',
        'manage_options',
        'pdev-validaton-example',
        'pdev_validation_example_template'
        );
}
    
function pdev_validation_example_template(){
    
    $full_name = $_POST['full_name']; ?>
    
    <form action="" method="POST">
       <label>
           Full Name:
           <input type="text" name="full_name" value="<?php echo $full_name; ?>"/>
       </label>
       <input type="submit" value="Submit"/>
</form>

<?php
    
    
}
 