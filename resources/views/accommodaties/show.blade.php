@extends('layouts.app')

@section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1 class="fade-in">{{ $accommodatie->titel }}</h1>
        </div>
    </section>

    <div class="show">
        <h2>{{ $accommodatie->titel }}</h2>

        <div class="locationaccommodatie">
            <i class="bi bi-geo-alt-fill"></i>
            <h3>{{ $accommodatie->locatie }}</h3>
        </div>

        <div class="row1">
            <div class="carousel">
                <button class="carousel-btn prev">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <div class="carousel-track-container">
                    <ul class="carousel-track">
                        @foreach ($accommodatie->fotos as $foto)
                            <li class="carousel-slide">
                                <img src="{{ asset('storage/' . $foto->foto_url) }}" alt="Foto {{ $loop->iteration }}">
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="carousel-counter">
                    <span id="carousel-current">1</span> / <span
                        id="carousel-total">{{ $accommodatie->fotos->count() }}</span>
                </div>

                <button class="carousel-btn next">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>

            <div class="lightbox" id="lightbox">
                <button class="lightbox-close" id="lightbox-close">&times;</button>
                <button class="lightbox-nav lightbox-prev" id="lightbox-prev">&#10094;</button>
                <img src="" alt="Vergrote foto" class="lightbox-img" />
                <button class="lightbox-nav lightbox-next" id="lightbox-next">&#10095;</button>
                <div class="lightbox-counter" id="lightbox-counter">1 / {{ $accommodatie->fotos->count() }}</div>
            </div>

            <div class="price-summary-card">
                <div class="price-summary-header">
                    <span class="price-per-night">€ {{ $accommodatie->prijs_per_nacht }}</span>
                    <span class="per-night-text">· 1 nacht</span>
                </div>

                <div class="price-summary-info">
                    <div>
                        <div class="label">Gasten</div>
                        <div class="value">{{ $accommodatie->aantal_personen }} gasten</div>
                    </div>
                    <div>
                        <div class="label">Annuleringsbeleid</div>
                        <div class="value">Gratis annuleren</div>
                    </div>
                </div>

                <div class="highlight-label">
                    <p>Zeer gewild: deze woning is vaak geboekt!</p>
                </div>

                <a href="{{ route('boeken.create', $accommodatie->id) }}">
                    <button class="book-button">Boeken</button>
                </a>

                <div class="disclaimer">Er wordt nog niets in rekening gebracht</div>

                <div class="price-breakdown">
                    <div class="breakdown-item">
                        <span>€ {{ $accommodatie->prijs_per_nacht }} x 6 nachten</span>
                        <span>€ 1.452,00</span>
                    </div>
                    <div class="breakdown-item">
                        <span>Schoonmaakkosten</span>
                        <span>€ 150,00</span>
                    </div>
                    <div class="breakdown-item">
                        <span>Airbnb-servicekosten</span>
                        <span>€ 273,67</span>
                    </div>
                    <div class="breakdown-total">
                        <span>Totaal</span>
                        <span>€ 1.875,67</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row2">
            <div class="beschrijving">
                <h2>Beschrijving</h2>
                <p>{{ $accommodatie->beschrijving }}</p>
            </div>
            <div class="vertical-line"></div>
            <div class="voorzieningen">
                <h2>Voorzieningen</h2>
                <div class="voorzieningenlijst">
                    @foreach ($accommodatie->voorzieningen->chunk(ceil($accommodatie->voorzieningen->count() / 2)) as $chunk)
                        <ul>
                            @foreach ($chunk as $voorziening)
                                <li>- {{ $voorziening->naam }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row3">
            <h2>Bekijk ook deze accommodaties</h2>
            <div class="accommodatierow">
                @foreach ($suggesties as $suggestie)
                    <div class="accommodatiecol">
                        <a href="{{ route('accommodaties.show', $suggestie->id) }}">
                            <img src="{{ $suggestie->fotos->first() ? asset('storage/' . $suggestie->fotos->first()->foto_url) : '/img/default.png' }}"
                                alt="Accommodatie {{ $loop->iteration }}">
                        </a>
                        <a href="{{ route('accommodaties.show', $suggestie->id) }}">
                            {{ $suggestie->titel }}
                        </a>
                        <p>{{ $suggestie->locatie }}</p>
                        <div class="ratingstars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <h4>€{{ $suggestie->prijs_per_nacht }} ·
                            <span>{{ $suggestie->aantal_personen }} personen</span>
                        </h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <section class="calltoactionshow">
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
