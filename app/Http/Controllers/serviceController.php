<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\FormServiceRequest;

class ServiceController extends Controller
{

    public function frmService()
    {
        return view('service.ajoutservice');
    }
    public function AllServices()
    {
        $services = \App\Models\Service::all();

        return view('service.service', ['services' => $services]);
    }
    public function ajoutServices(FormServiceRequest $request)
    {
        // enregistrer la categorie en BDD
        $services = \App\Models\Service::create([
            'id_service' => request('id'),
            'libelle' => request('libelle'),
            'description' => request('description'),
            'prix' => request('prix')


        ]);
        $services->save();

        $message = 'votre service est enregistrer : ' . $services->nom . ' ' . $services->prenom
            . ' ' . $services->activite;


        return redirect()->route('service.all')->with('success', $message);
    }
}
