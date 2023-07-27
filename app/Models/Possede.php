<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jobworker;
use App\Models\Metier;

class Possede extends Model
{
    use HasFactory;

    protected $table = 'possedes';
    protected $primaryKey = null;
    public $incrementing = false;
    
    public function jobWorker()
    {
        return $this->belongsTo(Jobworker::class, 'jobworker_id');
    }

    public function metier()
    {
        return $this->belongsTo(Metier::class, 'metier_id');
    }
}
