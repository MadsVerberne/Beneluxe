    @extends('layouts.app')

    @section('content')
        <section class="heroother">
            <div class="heroother-content">
                <h1>Contact</h1>
            </div>
        </section>
        <div class="contact-container">
            <div class="contact-header">
                <h2>Contact</h2>
                <p>Heb je vragen of opmerkingen? Laat het ons weten via onderstaand formulier, we nemen zo snel mogelijk
                    contact met je op.</p>
            </div>
            <div class="contact-content">
                <form method="POST" action="#" class="contact-form">
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

                <div class="contact-info">
                    <h4>Adres</h4>
                    <img src="https://via.placeholder.com/300x200?text=Kaart+hier" alt="Kaart" class="map-image">
                    <p><strong>Straatnaam 1</strong><br>1234 AB Plaats</p>
                    <p><strong>Telefoon:</strong> 012-34567899</p>
                    <p><strong>Email:</strong> info@voorbeeldsite.nl</p>
                </div>
            </div>
        </div>
    @endsection
