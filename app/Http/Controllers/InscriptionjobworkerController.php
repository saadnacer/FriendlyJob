<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\FormJobworkerRequest;
use App\Models\Jobworker;
use App\Models\Metier;
use App\Models\Categorie;

class InscriptionjobworkerController extends Controller
{
    public function frmJobworker()
    {
        $categories = Categorie::all();
        return view('inscription.inscriptionworker', compact('categories'));
    }

    public function ajoutJobworker(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'pwd' => 'required',
            'siret' => 'required',
            'libelle' => 'required',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        // Récupérer la catégorie sélectionnée
        
        $categorie = Categorie::findOrFail($validatedData['categorie_id']);

        // Créer le jobworker avec les données du formulaire
        $jobworker = Jobworker::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'email' => $validatedData['email'],
            'pwd' => Hash::make($validatedData['pwd']),
            'siret' => $validatedData['siret'],
            'categorie_id' => $categorie->id,

        ]);

        $metier = Metier::create([
            'libelle' => $validatedData['libelle'],
            'categorie_id' => $categorie->id,
        ]);
        $jobworker->metiers()->attach($metier->id);

        // Lier la catégorie au jobworker
        $jobworker->categorie()->associate($categorie);
        $jobworker->save();

        $message = 'Vous êtes maintenant inscrit : ' . $jobworker->nom . ' ' . $jobworker->prenom . ' dans le secteur ';

        return redirect()->route('jobworker.frm')->with('success', $message);
    }

    // Autres méthodes du contrôleur
};