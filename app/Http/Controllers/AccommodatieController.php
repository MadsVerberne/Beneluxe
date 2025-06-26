<?php

namespace App\Http\Controllers;

use App\Models\accommodatie;
use App\Models\Beschikbaarheid;
use App\Models\Voorzieningen;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AccommodatieController extends Controller
{
    use AuthorizesRequests;
    // Overzicht van alle accommodaties
    public function index()
    {
        $accommodatiesNederland = Accommodatie::where('locatie', 'like', '%, Nederland')->get();
        $accommodatiesBelgie = Accommodatie::where('locatie', 'like', '%, België')->get();
        $accommodatiesLuxemburg = Accommodatie::where('locatie', 'like', '%, Luxemburg')->get();

        return view('accommodaties.index', compact('accommodatiesNederland', 'accommodatiesBelgie', 'accommodatiesLuxemburg'));
    }

    // Detailpagina van één accommodatie

    public function show($id)
    {
        $accommodatie = Accommodatie::with(['fotos', 'voorzieningen'])->findOrFail($id);
        $suggesties = Accommodatie::where('id', '!=', $id)->inRandomOrder()->take(5)->get();

        // Ophalen van query parameters
        $incheck = request('incheck_datum');
        $uitcheck = request('uitcheck_datum');

        if ($incheck && $uitcheck) {
            try {
                $in = Carbon::parse($incheck);
                $uit = Carbon::parse($uitcheck);
                $aantalNachten = max($in->diffInDays($uit), 1);
            } catch (\Exception $e) {
                $aantalNachten = 7;
            }
        } else {
            $aantalNachten = 7;
        }

        // Prijsberekening
        $prijsPerNacht = $accommodatie->prijs_per_nacht;
        $schoonmaakKosten = 150;
        $serviceKosten = 270;

        $subtotaal = $prijsPerNacht * $aantalNachten;
        $totaal = $subtotaal + $schoonmaakKosten + $serviceKosten;

        return view('accommodaties.show', compact(
            'accommodatie',
            'suggesties',
            'aantalNachten',
            'subtotaal',
            'totaal'
        ));
    }



    // Formulier om nieuw accommodatie aan te maken
    public function create()
    {
        $voorzieningen = Voorzieningen::all();
        return view('accommodaties.create', compact('voorzieningen'));
    }

    // accommodatie opslaan
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
            'fotos.*' => 'nullable|image|max:5120', // max 5MB per foto
            'foto_volgorde' => 'nullable|string', // volgorde als CSV
        ]);

        $accommodatie = accommodatie::create([
            'gebruiker_id' => Auth::id(),
            'titel' => $validated['titel'],
            'beschrijving' => $validated['beschrijving'],
            'locatie' => $validated['locatie'],
            'aantal_bedden' => $validated['aantal_bedden'],
            'aantal_badkamers' => $validated['aantal_badkamers'],
            'aantal_personen' => $validated['aantal_personen'],
            'prijs_per_nacht' => $validated['prijs_per_nacht'],
        ]);

        $accommodatie->voorzieningen()->sync($validated['voorzieningen'] ?? []);

        // Foto's opslaan met aangepaste volgorde
        if ($request->hasFile('fotos')) {
            $order = explode(',', $request->input('foto_volgorde', ''));
            $files = $request->file('fotos');

            foreach ($order as $volgorde => $index) {
                if (!isset($files[$index])) {
                    continue; // Skip als index niet bestaat
                }

                $file = $files[$index];
                $path = $file->store('accommodaties', 'public');

                $accommodatie->fotos()->create([
                    'foto_url' => $path,
                    'volgorde' => $volgorde,
                ]);
            }
        }

        return redirect()->route('accommodaties.index')->with('success', 'accommodatie succesvol aangemaakt!');
    }

    // Formulier om een bestaand accommodatie te bewerken
    public function edit(Accommodatie $accommodatie)
    {
        $this->authorize('update', $accommodatie);

        $voorzieningen = Voorzieningen::all();
        return view('accommodaties.edit', compact('accommodatie', 'voorzieningen'));
    }

    // accommodatie bijwerken
    public function update(Request $request, Accommodatie $accommodatie)
    {
        $this->authorize('update', $accommodatie);

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
            'fotos.*' => 'nullable|image|max:5120', // max 5MB per foto
            'verwijder_fotos' => 'array',
            'verwijder_fotos.*' => 'integer|exists:accommodaties_foto,id',
            'foto_volgorde' => 'nullable|string', // optioneel als je wilt aanpassen
        ]);

        $accommodatie->update([
            'titel' => $validated['titel'],
            'beschrijving' => $validated['beschrijving'],
            'locatie' => $validated['locatie'],
            'aantal_bedden' => $validated['aantal_bedden'],
            'aantal_badkamers' => $validated['aantal_badkamers'],
            'aantal_personen' => $validated['aantal_personen'],
            'prijs_per_nacht' => $validated['prijs_per_nacht'],
        ]);

        $accommodatie->voorzieningen()->sync($validated['voorzieningen'] ?? []);

        // Foto's verwijderen
        if (!empty($validated['verwijder_fotos'])) {
            foreach ($validated['verwijder_fotos'] as $fotoId) {
                $foto = $accommodatie->fotos()->find($fotoId);
                if ($foto) {
                    storage::disk('public')->delete($foto->foto_url);
                    $foto->delete();
                }
            }
        }

        // Nieuwe foto's uploaden
        if ($request->hasFile('fotos')) {
            // Bepaal maximale volgorde om op te bouwen
            $maxVolgorde = $accommodatie->fotos()->max('volgorde') ?? 0;

            $files = $request->file('fotos');
            $order = explode(',', $request->input('foto_volgorde', ''));

            foreach ($order as $key => $index) {
                if (!isset($files[$index])) {
                    continue;
                }

                $file = $files[$index];
                $path = $file->store('accommodaties', 'public');

                $accommodatie->fotos()->create([
                    'foto_url' => $path,
                    'volgorde' => $maxVolgorde + $key + 1,
                ]);
            }
        }

        // Verwijder aangekruiste foto's
        if ($request->filled('verwijder_fotos')) {
            foreach ($request->input('verwijder_fotos') as $fotoId) {
                $foto = $accommodatie->fotos()->find($fotoId);
                if ($foto) {
                    Storage::disk('public')->delete($foto->foto_url);
                    $foto->delete();
                }
            }
        }

        // Volgorde van bestaande foto's bijwerken
        if ($request->filled('bestaande_foto_volgorde')) {
            $ids = explode(',', $request->input('bestaande_foto_volgorde'));
            foreach ($ids as $volgorde => $id) {
                $foto = $accommodatie->fotos()->find($id);
                if ($foto) {
                    $foto->update(['volgorde' => $volgorde]);
                }
            }
        }


        return redirect()->route('accommodaties.index')->with('success', 'accommodatie succesvol bijgewerkt!');
    }

    public function destroy(Accommodatie $accommodatie)
    {
        $this->authorize('delete', $accommodatie);

        // Foto's verwijderen uit storage en database
        foreach ($accommodatie->fotos as $foto) {
            Storage::disk('public')->delete($foto->foto_url);
            $foto->delete();
        }

        // Relaties opruimen
        $accommodatie->voorzieningen()->detach();
        $accommodatie->beschikbaarheden()->delete();

        // Verwijder de accommodatie zelf
        $accommodatie->delete();

        return redirect()->route('accommodaties.index')->with('success', 'Accommodatie succesvol verwijderd.');
    }

    public function beschikbaarheidToevoegen(Request $request, Accommodatie $accommodatie)
    {
        $request->validate([
            'van_datum' => ['required', 'date', 'before_or_equal:tot_datum'],
            'tot_datum' => ['required', 'date', 'after_or_equal:van_datum'],
        ]);

        // Controleer op overlapping met bestaande periodes
        $overlap = $accommodatie->beschikbaarheden()
            ->where(function ($query) use ($request) {
                $query->where('van_datum', '<=', $request->input('tot_datum'))
                    ->where('tot_datum', '>', $request->input('van_datum'));
            })
            ->exists();

        if ($overlap) {
            return back()
                ->withErrors(['Deze periode overlapt met een bestaande beschikbaarheid.'])
                ->withInput();
        }

        $accommodatie->beschikbaarheden()->create([
            'van_datum' => $request->input('van_datum'),
            'tot_datum' => $request->input('tot_datum'),
        ]);

        return back()->with('success', 'Beschikbaarheidsperiode toegevoegd.');
    }


    public function beschikbaarheidVerwijderen($id)
    {
        $periode = Beschikbaarheid::findOrFail($id);
        $periode->delete();

        return back()->with('success', 'Periode verwijderd.');
    }

    public function zoek(Request $request)
    {
        $locatie = $request->input('locatie');
        $incheck = $request->input('incheck_datum');
        $uitcheck = $request->input('uitcheck_datum');
        $gasten = $request->input('gasten');

        $query = Accommodatie::query();

        if ($locatie) {
            $query->where('locatie', 'like', "%$locatie%");
        }

        if ($gasten) {
            $query->where('aantal_personen', '>=', $gasten);
        }

        if ($incheck && $uitcheck) {
            $query->whereHas('beschikbaarheden', function ($q) use ($incheck, $uitcheck) {
                $q->where('van_datum', '<=', $incheck)
                    ->where('tot_datum', '>=', $uitcheck);
            });
        }

        $accommodaties = $query->get();

        return view('accommodaties.results', [
            'accommodaties' => $accommodaties,
            'locatie' => $locatie,
            'incheck' => $incheck,
            'uitcheck' => $uitcheck,
            'gasten' => $gasten,
        ]);
    }
}