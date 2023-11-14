<?php
/*
Template Name: Archives
 */
?>

<h2><?php _e('Browse by Month:', 'notesblog'); ?></h2>
<ul>
    <?php wp_get_archives('type=monthly'); ?>
</ul>

<h2><?php _e('Browse by Category:', 'notesblog'); ?></h2>
<ul>
    <?php wp_list_categories('title_li='); ?>
</ul>

<h2><?php _e('Browse by Tag:', 'notesblog'); ?></h2>
<?php wp_tag_cloud('smallest=8&largest=28&number=0&orderby=name&order=ASC');