@extends('layouts.app')

@section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1>Show</h1>
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
            <a href="{{ route('boeken.create', ['accommodatieId' => $accommodatie->id]) }}">Boek deze accommodatie!</a>
            <a href="{{ route('accommodaties.index') }}">← Terug naar overzicht</a>
    </div>
@endsection
