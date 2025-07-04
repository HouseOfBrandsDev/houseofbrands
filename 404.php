<?php
/**
 * Modèle pour la page d’erreur 404 (page introuvable)
 *
 * Affiche un message d’erreur lorsqu’une URL n’est pas trouvée.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#404-not-found
 * @package HouseOfBrands
 */

get_header();
?>

<main id="primary" class="site-main container">

    <section class="error-404 not-found">

        <header class="page-header">
            <h1 class="page-title">
                <?php esc_html_e( 'Oups ! La page que vous cherchez est introuvable.', 'houseofbrands' ); ?>
            </h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p>
                <?php esc_html_e( 'Il semble que rien n’ait été trouvé à cet endroit. Peut-être essayer une recherche ?', 'houseofbrands' ); ?>
            </p>

            <?php
            // Formulaire de recherche
            get_search_form();

            // Widget : articles récents
            the_widget( 'WP_Widget_Recent_Posts' );
            ?>

            <div class="widget widget_categories">
                <h2 class="widget-title">
                    <?php esc_html_e( 'Catégories les plus utilisées', 'houseofbrands' ); ?>
                </h2>
                <ul>
                    <?php
                    wp_list_categories(
                        array(
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'show_count' => 1,
                            'title_li'   => '',
                            'number'     => 10,
                        )
                    );
                    ?>
                </ul>
            </div><!-- .widget_categories -->


        </div><!-- .page-content -->

    </section><!-- .error-404 -->

</main><!-- #primary -->

<?php
get_footer();
