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
                                href="{{ route('accommodaties.edit', $accommodatie->id) }}">Bewerken/Beschikbaarheid
                                instellen</a></h4>
                    </div>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
