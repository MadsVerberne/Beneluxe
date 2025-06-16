<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boeken extends Model
{
    protected $fillable = ['gebruiker_id', 'accommodatie_id', 'van_datum', 'tot_datum', 'status', 'totaal_prijs'];

    public function accommodatie()
    {
        return $this->belongsTo(Accommodatie::class);
    }

    public function gebruiker()
    {
        return $this->belongsTo(User::class);
    }
}
