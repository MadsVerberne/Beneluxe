<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class accommodatie extends Model
{
    protected $table = 'huisjes';

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
        return $this->hasMany(HuisjeFoto::class, 'huisje_id')->orderBy('volgorde');
    }

    public function voorzieningen()
    {
        return $this->belongsToMany(Voorzieningen::class, 'huisje_voorziening', 'huisje_id', 'voorziening_id');
    }
}
