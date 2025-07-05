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

// Inclusion du fichier contenant les SVG
require get_template_directory() . '/includes/svg-icons.php';

// Inclusion des enqueues css
require_once get_template_directory() . '/includes/enqueue-styles.php';

// Inclusion des enqueues js
require_once get_template_directory() . '/includes/enqueue-scripts.php';





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


// Dans votre functions.php, après l'initialisation du thème :
function houseofbrands_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );

    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 800,
        'single_image_width'    => 1200,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 4,
        ),
    ) );
    
}
add_action( 'after_setup_theme', 'houseofbrands_add_woocommerce_support' );



