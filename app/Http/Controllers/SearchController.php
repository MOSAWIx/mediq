<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
   public function search(Request $request)
    {
        // spécialité obligatoire
        if (!$request->specialite) {
            return response()->json([]);
        }

        $query = User::where('role', 'medecin')
            ->where('specialite', $request->specialite);

        // adresse FACULTATIVE + mot clé
        if ($request->filled('adresse')) {
            $query->where('adresse', 'LIKE', '%' . $request->adresse . '%');
        }

        $medecins = $query->get([
            'name',
            'specialite',
            'adresse',
            'telephone'
        ]);

        return response()->json($medecins);
    }

}
