<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TraitementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EmergencyContactController;
use App\Http\Controllers\SearchController;
Route::get('/', function () {
    return view('welcome');
});


// Page de choix du rôle
Route::get('/register', function () {
    return view('auth.choose-role');
})->name('register');

// Formulaire patient
Route::get('/register/patient', [RegisterController::class, 'createPatient'])
    ->name('register.patient');
Route::post('/register/patient', [RegisterController::class, 'storePatient'])
    ->name('register.patient.store');

// Formulaire médecin
Route::get('/register/medecin', [RegisterController::class, 'createMedecin'])
    ->name('register.medecin');
Route::post('/register/medecin', [RegisterController::class, 'storeMedecin'])
    ->name('register.medecin.store');
Route::middleware('auth')->group(function () {

    Route::get('/dashboard/patient',[DashboardController::class, 'index'], function () {
        if (auth()->user()->role !== 'patient') {
            abort(403); // interdit
        }
        return view('patient.dashboard');
    })->name('dashboard.patient');

    Route::get('/dashboard/medecin', [DashboardController::class, 'index'], function () {
        if (auth()->user()->role !== 'medecin') {
            abort(403); // interdit
        }
        return view('medecin.dashboard');
    })->name('dashboard.medecin');
});


//Route::get('/dashboard/medecin', [DashboardController::class, 'index'])->name('dashboard.medecin')->middleware('auth');

//Route::middleware(['auth'])->group(function () {
// Dashboard patient
//   Route::get('/dashboard/patient', [DashboardController::class, 'index'])
//       ->name('dashboard.patient');
//});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:patient'])->group(function () {

    Route::get(
        '/traitements',
        [TraitementController::class, 'index']
    )->name('traitements.index');




    Route::post('/traitements/{id}/pris', [TraitementController::class, 'markAsTaken'])
        ->name('traitements.pris');
});



Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patient/rendez-vous', [RendezVousController::class, 'indexPatient'])
        ->name('patient.rendez_vous.index');

    Route::get('/patient/rendez-vous/create', [RendezVousController::class, 'create'])
        ->name('patient.rendez_vous.create');

    Route::post('/patient/rendez-vous', [RendezVousController::class, 'store'])
        ->name('rendez_vous.store');

    Route::get('/search-medecins', [RendezVousController::class, 'search'])
        ->name('search.medecins');

    Route::get('/patient/rendez-vous/{id}/edit', [RendezVousController::class, 'edit'])
        ->name('rendez_vous.edit');


    Route::put('/patient/rendez-vous/{id}', [RendezVousController::class, 'update'])
        ->name('rendez_vous.update');


    Route::delete('/patient/rendez-vous/{id}', [RendezVousController::class, 'destroy'])
        ->name('rendez_vous.destroy');
});

Route::middleware(['auth', 'role:patient'])->group(function () {

    Route::get(
        '/patient/contact-urgence',
        [EmergencyContactController::class, 'edit']
    )->name('patient.emergency.edit');


    Route::post(
        '/patient/contact-urgence',
        [EmergencyContactController::class, 'update']
    )->name('patient.emergency.update');
});



Route::middleware(['auth', 'role:medecin'])->group(function () {

    // Afficher la liste des rendez-vous reçus par le médecin
    Route::get('/medecin/rendez-vous', [RendezVousController::class, 'indexMedecin'])
        ->name('medecin.rendez_vous.index');

    // Accepter un rendez-vous
    Route::post('/medecin/rendez-vous/{id}/accepter', [RendezVousController::class, 'accepter'])
        ->name('rendez_vous.accepter');

    // Refuser un rendez-vous
    Route::post('/medecin/rendez-vous/{id}/refuser', [RendezVousController::class, 'refuser'])
        ->name('rendez_vous.refuser');


    Route::get(
        '/medecin/patients/{patient}/traitements/create',
        [TraitementController::class, 'createByMedecin']
    )->name('medecin.traitements.create');

    Route::post(
        '/medecin/patients/{patient}/traitements',
        [TraitementController::class, 'storeByMedecin']
    )->name('medecin.traitements.store');

    Route::get(
        '/medecin/traitements',
        [TraitementController::class, 'traitementsPatients']
    )->name('medecin.traitements.index');
});

    use App\Http\Controllers\PriseController;

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::post('/prises/{prise}/pris', [PriseController::class, 'markAsTaken'])
        ->name('prises.pris');
});






Route::get('/recherche-medecins', [SearchController::class, 'search'])
    ->name('medecins.search');




require __DIR__ . '/auth.php';
