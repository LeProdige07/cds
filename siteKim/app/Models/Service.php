<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function details()
    {
        return $this->hasMany(Detail::class, 'service_id', 'id');
    }
    public function visits(){
        return visits($this);
    }
    public function nbre_visites(){
        $this->visits()->increment();
        return $this->visits()->count();
    }
}
