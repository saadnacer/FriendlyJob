<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Commentaire;
use App\Models\Profiluser;

class Friendlyuser extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'pwd',
        'date_nais',
        'image_id',
    ];

    protected $hidden = [
        'pwd',
        'remember_token',
    ];

    protected $primaryKey = 'id';

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'friendlyuser_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function profil()
    {
        return $this->hasOne(Profiluser::class, 'friendlyuser_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'friendlyuser_id');
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifierName()
    {
        return 'id'; // Remplacez 'id' par le nom de la colonne correspondant à l'identifiant unique de l'utilisateur
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->pwd;
    }
}
