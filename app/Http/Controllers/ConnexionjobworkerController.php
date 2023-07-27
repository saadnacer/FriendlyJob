<?php

namespace App\Http\Controllers;

use App\Models\Friendlyuser;
use App\Models\Jobworker;
use Illuminate\Http\Request;

class ConnexionjobworkerController extends Controller
{
    public function showWorkerConnexion()
    {
        return view('connexion.connexion-jobworker');
    }

    public function authenticate(Request $request)
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
            return redirect()->route('service.add');
        } else {
            // Échec de la connexion
            return redirect()->back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
