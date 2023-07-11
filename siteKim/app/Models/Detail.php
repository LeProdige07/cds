<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details';

    protected $fillable = [
        'id',
        'detail_titre',
        'detail_description',
        'detail_image',
        'service_id',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
