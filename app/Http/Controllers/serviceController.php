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


    public function ajoutServices()
    {
        // enregistrer la categorie en BDD
        $service = \App\Models\Service::create([
            'libelle' => request('libelle'),
            'description' => request('description'),
            'prix' => request('prix')
            
        ]);
        $service->save();
        
        $message = 'votre service est enregistrer : '
        . ' ' . $service->libelle;
        
        
        return redirect()->route('service.add')->with('success', $message);
    }


    public function allServices()
    {
        $service = \App\Models\Service::all();

        return view('service.service', ['services' => $service]);
    }
}
