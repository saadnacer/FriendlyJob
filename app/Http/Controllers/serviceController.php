<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function AllServices()
    {
        $services = \App\Models\Service::all();
            
        return view('categorie.listerservice',['services'=> $services]);
    }
}
