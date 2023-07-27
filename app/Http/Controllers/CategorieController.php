<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormCategorieRequest;


class CategorieController extends Controller
{
    public function addCategorie(FormCategorieRequest $request)
    {
        // enregistrer la categorie en BDD (persister)
        $categorie = \App\Models\Categorie::create([
            // $categorie = Categorie::create([
                'libelle' => request('libelle'),
                
            ]);
            // dd($categorie); // dump and die
            $categorie->save();

        
    }

    public function allCategorie() {
        $categorie = \App\Models\Categorie::all();
            return view(  'inscription.inscriptionworker',
                        ['categories' => $categorie]);
    }
}
