<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Friendlyuser;
use App\Models\Image;

class Profiluser extends Model
{
    use HasFactory;

    protected $table = 'profilusers';
    protected $primaryKey = null;
    public $incrementing = false;
    
    public function friendlyUser()
    {
        return $this->belongsTo(Friendlyuser::class, 'friendlyuser_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
