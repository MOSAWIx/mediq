<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriseTraitement;

class PriseController extends Controller
{
    public function markAsTaken(PriseTraitement $prise)
    {
        // sécurité : le patient ne peut modifier que ses prises
        if ($prise->traitement->patient_id !== auth()->id()) {
            abort(403);
        }

        $prise->update([
            'pris' => true,
        ]);

        return back()->with('success', 'Prise marquée comme prise');
    }
}
