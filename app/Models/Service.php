<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'description',
        'prix',
        'photo',
        'categorie_id',
        'jobworker_id'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    public function jobworker()
    {
        return $this->belongsTo(JobWorker::class, 'jobworker_id');
    }
}
