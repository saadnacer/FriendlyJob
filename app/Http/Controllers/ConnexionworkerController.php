<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;





class ConnexionworkerController extends Controller
{
    public function frmconnexion()
    {

        return view('connexion.connexion',);
    }

    public function workerprofil()
    {
        $jobworker = auth()->guard('jobworker')->user();

        return view('profil.Profil', compact('jobworker'));
    }


    public function authenticate(Request $request): RedirectResponse
    {
        // Valider les données du formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'pwd' => 'required',
        ]);

        // Authentifier l'utilisateur (jobworker)
        $jobworker = \App\Models\Jobworker::where('email', $credentials['email'])->first();


        if ($jobworker && password_verify($credentials['pwd'], $jobworker->pwd)) {
            // Connexion réussie pour le jobworker
            auth()->guard('jobworker')->login($jobworker);
            return redirect()->route('accueil');
        } else {
            // Échec de la connexion
            return redirect()->back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
        }
    }

    public function deconnexion(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('accueil');
    }
}
