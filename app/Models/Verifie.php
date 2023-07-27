<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\Commentaire;
use App\Models\Reservation;
use App\Models\Friendlyuser;

class Verifie extends Model
{
    use HasFactory;

    protected $table = 'verifies';
    protected $primaryKey = null;
    public $incrementing = false;
    
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id');
    }

    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class, 'commentaire_id');
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function client()
    {
        return $this->belongsTo(Friendlyuser::class, 'friendlyuser_id');
    }
}