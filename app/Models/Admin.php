<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Commentaire;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    public function observes()
    {
        return $this->belongsToMany(Service::class, 'observe', 'admin_id', 'service_id');
    }

    public function verifications()
    {
        return $this->belongsToMany(Commentaire::class, 'verifie', 'admin_id', 'commentaire_id');
    }
}
