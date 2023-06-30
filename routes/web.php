<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/accueil', function () {
    return view('accueil');
});

// groupe route de l'inscription du jobworker avec la liste des jobworker 
// la possibilité de supprimer des jobworkers

Route::prefix('/inscription')
    ->name('inscription.')
    ->controller(App\Http\Controllers\InscriptionController::class)
    ->group(function () {
        Route::get('', 'frmInscription')->name('frm');
        Route::get('/listejobworker', 'listejobworker')->name('all');
        Route::delete('/delete/{jobworker}', 'delete')->name('delete');
        Route::post('/ajouter', 'ajoutjobworker')->name('add');
    });


    Route::prefix('/connexion')
        ->name('connexion.')
        ->controller(App\Http\Controllers\ConnexionController::class)
        ->group(function() {
            Route::get ('/connexion','friendlyConnexion')->name('frc');
            Route::post('/connexion','friendlyConnexion')->name('fcc');
            Route::get ('/connexion','workerConnexion')->name('wrc');
            Route::post('/connexion','workerConnexion')->name('wcc');    
        });