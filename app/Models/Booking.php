<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'checkin',
        'checkout',
        'adult',
        'child',
        'deposit',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'booking_details', 'booking_id', 'room_id');
    }
}
