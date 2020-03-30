<?php
/*
Template Name: map
*/
get_header();
?>

    <body class="body_mapbox">

    <div class="separator"></div>

    <div class="flex-parent viewport-full relative scroll-hidden">
        <div class="flex-child w-full w240-mm absolute static-mm left bottom">
            <div class="flex-parent flex-parent--column viewport-third h-full-mm hmax-full bg-white scroll-auto">
                <div class="px12 py12 bg-white">
                    <div class="txt-bold txt-m">Geocoding response object</div>
                    <div class="txt-s">View the raw JSON response from your query.</div>
                </div>
                <div class="flex-child flex-child--grow px12 py12 scroll-auto">
                    <pre id="json-response"
                         class="txt-xs px12">Search for a place. Your results will be displayed here!</pre>
                </div>
            </div>
        </div>
        <div class="flex-child flex-child--grow bg-darken10 viewport-twothirds viewport-full-mm" id="map"></div>
    </div>

    <div class="separator"></div>

    </body>

<?php get_footer();
