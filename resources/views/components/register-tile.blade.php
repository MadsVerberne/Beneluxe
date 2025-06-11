<div class="logintile" id="registertile" style="display:none;">
    <div class="loginandclose">
        <h2>REGISTREREN</h2>
        <i class='bx bx-x' id="closeregister"></i>
    </div>

    {{-- Foutmeldingen tonen --}}
    @if ($errors->any() && request()->routeIs('register'))
        <div class="error-message" style="color: red; margin-bottom: 1rem;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        {{-- Name --}}
        <label for="name">Name *</label>
        <input type="text" id="name" name="name" required>
        {{-- Email --}}
        <label for="email">E-mail *</label>
        <input type="email" id="email" name="email" required>
        {{-- Password --}}
        <label for="password">Wachtwoord *</label>
        <input type="password" id="password" name="password" required>
        {{-- Confirm Password --}}
        <label for="password_confirmation">Wachtwoord Bevestigen *</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <button type="submit">REGISTREREN</button>
    </form>
    <div class="registerareabox">
        <h3 id="h3register">AL EEN ACCOUNT?</h3>
        <p>Log direct in en bekijk jouw reserveringen.</p>
        <a href="#">
            <h3 id="showlogin">LOGIN</h3>
        </a>
    </div>
</div>

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
