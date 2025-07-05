<?php
// Ne pas exécuter en direct
defined( 'ABSPATH' ) || exit;
?>
    <!-- Logo -->
    <div class="hob-header__logo">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hob-site-title">
          <?php bloginfo( 'name' ); ?>
        </a>
      <?php endif; ?>
    </div>