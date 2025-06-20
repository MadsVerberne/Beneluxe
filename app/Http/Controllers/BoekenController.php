<?php

namespace App\Http\Controllers;

use App\Models\Accommodatie;
use App\Models\Boeken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BoekenController extends Controller
{
    public function create($accommodatieId)
    {
        $accommodatie = Accommodatie::with(['beschikbaarheden', 'boekingen'])->findOrFail($accommodatieId);

        $gegroepeerdeBeschikbaarheden = $this->groepeerBeschikbaarheden($accommodatie->beschikbaarheden);

        // Haal boekingen op en formatteer ze voor de kalender
        $boekingen = $accommodatie->boekingen->map(function ($boeking) {
            return [
                'start' => $boeking->van_datum,
                'end' => Carbon::parse($boeking->tot_datum)->addDay()->format('Y-m-d'),
            ];
        });

        return view('accommodaties.boeken', [
            'accommodatie' => $accommodatie,
            'beschikbaarheden' => $gegroepeerdeBeschikbaarheden,
            'boekingen' => $boekingen,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'accommodatie_id' => 'required|exists:accommodaties,id',
            'van_datum' => 'required|date',
            'tot_datum' => 'required|date|after:van_datum',
        ]);

        // Stap 1: Haal de accommodatie op
        $accommodatie = Accommodatie::findOrFail($request->accommodatie_id);

        // Stap 2: Bereken het aantal nachten
        $van = Carbon::parse($request->van_datum);
        $tot = Carbon::parse($request->tot_datum);
        $nachten = $van->diffInDays($tot) + 1;

        // Stap 3: Bereken totaalprijs
        $totaalPrijs = $nachten * $accommodatie->prijs_per_nacht;

        // Stap 4: Boek de accommodatie
        Boeken::create([
            'gebruiker_id' => Auth::id(),
            'accommodatie_id' => $request->accommodatie_id,
            'van_datum' => $van,
            'tot_datum' => $tot,
            'totaal_prijs' => $totaalPrijs,
        ]);

        return redirect()->route('dashboard')->with('success', 'Boeking succesvol aangemaakt.');
    }

    /**
     * Groepeert opeenvolgende beschikbaarheden tot één doorlopende periode.
     *
     * @param \Illuminate\Support\Collection $periodes
     * @return \Illuminate\Support\Collection
     */
    private function groepeerBeschikbaarheden($periodes)
    {
        $gesorteerd = $periodes->sortBy('van_datum')->values();
        $gegroepeerd = [];

        foreach ($gesorteerd as $periode) {
            $start = $periode->van_datum;
            $end = Carbon::parse($periode->tot_datum)->addDay()->format('Y-m-d');

            if (empty($gegroepeerd)) {
                $gegroepeerd[] = ['start' => $start, 'end' => $end];
                continue;
            }

            $laatste = &$gegroepeerd[count($gegroepeerd) - 1];

            // Als de nieuwe startdatum gelijk is aan de vorige einddatum, voeg ze samen
            if ($laatste['end'] === $start) {
                $laatste['end'] = $end;
            } else {
                $gegroepeerd[] = ['start' => $start, 'end' => $end];
            }
        }

        // Voeg 'title' toe om compatibel te blijven met FullCalendar
        return collect($gegroepeerd)->map(function ($periode) {
            return [
                'title' => 'Beschikbaar',
                'start' => $periode['start'],
                'end' => $periode['end'],
            ];
        });
    }
}
