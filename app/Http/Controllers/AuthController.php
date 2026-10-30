<?php

namespace App\Http\Controllers;

class AuthController
{
    /**
     * Afficher la page de connexion
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Traiter la connexion
     */
    public function login()
    {
        $email = $_POST['email'] ?? '';
        $mot_de_passe = $_POST['mot_de_passe'] ?? '';

        // Connexion à la base de données (à implémenter avec Laravel)
        // Vérifier les identifiants
        // Créer une session

        session_start();
        $_SESSION['user_id'] = 1; // Exemple
        $_SESSION['nom'] = 'Utilisateur';

        return redirect('/');
    }

    /**
     * Afficher la page d'inscription
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Traiter l'inscription
     */
    public function register()
    {
        $nom = $_POST['nom'] ?? '';
        $email = $_POST['email'] ?? '';
        $mot_de_passe = $_POST['mot_de_passe'] ?? '';
        $type_utilisateur = $_POST['type_utilisateur'] ?? 'acheteur';

        // Validation et création d'utilisateur
        // Hash du mot de passe
        // Insérer en base de données

        return redirect('/auth/login');
    }

    /**
     * Déconnexion
     */
    public function logout()
    {
        session_start();
        session_destroy();
        return redirect('/');
    }
}
