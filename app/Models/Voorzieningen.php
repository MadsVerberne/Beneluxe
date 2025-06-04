<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voorzieningen extends Model
{
    protected $table = 'voorzieningen';

    public function huisjes()
    {
        return $this->belongsToMany(Huisje::class);
    }
}
