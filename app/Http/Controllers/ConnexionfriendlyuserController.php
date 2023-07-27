<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ConnexionfriendlyuserController extends Controller
{
    public function friendlyConnexion()
    {
        return view('connexion.connexion-friendlyuser');
    }

    public function authenticate(Request $request)
    {
        $friendlyConnexion = \App\Models\Friendlyuser::where('email', $request->input('email'))->first();

        if ($friendlyConnexion && Hash::check($request->input('pwd'), $friendlyConnexion->pwd)) {
            $message = 'Vous êtes maintenant connecté';

            Auth::login($friendlyConnexion);

            return view('welcome')->with('success', $message);
        } else {
            return "Le mot de passe ne correspond pas à cet utilisateur.";
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}