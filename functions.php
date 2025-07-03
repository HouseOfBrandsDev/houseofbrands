<?php
/**
 * House Of Brands functions and definitions
 *
 * @package HouseOfBrands
 */

// Define theme version.
if ( ! defined( 'HOUSEOFBANDS_VERSION' ) ) {
    define( 'HOUSEOFBANDS_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function houseofbrands_setup() {
    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Register a primary menu location.
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Menu', 'houseofbrands' ),
        )
    );

    // Switch core markup for search form, comment form, comment list, gallery, and captions to valid HTML5.
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

    // Add support for custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'houseofbrands_setup' );

/**
 * Register widget area (sidebar).
 */
function houseofbrands_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'houseofbrands' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'houseofbrands' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'houseofbrands_widgets_init' );

/**
 * Enqueue theme styles and scripts.
 */
function houseofbrands_scripts() {
    // Main stylesheet.
    wp_enqueue_style( 'houseofbrands-style', get_stylesheet_uri(), array(), HOUSEOFBANDS_VERSION );
}
add_action( 'wp_enqueue_scripts', 'houseofbrands_scripts' );
