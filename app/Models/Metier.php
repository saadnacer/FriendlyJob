<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\Service;
use App\Models\Jobworker;

class Metier extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'categorie_id',
    ];
    

    protected $primaryKey = 'id';
    
    public function categorie()
{
    return $this->belongsTo(Categorie::class, 'categorie_id');
}

    public function services()
    {
        return $this->belongsToMany(Service::class, 'metiers', 'metier_id', 'service_id');
    }

    public function jobWorkers()
    {
        return $this->belongsToMany(Jobworker::class, 'possedes', 'metier_id', 'jobworker_id');
    }
}