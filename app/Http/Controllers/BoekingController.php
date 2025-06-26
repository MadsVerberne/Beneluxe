<?php

namespace App\Http\Controllers;

use App\Models\Boeken;

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
