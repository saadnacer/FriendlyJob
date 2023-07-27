<?php

namespace App\Http\Controllers;

use App\Models\Jobworker;

use App\Models\Categorie;

use Illuminate\Http\Request;

class MetierController extends Controller
{
    public function addMetier(Request $request)
    {
        $validatedData = $request->validate([
            'libelle' => 'required',
            'categorie_id' => 'required|exists:categories,id',
        ]);
        // Récupérer la catégorie sélectionnée
        $categorieId = $request->input('categorie_id');

        // Créer le métier avec les données du formulaire
        $metier = \App\Models\Metier::create([
            'libelle' => $request->input('libelle'),
            'categorie_id' => $validatedData['categorie_id'],
        ]);

        $jobworker = auth()->user()->jobworker;
        if ($jobworker) {
            // Lier le métier au jobworker
            $jobworker->metiers()->attach($metier->id);
        }
    
        // Enregistrer le métier
        $metier->save();
    
    }
}