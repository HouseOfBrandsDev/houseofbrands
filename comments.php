<?php
/**
 * Template des commentaires
 *
 * Affiche la zone de commentaires et le formulaire de commentaire
 *
 * @package HouseOfBrands
 */

// Si l’article est protégé par mot de passe et que l’utilisateur ne l’a pas saisi, on ne charge pas les commentaires
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

        <h2 class="comments-title">
            <?php
            $nombre_commentaires = get_comments_number();
            if ( 1 === $nombre_commentaires ) {
                /* traducteurs : %s = titre de l’article */
                printf(
                    esc_html__( 'Un commentaire sur « %s »', 'houseofbrands' ),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                /* traducteurs : %1$s = nombre de commentaires, 2: titre de l’article */
                printf(
                    esc_html( _nx(
                        '%1$s commentaire sur « %2$s »',
                        '%1$s commentaires sur « %2$s »',
                        $nombre_commentaires,
                        'titre des commentaires',
                        'houseofbrands'
                    ) ),
                    number_format_i18n( $nombre_commentaires ),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <?php
        // Navigation entre les pages de commentaires
        the_comments_navigation();
        ?>

        <ol class="comment-list">
            <?php
            // Affiche la liste des commentaires
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                )
            );
            ?>
        </ol>

        <?php
        // Navigation après la liste de commentaires
        the_comments_navigation();

        // Si les commentaires sont fermés
        if ( ! comments_open() ) :
            ?>
            <p class="no-comments"><?php esc_html_e( 'Les commentaires sont fermés.', 'houseofbrands' ); ?></p>
            <?php
        endif;

    endif; // have_comments()

    // Formulaire de commentaire
    comment_form(
        array(
            'title_reply' => esc_html__( 'Laissez un commentaire', 'houseofbrands' ),
        )
    );
    ?>

</div><!-- #comments -->
