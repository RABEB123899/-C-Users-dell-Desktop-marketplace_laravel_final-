<?php

namespace App\Http\Controllers;

class AnnoncesController
{
    /**
     * Afficher la liste de toutes les annonces avec filtrage
     */
    public function index()
    {
        $search = $_GET['search'] ?? '';
        $categorie = $_GET['categorie'] ?? '';
        $ville = $_GET['ville'] ?? '';

        // À implémenter: Requête avec Eloquent
        // $annonces = Annonce::query()
        //     ->when($search, fn($q) => $q->where('titre', 'like', "%$search%"))
        //     ->when($categorie, fn($q) => $q->where('categorie', $categorie))
        //     ->when($ville, fn($q) => $q->where('ville', 'like', "%$ville%"))
        //     ->paginate(12);

        return view('pages.services', [
            'annonces' => [],
            'search' => $search,
            'categorie' => $categorie,
            'ville' => $ville
        ]);
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('pages.ajouter-annonce');
    }

    /**
     * Stocker une nouvelle annonce
     */
    public function store()
    {
        // Validation des données
        $titre = $_POST['titre'] ?? '';
        $description = $_POST['description'] ?? '';
        $categorie = $_POST['categorie'] ?? '';
        $type_annonce = $_POST['type_annonce'] ?? '';
        $prix = $_POST['prix'] ?? '';
        $ville = $_POST['ville'] ?? '';
        $adresse = $_POST['adresse'] ?? '';

        // Gestion de l'upload d'image
        $image = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $timestamp = time();
            $image = $timestamp . '_' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], public_path('uploads/' . $image));
        }

        // À implémenter: Création avec Eloquent
        // Annonce::create([
        //     'titre' => $titre,
        //     'description' => $description,
        //     'categorie' => $categorie,
        //     'type_annonce' => $type_annonce,
        //     'prix' => $prix,
        //     'ville' => $ville,
        //     'adresse' => $adresse,
        //     'image' => $image,
        //     'vendeur_id' => auth()->id(),
        // ]);

        return redirect('/services')->with('message', 'Annonce créée avec succès!');
    }

    /**
     * Afficher une annonce spécifique
     */
    public function show($id)
    {
        // À implémenter: Récupérer l'annonce avec Eloquent
        // $annonce = Annonce::findOrFail($id);

        return view('pages.annonce-detail', ['annonce' => null]);
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit($id)
    {
        // À implémenter: Récupérer l'annonce avec Eloquent
        // $annonce = Annonce::findOrFail($id);
        // $this->authorize('update', $annonce);

        return view('pages.modifier-annonce', ['annonce' => null]);
    }

    /**
     * Mettre à jour une annonce
     */
    public function update($id)
    {
        // À implémenter: Validation et mise à jour
        // $annonce = Annonce::findOrFail($id);
        // $this->authorize('update', $annonce);
        // $annonce->update($request->validated());

        return redirect('/services')->with('message', 'Annonce mise à jour!');
    }

    /**
     * Supprimer une annonce
     */
    public function destroy($id)
    {
        // À implémenter: Suppression
        // $annonce = Annonce::findOrFail($id);
        // $this->authorize('delete', $annonce);
        // $annonce->delete();

        return redirect('/services')->with('message', 'Annonce supprimée!');
    }
}
