<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HuisjeFoto extends Model
{
    protected $table = 'huisjes_foto';

    public function huisje()
    {
        return $this->belongsTo(Huisje::class, 'huisje_id');
    }
}
