<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class accommodatie extends Model
{
    protected $table = 'accommodaties';

    protected $fillable = [
        'titel',
        'beschrijving',
        'locatie',
        'aantal_bedden',
        'aantal_badkamers',
        'aantal_personen',
        'prijs_per_nacht',
    ];

    public function fotos()
    {
        return $this->hasMany(AccommodatieFoto::class, 'accommodatie_id')->orderBy('volgorde');
    }

    public function voorzieningen()
    {
        return $this->belongsToMany(Voorzieningen::class, 'accommodaties_voorziening', 'accommodatie_id', 'voorziening_id');
    }
}
