<?php
// Ne pas exécuter en direct
defined( 'ABSPATH' ) || exit;
?>

<div class="hob-header__extras">
  <a href="#" class="hob-header__icon" aria-label="Recherche">
    <span><?php hob_svg_icon( 'search' ); ?></span>
  </a>
  <a href="#" class="hob-header__icon" aria-label="Mon compte">
    <span><?php hob_svg_icon( 'account' ); ?></span>
  </a>
  <a href="#" class="hob-header__icon" aria-label="Panier">
    <span><?php hob_svg_icon( 'cart' ); ?></span>
  </a>
  <a href="#" class="hob-header__icon" aria-label="Coeur">
    <span><?php hob_svg_icon( 'heart' ); ?></span>
  </a>
</div>

<button class="hob-menu-toggle"
        aria-label="Ouvrir le menu"
        aria-controls="hob-mobile-menu-container"
        aria-expanded="false">
  <?php hob_svg_icon( 'menu' ); ?>
</button>
