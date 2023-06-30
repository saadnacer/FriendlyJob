<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friendlyuser;

class FriendlyuserController extends Controller
{
    
    public function frmFriendlyuser() {
        // code BDD
        // dd(session()->all());
        return view('inscription.inscriptionuser');
    }

    public function addFriendlyuser()
{


    $friendlyuser = \App\Models\Friendlyuser::create([
        'nom' => request('nom'),
        'prenom' => request('prenom'),
        'email' => request('email'),
        'pwd' => request('pwd'),
        'date_nais' => request('date_nais'),  
    ]);

    $friendlyuser->save();

    return redirect()->route('friendlyuser.frm')->with('success', 'L\'utilisateur a été créé avec succès.');
}
}
