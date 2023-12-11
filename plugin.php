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