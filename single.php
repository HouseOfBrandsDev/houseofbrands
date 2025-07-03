<?php
/* Template Name: Single Post */
get_header();
if ( have_posts() ) : 
  while ( have_posts() ) : the_post();
    get_template_part( 'template-parts/content/content', 'post' );
    comments_template();
  endwhile;
endif;
get_footer();
