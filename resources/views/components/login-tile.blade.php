<div class="logintile" id="logintile" style="display: none;">
    <div class="loginandclose">
        <h2>LOGIN</h2>
        <i class='bx bx-x' id="closelogin"></i>
    </div>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">E-mail *</label>
        <input type="email" id="email" name="email" required>
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
