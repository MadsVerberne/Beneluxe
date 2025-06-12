<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beschikbaarheid extends Model
{
    protected $table = 'accommodatie_beschikbaarheid';

    protected $fillable = [
        'accommodatie_id',
        'van_datum',
        'tot_datum'
    ];

    public function accommodatie()
    {
        return $this->belongsTo(Accommodatie::class);
    }
}
