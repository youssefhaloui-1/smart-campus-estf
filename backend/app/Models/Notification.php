<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'message',
        'type',
        'date_envoi',
        'est_lue',
        'user_id',
        'reservation_id',
    ];

    protected function casts(): array
    {
        return [
            'date_envoi' => 'datetime',
            'est_lue' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}