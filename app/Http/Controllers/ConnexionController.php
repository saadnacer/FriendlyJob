<?php

namespace App\Http\Controllers;

use App\Models\Friendlyuser;
use App\Models\Jobworker;
use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function showLoginForm()
    {
        return view('connexion.connexion');
    }

    public function login(Request $request)
    {
        // Valider les données du formulaire de connexion
        $credentials = $request->validate([
            'email' => 'required|email',
            'pwd' => 'required',
        ]);

        // Authentifier l'utilisateur (jobworker ou friendlyuser)
        $jobworker = Jobworker::where('email', $credentials['email'])->first();
        $friendlyuser = Friendlyuser::where('email', $credentials['email'])->first();

        if ($jobworker && password_verify($credentials['pwd'], $jobworker->pwd)) {
            // Connexion réussie pour le jobworker
            auth()->guard('jobworker')->login($jobworker);
            return redirect('/');
        } elseif ($friendlyuser && password_verify($credentials['pwd'], $friendlyuser->pwd)) {
            // Connexion réussie pour le friendlyuser
            auth()->guard('friendlyuser')->login($friendlyuser);
            return redirect('/');
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
