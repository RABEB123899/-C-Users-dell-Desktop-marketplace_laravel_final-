<?php

namespace App\Models;

class User
{
    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe',
        'type_utilisateur'
    ];

    protected $hidden = [
        'mot_de_passe'
    ];

    // Relation: Un utilisateur peut avoir plusieurs annonces
    public function annonces()
    {
        return $this->hasMany(Annonce::class, 'vendeur_id', 'id');
    }

    // Relation: Un utilisateur peut avoir plusieurs réservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'acheteur_id', 'id');
    }
}
