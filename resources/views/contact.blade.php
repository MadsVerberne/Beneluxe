<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beneluxe</title>
    <link rel="icon" type="image/x-icon" href="img/Favicon.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Flag icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3QTFxyf8eFM1-O3P3ELImq3ILRx2RTCg&libraries=places">
    </script>
    <script>
        function initAutocomplete() {
            const input = document.getElementById("bestemming-autocomplete");
            const autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener("place_changed", function() {
                const place = autocomplete.getPlace();

                if (!place.geometry) {
                    console.log("Geen details gevonden voor de locatie.");
                    return;
                }

                const lat = place.geometry.location.lat();
                const lng = place.geometry.location.lng();
                const address = place.formatted_address;
                const placeId = place.place_id;
                const types = place.types.join(", ");

                // Print naar console
                console.log("Adres:", address);
                console.log("Latitude:", lat);
                console.log("Longitude:", lng);
                console.log("Place ID:", placeId);
                console.log("Types:", types);
            });
        }

        window.onload = initAutocomplete;
    </script>
</head>

<body>

    @extends('layouts.app')

    @section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1>Contact</h1>
        </div>
    </section>
    <div class="contact-container">
        <div class="contact-header">
            <h2>Contact</h2>
            <p>Heb je vragen of opmerkingen? Laat het ons weten via onderstaand formulier, we nemen zo snel mogelijk contact met je op.</p>
        </div>
        <div class="contact-content">
            <form method="POST" action="#" class="contact-form">
                @csrf
                <div class="form-group">
                    <label for="email">E-mailadres</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="first_name">Voornaam</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Achternaam</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="message">Bericht</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn-submit">Verzenden</button>
            </form>

            <div class="contact-info">
                <h4>Adres</h4>
                <img src="https://via.placeholder.com/300x200?text=Kaart+hier" alt="Kaart" class="map-image">
                <p><strong>Straatnaam 1</strong><br>1234 AB Plaats</p>
                <p><strong>Telefoon:</strong> 012-34567899</p>
                <p><strong>Email:</strong> info@voorbeeldsite.nl</p>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>