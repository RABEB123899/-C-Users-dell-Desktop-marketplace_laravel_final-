@extends('layouts.app')

@section('title', 'Modifier l\'annonce - Marketplace')

@section('content')
<section class="services-section" style="padding-top: 150px; min-height: 100vh;">
    <div class="section-title">
        <h1>Modifier l'annonce</h1>
        <p>Mettez à jour les informations</p>
    </div>

    <div style="max-width: 700px; margin: 0 auto;">
        <form class="contact-form" method="POST" action="{{ route('annonces.update', $annonce['id'] ?? 0) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <input 
                type="text" 
                name="titre" 
                placeholder="Titre de l'annonce" 
                value="{{ $annonce['titre'] ?? '' }}"
                required
            >
            
            <textarea 
                name="description" 
                placeholder="Description détaillée..." 
                required
                style="min-height: 120px;"
            >{{ $annonce['description'] ?? '' }}</textarea>
            
            <select name="categorie" required>
                <option value="">Sélectionner une catégorie</option>
                <option value="Makeup" {{ (isset($annonce['categorie']) && $annonce['categorie'] == "Makeup") ? "selected" : "" }}>Makeup</option>
                <option value="Ordinateurs" {{ (isset($annonce['categorie']) && $annonce['categorie'] == "Ordinateurs") ? "selected" : "" }}>Ordinateurs</option>
                <option value="Téléphones" {{ (isset($annonce['categorie']) && $annonce['categorie'] == "Téléphones") ? "selected" : "" }}>Téléphones</option>
                <option value="Maison" {{ (isset($annonce['categorie']) && $annonce['categorie'] == "Maison") ? "selected" : "" }}>Maison</option>
                <option value="Photographie" {{ (isset($annonce['categorie']) && $annonce['categorie'] == "Photographie") ? "selected" : "" }}>Photographie</option>
                <option value="Jardinage" {{ (isset($annonce['categorie']) && $annonce['categorie'] == "Jardinage") ? "selected" : "" }}>Jardinage</option>
                <option value="Livraison" {{ (isset($annonce['categorie']) && $annonce['categorie'] == "Livraison") ? "selected" : "" }}>Livraison</option>
                <option value="Réparation" {{ (isset($annonce['categorie']) && $annonce['categorie'] == "Réparation") ? "selected" : "" }}>Réparation</option>
            </select>

            <select name="type_annonce" required>
                <option value="">Type d'annonce</option>
                <option value="Vente" {{ (isset($annonce['type_annonce']) && $annonce['type_annonce'] == "Vente") ? "selected" : "" }}>Vente</option>
                <option value="Location" {{ (isset($annonce['type_annonce']) && $annonce['type_annonce'] == "Location") ? "selected" : "" }}>Location</option>
                <option value="Service" {{ (isset($annonce['type_annonce']) && $annonce['type_annonce'] == "Service") ? "selected" : "" }}>Service</option>
            </select>
            
            <input 
                type="number" 
                name="prix" 
                placeholder="Prix (DT)" 
                value="{{ $annonce['prix'] ?? '' }}"
                required
                step="0.01"
            >
            
            <input 
                type="text" 
                name="ville" 
                placeholder="Ville" 
                value="{{ $annonce['ville'] ?? '' }}"
                required
            >

            <input 
                type="text" 
                name="adresse" 
                placeholder="Adresse complète" 
                value="{{ $annonce['adresse'] ?? '' }}"
                required
            >

            <input 
                type="file" 
                name="image" 
                accept="image/*"
                style="padding: 12px; cursor: pointer;"
            >
            
            <button type="submit">
                Mettre à jour
            </button>
        </form>
    </div>
</section>
@endsection
