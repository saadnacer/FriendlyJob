<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;
use App\Models\Profilworker;
use App\Models\Metier;
use App\Models\Categorie;

class Jobworker extends Model implements Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'pwd',
        'siret',
        'libelle',
        'categorie_id',
    ];

    protected $primaryKey = 'id';

    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'jobworker_id');
    }

    public function profils()
    {
        return $this->hasMany(Profilworker::class, 'jobworker_id');
    }

    public function metiers()
    {
        return $this->belongsToMany(Metier::class, 'possedes', 'jobworker_id', 'metier_id');
    }

    public function metier()
    {
        return $this->belongsTo(Metier::class);
    }


    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }



    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }


    public function getAuthPassword()
    {
        return $this->pwd;
    }


    public function getRememberToken()
    {
        return null;
    }


    public function setRememberToken($value)
    {
        // No remember token needed for this application
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return '';
    }
}
