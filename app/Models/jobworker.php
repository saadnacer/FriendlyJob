<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ajout du model(a peu pres comme une classe metier)du jobworker pour recuperer les données de la base de données
// et pouvoir les manipuler dans notre environnement

class Jobworker extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'pwd',
        'siret',
        'activite',
        'prix'
    ];
}
