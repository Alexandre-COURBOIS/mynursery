// When the user scrolls the page, execute myFunction
window.onscroll = function () {
    myFunction()
};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}

// Slider
$(document).ready(function () {

    //Loader profil page
   var loader = document.getElementById('#loaderProfil');

    // End Loader

    $("#demo").carousel({
        interval: 8000,
    });

    $('#pro').click(function () {
        $('#pro').prop('checked', true)
        window.location = 'inscription';
    });

    $('#parent').click(function () {
        $('#parent').prop('checked', true);
        alert('Lien vers l\'inscription parent');
    });

});
// Requête

$.ajax({

    // Adresse à laquelle la requête est envoyée
    url: '../request',
    type: 'GET',
    // La fonction à apeller si la requête aboutie

    success: function (creches) {
        var users = jQuery.parseJSON(creches);
        console.log(users);

        map.on('load', function () {
            var geojson = {
                type: 'FeatureCollection',
                features: [{
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [1.101775, 49.438669]
                    },
                    properties: {
                        title: 'Campus Saint Marc',
                        description: 'WEBAPSY'
                    }
                },/*If need one more put it here*/]
            };
            var i;
            for(i=0;i<users.length;i++) {
                geojson.features.push({
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [users[i]['longitude'], users[i]['latitude']]
                    },
                    properties: {
                        title: users[i]['nom_creche'],
                        description: '<p>Téléphone : 0' + users[i]['telephone_creche']+ '</p>' + '<p>Mail : ' + users[i]['email'] + '</p>' + '<p>' + users[i]['num_rue'] + ' ' + users[i]['nom_rue'] + '</p>' + '<p>' + users[i]['codepostal'] + ' ' + users[i]['ville'] + '</p>'
                    }
                });
            }

            // add markers to map
            geojson.features.forEach(function (marker) {

                //Instantiation de l'image du pointeur également à gérer sur le style (mapbox.css)
                // create a HTML element for each feature
                var el = document.createElement('div');
                el.className = 'marker';


                // make a marker for each feature and add to the map
                new mapboxgl.Marker(el)
                    .setLngLat(marker.geometry.coordinates)
                    .addTo(map)
                    .setPopup(new mapboxgl.Popup({offset: 25}) // add popups
                        .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
                    .addTo(map);

            });

            var geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
            });

            map.addControl(geocoder, 'top-left');


            // Listen for the `geocoder.input` event that is triggered when a user
            // makes a selection
            geocoder.on('result', function (ev) {
                var styleSpec = ev.result;
                var styleSpecBox = document.getElementById('json-response');
                var styleSpecText = JSON.stringify(styleSpec, null, 2);
                var syntaxStyleSpecText = syntaxHighlight(styleSpecText);
                styleSpecBox.innerHTML = syntaxStyleSpecText;

                console.log(syntaxStyleSpecText);

                var location = document.getElementsByClassName('number');

/*
                console.log(location[3]);
                console.log(location[4]);*/

            });

            function syntaxHighlight(json) {
                json = json
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;');
                return json.replace(
                    /("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g,
                    function (match) {
                        var cls = 'number';
                        if (/^"/.test(match)) {
                            if (/:$/.test(match)) {
                                cls = 'key';
                            } else {
                                cls = 'string';
                            }
                        } else if (/true|false/.test(match)) {
                            cls = 'boolean';
                        } else if (/null/.test(match)) {
                            cls = 'null';
                        }
                        return '<span class="' + cls + '">' + match + '</span>';
                    }
                );
            }

        });

},
// La fonction à appeler si la requête n'a pas abouti
error: function () {
    // J'affiche un message d'erreur
    console.log("non")
}

})
;

// Map Box

mapboxgl.accessToken = 'pk.eyJ1Ijoid2ViYXBzeSIsImEiOiJjazhlYXk1ejkxNGFpM2dsdjJkaDd2b2RmIn0.pWabX6z0Us-G8OiF9DhuNA';

var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styleivals/mapbox/streets-v11',
    center: [1.098696, 49.4379469],
    zoom: 12,
});

// Adding pointer on map








