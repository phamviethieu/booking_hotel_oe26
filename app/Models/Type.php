<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name', 
        'price',
        'max_people',
        'num_bed',
        'description',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
