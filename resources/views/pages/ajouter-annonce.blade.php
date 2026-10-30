@extends('layouts.app')

@section('title', 'Ajouter une annonce - Marketplace')

@section('content')
<section class="services-section" style="padding-top: 150px; min-height: 100vh;">
    <div class="section-title">
        <h1>Créer une nouvelle annonce</h1>
        <p>Publiez votre produit ou service</p>
    </div>

    <div style="max-width: 700px; margin: 0 auto;">
        <form class="contact-form" method="POST" action="{{ route('annonces.store') }}" enctype="multipart/form-data">
            @csrf
            
            <input 
                type="text" 
                name="titre" 
                placeholder="Titre de l'annonce" 
                required
            >
            
            <textarea 
                name="description" 
                placeholder="Description détaillée..." 
                required
                style="min-height: 120px;"
            ></textarea>
            
            <select name="categorie" required>
                <option value="">Sélectionner une catégorie</option>
                <option value="Makeup">Makeup</option>
                <option value="Ordinateurs">Ordinateurs</option>
                <option value="Téléphones">Téléphones</option>
                <option value="Maison">Maison</option>
                <option value="Photographie">Photographie</option>
                <option value="Jardinage">Jardinage</option>
                <option value="Livraison">Livraison</option>
                <option value="Réparation">Réparation</option>
            </select>

            <select name="type_annonce" required>
                <option value="">Type d'annonce</option>
                <option value="Vente">Vente</option>
                <option value="Location">Location</option>
                <option value="Service">Service</option>
            </select>
            
            <input 
                type="number" 
                name="prix" 
                placeholder="Prix (DT)" 
                required
                step="0.01"
            >
            
            <input 
                type="text" 
                name="ville" 
                placeholder="Ville" 
                required
            >

            <input 
                type="text" 
                name="adresse" 
                placeholder="Adresse complète" 
                required
            >

            <input 
                type="file" 
                name="image" 
                accept="image/*"
                style="padding: 12px; cursor: pointer;"
            >
            
            <button type="submit">
                Publier l'annonce
            </button>
        </form>
    </div>
</section>
@endsection
