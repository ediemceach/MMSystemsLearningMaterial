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

 <?php screen_icon( 'plugins' ); ?>
        <h2>My Plugin</h2>
        <form method="POST" action="">
        <table class="form-table">
        <tr valign="top">
            <th scope="row"><label for="fname">First Name</label></th>
            <td><input maxlength="45" size="25" name="fname"/></td>
        </tr>
        
        
        <tr valign="top">
            <th scope="row"><label for="lname">Last Name</label></th>
            <td><input id="lname" maxlength="45" size="25" name="lname"/></td>
        </tr>
        
        <tr valign="top">
            <th scope="row"><label for="color">Favorite Color</label></th>
            <td>
                <select name="color">
                    <option value="orange">Orange</option>
                    <option value="black">Black</option>
                </select>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="featured">Featured?</label></th>
            <td><input type="checkbox" name="favorite"/></td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="gender">Gender</label></th>
            <td>
                <input type="radio" name="gender" value="male"/> Male
                <input type="radio" name="gender" value="female"/> Female
            </td>
        </tr>
        <tr valign="top">
            <th scope="row"><label for="bio">Bio</label></th>
            <td><textarea name="bio"></textarea></td>
        </tr>
        <tr valign="top">
            <td>
            <input type="submit" name="save" value="Save Options"
                class="button-primary"/>
            <input type="submit" name="reset" value="Reset"
                class="button-secondary"/>
            </td>
        </tr>
        </table>
        </form>
        
        
        <table class="widefat">
<thead>
    <tr>
        <th>Name</th>
        <th>Favorite Holiday</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>Name</th>
        <th>Favorite Holiday</th>
    </tr>
</tfoot>
<tbody>
    <tr>
        <td>Brad Williams</td>
        <td>Halloween</td>
    </tr>
    <tr>
        <td>Ozh Richard</td>
        <td>Talk Like a Pirate</td>
    </tr>
    <tr>
        <td>Justin Tadlock</td>
        <td>Christmas</td>
    </tr>
</tbody>
</table>

<div class="tablenav">
    <div class="tablenav-pages">
        <span class="displaying-num">Displaying 1-20 of 69</span>
        <span class="page-numbers current">1</span>
        <a href="#" class="page-numbers">2</a>
        <a href="#" class="page-numbers">3</a>
        <a href="#" class="page-numbers">4</a>
        <a href="#" class="next page-numbers">&raquo;</a>
    </div>
</div>
        
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