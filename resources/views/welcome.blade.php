<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beneluxe</title>
    <link rel="icon" type="image/x-icon" href="img/Favicon.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
    <header class="header">
        <div class="logo">
            <a href="/">
                <img src="/img/Favicon.png" alt="Beneluxe Logo">
            </a>
        </div>

        <nav class="nav">
            <ul>
                <li><a href="/huizen">Huizen</a></li>
                <li><a href="/about">Over ons</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>

        <div class="header-button">
            <button>Inloggen</button>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Vakantiehuizen in<br>Nederland, België<br>en Luxemburg</h1>

            <form class="search-bar">
                <input id="bestemming-autocomplete" class="search-field" placeholder="Bestemming"></input>
                <input class="search-field" placeholder="Datum"></input>
                <input class="search-field" placeholder="Gasten"></input>
                <button type="submit">Zoeken</button>
            </form>
        </div>
    </section>

    <main>
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
    </main>

    <footer>
        <div class="footerrow">
        
        </div>
    </footer>
</body>

</html>
