<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\FormServiceRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function frmService()
    {
        $categorie = \App\Models\Categorie::all();
        return view('service.ajoutservice', ['categories' => $categorie]);
    }


    public function ajoutServices(FormServiceRequest $request)
    {
        // enregistrer un service en BDD

        // recuperer l'utilisateur du jobworker
        $user = Auth::guard('jobworker')->user();

        $service = \App\Models\Service::create([
            'libelle' => request('libelle'),
            'description' => request('description'),
            'prix' => request('prix'),
            'photo' => request('photo'),
            'categorie_id' => request('categorie_id'),
            'jobworker_id' => $user->id // Ajouter l'ID de l'utilisateur connecté

        ]);
        $file = $request->file('photo');
        $path = $file->store('photos', 'public');
        $service->photo = $path;

        $service->save();

        $message = 'votre service est enregistrer : '
            . ' ' . $service->libelle;


        return redirect()->route('service.add')->with('success', $message);
    }


    public function allServices()
    {

        $categorie = \App\Models\Categorie::all();
        $service = \App\Models\Service::all();

        return view('service.service', ['services' => $service], ['categories' => $categorie]);
    }
}
