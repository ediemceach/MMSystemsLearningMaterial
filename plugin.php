<?php
/**
 * Plugin Name: Validation Example
 * Plugin URI:  http://example.com/
 * Description: Displays an example Validation
 * Author:      Edis
 * Author URI:  http://dunp.np.ac.rs
 */

add_action('admin_menu', 'pdev_validation_example_menu');
add_action('admin_notices', 'pdev_validation_example_notice');

function pdev_validation_example_menu(){
    add_menu_page(
        'Validation Example',
        'Validation Example',
        'manage_options',
        'pdev-validation-example',
        'pdev_validation_example_template'
        );
}

function pdev_validation_example_notice(){
    if (isset($_GET['validation_error'])) {
        echo '<div class="error"><p>' . esc_html__('Invalid input. Please check your age and fruit selection.', 'pdev-validation-example') . '</p></div>';
    }
}

function pdev_validation_example_template(){
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Validation Example', 'pdev-validation-example'); ?></h1>
        <form method="post" action="">
            <?php wp_nonce_field('pdev-validation-example-nonce'); ?>
            <label for="age"><?php esc_html_e('Enter Your Age:', 'pdev-validation-example'); ?></label>
            <input type="text" name="age" id="age" value="<?php echo esc_attr(isset($_POST['age']) ? $_POST['age'] : ''); ?>" required>
            <br>
            <label for="fruit"><?php esc_html_e('Select a Fruit:', 'pdev-validation-example'); ?></label>
            <select name="fruit" id="fruit" required>
                <option value="banana" <?php selected('banana', isset($_POST['fruit']) ? $_POST['fruit'] : ''); ?>><?php esc_html_e('Banana', 'pdev-validation-example'); ?></option>
                <option value="kiwi" <?php selected('kiwi', isset($_POST['fruit']) ? $_POST['fruit'] : ''); ?>><?php esc_html_e('Kiwi', 'pdev-validation-example'); ?></option>
                <option value="watermelon" <?php selected('watermelon', isset($_POST['fruit']) ? $_POST['fruit'] : ''); ?>><?php esc_html_e('Watermelon', 'pdev-validation-example'); ?></option>
            </select>
            <br>
            <input type="submit" class="button-primary" value="<?php esc_attr_e('Submit', 'pdev-validation-example'); ?>">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && check_admin_referer('pdev-validation-example-nonce')) {
            // Sanitize age as an integer using absint
            $age = absint(preg_replace('/\D/', '', $_POST['age']));

            // Debug information
            echo '<div class="debug">';
            echo '<p>Debug Information:</p>';
            echo '<p>Original Age: ' . esc_html($_POST['age']) . '</p>';
            echo '<p>Sanitized Age: ' . esc_html($age) . '</p>';
            echo '</div>';

            // Additional validation for age
            $valid_age = $age >= 0 && $age <= 100; 

            // Validate fruit selection
            $valid_fruit = ['banana', 'kiwi', 'watermelon'];
            $fruit = sanitize_text_field($_POST['fruit']);
            $valid_fruit_selection = in_array($fruit, $valid_fruit, true);

            // Print whether input is valid or invalid
            echo '<div class="notice">';
            if ($valid_age && $valid_fruit_selection) {
                echo '<p>' . esc_html__('Valid Input!', 'pdev-validation-example') . '</p>';
            } else {
                echo '<p>' . esc_html__('Invalid Input. Please check your age and fruit selection.', 'pdev-validation-example') . '</p>';
            }
            echo '</div>';
        }
        ?>
    </div>
    <?php
}