<?php

namespace App\Http\Controllers;

class PagesController
{
    /**
     * Afficher la page d'accueil
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Afficher la page contact
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Traiter le formulaire de contact
     */
    public function sendContact()
    {
        $nom = $_POST['nom'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        // À implémenter: Envoyer l'email
        // Mail::to('contact@marketplace.com')
        //     ->send(new ContactMail($nom, $email, $message));

        return redirect('/contact')->with('message', 'Message envoyé avec succès!');
    }

    /**
     * Afficher le dashboard du vendeur
     */
    public function vendorDashboard()
    {
        // À implémenter: Récupérer les annonces du vendeur
        // $annonces = auth()->user()->annonces()->paginate(10);
        // $reservations = auth()->user()->annonces()
        //     ->with('reservations')
        //     ->get()
        //     ->pluck('reservations')
        //     ->flatten();

        return view('pages.vendeur-dashboard', [
            'annonces' => [],
            'reservations' => []
        ]);
    }
}
