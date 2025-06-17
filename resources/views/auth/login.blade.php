@extends('layouts.app')

@section('content')
    <section class="heroother">
        <div class="heroother-content">
            <h1 class="fade-in">Inloggen</h1>
        </div>
    </section>
    <div class="login">
        <div class="logintile" id="logintile">
            {{-- Foutmeldingen tonen --}}
            @if ($errors->any() && request()->routeIs('login'))
                <div class="error-message" style="color: red; margin-bottom: 1rem;">
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
                <a href="{{ route('register') }}">
                    <h3 id="showregister">REGISTREREN</h3>
                </a>
            </div>
        </div>
    </div>
@endsection
