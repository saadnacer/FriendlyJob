<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friendlyuser;
use App\Models\Image;
use Illuminate\Support\Facades\Hash;

class FriendlyuserController extends Controller
{
    
    public function frmFriendlyuser() {
        // code BDD
        // dd(session()->all());
        return view('inscription.inscriptionuser');
    }

    public function addFriendlyuser(Request $request)
{

    // Récupération du fichier téléchargé
    $imagePath = $request->file('image')->store('images');

    // Enregistrement de l'image dans la table "images"
    $imageModel = new Image();
    $imageModel->image = $imagePath;
    $imageModel->save();

    // Obtenez l'ID de l'image pour stocker dans la colonne "image_id" de la table "friendlyusers"
    $imageId = $imageModel->id;

    $friendlyuser = \App\Models\Friendlyuser::create([
        'nom' => request('nom'),
        'prenom' => request('prenom'),
        'email' => request('email'),
        'pwd' => Hash::make($request->newPwd),
        'date_nais' => request('date_nais'),  
        'image_id' => $imageId,  
    ]);

    $friendlyuser->save();

    return redirect()->route('friendlyuser.frm')->with('success', 'L\'utilisateur a été créé avec succès.');
}
}
