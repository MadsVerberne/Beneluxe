<?php

namespace App\Http\Controllers;

use App\Models\Huisje;
use App\Models\Voorzieningen;
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
        $voorzieningen = Voorzieningen::all();
        return view('huisjes.show', compact('huisje', 'voorzieningen'));
    }

    public function create()
    {
        $voorzieningen = Voorzieningen::all();
        return view('huisjes.create', compact('voorzieningen'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => 'required|string|max:255',
            'beschrijving' => 'required|string',
            'locatie' => 'required|string|max:255',
            'aantal_bedden' => 'required|integer|min:0',
            'aantal_badkamers' => 'required|integer|min:0',
            'aantal_personen' => 'required|integer|min:1',
            'prijs_per_nacht' => 'required|numeric|min:0',
            'voorzieningen' => 'array',
            'voorzieningen.*' => 'exists:voorzieningen,id',
        ]);

        $huisje = Huisje::create([
            'titel' => $validated['titel'],
            'beschrijving' => $validated['beschrijving'],
            'locatie' => $validated['locatie'],
            'aantal_bedden' => $validated['aantal_bedden'],
            'aantal_badkamers' => $validated['aantal_badkamers'],
            'aantal_personen' => $validated['aantal_personen'],
            'prijs_per_nacht' => $validated['prijs_per_nacht'],
        ]);

        // Voorzieningen koppelen via pivot table
        $huisje->voorzieningen()->sync($validated['voorzieningen'] ?? []);

        return redirect()->route('huisjes.index')->with('success', 'Huisje succesvol aangemaakt!');
    }
}
