<?php
/**
 * Template Name: HOB - Page par défaut
 * Description: Gabarit de page standard avec structure normale.
 *
 * @package HouseOfBrands
 */

get_header();
?>

<div class="container">
  <main id="primary" class="site-main">
    <?php
    if ( have_posts() ) :
      while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content/content', 'page' );
      endwhile;
    endif;
    ?>
  </main>
</div>

<?php
get_footer();
