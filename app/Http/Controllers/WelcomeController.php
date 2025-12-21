<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
      public function rechercher(Request $request)
    {
        $specialite = $request->input('specialite');
        $adresse = $request->input('adresse');

        $query = DB::table('medecins');

        if ($specialite) {
            $query->where('specialite', $specialite);
        }

        if ($adresse) {
            $query->where('adresse', 'like', '%' . $adresse . '%');
        }

        $medecins = $query->get();

        // Vérifie si c'est une requête AJAX
        if ($request->ajax()) {
            return response()->json($medecins);
        }

        // Sinon, redirige vers la page avec les résultats
        return view('welcome', compact('medecins'));
    }
}
