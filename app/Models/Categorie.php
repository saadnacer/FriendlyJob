<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Metier;
use App\Models\Jobworker;
use App\Models\Service;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle'
    ];

    protected $primaryKey = 'id';
    
    public function jobworker()
    {
        return $this->hasMany(Jobworker::class, 'jobworker_id');
    }
    public function metiers()
    {
        return $this->hasMany(Metier::class, 'categorie_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'metiers', 'categorie_id', 'service_id');
    }
}
