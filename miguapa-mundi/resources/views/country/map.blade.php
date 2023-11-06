<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Map</title>
        <link href="{{ asset('/css/map.css') }}" rel="stylesheet" />
        <script>let countriesNames = @json($countriesNames)</script>
        <script type="module" src="{{ asset('/js/map2.js') }}"></script>
    </head>

    <body>
        <div class="hidden">
            @include('country.country-info')
        </div>
        <div id="map"></div>
        <script async
            src="https://maps.googleapis.com/maps/api/js?key={{config('services.google_maps.api_key')}}&callback=initMap">
        </script>

    </body>

</html>