<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jobworker;
use App\Models\Service;

class Propose extends Model
{
    use HasFactory;

    protected $table = 'proposes';
    protected $primaryKey = null;
    public $incrementing = false;
    
    public function jobWorker()
    {
        return $this->belongsTo(Jobworker::class, 'jobworker_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
