<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\FormServiceRequest;

class ServiceController extends Controller
{
    public function AllServices()
    {
        $services = \App\Models\Service::all();

        return view('categorie.listerservice', ['services' => $services]);
    }
    public function ajoutServices(FormServiceRequest $request)
    {
        // enregistrer la categorie en BDD
        $service = \App\Models\Service::create([
            'id_service' => request('id'),
            'libelle' => request('libelle'),
            'prix' => request('prix'),
            'description' => request('description'),

        ]);
        $service->save();

        $message = 'votre service est enregistrer : ' . $service->nom . ' ' . $service->prenom
            . ' ' . $service->activite;


        return redirect()->route('service.all')->with('success', $message);
    }
}
