<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    protected $fillable = [
        'nom_ressource',
        'type',
        'capacite',
        'localisation',
        'statut_actif',
    ];

    protected function casts(): array
    {
        return [
            'statut_actif' => 'boolean',
        ];
    }

    public function equipements()
    {
        return $this->belongsToMany(Equipement::class, 'ressource_equipement')
            ->withPivot('quantite');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}