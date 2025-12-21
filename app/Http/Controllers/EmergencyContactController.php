<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class EmergencyContactController extends Controller
{
    public function edit()
    {
        $patient = auth()->user()->patient;
        return view('patient.emergency.edit', compact('patient'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'emergency_name' => 'required|string|max:255',
            'emergency_phone' => 'required|string|max:20',
            'emergency_relation' => 'required|string|max:100',
        ]);

        $user = auth()->user();

        // ⬅️ الحل هنا
        $patient = Patient::firstOrCreate(
            ['user_id' => $user->id],
            [] // باقي الحقول فارغة دابا
        );

        $patient->update([
            'emergency_name' => $request->emergency_name,
            'emergency_phone' => $request->emergency_phone,
            'emergency_relation' => $request->emergency_relation,
        ]);

        return back()->with('success', 'Contact d’urgence enregistré avec succès');
    }
}
