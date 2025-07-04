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

// Chargement du script de nettoyage du cœur WordPress
require get_template_directory() . '/includes/cleanup.php';

/**
 * Initialisation du thème et prise en charge des fonctionnalités
 */
function houseofbrands_setup() {
    // Autorise WordPress à gérer automatiquement la balise <title>
    add_theme_support( 'title-tag' );

    // Active la prise en charge des images mises en avant (featured images)
    add_theme_support( 'post-thumbnails' );

    // Enregistrement des emplacements de menus
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Menu principal', 'houseofbrands' ),
            'mobile'  => esc_html__( 'Menu mobile', 'houseofbrands' ),
        )
    );

    // Passe certains éléments (formulaires, listes, galeries) en balisage HTML5
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );
}
add_action( 'after_setup_theme', 'houseofbrands_setup' );

/**
 * Déclaration et configuration de la sidebar (zone de widgets)
 */
function houseofbrands_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'houseofbrands' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Ajoutez vos widgets ici.', 'houseofbrands' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'houseofbrands_widgets_init' );

/**
 * Chargement des styles et scripts du thème
 */
function houseofbrands_scripts() {
    // Feuille de style principale
    wp_enqueue_style(
        'houseofbrands-style',
        get_stylesheet_uri(),
        array(),
        HOUSEOFBANDS_VERSION
    );

    // Exemple pour ajouter un fichier JavaScript :
    // wp_enqueue_script(
    //     'houseofbrands-app',
    //     get_template_directory_uri() . '/assets/js/app.js',
    //     array(),
    //     HOUSEOFBANDS_VERSION,
    //     true
    // );
}
add_action( 'wp_enqueue_scripts', 'houseofbrands_scripts' );
