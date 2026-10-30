@extends('layouts.app')

@section('title', 'Inscription - Marketplace')

@section('content')
<section class="services-section" style="padding-top: 150px; min-height: 100vh;">
    <div class="section-title">
        <h1>Inscription</h1>
        <p>Créez votre compte Marketplace</p>
    </div>

    <div style="max-width: 500px; margin: 0 auto;">
        <form class="contact-form" method="POST" action="{{ route('register.submit') }}">
            @csrf
            
            <input 
                type="text" 
                name="nom" 
                placeholder="Nom complet" 
                required
            >
            
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

            <select name="type_utilisateur" required>
                <option value="">Sélectionner votre rôle</option>
                <option value="acheteur">Acheteur</option>
                <option value="vendeur">Vendeur</option>
            </select>
            
            <button type="submit">
                S'inscrire
            </button>
        </form>

        <p style="text-align: center; color: #64748b; margin-top: 20px;">
            Déjà inscrit? 
            <a href="{{ route('login') }}" style="color: #2bb89d; text-decoration: none; font-weight: 700;">
                Se connecter ici
            </a>
        </p>
    </div>
</section>
@endsection
