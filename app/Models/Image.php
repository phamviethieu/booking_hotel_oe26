<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image', 
        'room_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
