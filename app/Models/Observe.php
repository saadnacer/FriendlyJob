<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Admin;

class Observe extends Model
{
    use HasFactory;

    protected $table = 'observes';
    protected $primaryKey = null;
    public $incrementing = false;
    
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
