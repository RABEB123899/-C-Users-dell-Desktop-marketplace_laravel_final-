<?php

namespace App\Http\Controllers;

class ReservationsController
{
    /**
     * Afficher les réservations de l'utilisateur
     */
    public function index()
    {
        // À implémenter: Récupérer les réservations de l'utilisateur
        // $reservations = auth()->user()->reservations()
        //     ->with('annonce')
        //     ->paginate(10);

        return view('pages.mes-reservations', ['reservations' => []]);
    }

    /**
     * Afficher le formulaire de réservation
     */
    public function create($annonce_id)
    {
        // À implémenter: Récupérer l'annonce
        // $annonce = Annonce::findOrFail($annonce_id);

        return view('pages.reserver', ['annonce' => null]);
    }

    /**
     * Stocker une nouvelle réservation
     */
    public function store($annonce_id)
    {
        // Validation des données
        $date_debut = $_POST['date_debut'] ?? '';
        $date_fin = $_POST['date_fin'] ?? '';

        // Calcul du nombre de jours
        $debut = new \DateTime($date_debut);
        $fin = new \DateTime($date_fin);
        $nombre_jours = $fin->diff($debut)->days;

        // À implémenter: Création de la réservation
        // $reservation = Reservation::create([
        //     'annonce_id' => $annonce_id,
        //     'acheteur_id' => auth()->id(),
        //     'date_debut' => $date_debut,
        //     'date_fin' => $date_fin,
        //     'nombre_jours' => $nombre_jours,
        //     'statut' => 'en attente'
        // ]);

        return redirect('/reservations')->with('message', 'Réservation créée!');
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit($id)
    {
        // À implémenter: Récupérer la réservation
        // $reservation = Reservation::findOrFail($id);
        // $this->authorize('update', $reservation);

        return view('pages.modifier-reservation', ['reservation' => null]);
    }

    /**
     * Mettre à jour une réservation
     */
    public function update($id)
    {
        // À implémenter: Validation et mise à jour
        // $reservation = Reservation::findOrFail($id);
        // $this->authorize('update', $reservation);

        return redirect('/reservations')->with('message', 'Réservation mise à jour!');
    }

    /**
     * Supprimer une réservation
     */
    public function destroy($id)
    {
        // À implémenter: Suppression
        // $reservation = Reservation::findOrFail($id);
        // $this->authorize('delete', $reservation);
        // $reservation->delete();

        return redirect('/reservations')->with('message', 'Réservation supprimée!');
    }
}
