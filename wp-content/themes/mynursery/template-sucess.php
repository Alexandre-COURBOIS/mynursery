<?php
/*
Template Name: success
*/
session_start();

global $wp_query;

if (!empty($_GET['key'])) {

    $verify = $_GET['key'];

    if (mb_strlen($verify) == 40) {

        get_header(); ?>

<body id="body_success">
        <div class="container success">
            <div class="success_img">
                <img src="<?= get_template_directory_uri(); ?>/asset/img/success.png" alt="image de réussite">
            </div>
            <h2>Votre mot de passe a bien été modifié !</h2>
            <p><a href="connexion">→ Connexion ←</a></p>
        </div>
</body>

        <?php get_footer();

    } else {
        $wp_query->set_404();
        status_header(404);
        get_template_part(404);
        exit();
    }
} else {
    $wp_query->set_404();
    status_header(404);
    get_template_part(404);
    exit();
}