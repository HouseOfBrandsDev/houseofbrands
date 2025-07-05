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
            <h1 class="hob-page-title">
                <?php esc_html_e( 'Oups ! La page que vous cherchez est introuvable.', 'houseofbrands' ); ?>
            </h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p>
                <?php esc_html_e( 'Il semble que rien n’ait été trouvé à cet endroit.', 'houseofbrands' ); ?>
            </p>

           
     

        </div><!-- .page-content -->

    </section><!-- .error-404 -->

</main><!-- #primary -->

<?php
get_footer();
