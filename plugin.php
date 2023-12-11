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