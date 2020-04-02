<?php
/*
Template Name: map
*/
session_start();

get_header();

?>

    <body class="body_mapbox">

    <div class="separator_map"></div>

    <div class="container_map">
        <div class="flex-child flex-child--grow bg-darken10 viewport-twothirds viewport-full-mm" id="map"></div>
    </div>

    <div class="separator_map"></div>

    </body>

<?php get_footer();
