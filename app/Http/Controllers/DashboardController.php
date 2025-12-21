<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\RendezVous; 
use App\Models\Patient;    
use App\Models\Traitement;  

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function index()
    {
        $user = Auth::user();

        if ($user->role === 'medecin') {
            // Dashboard médecin
            $rendezVousAujourdhui = RendezVous::where('medecin_id', $user->id)
                ->whereDate('date_heure', now())
                ->orderBy('date_heure', 'asc')
                ->get();

            $rendezVousCount = $rendezVousAujourdhui->count();

            return view('medecin.dashboard', compact('rendezVousAujourdhui', 'rendezVousCount'));
        }

        // Dashboard patient
        $patient = $user->patient;

        // Tous les rendez-vous du patient
        $rendezVous = $patient->rendezVous()->orderBy('date_heure', 'asc')->get();
        $rendezVousCount = $rendezVous->count();

        // Rendez-vous d'aujourd'hui
        $rendezVousAujourdhui = $patient->rendezVous()
            ->whereDate('date_heure', Carbon::today())
            ->orderBy('date_heure', 'asc')
            ->get();

        // Tous les traitements du patient
        $traitements = $patient->traitements()->orderBy('created_at', 'asc')->get();
        $traitementsCount = $traitements->count();

        // Traitements non pris
        $traitementsNonPris = $traitements->where('etat', 'non pris');

        return view('patient.dashboard', compact(
            'rendezVousCount',
            'traitementsCount',
            'rendezVousAujourdhui',
            'traitementsNonPris'
        ));
    }

 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
