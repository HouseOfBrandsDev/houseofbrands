<?php
/**
 * The template for displaying all single posts
 *
 * @package HouseOfBrands
 */

get_header();
?>

<main class="site-main container">
  <?php
  while ( have_posts() ) :
    the_post();

    // Affiche le contenu via template-parts/content/content.php
    get_template_part( 'template-parts/content/content' );

    // Affiche la zone de commentaires si activée
    if ( comments_open() || get_comments_number() ) {
      comments_template();
    }

  endwhile;
  ?>
</main>

<?php
get_footer();
