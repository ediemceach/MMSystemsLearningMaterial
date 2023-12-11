<?php
/**
 * Plugin Name: Secure Database Query Example
 * Plugin URI: http://example.com/
 * Description: Demonstrates a secure database query in a WordPress plugin.
 * Author: Your Name
 * Author URI: http://yourwebsite.com/
 */

// Enqueue styles (optional)
add_action('wp_enqueue_scripts', 'secure_query_example_enqueue_styles');
function secure_query_example_enqueue_styles() {
    wp_enqueue_style('secure-query-example-styles', plugin_dir_url(__FILE__) . 'styles.css');
}

// Add menu entry under the Settings menu
add_action('admin_menu', 'secure_query_example_menu');
function secure_query_example_menu() {
    add_options_page(
        'Secure Query Example',
        'Secure Query Example',
        'manage_options',
        'secure-query-example',
        'secure_query_example_settings_page'
        );
}

// Settings page callback function
function secure_query_example_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Secure Query Example Settings', 'secure-query-example'); ?></h1>
        <p><?php esc_html_e('This is the settings page for the Secure Query Example plugin.', 'secure-query-example'); ?></p>
        <!-- Add your settings or configuration options here -->
    </div>
    <?php
}

// Example shortcode to demonstrate a secure database query
add_shortcode('secure_query_example', 'secure_query_example_shortcode');
function secure_query_example_shortcode($atts, $content = '') {
    global $wpdb;

    // Sanitize and prepare user input
    $login    = sanitize_text_field('hacker');
    $password = sanitize_text_field("123456' OR 1='1");

    // Prepare the SQL query using $wpdb->prepare()
    $sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}users WHERE `login` = %s AND `pass` = %s", $login, $password);

    // Run the query
    $results = $wpdb->get_results($sql);

    // Process the results (this is just an example, you would handle the results based on your needs)
    $output = '<ul>';
    foreach ($results as $result) {
        $output .= '<li>' . esc_html($result->login) . '</li>';
    }
    $output .= '</ul>';

    return $output;
}