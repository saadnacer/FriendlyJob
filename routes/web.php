<?php

use App\Http\Controllers\MetierController;
use App\Http\Controllers\ConnexionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkeraccountController;
use App\Http\Controllers\UseraccountController;
use App\Http\Controllers\ReservationController;


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

Route::post('/metier', [MetierController::class, 'addMetier'])->name('add');

Route::prefix('/friendlyuser')
    ->name('friendlyuser.')
    ->controller(App\Http\Controllers\FriendlyuserController::class)
    ->group(function () {
        Route::get('/ajouter', 'frmFriendlyuser')->name('frm');
        Route::post('/ajouter', 'addFriendlyuser')->name('add');
    });
Route::prefix('/jobworker')
    ->name('jobworker.')
    ->controller(App\Http\Controllers\InscriptionjobworkerController::class)
    ->group(function () {
        Route::get('/ajouter', 'frmJobworker')->name('frm');
        Route::post('/ajouter', 'ajoutJobworker')->name('add');
        Route::get('/listejobworker', 'listejobworker')->name('all');
        Route::delete('/delete/{jobworker}', 'delete')->name('delete');
    });

// route pour la partit service 

Route::prefix('/service')
    ->name('service.')
    ->controller(App\Http\Controllers\ServiceController::class)
    ->group(function () {
        Route::get('/ajout', 'frmService')->name('frm');
        Route::post('/ajout', 'ajoutServices')->name('add');
        Route::get('/service', 'allServices')->name('all');
        Route::get('/description/{id}', 'showService')->name('show');
        Route::get('/search', 'search')->name('search'); // Utiliser la notation de tableau ici
});

Route::prefix('/reservation')
    ->name('reservation.')
    ->group(function () {
        Route::post('reserver', [ReservationController::class, 'serviceReservation'])->name('service');
        // Route pour supprimer une réservation
        Route::delete('{id}', [ReservationController::class, 'delete'])->name('delete');

        // Route pour afficher le formulaire de modification d'une réservation
        Route::get('{id}/edit', [ReservationController::class, 'edit'])->name('edit');

        // Route pour mettre à jour une réservation
        Route::put('{id}', [ReservationController::class, 'update'])->name('update');
    });

Route::prefix('/compte')
    ->name('compte.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/comptefriendlyuser', [UseraccountController::class, 'userAccount'])->name('comptefriendlyuser');
        Route::get('/edit/{id}', [UseraccountController::class, 'editCompte'])->name('editcompte');
        Route::put('/update/{id}', [UseraccountController::class, 'updateCompte'])->name('updatecompte');
});
Route::prefix('/compte')
    ->name('compte.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/jobworker', [WorkeraccountController::class, 'workerAccount'])->name('comptejobworker');
});


Route::prefix('/categorie')
->name('categorie.')
->controller(App\Http\Controllers\CategorieController::class)
->group(function () {
    Route::get('/list', 'allCategorie')->name('all');
});

Route::prefix('/connexion')
->name('connexion.')
->controller(App\Http\Controllers\ConnexionfriendlyuserController::class)
->group(function () {
    Route::get('/connexion-friendlyuser', 'friendlyConnexion')->name('frc');
    Route::post('/connexion-friendlyuser', 'authenticate')->name('fcp');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('/connexion')
    ->name('connexion.')
    ->controller(App\Http\Controllers\ConnexionjobworkerController::class)
    ->group(function () {
        Route::get('/connexion-jobworker', 'showWorkerConnexion')->name('wrc');
        Route::post('/connexion-jobworker', 'authenticate')->name('wcp');
    });

Route::prefix('/admin')
    ->name('admin.')
    ->controller(App\Http\Controllers\ListuserController::class)
    ->group(function () {
        Route::get('/utilisateurs', 'index')->name('utilisateurs.index');
        Route::delete('/utilisateurs/{id}', 'destroy')->name('utilisateurs.destroy');
});


    
    
    // route pour l'accueil 

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/accueil', function () {
        return view('accueil');
    });
    
    
    
    
    
    
    
    
    
    // Route::prefix('/compte')
    //     ->name('compte.')
    //     ->controller(App\Http\Controllers\WorkeraccountController::class)
    //     ->group(function () {
    //         Route::get('/affiche', 'workerAccount')->name('worker');
    //     });
    
    // Route::prefix('/compteuser')
    //     ->name('compteuser.')
    //     ->controller(\App\Http\Controllers\UseraccountController::class)
    //     ->group(function () {
    //         Route::get('/affiche', 'userAccount')->name('user');
    //     });
    



// Route::prefix('/service')
//     ->name('service.')
//     ->controller(\App\Http\Controllers\ReservationController::class)
//     ->group(function () {
//         Route::get('/reservation', 'showDescription')->name('show');
//         Route::post('/reservation', 'serviceReservation')->name('service');
//     });


// groupe route de l'inscription du jobworker avec la liste des jobworker 
// la possibilité de supprimer des jobworkers

// Route::prefix('/inscription')
//     ->name('inscription.')
//     ->controller(App\Http\Controllers\InscriptionjobworkerController::class)
//     ->group(function () {
//         Route::get('', 'frmInscription')->name('frm');
//         Route::post('/ajouter', 'ajoutjobworker')->name('add');
//         Route::get('/listejobworker', 'listejobworker')->name('all');
//         Route::delete('/delete/{jobworker}', 'delete')->name('delete');
//     });


// Route::prefix('/connexion')
//     ->name('connexion.')
//     ->controller(App\Http\Controllers\ConnexionController::class)
//     ->group(function () {
//         Route::get('/connexion', 'friendlyConnexion')->name('frc');
//         Route::post('/connexion', 'friendlyConnexion')->name('fcc');
//         Route::get('/connexion', 'workerConnexion')->name('wrc');
//         Route::post('/connexion', 'workerConnexion')->name('wcc');
//     });