<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormJobworkerRequest;
use App\Models\Jobworker;

// controller de la partit inscription du jobworker 
// avec toute les methodes qui permette d'ajouter de voir la liste des jobworker
// et la suppression du jobworker avec la redirection vers les vues associés

class InscriptionjobworkerController extends Controller
{
    public function frmInscription()
    {
        return view('inscription.inscriptionworker');
    }


    public function ajoutjobworker(FormJobworkerRequest $request)
    {
        // enregistrer la categorie en BDD
        $jobworker = \App\Models\Jobworker::create([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'email' => request('email'),
            'pwd' => request('pwd'),
            'siret' => request('siret'),
            'activite' => request('activite'),
            'prix' => request('prix'),

        ]);
        $jobworker->save();

        $message = 'vous etes maintenant inscris : ' . $jobworker->nom . ' ' . $jobworker->prenom
            . ' dans le secteur ' . ' ' . $jobworker->activite;


        return redirect()->route('inscription.frm')->with('success', $message);
    }
    public function listejobworker()
    {
        $jobworker = \App\Models\Jobworker::all();

        return view('inscription.listejobworker', ['jobworker' => $jobworker]);
    }
    public function delete(\App\Models\Jobworker $jobworker)
    {
        $jobworker->delete();
        $message = "la suppression du jobworker {$jobworker->prenom} a etait faite";
        return redirect()->route('inscription.all')->with('success', $message);
    }
}
