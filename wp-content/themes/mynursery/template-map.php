<?php
/*
Template Name: map
*/
session_start();
global $wp_query;

get_header();
if (!empty($_SESSION)) {
    if (!empty($_SESSION['login']['id']) && is_numeric($_SESSION['login']['id'])) {


        ?>

        <body class="body_mapbox">

        <div class="separator_map"></div>

        <div class="container_map">
            <div class="flex-child flex-child--grow bg-darken10 viewport-twothirds viewport-full-mm" id="map"></div>
        </div>

        <div class="separator_map"></div>

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
