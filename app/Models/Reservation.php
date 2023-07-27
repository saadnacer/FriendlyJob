<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jobworker;
use App\Models\Service;
use App\Models\Commentaire;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_reservation',
        'jobworker_id',
        'friendlyuser_id',
        'service_id',
];

    protected $primaryKey = 'id';
    
    public function jobWorker()
    {
        return $this->belongsTo(Jobworker::class, 'jobworker_id');
    }
    public function friendlyuser()
    {
        return $this->belongsTo(Friendlyuser::class, 'friendlyuser_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'reservation_id');
    }
}
