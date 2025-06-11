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
    <section class="hero">
        <div class="hero-content">
            <h1>Vakantiehuizen in<br>Nederland, België<br>en Luxemburg</h1>

            <form class="search-bar">
                <input id="bestemming-autocomplete" class="search-field" placeholder="Bestemming"></input>
                <input class="search-field" placeholder="Datum"></input>
                <input class="search-field" placeholder="Gasten"></input>
                <a href="/results" type="submit">Zoeken</a>
            </form>
        </div>
    </section>
    <div class="populairehuizen">
        <h2>Populaire huizen</h2>
        <div class="populairehuizenrow">
            <div class="populairehuizencol">
                <img src="/img/Populairehuizen1.jpg" alt="Populairehuizen1">
                <h3>Vakantiehuis aan het strand</h3>
                <p>Egmond aan zee</p>
                <div class="ratingstars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                </div>
                <h4>€90 · <span>2 nachten</span></h4>
            </div>
            <div class="populairehuizencol">
                <img src="/img/Populairehuizen2.png" alt="Populairehuizen2">
                <h3>Chalet in de bossen</h3>
                <p>Durbuy, België</p>
                <div class="ratingstars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                </div>
                <h4>€120 · <span>3 nachten</span></h4>
            </div>
            <div class="populairehuizencol">
                <img src="/img/Populairehuizen3.png" alt="Populairehuizen3">
                <h3>Villa Luxemburg</h3>
                <p>Schieren, Luxemburg</p>
                <div class="ratingstars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>
                <h4>€410 · <span>7 nachten</span></h4>
            </div>
            <div class="populairehuizencol">
                <img src="/img/Populairehuizen4.jpg" alt="Populairehuizen4">
                <h3>Boshuisje Limburg</h3>
                <p>Beek, Limburg</p>
                <div class="ratingstars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                </div>
                <h4>€220 · <span>5 nachten</span></h4>
            </div>
        </div>
    </div>
    <div class="bestemmingen">
        <h2>Onze bestemmingen</h2>
        <div class="bestemmingentegels">
            <div class="bestemmingnl bestemming-tegel">
                <div class="overlay">
                    <span class="fi fi-nl"></span>
                    <h3>Nederland</h3>
                </div>
                <a href="/accommodaties#nederland">
                    <img src="/img/Nederland.jpg" alt="Nederland">
                </a>
            </div>
            <div class="bestemmingbe bestemming-tegel">
                <div class="overlay">
                    <span class="fi fi-be"></span>
                    <h3>België</h3>
                </div>
                <a href="/accommodaties#belgie">
                    <img src="/img/België.jpg" alt="België">
                </a>
            </div>
            <div class="bestemminglu bestemming-tegel">
                <div class="overlay">
                    <span class="fi fi-lu"></span>
                    <h3>Luxemburg</h3>
                </div>
                <a href="/accommodaties#luxemburg">
                    <img src="/img/Luxemburg.jpg" alt="Luxemburg">
                </a>
            </div>
        </div>
    </div>
    <div class="usp">
        <h2>Waarom Beneluxe?</h2>
        <div class="usp-tegels-container">
            <div class="usptegel">
                <img src="/img/ico/Eenvoudig Boeken.png" alt="">
                <div class="usptext">
                    <h3>Eenvoudig boeken</h3>
                    <p>Reserveer je vakantieaccommodatie in een paar klikken</p>
                </div>
            </div>
            <div class="usptegel">
                <img src="/img/ico/Direct Bevestigd.png" alt="">
                <div class="usptext">
                    <h3>Direct bevestigd</h3>
                    <p>De meeste boekingen worden meteen bevestigd</p>
                </div>
            </div>
            <div class="usptegel">
                <img src="/img/ico/Geen verborgen kosten.png" alt="">
                <div class="usptext">
                    <h3>Geen verborgen kosten</h3>
                    <p>Wat je ziet is wat je betaalt, zonder verrassingen achteraf</p>
                </div>
            </div>
        </div>
    </div>
    <section class="calltoactionhome">
        <div class="cta-overlay">
            <div class="cta-content">
                <h2>Wil jij je accommodatie verhuren via Beneluxe?</h2>
                <p>Neem contact op en bereik eenvoudig duizenden potentiële gasten in Nederland, België en Luxemburg. Wij regelen de rest.</p>
                <a href="/contact" class="cta-button">Neem contact op</a>
            </div>
        </div>
    </section>

    @endsection


</body>

</html>
