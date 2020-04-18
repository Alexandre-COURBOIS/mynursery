<?php
/*
Template Name: Profil
*/
global $wpdb;
global $wp_query;

session_start();

if (!empty($_SESSION)) {
    if (!empty($_SESSION['login']['id']) && is_numeric($_SESSION['login']['id'])) {

        get_header();

        $id = $_SESSION['login']['id'];

        $creches = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM {$wpdb->prefix}creche WHERE id_creche = %d", $id)
        );

        $employes = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM {$wpdb->prefix}employee_creche WHERE id_creche = %d", $id)
        );


        ?>
<div class="container_img">
        <img class="img_bandeau" src="<?= get_template_directory_uri() ?>/asset/img/profil_bandeau.jpg"
</div>

        <div id="profil_infos" class="container">

        </div>

</div>
        <?php
        get_footer();

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

