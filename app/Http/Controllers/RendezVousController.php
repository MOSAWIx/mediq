<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RendezVous;
use App\Models\User;
use App\Models\Traitement;

class RendezVousController extends Controller
{
    /**
     * 📌 Page patient : recherche + liste rendez-vous
     */
    public function indexPatient(Request $request)
    {
        // Récupérer la recherche
        $search = $request->input('search');

        // Récupérer les médecins avec filtrage
        $medecins = User::where('role', 'medecin')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('specialite', 'LIKE', '%' . $search . '%')
                        ->orWhere('adresse', 'LIKE', '%' . $search . '%'); // <-- adresse correct
                });
            })
            ->get();

        // Rendez-vous du patient connecté
        $rendezVous = auth()->user()->rendezVousPatient;

        return view('patient.rendez_vous', compact('rendezVous', 'medecins', 'search'));
    }
    public function edit($id)
    {
        $rdv = RendezVous::where('id', $id)
            ->where('patient_id', auth()->id()) // sécurité
            ->firstOrFail();

        return view('patient.edit_rendez_vous', compact('rdv'));
    }

    public function update(Request $request, $id)
    {
        $rdv = RendezVous::where('id', $id)
            ->where('patient_id', auth()->id())
            ->firstOrFaila();

        $request->validate([
            'date_heure' => 'required|date|after:now',
        ]);

        $rdv->update([
            'date_heure' => $request->date_heure,
        ]);

        return redirect()
            ->route('patient.rendez_vous.index')
            ->with('success', 'Rendez-vous modifié avec succès !');
    }


    public function destroy($id)
    {
        $rdv = RendezVous::where('id', $id)
            ->where('patient_id', auth()->id()) // sécurité
            ->firstOrFail();

        $rdv->delete();

        return redirect()->back()->with('success', 'Rendez-vous annulé avec succès.');
    }

    /**
     * 📌 Page médecin : liste des rendez-vous
     */
    public function indexMedecin()
    {
        $rendezVous = RendezVous::with('patient.patient')
            ->where('medecin_id', auth()->id())
            ->get();

        return view('medecin.rendez_vous', compact('rendezVous'));
    }

    // Traitements des patients (pour médecin)
    public function traitementsPatients()
    {
        $traitements = Traitement::with(['patient'])
            ->where('medecin_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('medecin.traitements.index', compact('traitements'));
    }

    /**
     * 📌 Enregistrer un rendez-vous
     */
    public function store(Request $request)
    {
        $request->validate([
            'medecin_id' => 'required|exists:users,id',
            'date_heure' => 'required|date|after:now',
        ]);

        RendezVous::create([
            'patient_id' => auth()->id(),
            'medecin_id' => $request->medecin_id,
            'date_heure' => $request->date_heure,
        ]);

        return redirect()->back()->with('success', 'Rendez-vous demandé !');
    }

    /**
     * 📌 AUTO-SUGGESTION AJAX (recherche instantanée)
     */
    public function search(Request $request)
    {
        $search = $request->query('q');

        $medecins = User::where('role', 'medecin')
            ->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                    ->orWhere('specialite', 'LIKE', "%$search%")
                    ->orWhere('adresse', 'LIKE', "%$search%");
            })
            ->limit(10)
            ->get();

        return response()->json($medecins);
    }
    public function accepter($id)
    {
        $rdv = RendezVous::findOrFail($id);
        $rdv->status = 'accepté';
        $rdv->save();

        return redirect()->back()->with('success', 'Rendez-vous accepté');
    }

    // Refuser un rendez-vous
    public function refuser($id)
    {
        $rdv = RendezVous::findOrFail($id);
        $rdv->status = 'refusé';
        $rdv->save();

        return redirect()->back()->with('error', 'Rendez-vous refusé');
    }
}
