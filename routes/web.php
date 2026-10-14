<?php

use App\Http\Controllers\AffectationController;
use App\Http\Controllers\ConvocationController;
use App\Http\Controllers\EpreuveController;
use App\Http\Controllers\JuryController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ParametrageController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Accueil
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('menu')
        : redirect()->route('login');
})->name('home');

/*
|--------------------------------------------------------------------------
| Application
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard du starter kit
    |--------------------------------------------------------------------------
    |
    | Le layout Laravel utilise encore la route "dashboard".
    | On la conserve mais on la redirige vers notre menu principal.
    |
    */

    Route::redirect('/dashboard', '/menu')
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Menu principal
    |--------------------------------------------------------------------------
    */

    Route::get('/menu', [MenuController::class, 'index'])
        ->name('menu');

    /*
    |--------------------------------------------------------------------------
    | Candidat
    |--------------------------------------------------------------------------
    */

    Route::get('/ma-convocation', [ConvocationController::class, 'index'])
        ->name('convocation');

    /*
    |--------------------------------------------------------------------------
    | Jury
    |--------------------------------------------------------------------------
    */

    Route::get('/jury/planning', [JuryController::class, 'planning'])
        ->name('jury.planning');

    Route::get('/jury/candidats', [JuryController::class, 'candidats'])
        ->name('jury.candidats');

    /*
    |--------------------------------------------------------------------------
    | Gestion des épreuves
    |--------------------------------------------------------------------------
    */

    Route::get('/gestion/epreuves', [EpreuveController::class, 'index'])
        ->name('epreuves.index');

    Route::get('/gestion/epreuves/creer', [EpreuveController::class, 'create'])
        ->name('epreuves.create');

    Route::post('/gestion/epreuves', [EpreuveController::class, 'store'])
        ->name('epreuves.store');

    Route::get(
        '/gestion/epreuves/{epreuve}/affecter',
        [AffectationController::class, 'create']
    )->name('epreuves.affecter');

    Route::post(
        '/gestion/epreuves/{epreuve}/affecter',
        [AffectationController::class, 'store']
    )->name('epreuves.affecter.store');

    Route::get(
        '/gestion/epreuves/{epreuve}/convocations',
        [EpreuveController::class, 'convocations']
    )->name('epreuves.convocations');

    /*
    |--------------------------------------------------------------------------
    | Lieux
    |--------------------------------------------------------------------------
    */

    Route::post('/gestion/lieux', [LieuController::class, 'store'])
        ->name('lieux.store');

    /*
    |--------------------------------------------------------------------------
    | Administration - Utilisateurs
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/utilisateurs', [UtilisateurController::class, 'index'])
        ->name('utilisateurs.index');

    Route::get('/admin/utilisateurs/creer', [UtilisateurController::class, 'create'])
        ->name('utilisateurs.create');

    Route::post('/admin/utilisateurs', [UtilisateurController::class, 'store'])
        ->name('utilisateurs.store');

    Route::get(
        '/admin/utilisateurs/{utilisateur}/modifier',
        [UtilisateurController::class, 'edit']
    )->name('utilisateurs.edit');

    Route::post(
        '/admin/utilisateurs/{utilisateur}/modifier',
        [UtilisateurController::class, 'update']
    )->name('utilisateurs.update');

    /*
    |--------------------------------------------------------------------------
    | Administration - Paramétrage
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/parametrage', [ParametrageController::class, 'index'])
        ->name('parametrage.index');

    Route::post(
        '/admin/parametrage/roles',
        [ParametrageController::class, 'storeRole']
    )->name('parametrage.roles.store');

    Route::post(
        '/admin/parametrage/statuts',
        [ParametrageController::class, 'storeStatut']
    )->name('parametrage.statuts.store');

    Route::post(
        '/admin/parametrage/genres',
        [ParametrageController::class, 'storeGenre']
    )->name('parametrage.genres.store');
});

/*
|--------------------------------------------------------------------------
| Paramètres du starter kit
|--------------------------------------------------------------------------
*/

require __DIR__.'/settings.php';