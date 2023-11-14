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
    <?php if (is_page()) { ?>
        <?php register_sidebars(); ?>
    <?php } else { ?>
        <!-- The rest of the site will show this, and not the stuff above -->
    <?php } ?>
</ul>