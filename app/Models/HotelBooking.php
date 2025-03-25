<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotel_id',
        'checkin_date',
        'checkout_date',
        'number_of_rooms',
        'number_of_guests',
        'special_requests',
        'booking_status',
        'extra_services'
    ];

    protected $casts = [
        'extra_services' => 'array', // To cast the extra_services JSON field to an array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
