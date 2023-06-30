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

Route::prefix('/friendlyuser')
        ->name('friendlyuser.')
        ->controller(App\Http\Controllers\FriendlyuserController::class)
        ->group(function() {
            Route::get ('/ajouter','frmFriendlyuser')->name('frm');
            Route::post('/ajouter','addFridenlyuser')->name('add');
});

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
