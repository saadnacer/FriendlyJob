<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function store(Request $request)
{
    // Récupération du fichier téléchargé
    $file = $request->file('image');
    
    // Vérification si le fichier est bien présent
    if (!$file) {
        return redirect()->back()->withErrors('Aucun fichier sélectionné.');
    }

    // Enregistrement de l'image dans le dossier "images" du stockage public
    $path = $file->store('images', 'public');

    // Création d'une nouvelle entrée dans la table "images"
    Image::create([
        'image' => $file->getClientOriginalName()
    ]);

}
}
