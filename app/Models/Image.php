<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Profiluser;
use App\Models\Profilworker;


class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
    ];

    protected $primaryKey = 'id';
    
    public function ajouts()
    {
        return $this->belongsToMany(Service::class, 'ajouter', 'image_id', 'service_id');
    }

    public function profilsUsers()
    {
        return $this->belongsToMany(Profiluser::class, 'profilusers', 'image_id', 'friendlyuser_id');
    }

    public function profilsWorkers()
    {
        return $this->belongsToMany(Profilworker::class, 'profilworkers', 'image_id', 'jobworker_id');
    }
}
