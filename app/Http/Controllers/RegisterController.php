<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // <-- important pour login

class RegisterController extends Controller
{
    // formulaire patient
    public function createPatient() {
        return view('auth.register-patient');
    }

    // store patient
    public function storePatient(Request $request) {
    $request->validate([
        'name'     => 'required',
        'email'    => 'required|email|unique:users',
        'phone'    => 'required',
        'password' => 'required|confirmed'
    ]);

    $user = User::create([
        'name'       => $request->name,
        'email'      => $request->email,
        'telephone'  => $request->phone,
        'password'   => Hash::make($request->password),
        'role'       => 'patient'
    ]);

    // Créer automatiquement le patient lié
    \App\Models\Patient::create([
        'user_id' => $user->id
    ]);

    // Connecter l'utilisateur automatiquement
    Auth::login($user);

    return redirect()->route('dashboard.patient');
}

    // formulaire medecin
    public function createMedecin() {
        return view('auth.register-medecin');
    }

    // store medecin
    public function storeMedecin(Request $request) {
        $request->validate([
            'name'        => 'required',
            'email'       => 'required|email|unique:users',
            'phone'       => 'required',
            'address'     => 'required',
            'specialite'  => 'required',
            'password'    => 'required|confirmed'
        ]);

      $user = User::create([
        'name'       => $request->name,
        'email'      => $request->email,
        'telephone'  => $request->phone,     // ✅
        'adresse'    => $request->address,   // ✅
        'specialite' => $request->specialite,// ✅
        'password'   => Hash::make($request->password),
        'role'       => 'medecin'
    ]);


        // Connecter l'utilisateur automatiquement après inscription
        Auth::login($user);

        return redirect()->route('dashboard.medecin');
    }
}
