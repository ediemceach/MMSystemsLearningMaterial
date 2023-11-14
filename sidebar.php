<?php
/**
 * Sidebar template containing the primary and secondary widget areas
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

<ul id="sidebar">
    
</ul>

<ul id="sidebar">
    <?php if (is_page()) { ?>
        
    <?php } ?>
</ul>

<ul id="sidebar">
    <?php if (is_page()) { ?>
        <!-- Stuff here will show up when viewing a Page -->
    <?php } else { ?>
        <!-- The rest of the site will show this, and not the stuff above -->
    <?php } ?>
</ul>