    @extends('layouts.app')

    @section('content')
        <section class="heroother">
            <div class="heroother-content">
                <h1 class="fade-in">Accommodaties</h1>
            </div>
        </section>
        <div class="accommodaties">
            <!-- NEDERLAND -->
            <div class="accommodatiesnederland" id="nederland">
                <div class="flagandnametop">
                    <span class="fi fi-nl"></span>
                    <h2>Nederland</h2>
                </div>
                <div class="accommodatierow">
                    @foreach ($accommodatiesNederland as $accommodatie)
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

                <!-- BELGIË -->
                <div class="accommodatiesbelgie" id="belgie">
                    <div class="flagandname">
                        <span class="fi fi-be"></span>
                        <h2>België</h2>
                    </div>
                    <div class="accommodatierow">
                        @foreach ($accommodatiesBelgie as $accommodatie)
                            <div class="accommodatiecol">
                                <a href="{{ route('accommodaties.show', $accommodatie->id) }}">
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

                <!-- LUXEMBURG -->
                <div class="accommodatiesluxemburg" id="luxemburg">
                    <div class="flagandname">
                        <span class="fi fi-lu"></span>
                        <h2>Luxemburg</h2>
                    </div>
                    <div class="accommodatierow">
                        @foreach ($accommodatiesLuxemburg as $accommodatie)
                            <div class="accommodatiecol">
                                <a href="{{ route('accommodaties.show', $accommodatie->id) }}">
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

            </div>
            <section class="calltoactionaccommodaties">
                <div class="cta-overlay">
                    <div class="cta-content">
                        <h2>Wil jij je accommodatie verhuren via Beneluxe?</h2>
                        <p>Neem contact op en bereik eenvoudig duizenden potentiële gasten in Nederland, België en
                            Luxemburg.
                            Wij regelen de rest.</p>
                        <a href="/register" class="cta-button">Registreer nu</a>
                    </div>
                </div>
            </section>
        @endsection
