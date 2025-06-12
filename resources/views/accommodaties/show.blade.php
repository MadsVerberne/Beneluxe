<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beneluxe</title>
    <link rel="icon" type="image/x-icon" href="img/Favicon.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
                <h1></h1>
            </div>
        </section>
        <div class="about">

            <body>
                <h1>{{ $accommodatie->titel }}</h1>
                <p><strong>Locatie:</strong> {{ $accommodatie->locatie }}</p>
                <p><strong>Prijs per nacht:</strong> €{{ $accommodatie->prijs_per_nacht }}</p>
                <p>{{ $accommodatie->beschrijving }}</p>
                @if ($accommodatie->voorzieningen->count())
                    <h3>Voorzieningen:</h3>
                    <ul>
                        @foreach ($accommodatie->voorzieningen as $voorziening)
                            <li>{{ $voorziening->naam }}</li>
                        @endforeach
                    </ul>
                @else
                    <p><em>Geen voorzieningen opgegeven voor deze accommodatie.</em></p>
                @endif
                <div class="gallery">
                    @foreach ($accommodatie->fotos as $foto)
                        @if ($accommodatie->fotos->first())
                            <img src="{{ asset('storage/' . $foto->foto_url) }}" alt="Foto"
                                style="max-width: 200px; margin-right: 10px;">
                        @endif
                    @endforeach
                </div>

                <a href="{{ route('accommodaties.index') }}">← Terug naar overzicht</a>
        </div>
    @endsection
</body>

</html>
