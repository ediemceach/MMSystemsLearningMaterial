<?php
/*
 Template Name: Archives
 */
?>
<?php get_header(); ?>
<div id="content" class="widecolumn">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <div class="entry">
                <?php the_content(); ?>
                <h2><?php _e('Browse by Month:', 'notesblog'); ?></h2>
                <ul>
                    <?php wp_get_archives('type=monthly'); ?>
                </ul>
                <h2><?php _e('Browse by Category:', 'notesblog'); ?></h2>
                <ul>
                    <?php wp_list_categories('title_li='); ?>
                </ul>
                <h2><?php _e('Browse by Tag:', 'notesblog'); ?></h2>
                <?php wp_tag_cloud('smallest=8&largest=28&number=0&orderby=name&order=ASC'); ?>
            </div>
        </div>
    <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php wp_nav_menu( array(
    'container'       => 'li',
    'container_class' => 'menu-sidebar',
    'fallback_cb'     => 'wp_list_categories',
    'theme_location'  => 'top-navigation'
) ); ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>


