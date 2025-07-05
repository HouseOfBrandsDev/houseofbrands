<?php
/**
 * Modèle : Page d'accueil des articles (Blog)
 *
 * @package HouseOfBrands
 */

get_header(); ?>

<main id="primary" class="site-main container">

  <?php if ( have_posts() ) : ?>

    <header class="page-header blog">
      <h1 class="page-title"><?php esc_html_e( 'Nos derniers articles', 'houseofbrands' ); ?></h1>
    </header><!-- .page-header -->

    <?php
    // Boucle principale
    while ( have_posts() ) :
      the_post();

      // Utilise le template de contenu standard
      get_template_part( 'template-parts/blog/blog', 'content' );


    endwhile;

    // Navigation de pagination
    the_posts_navigation();

  else :

    // Aucun article trouvé
    get_template_part( 'template-parts/blog/blog', 'content-none' );


  endif;
  ?>

</main><!-- #primary -->

<?php get_footer(); ?>
