<!-- Top bar (optionnelle) -->
<div class="hob-top-header">
  <?php get_template_part( 'template-parts/header/parts/top-header' ); ?>
</div>

<!-- Header principal -->
<header class="hob-header">
  <div class="hob-container hob-header__inner">
    
    <!-- Logo -->
    <?php get_template_part( 'template-parts/header/parts/header-logo' ); ?>

    <!-- Navigation principale -->
    <?php get_template_part( 'template-parts/header/parts/header-naviguation' ); ?>

    <!-- Conteneur vide pour menu mobile -->
    <?php get_template_part( 'template-parts/header/parts/mobile-menu' ); ?>

<div class="hob-header__right-area">
<!-- Extras et bouton mobile -->
    <?php get_template_part( 'template-parts/header/parts/header-extras' ); ?>
</div>

  </div>
</header>
