<?php

namespace App\Http\Controllers;

use App\Models\Huisje;
use Illuminate\Http\Request;

class HuisjeController extends Controller
{
    // Overzicht van alle huisjes
    public function index()
    {
        $huisjes = Huisje::all();
        return view('huisjes.index', compact('huisjes'));
    }

    // Detailpagina van één huisje
    public function show(Huisje $huisje)
    {
        return view('huisjes.show', compact('huisje'));
    }
}
