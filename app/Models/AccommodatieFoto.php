<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HuisjeFoto extends Model
{
    protected $table = 'huisjes_foto';

    protected $fillable = [
        'foto_url',
        'volgorde',
        'huisje_id',
    ];

    public function accommodatie()
    {
        return $this->belongsTo(accommodatie::class, 'huisje_id');
    }
}
