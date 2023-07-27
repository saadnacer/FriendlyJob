<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Requests\FormServiceRequest;

class ServiceController extends Controller
{

    public function frmService()
    {
        return view('service.ajoutservice');
    }


    public function ajoutServices(Request $request)
    {

        
        // Récupération du fichier téléchargé
    $imagePath = $request->file('image')->store('images');

    // Enregistrement de l'image dans la table "images"
    // Enregistrement de l'image dans la table "images"
    $imageModel = new Image();
    $imageModel->image = $imagePath;
    $imageModel->save();

        $jobworker_id = auth('jobworker')->id();
        // enregistrer la categorie en BDD
        $service = \App\Models\Service::create([
            'libelle' => request('libelle'),
            'description' => request('description'),
            'prix' => request('prix'),
            'jobworker_id' => $jobworker_id,
            'image_id' => $imageModel->id,
        ]);

        $message = 'Votre service est enregistré : ' . $service->libelle;

        return redirect()->route('service.add')->with('success', $message);
    }

    public function allServices()
    {
        $categories = \App\Models\Categorie::all();
        $services = \App\Models\Service::with('image')->get();

        return view('service.service', ['services' => $services, 'categories' => $categories]);
    }

    public function showService($id)
{
    $service_id = intval($id);
    $service = \App\Models\Service::find($service_id);

    return view('service.descriptionservice', compact('service', 'service_id'));
}

public function search(Request $request)
{
    // Récupérez les critères de recherche du formulaire
    $libelle = $request->input('libelle');
    $categorie = $request->input('categorie');
    $prix_min = $request->input('prix_min');
    $prix_max = $request->input('prix_max');

    // Construisez la requête de recherche en fonction des critères
    $query = \App\models\Service::query();

    if ($libelle) {
        $query->where('libelle', 'LIKE', '%' . $libelle . '%');
    }

    if ($categorie) {
        $query->where('categorie_id', $categorie);
    }

    if ($prix_min) {
        $query->where('prix', '>=', $prix_min);
    }

    if ($prix_max) {
        $query->where('prix', '<=', $prix_max);
    }

    // Exécutez la requête et récupérez les résultats
    $services = $query->get();

    // Récupérer les catégories pour le formulaire de filtre de recherche
    $categories = \App\models\Categorie::all();

    return view('service.service', compact('services', 'categories'));
}
}