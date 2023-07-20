<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormJobworkerRequest;
use App\Models\Jobworker;
use App\Models\Metier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

// controller de la partit inscription du jobworker 

class InscriptionjobworkerController extends Controller
{
    // affichage du formulaire d'inscription
    public function frmInscription()
    {
        return view('inscription.inscriptionworker');
    }


    public function ajoutjobworker(FormJobworkerRequest $request)
    {

        $email = request('email');

        // Vérifier si l'e-mail existe déjà dans la base de données
        $existeworker = \App\Models\Jobworker::where('email', $email)->first();
        if ($existeworker) {
            // Si l'e-mail existe déjà, retourner un message d'erreur avec une redirection vers le formulaire
            throw ValidationException::withMessages([
                'email' => ['L\'adresse e-mail est déjà inscrite sur le site.'],
            ])->redirectTo(route('inscription.frm'));
        }
        // enregistrer le jobworker  en BDD
        $jobworker = \App\Models\Jobworker::create([
            'nom' => request('nom'),
            'prenom' => request('prenom'),
            'email' => request('email'),
            'pwd' => Hash::make($request->input('pwd')),
            'siret' => request('siret'),

        ]);

        $jobworker->save();

        $metier = \App\Models\Metier::create([
            'libelle' => request('libelle'),
        ]);

        $message = 'vous etes maintenant inscris : ' . $jobworker->nom . ' ' . $jobworker->prenom
            . ' dans le secteur ' . ' ' . $metier->libelle;


        return redirect()->route('inscription.frm')->with('success', $message);
    }
    public function listejobworker()
    {
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            // Récupérer l'utilisateur authentifié
            $user = Auth::user();

            // Récupérer le jobworker correspondant à l'utilisateur authentifié (s'il existe)
            $jobworker = Jobworker::where('email', $user->email)->first();

            return view('inscription.listejobworker', compact('jobworker'));
            //['jobworker' => $jobworker], ['metier' => $metier])
        }
    }
    public function delete(\App\Models\Jobworker $jobworker)
    {
        $jobworker->delete();
        $message = "la suppression du jobworker {$jobworker->prenom} a etait faite";
        return redirect()->route('inscription.all')->with('success', $message);
    }
    public function edit($id)
    {
        $jobworker = JobWorker::findOrFail($id);
        return view('inscription.jobworkeredit', compact('jobworker'));
    }
    public function update(Request $request, $id)
    {
        $jobworker = JobWorker::findOrFail($id);
        $jobworker->nom = $request->input('nom');
        $jobworker->prenom = $request->input('prenom');
        $jobworker->email = $request->input('email');
        $jobworker->pwd = Hash::make($request->input('pwd'));
        $jobworker->siret = $request->input('siret');
        $jobworker->save();

        $message = "la modification a etait fait avec success";

        return redirect()->route('inscription.all')->with('success', $message);
    }
}
