<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    protected $fillable = [
        'nom_equipement',
    ];

    public function ressources()
    {
        return $this->belongsToMany(Ressource::class, 'ressource_equipement')
            ->withPivot('quantite');
    }
}