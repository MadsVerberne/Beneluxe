@extends('layouts.app')

@section('content')
<section class="heroother">
    <div class="heroother-content">
        <h1 class="fade-in">Titel van accommodatie</h1>
    </div>
</section>
<div class="show">
    <h2>Titel van accommodatie</h2>
    <div class="locationaccommodatie">
        <i class="bi bi-geo-alt-fill"></i>
        <h3>Vlijmen, Nederland</h3>
    </div>
    <div class="row1">
        <div class="carousel">
            <button class="carousel-btn prev">
                <i class="bi bi-chevron-left"></i>
            </button>
            <div class="carousel-track-container">
                <ul class="carousel-track">
                    <li class="carousel-slide">
                        <img src="/img/Populairehuizen1.jpg" alt="Foto 1">
                    </li>
                    <li class="carousel-slide">
                        <img src="/img/Populairehuizen2.png" alt="Foto 2">
                    </li>
                    <li class="carousel-slide">
                        <img src="/img/Populairehuizen3.png" alt="Foto 3">
                    </li>
                </ul>
            </div>
            <div class="carousel-counter">
                <span id="carousel-current">1</span> / <span id="carousel-total">3</span>
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
            <div class="lightbox-counter" id="lightbox-counter">1 / 3</div>
        </div>


        <div class="price-summary-card">
            <div class="price-summary-header">
                <span class="price-per-night">€ 242</span> <span class="per-night-text">· 1 nacht</span>
            </div>

            <div class="price-summary-info">
                <div>
                    <div class="label">Gasten</div>
                    <div class="value">5 gasten</div>
                </div>
                <div>
                    <div class="label">Annuleringsbeleid</div>
                    <div class="value">Gratis annuleren</div>
                </div>
            </div>

            <div class="highlight-label">
                <p>Zeer gewild: deze woning is vaak geboekt!</p>
            </div>

            <button class="book-button">Boeken</button>
            <div class="disclaimer">Er wordt nog niets in rekening gebracht</div>

            <div class="price-breakdown">
                <div class="breakdown-item">
                    <span>€ 242,00 x 6 nachten</span>
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
            <p>
                Dit prachtige vakantiehuis biedt een comfortabel en luxueus verblijf met een schitterend uitzicht.
                Geniet van de ruime, lichte woonkamer met open haard, perfect voor gezellige avonden.
                De moderne keuken is volledig uitgerust met alle gemakken, ideaal voor het bereiden van heerlijke maaltijden.
                Na een dag vol avontuur kun je ontspannen in de sauna of genieten van een gezellige BBQ in de zonnige achtertuin.
                Ideaal voor gezinnen, met voorzieningen als een kinderstoel, commode en speelkamer.
                Dankzij de gratis WiFi en smart-TV blijf je ook tijdens je verblijf verbonden.
            </p>
        </div>
        <div class="vertical-line"></div>
        <div class="voorzieningen">
            <h2>Voorzieningen</h2>
            <div class="voorzieningenlijst">
                <ul>
                    <li>- Mooi uitzicht</li>
                    <li>- Badkamer met ligbad</li>
                    <li>- Wasmachine en droger</li>
                    <li>- Kledinghangers</li>
                    <li>- Beddengoed, extra kussens en dekens</li>
                    <li>- Rookmelder, blusapparaat en EHBO-doos</li>
                    <li>- WiFi</li>
                    <li>- Volledig uitgeruste keuken</li>
                </ul>
                <ul>
                    <li>- Achtertuin met BBQ</li>
                    <li>- Parkeerterrein aanwezig</li>
                    <li>- Shampoo, conditioner en douchegel</li>
                    <li>- TV</li>
                    <li>- Kinderstoel, commode en speelkamer</li>
                    <li>- Open haard</li>
                    <li>- Sauna</li>
                    <li>- Centrale verwarming</li>
                    <li>- Opbergruimte</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row3">
        <h2>Bekijk ook deze accommodaties</h2>
        <div class="accommodatierow">
            <div class="accommodatiecol">
                <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 1">
                <h3>Strandhuis Zandvoort</h3>
                <p>Zandvoort</p>
                <div class="ratingstars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <i class="bi bi-star"></i>
                </div>
                <h4>€140 · <span>2 nachten</span></h4>
            </div>
            <div class="accommodatiecol">
                <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 2">
                <h3>Strandhuis Zandvoort</h3>
                <p>Zandvoort</p>
                <div class="ratingstars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <i class="bi bi-star"></i>
                </div>
                <h4>€140 · <span>2 nachten</span></h4>
            </div>
            <div class="accommodatiecol">
                <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 3">
                <h3>Strandhuis Zandvoort</h3>
                <p>Zandvoort</p>
                <div class="ratingstars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <i class="bi bi-star"></i>
                </div>
                <h4>€140 · <span>2 nachten</span></h4>
            </div>
            <div class="accommodatiecol">
                <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 4">
                <h3>Strandhuis Zandvoort</h3>
                <p>Zandvoort</p>
                <div class="ratingstars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <i class="bi bi-star"></i>
                </div>
                <h4>€140 · <span>2 nachten</span></h4>
            </div>
            <div class="accommodatiecol">
                <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 5">
                <h3>Strandhuis Zandvoort</h3>
                <p>Zandvoort</p>
                <div class="ratingstars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                    <i class="bi bi-star"></i>
                </div>
                <h4>€140 · <span>2 nachten</span></h4>
            </div>
        </div>
    </div>
</div>
<section class="calltoactionaccommodaties">
    <div class="cta-overlay">
        <div class="cta-content">
            <h2>Wil jij je accommodatie verhuren via Beneluxe?</h2>
            <p>Neem contact op en bereik eenvoudig duizenden potentiële gasten in Nederland, België en Luxemburg.
                Wij regelen de rest.</p>
            <a href="/contact" class="cta-button">Neem contact op</a>
        </div>
    </div>
</section>

@endsection