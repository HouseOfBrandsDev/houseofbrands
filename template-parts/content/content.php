<?php
// Fichier : template-parts/content/content.php
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <header class="entry-header">
    <?php
    if ( is_singular() ) :
      // Titre principal pour les pages simples (article, page)
      the_title( '<h1 class="entry-title">', '</h1>' );
    else :
      // Titre cliquable pour les aperçus (ex : page de blog)
      the_title(
        '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', 
        '</a></h2>'
      );
    endif;
    ?>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php
    // Affiche le contenu principal de l’article ou de la page
    the_content();

    // Si l’article est paginé (<!--nextpage-->), affiche les liens
    wp_link_pages(
      array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages :', 'houseofbrands' ),
        'after'  => '</div>',
      )
    );
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php
    // Lien d’édition (visible uniquement pour les utilisateurs autorisés)
    edit_post_link(
      sprintf(
        /* %s = titre de l’article */
        esc_html__( 'Modifier « %s »', 'houseofbrands' ),
        the_title( '<span class="screen-reader-text">"', '"</span>', false )
      ),
      '<span class="edit-link">', 
      '</span>'
    );
    ?>
  </footer><!-- .entry-footer -->

</article><!-- #post-## -->
