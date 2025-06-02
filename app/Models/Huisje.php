<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huisje extends Model
{
    protected $table = 'huisjes';

    public function fotos()
    {
        return $this->hasMany(HuisjeFoto::class)->orderBy('volgorde');
    }
}
