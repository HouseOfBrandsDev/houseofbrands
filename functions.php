<?php
/**
 * Fonctions et définitions du thème House Of Brands
 *
 * @package HouseOfBrands
 */

// Définition de la version du thème (pour le cache busting)
if ( ! defined( 'HOUSEOFBANDS_VERSION' ) ) {
    define( 'HOUSEOFBANDS_VERSION', '1.0.0' );
}

// Inclusion du script de nettoyage du cœur WordPress
require get_template_directory() . '/includes/cleanup.php';
// Inclut le fichier contenant les SVG
require get_template_directory() . '/includes/svg-icons.php';

/**
 * Initialisation du thème et activation des fonctionnalités
 */
function houseofbrands_setup() {
    // Gestion automatique de la balise <title>
    add_theme_support( 'title-tag' );

    // Support des images à la une (featured images)
    add_theme_support( 'post-thumbnails' );

    // Enregistrement des emplacements de menus
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Menu principal', 'houseofbrands' ),
            'mobile'  => esc_html__( 'Menu mobile',    'houseofbrands' ),
        )
    );

    // HTML5 : search-form, comment-form, comment-list, gallery, caption
    add_theme_support(
        'html5',
        array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' )
    );
}
add_action( 'after_setup_theme', 'houseofbrands_setup' );


/**
 * Chargement du Critical CSS en inline dans le <head>
 */
function houseofbrands_enqueue_critical_css() {
    $critical_path = get_template_directory() . '/assets/css/critical.min.css';
    if ( file_exists( $critical_path ) ) {
        $critical_css = file_get_contents( $critical_path );
        // Enregistrement du style inline
        wp_register_style( 'houseofbrands-critical', false );
        wp_enqueue_style( 'houseofbrands-critical' );
        wp_add_inline_style( 'houseofbrands-critical', $critical_css );
    }
}
add_action( 'wp_enqueue_scripts', 'houseofbrands_enqueue_critical_css', 5 );


/**
 * Chargement du CSS principal (main.css) en fin de page
 */
function houseofbrands_enqueue_main_css() {
    $css_file = '/assets/css/main.css';
    wp_enqueue_style(
        'houseofbrands-main',
        get_template_directory_uri() . $css_file,
        array(),
        filemtime( get_template_directory() . $css_file )
    );
}
add_action( 'wp_footer', 'houseofbrands_enqueue_main_css', 2 );

/**
 * Précharge main.css de façon non-bloquante dans le <head>
 */
function houseofbrands_preload_main_css() {
    $href = get_template_directory_uri() . '/assets/css/main.css';
    // preload déclenche le téléchargement dès le head sans bloquer
    echo '<link rel="preload" href="' . esc_url( $href ) . '" as="style" onload="this.rel=\'stylesheet\'">' . "\n";
    // fallback pour les navigateurs sans support preload
    echo '<noscript><link rel="stylesheet" href="' . esc_url( $href ) . '"></noscript>' . "\n";
}
add_action( 'wp_head', 'houseofbrands_preload_main_css', 2 );   

/**Enqueue header (Critical) */
function hob_enqueue_header_style() {
    wp_enqueue_style(
        'hob-header-style',
        get_template_directory_uri() . '/assets/css/header.css',
        [],
        filemtime( get_template_directory() . '/assets/css/header.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'hob_enqueue_header_style', 20 );

// Chargement des polices locales
function hob_enqueue_fonts() {
    wp_enqueue_style(
        'hob-fonts',
        get_template_directory_uri() . '/assets/css/fonts.css',
        [],
        filemtime( get_template_directory() . '/assets/css/fonts.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'hob_enqueue_fonts', 5 );

function hob_preload_fonts() {
    $base = get_template_directory_uri() . '/assets/fonts/';
    echo '<link rel="preload" href="' . $base . 'montserrat-v30-latin-regular.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    echo '<link rel="preload" href="' . $base . 'montserrat-v30-latin-700.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
}
add_action( 'wp_head', 'hob_preload_fonts', 1 );




