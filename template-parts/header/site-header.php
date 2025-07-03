<header class="site-header">
  <div class="container u-text-center">
    <?php if ( has_custom_logo() ) : ?>
      <div class="site-logo">
        <?php the_custom_logo(); ?>
      </div>
    <?php else : ?>
      <h1 class="site-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php bloginfo( 'name' ); ?>
        </a>
      </h1>
    <?php endif; ?>

    <nav class="site-navigation" role="navigation" aria-label="Menu principal">
      <?php
        wp_nav_menu(
          array(
            'theme_location' => 'primary',
            'menu_class'     => 'menu',
            'container'      => false,
            'fallback_cb'    => false,
          )
        );
      ?>
    </nav>
  </div>
</header>
