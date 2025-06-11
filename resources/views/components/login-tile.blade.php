<div class="logintile" id="logintile" style="display: none;">
    <div class="loginandclose">
        <h2>LOGIN</h2>
        <i class='bx bx-x' id="closelogin"></i>
    </div>

    {{-- Foutmeldingen tonen --}}
    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        {{-- Email Address --}}
        <label for="email">E-mail *</label>
        <input type="email" id="email" name="email" required>
        {{-- Password --}}
        <label for="password">Wachtwoord *</label>
        <input type="password" id="password" name="password" required>
        <p>Wachtwoord vergeten?</p>
        <button type="submit">LOGIN</button>
    </form>
    <div class="registerareabox">
        <h3 id="h3register">NIEUW BIJ BENELUXE?</h3>
        <p>Maak nu een account aan en verhuur of boek direct!</p>
        <a href="#">
            <h3 id="showregister">REGISTREREN</h3>
        </a>
    </div>
</div>

<div id="overlay" style="display: none;"></div>


<script>
    window.onload = function() {
        @if ($errors->any() || session('error'))
            @if (request()->routeIs('register'))
                document.getElementById('registertile').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            @elseif (request()->routeIs('login'))
                document.getElementById('logintile').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            @endif
        @endif
    }
</script>

