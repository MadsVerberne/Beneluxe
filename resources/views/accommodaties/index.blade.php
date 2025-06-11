<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beneluxe</title>
    <link rel="icon" type="image/x-icon" href="img/Favicon.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Flag icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.3.2/css/flag-icons.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1>Accommodaties</h1>
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
            <div class="accommodatierow">
                <div class="accommodatiecol">
                    <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 6">
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
                    <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 7">
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
                    <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 8">
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
                    <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 9">
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
                    <img src="/img/Populairehuizen1.jpg" alt="Accommodatie 10">
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

        <!-- BELGIË -->
        <div class="accommodatiesbelgie" id="belgie">
            <div class="flagandname">
                <span class="fi fi-be"></span>
                <h2>België</h2>
            </div>
            <div class="accommodatierow">
                <div class="accommodatiecol">
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 11">
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
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 12">
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
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 13">
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
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 14">
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
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 15">
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
            <div class="accommodatierow">
                <div class="accommodatiecol">
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 16">
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
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 17">
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
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 18">
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
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 19">
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
                    <img src="/img/Populairehuizen2.png" alt="Accommodatie 20">
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

        <!-- LUXEMBURG -->
        <div class="accommodatiesluxemburg" id="luxemburg">
            <div class="flagandname">
                <span class="fi fi-lu"></span>
                <h2>Luxemburg</h2>
            </div>
            <div class="accommodatierow">
                <div class="accommodatiecol">
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 21">
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
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 22">
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
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 23">
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
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 24">
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
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 25">
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
            <div class="accommodatierow">
                <div class="accommodatiecol">
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 26">
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
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 27">
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
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 28">
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
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 29">
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
                    <img src="/img/Populairehuizen3.png" alt="Accommodatie 30">
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
                <p>Neem contact op en bereik eenvoudig duizenden potentiële gasten in Nederland, België en Luxemburg. Wij regelen de rest.</p>
                <a href="/contact" class="cta-button">Neem contact op</a>
            </div>
        </div>
    </section>

    @endsection
</body>

</html>