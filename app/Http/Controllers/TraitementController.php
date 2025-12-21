<?php

namespace App\Http\Controllers;

use App\Models\Traitement;
use App\Models\PriseTraitement;
use App\Models\User;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    /**
     * 👤 PATIENT : voir ses traitements avec leurs prises
     */
    public function index()
    {
        $traitements = Traitement::with('prises')
            ->where('patient_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('patient.traitements.index', compact('traitements'));
    }

    /**
     * 👤 PATIENT : marquer UNE prise comme prise
     */
    public function markPriseAsTaken($id)
    {
        $prise = PriseTraitement::findOrFail($id);

        // sécurité : vérifier que la prise appartient au patient connecté
        if ($prise->traitement->patient_id !== auth()->id()) {
            abort(403);
        }

        $prise->update([
            'pris' => true
        ]);

        return back()->with('success', 'Prise marquée comme prise.');
    }

    /**
     * 🧑‍⚕️ MEDECIN : formulaire ajout traitement
     */
    public function createByMedecin(User $patient)
    {
        if ($patient->role !== 'patient') {
            abort(403);
        }

        return view('medecin.traitements.create', compact('patient'));
    }

    /**
     * 🧑‍⚕️ MEDECIN : enregistrer traitement + prises
     */
    public function storeByMedecin(Request $request, User $patient)
    {
        if ($patient->role !== 'patient') {
            abort(403);
        }

        $request->validate([
            'nom_medicament' => 'required|string',
            'dosage'         => 'required|string',
            'fois_par_jour'  => 'required|integer|min:1|max:5',
            'duree_jours'    => 'required|integer|min:1|max:365',
            'heures'         => 'required|array|min:1',
            'heures.*'       => 'required|date_format:H:i',
            'important'      => 'nullable|boolean',
        ]);

        // 1️⃣ créer le traitement
        $traitement = Traitement::create([
            'patient_id'     => $patient->id,
            'medecin_id'     => auth()->id(),
            'nom_medicament' => $request->nom_medicament,
            'dosage'         => $request->dosage,
            'fois_par_jour'  => $request->fois_par_jour,
            'duree_jours'    => $request->duree_jours,
            'important'      => $request->has('important'),
        ]);

        // 2️⃣ créer les prises
        foreach ($request->heures as $heure) {
            PriseTraitement::create([
                'traitement_id' => $traitement->id,
                'heure'         => $heure,
                'pris'          => false,
            ]);
        }

        return redirect()
            ->route('medecin.rendez_vous.index')
            ->with('success', 'Traitement ajouté avec ses prises');
    }

    /**
     * 🧑‍⚕️ MEDECIN : voir les traitements qu’il a ajoutés
     */
    public function traitementsPatients()
    {
        $traitements = Traitement::with(['patient', 'prises'])
            ->where('medecin_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('medecin.traitements.index', compact('traitements'));
    }
}
