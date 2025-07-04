<?php
// File: template-parts/content/content.php
?>

<section id="page-<?php the_ID(); ?>" <?php post_class( 'hob-page-content' ); ?>>
  <div class="hob-container">
    
    <?php
    if ( is_page() ) :
      the_title( '<h1 class="hob-page-title">', '</h1>' );
    endif;
    ?>

    <div class="hob-page-body">
      <?php
      the_content();

      wp_link_pages( array(
        'before' => '<div class="hob-page-links">' . esc_html__( 'Pages:', 'houseofbrands' ),
        'after'  => '</div>',
      ) );
      ?>
    </div>

  </div>
</section>
