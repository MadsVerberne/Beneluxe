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
</head>

<body>

    @extends('layouts.app')

    @section('content')
        <section class="heroother">
            <div class="heroother-content">
                <h1>Dashboard</h1>
            </div>
        </section>
        <div class="about">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:underline">Uitloggen</button>
            </form>
            <a href="{{ route('accommodaties.create') }}">Maak een accommodatie aan</a>

            <h2 class="pt-5">Jouw accommodaties</h2>

            @if (Auth::user()->accommodaties->isEmpty())
                <p>Je hebt nog geen accommodaties aangemaakt.</p>
            @else
                <ul>
                    @foreach (Auth::user()->accommodaties as $accommodatie)
                        <div class="accommodatiecol">
                            @foreach ($accommodatie->fotos as $foto)
                                @if ($accommodatie->fotos->first())
                                    <img src="{{ asset('storage/' . $foto->foto_url) }}" alt="Foto"
                                        style="max-width: 200px; margin-right: 10px;">
                                @endif
                            @endforeach
                            <h3>{{ $accommodatie->titel }}</h3>
                            <p>{{ $accommodatie->locatie }}</p>
                            <div class="ratingstars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <h4>{{ $accommodatie->prijs_per_nacht }} · <span>2 nachten</span> <a
                                    href="{{ route('accommodaties.edit', $accommodatie->id) }}">Bewerken/Beschikbaarheid instellen</a></h4>
                        </div>
                    @endforeach
                </ul>
            @endif
        </div>
    @endsection
</body>

</html>
