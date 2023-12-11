<?php
/**
 * Plugin Name: Media Figure Example
 * Plugin URI: http://example.com/
 * Description: Displays an example of using sanitized HTML classes in a media figure.
 * Author: Your Name
 * Author URI: http://yourwebsite.com/
 */

// Enqueue styles (optional)
add_action('wp_enqueue_scripts', 'media_figure_example_enqueue_styles');
function media_figure_example_enqueue_styles() {
    wp_enqueue_style('media-figure-example-styles', plugin_dir_url(__FILE__) . 'styles.css');
}

// Shortcode to display the media figure
add_shortcode('media_figure_example', 'media_figure_example_shortcode');
function media_figure_example_shortcode($atts, $content = '') {
    // Sanitize and prepare classes
    $classes = [
        'media',
        'media-object',
        'media-image'
    ];
    
    $classes = array_map('sanitize_html_class', $classes);
    
    // Generate HTML structure
    $output = '<figure class="' . esc_attr(join(' ', $classes)) . '">';
    $output .= '<img src="http://example.com/image.png" alt=""/>';
    $output .= '<figcaption>' . esc_html($content) . '</figcaption>';
    $output .= '</figure>';
    
    return $output;
}

// Add menu entry
add_action('admin_menu', 'media_figure_example_menu');
function media_figure_example_menu() {
    add_menu_page(
        'Media Figure Example',
        'Media Figure Example',
        'manage_options',
        'media-figure-example',
        'media_figure_example_settings_page'
        );
}

// Settings page callback function
function media_figure_example_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Media Figure Example Settings', 'media-figure-example'); ?></h1>
        <p><?php esc_html_e('This is the settings page for the Media Figure Example plugin.', 'media-figure-example'); ?></p>
        <!-- Add your settings or configuration options here -->
    </div>
    <?php
}