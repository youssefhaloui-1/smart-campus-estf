<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'date_debut',
        'date_fin',
        'motif',
        'effectif_prevu',
        'statut',
        'niveau_priorite',
        'date_demande',
        'date_decision',
        'motif_refus',
        'user_id',
        'ressource_id',
        'admin_id',
        'reservation_remplacee_id',
    ];

    protected function casts(): array
    {
        return [
            'date_debut' => 'datetime',
            'date_fin' => 'datetime',
            'date_demande' => 'datetime',
            'date_decision' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function ressource()
    {
        return $this->belongsTo(Ressource::class);
    }

    public function reservationRemplacee()
    {
        return $this->belongsTo(Reservation::class, 'reservation_remplacee_id');
    }
}