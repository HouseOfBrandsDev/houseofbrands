<!-- Top bar (optionnelle) -->
<div class="hob-top-header">
  <div class="hob-container hob-top-header__inner">
    <p class="hob-top-header__message">Livraison gratuite dès 50€ d'achat 🚚</p>
  </div>
</div>

<!-- Header principal -->
<header class="hob-header">
  <div class="hob-container hob-header__inner">
    
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

    <!-- Navigation principale -->
    <nav class="hob-header__nav" role="navigation" aria-label="Menu principal">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_class'     => 'hob-menu',
          'container'      => false,
          'fallback_cb'    => false,
        ) );
      ?>
    </nav>

    <!-- Conteneur vide pour menu mobile -->
<div id="hob-mobile-menu-container" class="hob-mobile-menu-wrapper" aria-hidden="true"></div>

<div class="hob-header__right-area">
    <!-- Extras : icônes ou CTA -->
    <div class="hob-header__extras">
      <a href="#" class="hob-header__icon" aria-label="Recherche"><span><?php hob_svg_icon( 'search' ); ?></span></a>
      <a href="#" class="hob-header__icon" aria-label="Mon compte"><span><?php hob_svg_icon( 'account' ); ?></span></a>
      <a href="#" class="hob-header__icon" aria-label="Panier"><span><?php hob_svg_icon( 'cart' ); ?></span></a>
      <a href="#" class="hob-header__icon" aria-label="Coeur"><span><?php hob_svg_icon( 'heart' ); ?></span></a>
    </div>
<!-- Icône menu mobile -->
<button class="hob-menu-toggle" aria-label="Ouvrir le menu" aria-controls="hob-mobile-menu-container" aria-expanded="false">
  <?php hob_svg_icon( 'menu' ); ?>
</button>

</div>

  </div>
</header>
