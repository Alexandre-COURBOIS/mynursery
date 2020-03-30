<?php
/*
Template Name: map
*/
get_header();
?>

    <div id='map' style='width: 400px; height: 300px;'></div>
    <script>
        mapboxgl.accessToken = 'sk.eyJ1Ijoid2ViYXBzeSIsImEiOiJjazhlYjIydTcxNGl4M2dwZXM0YWw1OWprIn0.kKIQn2ET35mYoZ6EEGeV_A';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11'
        });
    </script>


<?php get_footer();
