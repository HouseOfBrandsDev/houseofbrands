<?php
// File: template-parts/content/content-none.php
?>
<section class="no-results not-found">
  <header class="page-header">
    <h1 class="hob-page-title"><?php esc_html_e( 'Aucun contenu trouvé', 'houseofbrands' ); ?></h1>
  </header><!-- .page-header -->

  <div class="page-content">
    <?php
    if ( is_home() && current_user_can( 'publish_posts' ) ) :
      printf(
        '<p>' . wp_kses(
          __( 'Prêt à publier votre premier article ? <a href="%1$s">Commencez ici</a>.', 'houseofbrands' ),
          array( 'a' => array( 'href' => array() ) )
        ) . '</p>',
        esc_url( admin_url( 'post-new.php' ) )
      );
    
    elseif ( is_search() ) :
      ?>
      <p><?php esc_html_e( 'Désolé, aucun résultat ne correspond à votre recherche. Essayez avec d’autres mots-clés.', 'houseofbrands' ); ?></p>
      <?php
      get_search_form();
    
    else :
      ?>
      <p><?php esc_html_e( 'Le contenu recherché est introuvable. Vous pouvez essayer une recherche.', 'houseofbrands' ); ?></p>
      <?php
      get_search_form();
    endif;
    ?>
  </div><!-- .page-content -->
</section><!-- .no-results -->
