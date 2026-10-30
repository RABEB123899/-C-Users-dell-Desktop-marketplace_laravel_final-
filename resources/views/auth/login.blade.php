@extends('layouts.app')

@section('title', 'Connexion - Marketplace')

@section('content')
<section class="services-section" style="padding-top: 150px; min-height: 100vh;">
    <div class="section-title">
        <h1>Connexion</h1>
        <p>Connectez-vous à votre compte</p>
    </div>

    <div style="max-width: 500px; margin: 0 auto;">
        <form class="contact-form" method="POST" action="{{ route('login.submit') }}">
            @csrf
            
            <input 
                type="email" 
                name="email" 
                placeholder="Adresse email" 
                required
            >
            
            <input 
                type="password" 
                name="mot_de_passe" 
                placeholder="Mot de passe" 
                required
            >
            
            <button type="submit">
                Se connecter
            </button>
        </form>

        <p style="text-align: center; color: #64748b; margin-top: 20px;">
            Pas encore inscrit? 
            <a href="{{ route('register') }}" style="color: #2bb89d; text-decoration: none; font-weight: 700;">
                S'inscrire ici
            </a>
        </p>
    </div>
</section>
@endsection
