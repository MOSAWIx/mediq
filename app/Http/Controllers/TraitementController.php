<?php

namespace App\Http\Controllers;

use App\Models\Traitement;
use App\Models\User;
use Illuminate\Http\Request;

class TraitementController extends Controller
{
    /**
     * 👤 PATIENT : يشوف traitements ديالو فقط
     */
    public function index()
    {
        $traitements = Traitement::where('patient_id', auth()->id())
            ->orderBy('heure_prise')
            ->get();

        return view('patient.traitements.index', compact('traitements'));
    }

    /**
     * 👤 PATIENT : يعلّم Pris / Non pris
     */
    public function markAsTaken($id)
    {
        $traitement = Traitement::findOrFail($id);

        if ($traitement->patient_id !== auth()->id()) {
            abort(403);
        }

        $traitement->update([
            'pris' => true
        ]);

        return back()->with('success', 'Traitement marqué comme pris.');
    }

    /**
     * 🧑‍⚕️ MEDECIN : formulaire ajout traitement لمريض
     */
    public function createByMedecin(User $patient)
    {
        if ($patient->role !== 'patient') {
            abort(403);
        }

        return view('medecin.traitements.create', compact('patient'));
    }

    /**
     * 🧑‍⚕️ MEDECIN : enregistrer traitement
     */
    public function storeByMedecin(Request $request, User $patient)
    {
        if ($patient->role !== 'patient') {
            abort(403);
        }

        $request->validate([
            'nom_medicament' => 'required|string',
            'dosage' => 'required|string',
            'heure_prise' => 'required',
            'important' => 'nullable|boolean',
        ]);

        Traitement::create([
            'patient_id'     => $patient->id,
            'medecin_id'     => auth()->id(),
            'nom_medicament' => $request->nom_medicament,
            'dosage'         => $request->dosage,
            'heure_prise'    => $request->heure_prise,
            'important'      => $request->has('important'),
            'pris'           => false,
        ]);

        return redirect()
            ->route('medecin.rendez_vous.index')
            ->with('success', 'Traitement ajouté au patient');
    }
    public function traitementsPatients()
    {
        $traitements = Traitement::with('patient')
            ->where('medecin_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('medecin.traitements.index', compact('traitements'));
    }
}
