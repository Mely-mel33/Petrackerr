<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localisation du Vétérinaire</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Localisation du Vétérinaire {{ $veto->nom }}</h1>

    @if ($veto->map)
        <div id="map"></div>
        <script>
            function initMap() {
                var location = { lat: {{ $veto->map->latitude }}, lng: {{ $veto->map->longitude }} };
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: location
                });
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap" async defer></script>
    @else
        <p>Localisation non disponible pour ce vétérinaire.</p>
    @endif
</body>
</html>
