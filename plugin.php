<?php
/**
 * Plugin Name: SQL Sanitizer
 * Plugin URI: http://example.com/
 * Description: Plugin for updating post title using SQL sanitization.
 * Author: Your Name
 * Author URI: http://yourwebsite.com/
 */

// Add menu option under Settings
add_action('admin_menu', 'sql_sanitizer_menu');
function sql_sanitizer_menu() {
    add_options_page(
        'SQL Sanitizer',
        'SQL Sanitizer',
        'manage_options',
        'sql-sanitizer',
        'sql_sanitizer_settings_page'
    );
}

// Settings page callback function
function sql_sanitizer_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('SQL Sanitizer', 'sql-sanitizer'); ?></h1>
        <form method="post" action="">
            <?php wp_nonce_field('sql-sanitizer-nonce'); ?>
            <label for="post_id"><?php esc_html_e('Post ID:', 'sql-sanitizer'); ?></label>
            <input type="number" name="post_id" id="post_id" required>
            <br>
            <label for="post_title"><?php esc_html_e('Update Title:', 'sql-sanitizer'); ?></label>
            <input type="text" name="post_title" id="post_title" required>
            <br>
            <input type="submit" class="button-primary" value="<?php esc_attr_e('Update Post Title', 'sql-sanitizer'); ?>">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && check_admin_referer('sql-sanitizer-nonce')) {
            // Sanitize and prepare user input
            $post_id = absint($_POST['post_id']);
            $post_title = sanitize_text_field($_POST['post_title']);

            // Update post title using $wpdb
            global $wpdb;
            $table_name = $wpdb->prefix . 'posts';

            $wpdb->update(
                $table_name,
                array('post_title' => $post_title),
                array('ID' => $post_id),
                array('%s'),
                array('%d')
            );

            // Display success message
            echo '<div class="notice">';
            echo '<p>' . esc_html__('Post title updated successfully!', 'sql-sanitizer') . '</p>';
            echo '</div>';
        }
        ?>
    </div>
    <?php
}