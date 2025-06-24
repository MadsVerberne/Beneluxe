    @extends('layouts.app')
    @section('content')
        <section class="hero">
            <div class="hero-content">
                <h1 class="fade-in">Vakantiehuizen in<br>Nederland, België<br>en Luxemburg</h1>
                <form class="search-bar" method="GET" action="{{ route('accommodaties.results') }}">
                    <input name="locatie" id="bestemming-autocomplete" class="search-field" placeholder="Bestemming">
                    <input name="incheck_datum" class="search-field" type="date" placeholder="Incheck datum">
                    <input name="uitcheck_datum" class="search-field" type="date" placeholder="Uitcheck datum">
                    <input name="gasten" class="search-field" type="number" placeholder="Gasten">
                    <button type="submit">Zoeken</button>
                </form>
            </div>
        </section>
        <div class="populairehuizen">
            <h2>Populaire huizen</h2>
            <div class="accommodatierow">
                @foreach ($accommodaties as $accommodatie)
                    <div class="accommodatiecol">
                        <a href="{{ route('accommodaties.show', $accommodatie->id) }}" style="text-decoration: none;">
                            <img src="{{ asset('storage/' . $accommodatie->fotos->first()->foto_url) }}"
                                alt="Accommodatie {{ $loop->iteration }}">
                        </a>
                        <a href="{{ route('accommodaties.show', $accommodatie->id) }}">
                            {{ $accommodatie->titel }}
                        </a>
                        <p>{{ $accommodatie->locatie }}</p>
                        <div class="ratingstars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <h4>€{{ $accommodatie->prijs_per_nacht }} · <span>{{ $accommodatie->aantal_personen }}
                                personen</span></h4>
                    </div>
                @endforeach
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
                    <p>Neem contact op en bereik eenvoudig duizenden potentiële gasten in Nederland, België en Luxemburg.
                        Wij regelen de rest.</p>
                    <a href="/register" class="cta-button">Registreer nu</a>
                </div>
            </div>
        </section>
    @endsection
