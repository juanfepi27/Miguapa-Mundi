//Array to save all the coordinates.
const countryCoordinates = {};
const countriesData = {};

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

            countryCoordinates[country]= [lat, lng];
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

    //Save countries info in countriesData
    for (let i = 0; i < countriesNames.length; i++){
        countriesData[countriesNames[i]] = {
            color: countriesColors[i],
            nickname: countriesNickNames[i],
            flag: countriesFlags[i],
        }
    }

    //Create each marker with its information
    for (let country in countryCoordinates) {
        const [lat, lng] = countryCoordinates[country];

        const marker = new google.maps.Marker({
            position: { lat, lng },
            map,
        });

        let contentString = 
        '<div id="content" style="display: flex; flex-direction: column; align-items: center;">' +
            '<h1 id="firstHeading" class="firstHeading" style="margin: 0; line-height: 1.2; color:' + countriesData[country].color + '; text-shadow: 1px 1px 2px black;"">' + country + '</h1>' +
            '<p style="font-style: italic; margin: 0;">' + countriesData[country].nickname + '</p>' +
        '</div>';

        const infowindow = new google.maps.InfoWindow({
            content: contentString,
        });

        marker.addListener("click", () => {
            infowindow.open({
                anchor: marker,
                map,
            });
        });
    };
}
