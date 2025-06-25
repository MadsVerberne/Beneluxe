@extends('layouts.app')

@section('content')
<section class="heroother">
    <div class="heroother-content">
        <h1 class="fade-in">Dashboard</h1>
    </div>
</section>

<div class="dashboard">
    {{-- Boekingen --}}
    <h2 class="pt-10">Jouw boekingen</h2>

    @if ($boekingen->isEmpty())
    <p>Je hebt nog geen boekingen gemaakt.</p>
    @else
    <div class="grid gap-4">
        @foreach ($boekingen as $boeking)
        <div class="boekingtegel">
            <img src="{{ asset('storage/' .$boeking->accommodatie->fotos->first()->foto_url) }}" alt="{{ $boeking->accommodatie->titel ?? 'Accommodatie afbeelding' }}">
            <div class="boekinginfo">
                <h3>{{ $boeking->accommodatie->titel ?? 'Onbekende accommodatie' }}</h3>
                <p>Locatie: {{ $boeking->accommodatie->locatie ?? '-' }}</p>
                <h4>Van: <span class="boekingspan">{{ \Carbon\Carbon::parse($boeking->van_datum)->format('d-m-Y') }}</span></h4>
                <h4>Tot: <span class="boekingspan">{{ \Carbon\Carbon::parse($boeking->tot_datum)->format('d-m-Y') }}</span></h4>
                <p id="lastp">Totaal prijs: <span class="boekingspan">€{{ number_format($boeking->totaal_prijs, 2, ',', '.') }}</span></p>
                <a href="#" class="annuleerboeking">
                    <i class="bi bi-x"></i>
                    <span>Boeking annuleren</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif


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

    <div class="dashboard-buttons">
        <a href="{{ route('accommodaties.create') }}" class="aanmaken-knop">
            <i class="bi bi-plus-circle"></i>
            <span>Maak een accommodatie aan</span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="uitlog-knop">
                <i class="bi bi-box-arrow-right"></i>
                <span>Uitloggen</span>
            </button>
        </form>
    </div>


</div>
@endsection