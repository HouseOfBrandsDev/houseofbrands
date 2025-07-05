<!-- Header principal -->
<header class="hob-header">

<!-- Top bar (optionnelle) -->
<div class="hob-top-header">
  <?php get_template_part( 'template-parts/header/parts/top-header' ); ?>
</div>


  <div class="hob-container hob-header__inner">
    
    <!-- Logo -->
    <?php get_template_part( 'template-parts/header/parts/header-logo' ); ?>

    <!-- Navigation principale -->
    <?php get_template_part( 'template-parts/header/parts/header-naviguation' ); ?>

<div class="hob-header__right-area">
<!-- Extras et bouton mobile -->
    <?php get_template_part( 'template-parts/header/parts/header-extras' ); ?>
</div>

  </div>
      <!-- Conteneur vide pour menu mobile -->
    <?php get_template_part( 'template-parts/header/parts/mobile-menu' ); ?>
</header>

