<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Beneluxe</title>
        <link rel="icon" type="image/x-icon" href="img/Favicon.png">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
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
                    <div class="search-field">Bestemming</div>
                    <div class="search-field">Datum</div>
                    <div class="search-field">Gasten</div>
                    <button type="submit">Zoeken</button>
                </form>
            </div>
        </section>

        <main>
            
        </main>
    </body>
</html>
