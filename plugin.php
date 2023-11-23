<?php
/**
 * Plugin Name:       MojPlugin
 * Plugin URI:        https://example.com/plugins/pdev
 * Description:       Kratki opis PlugIn
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      5.6
 * Author:            Edis Mekic
 * Author URI:        https://example.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pdev
 * Domain Path:       /public/lang
 */

?>

<?php
/*
Copyright (C) 2023 Edis Mekic
 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/
?>

<?php $path = plugin_dir_path( __FILE__  ); ?>
<?php define( 'PDEV_DIR', plugin_dir_path( __FILE__ ) ); ?>
<?php include plugin_dir_path( __FILE__ ) . '/src/functions.php'; ?>

<p><?php echo plugin_dir_path( __FILE__ ); ?></p>
<?php echo plugin_dir_url( __FILE__ ); ?>