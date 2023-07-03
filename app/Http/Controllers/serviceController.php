<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function AllServices()
    {
        return view('service.service');
    }
}
