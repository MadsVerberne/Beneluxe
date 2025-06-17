    @extends('layouts.app')

    @section('content')
        <section class="heroother">
            <div class="heroother-content">
                <h1>Contact</h1>
            </div>
        </section>
        <div class="contact-container">
            <div class="contact-header">
                <p>Heb je vragen of opmerkingen? Laat het ons weten via onderstaand formulier, we nemen zo snel mogelijk
                    contact met je op.</p>
            </div>
            <div class="contact-content">
                <form method="POST" action="{{ route('contact.store') }}" class="contact-form">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-mailadres</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Voornaam</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Achternaam</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Bericht</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Verzenden</button>
                </form>

                <div class="register-cta-box">
                    <div class="cta-overlay">
                        <div class="cta-content">
                            <h2>Word verhuurder via Beneluxe</h2>
                            <p>Bereik eenvoudig duizenden gasten in Nederland, België en Luxemburg.<br>Wij regelen de rest.</p>
                            <a href="/register" class="cta-button">Registreer nu</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
