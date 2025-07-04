<?php
/**
 * Template des résultats de recherche
 *
 * Affiche les résultats lorsque l'utilisateur effectue une recherche.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package HouseOfBrands
 */

get_header();
?>

<main id="primary" class="site-main container">

  <?php if ( have_posts() ) : ?>

    <header class="page-header">
      <h1 class="page-title">
        <?php
        /* traducteurs : %s correspond à la requête de recherche */
        printf( esc_html__( 'Résultats de recherche pour : %s', 'houseofbrands' ), '<span>' . get_search_query() . '</span>' );
        ?>
      </h1>
    </header><!-- .page-header -->

    <?php
    /* Boucle principale pour afficher chaque résultat */
    while ( have_posts() ) : the_post();
          get_template_part( 'template-parts/blog/blog', 'content' );
    endwhile;

    /* Navigation entre les pages de résultats */
    the_posts_pagination(
      array(
        'prev_text' => esc_html__( 'Précédent', 'houseofbrands' ),
        'next_text' => esc_html__( 'Suivant',     'houseofbrands' ),
      )
    );
    ?>

  <?php else : ?>

    <?php
    /* Si aucun résultat n'est trouvé, affiche le template “aucun contenu” */
    get_template_part( 'template-parts/blog/blog', 'content-none' );
    ?>

  <?php endif; ?>

</main><!-- #primary -->

<?php
/* Affiche la barre latérale si elle existe */
get_sidebar();

/* Pied de page */
get_footer();
