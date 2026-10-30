<?php

namespace App\Models;

class Annonce
{
    protected $table = 'annonces';
    public $timestamps = false;

    protected $fillable = [
        'titre',
        'description',
        'categorie',
        'type_annonce',
        'prix',
        'ville',
        'adresse',
        'image',
        'vendeur_id',
        'date_creation'
    ];

    // Relation: Une annonce appartient à un utilisateur
    public function vendeur()
    {
        return $this->belongsTo(User::class, 'vendeur_id', 'id');
    }

    // Relation: Une annonce peut avoir plusieurs réservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'annonce_id', 'id');
    }
}
