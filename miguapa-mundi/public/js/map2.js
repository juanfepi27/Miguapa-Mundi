//Array to save all the coordinates.
const countryCoordinates = [];

//Array of promises to find all the countries coordinates.
const geocodingPromises = countriesNames.map(country => geocodeCountry(country));

function geocodeCountry(country) {
    return new Promise((resolve, reject) => {
        let geocoder = new google.maps.Geocoder();
        let location = { address: country };

        geocoder.geocode(location, function(results, status) {
        if (status === 'OK') {
            let lat = results[0].geometry.location.lat();
            let lng = results[0].geometry.location.lng();

            countryCoordinates.push([lat, lng]);
            resolve(); // Resolves the promise when the geocoder finds the country coordinates
        } else {
            reject('No se pudo geocodificar la ubicación: ' + status);
        }
        });
    });
}
    

  
// Waits for all the promises to be done and then show the map.
Promise.all(geocodingPromises)
    .then(() => {
        initMap();
    })
    .catch(error => {
        console.error('Error de geocodificación: ' + error);
    });

// Function to show the map and its markers.
async function initMap() {
    let map;
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("map"), {
        center: { lat: 9.660885, lng: -15.0 },
        zoom: 3,
    });

    
    const infowindow = new google.maps.InfoWindow({
        content: document.getElementById('country-info-content'),
    });

    countryCoordinates.forEach(coords => {
        const [lat, lng] = coords;

        const marker = new google.maps.Marker({
            position: { lat, lng },
            map,
        });

        marker.addListener("click", () => {
            infowindow.open({
                anchor: marker,
                map,
            });
        });
    });
}
