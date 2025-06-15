<header class="header">
    <div class="logo">
        <a href="/">
            <img src="/img/Favicon.png" alt="Beneluxe Logo">
        </a>
    </div>

    <nav class="nav">
        <ul>
            <li><a href="/accommodaties">Accommodaties</a></li>
            <li><a href="/about">Over ons</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>

    <div class="header-button">
        @auth
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-person-circle"></i>
            </a>
        @else
            <a href="{{ route('login') }}">
                {{-- <button id="openlogin">Inloggen</button> --}}
                <button id="">Inloggen</button>
            </a>
        @endauth
    </div>


</header>
