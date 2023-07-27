<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Friendlyuser;
use App\Models\Reservation;
use App\Models\Admin;

class Commentaire extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    
    public function friendlyUser()
    {
        return $this->belongsTo(Friendlyuser::class, 'friendlyuser_id');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function verifications()
    {
        return $this->belongsToMany(Admin::class, 'verifie', 'commentaire_id', 'admin_id')->withPivot('reservation_id', 'admin_id');
    }
}
