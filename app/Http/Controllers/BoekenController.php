<?php

namespace App\Http\Controllers;

use App\Models\accommodatie;
use App\Models\Boeken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoekenController extends Controller
{
    public function create($accommodatieId)
    {
        $accommodatie = Accommodatie::with('beschikbaarheden')->findOrFail($accommodatieId);
        $beschikbaarheden = $accommodatie->beschikbaarheden->map(function ($periode) {
            return [
                'title' => 'Beschikbaar',
                'start' => $periode->van_datum,
                'end' => \Carbon\Carbon::parse($periode->tot_datum)->addDay()->format('Y-m-d'),
            ];
        });

        return view('accommodaties.boeken', compact('accommodatie', 'beschikbaarheden'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'accommodatie_id' => 'required|exists:accommodaties,id',
            'van_datum' => 'required|date',
            'tot_datum' => 'required|date|after:van_datum',
        ]);

        $boeking = Boeken::create([
            'gebruiker_id' => Auth::id(), // ingelogde user
            'accommodatie_id' => $request->accommodatie_id,
            'van_datum' => $request->van_datum,
            'tot_datum' => $request->tot_datum,
            'status' => 'in_behandeling',
            'totaal_prijs' => 0, // op basis van tarief
        ]);

        return redirect()->route('boekingen.show', $boeking->id);
    }
}
