<div class="logintile" id="registertile" style="display:none;">
    <div class="loginandclose">
        <h2>REGISTREREN</h2>
        <i class='bx bx-x' id="closeregister"></i>
    </div>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="register_email">E-mail *</label>
        <input type="email" id="register_email" name="email" required>
        <label for="register_password">Wachtwoord *</label>
        <input type="password" id="register_password" name="password" required>
        <button type="submit">REGISTREREN</button>
    </form>
    <div class="registerareabox">
        <h3 id="h3register">AL EEN ACCOUNT?</h3>
        <p>Log direct in en bekijk jouw reserveringen.</p>
        <a href="#"><h3 id="showlogin">LOGIN</h3></a>
    </div>
</div>
