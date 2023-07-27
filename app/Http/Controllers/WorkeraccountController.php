<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class WorkeraccountController extends Controller
{

    // public function compteJobWorker()
    // {
    //     return view('/compte/comptejobworker');
    // }
    public function workerAccount()
    {
        $jobworkers = \App\Models\Jobworker::with('metier.categorie')->get();
        $categories = \App\Models\Categorie::all();
        $services = Service::all();
        return view('/compte/jobworker', compact('services', 'categories', 'jobworkers'));
    }
}
