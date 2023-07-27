<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jobworker;
use App\Models\Image;

class Profilworker extends Model
{
    use HasFactory;

    protected $table = 'profilworkers';
    protected $primaryKey = null;
    public $incrementing = false;
    
    public function jobWorker()
    {
        return $this->belongsTo(Jobworker::class, 'jobworker_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
