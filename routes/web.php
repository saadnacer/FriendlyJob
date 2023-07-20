<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AuthController;

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
    ->group(function () {
        Route::get('/ajouter', 'frmFriendlyuser')->name('frm');
        Route::post('/ajouter', 'addFridenlyuser')->name('add');
    });

// route pour la partit service 

Route::middleware(['web', 'auth'])->prefix('/service')
    ->name('service.')
    ->controller(App\Http\Controllers\ServiceController::class)
    ->group(function () {
        Route::get('/ajout', 'frmService')->name('frm');
        Route::post('/ajout', 'ajoutServices')->name('add');
        Route::get('/service', 'allServices')->name('all');
    });


// route pour l'accueil 

Route::get('/', function () {
    return view('welcome');
})->name('accueil');


// route formulaire inscription
Route::get('/inscription', [App\Http\Controllers\InscriptionjobworkerController::class, 'frmInscription'])->name('inscription.frm');


// groupe route affichage du jobworker avec CRUD
Route::prefix('/inscription')
    ->name('inscription.')
    // Utilisez le middleware 'auth' pour restreindre l'accès aux routes authentifiées
    ->controller(App\Http\Controllers\InscriptionjobworkerController::class)
    ->group(function () {
        Route::get('/listejobworker', 'listejobworker')->name('all')->middleware('auth');
        Route::delete('/delete/{jobworker}', 'delete')->name('delete');
        Route::post('/ajouter', 'ajoutjobworker')->name('add');
        Route::get('/edit/{id}', 'edit')->name('jobworker.edit');
        Route::put('/update/{id}', 'update')->name('jobworker.update');
    });


// route pour la connexion du jobworker
Route::prefix('/connexion')
    ->name('connexion.')
    ->controller(App\Http\Controllers\ConnexionworkerController::class)
    ->group(function () {
        Route::get('/worker', 'frmconnexion')->name('frm');
        Route::post('/workerr', 'authenticate')->name('connexion');
        Route::get('/profil', 'workerprofil')->name('profil');
        Route::post('/deconnexion', 'deconnexion')->name('deconnexion');
    });

// vue pour contact
Route::get('/contact', function () {
    return view('contact.contact');
});


// envoyer un email
Route::post('/envoyer-mail', [MailController::class, 'envoyerMail'])->name('envoyer-mail');
