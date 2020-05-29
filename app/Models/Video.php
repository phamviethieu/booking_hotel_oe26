<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'type_id', 
        'video',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
