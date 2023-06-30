<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Friendlyuser extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'date_nais'
    ];

    // Relation avec le modèle JobWorker
    public function jobWorker()
    {
        return $this->hasOne(Jobworker::class);
    }
}
