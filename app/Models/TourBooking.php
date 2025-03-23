<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tour_id',
        'date',
        'time',
        'adult_tickets',
        'youth_tickets',
        'children_tickets',
        'extra_service_booking',
        'extra_service_person',
        'status',
    ];
}
