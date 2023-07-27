<?php

namespace App\Http\Controllers;

use App\Models\Friendlyuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UseraccountController extends Controller
{
    public function userAccount()
    {
        // Récupérer l'utilisateur connecté
        $friendlyuser = Auth::guard('friendlyuser')->user();

        $reservations = \App\Models\Reservation::all();
        $categories = \App\Models\Categorie::all();
        $services = \App\Models\Service::all();
        return view('compte.comptefriendlyuser', compact('services', 'categories', 'reservations', 'friendlyuser'));
    }

    public function editCompte($id)
    {
        // $friendlyuser = Auth::user();
        $friendlyuser = Friendlyuser::findOrFail($id);
        return view('/compte/edit', compact('friendlyuser'));
    }



    public function updateCompte(Request $request, $id)
    {
        # Validation
        $request->validate([
            // Valider les données du formulaire de mise à jour du compte

            'nom'   =>  'required',
            'prenom'    =>  'required',
            'email' =>  'required',
            'pwd' => 'required',
            'new_pwd' => 'required|confirmed',
        ]);

        $friendlyuser = Friendlyuser::findOrFail($id);
        $friendlyuser->nom = $request->input('nom');
        $friendlyuser->prenom = $request->input('prenom');
        $friendlyuser->email = $request->input('email');

        $friendlyuser->save();
        # Vérifier si l'ancien mot de passe correspond
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "L'ancien mot de passe ne correspond pas !");
        }

        # Mettre à jour le nouveau mot de passe
        Friendlyuser::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $message = "La modification a été faite avec succès.";

        return redirect()->route('compte.comptefriendlyuser')->with('success', $message);
    }
    // public function updateCompte(Request $request, $id)
    // {
    //     // Valider les données du formulaire de mise à jour du compte

    //     $friendlyuser = Friendlyuser::findOrFail($id);
    //     $friendlyuser->nom = $request->input('nom');
    //     $friendlyuser->prenom = $request->input('prenom');
    //     $friendlyuser->email = $request->input('email');

    //     // Vérifier si le mot de passe a été modifié
    //     if ($request->filled('pwd')) {
    //         $friendlyuser->pwd = Hash::make($request->input('pwd'));
    //     }

    //     $friendlyuser->save();

    //     $message = "La modification a été faite avec succès.";

    //     return redirect()->route('compte.comptefriendlyuser')->with('success', $message);
    // }
}


