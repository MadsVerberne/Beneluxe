    @extends('layouts.app')

    @section('content')
    <section class="heroresults">
        <div class="heroresults-content">
            <h1>Antwerpen · 2 - 14 juli</h1>
        </div>
        <form class="search-bar-results">
            <input id="bestemming-autocomplete" class="search-field" placeholder="Bestemming"></input>
            <input class="search-field" placeholder="Datum"></input>
            <input class="search-field" placeholder="Gasten"></input>
            <a href="{{route('accommodaties.results')}}" type="submit">Zoeken</a>
        </form>
    </section>
    <div class="results">
        <h2><span>Antwerpen:</span> 2 accommodaties gevonden</h2>
        <div class="accommodatie-lijst">
            <div class="accommodatie-tegel-verticaal">
                <div class="img-wrapper">
                    <a href="#">
                        <img src="/img/Populairehuizen2.png" alt="Charmant huisje">
                    </a>
                </div>
                <div class="info">
                    <h3><a href="#">Charmant huisje in Antwerpen</a></h3>
                    <p>Antwerpen, België</p>

                    <div class="ratingstars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>

                    <p class="extra-info">2 slaapkamers · Max. 4 gasten · 60m² · Eigen tuin</p>

                    <p class="prijs"><span>€150</span>&nbsp;· 5 nachten</p>
                </div>
                <div class="actie-knop">
                    <a href="#" class="bekijk-btn">Bekijk beschikbaarheid</a>
                </div>
            </div>
            <div class="accommodatie-tegel-verticaal">
                <div class="img-wrapper">
                    <a href="#">
                        <img src="/img/Populairehuizen2.png" alt="Charmant huisje">
                    </a>
                </div>
                <div class="info">
                    <h3><a href="#">Charmant huisje in Antwerpen</a></h3>
                    <p>Antwerpen, België</p>

                    <div class="ratingstars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </div>

                    <p class="extra-info">2 slaapkamers · Max. 4 gasten · 60m² · Eigen tuin</p>

                    <p class="prijs"><span>€150</span>&nbsp;· 5 nachten</p>
                </div>
                <div class="actie-knop">
                    <a href="#" class="bekijk-btn">Bekijk beschikbaarheid</a>
                </div>
            </div>
        </div>
    </div>
    @endsection