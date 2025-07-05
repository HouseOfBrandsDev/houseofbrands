<?php
/**
 * The template for displaying all single posts
 *
 * @package HouseOfBrands
 */

get_header();
?>

  <main id="primary" class="site-main">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content/content', 'page' );
      endwhile;
    endif;
    ?>
  </main>

<?php
get_footer();
