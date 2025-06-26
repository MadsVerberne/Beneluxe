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

        $accommodatie = Accommodatie::findOrFail($request->accommodatie_id);

        $van = Carbon::parse($request->van_datum);
        $tot = Carbon::parse($request->tot_datum);

        $nachten = $van->diffInDays($tot);

        $overlap = Boeken::where('accommodatie_id', $accommodatie->id)
            ->where(function ($query) use ($van, $tot) {
                $query->where('van_datum', '<', $tot)
                    ->where('tot_datum', '>', $van);
            })
            ->exists();

        if ($overlap) {
            return back()->withErrors([
                'van_datum' => 'De geselecteerde periode overlapt met een bestaande boeking.',
            ])->withInput();
        }

        $totaalPrijs = $nachten * $accommodatie->prijs_per_nacht;

        Boeken::create([
            'gebruiker_id' => Auth::id(),
            'accommodatie_id' => $accommodatie->id,
            'van_datum' => $van,
            'tot_datum' => $tot, // ✅ correcte exclusieve datum
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

            if ($laatste['end'] === $start) {
                $laatste['end'] = $end;
            } else {
                $gegroepeerd[] = ['start' => $start, 'end' => $end];
            }
        }

        return collect($gegroepeerd)->map(function ($periode) {
            return [
                'title' => 'Beschikbaar',
                'start' => $periode['start'],
                'end' => $periode['end'],
            ];
        });
    }
}

class BoekingController extends Controller
{
    public function destroy($id)
    {
        $boeking = Boeken::findOrFail($id);

        // Alleen de eigenaar mag annuleren
        if (auth()->id() !== $boeking->gebruiker_id) {
            abort(403, 'Je mag deze boeking niet annuleren.');
        }

        $boeking->delete();

        return redirect()->back()->with('success', 'Boeking succesvol geannuleerd.');
    }
}