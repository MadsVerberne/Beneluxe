@extends('layouts.app')

@section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1 class="fade-in">Dashboard</h1>
        </div>
    </section>

    <div class="about">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600 hover:underline">Uitloggen</button>
        </form>

        <a href="{{ route('accommodaties.create') }}">Maak een accommodatie aan</a>

        {{-- Accommodaties --}}
        <h2 class="pt-5">Jouw accommodaties</h2>

        @if (Auth::user()->accommodaties->isEmpty())
            <p>Je hebt nog geen accommodaties aangemaakt.</p>
        @else
            <div class="accommodatierow">
                @foreach ($accommodaties as $accommodatie)
                    <div class="accommodatiecol">
                        <a href="{{ route('accommodaties.edit', $accommodatie->id) }}">
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
        @endif

        {{-- Boekingen --}}
        <h2 class="pt-10">Jouw boekingen</h2>

        @if ($boekingen->isEmpty())
            <p>Je hebt nog geen boekingen gemaakt.</p>
        @else
            <div class="grid gap-4">
                @foreach ($boekingen as $boeking)
                    <div class="p-4 border rounded bg-white shadow-sm">
                        <h3 class="text-lg font-semibold">
                            {{ $boeking->accommodatie->titel ?? 'Onbekende accommodatie' }}
                        </h3>
                        <p class="text-sm text-gray-600">
                            Locatie: {{ $boeking->accommodatie->locatie ?? '–' }}
                        </p>
                        <p class="mt-2">Van:
                            <strong>{{ \Carbon\Carbon::parse($boeking->van_datum)->format('d-m-Y') }}</strong></p>
                        <p>Tot: <strong>{{ \Carbon\Carbon::parse($boeking->tot_datum)->format('d-m-Y') }}</strong></p>
                        <p class="mt-1">Totaal prijs: €{{ number_format($boeking->totaal_prijs, 2, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
