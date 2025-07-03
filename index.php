<?php
/**
 * The main template file
 * @package HouseOfBrands
 */

get_header();

if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
    // Utilise notre template-parts/content.php
    get_template_part( 'template-parts/content/content', get_post_type() );
  endwhile;

  // Pagination
  the_posts_pagination(
    array(
      'mid_size'  => 2,
      'prev_text' => esc_html__( '« Précédent', 'houseofbrands' ),
      'next_text' => esc_html__( 'Suivant »', 'houseofbrands' ),
    )
  );

else :
  // Aucun contenu trouvé
  get_template_part( 'template-parts/content/content', 'none' );

endif;

get_footer();
