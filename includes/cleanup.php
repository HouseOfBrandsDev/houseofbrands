<?php
/**
 * House Of Brands — Nettoyage du cœur WordPress
 *
 * @package HouseOfBrands
 */

// Désactive les scripts et styles emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
add_filter( 'emoji_svg_url', '__return_false' );

// Retire le DNS prefetch pour les emojis
add_filter( 'wp_resource_hints', function( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( $hints, [ 'https://s.w.org' ] );
    }
    return $hints;
}, 10, 2 );

// Supprime divers liens et meta inutiles dans le head
remove_action( 'wp_head', 'rsd_link' ); // Really Simple Discovery
remove_action( 'wp_head', 'wlwmanifest_link' ); // Windows Live Writer
remove_action( 'wp_head', 'wp_generator' ); // Version WordPress
remove_action( 'wp_head', 'wp_shortlink_wp_head' ); // Shortlink
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

// Désactive XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Supprime les balises REST API et oEmbed
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_footer', 'wp_oembed_add_host_js' );
add_filter( 'embed_oembed_discover', '__return_false' );

// Désinscrit tous les widgets par défaut
function hob_supprime_widgets_par_defaut() {
    $widgets = [
        'WP_Widget_Archives',
        'WP_Widget_Calendar',
        'WP_Widget_Categories',
        'WP_Widget_Meta',
        'WP_Widget_Pages',
        'WP_Widget_Recent_Comments',
        'WP_Widget_Recent_Posts',
        'WP_Widget_RSS',
        'WP_Widget_Search',
        'WP_Widget_Tag_Cloud',
        'WP_Widget_Text',
    ];
    foreach ( $widgets as $widget ) {
        unregister_widget( $widget );
    }
}
add_action( 'widgets_init', 'hob_supprime_widgets_par_defaut', 11 );

// Retire les styles de la bibliothèque de blocs Gutenberg
function hob_retire_styles_gutenberg() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'hob_retire_styles_gutenberg', 100 );

// ------------------------------------------
// Lazy-load des images et des médias intégrés
// ------------------------------------------

// Ajoute l'attribut loading="lazy" aux balises <img>
add_filter( 'wp_get_attachment_image_attributes', function( $attr ) {
    $attr['loading'] = 'lazy';
    return $attr;
});

// Ajoute loading="lazy" aux iframes intégrés
add_filter( 'embed_oembed_html', function( $html ) {
    return str_replace( '<iframe', '<iframe loading="lazy"', $html );
});

// ------------------------------------------
// Désactive les Global Styles WordPress (theme.json)
// ------------------------------------------
// Retire l'enqueue des styles globaux et l'injection inline
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_head', 'wp_print_global_styles', 1 );
// Désactive le support des styles de bloc et des éditeurs de styles
add_action( 'after_setup_theme', function() {
    remove_theme_support( 'wp-block-styles' );
    remove_theme_support( 'editor-styles' );
}, 20 );


// ------------------------------------------
// Retire les styles inline et classiques générés par le core WordPress
// (boutons, fichiers, etc. pour l’éditeur de blocs)
add_action( 'wp_enqueue_scripts', function() {
    // Défile le CSS classique et son inline
    wp_dequeue_style( 'classic-theme-styles' );
    wp_dequeue_style( 'classic-theme-styles-inline' );
}, 200 );


