<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccommodatieFoto extends Model
{
    protected $table = 'accommodaties_foto';

    protected $fillable = [
        'foto_url',
        'volgorde',
        'huisje_id',
    ];

    public function accommodatie()
    {
        return $this->belongsTo(accommodatie::class, 'accommodatie_id');
    }
}
