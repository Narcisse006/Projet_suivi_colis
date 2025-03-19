<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnregistrementcolisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupportController;
//use SupportController as GlobalSupportController;

//use App\Http\Controllers\SupportController;
//use Illuminate\Container\Attributes\Auth;
//use SupportController as GlobalSupportController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); 
});

Auth::routes();

Route::get('/dashboard', [EnregistrementcolisController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/enregistrement/index', [EnregistrementcolisController::class, 'index']);
Route::get('/enregistrement/create', [EnregistrementcolisController::class, 'create']);
Route::post('/enregistrement/store', [EnregistrementcolisController::class, 'store']);
Route::get('/enregistrement/{id}/show', [EnregistrementcolisController::class, 'show']);
Route::post('/enregistrement/{id}/update', [EnregistrementcolisController::class, 'update']);
Route::get('/enregistrement/{id}/destroy', [EnregistrementcolisController::class, 'destroy']);

// Routes pour le suivi des colis
Route::get('/enregistrement/suivi', [EnregistrementColisController::class, 'suivi'])->name('suivi');
Route::post('/enregistrement/checkSuivi', [EnregistrementcolisController::class, 'checkSuivi']);
Route::get('/enregistrement/suivi-resultat', [EnregistrementColisController::class, 'checkSuivi'])->name('suivi-resultat');

// Route pour l'historique des envois
Route::get('/enregistrement/historique', [EnregistrementColisController::class, 'historique'])->name('historique');

// Route pour modifier le status
Route::get('/enregistrement/{id}/edit', [EnregistrementcolisController::class, 'edit']);
Route::post('/enregistrement/{id}/update-status', [EnregistrementcolisController::class, 'updateStatus']);

//supporot client 

Route::get('/support/create', [SupportController::class, 'create']);
Route::get('/support/index', [SupportController::class, 'index']);
Route::post('/support/store', [SupportController::class, 'store'])->name('support.store');


// Routes admin (protégées par middleware admin)
Route::middleware(['auth', 'admin'])->group(function () {
    });

    Route::get('/admin/support', [SupportController::class, 'index'])->name('admin.support.index');
    Route::post('/admin/support/{id}', [SupportController::class, 'update'])->name('admin.support.update');

//Route dashboard 

Route::get('/admin/dashboard', [EnregistrementColisController::class, 'dashboard'])->name('admin.dashboard');
