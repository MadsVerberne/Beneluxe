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

    public function huisje()
    {
        return $this->belongsTo(Huisje::class, 'huisje_id');
    }
}
