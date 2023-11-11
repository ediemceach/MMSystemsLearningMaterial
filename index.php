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
<?php
/* Run the loop to output the posts.
* If you want to overload this in a child theme then include a file
* called loop-index.php and that will be used instead.
*/
?>

</div><!-- #content -->
</div><!-- #container -->


<?php get_sidebar(); ?>



<?phpget_footer();  /** Ovaj deo koda uzima podatke iz PHP fajla footer.php i implementira u glavnu stranu nase teme */?>