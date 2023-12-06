<?php
/*
Plugin Name: Settings API example
Plugin URI: https://example.com/
Description: A complete and practical example of the WordPress Settings API
Author: Edis
Author URI: http://wrox.com
*/


add_action('admin_menu','pdev_plugin_add_settings_menu');

function pdev_plugin_add_settings_menu() {
    
    add_options_page( 'PDEV Plugin Settings', 'PDEV Settings', 'manage_options',
        'pdev_plugin', 'pdev_plugin_option_page' );
    
}

// Create the option page
function pdev_plugin_option_page() {
    ?>
    <<div class="wrap">
        <h2>My plugin</h2>
        <form action="options.php" method="post">
            <?php 
            settings_fields( 'pdev_plugin_options' );
            do_settings_sections( 'pdev_plugin' );
            submit_button( 'Save Changes', 'primary' );  
            ?>
        </form>
    </div>
<?php
}

add_action( 'admin_init', 'pdev_plugin_admin_init' );

function pdev_plugin_admin_init()
{
$args = array(
    'type'              => 'string',
    'sanitize_callback' => 'pdev_plugin_validate_options',
    'default'           => NULL
);
register_setting( 'pdev_plugin_options', 'pdev_plugin_options', $args );

add_settings_section(
    'pdev_plugin_main',
    'PDEV Plugin Settings',
    'pdev_plugin_section_text',
    'pdev_plugin'
    );

add_settings_field(
    'pdev_plugin_name',
    'Your Name',
    'pdev_plugin_setting_name', 
    'pdev_plugin',
    'pdev_plugin_main'
    );

}

// Draw the section header
function pdev_plugin_section_text() {
    
    echo '<p>Enter your settings here.</p>';
    
}

// Display and fill the Name form field
function pdev_plugin_setting_name() {
    
    // get option 'text_string' value from the database
    $options = get_option( 'pdev_plugin_options' );
    $name = $options['name'];
    
    // echo the field
    echo "<input id='name' name='pdev_plugin_options[name]'
        type='text' value='" . esc_attr( $name ) . "'/>";
    
}

function pdev_plugin_options() {
}

function pdev_plugin_validate_options( $input ) {
    
    $valid = array();
    $valid['name'] = preg_replace(
        '/[^a-zA-Z\s]/',
        '',
        $input['name'] );
    
    if( $valid['name'] !== $input['name'] ) {
        
        
        add_settings_error(
            'pdev_plugin_text_string',
            'pdev_plugin_texterror',
            'Incorrect value entered! Please only input letters and spaces.',
            'error'
            );
        
    }
    
    return $valid;

    
}