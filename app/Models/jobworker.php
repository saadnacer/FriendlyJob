<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



// ajout du model du jobworker pour recuperer les données de la base de données
// et pouvoir les manipuler dans notre environnement

class Jobworker extends Model implements Authenticatable
{
    use Notifiable, HasApiTokens, HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'pwd',
        'siret',
        'libelle'
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getRememberToken()
    {
        return null;
    }
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function setRememberToken($value)
    {
        // No remember token needed for this application
    }
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getRememberTokenName()
    {
        return '';
    }
}
