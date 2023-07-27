<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Jobworker;
use App\Models\Categorie;
use App\Models\Image;


class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'description',
        'prix',
        'jobworker_id',
        'image_id',
    ];

    protected $primaryKey = 'id';
    
    
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'service_id');
    }

    public function jobworker()
    {
        return $this->belongsTo(Jobworker::class, 'jobworker_id');
    }

    public function categorie()
    {
        return $this->belongsToMany(Categorie::class, 'metiers', 'service_id', 'metier_id');
    }

    public function ajouts()
    {
        return $this->belongsToMany(Image::class, 'ajouter', 'service_id', 'image_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
