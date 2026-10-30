@extends('layouts.app')

@section('title', 'Services & Produits - Marketplace')

@section('content')
<!-- Titre -->
<section class="services-section" style="padding-top: 150px;">
    <div class="section-title">
        <h1>Services & Produits</h1>
        <p>Découvrez les annonces disponibles.</p>
    </div>

    <!-- Filtres -->
    <form class="filter-box" method="GET" action="{{ route('annonces.index') }}">
        <input 
            type="text" 
            name="search" 
            placeholder="Rechercher par titre, ville..."
            value="{{ $search ?? '' }}"
        >

        <select name="categorie">
            <option value="">Toutes les catégories</option>
            <option value="Makeup" {{ (isset($categorie) && $categorie == "Makeup") ? "selected" : "" }}>Makeup</option>
            <option value="Ordinateurs" {{ (isset($categorie) && $categorie == "Ordinateurs") ? "selected" : "" }}>Ordinateurs</option>
            <option value="Téléphones" {{ (isset($categorie) && $categorie == "Téléphones") ? "selected" : "" }}>Téléphones</option>
            <option value="Maison" {{ (isset($categorie) && $categorie == "Maison") ? "selected" : "" }}>Maison</option>
            <option value="Photographie" {{ (isset($categorie) && $categorie == "Photographie") ? "selected" : "" }}>Photographie</option>
            <option value="Jardinage" {{ (isset($categorie) && $categorie == "Jardinage") ? "selected" : "" }}>Jardinage</option>
            <option value="Livraison" {{ (isset($categorie) && $categorie == "Livraison") ? "selected" : "" }}>Livraison</option>
            <option value="Réparation" {{ (isset($categorie) && $categorie == "Réparation") ? "selected" : "" }}>Réparation</option>
        </select>

        <button type="submit">Filtrer</button>
    </form>

    <!-- Annonces Grid -->
    <div class="services-grid">
        @forelse ($annonces ?? [] as $annonce)
            <div class="service-card">
                @if (!empty($annonce['image']))
                    <img src="{{ asset('uploads/' . $annonce['image']) }}" alt="Annonce">
                @else
                    <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?q=80&w=1200&auto=format&fit=crop" alt="Annonce">
                @endif

                <div class="service-content">
                    <span>{{ $annonce['categorie'] ?? 'N/A' }} | {{ $annonce['type_annonce'] ?? 'Vente' }}</span>

                    <h3>{{ $annonce['titre'] ?? 'Titre' }}</h3>

                    <p>{{ Str::limit($annonce['description'] ?? '', 80) }}</p>

                    <div class="service-bottom">
                        <strong>{{ $annonce['prix'] ?? '0' }} DT</strong>
                        <div class="action-buttons">
                            <a href="{{ route('annonces.show', $annonce['id']) }}" class="edit-btn">Voir détail</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p style="text-align: center; grid-column: 1/-1;">Aucune annonce trouvée.</p>
        @endforelse
    </div>
</section>
@endsection
