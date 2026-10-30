<?php

namespace App\Models;

class Reservation
{
    protected $table = 'reservations';
    public $timestamps = false;

    protected $fillable = [
        'annonce_id',
        'acheteur_id',
        'date_debut',
        'date_fin',
        'nombre_jours',
        'statut',
        'date_reservation'
    ];

    // Relation: Une réservation appartient à une annonce
    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'annonce_id', 'id');
    }

    // Relation: Une réservation appartient à un acheteur
    public function acheteur()
    {
        return $this->belongsTo(User::class, 'acheteur_id', 'id');
    }
}
