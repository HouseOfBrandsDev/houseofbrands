<?php
/**
 * WooCommerce fallback template
 * Utilisé pour toutes les pages WooCommerce si présent
 * 
 * @package HouseOfBrands
 */

get_header(); ?>

<main class="site-main container woocommerce-page">
  <?php woocommerce_content(); ?>
</main>

<?php get_footer(); ?>
