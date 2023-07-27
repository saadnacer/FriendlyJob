<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Image;

class Ajouter extends Model
{
    use HasFactory;

    protected $table = 'ajouters';
    protected $primaryKey = null;
    public $incrementing = false;
    
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
