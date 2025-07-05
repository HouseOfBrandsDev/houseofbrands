<?php
/**
 * The main template file
 *
 * @package HouseOfBrands
 */

get_header();
?>

<main class="site-main container">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'template-parts/content/content' ); ?>
    <?php endwhile; ?>

    <?php the_posts_pagination(
      array(
        'mid_size'  => 2,
        'prev_text' => esc_html__( 'Précédent', 'houseofbrands' ),
        'next_text' => esc_html__( 'Suivant', 'houseofbrands' ),
      )
    ); ?>
  <?php else : ?>
    <?php get_template_part( 'template-parts/content/content' ); ?>
  <?php endif; ?>
</main>

<?php
get_footer();
