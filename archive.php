<?php
/**
 * Template d'archive (catégories, étiquettes, auteur, etc.)
 *
 * @package HouseOfBrands
 */

get_header();
?>

<main id="primary" class="site-main container archive">

  <?php if ( have_posts() ) : ?>

    <header class="page-header u-text-center archive">
      <?php
      the_archive_title( '<h1 class="page-title">', '</h1>' );
      the_archive_description( '<div class="archive-description">', '</div>' );
      ?>
    </header>

    <?php
    while ( have_posts() ) :
      the_post();

      // Inclut le modèle pour chaque article
      get_template_part( 'template-parts/blog/blog', 'content' );

    endwhile;

    the_posts_navigation();

  else :

    // Si aucun article
    get_template_part( 'template-parts/blog/blog', 'content-none' );

  endif;
  ?>

</main>

<?php
get_footer();
