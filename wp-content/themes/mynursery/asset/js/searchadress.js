(function() {
    var placesAutocomplete = places({
        appId: 'plDUZD3OUBEW',
        apiKey: '967c3b2c4f80af29aa63052da166f913',
        container: document.querySelector('#street'),
        templates: {
            value: function(suggestion) {
                return suggestion.name;
            }
        }
    }).configure({
        type: 'address',
        countries: ['fr']
    });
    placesAutocomplete.on('change', function resultSelected(e) {
        console.log(e);

        document.querySelector('#city').value = e.suggestion.city || '';
        document.querySelector('#code-postal').value = e.suggestion.postcode || '';
        document.querySelector('#longitude').value = e.suggestion.hit._geoloc.lng || '';
        document.querySelector('#lattitude').value = e.suggestion.hit._geoloc.lat || '';
    });
})();