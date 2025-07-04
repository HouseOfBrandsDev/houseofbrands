<?php
/**
 * Template Name: HOB - Page Pleine largeur
 * Description: Gabarit de page sans sidebar, en pleine largeur.
 *
 * @package HouseOfBrands
 */

get_header();
?>

<main id="primary" class="site-main site-main--fullwidth">
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
