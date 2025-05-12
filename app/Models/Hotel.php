<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id', 'name', 'description', 'price', 'location', 
        'total_rooms', 'available_rooms', 'rating', 'address', 'amenities', 
        'check_in_time', 'check_out_time', 'images', 'hotel_type', 
        'status', 'contact_number', 'email', 'website','images'
    ];

    // The destination relationship
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function hotelBookings()
    {
        return $this->hasMany(HotelBooking::class);
    }
    public function hotelImages()
    {
        return $this->hasMany(HotelImage::class);
    }
}
