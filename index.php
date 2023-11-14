<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>



<?phpget_header(); /** Ovaj deo koda uzima podatke iz PHP fajla geader.php i implementira u glavnu stranu nase teme */?> 

<div id=”container”>
<div id=”content” role=”main”>


<?php get_template_part('loop'); ?>


</div><!-- #content -->
</div><!-- #container -->


<?php get_sidebar(); ?>


<?php bloginfo('name'); ?>
<?php bloginfo('urk'); ?>
<?php the_title('<h1>','<h1>'); ?>
<?php if (is_single()) {
echo 'Whoa nelly, this is a single post page!';
} ?>

<?php if (is_home()|| is_archive()) : ?>
    <div class="ad-block">
        <a href="http://tdh.me" title="Buy the book!">
            Did you know I wrote another book as well?<br />
            <strong>Get Smashing WordPress: Beyond the Blog</strong>
        </a>
    </div>
<?php endif; ?>

<?phpget_footer();  /** Ovaj deo koda uzima podatke iz PHP fajla footer.php i implementira u glavnu stranu nase teme */?>

