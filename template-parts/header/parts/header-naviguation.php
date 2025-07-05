<?php
// Ne pas exécuter en direct
defined( 'ABSPATH' ) || exit;
?>

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