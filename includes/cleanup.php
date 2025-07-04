<?php
/**
 * House Of Brands — Clean Up WordPress Core
 *
 * @package HouseOfBrands
 */

// Disable the emoji scripts and styles
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
add_filter( 'emoji_svg_url', '__return_false' );

// Remove DNS prefetch for emojis
add_filter( 'wp_resource_hints', function( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( $hints, [ 'https://s.w.org' ] );
    }
    return $hints;
}, 10, 2 );

// Remove REST API link tag
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

// Remove oEmbed host JS
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'wp_footer', 'wp_oembed_add_host_js' );

// Disable embeds entirely
add_filter( 'embed_oembed_discover', '__return_false' );
add_filter( 'rest_endpoints', function( $endpoints ) {
    if ( isset( $endpoints['/oembed/1.0/embed'] ) ) {
        unset( $endpoints['/oembed/1.0/embed'] );
    }
    return $endpoints;
});

// Remove API & oEmbed links
remove_action( 'wp_head', 'rsd_link' );                // Remove Really Simple Discovery link
remove_action( 'wp_head', 'wlwmanifest_link' );        // Remove Windows Live Writer manifest link
remove_action( 'wp_head', 'wp_generator' );            // Remove WordPress version
remove_action( 'wp_head', 'wp_shortlink_wp_head' );    // Remove shortlink
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

// Disable XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Restrict REST API to authenticated users only
add_filter( 'rest_authentication_errors', function( $result ) {
    if ( ! empty( $result ) ) {
        return $result;
    }
    if ( ! is_user_logged_in() ) {
        return new WP_Error( 'rest_not_logged_in', __( 'You must be logged in to access the REST API.', 'houseofbrands' ), array( 'status' => 401 ) );
    }
    return $result;
});

// Remove Gutenberg block library CSS on the front-end
function hob_remove_block_library_css() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'hob_remove_block_library_css', 100 );
