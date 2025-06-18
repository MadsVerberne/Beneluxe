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
        $accommodatie = Accommodatie::with('beschikbaarheden')->findOrFail($accommodatieId);

        $gegroepeerdeBeschikbaarheden = $this->groepeerBeschikbaarheden($accommodatie->beschikbaarheden);

        return view('accommodaties.boeken', [
            'accommodatie' => $accommodatie,
            'beschikbaarheden' => $gegroepeerdeBeschikbaarheden,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'accommodatie_id' => 'required|exists:accommodaties,id',
            'van_datum' => 'required|date',
            'tot_datum' => 'required|date|after:van_datum',
        ]);

        $boeking = Boeken::create([
            'gebruiker_id' => Auth::id(),
            'accommodatie_id' => $request->accommodatie_id,
            'van_datum' => $request->van_datum,
            'tot_datum' => $request->tot_datum,
            'status' => 'in_behandeling',
            'totaal_prijs' => 0, // Optioneel: bereken dit op basis van tarief
        ]);

        return redirect()->route('boekingen.show', $boeking->id);
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
