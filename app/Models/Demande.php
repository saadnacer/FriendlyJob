<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Friendlyuser;
use App\Models\Service;

class Demande extends Model
{
    use HasFactory;

    protected $table = 'demandes';
    protected $primaryKey = null;
    public $incrementing = false;
    
    public function friendlyUser()
    {
        return $this->belongsTo(Friendlyuser::class, 'friendlyuser_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
