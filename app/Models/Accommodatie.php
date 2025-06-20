<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class accommodatie extends Model
{
    protected $table = 'accommodaties';

    protected $fillable = [
        'gebruiker_id',
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

    public function gebruiker()
    {
        return $this->belongsTo(User::class, 'gebruiker_id');
    }

    public function beschikbaarheden()
    {
        return $this->hasMany(Beschikbaarheid::class);
    }

    public function boekingen()
    {
        return $this->hasMany(\App\Models\Boeken::class, 'accommodatie_id');
    }
}
