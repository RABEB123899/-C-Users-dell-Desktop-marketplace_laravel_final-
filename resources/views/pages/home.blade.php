@extends('layouts.app')

@section('title', 'Accueil - Marketplace')

@section('content')
<!-- HERO -->
<section class="hero-section">
    <div class="hero-text">
        <span class="badge">
            Marketplace Professionnel
        </span>

        <h1>
            Trouvez les meilleurs
            <span>services</span>
            près de chez vous
        </h1>

        <p>
            Réservez facilement des services professionnels :
            design, réparation, photographie,
            développement, coiffure, livraison et plus encore.
        </p>

        <form class="search-box" action="{{ route('annonces.index') }}" method="GET">
            <input type="text" name="search" placeholder="Rechercher un service...">
            <button type="submit">
                Rechercher
            </button>
        </form>
    </div>

    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1200&auto=format&fit=crop" alt="Marketplace">
    </div>
</section>

<!-- CATEGORIES -->
<section class="categories-section">
    <h2>Catégories populaires</h2>

    <div class="categories-grid">
        <div class="category-card">
            <div class="category-icon dev-icon">
                <i class="fa-solid fa-laptop-code"></i>
            </div>
            <h3>Développement</h3>
        </div>

        <div class="category-card">
            <div class="category-icon design-icon">
                <i class="fa-solid fa-pen-ruler"></i>
            </div>
            <h3>Design</h3>
        </div>

        <div class="category-card">
            <div class="category-icon photo-icon">
                <i class="fa-solid fa-camera"></i>
            </div>
            <h3>Photographie</h3>
        </div>

        <div class="category-card">
            <div class="category-icon livraison-icon">
                <i class="fa-solid fa-truck-fast"></i>
            </div>
            <h3>Livraison</h3>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="services-section">
    <div class="section-title">
        <h1>Services populaires</h1>
        <p>
            Découvrez les services les plus demandés.
        </p>
    </div>

    <div class="services-grid">
        <div class="service-card">
            <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1200&auto=format&fit=crop" alt="Apple Watch">

            <div class="service-content">
                <span>Électronique</span>

                <h3>Apple Watch Série 9</h3>

                <p>Montre connectée moderne avec suivi santé et sport.</p>

                <div class="service-bottom">
                    <strong>1200 DT</strong>
                    <a href="{{ route('annonces.index') }}">Voir</a>
                </div>
            </div>
        </div>

        <div class="service-card">
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=1200&auto=format&fit=crop" alt="Nike">

            <div class="service-content">
                <span>Mode</span>

                <h3>Nike Air Max</h3>

                <p>Chaussures tendance et confortables pour homme.</p>

                <div class="service-bottom">
                    <strong>350 DT</strong>
                    <a href="{{ route('annonces.index') }}">Voir</a>
                </div>
            </div>
        </div>

        <div class="service-card">
            <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=1200&auto=format&fit=crop" alt="Canon">

            <div class="service-content">
                <span>Photographie</span>

                <h3>Appareil Canon</h3>

                <p>Caméra professionnelle haute qualité.</p>

                <div class="service-bottom">
                    <strong>2200 DT</strong>
                    <a href="{{ route('annonces.index') }}">Voir</a>
                </div>
            </div>
        </div>

        <div class="service-card">
            <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1200&auto=format&fit=crop" alt="Villa">

            <div class="service-content">
                <span>Immobilier</span>

                <h3>Villa moderne à Hammamet</h3>

                <p>Maison moderne avec piscine et jardin.</p>

                <div class="service-bottom">
                    <strong>450000 DT</strong>
                    <a href="{{ route('annonces.index') }}">Voir</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
