@php
    use Carbon\Carbon;
    Carbon::setLocale('nl');

@endphp

@extends('layouts.app')

@section('content')
    <section class="heroresults">
        <div class="heroresults-content">
            <h1 class="fade-in">
                {{ $locatie }} –
                {{ Carbon::parse($incheck)->translatedFormat('j F') }} /
                {{ Carbon::parse($uitcheck)->translatedFormat('j F') }}
            </h1>
        </div>

        <form class="search-bar-results" method="GET" action="{{ route('accommodaties.results') }}">
            <input name="locatie" id="bestemming-autocomplete" class="search-field" placeholder="Bestemming"
                value="{{ $locatie }}">
            <input name="incheck_datum" class="search-field" type="date" placeholder="Incheck datum"
                value="{{ $incheck }}">
            <input name="uitcheck_datum" class="search-field" type="date" placeholder="Uitcheck datum"
                value="{{ $uitcheck }}"></input>
            <input name="gasten" class="search-field" type="number" placeholder="Gasten" value="{{ $gasten }}">
            <button type="submit">Zoeken</button>
        </form>
    </section>
    <div class="results">
        <h2>
            {!! $locatie ? "<span>$locatie:</span> " : '' !!}
            {{ $accommodaties->count() }} accommodatie{{ $accommodaties->count() === 1 ? '' : 's' }} gevonden
        </h2>
        <div class="accommodatie-lijst">
            @foreach ($accommodaties as $accommodatie)
                <div class="accommodatie-tegel-verticaal">
                    <div class="img-wrapper">
                        <a href="{{ route('accommodaties.show', $accommodatie->id) }}" style="text-decoration: none;">
                            <img src="{{ asset('storage/' . $accommodatie->fotos->first()->foto_url) }}"
                                alt="Accommodatie {{ $loop->iteration }}">
                        </a>
                    </div>
                    <div class="info">
                        <h3><a href="{{ route('accommodaties.show', $accommodatie->id) }}"
                                style="text-decoration: none;">{{ $accommodatie->titel }}</a></h3>
                        <p>{{ $accommodatie->locatie }}</p>

                        <div class="ratingstars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>

                        <p class="extra-info">{{ $accommodatie->aantal_bedden }} bedden · Max.
                            {{ $accommodatie->aantal_personen }} gasten · {{ $accommodatie->aantal_badkamers }} badkamers
                        </p>

                        <p class="prijs"><span>€{{ $accommodatie->prijs_per_nacht }}</span>&nbsp;· 5 nachten</p>
                    </div>
                    <div class="actie-knop">
                        <a href="{{ route('accommodaties.show', $accommodatie->id) }}" class="bekijk-btn">Bekijk
                            beschikbaarheid</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
