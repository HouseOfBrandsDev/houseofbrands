<?php
/**
 * Enqueue scripts JS pour le thème HouseOfBrands
 *
 * @package HouseOfBrands
 */


 // Ne pas exécuter en direct
defined( 'ABSPATH' ) || exit;




function hob_enqueue_scripts_mobile_menu() {
    // Enqueue du script de navigation
    wp_enqueue_script(
        'hob-mobile-menu',
        get_template_directory_uri() . '/assets/js/mobile-naviguation.js',
        [],
        filemtime( get_template_directory() . '/assets/js/mobile-naviguation.js' ),
        true
    );

    // Génère le HTML du menu mobile sans l'afficher
    $mobile_menu_html = wp_nav_menu( array(
        'theme_location' => 'mobile',
        'menu_class'     => 'hob-menu-mobile',
        'container'      => false,
        'fallback_cb'    => false,
        'echo'           => false,
    ) );

    // Passe ce HTML à ton script via hobData.mobileMenu
    wp_localize_script(
        'hob-mobile-menu',
        'hobData',
        array(
            'mobileMenu' => $mobile_menu_html,
        )
    );
}
add_action( 'wp_enqueue_scripts', 'hob_enqueue_scripts_mobile_menu', 20 );