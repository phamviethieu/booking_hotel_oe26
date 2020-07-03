<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'hotel_id',
        'type_id',
        'description',
        'status',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_details');
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type_id', $type);
    }
}
