<?php
/**
 * Enqueue CSS pour le thème HouseOfBrands
 *
 * @package HouseOfBrands
 */

 // Ne pas exécuter en direct
defined( 'ABSPATH' ) || exit;

// 1) Critical CSS inline dans le <head>
function hob_enqueue_critical_css() {
    $critical_path = get_template_directory() . '/assets/css/critical.min.css';
    if ( file_exists( $critical_path ) ) {
        $critical_css = file_get_contents( $critical_path );
        wp_register_style( 'houseofbrands-critical', false );
        wp_enqueue_style( 'houseofbrands-critical' );
        wp_add_inline_style( 'houseofbrands-critical', $critical_css );
    }
}
add_action( 'wp_enqueue_scripts', 'hob_enqueue_critical_css', 5 );




// 2) Préload de main.css non-bloquant
function hob_preload_main_css() {
    $href = get_template_directory_uri() . '/assets/css/main.css';
    echo '<link rel="preload" href="' . esc_url( $href ) . '" as="style" onload="this.rel=\'stylesheet\'">' . "\n";
    echo '<noscript><link rel="stylesheet" href="' . esc_url( $href ) . '"></noscript>' . "\n";
}
add_action( 'wp_head', 'hob_preload_main_css', 2 );




// 3) Chargement du CSS principal (main.css) en fin de page
function hob_enqueue_main_css() {
    $css_file = '/assets/css/main.css';
    wp_enqueue_style(
        'houseofbrands-main',
        get_template_directory_uri() . $css_file,
        array(),
        filemtime( get_template_directory() . $css_file )
    );
}
add_action( 'wp_footer', 'hob_enqueue_main_css', 2 );




// 4) Styles du header
function hob_enqueue_header_style() {
    wp_enqueue_style(
        'hob-header-style',
        get_template_directory_uri() . '/assets/css/header.css',
        array(),
        filemtime( get_template_directory() . '/assets/css/header.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'hob_enqueue_header_style', 20 );




// 5) Polices locales
function hob_enqueue_fonts() {
    wp_enqueue_style(
        'hob-fonts',
        get_template_directory_uri() . '/assets/css/fonts.css',
        array(),
        filemtime( get_template_directory() . '/assets/css/fonts.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'hob_enqueue_fonts', 5 );




// 6) Préload des polices
function hob_preload_fonts() {
    $base = get_template_directory_uri() . '/assets/fonts/';
    echo '<link rel="preload" href="' . $base . 'montserrat-v30-latin-regular.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    echo '<link rel="preload" href="' . $base . 'montserrat-v30-latin-500.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action( 'wp_head', 'hob_preload_fonts', 1 );
