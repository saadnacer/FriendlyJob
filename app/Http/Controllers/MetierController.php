<?php

namespace App\Http\Controllers;

use App\Models\Jobworker;

use Illuminate\Http\Request;

class MetierController extends Controller
{
    public function addMetier(Request $request)
    {

        $metier = \App\Models\Metier::create([
            'libelle' => request('libelle'),
        ]);
        $metier->save();
    }
}
