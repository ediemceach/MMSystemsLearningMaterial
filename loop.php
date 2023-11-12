<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <div id="nav-above" class="navigation">
        <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="metanav">&rarr;</span>', 'twentyten' ) ); ?></div>
    </div><!-- #nav-above -->
<?php endif; ?>


<?php
/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead.
 */ if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id=”post-<?php the_ID(); ?>” <?php post_class(); ?>>
<h2>
<a href=”<?php the_permalink(); ?>” title=”Permalink to <?php the_title_attribute(); ?>”>
<?php the_title(); ?>
</a>
</h2>
<div class=”entry”>
<?php the_content(); ?>
</div>
</div>
<?php endwhile; else: ?>
<p>Whoa! There’s There’s nothing here!</p>
<?php endif; ?>
