<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user();
   
    if ($user->role === 'medecin') {
        $rendezVousAujourdhui = \App\Models\RendezVous::where('medecin_id', $user->id)
            ->whereDate('date_heure', now())
            ->orderBy('date_heure', 'asc')
            ->get();

        $rendezVousCount = $rendezVousAujourdhui->count();

        return view('medecin.dashboard', compact('rendezVousAujourdhui', 'rendezVousCount'));
    }

    $patient = $user->patient;
  
    // Récupérer tous les rendez-vous du patient
    $rendezVous = $patient->rendezVous()->orderBy('date_heure', 'desc')->get();
    $traitements = $patient->traitements()->orderBy('date_debut', 'desc')->get();

    $rendezVousCount = $rendezVous->count();
    $traitementsCount = $traitements->count();

    return view('patient.dashboard', compact(
        'rendezVous',
        'rendezVousCount',
        'traitements',
        'traitementsCount'
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
