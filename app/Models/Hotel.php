<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    // The destination relationship
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function hotelBookings()
    {
        return $this->hasMany(HotelBooking::class);
    }
}
